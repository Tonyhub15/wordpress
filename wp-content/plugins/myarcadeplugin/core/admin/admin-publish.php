<?php
 if ( ! defined( 'ABSPATH' ) ) { exit; } function F9B60628F3538A08EC741F62EE1E8DC99() { global $wpdb, $REC43CE978463AAD8D91F93AE43393035; F94EBD7C16769D03E06E16136FFE5F944(); $general = get_option('myarcade_general'); $R281A0F7BC3D849F3386A5AC36FB35807 = get_option('myarcade_categories'); if ( isset($_POST) && isset($_POST['action']) && ($_POST['action'] == 'publish') ) { $R88A33D29429F80B24F150A7737FAA03B = $_POST['distr']; $REDA7C15B1419F1F7A23C0E95A75A99CA = (isset($_POST['leaderboard'])) ? '1' : '0'; $R971D98E0AD23E0905A3D3F4B08D46579 = $_POST['status']; $R22E989667C4612380F6ABBE42720E5BD = (isset($_POST['scheduletime'])) ? intval($_POST['scheduletime']) : $general['schedule']; $R56EA904D533235F889591E04DE8C6B68 = ($_POST['order'] == 'ASC') ? 'ASC' : 'DESC'; $RD2E691562D6B77CFE944DD609F674574 = $_POST['category']; $R2B9817B0616FA442561FDDF032F68B2A = (isset($_POST['games'])) ? intval($_POST['games']) : false; $download_thumbs = (isset($_POST['downloadthumbs'])) ? true : false; $download_screens = (isset($_POST['downloadscreens'])) ? true : false; $download_games = (isset($_POST['downloadgames'])) ? true : false; $RB981E3F4044DDEDDB47C787D006CB211 = array(); $R0A6BC2430F38166A4C7DDA18D052CBFA = ''; $RB981E3F4044DDEDDB47C787D006CB211[] = "status = 'new'"; if ( $R88A33D29429F80B24F150A7737FAA03B != 'all') { $RB981E3F4044DDEDDB47C787D006CB211[] = "game_type = '".$R88A33D29429F80B24F150A7737FAA03B."'"; } if ( $REDA7C15B1419F1F7A23C0E95A75A99CA == '1') { $RB981E3F4044DDEDDB47C787D006CB211[] = "leaderboard_enabled = '1'"; } if ( $RD2E691562D6B77CFE944DD609F674574 != 'all') { $RB981E3F4044DDEDDB47C787D006CB211[] = "categories LIKE '%".$R281A0F7BC3D849F3386A5AC36FB35807[ (int) $RD2E691562D6B77CFE944DD609F674574 ]['Name']."%'"; } if ( $R2B9817B0616FA442561FDDF032F68B2A ) { $RFED47D15719EF82BD3F83B580230DA5B = " limit ".$R2B9817B0616FA442561FDDF032F68B2A; } else { $RFED47D15719EF82BD3F83B580230DA5B = ''; } $RA1D44C0654A40984A103C270FFB9BF33 = count($RB981E3F4044DDEDDB47C787D006CB211); if ( $RA1D44C0654A40984A103C270FFB9BF33 > 1 ) { for($RA16D2280393CE6A2A5428A4A8D09E354=0; $RA16D2280393CE6A2A5428A4A8D09E354 < count($RB981E3F4044DDEDDB47C787D006CB211); $RA16D2280393CE6A2A5428A4A8D09E354++) { $R0A6BC2430F38166A4C7DDA18D052CBFA .= $RB981E3F4044DDEDDB47C787D006CB211[$RA16D2280393CE6A2A5428A4A8D09E354]; if ( $RA16D2280393CE6A2A5428A4A8D09E354 < ($RA1D44C0654A40984A103C270FFB9BF33 - 1) ) { $R0A6BC2430F38166A4C7DDA18D052CBFA .= ' AND '; } } } elseif ($RA1D44C0654A40984A103C270FFB9BF33 == 1) { $R0A6BC2430F38166A4C7DDA18D052CBFA = $RB981E3F4044DDEDDB47C787D006CB211[0]; } if ( !empty($R0A6BC2430F38166A4C7DDA18D052CBFA) ) { $R0A6BC2430F38166A4C7DDA18D052CBFA = " WHERE ".$R0A6BC2430F38166A4C7DDA18D052CBFA; } $R569981A9B29B5950206124A5933F6CB9 = $wpdb->get_results( "SELECT id FROM " . $wpdb->prefix . 'myarcadegames' . $R0A6BC2430F38166A4C7DDA18D052CBFA . " ORDER BY id " . $R56EA904D533235F889591E04DE8C6B68 . $RFED47D15719EF82BD3F83B580230DA5B ); if ( !empty($R569981A9B29B5950206124A5933F6CB9) ) { foreach( $R569981A9B29B5950206124A5933F6CB9 as $R3584859062EA9ECFB39B93BFCEF8E869 ) { $R3456919727E24A4B0E7593F893C0946E[] = $R3584859062EA9ECFB39B93BFCEF8E869->id; } $R3456919727E24A4B0E7593F893C0946E = implode(',', $R3456919727E24A4B0E7593F893C0946E); $R6D38850C497AA12D0D23CB793ED5781A = 'yes'; } else { $R3456919727E24A4B0E7593F893C0946E = ''; $R6D38850C497AA12D0D23CB793ED5781A = 'no'; } } else { $R88A33D29429F80B24F150A7737FAA03B = 'all'; $REDA7C15B1419F1F7A23C0E95A75A99CA = '0'; $R790CFF1C38BD2DFBA04614CF1DC8F64C = '0'; $R971D98E0AD23E0905A3D3F4B08D46579 = $general['status']; $R22E989667C4612380F6ABBE42720E5BD = $general['schedule']; $R56EA904D533235F889591E04DE8C6B68 = 'ASC'; $RD2E691562D6B77CFE944DD609F674574 = 'all'; $R2B9817B0616FA442561FDDF032F68B2A = $general['posts']; $download_thumbs = $general['down_thumbs']; $download_screens = $general['down_screens']; $download_games = $general['down_games']; $R6D38850C497AA12D0D23CB793ED5781A = 'init'; } ?>
  <div id="icon-options-general" class="icon32"><br /></div>
  <h2><?php _e("Publish Games", 'myarcadeplugin'); ?></h2>
  <br />

  <form method="post" action="" class="myarcade_form" name="searchForm">
    <input type="hidden" name="action" value="publish" />
    <div class="myarcade_border grey" style="width:680px">
      <div class="myarcade_border white" style="width:300px;float:left;height:30px;">
        <?php _e("Game Type", 'myarcadeplugin'); ?>:
        <select name="distr" id="distr">
          <option value="all" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R88A33D29429F80B24F150A7737FAA03B, 'all'); ?>>All</option>
          <?php foreach ($REC43CE978463AAD8D91F93AE43393035 as $R7C60D7E1C05E3B82EF26F41346F5D850 => $R9B395079675C6A66FF23EA9C6C4A668E) : ?>
          <option value="<?php echo $R7C60D7E1C05E3B82EF26F41346F5D850; ?>" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R88A33D29429F80B24F150A7737FAA03B, $R7C60D7E1C05E3B82EF26F41346F5D850); ?>><?php echo $R9B395079675C6A66FF23EA9C6C4A668E; ?></option>
          <?php endforeach; ?>
          <option value="embed" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R88A33D29429F80B24F150A7737FAA03B, 'embed'); ?>><?php _e("Embed", 'myarcadeplugin'); ?></option>
          <option value="iframe" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R88A33D29429F80B24F150A7737FAA03B, 'iframe'); ?>><?php _e("Iframe", 'myarcadeplugin'); ?></option>
          <option value="ibparcade" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R88A33D29429F80B24F150A7737FAA03B, 'ibparcade'); ?>><?php _e("IBPArcade", 'myarcadeplugin'); ?></option>
          <option value="phpbb" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R88A33D29429F80B24F150A7737FAA03B, 'phpbb'); ?>><?php _e("PHPBB / ZIP", 'myarcadeplugin'); ?></option>
          <option value="dcr" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R88A33D29429F80B24F150A7737FAA03B, 'dcr'); ?>><?php _e("DCR", 'myarcadeplugin'); ?></option>
          <option value="custom" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R88A33D29429F80B24F150A7737FAA03B, 'custom'); ?>><?php _e("Custom SWF", 'myarcadeplugin'); ?></option>
        </select>
      </div>

      <div class="myarcade_border white" style="width:300px;float:left;margin-left:20px;height:30px;padding: 10px 5px 10px 10px;">
        <input type="checkbox" name="leaderboard" value="1" <?php F739F7FB06301A1E6810F08B95CC237ED($REDA7C15B1419F1F7A23C0E95A75A99CA, '1'); ?> /> <?php _e('Score Games', 'myarcadeplugin'); ?><br />
      </div>

      <div class="clear"> </div>

      <div class="myarcade_border white" style="width:300px;height:30px;float:left;">
        <?php _e("Status", 'myarcadeplugin'); ?>:
        <select name="status" id="status">
          <option value="publish" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R971D98E0AD23E0905A3D3F4B08D46579, 'publish'); ?>><?php _e("Publish", 'myarcadeplugin') ?></option>
          <option value="draft" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R971D98E0AD23E0905A3D3F4B08D46579, 'draft'); ?>><?php _e("Draft", 'myarcadeplugin') ?></option>
          <option value="future" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R971D98E0AD23E0905A3D3F4B08D46579, 'future'); ?>><?php _e("Scheduled", 'myarcadeplugin') ?></option>
        </select>
        time <input type="text" name="scheduletime" value="<?php echo $R22E989667C4612380F6ABBE42720E5BD; ?>" size="3" /> min.
      </div>

      <div class="myarcade_border white" style="width:300px;height:30px;float:left;margin-left:20px;">
        <?php _e("Order", 'myarcadeplugin'); ?>:
        <select name="order" id="order">
          <option value="ASC" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R56EA904D533235F889591E04DE8C6B68, 'ASC'); ?>><?php _e("Older Games First (ASC)", 'myarcadeplugin') ?></option>
          <option value="DESC" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R56EA904D533235F889591E04DE8C6B68, 'DESC'); ?>><?php _e("Newer Games First (DESC)", 'myarcadeplugin') ?></option>
        </select>
      </div>

      <div class="clear"> </div>

      <div class="myarcade_border white" style="width:300px;height:30px;float:left;">
        <?php _e("Game Categories", 'myarcadeplugin'); ?>:
        <select name="category" id="category">
          <option value="all" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($RD2E691562D6B77CFE944DD609F674574, 'all'); ?>><?php _e("All Activated", 'myarcadeplugin') ?></option>
          <?php
 for ($R8725029EA89712EED8670BAE64D30E47=0; $R8725029EA89712EED8670BAE64D30E47<count($R281A0F7BC3D849F3386A5AC36FB35807); $R8725029EA89712EED8670BAE64D30E47++) { if ( $R281A0F7BC3D849F3386A5AC36FB35807[$R8725029EA89712EED8670BAE64D30E47]['Status'] == 'checked' ) { ?>
                <option value="<?php echo $R8725029EA89712EED8670BAE64D30E47; ?>" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($RD2E691562D6B77CFE944DD609F674574, $R8725029EA89712EED8670BAE64D30E47); ?>>
                  <?php echo $R281A0F7BC3D849F3386A5AC36FB35807[$R8725029EA89712EED8670BAE64D30E47]['Name']; ?>
                </option>
                <?php
 } } ?>
        </select>
      </div>

      <div class="myarcade_border white" style="width:300px;height:30px;float:left;margin-left:20px;">
        <?php _e("Create", 'myarcadeplugin'); ?>
        <input type="text" size="5" name="games" value="<?php echo $R2B9817B0616FA442561FDDF032F68B2A; ?>" />
        <?php _e("game posts", 'myarcadeplugin'); ?>
      </div>

      <div class="myarcade_border white" style="width:300px;height:50px;float:left;">
        <input type="checkbox" value="1" id="downloadthumbs" name="downloadthumbs" <?php F739F7FB06301A1E6810F08B95CC237ED($download_thumbs, true); ?> /> Download Thumbnails<br />
        <input type="checkbox" value="1" id="downloadscreens" name="downloadscreens" <?php F739F7FB06301A1E6810F08B95CC237ED($download_screens, true); ?>/> Download Screenshots<br />
        <input type="checkbox" value="1" id="downloadgames" name="downloadgames" <?php F739F7FB06301A1E6810F08B95CC237ED($download_games, true); ?>/> Download Games
      </div>

      <div class="clear"> </div>

      <input class="button-primary" id="submit" type="submit" name="submit" value="Create Posts" />
    </div>
  </form>

  <script type="text/javascript">
    function myarcade_check_dir(dir) {
      jQuery.post('<?php echo admin_url('admin-ajax.php'); ?>', {action:'myarcade_handler', func:'dircheck', directory: dir},
        function(data) {
          jQuery('#down_' + dir).html(data);
        });
    }

    jQuery(document).ready(function($){
      $("#downloadgames").change(function() {
        if ( $('#downloadgames').attr('checked') ) {
          myarcade_check_dir('games');
        } else {
          $('#down_games').html("");
        }
      });
      $("#downloadthumbs").change(function() {
        if ( $('#downloadthumbs').attr('checked') || $('#downloadscreens').attr('checked') ) {
          myarcade_check_dir('thumbs');
        } else {
          $('#down_thumbs').html("");
        }
      });
      $("#downloadscreens").change(function() {
        if ( $('#downloadscreens').attr('checked') || $('#downloadthumbs').attr('checked') ) {
          myarcade_check_dir('thumbs');
        } else {
          $('#down_thumbs').html("");
        }
      });
    });
  </script>

  <?php
 $RFB526B65F5855576F246DC484BDC7151 = F40E3604E265E4DCB70700AB1EE0B17D9(); ?>

  <div id="down_thumbs">
    <?php if ( ($download_thumbs || $download_screens) && ( ! is_writable( $RFB526B65F5855576F246DC484BDC7151['thumbsdir'] ) ) ) { echo '<p class="mabp_error mabp_680">'.sprintf(__("The thumbs directory '%s' must be writeable (chmod 777) in order to download thumbnails or screenshots.", 'myarcadeplugin'), $RFB526B65F5855576F246DC484BDC7151['thumbsdir'] ).'</p>'; } ?>
  </div>
  <div id="down_games">
    <?php if ($download_games && ( ! is_writable( $RFB526B65F5855576F246DC484BDC7151['gamesdir'] ) ) ) { echo '<p class="mabp_error mabp_680">'.sprintf(__("The games directory '%s' must be writeable (chmod 777) in order to download games.", 'myarcadeplugin'), $RFB526B65F5855576F246DC484BDC7151['gamesdir'] ).'</p>'; } ?>
  </div>

  <?php if ( $R6D38850C497AA12D0D23CB793ED5781A == 'yes' ) : ?>

  <p class="mabp_info mabp_680">
    <?php _e("Please be patient while games are published. This can take a while if your server is slow or if there are a lot of games. Do not navigate away from this page until MyArcadePlugin is done or the games will not be published.", 'myarcadeplugin'); ?>
  </p>

  <?php
 $R11106AFC208367BA48B0A08BBE8C64BC = sprintf('All done! %1$s game(s) where successfully published in %2$s second(s) and there were %3$s failures.', "' + myarcade_successes + '", "' + myarcade_totaltime + '", "' + myarcade_errors + '"); $R977B82EF58C46360420BB5A22DA38BF4 = sprintf('All done! %1$s game(s) where successfully published in %2$s second(s) and there were 0 failures.', "' + myarcade_successes + '", "' + myarcade_totaltime + '"); ?>

  <noscript>
    <p>
      <em>
        <?php _e( 'You must enable Javascript in order to proceed!', 'myarcadeplugin') ?>
      </em>
    </p>
  </noscript>

  <div id="myarcade-bar" style="position:relative;height:25px;width:700px;">
    <div id="myarcade-bar-percent" style="position:absolute;left:50%;top:50%;width:300px;margin-left:-150px;height:25px;margin-top:-9px;font-weight:bold;text-align:center;"></div>
  </div>

  <p><input type="button" class="button hide-if-no-js" name="myarcade-stop" id="myarcade-stop" value="<?php _e( 'Abort Game Publishing', 'myarcadeplugin' ); ?>" /></p>

  <div id="message" class="mabp_info mabp_680" style="display:none"></div>

  <ul id="myarcade-gamelist">
    <li style="display:none"></li>
  </ul>

  <script type="text/javascript">
    // <![CDATA[
    jQuery(document).ready(function($){
      var i;
      var myarcade_games = [<?php echo $R3456919727E24A4B0E7593F893C0946E; ?>];
      var myarcade_total = myarcade_games.length;
      var myarcade_count = 1;
      var myarcade_percent = 0;
      var myarcade_successes = 0;
      var myarcade_errors = 0;
      var myarcade_failedlist = '';
      var myarcade_resulttext = '';
      var myarcade_timestart = new Date().getTime();
      var myarcade_timeend = 0;
      var myarcade_totaltime = 0;
      var myarcade_continue = true;

      // Create the progress bar
      $("#myarcade-bar").progressbar();
      $("#myarcade-bar-percent").html( "0%" );

      // Stop button
      $("#myarcade-stop").click(function() {
        myarcade_continue = false;
        $('#myarcade-stop').val("<?php _e('Stopping...', 'myarcadeplugin' ); ?>");
      });

      // Clear out the empty list element that's there for HTML validation purposes
      $("#myarcade-gamelist li").remove();

      // Called after each resize. Updates debug information and the progress bar.
      function myarcadeUpdateStatus( id, success, response ) {
        $("#myarcade-bar").progressbar( "value", ( myarcade_count / myarcade_total ) * 100 );
        $("#myarcade-bar-percent").html( Math.round( ( myarcade_count / myarcade_total ) * 1000 ) / 10 + "%" );
        myarcade_count = myarcade_count + 1;

        if ( success ) {
          myarcade_successes = myarcade_successes + 1;
          $("#myarcade-debug-successcount").html(myarcade_successes);
          $("#myarcade-gamelist").prepend("<li>" + response.success + "</li>");
        }
        else {
          myarcade_errors = myarcade_errors + 1;
          myarcade_failedlist = myarcade_failedlist + ',' + id;
          $("#myarcade-debug-failurecount").html(myarcade_errors);
          $("#myarcade-gamelist").prepend("<li>" + response.error + "</li>");
        }
      }

      // Called when all images have been processed. Shows the results and cleans up.
      function myarcadeFinishUp() {
        myarcade_timeend = new Date().getTime();
        myarcade_totaltime = Math.round( ( myarcade_timeend - myarcade_timestart ) / 1000 );

        $('#myarcade-stop').hide();

        if ( myarcade_errors > 0 ) {
          myarcade_resulttext = '<?php echo $R11106AFC208367BA48B0A08BBE8C64BC; ?>';
        } else {
          myarcade_resulttext = '<?php echo $R977B82EF58C46360420BB5A22DA38BF4; ?>';
        }

        $("#message").html("<strong>" + myarcade_resulttext + "</strong>");
        $("#message").show();
      }

      // Publish a specified game via AJAX
      function myarcade( id ) {
        $.ajax({
          type: 'POST',
          url: ajaxurl,
          data: { action: "myarcade_ajax_publish",
            id: id,
            status: '<?php echo $R971D98E0AD23E0905A3D3F4B08D46579; ?>',
            schedule: '<?php echo $R22E989667C4612380F6ABBE42720E5BD; ?>',
            count: myarcade_count,
            download_thumbs: '<?php echo $download_thumbs; ?>',
            download_screens: '<?php echo $download_screens; ?>',
            download_games: '<?php echo $download_games; ?>'
          },
          success: function( response ) {
            if ( response !== Object( response ) || ( typeof response.success === "undefined" && typeof response.error === "undefined" ) ) {
              response = new Object;
              response.success = false;
              response.error = "<?php printf( esc_js( __( 'Game publishing request was abnormally terminated (ID %s). This is likely due to the game exceeding available memory or some other type of fatal error.', 'myarcadeplugin' ) ), '" + id + "' ); ?>";
            }
            if ( response.success ) {
              myarcadeUpdateStatus( id, true, response );
            }
            else {
              myarcadeUpdateStatus( id, false, response );
            }
            if ( myarcade_games.length && myarcade_continue ) {
              myarcade( myarcade_games.shift() );
            }
            else {
              myarcadeFinishUp();
            }
          },
          error: function( response ) {
            myarcadeUpdateStatus( id, false, response );
            if ( myarcade_games.length && myarcade_continue ) {
              myarcade( myarcade_games.shift() );
            }
            else {
              myarcadeFinishUp();
            }
          }
        });
      }

      myarcade( myarcade_games.shift() );
    });
  // ]]>
  </script>
  <?php elseif ( $R6D38850C497AA12D0D23CB793ED5781A == 'no') : ?>
  <p class="mabp_info mabp_680">
    <?php _e("No games found for your search criteria!", 'myarcadeplugin'); ?>
  </p>
  <?php endif; ?>

  <?php
 F011F5FA6950FDD84A7242122BC8934C3(); } ?>