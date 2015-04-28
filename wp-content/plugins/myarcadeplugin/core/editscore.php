<?php
 $RA272EED39CFB584BB555165E3C9AA882 = dirname( dirname( dirname( dirname( dirname(__FILE__))))); if ( file_exists($RA272EED39CFB584BB555165E3C9AA882 . '/wp-load.php') ) { define('MYARCADE_DOING_ACTION', true); require_once($RA272EED39CFB584BB555165E3C9AA882 . '/wp-load.php'); } else { die(); } if ( function_exists('current_user_can') && !current_user_can('manage_options') ) { die(); } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title><?php _e("Edit Game", 'myarcadeplugin'); ?></title>

<link rel='stylesheet' href='<?php bloginfo('url'); ?>/wp-admin/css/wp-admin.css' type='text/css' />
<link rel='stylesheet' href='<?php bloginfo('url'); ?>/wp-admin/css/colors-fresh.css' type='text/css' />
<link rel='stylesheet' href='<?php echo MYARCADE_CORE_URL; ?>/myarcadeplugin.css' type='text/css' />

<script type="text/javascript" src="<?php echo get_option('siteurl')."/".WPINC."/js/jquery/jquery.js"; ?>"></script>

</head>
<body>
  <div class="wrap">
    <div class="edit-score">
      <?php
 global $wpdb; if ( isset($_POST['submit']) ) { $R76DEB4EE4DC6EA7E1FEF468E443BA72A = $_POST['scoreid']; $RD94C2157798BCCE313068BF1BF25A119 = $_POST['score']; $RF96803C8EAC049356CCE10DDBE7B90E4 = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix.'myarcadescores'." WHERE id = '{$R76DEB4EE4DC6EA7E1FEF468E443BA72A}'"); $R57EDA64128F2B5D6CF71F8FC5822F82A = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix.'myarcadehighscores'." WHERE game_tag = '{$RF96803C8EAC049356CCE10DDBE7B90E4->game_tag}' AND user_id = '{$RF96803C8EAC049356CCE10DDBE7B90E4->user_id}' AND score = '{$RF96803C8EAC049356CCE10DDBE7B90E4->score}'"); if ( $R57EDA64128F2B5D6CF71F8FC5822F82A ) { $wpdb->query("UPDATE ".$wpdb->prefix.'myarcadehighscores'." SET score = '{$RD94C2157798BCCE313068BF1BF25A119}' WHERE id = '{$R57EDA64128F2B5D6CF71F8FC5822F82A->id}'"); } $R679E9B9234E2062F809DBD3325D37FB6 = $wpdb->query("UPDATE ".$wpdb->prefix.'myarcadescores'." SET score = '{$RD94C2157798BCCE313068BF1BF25A119}' WHERE id = '{$R76DEB4EE4DC6EA7E1FEF468E443BA72A}'"); if ($R679E9B9234E2062F809DBD3325D37FB6) { echo '<div id="message" class="updated fade">'.__("Score has been updated!", 'myarcadeplugin').'</div>'; ?>
          <script type="text/javascript">
            jQuery(document).ready(function() {
              jQuery("td#scoreval_<?php echo $R76DEB4EE4DC6EA7E1FEF468E443BA72A; ?>", top.document).html("<?php echo $RD94C2157798BCCE313068BF1BF25A119; ?>");
            });
          </script>
          <?php
 } else { echo '<div id="message" class="myerror fade">'.__("Can't update score!", 'myarcadeplugin').'</div>'; } } else { if ( !isset($_GET['scoreid']) ) { wp_die("Unknown score ID"); } $R76DEB4EE4DC6EA7E1FEF468E443BA72A = intval( $_GET['scoreid'] ); } $RD94C2157798BCCE313068BF1BF25A119 = $wpdb->get_var("SELECT score FROM ".$wpdb->prefix.'myarcadescores'." WHERE id = {$R76DEB4EE4DC6EA7E1FEF468E443BA72A}"); if (!$RD94C2157798BCCE313068BF1BF25A119) { wp_die("No score found"); } ?>
      <form method="post" name="formeditscore" id="formeditscore">
        <input type="hidden" name="scoreid" id="scoreid" value="<?php echo $R76DEB4EE4DC6EA7E1FEF468E443BA72A; ?>" />
        <br />
        <div class="container">
          <div class="block">
            <table class="optiontable">
              <tr>
                <td>Score</td>
                <td><input type="text" name="score" id="score" value="<?php echo $RD94C2157798BCCE313068BF1BF25A119; ?>" /></td>
                <td><input class="button-secondary" id="submit" type="submit" name="submit" value="<?php _e("Save Changes", 'myarcadeplugin'); ?>" /></td>
              </tr>
            </table>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>