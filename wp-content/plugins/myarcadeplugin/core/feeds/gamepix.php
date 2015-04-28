<?php
 if ( ! defined( 'ABSPATH' ) ) { exit; } function myarcade_settings_gamepix() { $gamepix = get_option( 'myarcade_gamepix' ); ?>
  <h2 class="trigger"><?php _e("GamePix", 'myarcadeplugin'); ?></h2>
  <div class="toggle_container">
    <div class="block">
      <table class="optiontable" width="100%" cellpadding="5" cellspacing="5">
        <tr>
          <td colspan="2">
            <i>
              <?php _e("GamePix offers you high quality HTML5 games.", 'myarcadeplugin'); ?> Click <a href="http://gamepix.com" target="_blank">here</a> to visit the GamePix site.
            </i>
            <br /><br />
          </td>
        </tr>
        <tr><td colspan="2"><h3><?php _e("Feed URL", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="text" size="40"  name="gamepix_url" value="<?php echo $gamepix['feed']; ?>" />
          </td>
          <td><i><?php _e("Edit this field only if Feed URL has been changed!", 'myarcadeplugin'); ?></i></td>
        </tr>

        <?php  ?>

        <tr><td colspan="2"><h3><?php _e("Category", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <select size="1" name="gamepix_category" id="gamepix_category">
              <option value="all" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($gamepix['category'], 'all'); ?> ><?php _e("All Games", 'myarcadeplugin'); ?></option>
              <option value="2" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($gamepix['category'], '2'); ?> ><?php _e("Arcade", 'myarcadeplugin'); ?></option>
              <option value="3" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($gamepix['category'], '3'); ?> ><?php _e("Adventure", 'myarcadeplugin'); ?></option>
              <option value="5" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($gamepix['category'], '5'); ?> ><?php _e("Casino", 'myarcadeplugin'); ?></option>
              <option value="6" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($gamepix['category'], '6'); ?> ><?php _e("Classics", 'myarcadeplugin'); ?></option>
              <option value="7" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($gamepix['category'], '7'); ?> ><?php _e("Puzzles", 'myarcadeplugin'); ?></option>
              <option value="8" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($gamepix['category'], '8'); ?> ><?php _e("Sports", 'myarcadeplugin'); ?></option>
              <option value="9" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($gamepix['category'], '9'); ?> ><?php _e("Strategy", 'myarcadeplugin'); ?></option>
            </select>
          </td>
          <td><i><?php _e("Select which games you would like to fetch.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Automated Game Publishing", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <input type="checkbox" name="gamepix_cron_publish" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($gamepix['cron_publish'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
          </td>
          <td><i><?php _e("Enable this if you want to publish games automatically. Go to 'General Settings' to select a cron interval.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h4><?php _e("Publish Games", 'myarcadeplugin'); ?></h4></td></tr>

        <tr>
          <td>
            <input type="text" size="40"  name="gamepix_cron_publish_limit" value="<?php echo $gamepix['cron_publish_limit']; ?>" />
          </td>
          <td><i><?php _e("How many games should be published on every cron trigger?", 'myarcadeplugin'); ?></i></td>
        </tr>

      </table>
      <input class="button button-primary" id="submit" type="submit" name="submit" value="<?php _e("Save Settings", 'myarcadeplugin'); ?>" />
    </div>
  </div>
  <?php
} function myarcade_save_settings_gamepix() { $R7705127947020CA2ED921BE6E0FA664F = filter_input( INPUT_POST, 'myarcade_save_settings_nonce'); if ( ! $R7705127947020CA2ED921BE6E0FA664F || ! wp_verify_nonce( $R7705127947020CA2ED921BE6E0FA664F, 'myarcade_save_settings' ) ) { return; } $settings = array(); $settings['feed'] = (isset($_POST['gamepix_url'])) ? esc_sql($_POST['gamepix_url']) : ''; $settings['publisher_id'] = (isset($_POST['gamepix_publisher_id'])) ? $_POST['gamepix_publisher_id'] : '10013'; $settings['site_id'] = (isset($_POST['gamepix_site_id'])) ? $_POST['gamepix_site_id'] : '20015'; $settings['category'] = (isset($_POST['gamepix_category'])) ? $_POST['gamepix_category'] : 'all'; $settings['cron_publish'] = (isset($_POST['gamepix_cron_publish']) ) ? true : false; $settings['cron_publish_limit'] = (isset($_POST['gamepix_cron_publish_limit']) ) ? intval($_POST['gamepix_cron_publish_limit']) : 1; update_option('myarcade_gamepix', $settings); } function myarcade_feed_gamepix( $R9FE302BDF914868081913A22F58F9E7E = array() ) { global $wpdb; $R1C087CFC2417747F08C78E3E5D5121E5 = array( 'echo' => false, 'settings' => array(), ); $RAA7BB4B05FBD27DB7CA594893F166B47 = wp_parse_args( $R9FE302BDF914868081913A22F58F9E7E, $R1C087CFC2417747F08C78E3E5D5121E5 ); extract($RAA7BB4B05FBD27DB7CA594893F166B47); $R630F8C3F00ED4BE49091A902C671B200 = 0; $R7E48A94D08652CE34DE703DF9E891458 = false; $gamepix = get_option('myarcade_gamepix'); $R281A0F7BC3D849F3386A5AC36FB35807 = get_option('myarcade_categories'); if ( !empty($settings) ) { $settings = array_merge($gamepix, $settings); } else { $settings = $gamepix; } if ( empty( $settings['publisher_id']) || empty( $settings['site_id']) ) { $settings['publisher_id'] = '10013'; $settings['site_id'] = '20015'; ?>
    <?php  ?>
      <?php  ?>
    <?php  ?>
    <?php
 } if ( $settings['category'] !== 'all' ) { $settings['feed'] = add_query_arg( array("category" => $settings['category'] ), trim( $settings['feed'] ) ); } $settings['feed'] = add_query_arg( array("pid" => $settings['publisher_id'] ), trim( $settings['feed'] ) ); $settings['feed'] = add_query_arg( array("sid" => $settings['site_id'] ), trim( $settings['feed'] ) ); require_once( MYARCADE_CORE_DIR . '/fetch.php' ); $RC12AC9F8ECF1A75EF50F5C500668B033 = F720E8C77506CFC05F85A08A7EF8F1D41( array( 'url' => $settings['feed'], 'service' => 'json', 'echo' => $echo) ); if ( !empty($RC12AC9F8ECF1A75EF50F5C500668B033->data) ) { foreach ($RC12AC9F8ECF1A75EF50F5C500668B033->data as $R2CDAD6EF7D5C41B8DB9EB739620C280A) { $R69F05BD3024E3A18B29F11DF8A3E8C79 = new stdClass(); $R69F05BD3024E3A18B29F11DF8A3E8C79->uuid = $R2CDAD6EF7D5C41B8DB9EB739620C280A->id . '_gamepix'; $R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag = md5( $R2CDAD6EF7D5C41B8DB9EB739620C280A->id . 'gamepix' ); $R89FEDA984B61366DE78855CB7D5F44D1 = $wpdb->get_var("SELECT id FROM ".$wpdb->prefix . 'myarcadegames'." WHERE uuid = '".$R69F05BD3024E3A18B29F11DF8A3E8C79->uuid."' OR game_tag = '".$R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag."' OR name = '".esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->title)."'"); if ( !$R89FEDA984B61366DE78855CB7D5F44D1 ) { $R7E48A94D08652CE34DE703DF9E891458 = false; $R30E38C1F8EC85F8EE8DF620FF3267157 = explode(',', $R2CDAD6EF7D5C41B8DB9EB739620C280A->category); $R294E407FFD0BBD22EA24DD907D5DDE58 = 'Other'; foreach($R30E38C1F8EC85F8EE8DF620FF3267157 as $R7697B8C9FB68C249A0DBC0C50B6CFD55) { switch ( $R7697B8C9FB68C249A0DBC0C50B6CFD55 ) { case 'Classics': { $R7697B8C9FB68C249A0DBC0C50B6CFD55 = 'Other'; } break; } foreach ($R281A0F7BC3D849F3386A5AC36FB35807 as $RAE9A4476893066B7B92C648E9F0FDEE8) { if ( ($RAE9A4476893066B7B92C648E9F0FDEE8['Name'] == $R7697B8C9FB68C249A0DBC0C50B6CFD55) && ($RAE9A4476893066B7B92C648E9F0FDEE8['Status'] == 'checked') ) { $R7E48A94D08652CE34DE703DF9E891458 = true; $R294E407FFD0BBD22EA24DD907D5DDE58 = $R7697B8C9FB68C249A0DBC0C50B6CFD55; break 2; } } } if ( ! $R7E48A94D08652CE34DE703DF9E891458 ) { continue; } $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'gamepix'; $R69F05BD3024E3A18B29F11DF8A3E8C79->name = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->title); $R69F05BD3024E3A18B29F11DF8A3E8C79->slug = F64A2F46BC8BAFD9163DD9691D1207278($R2CDAD6EF7D5C41B8DB9EB739620C280A->title); $R69F05BD3024E3A18B29F11DF8A3E8C79->description = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->description); $R69F05BD3024E3A18B29F11DF8A3E8C79->categs = $R294E407FFD0BBD22EA24DD907D5DDE58; $R69F05BD3024E3A18B29F11DF8A3E8C79->thumbnail_url = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->thumbnailUrl100); $R69F05BD3024E3A18B29F11DF8A3E8C79->swf_url = esc_sql( strtok( $R2CDAD6EF7D5C41B8DB9EB739620C280A->url, '?' ) ); $R69F05BD3024E3A18B29F11DF8A3E8C79->width = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->width); $R69F05BD3024E3A18B29F11DF8A3E8C79->height = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->height); $R630F8C3F00ED4BE49091A902C671B200++; FF09D7482BA5FAADAB6D947666FFD8C43( $R69F05BD3024E3A18B29F11DF8A3E8C79, $echo ); } } } FC6BC39ED73177ED6BA0A3E5B1C3D6848( $R630F8C3F00ED4BE49091A902C671B200, $echo ); } ?>