<?php
/**
 * MyArcadePlugin Achivements Integration
 *
 * @author Daniel Bakovic <contact@myarcadeplugin.com>
 * @copyright (c) 2014, Daniel Bakovic
 * @license http://myarcadeplugin.com
 * @package MyArcadePlugin/Modules/Achievements
 */

// No direct access
if ( !defined( 'ABSPATH' ) ) {
  exit;
}

// Proceed only if Achievements Plugin is available
if ( class_exists( 'DPA_CPT_Extension' ) ) :

  /**
   * Extends Achievements to support actions from MyArcadePlugin
   *
   */
  function dpa_init_myarcade_extension() {
    achievements()->extensions->myarcadeplugin = new DPA_MyArcadePlugin_Extension;

    // Tell the world that the MyArcadePlugin extension is ready
    do_action( 'dpa_init_myarcade_extension' );
  }
  add_action( 'dpa_ready', 'dpa_init_myarcade_extension' );

  /**
   * Extension to add MyArcadePlugin support to Achievements
   *
   */
  class DPA_MyArcadePlugin_Extension extends DPA_Extension {

    /**
     * Sets up extension properties
     *
     * @access public
     * @return void
     */
    public function __construct() {
      $this->actions = array(
        'myarcade_game_play'       => __( "The user plays a game.", 'myarcadeplugin'),
        'myarcade_new_score'       => __( "The user submits a new score.", 'myarcadeplugin'),
        'myarcade_new_highscore'   => __( "The user submits a new highscore.", 'myarcadeplugin'),
        'myarcade_new_medal'       => __( "The user achieves a new medal.", 'myarcadeplugin')
      );

      $this->contributors = array(
        array(
          'name'          => 'MyArcadePlugin',
          'gravatar_url'  => 'http://www.gravatar.com/avatar/54b904a924d7d947b85391fdba36b1ba.png',
          'profile_url'   => 'http://myarcadeplugin.com/'
        )
      );

      $this->description      = __( "WordPress Arcade Solution - Create outstanding arcade sites based on WordPress.", 'myarcadeplugin' );
      $this->id               = 'myarcadeplugin';
      $this->image_url        = MYARCADE_URL . '/images/myarcadeplugin-772x250.png';
      $this->name             = 'MyArcadePlugin';
      $this->rss_url          = 'http://myarcadeplugin.com/feed/';
      $this->small_image_url  = MYARCADE_URL . '/images/myarcadeplugin-145x47.png';
      $this->version          = 1;
      $this->wporg_url        = 'http://myarcadeplugin.com/';

      add_filter( 'dpa_handle_event_user_id', array( $this, 'event_user_id' ), 10, 3 );
    }

    /**
     * For some actions from ScholarPress, get the user ID from the function arguments.
     *
     * @param int $user_id
     * @param string $action_name
     * @param array $action_func_args The action's arguments from func_get_args().
     * @return int|false New user ID or false to skip any further processing
     */
    public function event_user_id( $user_id, $action_name, $action_func_args ) {
      // Only deal with events added by this extension.
      if ( in_array( $action_name, array( 'myarcade_new_score', 'myarcade_new_highscore', 'myarcade_new_medal') ) ) {
        return $action_func_args[0]['user_id'];
      }
      else {
        return $user_id;
      }
    }
  }
endif; // end class_exists
?>