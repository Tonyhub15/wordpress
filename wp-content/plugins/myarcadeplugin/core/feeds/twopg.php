<?php
 if ( ! defined( 'ABSPATH' ) ) { exit; } function myarcade_settings_twopg() { $twopg = get_option( 'myarcade_twopg' ); ?>
  <h2 class="trigger"><?php _e("2 Player Games", 'myarcadeplugin'); ?></h2>
  <div class="toggle_container">
    <div class="block">
      <table class="optiontable" width="100%" cellpadding="5" cellspacing="5">
        <tr>
          <td colspan="2">
            <i>
              <?php _e("2 Player Games offers unique multi player games.", 'myarcadeplugin'); ?> Click <a href="http://2pg.com">here</a> to visit the 2PG site.
            </i>
            <br /><br />
          </td>
        </tr>
        <tr><td colspan="2"><h3><?php _e("Feed URL", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="text" size="40"  name="twopg_url" value="<?php echo $twopg['feed']; ?>" />
          </td>
          <td><i><?php _e("Edit this field only if Feed URL has been changed!", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Fetch All Categories", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="checkbox" name="twopg_all_categories" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($twopg['all_categories'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
          </td>
          <td><i><?php _e("Activate this if you want to fetch all games independent of your activated categories.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Automated Game Publishing", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <input type="checkbox" name="twopg_cron_publish" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($twopg['cron_publish'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
          </td>
          <td><i><?php _e("Enable this if you want to publish games automatically. Go to 'General Settings' to select a cron interval.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h4><?php _e("Publish Games", 'myarcadeplugin'); ?></h4></td></tr>

        <tr>
          <td>
            <input type="text" size="40"  name="twopg_cron_publish_limit" value="<?php echo $twopg['cron_publish_limit']; ?>" />
          </td>
          <td><i><?php _e("How many games should be published on every cron trigger?", 'myarcadeplugin'); ?></i></td>
        </tr>

      </table>
      <input class="button button-primary" id="submit" type="submit" name="submit" value="<?php _e("Save Settings", 'myarcadeplugin'); ?>" />
    </div>
  </div>
  <?php
} function myarcade_save_settings_twopg() { $R7705127947020CA2ED921BE6E0FA664F = filter_input( INPUT_POST, 'myarcade_save_settings_nonce'); if ( ! $R7705127947020CA2ED921BE6E0FA664F || ! wp_verify_nonce( $R7705127947020CA2ED921BE6E0FA664F, 'myarcade_save_settings' ) ) { return; } $twopg = array(); $twopg['feed'] = (isset($_POST['twopg_url'])) ? esc_sql($_POST['twopg_url']) : ''; $twopg['all_categories'] = (isset($_POST['twopg_all_categories'])) ? true : false; $twopg['cron_publish'] = (isset($_POST['twopg_cron_publish']) ) ? true : false; $twopg['cron_publish_limit'] = (isset($_POST['twopg_cron_publish_limit']) ) ? intval($_POST['twopg_cron_publish_limit']) : 1; update_option('myarcade_twopg', $twopg); } function F3726A5B4D17B893C3023451AF26BA2AA() { } function myarcade_feed_twopg($R9FE302BDF914868081913A22F58F9E7E) { global $wpdb; $R1C087CFC2417747F08C78E3E5D5121E5 = array( 'echo' => false, 'settings' => array() ); $RAA7BB4B05FBD27DB7CA594893F166B47 = wp_parse_args( $R9FE302BDF914868081913A22F58F9E7E, $R1C087CFC2417747F08C78E3E5D5121E5 ); extract($RAA7BB4B05FBD27DB7CA594893F166B47); $R630F8C3F00ED4BE49091A902C671B200 = 0; $R7E48A94D08652CE34DE703DF9E891458 = false; $twopg = get_option('myarcade_twopg'); $R281A0F7BC3D849F3386A5AC36FB35807 = get_option('myarcade_categories'); if ( !empty($settings) ) { $settings = array_merge($twopg, $settings); } else { $settings = $twopg; } require_once( MYARCADE_CORE_DIR . '/fetch.php' ); $R569981A9B29B5950206124A5933F6CB9 = F720E8C77506CFC05F85A08A7EF8F1D41( array( 'url' => $settings['feed'], 'service' => 'xml', 'echo' => true ) ); if ( !empty($R569981A9B29B5950206124A5933F6CB9) && isset($R569981A9B29B5950206124A5933F6CB9->gameset) ) { foreach ($R569981A9B29B5950206124A5933F6CB9->gameset->game as $R2CDAD6EF7D5C41B8DB9EB739620C280A) { $R69F05BD3024E3A18B29F11DF8A3E8C79 = new stdClass(); $R69F05BD3024E3A18B29F11DF8A3E8C79->uuid = $R2CDAD6EF7D5C41B8DB9EB739620C280A->id . '_twopg'; $R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag = md5( $R2CDAD6EF7D5C41B8DB9EB739620C280A->id . $R2CDAD6EF7D5C41B8DB9EB739620C280A->name . 'twopg' ); $R89FEDA984B61366DE78855CB7D5F44D1 = $wpdb->get_var("SELECT id FROM ".$wpdb->prefix . 'myarcadegames'." WHERE uuid = '".$R69F05BD3024E3A18B29F11DF8A3E8C79->uuid."' OR game_tag = '".$R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag."' OR name = '".esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->name)."'"); if ( !$R89FEDA984B61366DE78855CB7D5F44D1 ) { $R30E38C1F8EC85F8EE8DF620FF3267157 = explode( ',', $R2CDAD6EF7D5C41B8DB9EB739620C280A->category ); if ( ! $settings['all_categories'] ) { $R7E48A94D08652CE34DE703DF9E891458 = false; foreach ($R281A0F7BC3D849F3386A5AC36FB35807 as $RAE9A4476893066B7B92C648E9F0FDEE8) { foreach ( $R30E38C1F8EC85F8EE8DF620FF3267157 as $RCB6CF74D12D3949F4F3C570ECE4B9CB5 ) { if ( ($RAE9A4476893066B7B92C648E9F0FDEE8['Name'] == $RCB6CF74D12D3949F4F3C570ECE4B9CB5) && ($RAE9A4476893066B7B92C648E9F0FDEE8['Status'] == 'checked') ) { $R7E48A94D08652CE34DE703DF9E891458 = true; break; } } if ( $R7E48A94D08652CE34DE703DF9E891458 ) { break; } } if ($R7E48A94D08652CE34DE703DF9E891458 == false) { continue; } } $R2CDAD6EF7D5C41B8DB9EB739620C280A->gamecode = urldecode($R2CDAD6EF7D5C41B8DB9EB739620C280A->gamecode); if ( strpos( $R2CDAD6EF7D5C41B8DB9EB739620C280A->gamecode, 'src=') !== FALSE ) { $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'embed'; } else { $R33D3EC748433467E20D0947C3032E305 = pathinfo( $R2CDAD6EF7D5C41B8DB9EB739620C280A->gamecode , PATHINFO_EXTENSION ); switch ( $R33D3EC748433467E20D0947C3032E305 ) { case 'dcr' : { $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'dcr'; } break; case 'unity3d' : { $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'unity'; } case 'html' : { $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'iframe'; } break; default : { $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'twopg'; } break; } } $R69F05BD3024E3A18B29F11DF8A3E8C79->name = esc_sql( $R2CDAD6EF7D5C41B8DB9EB739620C280A->name ); $R69F05BD3024E3A18B29F11DF8A3E8C79->slug = F64A2F46BC8BAFD9163DD9691D1207278($R2CDAD6EF7D5C41B8DB9EB739620C280A->name); $R69F05BD3024E3A18B29F11DF8A3E8C79->description = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->description); $R69F05BD3024E3A18B29F11DF8A3E8C79->instructions = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->instructions); $R69F05BD3024E3A18B29F11DF8A3E8C79->categs = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->category); $R69F05BD3024E3A18B29F11DF8A3E8C79->thumbnail_url = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->thumbnail); $R69F05BD3024E3A18B29F11DF8A3E8C79->swf_url = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->gamecode); $R69F05BD3024E3A18B29F11DF8A3E8C79->width = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->width); $R69F05BD3024E3A18B29F11DF8A3E8C79->height = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->height); $R69F05BD3024E3A18B29F11DF8A3E8C79->screen1_url = !empty($R2CDAD6EF7D5C41B8DB9EB739620C280A->screenshot_1) ? $R2CDAD6EF7D5C41B8DB9EB739620C280A->screenshot_1 : ''; $R69F05BD3024E3A18B29F11DF8A3E8C79->screen2_url = !empty($R2CDAD6EF7D5C41B8DB9EB739620C280A->screenshot_2) ? $R2CDAD6EF7D5C41B8DB9EB739620C280A->screenshot_2 : ''; $R69F05BD3024E3A18B29F11DF8A3E8C79->screen3_url = !empty($R2CDAD6EF7D5C41B8DB9EB739620C280A->screenshot_3) ? $R2CDAD6EF7D5C41B8DB9EB739620C280A->screenshot_3 : ''; $R69F05BD3024E3A18B29F11DF8A3E8C79->screen4_url = !empty($R2CDAD6EF7D5C41B8DB9EB739620C280A->screenshot_4) ? $R2CDAD6EF7D5C41B8DB9EB739620C280A->screenshot_4 : ''; $R69F05BD3024E3A18B29F11DF8A3E8C79->tags = ( !empty($R2CDAD6EF7D5C41B8DB9EB739620C280A->tags) ) ? esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->tags) : ''; $R630F8C3F00ED4BE49091A902C671B200++; FF09D7482BA5FAADAB6D947666FFD8C43( $R69F05BD3024E3A18B29F11DF8A3E8C79, $echo ); } } } FC6BC39ED73177ED6BA0A3E5B1C3D6848( $R630F8C3F00ED4BE49091A902C671B200, $echo ); } ?>