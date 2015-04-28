<?php
 if ( ! defined( 'ABSPATH' ) ) { exit; } function myarcade_settings_myarcadefeed() { $myarcadefeed = get_option( 'myarcade_myarcadefeed' ); ?>
  <h2 class="trigger"><?php _e("MyArcadeFeed", 'myarcadeplugin'); ?></h2>
  <div class="toggle_container">
    <div class="block">
      <table class="optiontable" width="100%" cellpadding="5" cellspacing="5">
        <tr>
          <td colspan="2">
            <i>
              <?php _e("Add up to five Feeds generated with MyArcadeFeed Plugin.", 'myarcadeplugin'); ?> Click <a href="http://exells.com/shop/products/myarcadefeed">here</a> to learn more about MyArcadeFeed.
            </i>
            <br /><br />
          </td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("MyArcadeFeed URL 1", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="text" size="40"  name="myarcadefeed1" value="<?php echo $myarcadefeed['feed1']; ?>" />
          </td>
          <td><i><?php _e("Paste your MyArcadeFeed URL No. 1 here.", 'myarcadeplugin'); ?></i></td>
        </tr>
        <tr><td colspan="2"><h3><?php _e("MyArcadeFeed URL 2", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="text" size="40"  name="myarcadefeed2" value="<?php echo $myarcadefeed['feed2']; ?>" />
          </td>
          <td><i><?php _e("Paste your MyArcadeFeed URL No. 2 here.", 'myarcadeplugin'); ?></i></td>
        </tr>
        <tr><td colspan="2"><h3><?php _e("MyArcadeFeed URL 3", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="text" size="40"  name="myarcadefeed3" value="<?php echo $myarcadefeed['feed3']; ?>" />
          </td>
          <td><i><?php _e("Paste your MyArcadeFeed URL No. 3 here.", 'myarcadeplugin'); ?></i></td>
        </tr>
        <tr><td colspan="2"><h3><?php _e("MyArcadeFeed URL 4", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="text" size="40"  name="myarcadefeed4" value="<?php echo $myarcadefeed['feed4']; ?>" />
          </td>
          <td><i><?php _e("Paste your MyArcadeFeed URL No. 4 here.", 'myarcadeplugin'); ?></i></td>
        </tr>
        <tr><td colspan="2"><h3><?php _e("MyArcadeFeed URL 5", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="text" size="40"  name="myarcadefeed5" value="<?php echo $myarcadefeed['feed5']; ?>" />
          </td>
          <td><i><?php _e("Paste your MyArcadeFeed URL No. 5 here.", 'myarcadeplugin'); ?></i></td>
        </tr>
        <tr><td colspan="2"><h3><?php _e("Fetch All Categories", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="checkbox" name="myarcadefeed_all_categories" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($myarcadefeed['all_categories'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
          </td>
          <td><i><?php _e("Activate this if you want to fetch all games independent of your activated categories.", 'myarcadeplugin'); ?></i></td>
        </tr>
      </table>
      <input class="button button-primary" id="submit" type="submit" name="submit" value="<?php _e("Save Settings", 'myarcadeplugin'); ?>" />
    </div>
  </div>
  <?php
} function myarcade_save_settings_myarcadefeed() { $R7705127947020CA2ED921BE6E0FA664F = filter_input( INPUT_POST, 'myarcade_save_settings_nonce'); if ( ! $R7705127947020CA2ED921BE6E0FA664F || ! wp_verify_nonce( $R7705127947020CA2ED921BE6E0FA664F, 'myarcade_save_settings' ) ) { return; } $myarcadefeed = array(); $myarcadefeed['feed1'] = (isset($_POST['myarcadefeed1'])) ? esc_url_raw($_POST['myarcadefeed1']) : ''; $myarcadefeed['feed2'] = (isset($_POST['myarcadefeed2'])) ? esc_url_raw($_POST['myarcadefeed2']) : ''; $myarcadefeed['feed3'] = (isset($_POST['myarcadefeed3'])) ? esc_url_raw($_POST['myarcadefeed3']) : ''; $myarcadefeed['feed4'] = (isset($_POST['myarcadefeed4'])) ? esc_url_raw($_POST['myarcadefeed4']) : ''; $myarcadefeed['feed5'] = (isset($_POST['myarcadefeed5'])) ? esc_url_raw($_POST['myarcadefeed5']) : ''; $myarcadefeed['all_categories'] = (isset($_POST['myarcadefeed_all_categories'])) ? true : false; update_option('myarcade_myarcadefeed', $myarcadefeed); } function F9A867498EF256C15FACD6A5D0C97FC31() { } function myarcade_feed_myarcadefeed($R9FE302BDF914868081913A22F58F9E7E) { global $wpdb; $R1C087CFC2417747F08C78E3E5D5121E5 = array( 'echo' => false, 'settings' => array() ); $RAA7BB4B05FBD27DB7CA594893F166B47 = wp_parse_args( $R9FE302BDF914868081913A22F58F9E7E, $R1C087CFC2417747F08C78E3E5D5121E5 ); extract($RAA7BB4B05FBD27DB7CA594893F166B47); $R630F8C3F00ED4BE49091A902C671B200 = 0; $R7E48A94D08652CE34DE703DF9E891458 = false; $myarcadefeed = get_option('myarcade_myarcadefeed'); $R281A0F7BC3D849F3386A5AC36FB35807 = get_option('myarcade_categories'); $RF0EAC6DAF5B3AF677609338C1E10A2F4 = $settings['feed']; if ( empty($settings) ) { $settings = $myarcadefeed; } require_once( MYARCADE_CORE_DIR . '/fetch.php' ); $R569981A9B29B5950206124A5933F6CB9 = F720E8C77506CFC05F85A08A7EF8F1D41( array( 'url' => $settings[$RF0EAC6DAF5B3AF677609338C1E10A2F4], 'service' => 'xml', 'echo' => true ) ); if ( !empty($R569981A9B29B5950206124A5933F6CB9) && isset($R569981A9B29B5950206124A5933F6CB9->gameset) ) { foreach ($R569981A9B29B5950206124A5933F6CB9->gameset->game as $R69F05BD3024E3A18B29F11DF8A3E8C79) { $R69F05BD3024E3A18B29F11DF8A3E8C79->uuid = $R69F05BD3024E3A18B29F11DF8A3E8C79->id; $R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag = md5($R69F05BD3024E3A18B29F11DF8A3E8C79->id.$R69F05BD3024E3A18B29F11DF8A3E8C79->name.'myarcadefeed'); $R89FEDA984B61366DE78855CB7D5F44D1 = $wpdb->get_var("SELECT id FROM ".$wpdb->prefix . 'myarcadegames'." WHERE uuid = '".$R69F05BD3024E3A18B29F11DF8A3E8C79->uuid."' OR game_tag = '".$R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag."' OR name = '".esc_sql($R69F05BD3024E3A18B29F11DF8A3E8C79->name)."'"); if ( !$R89FEDA984B61366DE78855CB7D5F44D1 ) { $R30E38C1F8EC85F8EE8DF620FF3267157 = explode( ',', $R69F05BD3024E3A18B29F11DF8A3E8C79->category ); if ( ! $settings['all_categories'] ) { $R7E48A94D08652CE34DE703DF9E891458 = false; foreach ($R281A0F7BC3D849F3386A5AC36FB35807 as $RAE9A4476893066B7B92C648E9F0FDEE8) { foreach ( $R30E38C1F8EC85F8EE8DF620FF3267157 as $RCB6CF74D12D3949F4F3C570ECE4B9CB5 ) { if ( ($RAE9A4476893066B7B92C648E9F0FDEE8['Name'] == $RCB6CF74D12D3949F4F3C570ECE4B9CB5) && ($RAE9A4476893066B7B92C648E9F0FDEE8['Status'] == 'checked') ) { $R7E48A94D08652CE34DE703DF9E891458 = true; break; } } if ( $R7E48A94D08652CE34DE703DF9E891458 ) { break; } } if ($R7E48A94D08652CE34DE703DF9E891458 == false) { continue; } } $R69F05BD3024E3A18B29F11DF8A3E8C79->gamecode = urldecode($R69F05BD3024E3A18B29F11DF8A3E8C79->gamecode); if ( strpos( $R69F05BD3024E3A18B29F11DF8A3E8C79->gamecode, 'src=') !== FALSE ) { $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'embed'; } else { $R33D3EC748433467E20D0947C3032E305 = pathinfo( $R69F05BD3024E3A18B29F11DF8A3E8C79->gamecode , PATHINFO_EXTENSION ); switch ( $R33D3EC748433467E20D0947C3032E305 ) { case 'dcr' : { $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'dcr'; } break; case 'unity3d' : { $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'unity'; } case 'html' : { $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'iframe'; } break; default : { $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'myarcadefeed'; } break; } } $R69F05BD3024E3A18B29F11DF8A3E8C79->name = esc_sql( $R69F05BD3024E3A18B29F11DF8A3E8C79->name ); $R69F05BD3024E3A18B29F11DF8A3E8C79->slug = F64A2F46BC8BAFD9163DD9691D1207278($R69F05BD3024E3A18B29F11DF8A3E8C79->name); $R69F05BD3024E3A18B29F11DF8A3E8C79->description = esc_sql($R69F05BD3024E3A18B29F11DF8A3E8C79->description); $R69F05BD3024E3A18B29F11DF8A3E8C79->instructions = esc_sql($R69F05BD3024E3A18B29F11DF8A3E8C79->instructions); $R69F05BD3024E3A18B29F11DF8A3E8C79->categs = esc_sql($R69F05BD3024E3A18B29F11DF8A3E8C79->category); $R69F05BD3024E3A18B29F11DF8A3E8C79->thumbnail_url = esc_sql($R69F05BD3024E3A18B29F11DF8A3E8C79->thumbnail); $R69F05BD3024E3A18B29F11DF8A3E8C79->swf_url = esc_sql($R69F05BD3024E3A18B29F11DF8A3E8C79->gamecode); $R69F05BD3024E3A18B29F11DF8A3E8C79->screen1_url = !empty($R69F05BD3024E3A18B29F11DF8A3E8C79->screenshot_1) ? $R69F05BD3024E3A18B29F11DF8A3E8C79->screenshot_1 : ''; $R69F05BD3024E3A18B29F11DF8A3E8C79->screen2_url = !empty($R69F05BD3024E3A18B29F11DF8A3E8C79->screenshot_2) ? $R69F05BD3024E3A18B29F11DF8A3E8C79->screenshot_2 : ''; $R69F05BD3024E3A18B29F11DF8A3E8C79->screen3_url = !empty($R69F05BD3024E3A18B29F11DF8A3E8C79->screenshot_3) ? $R69F05BD3024E3A18B29F11DF8A3E8C79->screenshot_3 : ''; $R69F05BD3024E3A18B29F11DF8A3E8C79->screen4_url = !empty($R69F05BD3024E3A18B29F11DF8A3E8C79->screenshot_4) ? $R69F05BD3024E3A18B29F11DF8A3E8C79->screenshot_4 : ''; $R69F05BD3024E3A18B29F11DF8A3E8C79->tags = ( !empty($R69F05BD3024E3A18B29F11DF8A3E8C79->tags) ) ? esc_sql($R69F05BD3024E3A18B29F11DF8A3E8C79->tags) : ''; $R630F8C3F00ED4BE49091A902C671B200++; FF09D7482BA5FAADAB6D947666FFD8C43( $R69F05BD3024E3A18B29F11DF8A3E8C79, $echo ); } } } FC6BC39ED73177ED6BA0A3E5B1C3D6848( $R630F8C3F00ED4BE49091A902C671B200, $echo ); } ?>