<?php
 if ( ! defined( 'ABSPATH' ) ) { exit; } function myarcade_settings_spilgames() { $spilgames = get_option( 'myarcade_spilgames' ); ?>
  <h2 class="trigger"><?php _e("Spil Games", 'myarcadeplugin'); ?></h2>
  <div class="toggle_container">
    <div class="block">
      <table class="optiontable" width="100%" cellpadding="5" cellspacing="5">
        <tr>
          <td colspan="2">
            <i>
              <?php _e("Spil Games provides a game feed with over 1500 games.", 'myarcadeplugin'); ?> Click <a href="http://publishers.spilgames.com/">here</a> to visit the Spil Games site.
            </i>
            <br /><br />
            <p class="mabp_info" style="padding:10px">
              <?php _e("Some 'Spil Games' games have a domain lock. That means that they will not work if you host game files on your server. Therby it is recommended to deactivate Game Download Feature when publishing these games.", 'myarcadeplugin'); ?>
            </p>
          </td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Feed URL", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="text" size="40"  name="spilgamesurl" value="<?php echo $spilgames['feed']; ?>" />
          </td>
          <td><i><?php _e("Edit this field only if Feed URL has been changed!", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Fetch Games", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="text" size="40"  name="spilgameslimit" value="<?php echo $spilgames['limit']; ?>" />
          </td>
          <td><i><?php _e("How many games should be fetched at once. Enter 'all' (without quotes) if you want to fetch all games. Otherwise enter an integer.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Thumbnail Size", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <select size="1" name="spilgamesthumbsize" id="spilgamesthumbsize">
              <option value="1" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($spilgames['thumbsize'], '1'); ?> ><?php _e("Small (100x75)", 'myarcadeplugin'); ?></option>
              <option value="2" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($spilgames['thumbsize'], '2'); ?> ><?php _e("Medium (120x90)", 'myarcadeplugin'); ?></option>
              <option value="3" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($spilgames['thumbsize'], '3'); ?> ><?php _e("Large (200x120)", 'myarcadeplugin'); ?></option>
            </select>
          </td>
          <td><i><?php _e("Select the size of the thumbnails that should be used for games from Spil Games. Default size is small (100x75).", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Gamer Player API", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="checkbox" name="spilgames_player_api" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($spilgames['player_api'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
          </td>
          <td><i><?php _e("Enable this if you want to use the Spilgames Game Player API to embed games. Spilgames will add revenue sharing trough the API in the future.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Automated Game Fetching", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="checkbox" name="spilgames_cron_fetch" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($spilgames['cron_fetch'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
          </td>
          <td><i><?php _e("Enable this if you want to fetch games automatically. Go to 'General Settings' to select a cron interval.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h4><?php _e("Fetch Games", 'myarcadeplugin'); ?></h4></td></tr>

        <tr>
          <td>
            <input type="text" size="40"  name="spilgames_cron_fetch_limit" value="<?php echo $spilgames['cron_fetch_limit']; ?>" />
          </td>
          <td><i><?php _e("How many games should be fetched on every cron trigger?", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Automated Game Publishing", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <input type="checkbox" name="spilgames_cron_publish" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($spilgames['cron_publish'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
          </td>
          <td><i><?php _e("Enable this if you want to publish games automatically. Go to 'General Settings' to select a cron interval.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h4><?php _e("Publish Games", 'myarcadeplugin'); ?></h4></td></tr>

        <tr>
          <td>
            <input type="text" size="40"  name="spilgames_cron_publish_limit" value="<?php echo $spilgames['cron_publish_limit']; ?>" />
          </td>
          <td><i><?php _e("How many games should be published on every cron trigger?", 'myarcadeplugin'); ?></i></td>
        </tr>

      </table>
      <input class="button button-primary" id="submit" type="submit" name="submit" value="<?php _e("Save Settings", 'myarcadeplugin'); ?>" />
    </div>
  </div>
  <?php
} function myarcade_save_settings_spilgames() { $R7705127947020CA2ED921BE6E0FA664F = filter_input( INPUT_POST, 'myarcade_save_settings_nonce'); if ( ! $R7705127947020CA2ED921BE6E0FA664F || ! wp_verify_nonce( $R7705127947020CA2ED921BE6E0FA664F, 'myarcade_save_settings' ) ) { return; } $spilgames = array(); if ( isset($_POST['spilgamesurl'])) $spilgames['feed'] = esc_url_raw($_POST['spilgamesurl']); else $spilgames['feed'] = ''; if ( isset($_POST['spilgameslimit'])) $spilgames['limit'] = sanitize_text_field($_POST['spilgameslimit']); else $spilgames['limit'] = '20'; if ( isset($_POST['spilgamesthumbsize'])) $spilgames['thumbsize'] = trim($_POST['spilgamesthumbsize']); else $spilgames['thumbsize'] = 'small'; $spilgames['cron_fetch'] = (isset($_POST['spilgames_cron_fetch'])) ? true : false; $spilgames['cron_fetch_limit'] = (isset($_POST['spilgames_cron_fetch_limit']) ) ? intval($_POST['spilgames_cron_fetch_limit']) : 1; $spilgames['cron_publish'] = (isset($_POST['spilgames_cron_publish']) ) ? true : false; $spilgames['cron_publish_limit'] = (isset($_POST['spilgames_cron_publish_limit']) ) ? intval($_POST['spilgames_cron_publish_limit']) : 1; $spilgames['player_api'] = (isset($_POST['spilgames_player_api'])) ? true : false; update_option('myarcade_spilgames', $spilgames); } function F40930BBEF929FFC2A7630BF2508CE860() { } function myarcade_feed_spilgames( $R9FE302BDF914868081913A22F58F9E7E = array() ) { global $wpdb; $R1C087CFC2417747F08C78E3E5D5121E5 = array( 'echo' => false, 'settings' => array() ); $RAA7BB4B05FBD27DB7CA594893F166B47 = wp_parse_args( $R9FE302BDF914868081913A22F58F9E7E, $R1C087CFC2417747F08C78E3E5D5121E5 ); extract($RAA7BB4B05FBD27DB7CA594893F166B47); $R630F8C3F00ED4BE49091A902C671B200 = 0; $R7E48A94D08652CE34DE703DF9E891458 = false; $spilgames = get_option('myarcade_spilgames'); $R281A0F7BC3D849F3386A5AC36FB35807 = get_option('myarcade_categories'); if ( ! empty( $settings ) ) { $settings = array_merge($spilgames, $settings); } else { $settings = $spilgames; } if ( !isset($settings['method']) ) { $settings['method'] = 'latest'; } $RF0EAC6DAF5B3AF677609338C1E10A2F4 = add_query_arg( array("format" => "json"), trim( $settings['feed'] ) ); if ( ! empty( $settings['limit'] ) ) { $RF0EAC6DAF5B3AF677609338C1E10A2F4 = add_query_arg( array("limit" => $settings['limit'] ), $RF0EAC6DAF5B3AF677609338C1E10A2F4 ); } if ( $settings['method'] == 'offset' ) { $RF0EAC6DAF5B3AF677609338C1E10A2F4 = add_query_arg( array("page" => $settings['offset'] ), $RF0EAC6DAF5B3AF677609338C1E10A2F4 ); } if ( ! empty( $settings['search'] ) ) { $RF0EAC6DAF5B3AF677609338C1E10A2F4 = add_query_arg( array( "q" => $settings['search'] ), $RF0EAC6DAF5B3AF677609338C1E10A2F4 ); } $RF0EAC6DAF5B3AF677609338C1E10A2F4 = add_query_arg( array( "source" => 'MyArcadePlugin' ), $RF0EAC6DAF5B3AF677609338C1E10A2F4 ); require_once( MYARCADE_CORE_DIR . '/fetch.php' ); $RC12AC9F8ECF1A75EF50F5C500668B033 = F720E8C77506CFC05F85A08A7EF8F1D41( array('url' => $RF0EAC6DAF5B3AF677609338C1E10A2F4, 'service' => 'json', 'echo' => $echo) ); if ( ! empty($RC12AC9F8ECF1A75EF50F5C500668B033->entries ) ) { $R5D2511FD8F7BF05DCC8486611BAABD2D = array('png', 'jpg', 'jpeg', 'gif', 'bmp'); foreach ($RC12AC9F8ECF1A75EF50F5C500668B033->entries as $R2CDAD6EF7D5C41B8DB9EB739620C280A) { $R69F05BD3024E3A18B29F11DF8A3E8C79 = new stdClass(); $R69F05BD3024E3A18B29F11DF8A3E8C79->uuid = $R2CDAD6EF7D5C41B8DB9EB739620C280A->id . '_spilgames'; $R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag = md5($R2CDAD6EF7D5C41B8DB9EB739620C280A->id . 'spilgames'); $R89FEDA984B61366DE78855CB7D5F44D1 = $wpdb->get_var("SELECT id FROM ".$wpdb->prefix . 'myarcadegames'." WHERE uuid = '".$R69F05BD3024E3A18B29F11DF8A3E8C79->uuid."' OR game_tag = '".$R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag."' OR name = '".esc_sql( $R2CDAD6EF7D5C41B8DB9EB739620C280A->title )."'"); if ( !$R89FEDA984B61366DE78855CB7D5F44D1 ) { $R7E48A94D08652CE34DE703DF9E891458 = false; if ( ! empty($R2CDAD6EF7D5C41B8DB9EB739620C280A->category) ) { $R30E38C1F8EC85F8EE8DF620FF3267157 = explode(',', $R2CDAD6EF7D5C41B8DB9EB739620C280A->category); $R30E38C1F8EC85F8EE8DF620FF3267157 = array_map( 'trim', $R30E38C1F8EC85F8EE8DF620FF3267157 ); } else { $R30E38C1F8EC85F8EE8DF620FF3267157 = array( 'Other' ); } $R294E407FFD0BBD22EA24DD907D5DDE58 = 'Other'; foreach($R30E38C1F8EC85F8EE8DF620FF3267157 as $R7697B8C9FB68C249A0DBC0C50B6CFD55) { $R7697B8C9FB68C249A0DBC0C50B6CFD55 = htmlspecialchars_decode ( trim($R7697B8C9FB68C249A0DBC0C50B6CFD55) ); foreach ( $R281A0F7BC3D849F3386A5AC36FB35807 as $RAE9A4476893066B7B92C648E9F0FDEE8 ) { if ( $RAE9A4476893066B7B92C648E9F0FDEE8['Status'] == 'checked' ) { if ( $RAE9A4476893066B7B92C648E9F0FDEE8['Spilgames'] === true ) { $R96ED148C2F6F268FCB4CCBC4330538C7 = $RAE9A4476893066B7B92C648E9F0FDEE8['Name']; } else { $R96ED148C2F6F268FCB4CCBC4330538C7 = $RAE9A4476893066B7B92C648E9F0FDEE8['Spilgames']; } if ( strpos( $R96ED148C2F6F268FCB4CCBC4330538C7, $R7697B8C9FB68C249A0DBC0C50B6CFD55 ) !== false ) { $R7E48A94D08652CE34DE703DF9E891458 = true; $R294E407FFD0BBD22EA24DD907D5DDE58 = $RAE9A4476893066B7B92C648E9F0FDEE8['Name']; break 2; } } } } if (!$R7E48A94D08652CE34DE703DF9E891458) { continue; } switch ( $spilgames['thumbsize'] ) { case '1': { $R2DDE0731A571E9A7BA651E79C5025426 = $R2CDAD6EF7D5C41B8DB9EB739620C280A->thumbnails->small; $RC762A21CF01F9DFBEA30DD29D5B7CBD9 = pathinfo( $R2DDE0731A571E9A7BA651E79C5025426, PATHINFO_EXTENSION); if ( in_array( $RC762A21CF01F9DFBEA30DD29D5B7CBD9, $R5D2511FD8F7BF05DCC8486611BAABD2D ) ) { break; } } case '2': { $R2DDE0731A571E9A7BA651E79C5025426 = $R2CDAD6EF7D5C41B8DB9EB739620C280A->thumbnails->medium; $RC762A21CF01F9DFBEA30DD29D5B7CBD9 = pathinfo( $R2DDE0731A571E9A7BA651E79C5025426, PATHINFO_EXTENSION); if ( in_array( $RC762A21CF01F9DFBEA30DD29D5B7CBD9, $R5D2511FD8F7BF05DCC8486611BAABD2D ) ) { break; } } case '3': { $R2DDE0731A571E9A7BA651E79C5025426 = $R2CDAD6EF7D5C41B8DB9EB739620C280A->thumbnails->large; $RC762A21CF01F9DFBEA30DD29D5B7CBD9 = pathinfo( $R2DDE0731A571E9A7BA651E79C5025426, PATHINFO_EXTENSION); if ( in_array( $RC762A21CF01F9DFBEA30DD29D5B7CBD9, $R5D2511FD8F7BF05DCC8486611BAABD2D ) ) { break; } } default : { $R2DDE0731A571E9A7BA651E79C5025426 = MYARCADE_URL . "/images/noimage.png"; } } if ( "iframe" == $R2CDAD6EF7D5C41B8DB9EB739620C280A->technology ) { $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'iframe'; } else { $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'spilgames'; } $R69F05BD3024E3A18B29F11DF8A3E8C79->name = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->title); $R69F05BD3024E3A18B29F11DF8A3E8C79->slug = F64A2F46BC8BAFD9163DD9691D1207278($R2CDAD6EF7D5C41B8DB9EB739620C280A->title); $R69F05BD3024E3A18B29F11DF8A3E8C79->created = date( 'Y-m-d h:i:s', time() ); $R69F05BD3024E3A18B29F11DF8A3E8C79->description = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->description); $R69F05BD3024E3A18B29F11DF8A3E8C79->categs = esc_sql($R294E407FFD0BBD22EA24DD907D5DDE58); $R69F05BD3024E3A18B29F11DF8A3E8C79->swf_url = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->gameUrl); $R69F05BD3024E3A18B29F11DF8A3E8C79->thumbnail_url = esc_sql($R2DDE0731A571E9A7BA651E79C5025426); $R69F05BD3024E3A18B29F11DF8A3E8C79->leaderboard_enabled = esc_sql( $R2CDAD6EF7D5C41B8DB9EB739620C280A->properties->highscore ); $R69F05BD3024E3A18B29F11DF8A3E8C79->width = $R2CDAD6EF7D5C41B8DB9EB739620C280A->width; $R69F05BD3024E3A18B29F11DF8A3E8C79->height = $R2CDAD6EF7D5C41B8DB9EB739620C280A->height; $R630F8C3F00ED4BE49091A902C671B200++; FF09D7482BA5FAADAB6D947666FFD8C43( $R69F05BD3024E3A18B29F11DF8A3E8C79, $echo ); } } } FC6BC39ED73177ED6BA0A3E5B1C3D6848( $R630F8C3F00ED4BE49091A902C671B200, $echo ); } ?>