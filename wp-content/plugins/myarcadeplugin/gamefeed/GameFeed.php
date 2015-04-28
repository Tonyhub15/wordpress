<?php
/**
 * GameFeed AutoPublisher for MyArcadePlugin
 *
 * @version 1.2.0
 * @author Daniel Bakovic <contact@myarcadeplugin.com>
 * @license http://myarcadeplugin.com
 *
 * Please check MyArcadePlugin documentation how to use this file!
 *
 * CHANGE LOG
 *
 * v1.2.1 - 2014-08-28
 *  Fix: unedfined function myarcade_upload_dir
 * 
 * v1.2.0 - 2014-07-27
 *  New: Replaced MyArcade constants
 *
 * v1.1.0 - 2013-07-15
 *  New: Updated GameFeed AutoPublisher by TalkArcades to WP 3.6
 *
 * v1.0.0 - 2013-03-31
 *  Initial Release
 */


//_______________________________________________________________
//_______________________________________________________________
//  parameters

$gfconf['debug']    = 0;
$gfconf['version']  = 11;

define( 'MYARCADE_DOING_ACTION', true );

//_______________________________________________________________
//  Includes/Filesytem

include "wp-config.php";
$gfconf['table_prefix'] = $table_prefix;

// Check if MyArcadePlugin is installed.
// This is needed because this script uses MyArcadePlugin functions.
if ( !defined('MYARCADE_VERSION') ) {
  exit( "MyArcadePlugin is missing!" );
}

if ( function_exists('function_name') ) {
  $upload_dir = myarcade_upload_dir();
}
else {
 $upload_dir = F40E3604E265E4DCB70700AB1EE0B17D9(); 
}

$gfconf['image_directory']           = $upload_dir['thumbsdir'];
$gfconf['game_directory']            = $upload_dir['gamesdir'];

//_______________________________________________________________
//  Database

$gfconf['category_tablename']        = "".$table_prefix."terms";
$gfconf['category_id_fieldname']     = "term_id";
$gfconf['category_name_fieldname']   = "name";
$gfconf['category_status_fieldname'] = "";
$gfconf['game_tablename']            = "".$table_prefix."posts";
$gfconf['game_plays_fieldname']      = "";
$gfconf['game_name_fieldname']       = "post_title";


//_______________________________________________________________
//
$gfconf['script']                    = basename(__FILE__);

$insecure = true;
if (array_key_exists('chlg', $_REQUEST) === true) {
  if ($_REQUEST['chlg'] != "") {
    if (checkchallenge($_REQUEST['chlg'])) {
      $insecure = false;
    }
  }
}
if ($insecure == true) {
  // DEBUG - commented out
   //exit("insecure");
}
//_______________________________________________________________
//  Command switch

if (array_key_exists('gfcmd', $_REQUEST) === true) {
  if ($_REQUEST['gfcmd'] != "") {
    switch ($_REQUEST['gfcmd']) {

      case "verify":
      case "status":
        // phat status returns lotso!
        // skinny status returns stat block
        $statusstr = sense();
      break;

      case "pullgame":
        // game identification
        // search for games by title
        // purify input
        $gameid = esc_sql($_REQUEST['gameid']);
        $apcid  = esc_sql($_REQUEST['apcid']);
        $dbg    = ( isset($_REQUEST['dbg'] ) ) ? esc_sql($_REQUEST['dbg']) : false;

        if ($gameid && $apcid) {
          $statusstr = pullgame($gameid, $apcid, $dbg);
        } else {
          $statusstr = "Missing parms [$gameid][$apcid].";
        }
      break;

      case "catmap":
        $statusstr = catmap();
      break;

      case "plays":
        $title = esc_sql($_REQUEST['title']);
        $statusstr = plays($title);
      break;

      default:
        // $statusstr = "bad call. AutoPublisher doesn't know command (". $command .").";
        $statusstr = "no.";
      break;
    }
  } else {
    // $statusstr = "bad call. AutoPublisher was passed an empty command (gfcmd).";
    $statusstr = "no.";
  }
} else {
 // $statusstr = "bad call. AutoPublisher needs command (gfcmd).";
 $statusstr = "no.";
}

// send back an acknowledgement
echo $statusstr;
// boom done bye
exit;


