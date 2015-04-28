<?php
 if ( ! defined( 'ABSPATH' ) ) { exit; } function myarcade_add_meta_box_conditionally() { $post_id = filter_input( INPUT_GET, 'post', FILTER_VALIDATE_INT ); if ( ! $post_id ) { $post_id = filter_input( INPUT_POST, 'post_ID', FILTER_VALIDATE_INT ); if ( ! $post_id ) { return; } } $general = get_option( 'myarcade_general' ); if ( is_game( $post_id ) || $general['post_type'] == get_post_type( $post_id ) ) { add_action('add_meta_boxes', 'myarcade_game_details_meta_box'); add_action('save_post', 'myarcade_meta_box_save', 1, 2); if ( is_leaderboard_game( $post_id ) ) { add_action('add_meta_boxes', 'myarcade_game_leaderboard_meta_box'); } } } add_action( 'admin_init', 'myarcade_add_meta_box_conditionally' ); function myarcade_game_details_meta_box() { $general = get_option( 'myarcade_general' ); if ( $general['post_type'] != 'post' && post_type_exists($general['post_type']) ) { $R65DFACB39960C22313740A131148FB81 = $general['post_type']; } else { $R65DFACB39960C22313740A131148FB81 = 'post'; } add_meta_box('myarcade-game-data', __('MyArcadePlugin Game Details', 'myarcadeplugin'), 'myarcade_game_data_box', $R65DFACB39960C22313740A131148FB81, 'normal', 'high'); } function myarcade_game_leaderboard_meta_box() { $general = get_option( 'myarcade_general' ); if ( $general['post_type'] != 'post' && post_type_exists($general['post_type']) ) { $R65DFACB39960C22313740A131148FB81 = $general['post_type']; } else { $R65DFACB39960C22313740A131148FB81 = 'post'; } add_meta_box('myarcade-game-scores', __('MyArcadePlugin Game Scores', 'myarcadeplugin'), 'myarcade_game_scores_box', $R65DFACB39960C22313740A131148FB81, 'normal', 'high'); } function myarcade_game_data_box() { global $post, $postID, $REC43CE978463AAD8D91F93AE43393035, $RF766CAD1517B606915734CB209F027B8; $postID = $post->ID; $R8CE970ED0281F2178F2BB03A8DF5EB5B = get_post_meta($postID, 'mabp_game_type', true); if( ! $R8CE970ED0281F2178F2BB03A8DF5EB5B ) { ?>
    <p>
      <?php _e("This post is not a game.", 'myarcadeplugin'); ?>
    </p>
    <?php
 return; } $RE054F7AA879B5BC82B1D74578162D95F = array_merge($REC43CE978463AAD8D91F93AE43393035, $RF766CAD1517B606915734CB209F027B8); wp_nonce_field( 'myarcade_save_data', 'myarcade_meta_nonce' ); ?>
  <div class="panel-wrap myarcade_game_data">
    <ul class="myarcade_data_tabs tabs" style="display:none;">
      <li class="active"><a href="#myarcade_game_data"><?php _e('Game Details', 'myarcadeplugin'); ?></a></li>
      <li class="files_tab"><a href="#myarcade_game_files"><?php _e('Game Files', 'myarcadeplugin'); ?></a></li>
    </ul>

    <?php ?>
    <div id="myarcade_game_data" class="panel myarcade_game_panel">
      <div class="options_group">
        <?php
 F95BB518A64EEE3888BC384400611615C ( array ( 'id' => 'mabp_description', 'label' => __('Game Description', 'myarcadeplugin') )); F95BB518A64EEE3888BC384400611615C ( array ( 'id' => 'mabp_instructions', 'label' => __('Game Instructions', 'myarcadeplugin') )); F7C80A30CB9126044221684B16EB26128( array( 'id' => 'mabp_height', 'label' => __('Height', 'myarcadeplugin'), 'description' => __('Game height in pixel (px)', 'myarcadeplugin') )); F7C80A30CB9126044221684B16EB26128( array( 'id' => 'mabp_width', 'label' => __('Width', 'myarcadeplugin'), 'description' => __('Game width in pixel (px)', 'myarcadeplugin') )); F3CF00E39B6155136D6FF816443CC1C7A( array( 'id' => 'mabp_game_type', 'label' => __('Game Type', 'myarcadeplugin'), 'options' => $RE054F7AA879B5BC82B1D74578162D95F )); F3CF00E39B6155136D6FF816443CC1C7A( array( 'id' => 'mabp_leaderboard', 'label' => __('Score Support', 'myarcadeplugin'), 'description' => __('Select if this game supports score submitting (Only Mochi or IBPArcade games).'), 'options' => array( '' => 'No', '1' => 'Yes') )); F3CF00E39B6155136D6FF816443CC1C7A( array( 'id' => 'mabp_score_order', 'label' => __('Score Order', 'myarcadeplugin'), 'description' => __('How should MyArcadePlugin order scores for this game.'), 'options' => array( 'DESC' => 'DESC (High to Low)', 'ASC' => 'ASC (Low to High)') )); FD6469B5871F8C9E24C00E17D1EFA99D9( array( 'id' => 'mabp_score_bridge', 'label' => __('GamerSafe Support', 'myarcadeplugin'), 'description' => __("Check this if the game has GamerSafe Data Bridge integrated.", 'myarcadeplugin' ), 'cbvalue' => 'gamersafe' )); ?>
      </div>
    </div>

    <?php ?>
    <div id="myarcade_game_files" class="panel myarcade_game_panel">
      <div class="options_group">
        <?php
 $R745F944ACCFEA4F3BA7E777D3BDD4BA0 = get_post_meta($post->ID, 'mabp_swf_url', true); $R88A33D29429F80B24F150A7737FAA03B = get_post_meta($post->ID, 'mabp_game_type', true); if ( $R88A33D29429F80B24F150A7737FAA03B == 'embed' || $R88A33D29429F80B24F150A7737FAA03B == 'iframe') { $R4454E360FFF252043E577C8411615F0E = array( 'id' => 'mabp_swf_url', 'label' => __('Embed Code', 'myarcadeplugin') ); echo '<p class="myarcade-form-field"><label for="'.$R4454E360FFF252043E577C8411615F0E['id'].'">'.$R4454E360FFF252043E577C8411615F0E['label'].':</label>
          <textarea name="'.$R4454E360FFF252043E577C8411615F0E['id'].'" id="'.$R4454E360FFF252043E577C8411615F0E['id'].'">'.$R745F944ACCFEA4F3BA7E777D3BDD4BA0.'</textarea>
        </p>'; } else { $R4454E360FFF252043E577C8411615F0E = array( 'id' => 'mabp_swf_url', 'label' => __('Game File', 'myarcadeplugin') ); echo '<p class="myarcade-form-field"><label for="'.$R4454E360FFF252043E577C8411615F0E['id'].'">'.$R4454E360FFF252043E577C8411615F0E['label'].':</label>
          <input type="text" class="game_path" name="'.$R4454E360FFF252043E577C8411615F0E['id'].'" id="'.$R4454E360FFF252043E577C8411615F0E['id'].'" value="'.$R745F944ACCFEA4F3BA7E777D3BDD4BA0.'" placeholder="'.__('File path / URL / Embed Code', 'myarcadeplugin').'" />
            <input type="button"  class="upload_game_button button" value="'.__('Upload a file', 'myarcadeplugin').'" />
        </p>'; } $R745F944ACCFEA4F3BA7E777D3BDD4BA0 = get_post_meta($post->ID, 'mabp_thumbnail_url', true); $R4454E360FFF252043E577C8411615F0E = array( 'id' => 'mabp_thumbnail_url', 'label' => __('Game Thumbnail', 'myarcadeplugin') ); echo '<p class="myarcade-form-field"><label for="'.$R4454E360FFF252043E577C8411615F0E['id'].'">'.$R4454E360FFF252043E577C8411615F0E['label'].':</label>
          <input type="text" class="thumbnail_path" name="'.$R4454E360FFF252043E577C8411615F0E['id'].'" id="'.$R4454E360FFF252043E577C8411615F0E['id'].'" value="'.$R745F944ACCFEA4F3BA7E777D3BDD4BA0.'" placeholder="'.__('File path / URL', 'myarcadeplugin').'" />
          <input type="button"  class="upload_thumbnail_button button" value="'.__('Upload a file', 'myarcadeplugin').'" />
        </p>'; $R745F944ACCFEA4F3BA7E777D3BDD4BA0 = get_post_meta($post->ID, 'mabp_screen1_url', true); $R4454E360FFF252043E577C8411615F0E = array( 'id' => 'mabp_screen1_url', 'label' => __('Game Screenshot No. 1', 'myarcadeplugin') ); echo '<p class="myarcade-form-field"><label for="'.$R4454E360FFF252043E577C8411615F0E['id'].'">'.$R4454E360FFF252043E577C8411615F0E['label'].':</label>
          <input type="text" class="screen1_path" name="'.$R4454E360FFF252043E577C8411615F0E['id'].'" id="'.$R4454E360FFF252043E577C8411615F0E['id'].'" value="'.$R745F944ACCFEA4F3BA7E777D3BDD4BA0.'" placeholder="'.__('File path / URL', 'myarcadeplugin').'" />
          <input type="button"  class="upload_screen1_button button" value="'.__('Upload a file', 'myarcadeplugin').'" />
        </p>'; $R745F944ACCFEA4F3BA7E777D3BDD4BA0 = get_post_meta($post->ID, 'mabp_screen2_url', true); $R4454E360FFF252043E577C8411615F0E = array( 'id' => 'mabp_screen2_url', 'label' => __('Game Screenshot No. 2', 'myarcadeplugin') ); echo '<p class="myarcade-form-field"><label for="'.$R4454E360FFF252043E577C8411615F0E['id'].'">'.$R4454E360FFF252043E577C8411615F0E['label'].':</label>
          <input type="text" class="screen1_path" name="'.$R4454E360FFF252043E577C8411615F0E['id'].'" id="'.$R4454E360FFF252043E577C8411615F0E['id'].'" value="'.$R745F944ACCFEA4F3BA7E777D3BDD4BA0.'" placeholder="'.__('File path / URL', 'myarcadeplugin').'" />
          <input type="button"  class="upload_screen2_button button" value="'.__('Upload a file', 'myarcadeplugin').'" />
        </p>'; $R745F944ACCFEA4F3BA7E777D3BDD4BA0 = get_post_meta($post->ID, 'mabp_screen3_url', true); $R4454E360FFF252043E577C8411615F0E = array( 'id' => 'mabp_screen3_url', 'label' => __('Game Screenshot No. 3', 'myarcadeplugin') ); echo '<p class="myarcade-form-field"><label for="'.$R4454E360FFF252043E577C8411615F0E['id'].'">'.$R4454E360FFF252043E577C8411615F0E['label'].':</label>
          <input type="text" class="screen3_path" name="'.$R4454E360FFF252043E577C8411615F0E['id'].'" id="'.$R4454E360FFF252043E577C8411615F0E['id'].'" value="'.$R745F944ACCFEA4F3BA7E777D3BDD4BA0.'" placeholder="'.__('File path / URL', 'myarcadeplugin').'" />
          <input type="button"  class="upload_screen3_button button" value="'.__('Upload a file', 'myarcadeplugin').'" />
        </p>'; $R745F944ACCFEA4F3BA7E777D3BDD4BA0 = get_post_meta($post->ID, 'mabp_screen4_url', true); $R4454E360FFF252043E577C8411615F0E = array( 'id' => 'mabp_screen4_url', 'label' => __('Game Screenshot No. 4', 'myarcadeplugin') ); echo '<p class="myarcade-form-field"><label for="'.$R4454E360FFF252043E577C8411615F0E['id'].'">'.$R4454E360FFF252043E577C8411615F0E['label'].':</label>
          <input type="text" class="screen4_path" name="'.$R4454E360FFF252043E577C8411615F0E['id'].'" id="'.$R4454E360FFF252043E577C8411615F0E['id'].'" value="'.$R745F944ACCFEA4F3BA7E777D3BDD4BA0.'" placeholder="'.__('File path / URL', 'myarcadeplugin').'" />
          <input type="button"  class="upload_screen4_button button" value="'.__('Upload a file', 'myarcadeplugin').'" />
        </p>'; F7C80A30CB9126044221684B16EB26128( array( 'id' => 'mabp_video_url', 'label' => __('Video URL', 'myarcadeplugin'), 'description' => __('Paste a game play video URL (YouTube Link) here.', 'myarcadeplugin') )); ?>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    // Uploading files
    var file_path_field;
    window.send_to_editor_default = window.send_to_editor;

    jQuery('.upload_thumbnail_button').live('click', function(){
      file_path_field = jQuery(this).parent().find('.thumbnail_path');
      formfield = jQuery(file_path_field).attr('name');
      window.send_to_editor = window.send_to_download_url;
      tb_show('', 'media-upload.php?post_id=<?php echo $post->ID; ?>&amp;type=myarcade_image&amp;from=wc01&amp;TB_iframe=true');
      return false;
    });

    jQuery('.upload_game_button').live('click', function(){
      file_path_field = jQuery(this).parent().find('.game_path');
      formfield = jQuery(file_path_field).attr('name');
      window.send_to_editor = window.send_to_download_url;
      tb_show('', 'media-upload.php?post_id=<?php echo $post->ID; ?>&amp;type=myarcade_game&amp;from=wc01&amp;TB_iframe=true');
      return false;
    });

    jQuery('.upload_screen1_button').live('click', function(){
      file_path_field = jQuery(this).parent().find('.screen1_path');
      formfield = jQuery(file_path_field).attr('name');
      window.send_to_editor = window.send_to_download_url;
      tb_show('', 'media-upload.php?post_id=<?php echo $post->ID; ?>&amp;type=myarcade_image&amp;from=wc01&amp;TB_iframe=true');
      return false;
    });

    jQuery('.upload_screen2_button').live('click', function(){
      file_path_field = jQuery(this).parent().find('.screen2_path');
      formfield = jQuery(file_path_field).attr('name');
      window.send_to_editor = window.send_to_download_url;
      tb_show('', 'media-upload.php?post_id=<?php echo $post->ID; ?>&amp;type=myarcade_image&amp;from=wc01&amp;TB_iframe=true');
      return false;
    });

    jQuery('.upload_screen3_button').live('click', function(){
      file_path_field = jQuery(this).parent().find('.screen3_path');
      formfield = jQuery(file_path_field).attr('name');
      window.send_to_editor = window.send_to_download_url;
      tb_show('', 'media-upload.php?post_id=<?php echo $post->ID; ?>&amp;type=myarcade_image&amp;from=wc01&amp;TB_iframe=true');
      return false;
    });

    jQuery('.upload_screen4_button').live('click', function(){
      file_path_field = jQuery(this).parent().find('.screen4_path');
      formfield = jQuery(file_path_field).attr('name');
      window.send_to_editor = window.send_to_download_url;
      tb_show('', 'media-upload.php?post_id=<?php echo $post->ID; ?>&amp;type=myarcade_image&amp;from=wc01&amp;TB_iframe=true');
      return false;
    });

    window.send_to_download_url = function(html) {
      file_url = jQuery(html).attr('href');
      if (file_url) {
        jQuery(file_path_field).val(file_url);
      }
      tb_remove();
      window.send_to_editor = window.send_to_editor_default;
    }
  </script>
  <?php
} function myarcade_game_scores_box() { global $post, $wpdb; if ( ! isset( $post->ID ) ) { _e( "ERROR: Post ID not found!", 'myarcadeplugin' ); return; } $game_tag = get_post_meta( $post->ID, 'mabp_game_tag', true ); $R56EA904D533235F889591E04DE8C6B68 = get_post_meta( $post->ID, 'mabp_score_order', true ); if ( ! $R56EA904D533235F889591E04DE8C6B68 ) { $R56EA904D533235F889591E04DE8C6B68 = "DESC"; } $RCC92E37B019926C00A7F2FA0DFB598C3 = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix.'myarcadescores' . " WHERE game_tag = '{$game_tag}' ORDER BY score+0 " . $R56EA904D533235F889591E04DE8C6B68 ); if ( $RCC92E37B019926C00A7F2FA0DFB598C3 ) { ?>
    <script type="text/javascript">
      /* <![CDATA[ */
      function myarcade_confirm_delete() {
        if ( confirm( "<?php _e("Are you sure you want to delete all game scores?", 'myarcadeplugin'); ?>" ) ) {
          jQuery('#delete_game_scores').css('display', 'inline');
          jQuery.post('<?php echo admin_url('admin-ajax.php'); ?>', {
            action:'myarcade_handler',
            game_tag: <?php echo $game_tag; ?>,
            func:'delete_game_scores'
          },
          function() {
            jQuery('#game_scores').fadeOut('slow');
            jQuery('#delete_game_scores').removeAttr('style');
            jQuery('#myarcade-game-scores .inside').html( "<?php _e( "No scores available.", 'myarcadeplugin' ); ?>" );
          });
        }
        return false;
      }
      /* ]]> */
    </script>

    <p>
      <button class="button-primary" onclick="return myarcade_confirm_delete();"><?php _e("Delete All Scores", 'myarcadeplugin') ?></button><span id="delete_game_scores" class="spinner"></span>
    </p>

    <table id="game_scores" class="widefat fixed">
      <thead>
      <tr>
        <th scope="col">User</th>
        <th scope="col">Date</th>
        <th scope="col">Score</th>
        <th scope="col">Action</th>
      </tr>
      </thead>
      <tbody>
        <?php foreach ( $RCC92E37B019926C00A7F2FA0DFB598C3 as $RD94C2157798BCCE313068BF1BF25A119 ) : ?>
          <?php
 $RE0D5EDB560A26D4E1BECD832EA026E32 = get_user_by('id', $RD94C2157798BCCE313068BF1BF25A119->user_id); $RFCEC126459437562AA1A4BF95DD30CEE = MYARCADE_CORE_URL.'/editscore.php?scoreid='.$RD94C2157798BCCE313068BF1BF25A119->id; $R9A7D8CD5AD8135D269B8B0D4E22B244A ='<a href="'.$RFCEC126459437562AA1A4BF95DD30CEE.'&keepThis=true&TB_iframe=1&height=300&width=500" class="button-secondary thickbox edit" title="'.__("Edit Score", 'myarcadeplugin').'">'.__("Edit", 'myarcadeplugin').'</a>'; $R3AA041D3204639AA7E79B914AB91B756 = "<button class=\"button-secondary\" onclick = \"jQuery('#delete_game_scores').css('display', 'inline');jQuery.post('".admin_url('admin-ajax.php')."',{action:'myarcade_handler',gameid: false, scoreid: '$RD94C2157798BCCE313068BF1BF25A119->id',func:'delete_score'},function(){jQuery('#scorerow_$RD94C2157798BCCE313068BF1BF25A119->id').fadeOut('slow');jQuery('#delete_game_scores').removeAttr('style');});return false;\" >".__("Delete", 'myarcadeplugin')."</button>"; ?>
          <tr id="scorerow_<?php echo $RD94C2157798BCCE313068BF1BF25A119->id; ?>">
            <td><?php echo $RE0D5EDB560A26D4E1BECD832EA026E32->display_name; ?></td>
            <td><?php echo $RD94C2157798BCCE313068BF1BF25A119->date; ?></td>
            <td id="scoreval_<?php echo $RD94C2157798BCCE313068BF1BF25A119->id; ?>"><?php echo $RD94C2157798BCCE313068BF1BF25A119->score; ?></td>
            <td><?php echo $R9A7D8CD5AD8135D269B8B0D4E22B244A; ?> <?php echo $R3AA041D3204639AA7E79B914AB91B756; ?><span id="score_<?php echo $RD94C2157798BCCE313068BF1BF25A119->id; ?>"></span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php
 } else { _e( "No scores available.", 'myarcadeplugin' ); } } function myarcade_meta_box_save($post_id, $post) { if ( !isset($_POST) ) { return $post_id; } if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) { return $post_id; } if ( !isset($_POST['myarcade_meta_nonce']) || (isset($_POST['myarcade_meta_nonce']) && !wp_verify_nonce( $_POST['myarcade_meta_nonce'], 'myarcade_save_data' ))) { return $post_id; } if ( !current_user_can( 'edit_post', $post_id )) { return $post_id; } $R170BC90B7311F52F8887011D9D4C9EC0 = (isset($_POST['mabp_height'])) ? $_POST['mabp_height'] : ''; $RA81D75BDA546491791F39B0712F89443 = (isset($_POST['mabp_width'])) ? $_POST['mabp_width'] : ''; $R94CDF80D5BC9B06AC91C9BD188F1A7E9 = (isset($_POST['mabp_description'])) ? $_POST['mabp_description'] : ''; $R189FB0CA345E635FB3B97C25615D0E94 = (isset($_POST['mabp_instructions'])) ? $_POST['mabp_instructions'] : ''; $R7E262491C8214F62973FFCBE1D00E90D = (isset($_POST['mabp_leaderboard'])) ? $_POST['mabp_leaderboard'] : ''; $R2F8C03ED9A162B66361ED2DE31642536 = (isset($_POST['mabp_score_bridge'] ) ) ? $_POST['mabp_score_bridge'] : ''; update_post_meta($post_id, 'mabp_game_type',$_POST['mabp_game_type']); update_post_meta($post_id, 'mabp_height', $R170BC90B7311F52F8887011D9D4C9EC0); update_post_meta($post_id, 'mabp_width', $RA81D75BDA546491791F39B0712F89443); update_post_meta($post_id, 'mabp_description', $R94CDF80D5BC9B06AC91C9BD188F1A7E9); update_post_meta($post_id, 'mabp_instructions', $R189FB0CA345E635FB3B97C25615D0E94); update_post_meta($post_id, 'mabp_leaderboard', $R7E262491C8214F62973FFCBE1D00E90D); update_post_meta($post_id, 'mabp_score_order', $_POST['mabp_score_order'] ); update_post_meta($post_id, 'mabp_score_bridge', $R2F8C03ED9A162B66361ED2DE31642536 ); $R6A39AF2A2BC3EA151BD12B1462BA22E9 = (isset($_POST['mabp_thumbnail_url'])) ? $_POST['mabp_thumbnail_url'] : ''; $R69F05BD3024E3A18B29F11DF8A3E8C79 = (isset($_POST['mabp_swf_url'])) ? $_POST['mabp_swf_url'] : ''; $RC63826E3032661EEA49E2EEDC9DFC682 = (isset($_POST['mabp_screen1_url'])) ? $_POST['mabp_screen1_url'] : ''; $RC5066ED01D2078524BBF502BAA8BCEF4 = (isset($_POST['mabp_screen2_url'])) ? $_POST['mabp_screen2_url'] : ''; $R602895CCAEDD3708C0F692906E20F733 = (isset($_POST['mabp_screen3_url'])) ? $_POST['mabp_screen3_url'] : ''; $R6947E129BB15A982FBEC82D2B48EF810 = (isset($_POST['mabp_screen4_url'])) ? $_POST['mabp_screen4_url'] : ''; $RB97CC202CFC7297071C8B6471540F3DC = (isset($_POST['mabp_video_url'])) ? $_POST['mabp_video_url'] : ''; update_post_meta($post_id, 'mabp_thumbnail_url', $R6A39AF2A2BC3EA151BD12B1462BA22E9); update_post_meta($post_id, 'mabp_swf_url', $R69F05BD3024E3A18B29F11DF8A3E8C79); update_post_meta($post_id, 'mabp_screen1_url', $RC63826E3032661EEA49E2EEDC9DFC682); update_post_meta($post_id, 'mabp_screen2_url', $RC5066ED01D2078524BBF502BAA8BCEF4); update_post_meta($post_id, 'mabp_screen3_url', $R602895CCAEDD3708C0F692906E20F733); update_post_meta($post_id, 'mabp_screen4_url', $R6947E129BB15A982FBEC82D2B48EF810); update_post_meta($post_id, 'mabp_video_url', $RB97CC202CFC7297071C8B6471540F3DC); } function F7C80A30CB9126044221684B16EB26128( $R4454E360FFF252043E577C8411615F0E ) { global $postID, $post; if ( !$postID ) { $postID = $post->ID; } if (!isset($R4454E360FFF252043E577C8411615F0E['placeholder'])) { $R4454E360FFF252043E577C8411615F0E['placeholder'] = ''; } if (!isset($R4454E360FFF252043E577C8411615F0E['class'])) { $R4454E360FFF252043E577C8411615F0E['class'] = 'short'; } if (!isset($R4454E360FFF252043E577C8411615F0E['value'])) { $R4454E360FFF252043E577C8411615F0E['value'] = get_post_meta($postID, $R4454E360FFF252043E577C8411615F0E['id'], true); } echo '<p class="myarcade-form-field '.$R4454E360FFF252043E577C8411615F0E['id'].'_field"><label for="'.$R4454E360FFF252043E577C8411615F0E['id'].'">'.$R4454E360FFF252043E577C8411615F0E['label'].'</label><input type="text" class="'.$R4454E360FFF252043E577C8411615F0E['class'].'" name="'.$R4454E360FFF252043E577C8411615F0E['id'].'" id="'.$R4454E360FFF252043E577C8411615F0E['id'].'" value="'.esc_attr( $R4454E360FFF252043E577C8411615F0E['value'] ).'" placeholder="'.$R4454E360FFF252043E577C8411615F0E['placeholder'].'" /> '; if (isset($R4454E360FFF252043E577C8411615F0E['description'])) { echo '<span class="description">' .$R4454E360FFF252043E577C8411615F0E['description'] . '</span>'; } echo '</p>'; } function F95BB518A64EEE3888BC384400611615C( $R4454E360FFF252043E577C8411615F0E ) { global $postID, $post; if (!$postID) { $postID = $post->ID; } if (!isset($R4454E360FFF252043E577C8411615F0E['placeholder'])) { $R4454E360FFF252043E577C8411615F0E['placeholder'] = ''; } if (!isset($R4454E360FFF252043E577C8411615F0E['class'])) { $R4454E360FFF252043E577C8411615F0E['class'] = 'short'; } if (!isset($R4454E360FFF252043E577C8411615F0E['value'])) { $R4454E360FFF252043E577C8411615F0E['value'] = get_post_meta($postID, $R4454E360FFF252043E577C8411615F0E['id'], true); } echo '<p class="myarcade-form-field '.$R4454E360FFF252043E577C8411615F0E['id'].'_field"><label for="'.$R4454E360FFF252043E577C8411615F0E['id'].'">'.$R4454E360FFF252043E577C8411615F0E['label'].'</label><textarea class="'.$R4454E360FFF252043E577C8411615F0E['class'].'" name="'.$R4454E360FFF252043E577C8411615F0E['id'].'" id="'.$R4454E360FFF252043E577C8411615F0E['id'].'" placeholder="'.$R4454E360FFF252043E577C8411615F0E['placeholder'].'" rows="2" cols="20">'.esc_textarea( $R4454E360FFF252043E577C8411615F0E['value'] ).'</textarea> '; if ( isset( $R4454E360FFF252043E577C8411615F0E['description'] ) && $R4454E360FFF252043E577C8411615F0E['description'] ) { echo '<span class="description">' . $R4454E360FFF252043E577C8411615F0E['description'] . '</span>'; } echo '</p>'; } function F3CF00E39B6155136D6FF816443CC1C7A( $R4454E360FFF252043E577C8411615F0E ) { global $postID, $post; if (!$postID) { $postID = $post->ID; } if (!isset($R4454E360FFF252043E577C8411615F0E['class'])) { $R4454E360FFF252043E577C8411615F0E['class'] = 'select short'; } if (!isset($R4454E360FFF252043E577C8411615F0E['value'])) { $R4454E360FFF252043E577C8411615F0E['value'] = get_post_meta($postID, $R4454E360FFF252043E577C8411615F0E['id'], true); } echo '<p class="myarcade-form-field '.$R4454E360FFF252043E577C8411615F0E['id'].'_field"><label for="'.$R4454E360FFF252043E577C8411615F0E['id'].'">'.$R4454E360FFF252043E577C8411615F0E['label'].'</label><select id="'.$R4454E360FFF252043E577C8411615F0E['id'].'" name="'.$R4454E360FFF252043E577C8411615F0E['id'].'" class="'.$R4454E360FFF252043E577C8411615F0E['class'].'">'; foreach ($R4454E360FFF252043E577C8411615F0E['options'] as $RF413F06AEBBCEF5E1C8B1019DEE6FE6B => $R7D0596C36891967F3BB9D994B4A97C19) { echo '<option value="'.$RF413F06AEBBCEF5E1C8B1019DEE6FE6B.'" '; selected($R4454E360FFF252043E577C8411615F0E['value'], $RF413F06AEBBCEF5E1C8B1019DEE6FE6B); echo '>'.$R7D0596C36891967F3BB9D994B4A97C19.'</option>'; } echo '</select> '; if ( isset( $R4454E360FFF252043E577C8411615F0E['description'] ) && $R4454E360FFF252043E577C8411615F0E['description'] ) { echo '<span class="description">' . $R4454E360FFF252043E577C8411615F0E['description'] . '</span>'; } echo '</p>'; } function FD6469B5871F8C9E24C00E17D1EFA99D9( $R4454E360FFF252043E577C8411615F0E ) { global $postID, $post; $postID = empty( $postID ) ? $post->ID : $postID; $R4454E360FFF252043E577C8411615F0E['class'] = isset( $R4454E360FFF252043E577C8411615F0E['class'] ) ? $R4454E360FFF252043E577C8411615F0E['class'] : 'checkbox'; $R4454E360FFF252043E577C8411615F0E['value'] = isset( $R4454E360FFF252043E577C8411615F0E['value'] ) ? $R4454E360FFF252043E577C8411615F0E['value'] : get_post_meta( $postID, $R4454E360FFF252043E577C8411615F0E['id'], true ); $R4454E360FFF252043E577C8411615F0E['cbvalue'] = isset( $R4454E360FFF252043E577C8411615F0E['cbvalue'] ) ? $R4454E360FFF252043E577C8411615F0E['cbvalue'] : 'yes'; $R4454E360FFF252043E577C8411615F0E['name'] = isset( $R4454E360FFF252043E577C8411615F0E['name'] ) ? $R4454E360FFF252043E577C8411615F0E['name'] : $R4454E360FFF252043E577C8411615F0E['id']; echo '<p class="myarcade-form-field ' . esc_attr( $R4454E360FFF252043E577C8411615F0E['id'] ) . '_field"><label for="' . esc_attr( $R4454E360FFF252043E577C8411615F0E['id'] ) . '">' . wp_kses_post( $R4454E360FFF252043E577C8411615F0E['label'] ) . '</label><input type="checkbox" class="' . esc_attr( $R4454E360FFF252043E577C8411615F0E['class'] ) . '" name="' . esc_attr( $R4454E360FFF252043E577C8411615F0E['name'] ) . '" id="' . esc_attr( $R4454E360FFF252043E577C8411615F0E['id'] ) . '" value="' . esc_attr( $R4454E360FFF252043E577C8411615F0E['cbvalue'] ) . '" ' . checked( $R4454E360FFF252043E577C8411615F0E['value'], $R4454E360FFF252043E577C8411615F0E['cbvalue'], false ) . ' /> '; if ( ! empty( $R4454E360FFF252043E577C8411615F0E['description'] ) ) echo '<span class="description">' . wp_kses_post( $R4454E360FFF252043E577C8411615F0E['description'] ) . '</span>'; echo '</p>'; } ?>