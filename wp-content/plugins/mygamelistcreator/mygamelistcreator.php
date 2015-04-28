<?php
/*
Plugin Name:  MyGameListCreator
Plugin URI:   http://myarcadeplugin.com
Description:  Creates a static file including a list with defined number of games to save server performance. The list will only be refreshed if a game is added/modified/deleted.
Version:      2.10
Author:       Daniel Bakovic
Author URI:   htpt://netreview.de
*/

/*
  [mygamelist]
  %TITLE%
  %TITLE_WITH_LINK%
  %THUMBNAIL%
  %THUMBNAIL_WITH_LINK%
  %DESCRIPTION%
  %INSTRUCTION%
*/


//----------------------------------------------------------------------------//
//---Config-------------------------------------------------------------------//
//----------------------------------------------------------------------------//
$mygamelistcreator_version = '2.10';


//----------------------------------------------------------------------------//
//---Hook---------------------------------------------------------------------//
//----------------------------------------------------------------------------//
add_action('publish_post', 'create_lists');
add_action('deleted_post', 'create_lists');
add_action('edit_post',    'create_lists');

register_activation_hook  ( __FILE__, 'mygame_list_install' );
register_deactivation_hook( __FILE__, 'mygame_list_uninstall' );

add_action('admin_menu', 'mygame_list_admin_menu');

add_shortcode('mygamelist', 'mygamelist_process');


function mygame_list_uninstall() {
  delete_option('mygamelistcreator');
}


//----------------------------------------------------------------------------//
//---Functions----------------------------------------------------------------//
//----------------------------------------------------------------------------//

//
// @brief: This function checks the user level.  
//
if (!function_exists('check_user_privilegs')) { 
  function check_user_privilegs() {             
    if (function_exists('current_user_can')) {      
      if (current_user_can('manage_options')) {
        return true;
      }
    } else {
      global $user_level;
      
      get_currentuserinfo();
      
      if ($user_level >= 8) {
        return true;
      }
    }
    
    return false;
  }
}

//
// @brief: Adds some needed option values to wordpress db
//
function mygame_list_install() {  
  $def_template = '<p>'."\n".'<strong>%TITLE_WITH_LINK%</strong><br />'."\n".'<div style="float:left;">%THUMBNAIL_WITH_LINK%</div> %DESCRIPTION%'."\n".'</p>'."\n".'<p style="clear:left;"></p><br />';  
  
  $gamelist_settings = array (
    'list_limit'           => 200,
    'list_title'           => '<h1>200 Latest Games</h1>',
    'list_begin_wrap'      => '<div id="gamelist">',
    'list_end_wrap'        => '</div>',
    'list_item_begin_wrap' => '<li>',
    'list_item_end_wrap'   => '</li>',
    'list_char_limit'      => 22,
    'list_include_cats'    => '',
    'list_list_begin_wrap' => '<ul>',
    'list_list_end_wrap'   => '</ul>',
    'list_template'        => $def_template,
    'list_leading'         => 'No',
    'autocreate_list'      => 'Yes',
    'autocreate_list_page' => 'No',
    'list_rows'            => 5);
    
  register_setting('mygamelistcreator', 'mygamelistcreator');
  $options = get_option('mygamelistcreator');
    
  if ( empty($options) ) {
    update_option( 'mygamelistcreator', $gamelist_settings);        
  }  
}


//
// @brief: Creates an admin link menu on settings section
//
function mygame_list_admin_menu() {  
  if (check_user_privilegs()) {
   if ( defined('MYARCADE_VERSION') ) {
      add_submenu_page('myarcade_admin.php',
        __('MyGameListCreator', 'mygamelistcreator') , 
        __('MyGameListCreator', 'mygamelistcreator'),  
        'manage_options',  basename(__FILE__), 'mygamelistcreator_options');
    }
    else {
      add_options_page(
        __('MyGameListCreator', 'mygamelistcreator') , 
        __('MyGameListCreator', 'mygamelistcreator'), 
        'manage_options' , 
        basename(__FILE__), 
        'mygamelistcreator_options');
    }
  }  
}


