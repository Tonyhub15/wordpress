<?php
 $RA272EED39CFB584BB555165E3C9AA882 = dirname( dirname( dirname( dirname( dirname(__FILE__))))); if ( file_exists($RA272EED39CFB584BB555165E3C9AA882 . '/wp-load.php') ) { define('MYARCADE_DOING_ACTION', true); require_once($RA272EED39CFB584BB555165E3C9AA882 . '/wp-load.php'); } else { die(); } if ( function_exists('current_user_can') && !current_user_can('manage_options') ) { die(); } require_once( MYARCADE_CORE_DIR . '/myarcade_admin.php' ); require_once( MYARCADE_CORE_DIR . '/addgames.php' ); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title><?php _e("Edit Game", 'myarcadeplugin'); ?></title>


<link rel='stylesheet' href='<?php echo admin_url("css/wp-admin.css") ?>' type='text/css' />
<link rel='stylesheet' href='<?php echo admin_url("css/colors/blue/colors.css") ?>' type='text/css' />
<link rel='stylesheet' href='<?php echo includes_url("css/buttons.min.css") ?>' type='text/css' />
<link rel='stylesheet' href='<?php echo includes_url("css/dashicons.min.css") ?>' type='text/css' />

<link rel='stylesheet' href='<?php echo MYARCADE_CORE_URL; ?>/myarcadeplugin.css' type='text/css' />

<script type="text/javascript" src="<?php echo get_option('siteurl')."/".WPINC."/js/jquery/jquery.js"; ?>"></script>

<style type="text/css">
  .wrap { margin-left: 15px; }
</style>

