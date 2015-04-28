<?php
 if ( ! defined( 'ABSPATH' ) ) { exit; } function myarcade_settings_scirra() { $scirra = get_option( 'myarcade_scirra' ); ?>
  <h2 class="trigger"><?php _e("Scirra", 'myarcadeplugin'); ?></h2>
  <div class="toggle_container">
    <div class="block">
      <table class="optiontable" width="100%" cellpadding="5" cellspacing="5">
        <tr>
          <td colspan="2">
            <i>
              <?php _e("Scirra provides sponsored game XML feed.", 'myarcadeplugin'); ?> Click <a href="http://www.scirra.com/arcade/free-games-for-your-website" target="_blank">here</a> to visit the Scirra site.
            </i>
            <br /><br />
          </td>
        </tr>
        <tr><td colspan="2"><h3><?php _e("Feed URL", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="text" size="40"  name="scirra_url" value="<?php echo $scirra['feed']; ?>" />
          </td>
          <td><i><?php _e("Edit this field only if Feed URL has been changed!", 'myarcadeplugin'); ?></i></td>
        </tr>
        <tr><td colspan="2"><h3><?php _e("Thumbail Size", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <select name="scirra_thumbnail">
              <option value="small" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($scirra['thumbnail'], "small"); ?>>Small (72x60)</option>
              <option value="medium" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($scirra['thumbnail'], "medium"); ?>>Medium (120x100)</option>
              <option value="big" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($scirra['thumbnail'], "big"); ?>>Big (280x233)</option>
            </select>
          </td>
          <td><i><?php _e("Select the preferred game thumbnail size. Default: Medium.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Automated Game Publishing", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <input type="checkbox" name="scirra_cron_publish" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($scirra['cron_publish'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
          </td>
          <td><i><?php _e("Enable this if you want to publish games automatically. Go to 'General Settings' to select a cron interval.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h4><?php _e("Publish Games", 'myarcadeplugin'); ?></h4></td></tr>

        <tr>
          <td>
            <input type="text" size="40"  name="scirra_cron_publish_limit" value="<?php echo $scirra['cron_publish_limit']; ?>" />
          </td>
          <td><i><?php _e("How many games should be published on every cron trigger?", 'myarcadeplugin'); ?></i></td>
        </tr>

      </table>
      <input class="button button-primary" id="submit" type="submit" name="submit" value="<?php _e("Save Settings", 'myarcadeplugin'); ?>" />
    </div>
  </div>
  <?php
} function myarcade_save_settings_scirra() { $R7705127947020CA2ED921BE6E0FA664F = filter_input( INPUT_POST, 'myarcade_save_settings_nonce'); if ( ! $R7705127947020CA2ED921BE6E0FA664F || ! wp_verify_nonce( $R7705127947020CA2ED921BE6E0FA664F, 'myarcade_save_settings' ) ) { return; } $scirra = array(); if ( isset($_POST['scirra_url'])) $scirra['feed'] = esc_url_raw($_POST['scirra_url']); else $scirra['feed'] = ''; if ( isset($_POST['scirra_thumbnail'])) $scirra['thumbnail'] = trim($_POST['scirra_thumbnail']); else $scirra['thumbnail'] = 'medium'; $scirra['cron_publish'] = (isset($_POST['scirra_cron_publish']) ) ? true : false; $scirra['cron_publish_limit'] = (isset($_POST['scirra_cron_publish_limit']) ) ? intval($_POST['scirra_cron_publish_limit']) : 1; update_option('myarcade_scirra', $scirra); } function F43C73EF89518F1D8947CED726CCF558A() { } function myarcade_feed_scirra( $R9FE302BDF914868081913A22F58F9E7E = array() ) { global $wpdb; $R1C087CFC2417747F08C78E3E5D5121E5 = array( 'echo' => false, 'settings' => array() ); $RAA7BB4B05FBD27DB7CA594893F166B47 = wp_parse_args( $R9FE302BDF914868081913A22F58F9E7E, $R1C087CFC2417747F08C78E3E5D5121E5 ); extract($RAA7BB4B05FBD27DB7CA594893F166B47); $R630F8C3F00ED4BE49091A902C671B200 = 0; $R7E48A94D08652CE34DE703DF9E891458 = false; $scirra = get_option('myarcade_scirra'); $R281A0F7BC3D849F3386A5AC36FB35807 = get_option('myarcade_categories'); require_once( MYARCADE_CORE_DIR . '/fetch.php' ); $R569981A9B29B5950206124A5933F6CB9 = F720E8C77506CFC05F85A08A7EF8F1D41( array('url' => $scirra['feed'], 'service' => 'xml', 'echo' => true) ); if ( !empty($R569981A9B29B5950206124A5933F6CB9) ) { foreach ($R569981A9B29B5950206124A5933F6CB9 as $R2CDAD6EF7D5C41B8DB9EB739620C280A) { if ( 'True' == $R2CDAD6EF7D5C41B8DB9EB739620C280A->deleted || 'False' == $R2CDAD6EF7D5C41B8DB9EB739620C280A->approved ) { continue; } $R69F05BD3024E3A18B29F11DF8A3E8C79 = new stdClass(); $R69F05BD3024E3A18B29F11DF8A3E8C79->uuid = (string) $R2CDAD6EF7D5C41B8DB9EB739620C280A->gameid; $R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag = md5($R2CDAD6EF7D5C41B8DB9EB739620C280A->gameid.$R2CDAD6EF7D5C41B8DB9EB739620C280A->name.'scirra'); $R89FEDA984B61366DE78855CB7D5F44D1 = $wpdb->get_var("SELECT id FROM ".$wpdb->prefix . 'myarcadegames'." WHERE uuid = '".$R69F05BD3024E3A18B29F11DF8A3E8C79->uuid."' OR game_tag = '".$R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag."' OR name = '".esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->name)."'"); if ( !$R89FEDA984B61366DE78855CB7D5F44D1 ) { $R7E48A94D08652CE34DE703DF9E891458 = false; $R69F05BD3024E3A18B29F11DF8A3E8C79->category = $R2CDAD6EF7D5C41B8DB9EB739620C280A->category; switch ($R69F05BD3024E3A18B29F11DF8A3E8C79->category) { case 'Puzzle': $R69F05BD3024E3A18B29F11DF8A3E8C79->category = 'Puzzles'; break; case 'Shooter': $R69F05BD3024E3A18B29F11DF8A3E8C79->category = 'Shooting'; break; case 'Rotary': case 'Example': $R69F05BD3024E3A18B29F11DF8A3E8C79->category = 'Other'; break; } foreach ($R281A0F7BC3D849F3386A5AC36FB35807 as $RAE9A4476893066B7B92C648E9F0FDEE8) { if ( ($RAE9A4476893066B7B92C648E9F0FDEE8['Name'] == $R69F05BD3024E3A18B29F11DF8A3E8C79->category) && ($RAE9A4476893066B7B92C648E9F0FDEE8['Status'] == 'checked') ) { $R7E48A94D08652CE34DE703DF9E891458 = true; break; } } if ($R7E48A94D08652CE34DE703DF9E891458 == false) { continue; } if ( !isset($scirra['thumbnail']) ) { $scirra['thumbnail'] = 'medium'; } $R69F05BD3024E3A18B29F11DF8A3E8C79->thumbnail_url = (string) $R2CDAD6EF7D5C41B8DB9EB739620C280A->images->$scirra['thumbnail']; $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'scirra'; $R69F05BD3024E3A18B29F11DF8A3E8C79->name = esc_sql( $R2CDAD6EF7D5C41B8DB9EB739620C280A->name ); $R69F05BD3024E3A18B29F11DF8A3E8C79->slug = F64A2F46BC8BAFD9163DD9691D1207278($R69F05BD3024E3A18B29F11DF8A3E8C79->name); $R69F05BD3024E3A18B29F11DF8A3E8C79->description = esc_sql( strip_tags($R2CDAD6EF7D5C41B8DB9EB739620C280A->description) ); $R69F05BD3024E3A18B29F11DF8A3E8C79->instructions = esc_sql( strip_tags($R2CDAD6EF7D5C41B8DB9EB739620C280A->instructions) ); $R69F05BD3024E3A18B29F11DF8A3E8C79->rating = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->totalscore); $R69F05BD3024E3A18B29F11DF8A3E8C79->width = (string)$R2CDAD6EF7D5C41B8DB9EB739620C280A->width; $R69F05BD3024E3A18B29F11DF8A3E8C79->height = (string)$R2CDAD6EF7D5C41B8DB9EB739620C280A->height; $R69F05BD3024E3A18B29F11DF8A3E8C79->categs = $R69F05BD3024E3A18B29F11DF8A3E8C79->category; $R69F05BD3024E3A18B29F11DF8A3E8C79->swf_url = esc_sql($R2CDAD6EF7D5C41B8DB9EB739620C280A->embedurl); $R69F05BD3024E3A18B29F11DF8A3E8C79->screen1_url = isset($R2CDAD6EF7D5C41B8DB9EB739620C280A->images->big) ? (string)$R2CDAD6EF7D5C41B8DB9EB739620C280A->images->big : ''; $R69F05BD3024E3A18B29F11DF8A3E8C79->created = (string)$R2CDAD6EF7D5C41B8DB9EB739620C280A->date; $R630F8C3F00ED4BE49091A902C671B200++; FF09D7482BA5FAADAB6D947666FFD8C43( $R69F05BD3024E3A18B29F11DF8A3E8C79, $echo ); } } } FC6BC39ED73177ED6BA0A3E5B1C3D6848( $R630F8C3F00ED4BE49091A902C671B200, $echo ); } ?>