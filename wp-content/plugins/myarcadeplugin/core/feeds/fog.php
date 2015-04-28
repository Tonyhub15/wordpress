<?php
 if ( ! defined( 'ABSPATH' ) ) { exit; } function myarcade_settings_fog() { $fog = get_option( 'myarcade_fog' ); ?>
  <h2 class="trigger"><?php _e("FreeGamesForYourWebsite (FOG)", 'myarcadeplugin'); ?></h2>
  <div class="toggle_container">
    <div class="block">
      <table class="optiontable" width="100%" cellpadding="5" cellspacing="5">
        <tr>
          <td colspan="2">
            <p>
              <i>
                <?php _e("FreeGamesForYourWebsite provides a game feed with hand picked quality games from several sources.", 'myarcadeplugin'); ?> Click <a href="http://www.freegamesforyourwebsite.com">here</a> to visit the FreeGamesForYourWebsite site.
              </i>
            </p>
          </td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Feed URL", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="text" size="40"  name="fogurl" value="<?php echo $fog['feed']; ?>" />
          </td>
          <td><i><?php _e("Edit this field only if Feed URL has been changed!", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Fetch Games", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="text" size="40"  name="foglimit" value="<?php echo $fog['limit']; ?>" />
          </td>
          <td><i><?php _e("How many games should be fetched at once. Enter 'all' (without quotes) if you want to fetch all games. Otherwise enter an integer.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Thumbnail Size", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <select size="1" name="fogthumbsize" id="fogthumbsize">
              <option value="small" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['thumbsize'], 'small'); ?> ><?php _e("Small (100x100)", 'myarcadeplugin'); ?></option>
              <option value="medium" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['thumbsize'], 'medium'); ?> ><?php _e("Medium (180x135)", 'myarcadeplugin'); ?></option>
              <option value="large" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['thumbsize'], 'large'); ?> ><?php _e("Large (300x300)", 'myarcadeplugin'); ?></option>
            </select>
          </td>
          <td><i><?php _e("Select the size of the thumbnails that should be used for games from FreeGamesForYourWebsite. Default size is small (100x100).", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Use Large Thumbnails as Screenshots", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <input type="checkbox" name="fogscreen" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($fog['screenshot'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
          </td>
          <td><i><?php _e("Check this if you want to use large thumbnails (300x300px) from the feed as game screenshots", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Game Categories", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <select size="1" name="fogtag" id="fogtag">
              <option value="all" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['tag'], 'all'); ?>>All Categories</option>
              <option value="3D" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['tag'], '3D'); ?>><?php _e('3D Games', 'myarcadeplugin'); ?></option>
              <option value="Adventure" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['tag'], 'Adventure'); ?>><?php _e('Adventure Games', 'myarcadeplugin'); ?></option>
              <option value="Defense" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['tag'], 'Defense'); ?>><?php _e('Defense Games', 'myarcadeplugin'); ?></option>
              <option value="Driving" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['tag'], 'Driving'); ?>><?php _e('Driving Games', 'myarcadeplugin'); ?></option>
              <option value="Flying" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['tag'], 'Flying'); ?>><?php _e('Flying Games', 'myarcadeplugin'); ?></option>
              <option value="Multiplayer" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['tag'], 'Multiplayer'); ?>><?php _e('Multiplayer Games', 'myarcadeplugin'); ?></option>
              <option value="Puzzle" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['tag'], 'Puzzle'); ?>><?php _e('Puzzle Games', 'myarcadeplugin'); ?></option>
              <option value="Shooting" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['tag'], 'Shooting'); ?>><?php _e('Shooting Games', 'myarcadeplugin'); ?></option>
              <option value="Sports" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['tag'], 'Sports'); ?>><?php _e('Sports Games', 'myarcadeplugin'); ?></option>                    
              <option value="unity-games" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['tag'], 'unity-games'); ?>><?php _e('Unity Games', 'myarcadeplugin'); ?></option>                    
            </select>
          </td>
          <td><i><?php _e("Select a game category that you would like to fetch from FreeGamesForYourWebsite.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Language", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <select size="1" name="foglanguage" id="foglanguage">
              <option value="ar" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['language'], 'ar'); ?>><?php _e('Arabic', 'myarcadeplugin'); ?></option>
              <option value="en" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['language'], 'en'); ?>><?php _e('English', 'myarcadeplugin'); ?></option>
              <option value="fr" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['language'], 'fr'); ?>><?php _e('French', 'myarcadeplugin'); ?></option>
              <option value="de" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['language'], 'de'); ?>><?php _e('German', 'myarcadeplugin'); ?></option>
              <option value="el" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['language'], 'el'); ?>><?php _e('Greek', 'myarcadeplugin'); ?></option>
              <option value="ro" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['language'], 'ro'); ?>><?php _e('Romanian', 'myarcadeplugin'); ?></option>
              <option value="es" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['language'], 'es'); ?>><?php _e('Spanish', 'myarcadeplugin'); ?></option>
              <option value="ur" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($fog['language'], 'ur'); ?>><?php _e('Urdu', 'myarcadeplugin'); ?></option>
            </select>
          </td>
          <td><i><?php _e("Select a game language.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Automated Game Fetching", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <input type="checkbox" name="fog_cron_fetch" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($fog['cron_fetch'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
          </td>
          <td><i><?php _e("Enable this if you want to fetch games automatically. Go to 'General Settings' to select a cron interval.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h4><?php _e("Fetch Games", 'myarcadeplugin'); ?></h4></td></tr>

        <tr>
          <td>
            <input type="text" size="40"  name="fog_cron_fetch_limit" value="<?php echo $fog['cron_fetch_limit']; ?>" />
          </td>
          <td><i><?php _e("How many games should be fetched on every cron trigger?", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Automated Game Publishing", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <input type="checkbox" name="fog_cron_publish" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($fog['cron_publish'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
          </td>
          <td><i><?php _e("Enable this if you want to publish games automatically. Go to 'General Settings' to select a cron interval.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h4><?php _e("Publish Games", 'myarcadeplugin'); ?></h4></td></tr>

        <tr>
          <td>
            <input type="text" size="40"  name="fog_cron_publish_limit" value="<?php echo $fog['cron_publish_limit']; ?>" />
          </td>
          <td><i><?php _e("How many games should be published on every cron trigger?", 'myarcadeplugin'); ?></i></td>
        </tr>

      </table>
      <input class="button button-primary" id="submit" type="submit" name="submit" value="<?php _e("Save Settings", 'myarcadeplugin'); ?>" />
    </div>
  </div>
  <?php
} function myarcade_save_settings_fog() { $R7705127947020CA2ED921BE6E0FA664F = filter_input( INPUT_POST, 'myarcade_save_settings_nonce'); if ( ! $R7705127947020CA2ED921BE6E0FA664F || ! wp_verify_nonce( $R7705127947020CA2ED921BE6E0FA664F, 'myarcade_save_settings' ) ) { return; } $fog = array(); if ( isset($_POST['fogurl'])) $fog['feed'] = esc_url_raw($_POST['fogurl']); else $fog['feed'] = ''; if ( isset($_POST['foglimit'])) $fog['limit'] = sanitize_text_field($_POST['foglimit']); else $fog['limit'] = '20'; if ( isset($_POST['fogthumbsize'])) $fog['thumbsize'] = trim($_POST['fogthumbsize']); else $fog['thumbsize'] = 'small'; if ( isset($_POST['fogscreen'])) $fog['screenshot'] = true; else $fog['screenshot'] = false; if ( isset($_POST['fogtag'])) $fog['tag'] = sanitize_text_field($_POST['fogtag']); else $fog['tag'] = 'all'; if ( isset($_POST['foglanguage'])) $fog['language'] = sanitize_text_field($_POST['foglanguage']); else $fog['language'] = 'en'; $fog['cron_fetch'] = (isset($_POST['fog_cron_fetch'])) ? true : false; $fog['cron_fetch_limit'] = (isset($_POST['fog_cron_fetch_limit']) ) ? intval($_POST['fog_cron_fetch_limit']) : 1; $fog['cron_publish'] = (isset($_POST['fog_cron_publish']) ) ? true : false; $fog['cron_publish_limit'] = (isset($_POST['fog_cron_publish_limit']) ) ? intval($_POST['fog_cron_publish_limit']) : 1; update_option('myarcade_fog', $fog); } function FF83B32F0A20CBE6814ED5701071B819F() { } function myarcade_feed_fog( $R9FE302BDF914868081913A22F58F9E7E = array() ) { global $wpdb; $R1C087CFC2417747F08C78E3E5D5121E5 = array( 'game_id' => false, 'echo' => false, 'settings' => array() ); $RAA7BB4B05FBD27DB7CA594893F166B47 = wp_parse_args( $R9FE302BDF914868081913A22F58F9E7E, $R1C087CFC2417747F08C78E3E5D5121E5 ); extract($RAA7BB4B05FBD27DB7CA594893F166B47); $R630F8C3F00ED4BE49091A902C671B200 = 0; $fog = get_option('myarcade_fog'); $R281A0F7BC3D849F3386A5AC36FB35807 = get_option('myarcade_categories'); if ( !empty($settings) ) { $settings = array_merge($fog, $settings); } else { $settings = $fog; } if ( !isset( $settings['method'] ) ) { $settings['method'] = 'latest'; } if ( $settings['language'] !== 'en' ) { $settings['feed'] = str_replace( '.com/feeds/', '.com/' . $settings['language'] . '/feeds/', $settings['feed'] ); } $RF0EAC6DAF5B3AF677609338C1E10A2F4 = add_query_arg( array("format" => "json"), trim( $settings['feed'] ) ); if ( empty($settings['limit']) ) { $RF0EAC6DAF5B3AF677609338C1E10A2F4 = add_query_arg( array("limit" => "all"), $RF0EAC6DAF5B3AF677609338C1E10A2F4 ); } else { $RF0EAC6DAF5B3AF677609338C1E10A2F4 = add_query_arg( array("limit" => $settings['limit'] ), $RF0EAC6DAF5B3AF677609338C1E10A2F4 ); } if ( empty($settings['tag']) ) { $RF0EAC6DAF5B3AF677609338C1E10A2F4 = add_query_arg( array("tag" => 'all' ), $RF0EAC6DAF5B3AF677609338C1E10A2F4 ); } else { $RF0EAC6DAF5B3AF677609338C1E10A2F4 = add_query_arg( array("tag" => strtolower( $settings['tag'] ) ), $RF0EAC6DAF5B3AF677609338C1E10A2F4 ); } require_once( MYARCADE_CORE_DIR . '/fetch.php' ); $RC12AC9F8ECF1A75EF50F5C500668B033 = F720E8C77506CFC05F85A08A7EF8F1D41( array('url' => $RF0EAC6DAF5B3AF677609338C1E10A2F4, 'service' => 'json', 'echo' => $echo) ); if ( !empty($RC12AC9F8ECF1A75EF50F5C500668B033) ) { foreach ( $RC12AC9F8ECF1A75EF50F5C500668B033 as $R2CDAD6EF7D5C41B8DB9EB739620C280A ) { $R69F05BD3024E3A18B29F11DF8A3E8C79 = new stdClass(); $R69F05BD3024E3A18B29F11DF8A3E8C79->uuid = $R2CDAD6EF7D5C41B8DB9EB739620C280A->id . '_fog'; $R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag = md5($R2CDAD6EF7D5C41B8DB9EB739620C280A->id.'fog'); $R89FEDA984B61366DE78855CB7D5F44D1 = $wpdb->get_var("SELECT id FROM ".$wpdb->prefix . 'myarcadegames'." WHERE uuid = '".$R69F05BD3024E3A18B29F11DF8A3E8C79->uuid."' OR game_tag = '".$R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag."' OR name = '".esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->title)."'"); if ( !$R89FEDA984B61366DE78855CB7D5F44D1 ) { if ( isset($R2CDAD6EF7D5C41B8DB9EB739620C280A->category) ) { if ( $R2CDAD6EF7D5C41B8DB9EB739620C280A->category == 'Puzzle') { $R2CDAD6EF7D5C41B8DB9EB739620C280A->category = 'Puzzles'; } if ( $R2CDAD6EF7D5C41B8DB9EB739620C280A->category == 'None' ) { $R2CDAD6EF7D5C41B8DB9EB739620C280A->category = 'Other'; } } else { $R2CDAD6EF7D5C41B8DB9EB739620C280A->category = 'Other'; } $R7E48A94D08652CE34DE703DF9E891458 = false; foreach ($R281A0F7BC3D849F3386A5AC36FB35807 as $RAE9A4476893066B7B92C648E9F0FDEE8) { if ( $RAE9A4476893066B7B92C648E9F0FDEE8['Status'] == 'checked') { if ( $RAE9A4476893066B7B92C648E9F0FDEE8['FOG'] == true ) { if ($R2CDAD6EF7D5C41B8DB9EB739620C280A->category == $RAE9A4476893066B7B92C648E9F0FDEE8['Name'] ) { $R7E48A94D08652CE34DE703DF9E891458 = true; break; } } else { if ( is_array( $RAE9A4476893066B7B92C648E9F0FDEE8['FOG'] ) ) { foreach( $RAE9A4476893066B7B92C648E9F0FDEE8['FOG'] as $RA4F93DDBDFE411171E56C573FE1EC6E1 ) { if ( $RA4F93DDBDFE411171E56C573FE1EC6E1 == $R2CDAD6EF7D5C41B8DB9EB739620C280A->category ) { $R7E48A94D08652CE34DE703DF9E891458 = true; break; } } } } } } if (!$R7E48A94D08652CE34DE703DF9E891458) { continue; } switch ($fog['thumbsize']) { case 'large': $R2DDE0731A571E9A7BA651E79C5025426 = $R2CDAD6EF7D5C41B8DB9EB739620C280A->large_thumbnail_url; break; case 'medium': $R2DDE0731A571E9A7BA651E79C5025426 = $R2CDAD6EF7D5C41B8DB9EB739620C280A->med_thumbnail_url; break; case 'small': default: $R2DDE0731A571E9A7BA651E79C5025426 = $R2CDAD6EF7D5C41B8DB9EB739620C280A->small_thumbnail_url; break; } if ( $fog['screenshot'] == true ) { $R326F3D74E09BF01E529E3A340247FB4D = $R2CDAD6EF7D5C41B8DB9EB739620C280A->large_thumbnail_url; } else { $R326F3D74E09BF01E529E3A340247FB4D = ''; } $R0E993BCE94E5EB8B0412D25397E1E9AC = explode('x', $R2CDAD6EF7D5C41B8DB9EB739620C280A->resolution); $R69F05BD3024E3A18B29F11DF8A3E8C79->swf_file = strtok($R2CDAD6EF7D5C41B8DB9EB739620C280A->swf_file, '?'); $RC752CA8D0AB5ED433AD756BC9081D259 = pathinfo( $R69F05BD3024E3A18B29F11DF8A3E8C79->swf_file, PATHINFO_EXTENSION ); if ( 'unity3d' == $RC752CA8D0AB5ED433AD756BC9081D259 ) { $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'unity'; } else { $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'fog'; } $R69F05BD3024E3A18B29F11DF8A3E8C79->name = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->title); $R69F05BD3024E3A18B29F11DF8A3E8C79->slug = F64A2F46BC8BAFD9163DD9691D1207278($R2CDAD6EF7D5C41B8DB9EB739620C280A->title); $R69F05BD3024E3A18B29F11DF8A3E8C79->created = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->created); $R69F05BD3024E3A18B29F11DF8A3E8C79->description = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->description); $R69F05BD3024E3A18B29F11DF8A3E8C79->categs = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->category); $R69F05BD3024E3A18B29F11DF8A3E8C79->control = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->controls); $R69F05BD3024E3A18B29F11DF8A3E8C79->thumbnail_url = esc_sql($R2DDE0731A571E9A7BA651E79C5025426); $R69F05BD3024E3A18B29F11DF8A3E8C79->swf_url = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->swf_file); $R69F05BD3024E3A18B29F11DF8A3E8C79->screen1_url = $R326F3D74E09BF01E529E3A340247FB4D; $R69F05BD3024E3A18B29F11DF8A3E8C79->width = $R0E993BCE94E5EB8B0412D25397E1E9AC[0]; $R69F05BD3024E3A18B29F11DF8A3E8C79->height = $R0E993BCE94E5EB8B0412D25397E1E9AC[1]; $R69F05BD3024E3A18B29F11DF8A3E8C79->tags = !empty( $R2CDAD6EF7D5C41B8DB9EB739620C280A->tags ) ? implode( ',', $R2CDAD6EF7D5C41B8DB9EB739620C280A->tags ) : ''; $R630F8C3F00ED4BE49091A902C671B200++; FF09D7482BA5FAADAB6D947666FFD8C43( $R69F05BD3024E3A18B29F11DF8A3E8C79, $echo ); } } } FC6BC39ED73177ED6BA0A3E5B1C3D6848( $R630F8C3F00ED4BE49091A902C671B200, $echo ); } ?>