</head>
<body>
<div class="wrap">
<p style="margin-top: 10px"><img src="<?php echo MYARCADE_URL . '/images/logo.png'; ?>" alt="MyArcadePlugin Pro" /></p>
<?php
$general= get_option('myarcade_general'); if ( isset($_POST['editgame']) && $_POST['editgame'] == 'edit') { ?>
  <script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery("#closelink").click(function() {
      jQuery("#gstatus_<?php if (isset($_POST['gameid']) ) { echo $_POST['gameid']; } ?>", top.document).html('<div style="color:red;">updated</div>');
    });
  });

  function publish_status() {
    jQuery("#gstatus_<?php if (isset($_POST['gameid']) ) { echo $_POST['gameid']; } ?>", top.document).html('<div style="color:red;">published</div>');
  }
  </script>

  <?php
 $REAA6191C2FA9B633A100C34B5C0CFB41 = $_POST['gameid']; if ( isset($_POST['leaderenable']) ) { $R5DA8BF25D28FC85D49F243ED80AA4725 = $_POST['leaderenable']; } else { $R5DA8BF25D28FC85D49F243ED80AA4725 = ''; } if ( isset($_POST['highscoretype']) ) { $RDE4020E832E17B73EE5E23F0583C82CA = $_POST['highscoretype']; } else { $RDE4020E832E17B73EE5E23F0583C82CA = 'high'; } $RAA26AA1C3F8566CEC196D55D538AB2E4 = ( !empty($_POST['score_bridge']) ) ? $_POST['score_bridge'] : ''; if ($_POST['published'] == '1') { $RE91192A00FF990477EE414AD5D708F08 = "UPDATE ".$wpdb->prefix . 'myarcadegames'." SET
      leaderboard_enabled = '$R5DA8BF25D28FC85D49F243ED80AA4725',
      highscore_type = '$RDE4020E832E17B73EE5E23F0583C82CA',
     WHERE id = '".$REAA6191C2FA9B633A100C34B5C0CFB41."'"; } else { $R9B395079675C6A66FF23EA9C6C4A668E = esc_sql(esc_attr($_POST['gamename'])); $RC5934A886BA9823EDE289AB2FD67CED1 = $_POST['gamedescr']; $RB8D54B4D3B9A1438304CEB19E759A7FA = $_POST['gameinstr']; $R115B951F4B0F140780CED3281D158F85 = $_POST['gamecontrols']; $R88A33D29429F80B24F150A7737FAA03B = $_POST['gametype']; $R3FA8DA3402B9B24298B2CE820E453C70 = esc_sql($_POST['gametags']); $RE20CE5055B79A7BAB6298F5BE3573071 = (isset($_POST['gamewidth'])) ? intval($_POST['gamewidth']) : ''; $RF5639FC8BF2E2FDBCEBD9F1553EA8EB0 = (isset($_POST['gameheight'])) ? intval($_POST['gameheight']) : ''; $R302D75657AB570D80AEE01AE14ED28B9 = array(); if ( $general['post_type'] != 'post' && post_type_exists( $general['post_type'] ) && !empty( $general['custom_category']) && taxonomy_exists($general['custom_category']) ) { foreach ($_POST['gamecategs'] as $RA1ED191365ABDD5CF62F138014E57648) { $R4323303B130B1FD6EF0F31C87DFCC7A5 = get_term_by('id', $RA1ED191365ABDD5CF62F138014E57648, $general['custom_category']); $R302D75657AB570D80AEE01AE14ED28B9[] = $R4323303B130B1FD6EF0F31C87DFCC7A5->name; } } else { foreach ($_POST['gamecategs'] as $RA1ED191365ABDD5CF62F138014E57648) { $R302D75657AB570D80AEE01AE14ED28B9[] = get_cat_name($RA1ED191365ABDD5CF62F138014E57648); } } $R30E38C1F8EC85F8EE8DF620FF3267157 = implode(",", $R302D75657AB570D80AEE01AE14ED28B9); $RE91192A00FF990477EE414AD5D708F08 = "UPDATE ".$wpdb->prefix . 'myarcadegames'." SET
      name          = '$R9B395079675C6A66FF23EA9C6C4A668E',
      game_type     = '$R88A33D29429F80B24F150A7737FAA03B',
      categories    = '$R30E38C1F8EC85F8EE8DF620FF3267157',
      description   = '$RC5934A886BA9823EDE289AB2FD67CED1',
      tags          = '$R3FA8DA3402B9B24298B2CE820E453C70',
      instructions  = '$RB8D54B4D3B9A1438304CEB19E759A7FA',
      controls      = '$R115B951F4B0F140780CED3281D158F85',
      width         = '$RE20CE5055B79A7BAB6298F5BE3573071',
      height        = '$RF5639FC8BF2E2FDBCEBD9F1553EA8EB0',
      leaderboard_enabled = '$R5DA8BF25D28FC85D49F243ED80AA4725',
      highscore_type = '$RDE4020E832E17B73EE5E23F0583C82CA',
      score_bridge = '$RAA26AA1C3F8566CEC196D55D538AB2E4'
     WHERE id = '".$REAA6191C2FA9B633A100C34B5C0CFB41."'"; } $R679E9B9234E2062F809DBD3325D37FB6 = $wpdb->query($RE91192A00FF990477EE414AD5D708F08); if ($R679E9B9234E2062F809DBD3325D37FB6) { echo '<div class="mabp_info">'.__("Game has been updated!", 'myarcadeplugin').'</div>'; } else { echo '<div class="mabp_error">'.__("Can't update the game!", 'myarcadeplugin').'</div>'; } } else { $REAA6191C2FA9B633A100C34B5C0CFB41 = $_GET['gameid']; } $R69F05BD3024E3A18B29F11DF8A3E8C79 = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . 'myarcadegames'." WHERE id = '$REAA6191C2FA9B633A100C34B5C0CFB41' LIMIT 1", ARRAY_A); $R849D693C62DFE15394A642123C1599C8 = ''; $RD252C37FE01936F2B73F14B217348C9B = "<button class=\"button-secondary\" onclick = \"jQuery('#gstatus_$REAA6191C2FA9B633A100C34B5C0CFB41').html('<div class=\'gload\'> </div>');jQuery.post('".admin_url('admin-ajax.php')."',{action:'myarcade_handler',gameid:'$REAA6191C2FA9B633A100C34B5C0CFB41',func:'publish'},function(data){jQuery('#gstatus_$REAA6191C2FA9B633A100C34B5C0CFB41').html(data);});jQuery('#gstatus_$REAA6191C2FA9B633A100C34B5C0CFB41', top.document).html('<div style=\'color:red;\'>published</div>');self.parent.tb_remove();\">".__("Publish", 'myarcadeplugin')."</button>&nbsp;"; ?>

<div id="myabp_import">
  <form enctype="multipart/form-data" class="niceform" method="post" name="FormEditGame">

    <input class="button-secondary" id="submit" type="submit" name="submit" value="<?php _e("Save Changes", 'myarcadeplugin'); ?>" />
    <?php echo $RD252C37FE01936F2B73F14B217348C9B; ?>
    <div style="float:right">
      <button class="button-secondary" id="closelink" onclick="self.parent.tb_remove();return false;">Close</button>
    </div>

    <input type="hidden" name="gameid" value="<?php echo $_GET['gameid']; ?>" />
    <input type="hidden" name="editgame" value="edit" />
    <input type="hidden" name="published" value="<?php if ($R69F05BD3024E3A18B29F11DF8A3E8C79['status'] == 'published') { echo "1"; } else { echo "0"; } ?>" />

    <h2><?php _e("Edit Game", 'myarcadeplugin'); ?></h2>

    <div class="container">
      <div class="block">
        <table class="optiontable" width="100%">
          <?php if ($R69F05BD3024E3A18B29F11DF8A3E8C79['status'] == 'published') : ?>
          <?php $R849D693C62DFE15394A642123C1599C8 = ' disabled'; ?>
          <tr>
            <td colspan="2"><div class="myerror fade"><?php _e("You are about to edit a published game. Thereby, will only be able to change the score settings.", 'myarcadeplugin'); ?></div></td>
          </tr>
          <?php endif; ?>
          <tr>
            <td><h3><?php _e("Name", 'myarcadeplugin'); ?> <small>(<?php _e("required", 'myarcadeplugin'); ?>)</small></h3></td>
          </tr>
          <tr>
            <td>
              <input name="gamename" size="50" type="text" value="<?php echo stripslashes($R69F05BD3024E3A18B29F11DF8A3E8C79['name']); ?>" <?php echo $R849D693C62DFE15394A642123C1599C8; ?>/>
            </td>
          </tr>
        </table>
      </div>
    </div>

  <div class="container">
    <div class="block">
      <table class="optiontable" width="100%">
        <tr>
          <td colspan="2"><h3><?php _e("Game Dimensions", 'myarcadeplugin'); ?></h3></td>
        </tr>
        <tr>
          <td>
            <?php _e("Game width (px)", 'myarcadeplugin'); ?>: <input id="gamewidth" name="gamewidth" type="text" size="20" value="<?php echo $R69F05BD3024E3A18B29F11DF8A3E8C79['width']; ?>" />
          </td>
          <td>
            <?php _e("Game height (px)", 'myarcadeplugin'); ?>: <input id="gameheight" name="gameheight" type="text" size="20" value="<?php echo $R69F05BD3024E3A18B29F11DF8A3E8C79['height']; ?>" />
          </td>
        </tr>
      </table>
    </div>
  </div>

    <div class="container">
      <div class="block">
        <table class="optiontable" width="100%">
          <tr>
            <td><h3><?php _e("Game Description", 'myarcadeplugin'); ?> <small>(<?php _e("required", 'myarcadeplugin'); ?>)</small></h3></td>
          </tr>
          <tr>
            <td>
              <textarea rows="6" cols="80" name="gamedescr" <?php echo $R849D693C62DFE15394A642123C1599C8; ?>><?php echo stripslashes($R69F05BD3024E3A18B29F11DF8A3E8C79['description']); ?></textarea>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div class="container">
      <div class="block">
        <table class="optiontable" width="100%">
          <tr>
            <td><h3><?php _e("Game Instructions", 'myarcadeplugin'); ?></h3></td>
          </tr>
          <tr>
            <td>
              <textarea rows="6" cols="80" name="gameinstr" <?php echo $R849D693C62DFE15394A642123C1599C8; ?>><?php echo stripslashes($R69F05BD3024E3A18B29F11DF8A3E8C79['instructions']); ?></textarea>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div class="container">
      <div class="block">
        <table class="optiontable" width="100%">
          <tr>
            <td><h3><?php _e("Game Controls", 'myarcadeplugin'); ?></h3></td>
          </tr>
          <tr>
            <td>
              <textarea rows="6" cols="80" name="gamecontrols" <?php echo $R849D693C62DFE15394A642123C1599C8; ?>><?php echo $R69F05BD3024E3A18B29F11DF8A3E8C79['controls']; ?></textarea>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div class="container">
      <div class="block">
        <table class="optiontable" width="100%">
          <tr>
            <td><h3><?php _e("Tags", 'myarcadeplugin'); ?></h3></td>
          </tr>
          <tr>
            <td>
              <input name="gametags" type="text" size="50" value="<?php echo $R69F05BD3024E3A18B29F11DF8A3E8C79['tags']; ?>" <?php echo $R849D693C62DFE15394A642123C1599C8; ?>/>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div class="container">
      <div class="block">
        <table class="optiontable" width="100%">
          <tr>
            <td><h3><?php _e("Category", 'myarcadeplugin'); ?> <small>(<?php _e("required", 'myarcadeplugin'); ?>)</small></h3></td>
          </tr>
          <tr>
            <td>
            <?php
 $RE18A12DB8A8EFE79457F9479CCB42428 = explode (',', $R69F05BD3024E3A18B29F11DF8A3E8C79['categories']); $R324992E1D908AE64E82FC7E5043BAFCC = array(); if ( $general['post_type'] != 'post' && post_type_exists( $general['post_type'] ) && !empty( $general['custom_category']) && taxonomy_exists($general['custom_category']) ) { $RBB11B277EC9293602FBACB4A60E869EA = get_terms( $general['custom_category'], array( 'hide_empty' => 0 ) ); foreach($RBB11B277EC9293602FBACB4A60E869EA as $RDC864AEF0208ADD69DCBF1341856E8ED) { $R324992E1D908AE64E82FC7E5043BAFCC[$RDC864AEF0208ADD69DCBF1341856E8ED->term_id] = $RDC864AEF0208ADD69DCBF1341856E8ED->name; } } else { $R4316C623C9EFB610FC503F96F83500D7 = get_terms( 'category', array('fields' => 'ids', 'get' => 'all') ); foreach( $R4316C623C9EFB610FC503F96F83500D7 as $R071A72F0753E8BA584631D95E6E1432E ) { $R324992E1D908AE64E82FC7E5043BAFCC[$R071A72F0753E8BA584631D95E6E1432E] = get_cat_name($R071A72F0753E8BA584631D95E6E1432E) ; } } $RA16D2280393CE6A2A5428A4A8D09E354 = count($R324992E1D908AE64E82FC7E5043BAFCC); foreach ($R324992E1D908AE64E82FC7E5043BAFCC as $RA1ED191365ABDD5CF62F138014E57648 => $R96ED148C2F6F268FCB4CCBC4330538C7) { foreach ($RE18A12DB8A8EFE79457F9479CCB42428 as $R43CB7DE4CF52CFD74952A10702266570) { if ($R43CB7DE4CF52CFD74952A10702266570 == $R96ED148C2F6F268FCB4CCBC4330538C7) { $R581012B834CEFEDA9835E1E9CF08F396 = 'checked'; break; } else { $R581012B834CEFEDA9835E1E9CF08F396 = ''; } } $RA16D2280393CE6A2A5428A4A8D09E354--; $R53DBA466EE435BF798AB2C931C135018 = ''; if ($RA16D2280393CE6A2A5428A4A8D09E354 > 0) { $R53DBA466EE435BF798AB2C931C135018 = '<br />'; } echo '<input type="checkbox" name="gamecategs[]" value="'.$RA1ED191365ABDD5CF62F138014E57648.'" '.$R581012B834CEFEDA9835E1E9CF08F396.' '.$R849D693C62DFE15394A642123C1599C8.'/><label class="opt">&nbsp;'.$R96ED148C2F6F268FCB4CCBC4330538C7.'</label>'.$R53DBA466EE435BF798AB2C931C135018; } ?>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div class="container">
      <div class="block">
        <table class="optiontable" width="100%">
          <tr>
            <td><h3><?php _e("Highscore Settings", 'myarcadeplugin'); ?></h3></td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" name="leaderenable" value="1" <?php if ($R69F05BD3024E3A18B29F11DF8A3E8C79['leaderboard_enabled'] == '1') { echo 'checked'; } ?> /><label class="opt">&nbsp;<?php _e("Yes - This game is able to submit scores", 'myarcadeplugin'); ?></label>
            </td>
          </tr>
          <tr>
            <td>
              <p>
              <?php _e("Score Order (Highscore Type)", 'myarcadeplugin'); ?>
              <select size="1" name="highscoretype" id="highscoretype">
                <option value="high" <?php if ($R69F05BD3024E3A18B29F11DF8A3E8C79['highscore_type'] == 'high') { echo "selected"; } ?>><?php _e("DESC (High to Low)", 'myarcadeplugin') ;?></option>
                <option value="low" <?php if ($R69F05BD3024E3A18B29F11DF8A3E8C79['highscore_type'] == 'low') { echo "selected"; } ?>><?php _e("ASC (Low to High)", 'myarcadeplugin') ?></option>
              </select>
              </p>
            </td>
          </tr>
          <tr>
            <td>
              <?php _e("GamerSafe Support", 'myarcadeplugin'); ?>
             <input type="checkbox" name="score_bridge" value="gamersafe" <?php if ( $R69F05BD3024E3A18B29F11DF8A3E8C79['score_bridge'] == 'gamersafe') { echo 'checked'; } ?> /><label class="opt">&nbsp;<?php _e("Check this if the game has GamerSafe Data Bridge integrated.", 'myarcadeplugin'); ?></label>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div class="container">
      <div class="block">
        <table class="optiontable" width="100%">
          <tr>
            <td><h3><?php _e("Game Type", 'myarcadeplugin'); ?></h3></td>
          </tr>
          <tr>
            <td>
              <select size="1" name="gametype" id="gametype">
                <?php
 global $REC43CE978463AAD8D91F93AE43393035, $RF766CAD1517B606915734CB209F027B8; $RE054F7AA879B5BC82B1D74578162D95F = array_merge($REC43CE978463AAD8D91F93AE43393035, $RF766CAD1517B606915734CB209F027B8); foreach ($RE054F7AA879B5BC82B1D74578162D95F as $R7C60D7E1C05E3B82EF26F41346F5D850 => $R9B395079675C6A66FF23EA9C6C4A668E) : ?>
                  <option value="<?php echo $R7C60D7E1C05E3B82EF26F41346F5D850; ?>" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R69F05BD3024E3A18B29F11DF8A3E8C79['game_type'], $R7C60D7E1C05E3B82EF26F41346F5D850); ?>><?php echo $R9B395079675C6A66FF23EA9C6C4A668E; ?></option>
                  <?php
 endforeach; ?>
              </select>
              <br />
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div class="container">
      <div class="block">
        <input class="button-secondary" id="submit" type="submit" name="submit" value="<?php _e("Save Changes", 'myarcadeplugin'); ?>" />
        <?php echo $RD252C37FE01936F2B73F14B217348C9B; ?>
        <div style="float:right">
          <button class="button-secondary" id="closelink" onclick="self.parent.tb_remove();return false;">Close</button>
        </div>
      </div>
    </div>
  </form>
</div>
</div>
</body>
</html>