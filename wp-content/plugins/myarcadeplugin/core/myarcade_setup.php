<?php
 if( !defined( 'ABSPATH' ) ) { die(); } function F8A0E7CC1D9F5AA5E4EA9485D1E8C34EC() { global $wpdb, $wp_version; $R60271EA909F79D6F27D857A9DEFC17C9 = ''; if ( ! empty( $wpdb->charset ) ) { $R60271EA909F79D6F27D857A9DEFC17C9 = "DEFAULT CHARACTER SET {$wpdb->charset}"; } if ( ! empty( $wpdb->collate ) ) { $R60271EA909F79D6F27D857A9DEFC17C9 .= " COLLATE {$wpdb->collate}"; } if ($wpdb->get_var("show tables like '".$wpdb->prefix . 'myarcadegames'."'") != $wpdb->prefix . 'myarcadegames') { $R130D64A4AD653C91E0FD80DE8FEADC3A = "CREATE TABLE `".$wpdb->prefix . 'myarcadegames'."` (
      `id` int(11) NOT NULL auto_increment,
      `postid` int(11) DEFAULT NULL,
      `uuid` text collate utf8_unicode_ci NOT NULL,
      `game_tag` text collate utf8_unicode_ci NOT NULL,
      `game_type` text collate utf8_unicode_ci NOT NULL,
      `name` text collate utf8_unicode_ci NOT NULL,
      `slug` text collate utf8_unicode_ci NOT NULL,
      `categories` text collate utf8_unicode_ci NOT NULL,
      `description` text collate utf8_unicode_ci NOT NULL,
      `tags` text collate utf8_unicode_ci NOT NULL,
      `instructions` text collate utf8_unicode_ci NOT NULL,
      `controls` text collate utf8_unicode_ci NOT NULL,
      `rating` text collate utf8_unicode_ci NOT NULL,
      `height` text collate utf8_unicode_ci NOT NULL,
      `width` text collate utf8_unicode_ci NOT NULL,
      `thumbnail_url` text collate utf8_unicode_ci NOT NULL,
      `swf_url` text collate utf8_unicode_ci NOT NULL,
      `screen1_url` text collate utf8_unicode_ci NOT NULL,
      `screen2_url` text collate utf8_unicode_ci NOT NULL,
      `screen3_url` text collate utf8_unicode_ci NOT NULL,
      `screen4_url` text collate utf8_unicode_ci NOT NULL,
      `video_url`   text collate utf8_unicode_ci NOT NULL,
      `created` text collate utf8_unicode_ci NOT NULL,
      `leaderboard_enabled` text collate utf8_unicode_ci NOT NULL,
      `highscore_type` text collate utf8_unicode_ci NOT NULL,
      `score_bridge` text collate utf8_unicode_ci NOT NULL,
      `coins_enabled` text collate utf8_unicode_ci NOT NULL,
      `status` text collate utf8_unicode_ci NOT NULL,
      PRIMARY KEY  (`id`)
    ) $R60271EA909F79D6F27D857A9DEFC17C9;"; require_once(ABSPATH . 'wp-admin/includes/upgrade.php'); dbDelta($R130D64A4AD653C91E0FD80DE8FEADC3A); } F2B8818E588F4A73892A94D912C277E5E(); $RD05DABE6557F5FF2AEDC5F85F9416CD5 = MYARCADE_CORE_DIR.'/feedcats.php'; if ( file_exists($RD05DABE6557F5FF2AEDC5F85F9416CD5) ) { include($RD05DABE6557F5FF2AEDC5F85F9416CD5); } else { wp_die('Required configuration file not found!', 'Error: MyArcadePlugin Activation'); } $R8D6A89D40D59751D209066A66D7BB121 = MYARCADE_CORE_DIR.'/settings.php'; if ( file_exists($R8D6A89D40D59751D209066A66D7BB121) ) { include($R8D6A89D40D59751D209066A66D7BB121); } else { wp_die('Required configuration file not found!', 'Error: MyArcadePlugin Activation'); } $R64891F191F6F5BF4025A5A9DB67337BC = get_option('myarcade_general'); if ( !$R64891F191F6F5BF4025A5A9DB67337BC ) { update_option('myarcade_general', $myarcade_general_default); } else { foreach ($myarcade_general_default as $R74033BC8AFD82040237343A8760588D3 => $R244F38266C59587D696AEC08A771B803) { if ( !array_key_exists($R74033BC8AFD82040237343A8760588D3, $R64891F191F6F5BF4025A5A9DB67337BC) ) { $R64891F191F6F5BF4025A5A9DB67337BC[$R74033BC8AFD82040237343A8760588D3] = $R244F38266C59587D696AEC08A771B803; } } update_option('myarcade_general', $R64891F191F6F5BF4025A5A9DB67337BC); } F4388D7B582F93C9E1FB920275FC092A0(); $R32F144AFDE1C2D9946787129495E372C = get_option('myarcade_categories'); if ( empty($R32F144AFDE1C2D9946787129495E372C) ) { add_option('myarcade_categories', $R281A0F7BC3D849F3386A5AC36FB35807, '', 'no'); } else { for ($RA16D2280393CE6A2A5428A4A8D09E354 = 0; $RA16D2280393CE6A2A5428A4A8D09E354 < count($R281A0F7BC3D849F3386A5AC36FB35807); $RA16D2280393CE6A2A5428A4A8D09E354++) { foreach ($R32F144AFDE1C2D9946787129495E372C as $R8A7822B830629CCF69F8B1964209329E) { if ($R8A7822B830629CCF69F8B1964209329E['Name'] == $R281A0F7BC3D849F3386A5AC36FB35807[$RA16D2280393CE6A2A5428A4A8D09E354]['Name']) { $R281A0F7BC3D849F3386A5AC36FB35807[$RA16D2280393CE6A2A5428A4A8D09E354]['Status'] = $R8A7822B830629CCF69F8B1964209329E['Status']; $R281A0F7BC3D849F3386A5AC36FB35807[$RA16D2280393CE6A2A5428A4A8D09E354]['Mapping'] = $R8A7822B830629CCF69F8B1964209329E['Mapping']; break; } } } update_option('myarcade_categories', $R281A0F7BC3D849F3386A5AC36FB35807); } if ( !get_option('myarcade_version') ) { if ($wpdb->get_var("show tables like '" . $wpdb->prefix . 'myarcadesettings' . "'") == $wpdb->prefix . 'myarcadesettings') { $R9A08D75ECD01C7EB191D32FF28E7B1D7 = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . 'myarcadesettings'); $R64891F191F6F5BF4025A5A9DB67337BC = get_option('myarcade_general'); if ($R9A08D75ECD01C7EB191D32FF28E7B1D7->leaderboard_active == 'Yes') { $R64891F191F6F5BF4025A5A9DB67337BC['scores'] = true; } else { $R64891F191F6F5BF4025A5A9DB67337BC['scores'] = false; } if ($R9A08D75ECD01C7EB191D32FF28E7B1D7->onlyhighscores == 'Yes') { $R64891F191F6F5BF4025A5A9DB67337BC['highscores'] = true; } else { $R64891F191F6F5BF4025A5A9DB67337BC['highscores'] = false; } $R64891F191F6F5BF4025A5A9DB67337BC['posts'] = intval($R9A08D75ECD01C7EB191D32FF28E7B1D7->publish_games); if ($R9A08D75ECD01C7EB191D32FF28E7B1D7->publish_status == 'scheduled') $R9A08D75ECD01C7EB191D32FF28E7B1D7->publish_status = 'future'; $R64891F191F6F5BF4025A5A9DB67337BC['status'] = $R9A08D75ECD01C7EB191D32FF28E7B1D7->publish_status; $R64891F191F6F5BF4025A5A9DB67337BC['schedule'] = $R9A08D75ECD01C7EB191D32FF28E7B1D7->cron_interval; if ($R9A08D75ECD01C7EB191D32FF28E7B1D7->download_thumbs == 'Yes') { $R64891F191F6F5BF4025A5A9DB67337BC['down_thumbs'] = true; } else { $R64891F191F6F5BF4025A5A9DB67337BC['down_thumbs'] = false; } if ($R9A08D75ECD01C7EB191D32FF28E7B1D7->download_games == 'Yes') { $R64891F191F6F5BF4025A5A9DB67337BC['down_games'] = true; } else { $R64891F191F6F5BF4025A5A9DB67337BC['down_games'] = false; } if ($R9A08D75ECD01C7EB191D32FF28E7B1D7->download_screens == 'Yes') { $R64891F191F6F5BF4025A5A9DB67337BC['down_screens'] = true; } else { $R64891F191F6F5BF4025A5A9DB67337BC['down_screens'] = false; } if ($R9A08D75ECD01C7EB191D32FF28E7B1D7->delete_files == 'Yes') { $R64891F191F6F5BF4025A5A9DB67337BC['delete'] = true; } else { $R64891F191F6F5BF4025A5A9DB67337BC['delete'] = false; } if ($R9A08D75ECD01C7EB191D32FF28E7B1D7->create_categories == 'Yes') { $R64891F191F6F5BF4025A5A9DB67337BC['create_cats'] = true; } else { $R64891F191F6F5BF4025A5A9DB67337BC['create_cats'] = false; } if ($R9A08D75ECD01C7EB191D32FF28E7B1D7->first_cat == 'Yes') { $R64891F191F6F5BF4025A5A9DB67337BC['firstcat'] = true; } else { $R64891F191F6F5BF4025A5A9DB67337BC['firstcat'] = false; } $R64891F191F6F5BF4025A5A9DB67337BC['interval'] = intval($R9A08D75ECD01C7EB191D32FF28E7B1D7->schedule); $R64891F191F6F5BF4025A5A9DB67337BC['parent'] = $R9A08D75ECD01C7EB191D32FF28E7B1D7->parent_category; if ($R9A08D75ECD01C7EB191D32FF28E7B1D7->single_publish == 'Yes') { $R64891F191F6F5BF4025A5A9DB67337BC['single'] = true; } else { $R64891F191F6F5BF4025A5A9DB67337BC['single'] = false; } $R64891F191F6F5BF4025A5A9DB67337BC['singlecat'] = intval($R9A08D75ECD01C7EB191D32FF28E7B1D7->single_catid); $R64891F191F6F5BF4025A5A9DB67337BC['max_width'] = intval($R9A08D75ECD01C7EB191D32FF28E7B1D7->maxwidth); $R64891F191F6F5BF4025A5A9DB67337BC['embed'] = $R9A08D75ECD01C7EB191D32FF28E7B1D7->embed_flashcode; $R64891F191F6F5BF4025A5A9DB67337BC['template'] = $R9A08D75ECD01C7EB191D32FF28E7B1D7->template; if ($R9A08D75ECD01C7EB191D32FF28E7B1D7->use_template == 'Yes') { $R64891F191F6F5BF4025A5A9DB67337BC['use_template'] = true; } else { $R64891F191F6F5BF4025A5A9DB67337BC['use_template'] = false; } if ($R9A08D75ECD01C7EB191D32FF28E7B1D7->allow_user_post == 'Yes') { $R64891F191F6F5BF4025A5A9DB67337BC['allow_user'] = true; } else { $R64891F191F6F5BF4025A5A9DB67337BC['allow_user'] = false; } update_option('myarcade_general', $R64891F191F6F5BF4025A5A9DB67337BC); $R605FD1A926638084980B44F86FAE658F = unserialize($R9A08D75ECD01C7EB191D32FF28E7B1D7->game_categories); $R281A0F7BC3D849F3386A5AC36FB35807 = get_option('myarcade_categories'); for ($RA16D2280393CE6A2A5428A4A8D09E354 = 0; $RA16D2280393CE6A2A5428A4A8D09E354 < count($R281A0F7BC3D849F3386A5AC36FB35807); $RA16D2280393CE6A2A5428A4A8D09E354++) { foreach ($R605FD1A926638084980B44F86FAE658F as $R8A7822B830629CCF69F8B1964209329E) { if ($R8A7822B830629CCF69F8B1964209329E['Name'] == $R281A0F7BC3D849F3386A5AC36FB35807[$RA16D2280393CE6A2A5428A4A8D09E354]['Name']) { $R281A0F7BC3D849F3386A5AC36FB35807[$RA16D2280393CE6A2A5428A4A8D09E354]['Status'] = $R8A7822B830629CCF69F8B1964209329E['Status']; $R281A0F7BC3D849F3386A5AC36FB35807[$RA16D2280393CE6A2A5428A4A8D09E354]['Mapping'] = $R8A7822B830629CCF69F8B1964209329E['Mapping']; break; } } } update_option('myarcade_categories', $R281A0F7BC3D849F3386A5AC36FB35807); $wpdb->query("DROP TABLE ".$wpdb->prefix . 'myarcadesettings'); } update_option('myarcade_version', MYARCADE_VERSION); } else { if ( get_option('myarcade_version') != MYARCADE_VERSION ) { set_transient('myarcade_settings_update_notice', true, 60*60*24*30 ); } update_option('myarcade_version', MYARCADE_VERSION); } $RB0B67211D8336990FD66EAF68E92E9BA = str_rot13('onfr'.hexdec('0x40').'_qrpbqr'); $R6E7833E61EC16ED451B20A8F2746896A = F8D7A841BE2BAF925673E60D5753C8806(); if ( !$R6E7833E61EC16ED451B20A8F2746896A ) { $R0F660BA50FF56C7D3AB8376004721F9C = 'update_option'; if ( F0481A4A1CC6096D41DE35B46DE0FBDEE() ) { $R0F660BA50FF56C7D3AB8376004721F9C = 'update_site_option'; } $R0F660BA50FF56C7D3AB8376004721F9C($RB0B67211D8336990FD66EAF68E92E9BA('bXlhcmNhZGVfc2NobHVlc3NlbA=='), ''); $R0F660BA50FF56C7D3AB8376004721F9C($RB0B67211D8336990FD66EAF68E92E9BA('bXlhcmNhZGVfcHJ1ZWY='), ''); $R0F660BA50FF56C7D3AB8376004721F9C($RB0B67211D8336990FD66EAF68E92E9BA('bXlhcmNhZGVfaGFzaA=='), ''); $R0F660BA50FF56C7D3AB8376004721F9C($RB0B67211D8336990FD66EAF68E92E9BA('bXlhcmNhZGVfc3RhdHVz'), 0); } F8542AAF0D3268622D5F94C1CF5F546EC(); if ($wpdb->get_var("show tables like '".$wpdb->prefix.'myarcadescores'."'") != $wpdb->prefix.'myarcadescores') { $R130D64A4AD653C91E0FD80DE8FEADC3A = "CREATE TABLE `".$wpdb->prefix.'myarcadescores'."` (
      `id`        int(11) NOT NULL auto_increment,
      `session`   text collate utf8_unicode_ci NOT NULL,
      `date`      text collate utf8_unicode_ci NOT NULL,
      `datatype`  text collate utf8_unicode_ci NOT NULL,
      `game_tag`  text collate utf8_unicode_ci NOT NULL,
      `user_id`   text collate utf8_unicode_ci NOT NULL,
      `score`     text collate utf8_unicode_ci NOT NULL,
      `sortorder` text collate utf8_unicode_ci NOT NULL,
      PRIMARY KEY  (`id`)
    ) $R60271EA909F79D6F27D857A9DEFC17C9;"; require_once(ABSPATH . 'wp-admin/includes/upgrade.php'); dbDelta($R130D64A4AD653C91E0FD80DE8FEADC3A); } else { FB4C2F078A975F7CA10A87806F0BE9A81(); } if ($wpdb->get_var("show tables like '".$wpdb->prefix.'myarcadehighscores'."'") != $wpdb->prefix.'myarcadehighscores') { $R130D64A4AD653C91E0FD80DE8FEADC3A = "CREATE TABLE `".$wpdb->prefix.'myarcadehighscores'."` (
      `id`        INT(11) NOT NULL auto_increment,
      `game_tag`  text collate utf8_unicode_ci NOT NULL,
      `user_id`   text collate utf8_unicode_ci NOT NULL,
      `score`     text collate utf8_unicode_ci NOT NULL,
      PRIMARY KEY  (`id`)
    ) $R60271EA909F79D6F27D857A9DEFC17C9;"; require_once(ABSPATH . 'wp-admin/includes/upgrade.php'); dbDelta($R130D64A4AD653C91E0FD80DE8FEADC3A); } if ($wpdb->get_var("show tables like '".$wpdb->prefix.'myarcademedals'."'") != $wpdb->prefix.'myarcademedals') { $R130D64A4AD653C91E0FD80DE8FEADC3A = "CREATE TABLE `".$wpdb->prefix.'myarcademedals'."` (
      `id`          int(11) NOT NULL auto_increment,
      `date`        text collate utf8_unicode_ci NOT NULL,
      `game_tag`    text collate utf8_unicode_ci NOT NULL,
      `user_id`     text collate utf8_unicode_ci NOT NULL,
      `score`       text collate utf8_unicode_ci NOT NULL,
      `name`        text collate utf8_unicode_ci NOT NULL,
      `description` text collate utf8_unicode_ci NOT NULL,
      `thumbnail`   text collate utf8_unicode_ci NOT NULL,
      PRIMARY KEY  (`id`)
    ) $R60271EA909F79D6F27D857A9DEFC17C9;"; require_once(ABSPATH . 'wp-admin/includes/upgrade.php'); dbDelta($R130D64A4AD653C91E0FD80DE8FEADC3A); } if ($wpdb->get_var("show tables like '".$wpdb->prefix.'myarcadeuser'."'") != $wpdb->prefix.'myarcadeuser') { $R130D64A4AD653C91E0FD80DE8FEADC3A = "CREATE TABLE `".$wpdb->prefix.'myarcadeuser'."` (
      `id`          int(11) NOT NULL auto_increment,
      `user_id`     int(11) NOT NULL,
      `points`      int(11) NOT NULL DEFAULT '0',
      `plays`       int(11) NOT NULL DEFAULT '0',
      PRIMARY KEY  (`id`)
    ) $R60271EA909F79D6F27D857A9DEFC17C9;"; require_once(ABSPATH . 'wp-admin/includes/upgrade.php'); dbDelta($R130D64A4AD653C91E0FD80DE8FEADC3A); } $general = get_option('myarcade_general'); if ( $general['automated_fetching'] ) { wp_clear_scheduled_hook('cron_fetching'); wp_schedule_event( time(), $general['interval_fetching'], 'cron_fetching' ); } else { wp_clear_scheduled_hook('cron_fetching'); } if ( $general['automated_publishing'] ) { wp_clear_scheduled_hook('cron_publishing'); wp_schedule_event( time(), $general['interval_publishing'], 'cron_publishing' ); } else { wp_clear_scheduled_hook('cron_publishing'); } if (wp_next_scheduled('myarcade_t')) { wp_clear_scheduled_hook('myarcade_t'); } if (!wp_next_scheduled('myarcade_w')) { wp_schedule_event( time(), 'weekly', 'myarcade_w' ); } F15B6F4B0533CF5E0D6BF410480E7DC7B(); } function F2B8818E588F4A73892A94D912C277E5E() { global $wpdb; $RD36347DD9375300BDD307EF79243C9E4 = $wpdb->get_col("SHOW COLUMNS FROM ".$wpdb->prefix . 'myarcadegames'); if (!in_array('rating', $RD36347DD9375300BDD307EF79243C9E4)) { $wpdb->query("
      ALTER TABLE `".$wpdb->prefix . 'myarcadegames'."`
      ADD `rating` text collate utf8_unicode_ci NOT NULL
      AFTER `controls`
    "); } if (!in_array('game_tag', $RD36347DD9375300BDD307EF79243C9E4)) { $wpdb->query("
      ALTER TABLE `".$wpdb->prefix . 'myarcadegames'."`
      ADD `game_tag` text collate utf8_unicode_ci NOT NULL
      AFTER `uuid`
    "); } $RD36347DD9375300BDD307EF79243C9E4 = $wpdb->get_col("SHOW COLUMNS FROM ".$wpdb->prefix . 'myarcadegames'); if (!in_array('postid', $RD36347DD9375300BDD307EF79243C9E4)) { $wpdb->query("
      ALTER TABLE `".$wpdb->prefix . 'myarcadegames'."`
      ADD `postid` text collate utf8_unicode_ci NOT NULL
      AFTER `id`
    "); } if (!in_array('screen1_url', $RD36347DD9375300BDD307EF79243C9E4)) { $wpdb->query("
      ALTER TABLE `".$wpdb->prefix . 'myarcadegames'."`
      ADD `screen1_url` text collate utf8_unicode_ci NOT NULL
      AFTER `swf_url`
    "); } if (!in_array('screen2_url', $RD36347DD9375300BDD307EF79243C9E4)) { $wpdb->query("
      ALTER TABLE `".$wpdb->prefix . 'myarcadegames'."`
      ADD `screen2_url` text collate utf8_unicode_ci NOT NULL
      AFTER `screen1_url`
    "); } if (!in_array('screen3_url', $RD36347DD9375300BDD307EF79243C9E4)) { $wpdb->query("
      ALTER TABLE `".$wpdb->prefix . 'myarcadegames'."`
      ADD `screen3_url` text collate utf8_unicode_ci NOT NULL
      AFTER `screen2_url`
    "); } if (!in_array('screen4_url', $RD36347DD9375300BDD307EF79243C9E4)) { $wpdb->query("
      ALTER TABLE `".$wpdb->prefix . 'myarcadegames'."`
      ADD `screen4_url` text collate utf8_unicode_ci NOT NULL
      AFTER `screen3_url`
    "); } if (!in_array('coins_enabled', $RD36347DD9375300BDD307EF79243C9E4)) { $wpdb->query("
      ALTER TABLE `".$wpdb->prefix . 'myarcadegames'."`
      ADD `coins_enabled` text collate utf8_unicode_ci NOT NULL
      AFTER `leaderboard_enabled`
    "); } $RD36347DD9375300BDD307EF79243C9E4 = $wpdb->get_col("SHOW COLUMNS FROM ".$wpdb->prefix . 'myarcadegames'); if (!in_array('game_type', $RD36347DD9375300BDD307EF79243C9E4)) { $wpdb->query("
      ALTER TABLE `".$wpdb->prefix . 'myarcadegames'."`
      ADD `game_type` text collate utf8_unicode_ci NOT NULL
      AFTER `game_tag`
    "); } $RD36347DD9375300BDD307EF79243C9E4 = $wpdb->get_col("SHOW COLUMNS FROM ".$wpdb->prefix . 'myarcadegames'); if (!in_array('video_url', $RD36347DD9375300BDD307EF79243C9E4)) { $wpdb->query("
      ALTER TABLE `".$wpdb->prefix . 'myarcadegames'."`
      ADD `video_url` text collate utf8_unicode_ci NOT NULL
      AFTER `screen4_url`
    "); } if (!in_array('highscore_type', $RD36347DD9375300BDD307EF79243C9E4)) { $wpdb->query("
      ALTER TABLE `".$wpdb->prefix . 'myarcadegames'."`
      ADD `highscore_type` text collate utf8_unicode_ci NOT NULL
      AFTER `leaderboard_enabled`
    "); } $wpdb->query("ALTER TABLE `".$wpdb->prefix . 'myarcadegames'."` CHANGE  `postid`  `postid` INT( 11 )"); if (!in_array('score_bridge', $RD36347DD9375300BDD307EF79243C9E4)) { $wpdb->query("
      ALTER TABLE `".$wpdb->prefix . 'myarcadegames'."`
      ADD `score_bridge` text collate utf8_unicode_ci NOT NULL
      AFTER `highscore_type`
    "); } } function FB4C2F078A975F7CA10A87806F0BE9A81() { global $wpdb; $RD6A9EFE5873349FE189DB20AC444CC66 = $wpdb->get_col("SHOW COLUMNS FROM ".$wpdb->prefix.'myarcadescores'); if (!in_array('session', $RD6A9EFE5873349FE189DB20AC444CC66)) { $wpdb->query("
      ALTER TABLE `".$wpdb->prefix.'myarcadescores'."`
      ADD `session` text collate utf8_unicode_ci NOT NULL
      AFTER `id`
    "); } if (!in_array('sortorder', $RD6A9EFE5873349FE189DB20AC444CC66)) { $wpdb->query("
      ALTER TABLE `".$wpdb->prefix.'myarcadescores'."`
      ADD `sortorder` text collate utf8_unicode_ci NOT NULL
      AFTER `score`
    "); } } function F8542AAF0D3268622D5F94C1CF5F546EC() { global $wpdb; $wpdb->query("UPDATE $wpdb->postmeta SET meta_key = 'mabp_description'  WHERE meta_key = 'description'"); $wpdb->query("UPDATE $wpdb->postmeta SET meta_key = 'mabp_instructions' WHERE meta_key = 'instructions'"); $wpdb->query("UPDATE $wpdb->postmeta SET meta_key = 'mabp_height'       WHERE meta_key = 'height'"); $wpdb->query("UPDATE $wpdb->postmeta SET meta_key = 'mabp_width'        WHERE meta_key = 'width'"); $wpdb->query("UPDATE $wpdb->postmeta SET meta_key = 'mabp_swf_url'      WHERE meta_key = 'swf_url'"); $wpdb->query("UPDATE $wpdb->postmeta SET meta_key = 'mabp_thumbnail_url' WHERE meta_key = 'thumbnail_url'"); $wpdb->query("UPDATE $wpdb->postmeta SET meta_key = 'mabp_rating'       WHERE meta_key = 'rating'"); $wpdb->query("UPDATE $wpdb->postmeta SET meta_key = 'mabp_screen1_url'  WHERE meta_key = 'screen1_url'"); $wpdb->query("UPDATE $wpdb->postmeta SET meta_key = 'mabp_screen2_url'  WHERE meta_key = 'screen2_url'"); $wpdb->query("UPDATE $wpdb->postmeta SET meta_key = 'mabp_screen3_url'  WHERE meta_key = 'screen3_url'"); $wpdb->query("UPDATE $wpdb->postmeta SET meta_key = 'mabp_screen4_url'  WHERE meta_key = 'screen4_url'"); } function FDCE52887C77EDEE36FC8219AE7156AEA() { global $wpdb; include_once 'feedcats.php'; $R9A08D75ECD01C7EB191D32FF28E7B1D7 = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . 'myarcadesettings'); $R605FD1A926638084980B44F86FAE658F = unserialize($R9A08D75ECD01C7EB191D32FF28E7B1D7->game_categories); for ($RA16D2280393CE6A2A5428A4A8D09E354 = 0; $RA16D2280393CE6A2A5428A4A8D09E354 < count($R281A0F7BC3D849F3386A5AC36FB35807); $RA16D2280393CE6A2A5428A4A8D09E354++) { foreach ($R605FD1A926638084980B44F86FAE658F as $R8A7822B830629CCF69F8B1964209329E) { if ($R8A7822B830629CCF69F8B1964209329E['Name'] == $R281A0F7BC3D849F3386A5AC36FB35807[$RA16D2280393CE6A2A5428A4A8D09E354]['Name']) { $R281A0F7BC3D849F3386A5AC36FB35807[$RA16D2280393CE6A2A5428A4A8D09E354]['Status'] = $R8A7822B830629CCF69F8B1964209329E['Status']; $R281A0F7BC3D849F3386A5AC36FB35807[$RA16D2280393CE6A2A5428A4A8D09E354]['Mapping'] = $R8A7822B830629CCF69F8B1964209329E['Mapping']; break; } } } $R58E993B12A1927F4D9D8AE1FC7A6EA82 = serialize($R281A0F7BC3D849F3386A5AC36FB35807); $wpdb->query("UPDATE ".$wpdb->prefix . 'myarcadesettings'." SET game_categories = '".$R58E993B12A1927F4D9D8AE1FC7A6EA82."'"); } function F4388D7B582F93C9E1FB920275FC092A0() { global $REC43CE978463AAD8D91F93AE43393035; if ( empty( $REC43CE978463AAD8D91F93AE43393035 ) ) { F37B1431F3599F78EC98D890FF267815A(); } $R8D6A89D40D59751D209066A66D7BB121 = MYARCADE_CORE_DIR.'/settings.php'; if ( file_exists( $R8D6A89D40D59751D209066A66D7BB121 ) ) { include( $R8D6A89D40D59751D209066A66D7BB121 ); } else { wp_die('Required configuration file not found!', 'Error: MyArcadePlugin Activation'); } foreach ($REC43CE978463AAD8D91F93AE43393035 as $RF413F06AEBBCEF5E1C8B1019DEE6FE6B => $R9B395079675C6A66FF23EA9C6C4A668E) { $R2270061514E6C604AA8840BF43DE0656 = 'myarcade_' . $RF413F06AEBBCEF5E1C8B1019DEE6FE6B . '_default'; if ( isset( $$R2270061514E6C604AA8840BF43DE0656 ) && ! empty( $$R2270061514E6C604AA8840BF43DE0656 ) ) { $R8D6A89D40D59751D209066A66D7BB121 = $$R2270061514E6C604AA8840BF43DE0656; $RBAF021A7FD7734AE78ECDD24D3CFD580 = get_option( 'myarcade_' . $RF413F06AEBBCEF5E1C8B1019DEE6FE6B ); if ( ! $RBAF021A7FD7734AE78ECDD24D3CFD580 ) { add_option( 'myarcade_' . $RF413F06AEBBCEF5E1C8B1019DEE6FE6B, $$R2270061514E6C604AA8840BF43DE0656, '', 'no' ); } else { foreach ( $R8D6A89D40D59751D209066A66D7BB121 as $R74033BC8AFD82040237343A8760588D3 => $R244F38266C59587D696AEC08A771B803 ) { if ( ! array_key_exists( $R74033BC8AFD82040237343A8760588D3, $RBAF021A7FD7734AE78ECDD24D3CFD580 ) ) { $RBAF021A7FD7734AE78ECDD24D3CFD580[ $R74033BC8AFD82040237343A8760588D3 ] = $R244F38266C59587D696AEC08A771B803; } } switch ( $RF413F06AEBBCEF5E1C8B1019DEE6FE6B ) { case 'spilgames': { $RBAF021A7FD7734AE78ECDD24D3CFD580['feed'] = $R8D6A89D40D59751D209066A66D7BB121['feed']; } break; case 'myarcadefeed': { for ( $RA16D2280393CE6A2A5428A4A8D09E354 = 1; $RA16D2280393CE6A2A5428A4A8D09E354 <= 5; $RA16D2280393CE6A2A5428A4A8D09E354++ ) { if ( !empty( $RBAF021A7FD7734AE78ECDD24D3CFD580['feed' . $RA16D2280393CE6A2A5428A4A8D09E354] ) ) { if ( strpos( $RBAF021A7FD7734AE78ECDD24D3CFD580['feed'.$RA16D2280393CE6A2A5428A4A8D09E354], '2pg.com') !== FALSE ) { $RBAF021A7FD7734AE78ECDD24D3CFD580['feed'.$RA16D2280393CE6A2A5428A4A8D09E354] = ''; } } } } break; } update_option( 'myarcade_' . $RF413F06AEBBCEF5E1C8B1019DEE6FE6B, $RBAF021A7FD7734AE78ECDD24D3CFD580 ); } } } } function F72248ED01D310AAA628418CB20AA62B1() { wp_clear_scheduled_hook('cron_fetching'); wp_clear_scheduled_hook('cron_publishing'); if (wp_next_scheduled('myarcade_t')) { wp_clear_scheduled_hook('myarcade_t'); } if (wp_next_scheduled('myarcade_w')) { wp_clear_scheduled_hook('myarcade_w'); } } ?>