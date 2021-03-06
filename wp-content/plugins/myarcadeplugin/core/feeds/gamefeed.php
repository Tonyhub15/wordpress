<?php
 if ( ! defined( 'ABSPATH' ) ) { exit; } function myarcade_settings_gamefeed() { $gamefeed = get_option( 'myarcade_gamefeed' ); ?>
  <h2 class="trigger"><?php _e("GameFeed by TalkArcades", 'myarcadeplugin'); ?></h2>
  <div class="toggle_container">
    <div class="block">
      <table class="optiontable" width="100%" cellpadding="5" cellspacing="5">
        <tr>
          <td colspan="2">
            <i>
              <?php echo sprintf( __("You need a free account on TalkArcades to be able to use the GameFeed AutoPublisher. Click %shere%s to create a new account.", 'myarcadeplugin'), '<a href="http://www.talkarcades.com" target="_blank">', '</a>'); ?>
            </i>
            <br /><br />
          </td>
        </tr>
        <tr><td colspan="2"><h3><?php _e("GameFeed AutoPublisher", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <select size="1" name="gamefeed_status" id="gamefeed_status">
              <option value="publish" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($gamefeed['status'], 'publish'); ?> ><?php _e("Publish", 'myarcadeplugin'); ?></option>
              <option value="draft" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($gamefeed['status'], 'draft'); ?> ><?php _e("Draft", 'myarcadeplugin'); ?></option>
              <option value="add" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($gamefeed['status'], 'add'); ?> ><?php _e("Add To Database (don't publish)", 'myarcadeplugin'); ?></option>
            </select>
          </td>
          <td><i><?php _e("Select a status for games added through AutoPublish from TalkArcades website.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Automated Game Publishing", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <input type="checkbox" name="gamefeed_cron_publish" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($gamefeed['cron_publish'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
          </td>
          <td><i><?php _e("Enable this if you want to publish games automatically. Go to 'General Settings' to select a cron interval. This will only work if you have unpublished TalkArcades Games in your database.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h4><?php _e("Publish Games", 'myarcadeplugin'); ?></h4></td></tr>

        <tr>
          <td>
            <input type="text" size="40"  name="gamefeed_cron_publish_limit" value="<?php echo $gamefeed['cron_publish_limit']; ?>" />
          </td>
          <td><i><?php _e("How many games should be published on every cron trigger?", 'myarcadeplugin'); ?></i></td>
        </tr>

      </table>
      <input class="button button-primary" id="submit" type="submit" name="submit" value="<?php _e("Save Settings", 'myarcadeplugin'); ?>" />
    </div>
  </div>
  <?php
} function myarcade_save_settings_gamefeed() { $myarcade_nonce = filter_input( INPUT_POST, 'myarcade_save_settings_nonce'); if ( ! $myarcade_nonce || ! wp_verify_nonce( $myarcade_nonce, 'myarcade_save_settings' ) ) { return; } $gamefeed = array(); $gamefeed['status'] = $_POST['gamefeed_status']; $gamefeed['cron_publish'] = (isset($_POST['gamefeed_cron_publish']) ) ? true : false; $gamefeed['cron_publish_limit'] = (isset($_POST['gamefeed_cron_publish_limit']) ) ? intval($_POST['gamefeed_cron_publish_limit']) : 1; update_option( 'myarcade_gamefeed', $gamefeed ); }