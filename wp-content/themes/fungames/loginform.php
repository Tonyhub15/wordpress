<?php if ( get_option('fungames_show_loginform') == 'enable' ) : ?>
  <div id="loginbox">
    <?php
    global $user_ID, $user_identity;
    get_currentuserinfo();

    if ( !$user_ID ) :
      // User is not logged in ...
      ?>
      <div class="reginfo">
        <?php _e('Register, upload AVATAR, save SCORES, meet FRIENDS!', 'fungames'); ?>
      </div>
      <form name="loginform" id="loginform" action="<?php echo home_url(); ?>/wp-login.php" method="post">
        <label>
          <?php _e('Username', 'fungames') ?>:
          <input type="text" name="log" id="log" value="" size="10" tabindex="7" />
        </label>
        <label>
          <?php _e('Password', 'fungames') ?>:
          <input type="password" name="pwd" id="pwd" value="" size="10" tabindex="8" />
        </label>
        <label>
          <input type="checkbox" name="rememberme" value="forever" tabindex="9" /> <?php _e("Remember me", 'fungames'); ?>
        </label>
        <input type="submit" name="submit" value="Login" tabindex="10" class="button" />
        <?php wp_register('', ''); ?>
        <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI'];?>"/>
      </form>
    <?php else : ?>
      <?php // User is logged in ... ?>
      <?php // check for buddypress or mingle ?>
      <div class="reginfo">
        <?php _e('Welcome back,', 'fungames'); ?> <?php echo $user_identity; ?>!
      </div>
      <div style="float:right;margin-right:10px;">
        <?php if ( defined('MNGL_PLUGIN_NAME') ) : ?>
          <?php
          global $mngl_options, $mngl_message;
          $unread_count = $mngl_message->get_unread_count();
          $unread_count_str = '[0]';
          if($unread_count) $unread_count_str = " [{$unread_count}]";
          ?>
          <a href="<?php echo get_permalink($mngl_options->activity_page_id); ?>" title="<?php _e("Activity Stream", 'fungames'); ?>"><font color="yellow"><?php _e('Activity', 'fungames'); ?></font></a>
          &nbsp;|&nbsp;
          <a href="<?php echo get_permalink($mngl_options->profile_page_id); ?>" title="<?php _e("View Your Profile Page", 'fungames'); ?>"><font color="yellow"><?php _e('Profile', 'fungames'); ?></font></a>
          &nbsp;|&nbsp;
          <a href="<?php echo get_permalink($mngl_options->profile_edit_page_id); ?>" title="<?php _e('Change Your Settings', 'fungames'); ?>"><font color="yellow"><?php _e("Settings", "fungames"); ?></font></a>
          &nbsp;|&nbsp;
          <a href="<?php echo get_permalink($mngl_options->friends_page_id); ?>" title="<?php _e('View Your Friends', 'fungames'); ?>"><font color="yellow"><?php _e('Friends', 'fungames'); ?></font></a>
          &nbsp;|&nbsp;
          <a href="<?php echo get_permalink($mngl_options->friend_requests_page_id); ?>" title="<?php _e('Add New Friends', 'fungames'); ?>"><font color="yellow"><?php _e('Friend Requests', 'fungames'); ?></font></a>
          &nbsp;|&nbsp;
          <a href="<?php echo get_permalink($mngl_options->inbox_page_id); ?>"><font color="yellow"><?php _e('Inbox', 'fungames'); ?> <?php echo $unread_count_str; ?></font></a>
        <?php elseif ( defined('BP_VERSION') ) : ?>
          <?php
          global $bp;

          if( bp_is_active('activity') ) :
            ?>
            <a href="<?php echo $bp->loggedin_user->domain . BP_ACTIVITY_SLUG . '/'; ?>"><?php _e('Activity', 'fungames'); ?></a>
            &nbsp;|&nbsp;
          <?php endif; ?>

          <a href="<?php echo site_url( bp_get_members_root_slug() ); ?>"><?php _e('Members', 'fungames'); ?></a>
          &nbsp;|&nbsp;

          <a href="<?php echo $bp->loggedin_user->domain ?>"><?php _e('Profile', 'fungames'); ?></a>
          <?php if ( isset( $bp->loaded_components['scores'] ) ) : ?>
            &nbsp;|&nbsp;
            <a href="<?php echo $bp->loggedin_user->domain . 'scores'; ?>"><?php _e('My Scores', 'fungames'); ?></a>
          <?php endif; ?>

        <?php endif; ?>

        &nbsp;|&nbsp;

        <?php
        if ( ! is_user_logged_in() )
          $link = '<a href="' . get_option('siteurl') . '/wp-login.php">' . __('Log in', 'fungames') . '</a>';
        else
          $link = "<a href='" . wp_nonce_url( site_url("/wp-login.php?action=logout&redirect_to=" . get_option('siteurl'), 'login'), 'log-out' ) . "'>".__('Log out', 'fungames')."</a>";

        echo apply_filters('loginout', $link);
        ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="clear"></div>
<?php endif; ?>