//
// @brief: Header for the overview page (admin menu)
//
function mygamelistcreator_header() {
  
  ?>
  <script type="text/javascript">
  function checkAll(field) {
    for (i = 0; i < field.length; i++)
      field[i].checked = true ;
  }

  function selectall() {
    var theForm = document.dbgamelist;
    for (i=0; i<theForm.elements.length; i++) {
      if (theForm.elements[i].name=='gamecategs[]')
        theForm.elements[i].checked = 1;
    }  
  }
  </script> 
  <?php
  
  echo '<div class="wrap">';
  echo '<h2>MyGameListCreator Options</h2>';
}


//
// @brief: Footer for the overview page (admin menu)
//
function mygamelistcreator_footer() {
  global $mygamelistcreator_version;

  ?>
  <div style="margin: 20px 0px 20px 0px;padding: 10px;text-align: right;">
    <p>
      MyGameListCreator v<?php echo $mygamelistcreator_version;?> | 
      <a href="http://myarcadeplugin.com" title="MyArcadePlugin" target="_blank">MyArcadePlugin</a>
    </p>
    </div>
  </div>
  <?php
}


//
// @brief: Creates an overview/settings page in admin backend
//
function mygamelistcreator_options() {

  mygamelistcreator_header();
  
  if (isset($_GET['dbcgl_action'])) {
  
    switch ($_GET['dbcgl_action']) {
      case 'dbcglmanually':
      {
        $result = create_mygame_list();
      }
      break;
      
      case 'dbprecompile':
      {
        $result = mygamelist_precompile();
      }
      break;
    }
    
    
    if ($result) {
      echo '<div id="message" class="updated fade"><p><strong>New game list created!</strong></p></div>';  
    } else {
      echo '<p id="message" class="error fade">Can\'t create a game list!</p>';  
    }
  }
  
  if (isset($_POST['dbcgl_update'])) {
    $updated_options = array (
        'list_limit'           => intval($_POST["limit"]),
        'list_title'           => str_replace("\\", "",$_POST["title"]),
        'list_begin_wrap'      => str_replace("\\", "",$_POST["begin_wrap"]),
        'list_end_wrap'        => str_replace("\\", "",$_POST["end_wrap"]),
        'list_item_begin_wrap' => str_replace("\\", "",$_POST["begin_item"]),
        'list_item_end_wrap'   => str_replace("\\", "",$_POST["end_item"]),
        'list_char_limit'      => intval($_POST["charlimit"]),
        'list_include_cats'    => implode(",", $_POST['gamecategs']),
        'list_list_begin_wrap' => str_replace("\\", "",$_POST["begin_list"]),
        'list_list_end_wrap'   => str_replace("\\", "",$_POST["end_list"]),
        'list_template'        => str_replace("\\", "",$_POST["game_list_template"]),
        'list_leading'         => $_POST["leading"],
        'autocreate_list'      => $_POST["autolist"],
        'autocreate_list_page' => $_POST["autopage"],
        'list_rows'            => $_POST["rows"]);
        
    update_option('mygamelistcreator', $updated_options);  
    echo '<div id="message" class="updated fade"><p><strong>Settings saved.</strong></p></div>';
  }

  $options = get_option('mygamelistcreator');

 ?>
  <form method="post" name="dbgamelist" id="dbgamelist" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <input type="hidden" name="dbcgl_update" id="dbcgl_update" value="true" />
    <table cellpadding="2" cellspacing="2">
      <tr>
        <td>Game List Title:</td>
        <td><input type="text" size="50" name="title" value='<?php echo $options['list_title']; ?>'></td>
        <td>Set a title for your game list.</td>
      </tr>
      <tr>
        <td>Limit Showed Games:</td>
        <td><input type="text" size="50" name="limit" value='<?php echo $options['list_limit']; ?>'></td>
        <td>Set "-1" (without "") to create a list with all published games. Otherwise enter an integer.</td>
      </tr>
      <tr>
        <td>Limit Game Names:</td>
        <td><input type="text" size="50" name="charlimit" value='<?php echo $options['list_char_limit']; ?>'></td>
        <td>Set how many chars of a game name should be shown. Leave blank to show the entire name.</td>
      </tr>
      <tr>
        <td>Begin Wrap:</td>
        <td><input type="text" size="50" name="begin_wrap" value='<?php echo $options['list_begin_wrap']; ?>'></td>
        <td>Put here your global begin wrap for the game list, i.e "&lt;div&gt;".</td>
      </tr> 
      <tr>
        <td>End Wrap:</td>
        <td><input type="text" size="50" name="end_wrap" value='<?php echo $options['list_end_wrap']; ?>'></td>
        <td>Put here your global end wrap for the game list, i.e "&lt;/div&gt;".</td>
      </tr>
      <tr>
        <td>Begin List Wrap:</td>
        <td><input type="text" size="50" name="begin_list" value='<?php echo $options['list_list_begin_wrap']; ?>'></td>
        <td>Put here your list begin wrap, i.e "&lt;ul&gt;".</td>
      </tr>       
      <tr>
        <td>End List Wrap:</td>
        <td><input type="text" size="50" name="end_list" value='<?php echo $options['list_list_end_wrap']; ?>'></td>
        <td>Put here your list end wrap, i.e "&lt;/ul&gt;".</td>
      </tr>       
      <tr>
        <td>Begin Item Wrap:</td>
        <td><input type="text" size="50" name="begin_item" value='<?php echo $options['list_item_begin_wrap']; ?>'></td>
        <td>Put here your begin wrap for a game in the list, i.e "&lt;li&gt;"</td>
      </tr> 
      <tr>
        <td>End Item Wrap:</td>
        <td><input type="text" size="50" name="end_item" value='<?php echo $options['list_item_end_wrap']; ?>'></td>
        <td>Put here your end wrap for a game in the list, i.e "&lt;/li&gt;"</td>
      </tr>
      
      <tr valign="top">
        <td>Games Categories:</td>
        <td>
        <?php 
          $dbgamelist_categs = explode (',', $options['list_include_cats']);

          // Get all categories
          $categs = get_all_category_ids();
          $i = count($categs);
          foreach ($categs as $cat_id)
          {
            foreach ($dbgamelist_categs as $categ) {
              if ($cat_id == $categ) { $check = 'checked'; break;} else { $check = ''; }
            }
            
            $i--;
            $br = '';
            if ($i > 0) $br = '<br />'; 
            echo '<input type="checkbox" name="gamecategs[]" value="'.$cat_id.'" '.$check.'/>'.get_cat_name($cat_id).$br;
          }
        ?>
        <br /><br />
        <input type="button" name="CheckAll" value="Check All" onClick="selectall()">
        <br /><br />
        </td>
        <td>Select categories to create a game list. If you wish to have games from each category included in the list, please select all categories.</td>    
      </tr>
      
      <tr>
        <td>Create List With Leading Letters:</td>
        <td><input type="checkbox" name="leading" value="Yes" <?php if ( $options['list_leading'] == 'Yes') echo 'checked'; ?> /></td>
        <td>Check this option if you want to create an alphabetically ordered list with leading letters, like on Miniclip. If this option is not checked "default" list will be created where the games are ordered by the publish dates.</td>
      </tr> 
      
      <tr>
        <td>Rows For Lists With Leading Letters:</td>
        <td><input type="text" size="50" name="rows" value='<?php echo $options['list_rows']; ?>'></td>
        <td>Enter the number of rows that should be created. Default value when using FunGames theme is <strong>5</strong></td>
      </tr>      
      
      <tr>
        <td>Auto Create Game List:</td>
        <td><input type="checkbox" name="autolist" value="Yes" <?php if ( $options['autocreate_list'] == 'Yes') echo 'checked'; ?> /></td>
        <td>Check this option if you want to create automatically the game list.</td>
      </tr>                 
      
      <tr>
        <td colspan="3"><h3>Game List In Posts And Pages</h3></td>
      </tr>
      <tr>
        <td>Post Game List Template:</td>
        <td>
          <textarea rows="10" cols="50" id="game_list_template" name="game_list_template"><?php echo htmlspecialchars(stripslashes( $options['list_template'])); ?></textarea>
          <br />
          Use [mygamelist] in posts or pages to display a game list with this template.
        </td>
        <td>
          Available Variables: <br />
          %TITLE%<br />
          %TITLE_WITH_LINK%<br />
          %THUMBNAIL%<br />
          %THUMBNAIL_WITH_LINK%<br />
          %DESCRIPTION%<br />
          %INSTRUCTION%<br />
        </td>
      </tr>
      
      <tr>
        <td>Auto Create Game List For Pages:</td>
        <td><input type="checkbox" name="autopage" value="Yes" <?php if ( $options['autocreate_list_page'] == 'Yes') echo 'checked'; ?> /></td>
        <td>Check this option if you want to create automatically the game list.</td>
      </tr>        
    </table>
    <br />
    <input type="submit" name="dbcgl_update" value="Save Settings" class="button" style="float:left;margin:20px;">
  </form>
  
  <input type="button" name="dbcglmanually" value="Create A Game List" onclick="location.href='<?php echo get_bloginfo('wpurl'); ?>/wp-admin/admin.php?page=mygamelistcreator.php&dbcgl_action=dbcglmanually'" class="button" style="float:left;margin:20px;" />
  <input type="button" name="dbprecompile" value="Precompile A Game List For Posts/Pages" onclick="location.href='<?php echo get_bloginfo('wpurl'); ?>/wp-admin/admin.php?page=mygamelistcreator.php&dbcgl_action=dbprecompile'" class="button" style="float:left;margin:20px;" />
  
  <div style="clear:both"></div>
  <div>
    <h3>Description</h3>
    
    <h4>Cached Game List</h4>
    This plugin will create a static file called "gamelist.php" in the wordpress root directory.<br /> 
    It contains a list with available games on your wordpress blog.<br />
    This will save your server performance because a new game list will only be created if a post is
    published, edited or deleted.<br />
    You can also build a game list manually to check your settings.<br />
  
    <h5>Usage Example 1</h5>
    If you want to creat an unorded list with all available games on your blog than you can use the following settings:
    <br /><br />
    <ul>
      <li>Begin Warp =  &lt;div id="yourstylehere"&gt;</li>
      <li>End Wrap   =  &lt;/div&gt;</li>
      <li>Begin List Wrap = &lt;ul&gt;</li>
      <li>End List Wrap = &lt;/ul&gt;</li>      
      <li>Begin Item Wrap = &lt;li&gt;</li>
      <li>End Item Wrap = &lt;/li&gt;</li>
    </ul>
    <br />  
    Your created list will look like this in html:<br /><br />
    &lt;div id="yourstylehere"&gt;<br />
    &lt;ul&gt;<br />
    &lt;li&gt;Game 1&lt;/li&gt;<br />
    &lt;li&gt;Game 2&lt;/li&gt;<br />
    &lt;li&gt;Game 3&lt;/li&gt;<br />
    &lt;li&gt;Game 4&lt;/li&gt;<br />
    &lt;li&gt;Game 5&lt;/li&gt;<br />
    &lt;/ul&gt;<br />
    &lt;/div&gt; <br /><br />
    
    <h5>Usage Example 2 - MiniClip Like</h5>
    If you want to creat a game list like on miniclip with leading letters then you can use the following settings:
    <br /><br />
    <ul>
      <li>Limit Game Name = 16</li>
      <li>Begin Warp =  &lt;div id="gamelist"&gt;</li>
      <li>End Wrap   =  &lt;div class="clear"&gt;&lt;/div&gt;&lt;/div&gt;</li>
      <li>Begin List Wrap = &lt;ul style="width:128px;"&gt;</li>
      <li>End List Wrap = &lt;/ul&gt;</li>      
      <li>Begin Item Wrap = &lt;li&gt;</li>
      <li>End Item Wrap = &lt;/li&gt;</li>
    </ul>
    <br /> 
    
    <h5>Theme Intergration</h5>
    To display the list in your theme you have to put this line on the desired place in your theme:
    <br />
    <br />
    <strong>&lt;php if (function_exists('get_game_list')) { get_game_list(); } ?&gt;</strong>
    <br />
    <br />
    Here is a example of the game list on <a href="http://fungames24.net" target="_blank">FunGames24.net</a> created with this plugin:
    <br />
    <br />  
    <img src="<?php echo plugins_url('mygamelistcreator/gamelist_example.png') ?>">
    <br />
    <br />  
    <h4>Game List To Use In Posts And Pages</h4>
    You are also able to create game lists that can be included in posts and pages. By clicking on "Precompile A Game List For Posts/Pages" 
    a new game list with the defined template will be created.<br />
    To embed the precompiled game list in your posts you have to add <strong>[mygamelist]</strong> as the content of a page.<br />
    The game list will contain all games of the selected categories.<br />
    This feature is very usefull if you have a mixed site and not only a game portal.
    <br />
    <br />
  </div>

  
<?php

  mygamelistcreator_footer();
}


