<?php
/**
 * MyArcadePlugin Cubepoints Integration
 *
 * @author Daniel Bakovic <contact@myarcadeplugin.com>
 * @copyright (c) 2014, Daniel Bakovic
 * @license http://myarcadeplugin.com
 * @package MyArcadePlugin/Modules/CubePoints
 */

// Proceed only if CubePoints is installed
if ( defined('CP_VER') ) :

/**
 * Extends the Cubepoints settings page
 */
function myarcade_cp_settings() {
  ?>
  <tr valign="top">
    <th scope="row">
      <label for="cp_pay_to_play"><?php _e('Deduct points for playing games (Pay To Play)', 'myarcadeplugin'); ?>:</label>
    </th>
    <td valign="middle">
      <input type="text" id="cp_pay_to_play" name="cp_pay_to_play" value="<?php echo get_option('cp_pay_to_play'); ?>" size="30" />
    </td>
    <td>
      <input type="button" onclick="document.getElementById('cp_pay_to_play').value='0'" value="<?php _e('Do not deduct points for game plays', 'myarcadeplugin'); ?>" class="button" />
    </td>
  </tr>

  <tr valign="top">
    <th scope="row">
      <label for="cp_pay_to_play_message"><?php _e('Pay To Play Message', 'myarcadeplugin'); ?>:</label>
    </th>
    <td valign="middle" colspan="2">
      <input type="text" id="cp_pay_to_play_message" name="cp_pay_to_play_message" value="<?php echo myarcade_get_pay_to_play_message(); ?>" size="50" />
    </td>
  </tr>

  <tr valign="top">
    <th scope="row">
      <label for="cp_play_points"><?php _e('Award points for playing games', 'myarcadeplugin'); ?>:</label>
    </th>
    <td valign="middle">
      <input type="text" id="cp_play_points" name="cp_play_points" value="<?php echo get_option('cp_play_points'); ?>" size="30" />
    </td>
    <td>
      <input type="button" onclick="document.getElementById('cp_play_points').value='0'" value="<?php _e('Do not add points for game plays', 'myarcadeplugin'); ?>" class="button" />
    </td>
  </tr>

  <tr valign="top">
    <th scope="row">
      <label for="cp_score_points"><?php _e('Points for submitting scores', 'myarcadeplugin'); ?>:</label>
    </th>
    <td valign="middle">
      <input type="text" id="cp_score_points" name="cp_score_points" value="<?php echo get_option('cp_score_points'); ?>" size="30" />
    </td>
    <td>
      <input type="button" onclick="document.getElementById('cp_score_points').value='0'" value="<?php _e('Do not add points for score submittes', 'myarcadeplugin'); ?>" class="button" />
    </td>
  </tr>

  <tr valign="top">
    <th scope="row">
      <label for="cp_highscore_points"><?php _e('Points for getting highscore', 'myarcadeplugin'); ?>:</label>
    </th>
    <td valign="middle">
      <input type="text" id="cp_highscore_points" name="cp_highscore_points" value="<?php echo get_option('cp_highscore_points'); ?>" size="30" />
    </td>
    <td>
      <input type="button" onclick="document.getElementById('cp_highscore_points').value='0'" value="<?php _e('Do not add points when user gets highscore on a game', 'myarcadeplugin'); ?>" class="button" />
    </td>
  </tr>

  <tr valign="top">
    <th scope="row">
      <label for="cp_medal_points"><?php _e('Points for achieving a medal', 'myarcadeplugin'); ?>:</label>
    </th>
    <td valign="middle">
      <input type="text" id="cp_medal_points" name="cp_medal_points" value="<?php echo get_option('cp_medal_points'); ?>" size="30" />
    </td>
    <td>
      <input type="button" onclick="document.getElementById('cp_medal_points').value='0'" value="<?php _e('Do not add points when user achieves a medal on a game', 'myarcadeplugin'); ?>" class="button" />
    </td>
  </tr>
  <?php
}


/**
 * Handles the MyArcadePlugin settings for Cubepoints
 */