//_______________________________________________________________
function sensefs() {
  global $gfconf;
  $imgdir = $gfconf["image_directory"];
  $gamdir = $gfconf["game_directory"];
  $gamdirstat = 0;
  $imgdirstat = 0;
  $fsstr = "";
  if (file_exists($gamdir) === true) {
    $gamdirstat++;
    if(!is_file($gamdir)) {
      $gamdirstat++;
      if(is_writeable($gamdir)) {
        $gamdirstat++;
      }
    }
  }
  if (file_exists($imgdir) === true) {
    $imgdirstat++;
    if(!is_file($imgdir)) {
      $imgdirstat++;
      if(is_writeable($imgdir)) {
        $imgdirstat++;
      }
    }
  }
  switch($gamdirstat) {

    case 0:
      $fsstr .= "Can not locate directory <strong>". $gamdir ."</strong>. <br />";
    break;

    case 1:
      $fsstr .= "<strong>". $gamdir ."</strong> is a regular file but should be a directory. <br />";
    break;

    case 2:
      $fsstr .= "Can not copy game files to directory <strong>". $gamdir ."</strong>. <br />";
    break;

    case 3:
      $fsstr .= "";
    break;

    default:
      $fsstr .= "Internal error checking game directory ". $gamdir .". <br />";
    break;
  }

  switch($imgdirstat) {

    case 0:
      $fsstr .= "Can not locate directory <strong>". $imgdir ."</strong>. <br />";
    break;

    case 1:
      $fsstr .= "<strong>". $imgdir ."</strong> is a regular file but should be a directory. <br />";
    break;

    case 2:
      $fsstr .= "Can not copy game files to directory <strong>". $imgdir ."</strong>. <br />";
    break;

    case 3:
      $fsstr .= "";
    break;

    default:
      $fsstr .= "Internal error checking image directory ". $imgdir .". <br />";
    break;
  }

  if ($fsstr == "") {
    $fsstr = "clear.";
  }

  return $fsstr;
}


//_______________________________________________________________
function sensedb() {
  global $gfconf;
  $table = $gfconf["game_tablename"];
  $dbstat = 0;
  $dbstr = "unsetted";
  if (is_callable("mysql_connect") === true) {
    $dbstat++;
    if( mysql_num_rows( mysql_query("show tables like '".$table."'"))) {
      $dbstat++;
    } else {
      // check and return mysql_lasterror();
    }
  }

  switch($dbstat) {
    case 0:
      $dbstr = "mysql not callable.";
    break;
    case 1:
      $dbstr = "mysql not connected.";
    break;
    case 2:
      $dbstr = "clear.";
    break;
  }
  return $dbstr;
}


//_______________________________________________________________
function sense() {
  global $gfconf;
  $retn = "clear";
  $retn = array();
  $retn['cfg'] = "clear.";
  $retn['filesys'] = sensefs();
  $retn['db'] = sensedb();
  $retstr = $nms = $vls = "";
  foreach ($retn as $nm => $vl) {
    $nms .= $nm ."|";
    $vls .= $vl ."|";
  }
  $nms = substr($nms, 0, -1);
  $vls = substr($vls, 0, -1);
  $retstr = $nms ."-=-". $vls;
  return $retstr;
}

//_______________________________________________________________
function get_contents($tag, $url) {
  global $gfconf;
  $trys = 0;

  $stream = false;

  while (!$stream && $trys < 3)
  {
    $trys++;
    if ($gfconf['debug'] || $gfconf['remote_debug'] )
    {
      $stream = file_get_contents($url);

      if (!$stream) {
        $stream = file_get_contents_fopen($url);
      }

      if (!$stream) {
        $stream = file_get_contents_curl($url);
      }
    }
    else
    {
      $stream = @file_get_contents($url);

      if (!$stream) {
        $stream = @file_get_contents_fopen($url);
      }

      if (!$stream) {
        $stream = @file_get_contents_curl($url);
      }
    }
  }

  $gfconf['stream'] = $stream;

  $tryagain = "<br />Please try again.<br />";
  if (!$stream) {
    return "Could not open file ($tag) [url=$url]$tryagain";
  }

  if (strlen($stream) < 127) {
    return "Could not open file ($tag) [url=$url, err=$stream]";
  }

  return "";
}

//_______________________________________________________________
//   Grab local categories for mappings

