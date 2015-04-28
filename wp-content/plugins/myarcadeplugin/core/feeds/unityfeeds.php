<?php
 if ( ! defined( 'ABSPATH' ) ) { exit; } function myarcade_settings_unityfeeds() { $unityfeeds = get_option( 'myarcade_unityfeeds' ); ?>
  <h2 class="trigger"><?php _e("UnityFeeds Games", 'myarcadeplugin'); ?></h2>
  <div class="toggle_container">
    <div class="block">
      <table class="optiontable" width="100%" cellpadding="5" cellspacing="5">
        <tr>
          <td colspan="2">
            <i>
              <?php _e("UnityFeeds provides a game feed with exclusive Unity3D games.", 'myarcadeplugin'); ?> Click <a href="http://unityfeeds.com/">here</a> to visit the UnityFeeds site.
            </i>
          </td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Feed URL", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="text" size="40"  name="unityfeeds_url" value="<?php echo $unityfeeds['feed']; ?>" />
          </td>
          <td><i><?php _e("Edit this field only if Feed URL has been changed!", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Category", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <select size="1" name="unityfeeds_category" id="unityfeeds_category">
              <option value="all" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['category'], 'all'); ?> ><?php _e("All Games", 'myarcadeplugin'); ?></option>
              <option value="8" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['category'], '8'); ?> ><?php _e("Action Games", 'myarcadeplugin'); ?></option>
              <option value="9" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['category'], '9'); ?> ><?php _e("Arcade Games", 'myarcadeplugin'); ?></option>
              <option value="7" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['category'], '7'); ?> ><?php _e("Driving Games", 'myarcadeplugin'); ?></option>
              <option value="11" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['category'], '11'); ?> ><?php _e("Flying Games", 'myarcadeplugin'); ?></option>
              <option value="6" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['category'], '6'); ?> ><?php _e("Girls Games", 'myarcadeplugin'); ?></option>
              <option value="10" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['category'], '10'); ?> ><?php _e("Puzzle Games", 'myarcadeplugin'); ?></option>
            </select>
          </td>
          <td><i><?php _e("Select which games you would like to fetch.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Thumbnail Size", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <select size="1" name="unityfeeds_thumbnail" id="unityfeeds_thumbnail">
              <option value="100x100" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['thumbnail'], '100x100'); ?> ><?php _e("100x100", 'myarcadeplugin'); ?></option>
              <option value="120x90" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['thumbnail'], '120x90'); ?> ><?php _e("120x90", 'myarcadeplugin'); ?></option>
              <option value="160x160" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['thumbnail'], '160x160'); ?> ><?php _e("160x160", 'myarcadeplugin'); ?></option>
              <option value="180x135" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['thumbnail'], '180x135'); ?> ><?php _e("180x135", 'myarcadeplugin'); ?></option>
              <option value="300x250" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['thumbnail'], '300x250'); ?> ><?php _e("300x250", 'myarcadeplugin'); ?></option>
              <option value="300x300" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['thumbnail'], '300x300'); ?> ><?php _e("300x300", 'myarcadeplugin'); ?></option>
            </select>
          </td>
          <td><i><?php _e("Select a thumbnail size.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Thumbnail Size", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <select size="1" name="unityfeeds_screenshot" id="unityfeeds_screenshot">
              <option value="100x100" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['screenshot'], '100x100'); ?> ><?php _e("100x100", 'myarcadeplugin'); ?></option>
              <option value="120x90" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['screenshot'], '120x90'); ?> ><?php _e("120x90", 'myarcadeplugin'); ?></option>
              <option value="160x160" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['screenshot'], '160x160'); ?> ><?php _e("160x160", 'myarcadeplugin'); ?></option>
              <option value="180x135" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['screenshot'], '180x135'); ?> ><?php _e("180x135", 'myarcadeplugin'); ?></option>
              <option value="300x250" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['screenshot'], '300x250'); ?> ><?php _e("300x250", 'myarcadeplugin'); ?></option>
              <option value="300x300" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($unityfeeds['screenshot'], '300x300'); ?> ><?php _e("300x300", 'myarcadeplugin'); ?></option>
            </select>
          </td>
          <td><i><?php _e("Select a screenshot size.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Automated Game Publishing", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <input type="checkbox" name="unityfeeds_cron_publish" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($unityfeeds['cron_publish'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
          </td>
          <td><i><?php _e("Enable this if you want to publish games automatically. Go to 'General Settings' to select a cron interval.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h4><?php _e("Publish Games", 'myarcadeplugin'); ?></h4></td></tr>

        <tr>
          <td>
            <input type="text" size="40"  name="unityfeeds_cron_publish_limit" value="<?php echo $unityfeeds['cron_publish_limit']; ?>" />
          </td>
          <td><i><?php _e("How many games should be published on every cron trigger?", 'myarcadeplugin'); ?></i></td>
        </tr>

      </table>
      <input class="button button-primary" id="submit" type="submit" name="submit" value="<?php _e("Save Settings", 'myarcadeplugin'); ?>" />
    </div>
  </div>
  <?php
} function myarcade_save_settings_unityfeeds() { $R7705127947020CA2ED921BE6E0FA664F = filter_input( INPUT_POST, 'myarcade_save_settings_nonce'); if ( ! $R7705127947020CA2ED921BE6E0FA664F || ! wp_verify_nonce( $R7705127947020CA2ED921BE6E0FA664F, 'myarcade_save_settings' ) ) { return; } $unityfeeds = array(); $unityfeeds['feed'] = (isset($_POST['unityfeeds_url'])) ? esc_sql($_POST['unityfeeds_url']) : ''; $unityfeeds['category'] = (isset($_POST['unityfeeds_category'])) ? esc_sql($_POST['unityfeeds_category']) : 'all'; $unityfeeds['thumbnail'] = (isset($_POST['unityfeeds_thumbnail'])) ? esc_sql($_POST['unityfeeds_thumbnail']) : '100x100'; $unityfeeds['screenshot'] = (isset($_POST['unityfeeds_screenshot'])) ? esc_sql($_POST['unityfeeds_screenshot']) : '300x300'; $unityfeeds['cron_publish'] = (isset($_POST['unityfeeds_cron_publish']) ) ? true : false; $unityfeeds['cron_publish_limit'] = (isset($_POST['unityfeeds_cron_publish_limit']) ) ? intval($_POST['unityfeeds_cron_publish_limit']) : 1; update_option('myarcade_unityfeeds', $unityfeeds); } function F45D44EDFD04DCD729426AB1E84907D1A() { } function myarcade_feed_unityfeeds( $R9FE302BDF914868081913A22F58F9E7E = array() ) { global $wpdb; $R1C087CFC2417747F08C78E3E5D5121E5 = array( 'echo' => false, 'settings' => array() ); $RAA7BB4B05FBD27DB7CA594893F166B47 = wp_parse_args( $R9FE302BDF914868081913A22F58F9E7E, $R1C087CFC2417747F08C78E3E5D5121E5 ); extract($RAA7BB4B05FBD27DB7CA594893F166B47); $R630F8C3F00ED4BE49091A902C671B200 = 0; $R7E48A94D08652CE34DE703DF9E891458 = false; $unityfeeds = get_option('myarcade_unityfeeds'); $R281A0F7BC3D849F3386A5AC36FB35807 = get_option('myarcade_categories'); if ( !empty($settings) ) { $settings = array_merge($unityfeeds, $settings); } else { $settings = $unityfeeds; } $RAD6D6ADD59F91C690CE029D064278711 ='?format=json'; $RCB6CF74D12D3949F4F3C570ECE4B9CB5 = ( $unityfeeds['category'] ) ? $unityfeeds['category'] : 'all'; $RF0EAC6DAF5B3AF677609338C1E10A2F4 = trim( $unityfeeds['feed'] ) . $RAD6D6ADD59F91C690CE029D064278711 . '&limit=all&category=' . $RCB6CF74D12D3949F4F3C570ECE4B9CB5; require_once( MYARCADE_CORE_DIR . '/fetch.php' ); $RC12AC9F8ECF1A75EF50F5C500668B033 = F720E8C77506CFC05F85A08A7EF8F1D41( array('url' => $RF0EAC6DAF5B3AF677609338C1E10A2F4, 'service' => 'json', 'echo' => $echo) ); if ( !empty($RC12AC9F8ECF1A75EF50F5C500668B033) ) { foreach ($RC12AC9F8ECF1A75EF50F5C500668B033 as $R2CDAD6EF7D5C41B8DB9EB739620C280A) { $R69F05BD3024E3A18B29F11DF8A3E8C79 = new stdClass(); $R69F05BD3024E3A18B29F11DF8A3E8C79->uuid = $R2CDAD6EF7D5C41B8DB9EB739620C280A->id . '_unityfeeds'; $R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag = md5($R2CDAD6EF7D5C41B8DB9EB739620C280A->id.'unityfeeds'); $R89FEDA984B61366DE78855CB7D5F44D1 = $wpdb->get_var("SELECT id FROM ".$wpdb->prefix . 'myarcadegames'." WHERE uuid = '".$R69F05BD3024E3A18B29F11DF8A3E8C79->uuid."' OR game_tag = '".$R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag."' OR name = '".esc_sql( $R2CDAD6EF7D5C41B8DB9EB739620C280A->name )."'"); if ( !$R89FEDA984B61366DE78855CB7D5F44D1 ) { $R7E48A94D08652CE34DE703DF9E891458 = false; switch ($R2CDAD6EF7D5C41B8DB9EB739620C280A->category) { case 'Action Games': $RCB6CF74D12D3949F4F3C570ECE4B9CB5 = 'Action'; break; case 'Arcade Games': $RCB6CF74D12D3949F4F3C570ECE4B9CB5 = 'Arcade'; break; case 'Driving Games': $RCB6CF74D12D3949F4F3C570ECE4B9CB5 = 'Driving'; break; case 'Flying Games': $RCB6CF74D12D3949F4F3C570ECE4B9CB5 = 'Other'; break; case 'Girls Games': $RCB6CF74D12D3949F4F3C570ECE4B9CB5 = 'Dress-Up'; break; case 'Puzzle Games': $RCB6CF74D12D3949F4F3C570ECE4B9CB5 = 'Puzzles'; break; default: $RCB6CF74D12D3949F4F3C570ECE4B9CB5 = 'Other'; break; } foreach ($R281A0F7BC3D849F3386A5AC36FB35807 as $RAE9A4476893066B7B92C648E9F0FDEE8) { if ( ($RAE9A4476893066B7B92C648E9F0FDEE8['Name'] == $RCB6CF74D12D3949F4F3C570ECE4B9CB5) && ($RAE9A4476893066B7B92C648E9F0FDEE8['Status'] == 'checked') ) { $R7E48A94D08652CE34DE703DF9E891458 = true; break; } } if (!$R7E48A94D08652CE34DE703DF9E891458) { continue; } $RB60A4F0B3D62D83456E96125D2EE8CB6 = ( $unityfeeds['thumbnail'] ) ? $unityfeeds['thumbnail'] : '100x100'; if ( ! empty( $R2CDAD6EF7D5C41B8DB9EB739620C280A->thumbnails->$RB60A4F0B3D62D83456E96125D2EE8CB6 ) ) { $R2DDE0731A571E9A7BA651E79C5025426 = $R2CDAD6EF7D5C41B8DB9EB739620C280A->thumbnails->$RB60A4F0B3D62D83456E96125D2EE8CB6; } else { $R2DDE0731A571E9A7BA651E79C5025426 = MYARCADE_URL . "/images/noimage.png"; } $R9262F7F3DC3DA3D9C83EC6FF06896424 = ( $unityfeeds['screenshot'] ) ? $unityfeeds['screenshot'] : '300x300'; if ( !empty( $R2CDAD6EF7D5C41B8DB9EB739620C280A->thumbnails->$R9262F7F3DC3DA3D9C83EC6FF06896424 ) ) { $R55BC037E8E1B2BC3453F9F1214B6469E = $R2CDAD6EF7D5C41B8DB9EB739620C280A->thumbnails->$R9262F7F3DC3DA3D9C83EC6FF06896424; } else { $R55BC037E8E1B2BC3453F9F1214B6469E = ''; } $REF37DC69113FB414058A5088BC1FA494 = ''; $R3FA8DA3402B9B24298B2CE820E453C70 = (array) $R2CDAD6EF7D5C41B8DB9EB739620C280A->tags; if ( ! empty( $R3FA8DA3402B9B24298B2CE820E453C70 ) ) { foreach ( $R3FA8DA3402B9B24298B2CE820E453C70 as $RF413F06AEBBCEF5E1C8B1019DEE6FE6B => $R7B047B1F72F109F9014E4EC7D823FE83) { $REF37DC69113FB414058A5088BC1FA494 .= $R7B047B1F72F109F9014E4EC7D823FE83 . ','; } $REF37DC69113FB414058A5088BC1FA494 = rtrim( $REF37DC69113FB414058A5088BC1FA494, ','); } $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'unityfeeds'; $R69F05BD3024E3A18B29F11DF8A3E8C79->name = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->name); $R69F05BD3024E3A18B29F11DF8A3E8C79->slug = F64A2F46BC8BAFD9163DD9691D1207278($R2CDAD6EF7D5C41B8DB9EB739620C280A->name); $R69F05BD3024E3A18B29F11DF8A3E8C79->created = date('Y-m-d h:i:s',$R2CDAD6EF7D5C41B8DB9EB739620C280A->added); $R69F05BD3024E3A18B29F11DF8A3E8C79->description = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->description); $R69F05BD3024E3A18B29F11DF8A3E8C79->instructions = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->instructions); $R69F05BD3024E3A18B29F11DF8A3E8C79->categs = esc_sql($RCB6CF74D12D3949F4F3C570ECE4B9CB5); $R69F05BD3024E3A18B29F11DF8A3E8C79->swf_url = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->file); $R69F05BD3024E3A18B29F11DF8A3E8C79->thumbnail_url = esc_sql($R2DDE0731A571E9A7BA651E79C5025426); $R69F05BD3024E3A18B29F11DF8A3E8C79->screen1_url = esc_sql($R55BC037E8E1B2BC3453F9F1214B6469E);; $R69F05BD3024E3A18B29F11DF8A3E8C79->tags = esc_sql( $REF37DC69113FB414058A5088BC1FA494 ); $R69F05BD3024E3A18B29F11DF8A3E8C79->width = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->width); $R69F05BD3024E3A18B29F11DF8A3E8C79->height = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->height); $R630F8C3F00ED4BE49091A902C671B200++; FF09D7482BA5FAADAB6D947666FFD8C43( $R69F05BD3024E3A18B29F11DF8A3E8C79, $echo ); } } } FC6BC39ED73177ED6BA0A3E5B1C3D6848( $R630F8C3F00ED4BE49091A902C671B200, $echo ); } ?>