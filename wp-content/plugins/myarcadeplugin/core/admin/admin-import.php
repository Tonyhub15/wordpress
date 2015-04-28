<?php
 if( !defined( 'ABSPATH' ) ) { die(); } function F415314D4CA21D08BF57AB39A6A25DBCC() { global $wpdb; F94EBD7C16769D03E06E16136FFE5F944(); $general= get_option( 'myarcade_general' ); $R69F05BD3024E3A18B29F11DF8A3E8C79 = new stdClass(); if ( isset($_POST['impcostgame']) && ($_POST['impcostgame'] == 'import') ) { if ( $_POST['importtype'] == 'embed' || $_POST['importtype'] == 'iframe' ) { $R6D64B25F70158CAE51B59D6DFF10540B = urldecode( $_POST['importgame'] ); $R866FEAF100162D6A66F8617643D8632F = str_replace( array("\r\n", "\r", "\n"), " ", $R6D64B25F70158CAE51B59D6DFF10540B); $R69F05BD3024E3A18B29F11DF8A3E8C79->swf_url = esc_sql( $R866FEAF100162D6A66F8617643D8632F ); } else { $R69F05BD3024E3A18B29F11DF8A3E8C79->swf_url = $_POST['importgame']; } $R69F05BD3024E3A18B29F11DF8A3E8C79->width = !empty($_POST['gamewidth']) ? $_POST['gamewidth'] : ''; $R69F05BD3024E3A18B29F11DF8A3E8C79->height = !empty($_POST['gameheight']) ? $_POST['gameheight'] : ''; if ( ($_POST['importtype'] == 'ibparcade') OR ($_POST['importtype'] == 'phpbb') ) { $R69F05BD3024E3A18B29F11DF8A3E8C79->slug = $_POST['slug']; } else { $R69F05BD3024E3A18B29F11DF8A3E8C79->slug = preg_replace("/[^a-zA-Z0-9 ]/", "", strtolower($_POST['gamename'])); $R69F05BD3024E3A18B29F11DF8A3E8C79->slug = str_replace(" ", "-", $R69F05BD3024E3A18B29F11DF8A3E8C79->slug); } $R69F05BD3024E3A18B29F11DF8A3E8C79->name = $_POST['gamename']; $R69F05BD3024E3A18B29F11DF8A3E8C79->type = $_POST['importtype']; $R69F05BD3024E3A18B29F11DF8A3E8C79->uuid = md5($R69F05BD3024E3A18B29F11DF8A3E8C79->name.'import'); $R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag = ( !empty($_POST['importgametag'])) ? $_POST['importgametag'] : crc32($R69F05BD3024E3A18B29F11DF8A3E8C79->uuid); $R69F05BD3024E3A18B29F11DF8A3E8C79->thumbnail_url = $_POST['importthumb']; $R69F05BD3024E3A18B29F11DF8A3E8C79->description = $_POST['gamedescr']; $R69F05BD3024E3A18B29F11DF8A3E8C79->instructions = $_POST['gameinstr']; $R69F05BD3024E3A18B29F11DF8A3E8C79->tags = esc_sql( $_POST['gametags'] ); $R69F05BD3024E3A18B29F11DF8A3E8C79->categs = ( isset($_POST['gamecategs']) ) ? implode(",", $_POST['gamecategs']) : 'Other'; $R69F05BD3024E3A18B29F11DF8A3E8C79->created = gmdate( 'Y-m-d H:i:s', ( time() + (get_option( 'gmt_offset' ) * 3600 ) ) ); $R69F05BD3024E3A18B29F11DF8A3E8C79->leaderboard_enabled = filter_input( INPUT_POST, 'lbenabled' ); if ( ! empty( $_POST['highscoretype'] ) && 'low' == $_POST['highscoretype'] ) { $R69F05BD3024E3A18B29F11DF8A3E8C79->highscore_type = 'ASC'; } else { $R69F05BD3024E3A18B29F11DF8A3E8C79->highscore_type = 'DESC'; } $R69F05BD3024E3A18B29F11DF8A3E8C79->status = 'new'; $R69F05BD3024E3A18B29F11DF8A3E8C79->screen1_url = $_POST['importscreen1']; $R69F05BD3024E3A18B29F11DF8A3E8C79->screen2_url = $_POST['importscreen2']; $R69F05BD3024E3A18B29F11DF8A3E8C79->screen3_url = $_POST['importscreen3']; $R69F05BD3024E3A18B29F11DF8A3E8C79->screen4_url = $_POST['importscreen4']; $R69F05BD3024E3A18B29F11DF8A3E8C79->video_url = isset($_POST['video_url']) ? $_POST['video_url'] : ''; $R69F05BD3024E3A18B29F11DF8A3E8C79->score_bridge = isset($_POST['score_bridge']) ? $_POST['score_bridge'] : ''; F3EC5FD80BBB0380830A5FDD537A22AB2($R69F05BD3024E3A18B29F11DF8A3E8C79); if ($_POST['publishstatus'] != 'add') { $REAA6191C2FA9B633A100C34B5C0CFB41 = $wpdb->get_var("SELECT id FROM " . $wpdb->prefix . 'myarcadegames' . " WHERE uuid = '$R69F05BD3024E3A18B29F11DF8A3E8C79->uuid'"); if ( !empty($REAA6191C2FA9B633A100C34B5C0CFB41) ) { F5F9EB2BD2DA652CBF122EEF75C2BE581( array('game_id' => $REAA6191C2FA9B633A100C34B5C0CFB41, 'post_status' => $_POST['publishstatus'], 'echo' => false) ); echo '<div class="mabp_info mabp_680"><p>'.sprintf(__("Import of '%s' was succsessful.", 'myarcadeplugin'), $R69F05BD3024E3A18B29F11DF8A3E8C79->name).'</p></div>'; } else { echo '<div class="mabp_error mabp_680"><p>'.__("Can't import that game...", 'myarcadeplugin').'</p></div>'; } } else { echo '<div class="mabp_info mabp_680"><p>'. sprintf(__("Game added successfully: %s", 'myarcadeplugin'), $R69F05BD3024E3A18B29F11DF8A3E8C79->name).'</p></div>'; } } if ( $general['post_type'] != 'post' && post_type_exists( $general['post_type'] ) && !empty( $general['custom_category']) && taxonomy_exists($general['custom_category']) ) { $R270D396521F6B787A692C06F477944DA = $general['custom_category']; } else { $R270D396521F6B787A692C06F477944DA = 'category'; } $R30E38C1F8EC85F8EE8DF620FF3267157 = get_terms( $R270D396521F6B787A692C06F477944DA, array('hide_empty' => false) ); ?>

  <?php @include_once( MYARCADE_JS_DIR . '/admin-import-js.php'); ?>
  <div id="myabp_import">
    <h2><?php _e("Import Individual Games", 'myarcadeplugin'); ?></h2>

    <div class="container">
      <div class="block">
        <table class="optiontable" width="100%">
          <tr>
            <td><h3><?php _e("Import Method", 'myarcadeplugin'); ?></h3></td>
          </tr>
          <tr>
            <td>
              <select size="1" name="importmethod" id="importmethod">
                <option value="importswfdcr"><?php _e("Upload / Grab SWF or DCR game", 'myarcadeplugin'); ?>&nbsp;</option>
                <option value="importibparcade"><?php _e("Upload IBPArcade game", 'myarcadeplugin'); ?></option>
                <option value="importphpbb"><?php _e("Upload ZIP File / PHPBB / Mochi", 'myarcadeplugin'); ?></option>
                <option value="importembedif"><?php _e("Import Embed / Iframe game", 'myarcadeplugin'); ?></option>
                <option value="importunity"><?php _e("Import Unity game", 'myarcadeplugin'); ?></option>
              </select>
              <br />
              <i><?php _e("Choose a desired import method.", 'myarcadeplugin'); ?></i>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <?php F6EA18CC24E716446F2A5A342DACB6052(); ?>

    <?php require_once( 'import_form.php' ); ?>
  </div><?php ?>
  <div class="clear"></div>
  <?php
 F011F5FA6950FDD84A7242122BC8934C3(); } ?>