function catmap() {
  global $gfconf;

  if ($gfconf[category_tablename] == "") {
    return "nocatsupport";
  }

  // Some systems include a status field for categories: enable or disabled
  $where = "";

  if ($gfconf[category_status_fieldname]) {
    $where = " where " . $gfconf[category_status_fieldname] . " > 0";
  }

  // Get the categories
  /*$sql = "select ". $gfconf[category_id_fieldname] ." as id ";
  $sql .= ", ";
  $sql .= $gfconf[category_name_fieldname] ." as name ";
  $sql .= "from ". $gfconf[category_tablename];
  $sql .= $where;
  $sql .= ";";*/

  $sql = "SELECT ".$gfconf['table_prefix']."terms.term_id as id, ".$gfconf['table_prefix']."terms.name as name FROM ".$gfconf['table_prefix']."terms LEFT JOIN ".$gfconf['table_prefix']."term_taxonomy ON
(".$gfconf['table_prefix']."terms.term_id = ".$gfconf['table_prefix']."term_taxonomy.term_taxonomy_id) WHERE ".$gfconf['table_prefix']."term_taxonomy.taxonomy = 'category'";

  if (!$result1 = mysql_query($sql)) {
    return "sql failed: ". mysql_error() .", $sql";
  }

  // return "sql failed: $sql";
  $kyz = "";
  $vlz = "";

  while ($row = mysql_fetch_array($result1)) {
    $kyz .= $row['name'] ."|";
    $vlz .= $row['id'] ."|";
  }

  $kyz = substr($kyz, 0, -1);
  $vlz = substr($vlz, 0, -1);

  return $kyz ."-=-". $vlz;
}


//_______________________________________________________________
//   Grab local plays for stats

function plays($gamename) {
  global $gfconf;

  // Get the play stats
  $sql = "SELECT " . $gfconf[game_plays_fieldname]." as plays FROM ".$gfconf[game_tablename]. " WHERE " . $gfconf[game_name_fieldname] . " = '" . $gamename . "'";

  if (!$result1 = mysql_query($sql)) {
    return "sql failed: $sql";
  }

  $row = mysql_fetch_array($result1);

  return $row['plays'];
}


//_______________________________________________________________
//  Install a game

function pullgame($gameid, $apcid, $remote_debug) {
  global $gfconf, $wpdb;

  $gfconf['remote_debug'] = $remote_debug;

  if ($gfconf['debug'] || $gfconf['remote_debug']) {
    $debug=1;
  }
  else {
    $debug = false;
  }

  if ($debug) {
    echo "<br />start: gameid=$gameid, apcid=$apcid, debug=$debug<br />";
  }


  $url = "http://www.talkarcades.com/gamefeed.php?do=feed&gameid=$gameid&apcid=$apcid";
  $err = get_contents("GF feed", $url);

  if ($err) {
    return $err;
  }

  if ($debug) {
    echo "<br />got feed: url=$url, feedstr=[".$gfconf['stream']."]<br />";
  }

  $twofisted = explode("-=|=-", $gfconf['stream']);
  $keez = explode("|||", $twofisted[0]);
  $valz = explode("|||", $twofisted[1]);
  // $a = array_combine($keez, $valz);  // array_combine is php5 and above
  $keyct = count($keez);

  // changed from <= to <
  for($ii=0; $ii < $keyct; $ii++ ) {
    $feed[$keez[$ii]] = $valz[$ii];
  }

  if ($feed['magic'] != "gamefeed") {
    return "Unexpected feed format.";
  }

  if ( !empty($feed['warning']) ) {
    return "".$feed['warning']."";
  }

  $gfconf['feed'] = $feed;

  //_______________________________________________________________
  //  Insert the db record, can be customized as needed... [CUSTOM]

  // Generate the MyArcadePlugin game object
  $game                = new stdClass;
  $game->uuid          = ( !empty( $feed['mochi_uuid'] ) ) ? $feed['mochi_uuid'] : $gameid . '_gamefeed';
  $game->game_tag      = ( !empty( $feed['mochi_tag'] ) ) ? $feed['mochi_tag'] : md5($game->uuid);
  $game->type          = 'gamefeed';
  $game->name          = $feed['title'];
  $game->slug          = ( !empty( $feed['mochi_slug']) ) ? $feed['mochi_slug'] : $feed['slug'];
  $game->created       = date("Y-m-d H:i:s");
  $game->description   = $feed['description'];
  $game->tags          = $feed['taglistCSV'];
  $game->instructions  = $feed['controlsSentence'];
  $game->rating        = '';
  $game->categs        = $feed['categoryname'];
  $game->control       = '';
  $game->thumbnail_url = $feed['image100path'];
  $game->swf_url       = $feed['gamepath'];
  $game->width         = $feed['width'];
  $game->height        = $feed['height'];
  $game->screen1_url   = $feed['image180path'];
  $game->screen1_url   = false;
  $game->screen2_url   = false;
  $game->screen3_url   = false;
  $game->screen4_url   = false;
  $game->video_url     = false;
  $game->leaderboard_enabled = ( !empty( $feed['highscores'] ) ) ? '1' : '';
  $game->highscore_type = 'high';
  $game->coins_enabled = '';
  $game->status        = 'new';

  $duplicate_game = $wpdb->get_var("SELECT id FROM ".$wpdb->prefix . 'myarcadegames'." WHERE uuid = '".$game->uuid."' OR game_tag = '".$game->game_tag."' OR name = '".esc_sql($game->name)."'");

  if ( $duplicate_game ) {
    if ( $debug ) {
      echo "<br />This Game is already in your database.<br />";
    }
    return "duplicate game";
  }

  // Add game to MyArcadePlugin table
  if ( function_exists('myarcade_insert_game') ) {
    myarcade_insert_game($game);
  }
  else {
    F3EC5FD80BBB0380830A5FDD537A22AB2($game);
  }

  $gamefeed = get_option('myarcade_gamefeed');

  if ( !empty( $gamefeed['status'] ) && $gamefeed['status'] != 'add' ) {
    $gameID = $wpdb->get_var("SELECT id FROM ".$wpdb->prefix . 'myarcadegames'." WHERE uuid = '$game->uuid'");

    if ( !empty($gameID) ) {
      if (function_exists('myarcade_add_games_to_blog') ) {
        myarcade_add_games_to_blog( array('game_id' => $gameID, 'post_status' => $gamefeed['status'], 'echo' => false) );
      }
      else {
        F5F9EB2BD2DA652CBF122EEF75C2BE581( array('game_id' => $gameID, 'post_status' => $gamefeed['status'], 'echo' => false) );
      }
    }
  }

  if ($debug) {
    echo "<br />did sql<br />";
  }

  return "clear";
}

