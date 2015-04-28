<?php
 $RA272EED39CFB584BB555165E3C9AA882 = dirname( dirname( dirname( dirname( dirname(__FILE__))))); if ( file_exists($RA272EED39CFB584BB555165E3C9AA882 . '/wp-load.php') ) { define('MYARCADE_DOING_ACTION', true); require_once($RA272EED39CFB584BB555165E3C9AA882 . '/wp-load.php'); } else { die(); } if ( function_exists('current_user_can') ) { if ( !current_user_can('manage_options') ) { die(); } } else { die(); } ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>
  <body style = "margin:0px !important;text-align:center;background-color: #222222;">
    <?php
 if ( isset($_GET['gameid']) ) { echo get_game($_GET['gameid'], false, true); } ?>
  </body>
</html>