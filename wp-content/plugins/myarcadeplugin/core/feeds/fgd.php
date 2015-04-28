<?php
 if ( ! defined( 'ABSPATH' ) ) { exit; } function myarcade_settings_fgd() { $fgd = get_option( 'myarcade_fgd' ); ?>
  <h2 class="trigger"><?php _e("FlashGameDistribution (FGD)", 'myarcadeplugin'); ?></h2>
  <div class="toggle_container">
    <div class="block">
      <table class="optiontable" width="100%" cellpadding="5" cellspacing="5">
        <tr>
          <td colspan="2">
            <i>
              <?php _e("FlashGameDistribution has over 10.000 games that you can add to your site with ease.", 'myarcadeplugin'); ?> Click <a href="http://flashgamedistribution.com">here</a> to visit the FlashGameDistribution site.
            </i>
            <br /><br />
          </td>
        </tr>
        <tr><td colspan="2"><h3><?php _e("Feed URL", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <input type="text" size="40"  name="fgdurl" value="<?php echo $fgd['feed']; ?>" />
          </td>
          <td><i><?php _e("Edit this field only if Feed URL has been changed!", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Fetch Games", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <input type="text" size="40"  name="fgdlimit" value="<?php echo $fgd['limit']; ?>" />
          </td>
          <td><i><?php _e("How many games should be fetched at once.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Automated Game Fetching", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <input type="checkbox" name="fgd_cron_fetch" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($fgd['cron_fetch'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
          </td>
          <td><i><?php _e("Enable this if you want to fetch games automatically. Go to 'General Settings' to select a cron interval.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h4><?php _e("Fetch Games", 'myarcadeplugin'); ?></h4></td></tr>

        <tr>
          <td>
            <input type="text" size="40"  name="fgd_cron_fetch_limit" value="<?php echo $fgd['cron_fetch_limit']; ?>" />
          </td>
          <td><i><?php _e("How many games should be fetched on every cron trigger?", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Automated Game Publishing", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <input type="checkbox" name="fgd_cron_publish" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($fgd['cron_publish'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
          </td>
          <td><i><?php _e("Enable this if you want to publish games automatically. Go to 'General Settings' to select a cron interval.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h4><?php _e("Publish Games", 'myarcadeplugin'); ?></h4></td></tr>

        <tr>
          <td>
            <input type="text" size="40"  name="fgd_cron_publish_limit" value="<?php echo $fgd['cron_publish_limit']; ?>" />
          </td>
          <td><i><?php _e("How many games should be published on every cron trigger?", 'myarcadeplugin'); ?></i></td>
        </tr>

      </table>
      <input class="button button-primary" id="submit" type="submit" name="submit" value="<?php _e("Save Settings", 'myarcadeplugin'); ?>" />
    </div>
  </div>
  <?php
} function myarcade_save_settings_fgd() { $R7705127947020CA2ED921BE6E0FA664F = filter_input( INPUT_POST, 'myarcade_save_settings_nonce'); if ( ! $R7705127947020CA2ED921BE6E0FA664F || ! wp_verify_nonce( $R7705127947020CA2ED921BE6E0FA664F, 'myarcade_save_settings' ) ) { return; } $fgd = array(); $fgd['feed'] = esc_url_raw( filter_input( INPUT_POST, 'fgdurl') ); $fgd['limit'] = (isset($_POST['fgdlimit'])) ? intval($_POST['fgdlimit']) : '50'; $fgd['cron_fetch'] = (isset($_POST['fgd_cron_fetch'])) ? true : false; $fgd['cron_fetch_limit'] = (isset($_POST['fgd_cron_fetch_limit']) ) ? intval($_POST['fgd_cron_fetch_limit']) : 1; $fgd['cron_publish'] = (isset($_POST['fgd_cron_publish']) ) ? true : false; $fgd['cron_publish_limit'] = (isset($_POST['fgd_cron_publish_limit']) ) ? intval($_POST['fgd_cron_publish_limit']) : 1; update_option('myarcade_fgd', $fgd); } function F112B67171B8A03E47F64FF79BE300D55() { } function myarcade_feed_fgd( $R9FE302BDF914868081913A22F58F9E7E = array() ) { global $wpdb; $R1C087CFC2417747F08C78E3E5D5121E5 = array( 'echo' => false, 'settings' => array(), ); $RAA7BB4B05FBD27DB7CA594893F166B47 = wp_parse_args( $R9FE302BDF914868081913A22F58F9E7E, $R1C087CFC2417747F08C78E3E5D5121E5 ); extract($RAA7BB4B05FBD27DB7CA594893F166B47); $R630F8C3F00ED4BE49091A902C671B200 = 0; $R7E48A94D08652CE34DE703DF9E891458 = false; $fgd = get_option('myarcade_fgd'); $R281A0F7BC3D849F3386A5AC36FB35807 = get_option('myarcade_categories'); if ( !empty($settings) ) { $settings = array_merge($fgd, $settings); } else { $settings = $fgd; } if ( !isset($settings['method']) ) { $settings['method'] = 'latest'; } $RAD6D6ADD59F91C690CE029D064278711 ='?feed=json'; if ($settings['limit'] > 0) { $RFED47D15719EF82BD3F83B580230DA5B = '&gpp='.$settings['limit']; } else { $RFED47D15719EF82BD3F83B580230DA5B = ''; } if ( $settings['method'] == 'offset' ) { $R21D2FF6532680118302411CA69147BF1 = '&start='.intval($settings['offset']); } else { $R21D2FF6532680118302411CA69147BF1 = ''; } if ( !empty($settings['limit']) ) { $RFED47D15719EF82BD3F83B580230DA5B = '&gpp='.$settings['limit']; } else { $RFED47D15719EF82BD3F83B580230DA5B = ''; } if ( $settings['method'] == 'offset') { $R21D2FF6532680118302411CA69147BF1 = '&start='.$settings['offset']; } else { $R21D2FF6532680118302411CA69147BF1 = ''; } if( ! isset( $settings['gamersafe'] ) ) { $settings['gamersafe'] = false; } $RF0EAC6DAF5B3AF677609338C1E10A2F4 = trim($fgd['feed']).$RAD6D6ADD59F91C690CE029D064278711.$RFED47D15719EF82BD3F83B580230DA5B.$R21D2FF6532680118302411CA69147BF1; require_once( MYARCADE_CORE_DIR . '/fetch.php' ); $RC12AC9F8ECF1A75EF50F5C500668B033 = F720E8C77506CFC05F85A08A7EF8F1D41( array('url' => $RF0EAC6DAF5B3AF677609338C1E10A2F4, 'service' => 'json', 'echo' => $echo) ); if ( !empty($RC12AC9F8ECF1A75EF50F5C500668B033) ) { foreach ($RC12AC9F8ECF1A75EF50F5C500668B033 as $R2CDAD6EF7D5C41B8DB9EB739620C280A) { if ( $settings['gamersafe'] == true ) { if ( ! isset( $R2CDAD6EF7D5C41B8DB9EB739620C280A->apis ) || 'gamersafe' !== strtolower( $R2CDAD6EF7D5C41B8DB9EB739620C280A->apis ) ) { continue; } } $R69F05BD3024E3A18B29F11DF8A3E8C79 = new stdClass(); $R69F05BD3024E3A18B29F11DF8A3E8C79->uuid = $R2CDAD6EF7D5C41B8DB9EB739620C280A->game_id . '_fgd'; $R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag = md5($R2CDAD6EF7D5C41B8DB9EB739620C280A->game_id . 'fgd' ); $R89FEDA984B61366DE78855CB7D5F44D1 = $wpdb->get_var("SELECT id FROM ".$wpdb->prefix . 'myarcadegames'." WHERE uuid = '".$R69F05BD3024E3A18B29F11DF8A3E8C79->uuid."' OR game_tag = '".$R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag."' OR name = '".esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->title)."'"); if ( !$R89FEDA984B61366DE78855CB7D5F44D1 ) { $R7E48A94D08652CE34DE703DF9E891458 = false; $R30E38C1F8EC85F8EE8DF620FF3267157 = explode(',', $R2CDAD6EF7D5C41B8DB9EB739620C280A->genres); for ($RA16D2280393CE6A2A5428A4A8D09E354 = 0; $RA16D2280393CE6A2A5428A4A8D09E354 < count($R30E38C1F8EC85F8EE8DF620FF3267157); $RA16D2280393CE6A2A5428A4A8D09E354++){ if ($R30E38C1F8EC85F8EE8DF620FF3267157[$RA16D2280393CE6A2A5428A4A8D09E354] == 'Shooter') { $R30E38C1F8EC85F8EE8DF620FF3267157[$RA16D2280393CE6A2A5428A4A8D09E354] = 'Shooting'; } if ($R30E38C1F8EC85F8EE8DF620FF3267157[$RA16D2280393CE6A2A5428A4A8D09E354] == 'RGP') { $R30E38C1F8EC85F8EE8DF620FF3267157[$RA16D2280393CE6A2A5428A4A8D09E354] = 'Strategy'; } if ($R30E38C1F8EC85F8EE8DF620FF3267157[$RA16D2280393CE6A2A5428A4A8D09E354] == 'Arcade') { $R30E38C1F8EC85F8EE8DF620FF3267157[$RA16D2280393CE6A2A5428A4A8D09E354] = 'Action'; } if ($R30E38C1F8EC85F8EE8DF620FF3267157[$RA16D2280393CE6A2A5428A4A8D09E354] == 'Puzzle') { $R30E38C1F8EC85F8EE8DF620FF3267157[$RA16D2280393CE6A2A5428A4A8D09E354] = 'Puzzles'; } if ($R30E38C1F8EC85F8EE8DF620FF3267157[$RA16D2280393CE6A2A5428A4A8D09E354] == 'Gadgets') { $R30E38C1F8EC85F8EE8DF620FF3267157[$RA16D2280393CE6A2A5428A4A8D09E354] = 'Other'; } } foreach($R30E38C1F8EC85F8EE8DF620FF3267157 as $R7697B8C9FB68C249A0DBC0C50B6CFD55) { foreach ($R281A0F7BC3D849F3386A5AC36FB35807 as $RAE9A4476893066B7B92C648E9F0FDEE8) { if ( $RAE9A4476893066B7B92C648E9F0FDEE8['FGD'] == true ) { if ( ($RAE9A4476893066B7B92C648E9F0FDEE8['Name'] == $R7697B8C9FB68C249A0DBC0C50B6CFD55) && ($RAE9A4476893066B7B92C648E9F0FDEE8['Status'] == 'checked') ) { $R7E48A94D08652CE34DE703DF9E891458 = true; break; } } } if ($R7E48A94D08652CE34DE703DF9E891458 == true) { break; } } if ($R7E48A94D08652CE34DE703DF9E891458 == true) { $R294E407FFD0BBD22EA24DD907D5DDE58 = implode(",", array_unique( $R30E38C1F8EC85F8EE8DF620FF3267157 ) ); } else { continue; } $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'fgd'; $R69F05BD3024E3A18B29F11DF8A3E8C79->name = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->title); $R69F05BD3024E3A18B29F11DF8A3E8C79->slug = F64A2F46BC8BAFD9163DD9691D1207278($R2CDAD6EF7D5C41B8DB9EB739620C280A->title); $R69F05BD3024E3A18B29F11DF8A3E8C79->created = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->creation_ts); $R69F05BD3024E3A18B29F11DF8A3E8C79->description = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->full_description); $R69F05BD3024E3A18B29F11DF8A3E8C79->tags = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->tags); $R69F05BD3024E3A18B29F11DF8A3E8C79->categs = $R294E407FFD0BBD22EA24DD907D5DDE58; $R69F05BD3024E3A18B29F11DF8A3E8C79->control = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->control_type); $R69F05BD3024E3A18B29F11DF8A3E8C79->thumbnail_url = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->thumb_filename); $R69F05BD3024E3A18B29F11DF8A3E8C79->swf_url = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->swf_filename); $R69F05BD3024E3A18B29F11DF8A3E8C79->width = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->width); $R69F05BD3024E3A18B29F11DF8A3E8C79->height = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->height); $R69F05BD3024E3A18B29F11DF8A3E8C79->leaderboard_enabled = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->highscores); if ( isset( $R2CDAD6EF7D5C41B8DB9EB739620C280A->apis ) && 'gamersafe' == strtolower( $R2CDAD6EF7D5C41B8DB9EB739620C280A->apis ) ) { $R69F05BD3024E3A18B29F11DF8A3E8C79->score_bridge = 'gamersafe'; } $R630F8C3F00ED4BE49091A902C671B200++; FF09D7482BA5FAADAB6D947666FFD8C43( $R69F05BD3024E3A18B29F11DF8A3E8C79, $echo ); } } } FC6BC39ED73177ED6BA0A3E5B1C3D6848( $R630F8C3F00ED4BE49091A902C671B200, $echo ); } ?>