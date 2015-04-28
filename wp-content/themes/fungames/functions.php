<?php
/**
 * FunGames
 *
 * @author Daniel Bakovic
 * @uri http://myarcadeplugin.com
 *
 * @package WordPress
 * @subpackage FunGames
 */

define ( 'MYAPB_THEMEVERSION', '4.8.1');
define ( 'MYAPB_THEMENAME', 'Fungames');

// Activate this if you want to use development CSS and JS files instead of
// compressed files. ONLY FOR DEVELOPMENT PURPOSE!! Don't use on live sites!
define ( 'FUNGAMES_DEVELOP', false);

/** Include MyArcadePlugin Theme API **/
include_once('inc/myabp_api.php');
/** Include MyArcadePlugin Theme Options **/
include_once('inc/myabp_themeoptions.php');
/** Include MyArcadePlugin Theme Default Settings **/
include_once('inc/myabp_settings.php');

/** Include custom widgets **/
include_once('inc/myabp_widgets.php');

/** Include theme actions API **/
include_once('inc/actions.php');

add_action('init', 'fungames_init', 0);

add_action('widgets_init', 'fungames_widgets_init');
add_action('wp_head', 'fungames_wp_head');

if ( !is_admin() ) {
  add_action('wp_print_scripts', 'funames_scripts_init');
  add_action('wp_print_styles',  'fungames_stylesheet_init');
}

// Add filter for blog template
add_filter('single_template', 'fungames_blog_template');


/**
 * Fungames activation function
 */
function fungames_activation( $oldname, $oldtheme = false ) {
  add_rewrite_endpoint( 'play', EP_PERMALINK );
  add_rewrite_endpoint('fullscreen', EP_PERMALINK);
  flush_rewrite_rules();
}
add_action('after_switch_theme', 'fungames_activation', 0);

/**
 * FunGames init function - called when WordPress is initialized
 */
function fungames_init() {

  // Check if pre-game page is enabled
  if ( get_option('fungames_pregame_page') == 'enable' ) {
    $endpoint = get_option('fungames_endpoint_play');
    if ( empty($endpoint) ) $endpoint = 'play';
    add_rewrite_endpoint( $endpoint, EP_PERMALINK );
    add_action( 'template_redirect', 'fungames_play_template_redirect' );
  }

  // Check if fullscreen option is enabled
  if ( get_option('fungames_button_fullscreen') == 'enable' ) {
    add_rewrite_endpoint('fullscreen', EP_PERMALINK);
    add_action('template_redirect', 'fungames_fullscreen_teplate_redirect');
  }
}


/**
 * Handles game display when user comes from the pre-game page (game landing page)
 *
 * @global type $wp_query
 * @return type
 */
function fungames_play_template_redirect() {
  global $wp_query;

  $endpoint = get_option('fungames_endpoint_play');
  if ( empty($endpoint) ) return;

  // if this is not a request for game play then bail
  if ( !is_singular() || !isset($wp_query->query_vars[$endpoint]) ) {
    return;
  }

  // Include game play template
  include dirname( __FILE__ ) . '/single-play.php';
  exit;
}


/**
 * Handles full screen redirect
 *
 * @global type $wp_query
 * @return type
 */
function fungames_fullscreen_teplate_redirect() {
  global $wp_query;

  // if this is not a fullscreen request then bail
  if ( !is_singular() || !isset($wp_query->query_vars['fullscreen']) ) {
    return;
  }

  // Include fullscreen template
  include dirname( __FILE__ ) . '/single-fullscreen.php';
  exit;
}

/**
 * Generate play permalink
 *
 * @return type
 */
function fungames_play_link() {
  $endpoint = get_option('fungames_endpoint_play');
  if ( empty($endpoint) ) return;
  ?>
  <br />
  <a href="<?php echo get_permalink() . $endpoint . '/'; ?>" title="<?php echo __("Play", "fungames"); ?> <?php the_title_attribute(); ?>" rel="bookmark nofollow" class="btn-play">
    <?php _e("Play Game", "fungames"); ?>
  </a>
  <?php
}