function myarcade_cp_save_settings() {
  if ( isset($_POST['cp_admin_form_submit']) && $_POST['cp_admin_form_submit'] == 'Y') {
    update_option('cp_play_points', (int)$_POST['cp_play_points']);
    update_option('cp_score_points', (int)$_POST['cp_score_points']);
    update_option('cp_highscore_points', (int)$_POST['cp_highscore_points']);
    update_option('cp_medal_points', (int)$_POST['cp_medal_points']);
    update_option('cp_pay_to_play', (int)$_POST['cp_pay_to_play']);
    update_option('cp_pay_to_play_message', $_POST['cp_pay_to_play_message']);
  }
}

/**
 * Display the pay tp play error message when user doesn't have enough points
 *
 * @return string
 */
function myarcade_get_pay_to_play_message() {
  $message = get_option('cp_pay_to_play_message');
  if ( !$message ) {
    $message = __("Sorry, but you don't have enough credits to play games!", 'myarcadeplugin');
  }
  return stripslashes($message);
}

/**
 * Checks if the user has enough points to play this game
 * and deducts points for playing
 */
function myarcade_play_check_filter( $show_game ) {

  // Check if other filter has already changed the parameter
  if ( !$show_game ) {
    return $show_game;
  }

  // Pay To Play - requires CubePoints
  if ( defined('CP_VER') ) {
    $pay_to_play = (int) get_option( 'cp_pay_to_play' );

    if ( $pay_to_play ) {
      // Check if the user has enough points to play this game
      $user_points = cp_getPoints( cp_currentUser() );

      if ( $user_points >= $pay_to_play ) {
        // Deduct points
        cp_points( 'playedgame', cp_currentUser(), -$pay_to_play, '' );
        $show_game = true;
      }
      else {
        // Display an error message
        $message = apply_filters( 'myarcade_pay_to_play_error', '<div class="error">' . myarcade_get_pay_to_play_message() . '</div>');
        echo $message;
        $show_game = false;
      }
    }
  }

  return $show_game;
}
add_filter( 'myarcade_play_check', 'myarcade_play_check_filter' );


function myarcade_cp_play_game() {
  if( function_exists('cp_points') && is_user_logged_in() ) {
    $points = (int) get_option('cp_play_points');
    if ( $points > 0) {
      cp_points('playedgame', cp_currentUser(), $points, '');
    }
  }
}

function myarcade_cp_submit_score() {
  if( function_exists('cp_points') && is_user_logged_in() ) {
    $points = (int) get_option('cp_score_points');
    if ( $points > 0) {
      cp_points('scoresubmit', cp_currentUser(), $points, '');
    }
  }
}

function myarcade_cp_new_highscore() {
  if( function_exists('cp_points') && is_user_logged_in() ) {
    $points = (int) get_option('cp_highscore_points');
    if ( $points > 0) {
      cp_points('newhighscore', cp_currentUser(), $points, '');
    }
  }
}

function myarcade_cp_new_medal() {
  if( function_exists('cp_points') && is_user_logged_in() ) {
    $points = (int) get_option('cp_medal_points');
    if ( $points > 0) {
      cp_points('newmedal', cp_currentUser(), $points, '');
    }
  }
}

/**
 * Functions that handles the point Descriptions
 */
function myarcade_cp_admin_logs_desc($type) {
  switch ( $type ) {
    case 'playedgame':    { _e('Played a game', 'myarcadeplugin'); } break;
    case 'scoresubmit':   { _e('Submitted a score', 'myarcadeplugin'); } break;
    case 'newhighscore':  { _e('Got a new highscore', 'myarcadeplugin'); } break;
    case 'newmedal': { _e('Got a new medal', 'myarcadeplugin'); } break;
    default: return;
  }
}

/**
 *******************************************************************************
 *   C U B E P O I N T S  H O O K S
 *******************************************************************************
 */
add_action('cp_config_process', 'myarcade_cp_save_settings');
add_action('cp_config_form_points', 'myarcade_cp_settings');
add_action('cp_logs_description','myarcade_cp_admin_logs_desc', 10, 1);

add_action('myarcade_update_play_points', 'myarcade_cp_play_game');
add_action('myarcade_new_score', 'myarcade_cp_submit_score');
add_action('myarcade_new_highscore', 'myarcade_cp_new_highscore');
add_action('myarcade_new_medal', 'myarcade_cp_new_medal');
endif;
?>