function create_lists() {
  $options = get_option('mygamelistcreator');
  
  if ($options['autocreate_list'] == 'Yes') {
    create_mygame_list();
  }
  
  if ($options['autocreate_list_page'] == 'Yes') {
    mygamelist_precompile();
  }
}


//
// @brief: Creates a game list and sore it into gamelist.php
//
function create_mygame_list() {
  global $wpdb;
   
  // Set timeout
  if( !ini_get('safe_mode') ) { set_time_limit(0); }
  
  // Get Options
  $options = get_option('mygamelistcreator');
  
  if (empty($options['list_include_cats'])) {
    $categs = '';
  }
  else {
    $categs = 'cat='.$options['list_include_cats'].'&';
  }
  
  // file to write
  $game_file = ABSPATH. '/gamelist.php';
  $fp = fopen($game_file, 'w');
  
  if ( $options['list_leading'] == 'Yes') {
    // Miniclip style
    $games = get_posts(''.$categs.'numberposts='.$options['list_limit'].'&order=ASC&orderby=title');
    $count = count($games);
    $games_per_row = ($count + 36) / intval($options['list_rows']);
    $last_letter = '';
    $actual_letter = '';
    $game_count = 0;
    
    if ($games) {
      $str  = $options['list_begin_wrap']."\n".$options['list_title']."\n".$options['list_list_begin_wrap']."\n";
      foreach ($games as $game) {
        $game_count++;
        
        $actual_letter = strtoupper(substr($game->post_title, 0, 1));
              
        if ( $actual_letter != strtoupper($last_letter) ) {
          $last_letter = $actual_letter;
          $str .= $options['list_item_begin_wrap'].'<font style="font-weight: bold;color:#000;">'.$actual_letter.'</font>'.$options['list_item_end_wrap']."\n";
          $game_count++;
        }
        
        if ((strlen($game->post_title) > $options['list_char_limit'])) { 
          $gametitle = substr($game->post_title, 0, $options['list_char_limit']).".."; 
        } 
        else {
          $gametitle = $game->post_title;
        }   
  
        $str .= $options['list_item_begin_wrap'].'<a href="';
        $str .= get_permalink($game->ID);  
        $str .= '" title="'.$game->post_title.'">' .ucwords(strtolower($gametitle)). '</a>';
        $str .= $options['list_item_end_wrap']."\n";          
        
        if ($game_count >= $games_per_row) {
          $game_count = 0;
          // create new ul       
          $str .= $options['list_list_end_wrap']."\n".$options['list_list_begin_wrap']."\n";
        }      
      }
      $str .= $options['list_list_end_wrap']."\n".$options['list_end_wrap']."\n";
    }    
  }
  else {
    // Default style      
    $games = get_posts(''.$categs.'numberposts='.$options['list_limit'].'&order=DESC&orderby=date'); 
    
    if ($games) {
      $str  = "\n".$options['list_begin_wrap']."\n".$options['list_title']."\n".$options['list_list_begin_wrap']."\n";
      
      foreach ($games as $game) {      
        if ((strlen($game->post_title) > $options['list_char_limit'])) { 
          $gametitle = substr($game->post_title, 0, $options['list_char_limit']).".."; 
        } 
        else {
          $gametitle = $game->post_title;
        }
        
        $str .= $options['list_item_begin_wrap'].'<a href="';
        $str .= get_permalink($game->ID);  
        $str .= '" title="'.$game->post_title.'">' .ucwords(strtolower($gametitle)). '</a>';
        $str .= $options['list_item_end_wrap']."\n";
      }
      
      $str .= $options['list_list_end_wrap']."\n"."<div style='clear:both'></div>".$options['list_end_wrap']."\n";
    }
  }
  
  // Write the list to file
  $write_result = fwrite($fp, $str);
  fclose($fp);
  
  // Check the result
  if (!$write_result) { $result == false; } else { $result = true; } 
    
  return $result;
} 