function funames_scripts_init() {
  $path_to_theme = get_template_directory_uri();

  if ( !is_admin() ) {

    // load the jquery script
    if ( get_option('fungames_jquery_cdn') == 'enable' ) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');
    }

    wp_enqueue_script('jquery');

        wp_enqueue_script('fungames_social_tabs',
            $path_to_theme.'/js/tabs.js',
            '',
            '',
            false);

    // Do this only on the front page
    if ( is_front_page() || is_home() ) {
      // Which slider should be displayed..
      if ( get_option('fungames_nivoslider') == 'enable' ) {
        // load the nivoslider script
        wp_enqueue_script('fungames_nivoslider',
            $path_to_theme.'/js/jquery.nivo.slider.pack.js',
            '',
            '',
            false);
      }

      if ( get_option('fungames_step_carousel') == 'enable' ) {
        // load default slider script
        wp_enqueue_script('fungames_top_slider',
            $path_to_theme.'/js/scroll.js',
            '',
            '',
            false
        );
      }

      if ( get_option('fungames_games_box') == 'enable' ) {
        // load sortable box script
        wp_enqueue_script('fungames_sortable_box',
            $path_to_theme.'/js/sortable-box.js',
            '',
            '',
            false
        );
      }
    }

    // Include featured scoller code only when the widget is displayed
    //if ( is_active_widget(false, false, 'MABP_Random_Games') ) {
      // load the featured scroller script
      wp_enqueue_script('fungames_featured_scroller',
                $path_to_theme.'/js/spy.js',
                '',
                '',
                false );
    //}

    if ( is_singular() ) {
      // include mochi leaderboard bridge to be able to handle score submissions
      /*wp_enqueue_script('leaderboard',
                'http://xs.mochiads.com/static/pub/swf/leaderboard.js',
                '',
                '',
                false );*/

      if ( get_option('fungames_button_lights') == 'enable' ) {
        wp_enqueue_script('fungames_lights',
                $path_to_theme.'/js/lights.js',
                '',
                '',
                false );
      }

      wp_enqueue_script('fungames_favorites',
              $path_to_theme.'/js/favorites.js',
              '', '', false);

    }
  }
}

function fungames_stylesheet_init() {

  if ( defined('FUNGAMES_DEVELOP') && (FUNGAMES_DEVELOP == true) ) {
    $css_folder = '/css_dev';
  } else {
    $css_folder = '/css';
  }

  $path_to_theme_css = get_template_directory_uri().$css_folder;
  $color_scheme = get_option('fungames_color_scheme');
  wp_register_style('FunGamesStyle', $path_to_theme_css.'/color-'.$color_scheme.'.css');
  wp_enqueue_style( 'FunGamesStyle');

  $box_design = get_option('fungames_box_design');
  if ( empty($box_design) ) $box_design = 'Vertical';

  wp_register_style('FunGamesBoxDesign', $path_to_theme_css.'/box-'.$box_design.'.css');
  wp_enqueue_style( 'FunGamesBoxDesign');

  if ( get_option('fungames_nivoslider') == 'enable' ) {
    wp_register_style('nivoSliderStyle', $path_to_theme_css.'/nivoslider.css');
    wp_enqueue_style( 'nivoSliderStyle');
    wp_register_style('nivoSliderOrman', $path_to_theme_css.'/orman/orman.css');
    wp_enqueue_style( 'nivoSliderOrman');
  }
}

