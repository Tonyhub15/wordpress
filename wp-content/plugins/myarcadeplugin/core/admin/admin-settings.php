<?php
 if( !defined( 'ABSPATH' ) ) { die(); } function FA387739A9E49E2C745E2D712E7FCDC0D() { global $REC43CE978463AAD8D91F93AE43393035; F94EBD7C16769D03E06E16136FFE5F944(); ?>
  <div id="icon-tools" class="icon32"><br /></div>
  <h2><?php _e("Settings"); ?></h2>
  <?php
 $RD35A39212FD75E833AEA38F90831B2CB = isset($_POST['feedaction']) ? $_POST['feedaction'] : ''; if ($RD35A39212FD75E833AEA38F90831B2CB == 'save') { $R7705127947020CA2ED921BE6E0FA664F = filter_input( INPUT_POST, 'myarcade_save_settings_nonce'); if ( ! $R7705127947020CA2ED921BE6E0FA664F || ! wp_verify_nonce( $R7705127947020CA2ED921BE6E0FA664F, 'myarcade_save_settings' ) ) { wp_die( __('Security check failed. Please refresh the page and retry to submit settings again.', 'myarcadeplugin') ); } if ( get_transient('myarcade_settings_update_notice') == true ) { delete_transient('myarcade_settings_update_notice'); } $general = array(); if ( isset($_POST['leaderboardenable'])) $general['scores'] = true; else $general['scores'] = false; if ( isset($_POST['onlyhighscores'])) $general['highscores'] = true; else $general['highscores'] = false; if ( isset($_POST['game_count'])) $general['posts'] = intval($_POST['game_count']); else $general['posts'] = ''; if ( isset($_POST['publishstatus'])) $general['status'] = $_POST['publishstatus']; else $general['status'] = 'publish'; if ( isset($_POST['schedtime'])) $general['schedule'] = intval( $_POST['schedtime']); else $general['schedule'] = 0; if ( isset($_POST['downloadthumbs'])) $general['down_thumbs'] = true; else $general['down_thumbs'] = false; if ( isset($_POST['downloadgames'])) $general['down_games'] = true; else $general['down_games'] = false; if ( isset($_POST['downscreens'])) $general['down_screens'] = true; else $general['down_screens'] = false; if ( isset($_POST['deletefiles'])) $general['delete'] = true; else $general['delete'] = false; $general['folder_structure'] = (isset($_POST['folder_structure'])) ? $_POST['folder_structure'] : false; $general['automated_fetching'] = (isset($_POST['automated_fetching'])) ? true : false; $general['interval_fetching'] = $_POST['interval_fetching']; $general['automated_publishing'] = (isset($_POST['automated_publishing'])) ? true : false; $general['interval_publishing'] = $_POST['interval_publishing']; $general['swfobject'] = isset( $_POST['swfobject'] ) ? true : false; $general['cron_publish_limit'] = !empty($_POST['general_cron_publish_limit']) ? $_POST['general_cron_publish_limit'] : 1; if ( isset($_POST['createcats'])) $general['create_cats'] = true; else $general['create_cats'] = false; if ( isset($_POST['parentcatid'])) $general['parent'] = $_POST['parentcatid']; else $general['parent'] = ''; if ( isset($_POST['firstcat'])) $general['firstcat'] = true; else $general['firstcat'] = false; if ( isset($_POST['maxwidth'])) $general['max_width'] = intval($_POST['maxwidth']); else $general['max_width'] = ''; if ( isset($_POST['singlecat'])) $general['single'] = true; else $general['single'] = false; if ( isset($_POST['singlecatid'])) $general['singlecat'] = $_POST['singlecatid']; else $general['singlecat'] = ''; if ( isset($_POST['embedflashcode'])) $general['embed'] = $_POST['embedflashcode']; else $general['embed'] = 'manually'; if ( isset($_POST['usetemplate'])) $general['use_template'] = true; else $general['use_template'] = false; if ( isset($_POST['post_template'])) $general['template'] = stripslashes($_POST['post_template']); else $general['template'] = ''; if ( isset($_POST['allow_user'])) $general['allow_user'] = true; else $general['allow_user'] = false; if ( isset($_POST['limitplays'])) $general['limit_plays'] = intval($_POST['limitplays']); else $general['limit_plays'] = 0; if ( isset($_POST['limitmessage'])) $general['limit_message'] = stripslashes($_POST['limitmessage']); else $general['limit_message'] = ''; if ( isset($_POST['posttype'])) $general['post_type'] = $_POST['posttype']; else $general['post_type'] = 'post'; if ( isset($_POST['featured_image'])) $general['featured_image'] = true; else $general['featured_image'] = false; $general['play_delay'] = isset($_POST['play_delay']) ? $_POST['play_delay'] : '30'; $general['translation'] = $_POST['translation']; $general['bingid'] = isset($_POST['bingid']) ? sanitize_text_field($_POST['bingid']) : ''; $general['bingsecret'] = isset($_POST['bingsecret']) ? sanitize_text_field($_POST['bingsecret']) : ''; $general['translate_to'] = isset($_POST['translate_to']) ? $_POST['translate_to'] : 'en'; $general['translate_fields'] = isset($_POST['translate_fields']) ? $_POST['translate_fields'] : array(); $general['translate_games'] = isset($_POST['translate_games']) ? $_POST['translate_games'] : array(); $general['google_id'] = isset($_POST['google_id']) ? sanitize_text_field($_POST['google_id']) : ''; $general['google_translate_to'] = $_POST['google_translate_to']; $general['custom_category'] = isset($_POST['customtaxcat']) ? $_POST['customtaxcat'] : ''; $general['custom_tags'] = isset($_POST['customtaxtag']) ? $_POST['customtaxtag'] : ''; $general['disable_game_tags'] = isset( $_POST['disable_game_tags'] ) ? true : false; update_option('myarcade_general', $general); foreach ($REC43CE978463AAD8D91F93AE43393035 as $RF413F06AEBBCEF5E1C8B1019DEE6FE6B => $R9B395079675C6A66FF23EA9C6C4A668E) { $R5E6FE112139EF7B1AECB79A8F083BB6A = MYARCADE_CORE_DIR . '/feeds/' . $RF413F06AEBBCEF5E1C8B1019DEE6FE6B . '.php'; if ( file_exists( $R5E6FE112139EF7B1AECB79A8F083BB6A ) ) { include_once( $R5E6FE112139EF7B1AECB79A8F083BB6A ); $R55F15A2DC7BC379F58268F54A3C4ED35 = 'myarcade_save_settings_' . $RF413F06AEBBCEF5E1C8B1019DEE6FE6B; $R55F15A2DC7BC379F58268F54A3C4ED35(); } } if ( $general['automated_fetching'] ) { wp_clear_scheduled_hook('cron_fetching'); wp_schedule_event( time(), $general['interval_fetching'], 'cron_fetching' ); } else { wp_clear_scheduled_hook('cron_fetching'); } if ( $general['automated_publishing'] ) { wp_clear_scheduled_hook('cron_publishing'); wp_schedule_event( time(), $general['interval_publishing'], 'cron_publishing' ); } else { wp_clear_scheduled_hook('cron_publishing'); } if ( isset($_POST['gamecats'])) $R126E2CBF06A99730903285215C8BCE94 = $_POST['gamecats']; else $R126E2CBF06A99730903285215C8BCE94 = array(); $R281A0F7BC3D849F3386A5AC36FB35807 = get_option('myarcade_categories'); $RE01F4E85A85AB5A3A028513FFDAF5156 = 0; $R09828077F4B697E0CFBB447B1BF05AF0 = count($R281A0F7BC3D849F3386A5AC36FB35807); $RA97A0CB19AD567C8F00CE7C66DF992E3 = array(); for ($RA16D2280393CE6A2A5428A4A8D09E354 = 0; $RA16D2280393CE6A2A5428A4A8D09E354 < $R09828077F4B697E0CFBB447B1BF05AF0; $RA16D2280393CE6A2A5428A4A8D09E354++) { if( in_array( $R281A0F7BC3D849F3386A5AC36FB35807[$RA16D2280393CE6A2A5428A4A8D09E354]['Slug'], $R126E2CBF06A99730903285215C8BCE94 ) ) { $RE01F4E85A85AB5A3A028513FFDAF5156++; $R281A0F7BC3D849F3386A5AC36FB35807[$RA16D2280393CE6A2A5428A4A8D09E354]['Status'] = 'checked'; $RA97A0CB19AD567C8F00CE7C66DF992E3[] = $R281A0F7BC3D849F3386A5AC36FB35807[$RA16D2280393CE6A2A5428A4A8D09E354]['Name']; } else { $R281A0F7BC3D849F3386A5AC36FB35807[$RA16D2280393CE6A2A5428A4A8D09E354]['Status'] = ''; } } update_option('myarcade_categories', $R281A0F7BC3D849F3386A5AC36FB35807); if ( $RE01F4E85A85AB5A3A028513FFDAF5156 ) { if ( true == $general['create_cats'] && ! empty( $RA97A0CB19AD567C8F00CE7C66DF992E3 ) ) { F6C859752FABC3A7D40F7C4B7B8871E49( $RA97A0CB19AD567C8F00CE7C66DF992E3 ); } } else { echo '<p class="mabp_error mabp_800">'.__("You have to check at least one feed category!", 'myarcadeplugin').'</p>'; } echo '<p class="mabp_info mabp_800">'.__("Your settings have been updated!", 'myarcadeplugin').'</p>'; } if ( isset($_POST['loaddefaults']) && isset($_POST['checkdefaults']) && $_POST['checkdefaults'] == 'yes' ) { F01D4DD4C5E7F19A8253A2864C8BE80B2(); echo '<p class="mabp_info mabp_800">'.__("Default settings have been restored!", 'myarcadeplugin').'</p>'; } $general = get_option('myarcade_general'); $R30E38C1F8EC85F8EE8DF620FF3267157 = get_option('myarcade_categories'); foreach ($REC43CE978463AAD8D91F93AE43393035 as $RF413F06AEBBCEF5E1C8B1019DEE6FE6B => $R9B395079675C6A66FF23EA9C6C4A668E) { $$RF413F06AEBBCEF5E1C8B1019DEE6FE6B = get_option( 'myarcade_' . $RF413F06AEBBCEF5E1C8B1019DEE6FE6B ); } F15B6F4B0533CF5E0D6BF410480E7DC7B(); $RFB526B65F5855576F246DC484BDC7151 = F40E3604E265E4DCB70700AB1EE0B17D9(); if ( $general['down_games'] ) { if ( !is_writable( $RFB526B65F5855576F246DC484BDC7151['gamesdir'] ) ) { echo '<p class="mabp_error mabp_800">'.sprintf(__("The games directory '%s' must be writable (chmod 777) in order to download games.", 'myarcadeplugin'), $RFB526B65F5855576F246DC484BDC7151['gamesdir'] ).'</p>'; } } if ( $general['down_thumbs'] ) { if ( !is_writable( $RFB526B65F5855576F246DC484BDC7151['thumbsdir'] ) ) { echo '<p class="mabp_error mabp_800">'.sprintf(__("The thumbails directory '%s' must be writable (chmod 777) in order to download thumbnails.", 'myarcadeplugin'), $RFB526B65F5855576F246DC484BDC7151['thumbsdir'] ).'</p>'; } } if ( $general['down_screens'] ) { if ( !is_writable( $RFB526B65F5855576F246DC484BDC7151['thumbsdir'] ) ) { echo '<p class="mabp_error mabp_800">'.sprintf(__("The thumbails directory '%s' must be writable (chmod 777) in order to download game screenshots.", 'myarcadeplugin'), $RFB526B65F5855576F246DC484BDC7151['thumbsdir'] ).'</p>'; } } if ( ($general['translation'] == 'bing') && empty( $general['bingid'] ) ) { echo '<p class="mabp_error mabp_800">'.__("You have activated the Bing Translator but not entered your Application ID. In this case the translator will not work!", 'myarcadeplugin').'</p>'; } if ( ($general['translation'] == 'google') && empty( $general['google_id'] ) ) { echo '<p class="mabp_error mabp_800">'.__("You have activated the Google Translator but not entered your Google API Key. In this case the translator will not work!", 'myarcadeplugin').'</p>'; } if ( $general['post_type'] == 'post') { $RDE32AAFF6A4EB850444E6AF2ED301288 = get_terms( 'category', array('fields' => 'ids', 'get' => 'all') ); $R29FA1603C6184F03E6AAA115D2BB6020 = array(); foreach ($RDE32AAFF6A4EB850444E6AF2ED301288 as $RE47A654452FFA3228C3B63997615EC1F) { $R29FA1603C6184F03E6AAA115D2BB6020[$RE47A654452FFA3228C3B63997615EC1F] = get_cat_name($RE47A654452FFA3228C3B63997615EC1F); } } else { $R29FA1603C6184F03E6AAA115D2BB6020 = array(); if (taxonomy_exists($general['custom_category']) ) { $RDF77991FA7D01115CAE7D378990E322E = get_terms($general['custom_category'], array('hide_empty' => false)); foreach ($RDF77991FA7D01115CAE7D378990E322E as $R270D396521F6B787A692C06F477944DA) { $R29FA1603C6184F03E6AAA115D2BB6020[$R270D396521F6B787A692C06F477944DA->term_id] = $R270D396521F6B787A692C06F477944DA->name; } } } $RE3D2F16BB6AD764AE0D0BB8EA37A36D3 = F84F4B7097E01FF3E624652E148C94473(); $R0C6DBABFEDB23651440A59B5CE3442A6 = array( 'hourly' => array('display' => __('Hourly')), 'twicedaily'=> array('display' => __('Twice Daily')), 'daily' => array('display' => __('Daily')), ); $R121DF32690753C006B99C2D15FD25548 =array_merge($RE3D2F16BB6AD764AE0D0BB8EA37A36D3,$R0C6DBABFEDB23651440A59B5CE3442A6); ?>
    <br />

    <div id="myarcade_settings">
      <form method="post" name="editsettings">
        <?php wp_nonce_field( 'myarcade_save_settings', 'myarcade_save_settings_nonce' ); ?>
        <input type="hidden" name="feedaction" value="save">

        <?php
 ?>
        <h2 class="trigger"><?php _e("General Settings", 'myarcadeplugin'); ?></h2>
        <div class="toggle_container">
          <div class="block">
            <table class="optiontable" width="100%">

              <tr><td colspan="2"><h3><?php _e("Save User Scores", 'myarcadeplugin'); ?></h3></td></tr>
              <tr>
                <td>
                  <input type="checkbox" name="leaderboardenable" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($general['scores'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
                </td>
                <td><i><?php _e("Check this if you want to collect user scores. Only scores from Mochi and IBPArcade games will be collected.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="2"><h3><?php _e("Save Only Highscores", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td>
                  <input type="checkbox" name="onlyhighscores" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($general['highscores'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
                </td>
                <td><i><?php _e("Check this if you want to only save a user's highest score. Otherwise all submitted scores are saved.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="2"><h3><?php _e("Publish Games", 'myarcadeplugin'); ?></h3></td></tr>
              <tr>
                <td>
                  <input type="text" size="40"  name="game_count" value="<?php echo $general['posts']; ?>" />
                </td>
                <td><i><?php _e('How many games should be published when clicking on "Publish Games"?', 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="2"><h3><?php _e("Post Status", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td>
                  <input type="radio" name="publishstatus" value="publish" <?php F739F7FB06301A1E6810F08B95CC237ED($general['status'], 'publish'); ?> /><label class="opt">&nbsp;<?php _e("Publish", 'myarcadeplugin'); ?></label>
                  <input type="radio" name="publishstatus" value="future" <?php F739F7FB06301A1E6810F08B95CC237ED($general['status'], 'future'); ?> /><label class="opt">&nbsp;<?php _e("Scheduled", 'myarcadeplugin'); ?></label>
                  <input type="radio" name="publishstatus" value="draft" <?php F739F7FB06301A1E6810F08B95CC237ED($general['status'], 'draft'); ?> /><label class="opt">&nbsp;<?php _e("Draft", 'myarcadeplugin'); ?></label>
                  <br /><br />
                  <?php _e("Schedule Time", 'myarcadeplugin'); ?>: <input type="text" size="10" name="schedtime" value="<?php echo $general['schedule']; ?>">
                </td>
                <td><i><?php _e("Choose the post status for new game publication. If you whish to schedule new game publication, indicate an interval between publications in minutes.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="2"><h3><?php _e("Download Thumbnails", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td>
                  <input type="checkbox" name="downloadthumbs" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($general['down_thumbs'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
                </td>
                <td><i><?php _e("Should the game thumbnails be imported and saved on your web server? For this to work properly, the thumb directory (wp-content/thumbs/) must be writable.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="2"><h3><?php _e("Download Games", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td>
                  <input type="checkbox" name="downloadgames" value="true"  <?php F739F7FB06301A1E6810F08B95CC237ED($general['down_games'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
                </td>
                <td><i><?php _e("Should the game be imported and saved on your web server? For this to work properly, the game directory (wp-content/games/) must be writable.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="2"><h3><?php _e("Download Screenshots", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td>
                  <input type="checkbox" name="downscreens" value="true"  <?php F739F7FB06301A1E6810F08B95CC237ED($general['down_screens'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
                </td>
                <td><i><?php _e("Should the game screenshots be imported and stored on your web server? For this to work properly, the thumb directory (wp-content/thumbs/) must be  writable.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="2"><h3><?php _e("Delete Game Files", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td>
                  <input type="checkbox" name="deletefiles" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($general['delete'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
                </td>
                <td><i><?php _e("This option will delete the associated game files from your server after deleting the post from your blog. Warning - deleted games cannot be re-published! For this to work properly, the games and thumbs directories must be writable.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="2"><h3><?php _e("Folder Organization Structure", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td>
                  <input type="text" size="40"  name="folder_structure" value="<?php echo $general['folder_structure']; ?>" />
                </td>
                <td><i><?php _e('Define the folder structure for file downloads. Available variables are %game_type% and %alphabetical%. You can combine those variables like this: %game_type%/%alphabetical%/.', 'myarcadeplugin'); ?><br />
                    <?php _e('That means, for each game type a new folder will be created and files will be organized in sub folders. Example: "/games/fog/A/awesome_game.swf.', 'myarcadeplugin'); ?><br />
                    <?php _e('Leave blank if you want to save all files in a single folder."', 'myarcadeplugin'); ?></i></td>
              </tr>


              <tr><td colspan="2"><h3><?php _e("Automation / Cron Settings", 'myarcadeplugin'); ?></h3></td></tr>
              <tr><td colspan="2"><p><?php _e("Global automation settings allows you to enable and setup automated fetching and publishing globally. You can enable/disable automated fetching and publishing for each game distributor separately when you click on distributors settings.", 'myarcadeplugin'); ?></p></td></tr>

              <tr><td colspan="2"><h4><?php _e("Automated Game Fetching", 'myarcadeplugin'); ?></h4></td></tr>

              <tr>
                <td>
                  <input type="checkbox" name="automated_fetching" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($general['automated_fetching'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
                </td>
                <td><i><?php _e("This option will activate automated game fetching globally. If activated the cron job will be triggered by WordPress.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="2"><h4><?php _e("Game Fetching Interval", 'myarcadeplugin'); ?></h4></td></tr>

              <tr>
                <td>
                  <select size="1" name="interval_fetching" id="interval_fetching">
                    <?php
 foreach($R121DF32690753C006B99C2D15FD25548 as $R9A0BDC9BA61F2E1ED223EA28D841CAAC => $R244F38266C59587D696AEC08A771B803) { ?>
                      <option value="<?php echo $R9A0BDC9BA61F2E1ED223EA28D841CAAC; ?>" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($general['interval_fetching'], $R9A0BDC9BA61F2E1ED223EA28D841CAAC); ?> ><?php echo $R244F38266C59587D696AEC08A771B803['display']; ?></option>
                      <?php
 } ?>
                  </select>
                </td>
                <td><i><?php _e("Select a frequency for fetching new games. Games are fetched per the scheduled frequency, pending a user visiting your site (which triggers the function).", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="2"><h4><?php _e("Automated Game Publishing", 'myarcadeplugin'); ?></h4></td></tr>

              <tr>
                <td>
                  <input type="checkbox" name="automated_publishing" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($general['automated_publishing'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
                </td>
                <td><i><?php _e("This option will activate automated game publishing globally. If activated the cron job will be triggered by WordPress.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="2"><h4><?php _e("Game Publishing Interval", 'myarcadeplugin'); ?></h4></td></tr>

              <tr>
                <td>
                  <select size="1" name="interval_publishing" id="interval_publishing">
                    <?php
 foreach($R121DF32690753C006B99C2D15FD25548 as $R9A0BDC9BA61F2E1ED223EA28D841CAAC => $R244F38266C59587D696AEC08A771B803) { ?>
                      <option value="<?php echo $R9A0BDC9BA61F2E1ED223EA28D841CAAC; ?>" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($general['interval_publishing'], $R9A0BDC9BA61F2E1ED223EA28D841CAAC); ?> ><?php echo $R244F38266C59587D696AEC08A771B803['display']; ?></option>
                      <?php
 } ?>
                  </select>
                </td>
                <td><i><?php _e("Select a frequency for publishing new games. Games are published per the scheduled frequency, pending a user visiting your site (which triggers the function).", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="2"><h4><?php _e("Publish Games (Manually Imported Games)", 'myarcadeplugin'); ?></h4></td></tr>

              <tr>
                <td>
                  <input type="text" size="40"  name="general_cron_publish_limit" value="<?php echo $general['cron_publish_limit']; ?>" />
                </td>
                <td><i><?php _e("How many games should be published on every cron trigger? This setting affects only manually imported games.", 'myarcadeplugin'); ?></i></td>



              <tr><td colspan="2"><h3><?php _e("Game Categories To Feed", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td>
                <?php
 foreach ($R30E38C1F8EC85F8EE8DF620FF3267157 as $RAE9A4476893066B7B92C648E9F0FDEE8) { echo '<input type="checkbox" name="gamecats[]" value="'.$RAE9A4476893066B7B92C648E9F0FDEE8['Slug'].'" '.$RAE9A4476893066B7B92C648E9F0FDEE8['Status'].' /><label class="opt">&nbsp;'.$RAE9A4476893066B7B92C648E9F0FDEE8['Name'].' '.$RAE9A4476893066B7B92C648E9F0FDEE8['Info'].'</label><br />'; } ?>
                </td>
                <td><i><?php _e("Select game categories that should be fetched.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="2"><h3><?php _e("Create Categories", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td>
                  <input type="checkbox" name="createcats" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($general['create_cats'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
                </td>
                <td><i><?php _e("Check this if you want to create selected categories on your blog.", 'myarcadeplugin'); ?></i></td>
              </tr>


              <tr><td colspan="2"><h3><?php _e("Parent Category", 'myarcadeplugin'); ?></h3></td></tr>
                <tr>
                  <td>
                    <select size="1" name="parentcatid" id="parentcatid">
                    <option value=''>--- <?php _e("No Parent Category", 'myarcadeplugin'); ?> ---</option>
                    <?php
 foreach ($R29FA1603C6184F03E6AAA115D2BB6020 as $RC11F3654F948F5253C0BA85FB251E9B1 => $R01BFE0D77A3122285DA9AB276249A71D) { if ($RC11F3654F948F5253C0BA85FB251E9B1 == $general['parent']) { $R57681F07B342495CFFFD233A37A4DC9F = 'selected'; } else { $R57681F07B342495CFFFD233A37A4DC9F = ''; } echo '<option value="'.$RC11F3654F948F5253C0BA85FB251E9B1.'" '.$R57681F07B342495CFFFD233A37A4DC9F.'>'.$R01BFE0D77A3122285DA9AB276249A71D.'</option>'; } ?>
                    </select>
                  </td>
                  <td><i><?php _e("This option will create game categories as subcategories in the selected category.", 'myarcadeplugin'); ?> <?php _e(" This option is useful if you have a mixed site and not only a pure arcade site.", 'myarcadeplugin'); ?></i></td>
                </tr>

                <?php ?>
                <tr>
                  <td colspan="2">
                    <h3><?php _e("Use Only The First Category", 'myarcadeplugin'); ?></h3>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="firstcat" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($general['firstcat'], true); ?> />&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?>
                  </td>
                  <td><i><?php _e("Many game developers tag their games to more than one category to get more downloads. Thereby the gamess will be added to several categories. Activate this option to avoid game publishing in more than one category.", 'myarcadeplugin'); ?></i></td>
                </tr>

              <tr><td colspan="2"><h3><?php _e("Max. Game Width (optional)", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td>
                  <input type="text" size="40" name="maxwidth" value="<?php echo $general['max_width']; ?>" />
                </td>
                <td><i><?php _e("Maximum allowed game width in px. If set, the get_game function will create output code with adjusted game dimensions.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="2"><h3><?php _e("Publish In A Single Category", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td>
                  <input type="checkbox" name="singlecat" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($general['single'], true); ?> />&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?>
                  <select size="1" name="singlecatid" id="singlecatid">
                  <?php
 foreach ($R29FA1603C6184F03E6AAA115D2BB6020 as $RC11F3654F948F5253C0BA85FB251E9B1 => $R01BFE0D77A3122285DA9AB276249A71D) { if ($RC11F3654F948F5253C0BA85FB251E9B1 == $general['singlecat']) { $R57681F07B342495CFFFD233A37A4DC9F = 'selected'; } else { $R57681F07B342495CFFFD233A37A4DC9F = ''; } echo '<option value="'.$RC11F3654F948F5253C0BA85FB251E9B1.'" '.$R57681F07B342495CFFFD233A37A4DC9F.'/>'.$R01BFE0D77A3122285DA9AB276249A71D.'</option>'; } ?>
                  </select>
                </td>
                <td><i><?php _e("This option will publish all games only in the selected category.", 'myarcadeplugin'); ?> <?php _e("This option is useful if you have a mixed site and not only a pure arcade site.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="2"><h3><?php _e("Embed Flash Code", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td>
                <select size="1" name="embedflashcode" id="embedflashcode">
                  <option value="manually" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($general['embed'], 'manually'); ?> ><?php _e("Manually", 'myarcadeplugin'); ?></option>
                  <option value="top" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($general['embed'], 'top'); ?> ><?php _e("At The Top Of A Game Post", 'myarcadeplugin'); ?></option>
                  <option value="bottom" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($general['embed'], 'bottom'); ?> ><?php _e("At The Bottom Of A Game Post", 'myarcadeplugin'); ?></option>
                </select>
                </td>
                <td><i><?php _e("Select if MyArcadePlugin Pro should auto embed the flash code in your game posts (only if you don't use FunGames theme).", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="2"><h3><?php _e("Use SWFObject", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td>
                  <input type="checkbox" name="swfobject" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED( $general['swfobject'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
                </td>
                <td><i><?php _e("Activate this if you want to use SWFObject to embed Flash games.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="2"><h3><?php _e("Game Post Template", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td>
                  <input type="checkbox" name="usetemplate" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($general['use_template'], true); ?> /><label class="opt">&nbsp;<?php _e("Activate Post Template", 'myarcadeplugin'); ?></label>
                  <br /><br />
                  <textarea rows="12" cols="40" id="post_template" name="post_template"><?php echo htmlspecialchars(stripslashes($general['template'])); ?></textarea>
                </td>
                <td><i>
                    <?php _e("Use this template to style the output of MyArcadePlugin Pro when creating game posts.", 'myarcadeplugin'); ?>
                    <br />
                     <strong><?php _e("Available Variables", 'myarcadeplugin'); ?>:</strong><br />
                    %TITLE% - <?php _e("Show the game title", 'myarcadeplugin'); ?><br />
                    %DESCRIPTION% - <?php _e("Show game description", 'myarcadeplugin'); ?><br />
                    %INSTRUCTIONS% - <?php _e("Show game instructions if available", 'myarcadeplugin'); ?><br />
                    %TAGS% - <?php _e("Show all game tags", 'myarcadeplugin'); ?><br />
                    %THUMB% - <?php _e("Show the game thumbnail", 'myarcadeplugin'); ?><br />
                    %THUMB_URL% - <?php _e("Show game thumbnail URL", 'myarcadeplugin'); ?><br />
                    %SWF_URL% - <?php _e("Show game SWF URL / Embed Code", 'myarcadeplugin'); ?><br />
                    %WIDTH% - <?php _e("Show game width", 'myarcadeplugin'); ?><br />
                    %HEIGHT% - <?php _e("Show game height", 'myarcadeplugin'); ?><br />
                  </i></td>
              </tr>

              <?php ?>
              <tr>
                <td colspan="2">
                  <h3><?php _e("Disable Game Tags", 'myarcadeplugin'); ?></h3>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="checkbox" name="disable_game_tags" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($general['disable_game_tags'], true); ?> />&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?>
                </td>
                <td><i><?php _e("Check this if you want to prevent MyArcadePlugin from adding tags to WordPress posts (not recommended).", 'myarcadeplugin'); ?></i></td>
              </tr>

              <?php ?>
              <tr>
                <td colspan="2">
                  <h3><?php _e("Allow Users To Post Games", 'myarcadeplugin'); ?></h3>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="checkbox" name="allow_user" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($general['allow_user'], true); ?> />&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?>
                </td>
                <td><i><?php _e("Activate this if you want to give your users access to import games. WordPress supports following user roles: Contributor, Author and Editor. Games added by Contributors will be saved as drafts! Authors and Editors will be able to publish games.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <?php ?>
              <tr>
                <td colspan="2">
                  <h3><?php _e("Guest Plays", 'myarcadeplugin'); ?></h3>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" size="40" name="limitplays" value="<?php echo $general['limit_plays']; ?>" />
                </td>
                <td><i><?php _e("Set how many games a guest can play before he/she needs to register. Set to 0 to deactivate the game play check.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <?php ?>
              <tr>
                <td colspan="2">
                  <h3><?php _e("Guest Message", 'myarcadeplugin'); ?></h3>
                </td>
              </tr>
              <tr>
                <td>
                  <textarea rows="12" cols="40" id="limitmessage" name="limitmessage"><?php echo htmlspecialchars(stripslashes($general['limit_message'])); ?></textarea>
                </td>
                <td><i><?php _e("Enter the message here that you want a guest to see after 'X' number of plays (HTML allowed)", 'myarcadeplugin'); ?></i></td>
              </tr>

              <?php ?>
              <tr>
                <td colspan="2">
                  <h3><?php _e("Game Play Delay", 'myarcadeplugin'); ?></h3>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" size="40" name="play_delay" value="<?php echo $general['play_delay']; ?>" />
                </td>
                <td><i><?php _e("Game play delay is responsible for play, CubePoints and contest counter of a user. MyArcadePlugin will only count game plays when the delay time between two game plays is expired. Default value: 30 [time in seconds].", 'myarcadeplugin'); ?></i></td>
              </tr>

              <?php ?>
              <tr>
                <td colspan="2">
                  <h3><?php _e("Post Type", 'myarcadeplugin'); ?></h3>
                </td>
              </tr>
              <tr>
                <td>
                  <?php
 $RFFEE87C3A58D1A5A39E20EFB0D800053 = get_post_types(); $RE19F6EBEC82C41D02D603DCEBD55B29B = array('attachment', 'revision', 'nav_menu_item', 'page'); $RFFEE87C3A58D1A5A39E20EFB0D800053 = array_diff($RFFEE87C3A58D1A5A39E20EFB0D800053, $RE19F6EBEC82C41D02D603DCEBD55B29B); ?>
                  <select size="1" name="posttype" id="posttype">
                    <?php
 foreach($RFFEE87C3A58D1A5A39E20EFB0D800053 as $R65DFACB39960C22313740A131148FB81) { ?>
                      <option value="<?php echo $R65DFACB39960C22313740A131148FB81; ?>" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($general['post_type'], $R65DFACB39960C22313740A131148FB81); ?>>
                        <?php echo $R65DFACB39960C22313740A131148FB81; ?>
                      </option>
                    <?php } ?>
                  </select>
                </td>
                <td><i><?php _e("Select a post type you want to use with MyArcadePlugin. If you want to use a custom post type then you will need to create it before you can make a selection. The easiest way to create a custom post type is to use a plugin like 'Custom Post Type UI'.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr>
                <td colspan="2">
                  <h3><?php _e("Custom Taxonomies", 'myarcadeplugin'); ?></h3>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <?php
 $REB8197DFB1FA91DBEFE9915CAA539561 = get_taxonomies(array('public' => true,'_builtin' => false)); if ( !is_array($REB8197DFB1FA91DBEFE9915CAA539561) || empty($REB8197DFB1FA91DBEFE9915CAA539561)) { ?>
                    <i><?php _e('No custom taxonomies found..', 'myarcadeplugin'); ?></i>
                    <?php
 } else { ?>
                    <table>
                      <tr>
                      <td>Game Categories:</td>
                      <td>
                    <?php if ( is_array($REB8197DFB1FA91DBEFE9915CAA539561) && !empty($REB8197DFB1FA91DBEFE9915CAA539561)) : ?>
                      <select size="1" name="customtaxcat" id="customtaxcat">
                        <option value="">-- select a taxonomy --</option>
                        <?php foreach( $REB8197DFB1FA91DBEFE9915CAA539561 as $R270D396521F6B787A692C06F477944DA) : ?>
                        <option value="<?php echo $R270D396521F6B787A692C06F477944DA; ?>" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R270D396521F6B787A692C06F477944DA , $general['custom_category']); ?>><?php echo $R270D396521F6B787A692C06F477944DA; ?></option>
                        <?php endforeach; ?>
                      </select>
                    <?php endif; ?>
                      </td>
                      <td><?php _e("Select a custom taxonomy that should be used for game categories.", 'myarcadeplugin'); ?></td>
                      </tr>
                      <tr>
                      <td>Game Tags:</td>
                      <td>
                    <?php if ( is_array($REB8197DFB1FA91DBEFE9915CAA539561) && !empty($REB8197DFB1FA91DBEFE9915CAA539561)) : ?>
                      <select size="1" name="customtaxtag" id="customtaxtag">
                        <option value="">-- select a taxonomy --</option>
                        <?php foreach( $REB8197DFB1FA91DBEFE9915CAA539561 as $R270D396521F6B787A692C06F477944DA) : ?>
                        <option value="<?php echo $R270D396521F6B787A692C06F477944DA; ?>" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R270D396521F6B787A692C06F477944DA , $general['custom_tags']); ?>><?php echo $R270D396521F6B787A692C06F477944DA; ?></option>
                        <?php endforeach; ?>
                      </select>
                    <?php endif; ?>
                      </td>
                      <td><?php _e("Select a custom taxonomy that should be used for game tags.", 'myarcadeplugin'); ?></td>
                      </tr>
                    </table>
                    <?php
 } ?>
                </td>
              </tr>


              <?php ?>
              <tr>
                <td colspan="2">
                  <h3><?php _e("Featured Image", 'myarcadeplugin'); ?></h3>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="checkbox" name="featured_image" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($general['featured_image'], true); ?> />&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?>
                </td>
                <td><i><?php _e("Activate this option if you want MyArcadePlugin to attach game thumbnails to the created post as featured images. Use this only if you don't use a pure Arcade Theme.", 'myarcadeplugin'); ?></i></td>
              </tr>

            </table>
            <input class="button button-primary" id="submit" type="submit" name="submit" value="<?php _e("Save Settings", 'myarcadeplugin'); ?>" />
          </div>
        </div>

       <?php
 ?>

        <?php include_once(MYARCADE_CORE_DIR.'/languages.php'); ?>

        <h2 class="trigger"><?php _e("Translation Settings", 'myarcadeplugin'); ?></h2>
        <div class="toggle_container">
          <div class="block">
            <table class="optiontable" width="100%" cellpadding="5" cellspacing="5">
              <tr>
                <td colspan="2">
                  <i>
                    <?php _e("Translate games automatically to your language using the Microsoft Translator or Google Translate v2 (payed service). The translation is triggered when you click on 'Publish Games' or 'Publish'.", 'myarcadeplugin'); ?>
                  </i>
                </td>
              </tr>

              <?php ?>
              <tr>
                <td colspan="2">
                  <h3><?php _e("Select Translation Service", 'myarcadeplugin'); ?></h3>
                </td>
              </tr>
              <tr>
                <td>
                  <select name="translation">
                    <option value="none" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($general['translation'], 'none'); ?>><?php _e("Disable Translations", 'myarcadeplugin'); ?></option>
                    <option value="microsoft" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($general['translation'], 'microsoft'); ?>><?php _e("Microsoft Translator", 'myarcadeplugin'); ?></option>
                    <option value="google" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($general['translation'], 'google'); ?>><?php _e("Google Translator", 'myarcadeplugin'); ?></option>
                  </select>
                </td>
                <td><i><?php _e("Check this if you want to enable the translator.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <?php ?>
              <tr><td colspan="2"><h3><?php _e("Game Fields To Translate", 'myarcadeplugin'); ?></h3></td></tr>
              <tr>
                <td>
                  <input type="checkbox" name="translate_fields[]" value="name" <?php FCF8E1A0ACF7F4CB87DC4210191B8F320($general['translate_fields'], 'name'); ?> />&nbsp;<?php _e("Name", 'myarcadeplugin'); ?><br />
                  <input type="checkbox" name="translate_fields[]" value="description" <?php FCF8E1A0ACF7F4CB87DC4210191B8F320($general['translate_fields'], 'description'); ?> />&nbsp;<?php _e("Description", 'myarcadeplugin'); ?><br />
                  <input type="checkbox" name="translate_fields[]" value="instructions" <?php FCF8E1A0ACF7F4CB87DC4210191B8F320($general['translate_fields'], 'instructions'); ?> />&nbsp;<?php _e("Instructions", 'myarcadeplugin'); ?><br />
                  <input type="checkbox" name="translate_fields[]" value="tags" <?php FCF8E1A0ACF7F4CB87DC4210191B8F320($general['translate_fields'], 'tags'); ?> />&nbsp;<?php _e("Tags", 'myarcadeplugin'); ?>
                </td>
                <td><i><?php _e("Select game fields that you want to translate.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <?php ?>
              <tr><td colspan="2"><h3><?php _e("Game Types To Translate", 'myarcadeplugin'); ?></h3></td></tr>
              <tr>
                <td>
                  <?php foreach ( $REC43CE978463AAD8D91F93AE43393035 as $R7DE72B5661EA67493EDCCCA6596ACB91 => $RA366A4BFCDB8C4F13747B4BFFA97D00A) : ?>
                  <input type="checkbox" name="translate_games[]" value="<?php echo $R7DE72B5661EA67493EDCCCA6596ACB91;?>" <?php FCF8E1A0ACF7F4CB87DC4210191B8F320($general['translate_games'], $R7DE72B5661EA67493EDCCCA6596ACB91); ?> />&nbsp;<?php echo $RA366A4BFCDB8C4F13747B4BFFA97D00A; ?><br />
                  <?php endforeach; ?>
                </td>
                <td><i><?php _e("Select game types you want to translate.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <?php ?>
              <tr>
                <td colspan="2">
                  <h3><?php _e("Microsoft Translator Settings", 'myarcadeplugin'); ?></h3>
                </td>
              </tr>
              <tr><td colspan="2"><i><?php _e("To be able to use Microsoft Translator you will need to register on Windows Azure Marketplace and sign up on the <a href='https://datamarket.azure.com' target='_blank'>Microsoft Translator</a>.", 'myarcadeplugin'); ?></i></td></tr>

              <tr><td colspan="2"><h4><?php _e("Client ID", 'myarcadeplugin'); ?></h4></td></tr>
              <tr>
                <td>
                  <input type="text" size="40" name="bingid" value="<?php echo $general['bingid']; ?>" />
                </td>
                <td><i><?php _e("Enter your Windows Azure Marketplace Client ID.", 'myarcadeplugin');?></i></td>
              </tr>

              <tr><td colspan="2"><h4><?php _e("Client Secret Key", 'myarcadeplugin'); ?></h4></td></tr>
              <tr>
                <td>
                  <input type="text" size="40" name="bingsecret" value="<?php echo $general['bingsecret']; ?>" />
                </td>
                <td><i><?php _e("Enter your Windows Azure Marketplace Client Secret Key.", 'myarcadeplugin');?></i></td>
              </tr>

              <?php ?>
              <tr><td colspan="2"><h4><?php _e("Target Language", 'myarcadeplugin'); ?></h4></td></tr>
              <tr>
                <td>
                  <?php
 if (isset($R30F7F42650F82E93DD46D60507CF0A48) ) { ?><select size="1" name="translate_to" id="translate_to"><?php
 foreach ($R30F7F42650F82E93DD46D60507CF0A48 as $RE2A6348A524DA39F3A55BC3C1C4497F5 => $R51C716B9664B3F4E109066C05B9B1A86) { ?><option value="<?php echo $RE2A6348A524DA39F3A55BC3C1C4497F5; ?>" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($general['translate_to'], $RE2A6348A524DA39F3A55BC3C1C4497F5); ?>><?php echo $R51C716B9664B3F4E109066C05B9B1A86; ?></option><?php
 } ?></select><?php
 } else { _e("ERROR: Can't find bing language file!", 'myarcadeplugin'); } ?>
                </td>
                <td><i><?php _e("Select the target language.", 'myarcadeplugin'); ?></i></td>
              </tr>


              <?php ?>
              <tr>
                <td colspan="2">
                  <h3><?php _e("Google Translator Settings", 'myarcadeplugin'); ?></h3>
                </td>
              </tr>

              <tr><td colspan="2"><h4><?php _e("API Key", 'myarcadeplugin'); ?></h4></td></tr>

              <tr>
                <td>
                  <input type="text" size="40" name="google_id" value="<?php echo $general['google_id']; ?>" />
                </td>
                <td><i><?php _e('To be able to use Google Translation API v2 you will need to enter your API Key. Google Translator API is a payed service: <a href="#" target="_blank">Google Translate API</a>', 'myarcadeplugin'); ?></i></td>
              </tr>

              <?php ?>
              <tr><td colspan="2"><h4><?php _e("Target Language", 'myarcadeplugin'); ?></h4></td></tr>
              <tr>
                <td>
                  <?php
 if (isset($R8DA5D4E8A0D8B2EB02D34E6E2CBBFB9F) ) { ?><select size="1" name="google_translate_to" id="google_translate_to"><?php
 foreach ($R8DA5D4E8A0D8B2EB02D34E6E2CBBFB9F as $RE2A6348A524DA39F3A55BC3C1C4497F5 => $R51C716B9664B3F4E109066C05B9B1A86) { ?><option value="<?php echo $RE2A6348A524DA39F3A55BC3C1C4497F5; ?>" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($general['google_translate_to'], $RE2A6348A524DA39F3A55BC3C1C4497F5); ?>><?php echo $R51C716B9664B3F4E109066C05B9B1A86; ?></option><?php
 } ?></select><?php
 } else { _e("ERROR: Can't find google language file!", 'myarcadeplugin'); } ?>
                </td>
                <td><i><?php _e("Select the target language.", 'myarcadeplugin'); ?></i></td>
              </tr>

            </table>
            <input class="button button-primary" id="submit" type="submit" name="submit" value="<?php _e("Save Settings", 'myarcadeplugin'); ?>" />
          </div>
        </div>

        <?php
 ?>
        <h2 class="trigger"><?php _e("Category Mapping", 'myarcadeplugin'); ?></h2>
        <div class="toggle_container">
          <div class="block">

            <script type="text/javascript">
              function myabp_add_map(category, section) {
                if( typeof(section) === 'undefined' ) {
                  section = "general";
                }

                var selection = jQuery("#" + section +"_cat_" + category).val();
                jQuery('#'+section+'_load_'+ category).html('<div class=\'gload\'> </div>');

                jQuery.post('<?php echo admin_url('admin-ajax.php'); ?>',
                  {
                    action:'myarcade_handler',
                    func:'addmap',
                    feedcat:category,
                    mapcat:selection,
                    section:section
                  },
                  function(data) {
                    jQuery('#' + section + '_map_' + category).append(data);
                    jQuery('#' + section + '_load_' + category).html('');
                  }
                );
              }

              function myabp_del_map(mapid, category, section) {
                if( typeof(section) === 'undefined' ) {
                  section = "general";
                }
                jQuery('#' + section + '_load_' + category).html('<div class=\'gload\'> </div>');

                jQuery.post('<?php echo admin_url('admin-ajax.php'); ?>',
                  {
                    action:'myarcade_handler',
                    func:'delmap',
                    feedcat:category,
                    mapcat:mapid,
                    section:section
                  },
                  function(data){
                    jQuery('#' + section + '_delmap_'+mapid+'_'+category).fadeOut('fast', function() {
                      jQuery('#' + section + '_delmap_'+mapid+'_'+category).remove();
                    });
                    jQuery('#' + section + '_load_'+category).html('');
                  }
                );
              }
            </script>

            <table class="optiontable" width="100%">
              <tr>
                <td colspan="4">
                  <i>
                    <?php _e("Map default categories to your own category names. This feature allows you to publish games in translated or summarized categories instead of using the predefined category names. (optional)", 'myarcadeplugin'); ?>
                  </i>
                  <br /><br />
                </td>
              </tr>
              <tr>
                <td width="20%"><a name="mapcats"></a><strong><?php _e("Feed Category", 'myarcadeplugin'); ?></strong></td>
                <td width="20%"><strong><?php _e("Category", 'myarcadeplugin'); ?></strong></td>
                <td width="20%"><strong><?php _e("Add Mapping", 'myarcadeplugin'); ?></strong></td>
                <td><strong><?php _e("Current Mappings", 'myarcadeplugin'); ?></strong></td>
              </tr>
              <?php foreach ($R30E38C1F8EC85F8EE8DF620FF3267157 as $RAE9A4476893066B7B92C648E9F0FDEE8) : ?>
              <tr>
                <td><?php echo $RAE9A4476893066B7B92C648E9F0FDEE8['Name']; ?></td>
                <td>
                  <?php
 $output = '<select id="general_cat_'.$RAE9A4476893066B7B92C648E9F0FDEE8['Slug'].'">'; $output .= '<option value="0">---Select---</option>'; foreach ($R29FA1603C6184F03E6AAA115D2BB6020 as $RC11F3654F948F5253C0BA85FB251E9B1 => $RBE8A7B9BA0D09AF089A82C74FF83754F) { $output .= '<option value="'.$RC11F3654F948F5253C0BA85FB251E9B1.'" />'.$RBE8A7B9BA0D09AF089A82C74FF83754F.'</option>'; } $output .= '</select>'; echo $output; ?>
                </td>
                <td>
                  <div style="width:100px">
                  <div class="button-secondary" style="float:left;width:60px;text-align:center;" onclick="myabp_add_map('<?php echo $RAE9A4476893066B7B92C648E9F0FDEE8['Slug']; ?>', 'general');">
                    Add
                  </div>
                  <div style="float:right;" id="general_load_<?php echo $RAE9A4476893066B7B92C648E9F0FDEE8['Slug']; ?>"> </div>
                  </div>
                </td>
                <td>
                  <?php if ( !empty($RAE9A4476893066B7B92C648E9F0FDEE8['Mapping']) ) { ?>
                    <div class="tagchecklist" id="general_map_<?php echo $RAE9A4476893066B7B92C648E9F0FDEE8['Slug']; ?>">
                      <?php
 $R44D5507942BD37F2E8BE220EC293D024 = explode(',', $RAE9A4476893066B7B92C648E9F0FDEE8['Mapping']); foreach ($R44D5507942BD37F2E8BE220EC293D024 as $R925737EF34C80F95F51826BA04A4D3F8) { ?>
                        <span id="general_delmap_<?php echo $R925737EF34C80F95F51826BA04A4D3F8; ?>_<?php echo $RAE9A4476893066B7B92C648E9F0FDEE8['Slug']; ?>" class="remove_map">
                          <img style="float:left;top:4px;position:relative;" src="<?php echo MYARCADE_CORE_URL; ?>/images/remove.png" alt="UnMap" onclick="myabp_del_map('<?php echo $R925737EF34C80F95F51826BA04A4D3F8; ?>', '<?php echo $RAE9A4476893066B7B92C648E9F0FDEE8['Slug']; ?>', 'general');" />&nbsp;<?php echo get_cat_name($R925737EF34C80F95F51826BA04A4D3F8); ?>
                        </span>
                        <?php
 } ?>
                    </div>
                    <?php
 } else { ?>
                    <div class="tagchecklist" id="general_map_<?php echo $RAE9A4476893066B7B92C648E9F0FDEE8['Slug']; ?>"></div>
                    <?php
 } ?>
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <HR />
                </td>
              </tr>
              <?php endforeach; ?>

              <?php if ( ! empty( $bigfish ) ) : ?>
              <tr>
                <td colspan="4"><h3>Big Fish Games</h3></td>
              </tr>
              <tr>
                <td width="20%"><a name="mapcats"></a><strong><?php _e("Native Category", 'myarcadeplugin'); ?></strong></td>
                <td width="20%"><strong><?php _e("WP Categories", 'myarcadeplugin'); ?></strong></td>
                <td width="20%"><strong><?php _e("Add Mapping", 'myarcadeplugin'); ?></strong></td>
                <td><strong><?php _e("Current Mappings", 'myarcadeplugin'); ?></strong></td>
              </tr>

              <?php foreach ($bigfish['categories'] as $RE92C3CBB98FFF5D429C52D981582FA4B) : ?>
              <tr>
                <td><?php echo $RE92C3CBB98FFF5D429C52D981582FA4B['Name']; ?></td>
                <td>
                  <?php
 $output = '<select id="bigfish_cat_'.$RE92C3CBB98FFF5D429C52D981582FA4B['ID'].'">'; $output .= '<option value="0">---Select---</option>'; foreach ($R29FA1603C6184F03E6AAA115D2BB6020 as $RC11F3654F948F5253C0BA85FB251E9B1 => $RBE8A7B9BA0D09AF089A82C74FF83754F) { $output .= '<option value="'.$RC11F3654F948F5253C0BA85FB251E9B1.'" />'.$RBE8A7B9BA0D09AF089A82C74FF83754F.'</option>'; } $output .= '</select>'; echo $output; ?>
                </td>
                <td>
                  <div style="width:100px">
                  <div class="button-secondary" style="float:left;width:60px;text-align:center;" onclick="myabp_add_map('<?php echo $RE92C3CBB98FFF5D429C52D981582FA4B['ID']; ?>', 'bigfish' );">
                    Add
                  </div>
                  <div style="float:right;" id="bigfish_load_<?php echo $RE92C3CBB98FFF5D429C52D981582FA4B['ID']; ?>"> </div>
                  </div>
                </td>
                <td>
                  <?php if ( !empty($RE92C3CBB98FFF5D429C52D981582FA4B['Mapping']) ) { ?>
                    <div class="tagchecklist" id="bigfish_map_<?php echo $RE92C3CBB98FFF5D429C52D981582FA4B['ID']; ?>">
                      <?php
 $R44D5507942BD37F2E8BE220EC293D024 = explode(',', $RE92C3CBB98FFF5D429C52D981582FA4B['Mapping']); foreach ($R44D5507942BD37F2E8BE220EC293D024 as $R925737EF34C80F95F51826BA04A4D3F8) { ?>
                        <span id="bigfish_delmap_<?php echo $R925737EF34C80F95F51826BA04A4D3F8; ?>_<?php echo $RE92C3CBB98FFF5D429C52D981582FA4B['ID']; ?>" class="remove_map">
                          <img style="float:left;top:4px;position:relative;" src="<?php echo MYARCADE_CORE_URL; ?>/images/remove.png" alt="UnMap" onclick="myabp_del_map('<?php echo $R925737EF34C80F95F51826BA04A4D3F8; ?>', '<?php echo $RE92C3CBB98FFF5D429C52D981582FA4B['ID']; ?>', 'bigfish');" />&nbsp;<?php echo get_cat_name($R925737EF34C80F95F51826BA04A4D3F8); ?>
                        </span>
                        <?php
 } ?>
                    </div>
                    <?php
 } else { ?>
                    <div class="tagchecklist" id="bigfish_map_<?php echo $RE92C3CBB98FFF5D429C52D981582FA4B['ID']; ?>">
                    </div>
                    <?php
 } ?>
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <HR />
                </td>
              </tr>
              <?php endforeach; ?>
              <?php endif; ?>

              <tr>
              <td colspan="4">
                <i>
                  <?php _e("The changes in this section are saved automatically.", 'myarcadeplugin'); ?>
                </i>
                <br /><br />
              </td>
            </tr>
            </table>
          </div>
        </div>

        <?php
 ?>

        <script type="text/javascript">
          /* <![CDATA[ */
          function confirmDeleteGames() {
            if ( confirm("Are you sure you want to delete all fetched games?") ) {
              jQuery('#del_response').html('<div class=\'gload\'> </div>');
              jQuery.post('<?php echo admin_url('admin-ajax.php'); ?>', {action:'myarcade_handler',func:'delgames'},function(data){jQuery('#del_response').html(data);});
            }
          }
          function confirmDeleteScores() {
            if ( confirm("Are you sure you want to delete all scores?") ) {
              jQuery('#score_response').html('<div class=\'gload\'> </div>');
              jQuery.post('<?php echo admin_url('admin-ajax.php'); ?>', {action:'myarcade_handler',func:'delscores'},function(data){jQuery('#score_response').html(data);});
            }
          }
          /* ]]> */
        </script>

        <h2 class="trigger"><?php _e("Advanced Features", 'myarcadeplugin'); ?></h2>
        <div class="toggle_container" id="advanced_settings">
          <div class="block">
            <table class="optiontable" width="100%">
              <tr>
                <td colspan="3">
                  <p class="mabp_error" style="padding:10px">
                    <?php _e("Please, use this only if you know what you do!", 'myarcadeplugin'); ?>
                  </p>
                  <br />
                </td>
              </tr>

              <tr><td colspan="3"><h3><?php _e("Delete All Feeded Games", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td width="160">
                  <div class="button-secondary" style="float:left;text-align:center;" onclick="return confirmDeleteGames();">
                    <?php _e("Reset Feeded Games", 'myarcadeplugin'); ?>
                  </div>
                </td>
                <td width="30"><div id="del_response"></div></td>
                <td><i><?php _e("Attention! All feeded or imported games will be deleted from the games database! Published posts will not be touched. After this score submitting of publiished games will stop working!", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="3"><h3><?php _e("Remove Games Marked as 'deleted'", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td>
                  <div class="button-secondary" style="float:left;text-align:center;" onclick="jQuery('#remove_response').html('<div class=\'gload\'> </div>');jQuery.post('<?php echo admin_url('admin-ajax.php'); ?>', {action:'myarcade_handler',func:'remgames'},function(data){jQuery('#remove_response').html(data);});">
                    <?php _e("Remove 'deleted' Games", 'myarcadeplugin'); ?>
                  </div>
                </td>
                <td width="30"><div id="remove_response"></div></td>
                <td><i><?php _e("Attention! All games marked as 'deleted' will be removed from the database!", 'myarcadeplugin'); ?></i></td>
              </tr>


              <tr><td colspan="3"><h3><?php _e("Delete Blank / Zero Scores", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td>
                  <div class="button-secondary" style="float:left;text-align:center;" onclick="jQuery('#zero_response').html('<div class=\'gload\'> </div>');jQuery.post('<?php echo admin_url('admin-ajax.php'); ?>', {action:'myarcade_handler',func:'zeroscores'},function(data){jQuery('#zero_response').html(data);});">
                    <?php _e("Delete Zero Scores", 'myarcadeplugin'); ?>
                  </div>
                </td>
                <td width="30"><div id="zero_response"></div></td>
                <td><i><?php _e("Clean your scores table. This will delete all zero and empty scores if present in your database.", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="3"><h3><?php _e("Delete All Scores", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td>
                  <div class="button-secondary" style="float:left;text-align:center;" onclick="return confirmDeleteScores();">
                    <?php _e("Delete All Scores", 'myarcadeplugin'); ?>
                  </div>
                </td>
                <td width="30"><div id="score_response"></div></td>
                <td><i><?php _e("Attention! All saved scores will be deleted!", 'myarcadeplugin'); ?></i></td>
              </tr>

              <tr><td colspan="3"><h3><?php _e("Load Default Settings", 'myarcadeplugin'); ?></h3></td></tr>

              <tr>
                <td colspan="3">
                  <p class="mabp_info" style="padding:10px"><?php _e("Attention! All setting will be reset!", 'myarcadeplugin'); ?></p>
                  <form method="post" name="defaultsettings">
                    <input type="hidden" name="loaddefaults" id="loaddefaults" value="yes" />
                    <input type="checkbox" name="checkdefaults" id="checkdefaults" value="yes" /> Yes, I want to load default settings <input id="submitdefaults" type="submit" name="submitdefaults" class="button-secondary" value="<?php _e("Load Default Settings", 'myarcadeplugin'); ?>" disabled />
                  </form>
                  <script type="text/javascript">
                    /* <![CDATA[ */
                    jQuery("#checkdefaults").click(function() {;
                      var checked_status = this.checked;
                      if (checked_status === true) {
                        jQuery("#submitdefaults").removeAttr("disabled");
                      } else {
                        jQuery("#submitdefaults").attr("disabled", "disabled");
                      }
                    });
                    /* ]]> */
                  </script>
                  <br />
                </td>
              </tr>

            </table>
          </div>
        </div>

        <?php
 ?>
        <div class="clear"></div>
        <hr />
        <h2><?php _e("Game Feeds", 'myarcadeplugin'); ?> <span style="float:right;font-size:16px;"><i><?php _e("ordered alphabetically", 'myarcadeplugin'); ?></i></span></h2>
        <hr />

        <?php
 foreach ($REC43CE978463AAD8D91F93AE43393035 as $RF413F06AEBBCEF5E1C8B1019DEE6FE6B => $R9B395079675C6A66FF23EA9C6C4A668E) { $R5E6FE112139EF7B1AECB79A8F083BB6A = MYARCADE_CORE_DIR . '/feeds/' . $RF413F06AEBBCEF5E1C8B1019DEE6FE6B . '.php'; if ( file_exists( $R5E6FE112139EF7B1AECB79A8F083BB6A ) ) { include_once( $R5E6FE112139EF7B1AECB79A8F083BB6A ); $R334477AA3842871C0ABDBA0571193B9C = 'myarcade_settings_' . $RF413F06AEBBCEF5E1C8B1019DEE6FE6B; if ( function_exists( $R334477AA3842871C0ABDBA0571193B9C ) ) { $R334477AA3842871C0ABDBA0571193B9C(); } } } ?>
      </form>

      <div style="clear:both"></div>
    </div><?php ?>

   <div class="clear"></div>
  <?php
 F011F5FA6950FDD84A7242122BC8934C3(); } function F6C859752FABC3A7D40F7C4B7B8871E49( $R30E38C1F8EC85F8EE8DF620FF3267157 ) { if ( ! is_array( $R30E38C1F8EC85F8EE8DF620FF3267157 ) ) { echo '<p class="mabp_error mabp_800">'.__("Can't create categories - Category array expected!", 'myarcadeplugin').'</p>'; return; } $general = get_option( 'myarcade_general' ); if ( $general['post_type'] == 'post' ) { foreach ($R30E38C1F8EC85F8EE8DF620FF3267157 as $RF413F06AEBBCEF5E1C8B1019DEE6FE6B => $R9B395079675C6A66FF23EA9C6C4A668E ) { $RA1ED191365ABDD5CF62F138014E57648 = get_cat_ID( htmlspecialchars( $R9B395079675C6A66FF23EA9C6C4A668E ) ); if ( 0 == $RA1ED191365ABDD5CF62F138014E57648 ) { $R9FE302BDF914868081913A22F58F9E7E = array( 'cat_name' => $R9B395079675C6A66FF23EA9C6C4A668E, 'category_description' => $R9B395079675C6A66FF23EA9C6C4A668E, 'category_nicename' => F64A2F46BC8BAFD9163DD9691D1207278( $R9B395079675C6A66FF23EA9C6C4A668E ), 'category_parent' => $general['parent'] ); if ( ! wp_insert_category( $R9FE302BDF914868081913A22F58F9E7E ) ) { echo '<p class="mabp_error mabp_800">'.__("Failed to create category:", 'myarcadeplugin').' '. $R9B395079675C6A66FF23EA9C6C4A668E .'</p>'; } } } } else { if ( post_type_exists( $general['post_type'] ) ) { if ( !empty($general['custom_category']) && taxonomy_exists($general['custom_category']) ) { foreach ($R30E38C1F8EC85F8EE8DF620FF3267157 as $RF413F06AEBBCEF5E1C8B1019DEE6FE6B => $R9B395079675C6A66FF23EA9C6C4A668E ) { if ( !term_exists( $R9B395079675C6A66FF23EA9C6C4A668E, $general['custom_category'] ) ) { $R679E9B9234E2062F809DBD3325D37FB6 = wp_insert_term ( $R9B395079675C6A66FF23EA9C6C4A668E, $general['custom_category'], array( 'description' => $R9B395079675C6A66FF23EA9C6C4A668E, 'slug' => F64A2F46BC8BAFD9163DD9691D1207278( $R9B395079675C6A66FF23EA9C6C4A668E ) ) ); if ( is_wp_error($R679E9B9234E2062F809DBD3325D37FB6) ) { echo '<p class="mabp_error mabp_800">'.__("Failed to create category:", 'myarcadeplugin').' '.$R679E9B9234E2062F809DBD3325D37FB6->get_error_message().'</p>'; } } } } } } } function F01D4DD4C5E7F19A8253A2864C8BE80B2() { global $REC43CE978463AAD8D91F93AE43393035; if ( empty( $REC43CE978463AAD8D91F93AE43393035 ) ) { F37B1431F3599F78EC98D890FF267815A(); } $R8D6A89D40D59751D209066A66D7BB121 = MYARCADE_CORE_DIR.'/settings.php'; if ( file_exists($R8D6A89D40D59751D209066A66D7BB121) ) { @include_once($R8D6A89D40D59751D209066A66D7BB121); } else { wp_die('Required configuration file not found!', 'Error: MyArcadePlugin Activation'); } update_option('myarcade_general', $myarcade_general_default); foreach ( $REC43CE978463AAD8D91F93AE43393035 as $RF413F06AEBBCEF5E1C8B1019DEE6FE6B => $R9B395079675C6A66FF23EA9C6C4A668E ) { $R2270061514E6C604AA8840BF43DE0656 = 'myarcade_' . $RF413F06AEBBCEF5E1C8B1019DEE6FE6B . '_default'; if ( ! empty( $$R2270061514E6C604AA8840BF43DE0656 ) ) { update_option( 'myarcade_' . $RF413F06AEBBCEF5E1C8B1019DEE6FE6B, $$R2270061514E6C604AA8840BF43DE0656 ); } } $RD05DABE6557F5FF2AEDC5F85F9416CD5 = MYARCADE_CORE_DIR.'/feedcats.php'; if ( file_exists($RD05DABE6557F5FF2AEDC5F85F9416CD5) ) { @include_once($RD05DABE6557F5FF2AEDC5F85F9416CD5); } else { wp_die('Required configuration file not found!', 'Error: MyArcadePlugin Activation'); } update_option('myarcade_categories', $R281A0F7BC3D849F3386A5AC36FB35807); } ?>