/**
 * @brief Precompiles a game list for posts and pages
 */
 function mygamelist_precompile() {
  global $wpdb;
  
  // Get Options
  $options = get_option('mygamelistcreator');

  // Get Options
  $categs  = $options['list_include_cats'];
  
  if (empty($categs)) {
    $categs = '';
  }
  else {
    $categs = 'cat='.$categs.'&';
  }
  
  // file to write
  $game_file = ABSPATH. '/gamepostlist.php';
  $fp = fopen($game_file, 'w');
    
  $games = get_posts(''.$categs.'numberposts=-1&order=DESC&orderby=date');
  
  $str = "<?php return '";
  
  if ($games) {
    // Get Template
    $template = stripslashes($options['list_template']);
    
    // Set timeout
    if( !ini_get('safe_mode') ) { set_time_limit(0); }
    
    foreach ($games as $game) {
      $game_template = $template;
      
      // %TITLE% and %TITLE_WITH_LINK%
      $game_template = str_replace("%TITLE%", str_replace("'", "&#39;", $game->post_title), $game_template);
      $gamelink = "<a href=\"".get_permalink($game->ID)."\" title =\"".str_replace("'", "&#39;", $game->post_title)."\">".str_replace("'", "&#39;", $game->post_title)."</a>";
      $game_template = str_replace("%TITLE_WITH_LINK%", $gamelink, $game_template);
      // %THUMBNAIL% and %THUMBNAIL_WITH_LINK%
      $thumb     = "<img src=\"".get_post_meta($game->ID, "mabp_thumbnail_url", true)."\" alt=\"".str_replace("'", "&#39;", $game->post_title)."\" />";
      $thumblink = "<a href=\"".get_permalink($game->ID)."\" title=\"".str_replace("'", "&#39;", $game->post_title)."\">".$thumb."</a>";
      $game_template = str_replace("%THUMBNAIL%", $thumb, $game_template);
      $game_template = str_replace("%THUMBNAIL_WITH_LINK%", $thumblink, $game_template);
      // %DESCRIPTION%
      $game_template = str_replace("%DESCRIPTION%", str_replace("'", "&#39;", get_post_meta($game->ID, 'mabp_description', true)), $game_template);
      // %INSTRUCTION%
      $game_template = str_replace("%INSTRUCTION%", str_replace("'", "&#39;", get_post_meta($game->ID, 'mabp_instructions', true)), $game_template);
            
      $str .= $game_template."\n";
    }
  }
  else {
    $str .= "No Games found!";
  }
  
  $str .= "'; ?>";
     
  $write_result = fwrite($fp, $str);
  
  if (!$write_result) { $result == false; } else { $result = true; }
  
  fclose($fp);
  
  return $result;  
 }


/**
 * @brief Creates a Gamelist in a post or page
 */
function mygamelist_process($atts) {
  // Include the precompiled gamelist for the posts
  if ( file_exists(ABSPATH. '/gamepostlist.php') ) {
    return include (ABSPATH. '/gamepostlist.php');
  }
  else {
    return 'Please Pre-Compile A Game List!';
  }
}


//
// @brief: Shows the game list in users theme
//
function get_game_list() {
  if ( file_exists(ABSPATH.'/gamelist.php') ) {
    include (ABSPATH.'/gamelist.php');
  }
  else {
    // Can't find a game list
    return "Can't find a game list! Please create a new game list...";
  }
}
?>