function fungames_widgets_init() {
  register_sidebar(
    array('name'          =>'Home Sidebar',
          'id'            =>'home-sidebar',
          'description'   => 'This is the sidebar that gets shown on the home page.',
          'before_widget' => '',
          'after_widget'  => '',
          'before_title'  => '<h2>',
          'after_title'   => '</h2>',
    )
  );

  register_sidebar(
    array('name'          =>'Single Sidebar',
          'id'            =>'single-sidebar',
          'description'   => 'This is your sidebar that gets shown on the game or blog pages.',
          'before_widget' => '',
          'after_widget'  => '',
          'before_title'  => '<h2>',
          'after_title'   => '</h2>',
    )
  );

  register_sidebar(
    array('name'          =>'Page Sidebar',
          'id'            =>'page-sidebar',
          'description'   => 'This is your sidebar that gets shown on most of your pages.',
          'before_widget' => '',
          'after_widget'  => '',
          'before_title'  => '<h2>',
          'after_title'   => '</h2>',
    )
  );

  register_sidebar(
    array('name'          =>'Category Sidebar',
          'id'            =>'category-sidebar',
          'description'   => 'This is your sidebar that gets shown on the category pages.',
          'before_widget' => '',
          'after_widget'  => '',
          'before_title'  => '<h2>',
          'after_title'   => '</h2>',
    )
  );

  // Area 1, located in the footer. Empty by default.
  register_sidebar( array(
    'name' => __( 'First Footer Widget Area', 'fungames' ),
    'id' => 'first-footer-widget-area',
    'description' => __( 'The first footer widget area', 'fungames' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  // Area 2, located in the footer. Empty by default.
  register_sidebar( array(
    'name' => __( 'Second Footer Widget Area', 'fungames' ),
    'id' => 'second-footer-widget-area',
    'description' => __( 'The second footer widget area', 'fungames' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  // Area 3, located in the footer. Empty by default.
  register_sidebar( array(
    'name' => __( 'Third Footer Widget Area', 'fungames' ),
    'id' => 'third-footer-widget-area',
    'description' => __( 'The third footer widget area', 'fungames' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  // Area 4, located in the footer. Empty by default.
  register_sidebar( array(
    'name' => __( 'Fourth Footer Widget Area', 'fungames' ),
    'id' => 'fourth-footer-widget-area',
    'description' => __( 'The fourth footer widget area', 'fungames' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
}


function fungames_calculate_height($fungames_box_count) {

  switch ( get_option('fungames_box_design') ) {
    case 'Vertical': {
      $count = round(intval($fungames_box_count) / 2);
      $height = 60 + 110 * $count;
      return 'style="height:'.$height.'px;"';
    } break;

    case 'Half': {
      $count = round(intval($fungames_box_count) );
      $height = 65 + 110 * $count;
      return 'style="height:'.$height.'px;"';
    } break;

    case 'Miniclip': {
      $count = round(intval($fungames_box_count) );
      $height = 155 + 20 * $count;
      return 'style="height:'.$height.'px;"';
    } break;

    default: {
      return false;
    }
  }

 return '';
}


function fungames_default_header_menu() {
    wp_list_categories('sort_column=name&title_li=&depth=1');
}


function fungames_default_footer_menu() {
  ?>
  <li class="page_item <?php if ( is_home() ) { ?>current_page_item<?php } ?>">
    <a href="<?php echo get_option('url'); ?>/" title="<?php _e("Home", "fungames"); ?>"><?php _e("Home", "fungames"); ?></a>
  </li>
  <?php
  wp_list_pages('sort_column=menu_order&depth=1&title_li=');
}


if ( !function_exists('fungames_favorite_link') ) {
  function myabp_favorite_link($post_id, $opt, $action) {
    $img = get_template_directory_uri().'/images/'.$action.'.png';
    $link  = "<img src='".get_bloginfo('stylesheet_directory')."/images/loading_small.gif' alt='Loading' title='Loading' style='display:none;margin-top:10px' class='fungames-fav-img' />";
    $link .= "<a href='?wpfpaction=".$action."&amp;postid=".$post_id."' title='". $opt ."' rel='nofollow' class='fungames-favorites-link'><img src='".$img."' title='".$opt."' alt='".$opt."' class='favoritos fungames-fav-link' /></a>";
    $link = apply_filters( 'wpfp_link_html', $link );
    return $link;
  }
}


if ( !function_exists('fungames_favorite') ) {
  function fungames_favorite() {
    global $post, $action;
    // Works only when WP Favorite Post is active
    if (function_exists('wpfp_link')) {
      if ($action == "remove") {
        $str = myabp_favorite_link($post->ID, wpfp_get_option('remove_favorite'), "remove");
       } elseif ($action == "add") {
        $str = myabp_favorite_link($post->ID, wpfp_get_option('add_favorite'), "add");
       } elseif (wpfp_check_favorited($post->ID)) {
        $str = myabp_favorite_link($post->ID, wpfp_get_option('remove_favorite'), "remove");
       } else {
        $str = myabp_favorite_link($post->ID, wpfp_get_option('add_favorite'), "add");
       }
       echo $str;
    }
  }
}

/**
 * Check if at least one button is active and return true / false
 *
 * @return bool
 */
function fungames_display_buttons() {

  if ( (get_option('fungames_button_fullscreen') == 'enable')
     ||(get_option('fungames_button_lights') == 'enable')
     ||(get_option('fungames_button_favorite') == 'enable') ) {
    return true;
  }
  return false;
}


if ( !function_exists('fungames_blog_template') ) {
  /**
  * Blog template redirection
  */
  function fungames_blog_template($template) {
    global $post;

    // Get the blog category
    $blog_cat = get_option('fungames_blog_category');

    if ($blog_cat == '-- none --') return $template;

    $blog_category = get_cat_ID( $blog_cat );
    $post_cat = get_the_category();


    if ( is_singular() && !empty($post_cat) && ( in_category($blog_category) || ($blog_category == $post_cat[0]->category_parent) ) ) {
      // overwrite the template file if exist
      if ( file_exists(get_template_directory() . '/template-blog-post.php' ) ) {
        $template = get_template_directory() . '/template-blog-post.php';
      }
    }

    return $template;
  }
}


function fungames_get_excluded_categories() {
  $result = 'exclude=';
  $blog = get_cat_ID( get_option('fungames_blog_category') );
  if ( $blog ) {
    $result = 'exclude='.$blog.',';
  }

  $result .= get_option('fungames_exclude_front_cat');

  return $result;
}


function fungames_get_excerpt($excerpt_length = false, $echo = true) {
  global $post;

  // Get post excerpt
  $text = strip_shortcodes( $post->post_content );
  $text = apply_filters('the_content', $text);
  $text = str_replace(']]>', ']]&gt;', $text);
  $text = wp_trim_words( $text, 100, '' );

  if ( $excerpt_length ) {
    if ( strlen($text) > $excerpt_length ) {
      $text = mb_substr($text, 0, $excerpt_length).' [...]';
    }
  }

  if ($echo)
    echo $text;
  else
    return $text;
}


/*** REDIRECT MODIFICATION BEGIN ***/
function fungames_login_redirect() {
  global $mngl_options, $pagenow;

  // Check if mingle is instaleld
  if ( defined('MNGL_PLUGIN_NAME') ) {

    if( isset($_GET['action']) ) $theaction = $_GET['action']; else $theaction ='';

    if ($pagenow == 'wp-login.php' && $theaction != 'logout') {
      if ($theaction == 'register') {
        // Redirect to the sign up page
       wp_redirect( get_permalink($mngl_options->signup_page_id) );
      }
      else {
        // Redirect to the login page
        wp_redirect( get_permalink($mngl_options->login_page_id) );
      }
    }
  }
}
/*** REDIRECT MODIFICATION END ***/


/**
 * prints out the page logo
 */
function fungames_logo() {
  $logo = get_option('fungames_custom_logo');

  if ( empty($logo) ) {
    $logo = get_template_directory_uri() . '/images/logo.png';
  }

  ?>
  <img src="<?php echo $logo; ?>" alt="<?php bloginfo('name');?>" />
  <?php
}


/**
* generates output for the breadcrumb navigation
*/
function fungames_breadcumb() {

  if ( is_home() || is_front_page() )
    return;

  if ( class_exists('breadcrumb_navigation_xt') ) {
    ?>
    <div class="breadcrumb">
      <?php
      _e("You Are Here: ", "fungames");
      $mybreadcrumb = new breadcrumb_navigation_xt;
      $mybreadcrumb->display();
      ?>
    </div>
    <?php
  }
}


/**
* generates output for the post navigation
*/
function fungames_navigation() {
  ?>
  <div id="navigation">
    <?php
    if(function_exists('wp_pagenavi')) {
      wp_pagenavi();
    } else {
      ?>
      <div class="post-nav clearfix">
        <p id="previous"><?php next_posts_link(__('Older games &laquo;', 'fungames')) ?></p>
        <p id="next-post"><?php previous_posts_link(__('&raquo; Newer games', 'fungames')) ?></p>
      </div>
      <?php
    }
    ?>
  </div>
  <?php
}

/**
 * Generate game manage buttons - only for admins
 *
 * @global type $post
 */
function fungames_admin_links() {
  global $post;

  if ( current_user_can('delete_posts') ) {
    // Show edit and delete links
    echo '<div class="clear"></div>';
    echo "<div style='float:right'><strong>Admin Actions: </strong><a href='" . wp_nonce_url("/wp-admin/post.php?action=delete&amp;post=".$post->ID, 'delete-post_' . $post->ID) . "'>Delete</a>";
    echo " | ";
    echo "<a href='" . wp_nonce_url("/wp-admin/post.php?post=".$post->ID."&action=edit") . "'>Edit</a></div>";
  }
}


function fungames_get_best_players( $count = 5 ) {
  global $wpdb;

  return $wpdb->get_results("SELECT h.user_id, COUNT(*) as highscores, u.plays as plays
                             FROM ".MYARCADE_HIGHSCORES_TABLE." AS h
                               INNER JOIN ".MYARCADE_USER_TABLE." AS u ON h.user_id=u.user_id
                                 GROUP BY h.user_id
                                 ORDER BY highscores DESC LIMIT ".$count);
}


function fungames_contest_alert() {
  if ( !function_exists('myarcadecontest_get_contest_id_for_this_game') )
    return;

  $contest_id = myarcadecontest_get_contest_id_for_this_game();
  $user_id    = get_current_user_id();

  if (!$contest_id || myarcadecontest_check_user_is_in_contest($contest_id, $user_id) )
    return;

  $permalink_open = '<a href="'.get_permalink($contest_id).'" title="'.get_the_title($contest_id).'">';
  $permalink_close = '</a>';

  ?>
  <div class="info">
    <p>
      <strong><?php _e('Howdy!', 'fungames'); ?></strong> <?php echo sprintf( __('There is an active contest available for this game. Click %shere%s to join the contest!', 'fungames'), $permalink_open, $permalink_close); ?>
    </p>
  </div>
  <?php
}


/**
 * Display related or random games
 */
function fungames_related() {
  if ( function_exists('related_entries') ) {
    related_entries();
  } else {
    get_template_part('games', 'random');
  }
}


/**
 * Display Google Rich Snippet
 *
 * @global type $post
 */
function fungames_rich_snippet() {
  global $post;

  if ( function_exists('the_ratings') && get_option('fungames_rich_snippet') == 'enable' ) {
    $ratings_user = intval(get_post_meta($post->ID, 'ratings_users', true));
    $rating_average = get_post_meta($post->ID, 'ratings_average', true);
    $ratings_max = intval(get_option('postratings_max'));

    if ( empty($rating_average) ) $rating_average = 0;
    echo "\n";
    ?>
    <!-- Google Rich Snipet -->
    <div itemscope itemtype="http://schema.org/SoftwareApplication">
      <meta itemprop="name" content="<?php the_title_attribute(); ?>" />
      <meta itemprop="image" content="<?php myabp_print_thumbnail_url(); ?>" />
      <meta itemprop="description" content="<?php echo get_the_excerpt(); ?>" />
      <meta itemprop="softwareApplicationCategory" content="GameApplication" />
      <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
        <span itemprop="ratingCount"><?php echo $ratings_user; ?></span> votes, average: <span itemprop="ratingValue"><?php echo $rating_average; ?></span>/<span itemprop="bestRating"><?php echo $ratings_max; ?></span>
      </div>
    </div>
    <?php
    echo "\n";
  }
}