//_______________________________________________________________
function checkfunc($func) {
  $retn = false;
  if (function_exists($func) === true) {
    if (is_callable($func) === true) {
     $retn = true;
   } else {
     unset($retn);
     $retn = "is not enabled.";
   }
 } else {
  unset($retn);
  $retn = "is not installed.";
}
return $retn;
}

//_______________________________________________________________
function detectsupport($testarray){
  $retstr = "";
  foreach($testarray as $chkme) {
    // test for
    $chkme = 'curl_init';
    $suppt = checkfunc($chkme);
    if ($suppt != true) {
     $retstr .= " ". $chkme ." ". $suppt .". \n";
   } else {
     $retstr .= " ". $chkme . " is ready. \n";
   }
 }
 return $retstr;
}


//_______________________________________________________________
function file_get_contents_curl($url) {
  $ch = curl_init();
  $timeout = 15; // set to zero for no timeout
  curl_setopt ($ch, CURLOPT_URL, $url);
  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

  ob_start();
  curl_exec($ch);
  curl_close($ch);
  $feed = ob_get_contents();
  ob_end_clean();

  return $feed;
}

//_______________________________________________________________
function file_get_contents_fopen($url) {
  $data=NULL;
  $dataHandle=fopen($url, "r" );
  if($dataHandle) {
    while (!feof($dataHandle)) {
      $data.= fread($dataHandle, 4096);
    }
    fclose($dataHandle);
  }
  return $data;
}

//_______________________________________________________________
//  // -- GameFeed Common
function checkchallenge($in_challenge) {
  $returnstatus = false;
  $apcchallenge = "FnLdW137wMXL4ZMK7ZA6nSkbnGVvuOACvIrBzDsEQ0orNxsNwzzFcWvQlkpVUOfA";
  if ($in_challenge == $apcchallenge) {
    $returnstatus = true;
  }

  return $returnstatus;
}

function gfdecode($in_str) {
  $a = array();
  if (strlen($in_str)) {
    $twofisted = explode("-=-", $in_str);
    $keez = explode("|", $twofisted[0]);
    $valz = explode("|", $twofisted[1]);
    $keyct = count($keez);

    for($ii=0;$ii<=$keyct;$ii++) {
      $a[$keez[$ii]] = $valz[$ii];
    }
  }

  return $a;
}
?>