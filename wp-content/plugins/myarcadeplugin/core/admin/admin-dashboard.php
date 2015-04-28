<?php
 if( !defined( 'ABSPATH' ) ) { die(); } function FEFB9CE5F018B58517B8DCC4E9789C7A6() { global $wpdb; F94EBD7C16769D03E06E16136FFE5F944(); ?>
  <div id="icon-index" class="icon32"><br /></div>
  <h2><?php _e("Dashboard"); ?></h2>

  <?php
 $general = get_option('myarcade_general'); $R5983530825A292064583BEF573BB6E43 = intval($wpdb->get_var("SELECT COUNT(*) FROM " . $wpdb->prefix . 'myarcadegames' . " WHERE status = 'new'")); $R032FB697913092FFF60A38F9BAF971B5 = wp_next_scheduled('cron_fetching'); $RF91FF94E18C08F5D59A42DF3239EFF80 = wp_next_scheduled('cron_publishing'); $R6897DA4F5F4772E8E04BFEE38AC24FA5 = get_option('date_format') . ' @ ' . get_option('time_format'); if ( !empty($R032FB697913092FFF60A38F9BAF971B5) ) { $R6FA0FF7FC2E907ACAC3D2378DD4861A1 = gmdate($R6897DA4F5F4772E8E04BFEE38AC24FA5, $R032FB697913092FFF60A38F9BAF971B5 + (get_option('gmt_offset') * 3600)); } if ( !empty($RF91FF94E18C08F5D59A42DF3239EFF80) ) { $R614FE847F6FF03879A7D5F4FFFABB832 = gmdate($R6897DA4F5F4772E8E04BFEE38AC24FA5, $RF91FF94E18C08F5D59A42DF3239EFF80 + (get_option('gmt_offset') * 3600)); } $R82A3D9558AC7F439159820273D784B8D = wp_count_posts(); ?>
  <div class="dash-left metabox-holder">
    <div class="postbox">
      <div class="statsico"></div>
      <h3 class="hndle"><span><?php _e('MyArcadePlugin Info', 'myarcadeplugin') ?></span></h3>
      <div class="preloader-container">
        <div class="insider" id="boxy">
          <ul>
            <li><?php _e('Total Live Games / Posts', 'myarcadeplugin'); ?>: <a href="edit.php?post_status=publish&post_type=post"><strong><?php echo $R82A3D9558AC7F439159820273D784B8D->publish; ?></strong></a></li>
            <li><?php _e('Total Scheduled Games / Posts', 'myarcadeplugin'); ?>: <a href="edit.php?post_status=pending&post_type=post"><strong><?php echo $R82A3D9558AC7F439159820273D784B8D->future; ?></strong></a></li>
            <li><?php _e('Total Draft Games / Posts', 'myarcadeplugin'); ?>: <a href="edit.php?post_status=draft&post_type=post"><strong><?php echo $R82A3D9558AC7F439159820273D784B8D->draft; ?></strong></a></li>

            <li>&nbsp;</li>

            <li><?php _e('Unpublished Games', 'myarcadeplugin'); ?>: <strong><?php echo $R5983530825A292064583BEF573BB6E43; ?></strong></li>
            <li>
              <?php _e('Post Status', 'myarcadeplugin'); ?>: <strong><?php echo $general['status']; ?></strong>
              <?php if ( $general['status'] == 'future') : ?>
               , <strong><?php echo $general['schedule']; ?></strong> <?php _e('minutes schedule', 'myarcadeplugin'); ?>.
              <?php endif; ?>
            </li>

            <li>
            <br />
              <?php _e('Cron Fetching', 'myarcadeplugin'); ?>:
              <?php if ( $general['automated_fetching'] ) : ?>
                <?php _e('Next schedule on', 'myarcadeplugin'); ?> <strong><?php echo $R6FA0FF7FC2E907ACAC3D2378DD4861A1; ?></strong>
              <?php else: ?>
                <strong><?php _e('inactive', 'myarcadeplugin'); ?></strong>
              <?php endif; ?>
            </li>
            <li>
              <?php _e('Cron Publishing', 'myarcadeplugin'); ?>:
              <?php if ( $general['automated_publishing'] ) : ?>
                <?php _e('Next schedule on', 'myarcadeplugin'); ?> <strong><?php echo $R614FE847F6FF03879A7D5F4FFFABB832; ?></strong>
              <?php else: ?>
                <strong><?php _e('inactive', 'myarcadeplugin'); ?></strong>
              <?php endif; ?>
            </li>

            <li>&nbsp;</li>

            <li><?php _e('Download Games', 'myarcadeplugin'); ?>: <strong><?php if ($general['down_games']) { _e('Yes', 'myarcadeplugin'); } else { _e('No', 'myarcadeplugin'); } ?></strong></li>
            <li><?php _e('Download Thumbnails', 'myarcadeplugin'); ?>: <strong><?php if ($general['down_thumbs']) { _e('Yes', 'myarcadeplugin'); } else { _e('No', 'myarcadeplugin'); } ?></strong></li>
            <li><?php _e('Download Screenshots', 'myarcadeplugin'); ?>: <strong><?php if ($general['down_screens']) { _e('Yes', 'myarcadeplugin'); } else { _e('No', 'myarcadeplugin'); } ?></strong></li>

            <li>&nbsp;</li>

            <li><?php _e('Product Support', 'myarcadeplugin'); ?>:  <a href="http://myarcadeplugin.com/support/" target="_new"><?php _e('Forum', 'myarcadeplugin'); ?></a></li>
          </ul>

          <ul>
            <li><strong><?php _e("MyArcadePlugin Real CRON Trigger", 'myarcadeplugin'); ?></strong></li>
            <li><br /><?php _e("Your API Key", 'myarcadeplugin'); ?>: <strong><?php echo FEF2D3EA02462CF375D60FD2DCB6974A3(); ?></strong></li>
            <li><p><?php _e("MyAarcadePlugin API Key is used by the 'real' cron job to secure the cron trigger. If you want to use a cron job instead of WordPress Cron to trigger automated game fetching and publishing use the following URLs:", 'myarcadeplugin'); ?></p></li>
            <li>
              <p><strong><?php _e("Game Fetching:", 'myarcadeplugin'); ?></strong><br /><br /><?php echo MYARCADE_MODULE_URL; ?>/cron.php?apikey=<?php echo FEF2D3EA02462CF375D60FD2DCB6974A3();?>&action=fetch</p>
              <p><strong><?php _e("Game Publishing:", 'myarcadeplugin'); ?></strong><br /><br /><?php echo MYARCADE_MODULE_URL; ?>/cron.php?apikey=<?php echo FEF2D3EA02462CF375D60FD2DCB6974A3();?>&action=publish</p>
            </li>
          </ul>

          <div class="clear"> </div>
        </div>
      </div>
    </div><!-- postbox end -->

    <div class="postbox">
      <div class="joystickico"></div>
      <h3 class="hndle" id="poststuff"><span><?php _e('Premium Arcade Themes', 'myarcadeplugin') ?></span></h3>
      <div class="preloader-container">
        <div class="insider" id="boxy">
          <p>
          <?php
 $RB660C391F7CEB13048630FD08A66430A = fetch_feed('http://exells.com/special-offer/feed/?withoutcomments=1'); if ( is_wp_error( $RB660C391F7CEB13048630FD08A66430A ) ) { echo '<p>'; _e('Sorry, can not download the feed', 'myarcadeplugin'); echo '</p>'; } else { $RCF5FAB70823CEBBB97AF650528084B84 = $RB660C391F7CEB13048630FD08A66430A->get_item(0); echo $RCF5FAB70823CEBBB97AF650528084B84->get_content(); } ?>
          </p>
          <div class="clear">&nbsp;</div>
        </div> <!-- inside end -->
      </div>
    </div> <!-- postbox end -->

    <div class="postbox">
      <div class="statsico"></div>
        <!-- <a target="_new" href="#"><div class="joystickico"></div></a> -->
        <h3 class="hndle" id="poststuff"><span><?php _e('MyArcade Traffic Exchange Network', 'myarcadeplugin') ?></span></h3>
        <div class="preloader-container">
          <div class="insider" id="boxy">
            <p>Join our Banner / Traffic Exchange Network to boost your traffic and to increase the popularity of your site. You will receive 10.000 banner impressions on register for FREE!</p>
             <center><a href="http://exchange.myarcadeplugin.com" target="_blank" title="MyArcade Traffic Exchange Network"> MyArcade Traffic / Banner Exchange Network</a></center>
          </div> <!-- inside end -->
        </div>
      </div> <!-- postbox end -->
  </div><!-- end dash-left -->

  <div class="dash-right metabox-holder">
    <div class="postbox">
      <div class="dollarico"></div>
        <h3 class="hndle" id="poststuff"><span><?php _e('Make Extra Money', 'myarcadeplugin') ?></span></h3>
        <div class="preloader-container">
          <div class="insider" id="boxy">
             <p>With MyArcadePlugin Pro affiliate program you can be a part of our success.</p><p>You will earn up to <strong>30%</strong> commission on any sale you refer! <a href="http://myarcadeplugin.com/affiliate-program/" title="MyArcadePlugin Affiliate Programm">Join our affiliate program</a>, promote MyArcadePlugin Pro and earn extra money!</p>
          </div> <!-- inside end -->
        </div>
      </div> <!-- postbox end -->

    <div class="postbox">
      <div class="newsico"></div>
        <h3 class="hndle" id="poststuff"><span><?php _e('Lastest MyArcadePlugin News', 'myarcadeplugin') ?></span></h3>
        <div class="preloader-container">
          <div class="insider" id="boxy">
          <?php
 wp_widget_rss_output('http://myarcadeplugin.com/feed', array('items' => 5, 'show_author' => 0, 'show_date' => 1, 'show_summary' => 0)); ?>
          </div> <!-- inside end -->
        </div>
      </div> <!-- postbox end -->

    <div class="postbox">
      <div class="newsico"></div>
        <h3 class="hndle" id="poststuff"><span><?php _e('Lastest exells.com News', 'myarcadeplugin') ?></span></h3>
        <div class="preloader-container">
          <div class="insider" id="boxy">
          <?php
 wp_widget_rss_output('http://exells.com/feed/', array('items' => 5, 'show_author' => 0, 'show_date' => 1, 'show_summary' => 0)); ?>
          </div> <!-- inside end -->
        </div>
      </div> <!-- postbox end -->

    <div class="postbox">
      <div class="facebookico"></div>
        <h3 class="hndle" id="poststuff"><span><?php _e('Be Our Friend!', 'myarcadeplugin') ?></span></h3>
        <div class="preloader-container">
          <div class="insider" id="boxy">
            <p style="text-align:center"><strong><?php _e('If you like MyArcadePlugin, become our friend on Facebook', 'myarcadeplugin'); ?></strong></p>
            <p style="text-align:center;">
              <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FMyArcadePlugin%2F178161832232562&amp;width=300&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=400" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:400px;" allowTransparency="true"></iframe>
            </p>
          </div> <!-- inside end -->
        </div>
      </div> <!-- postbox end -->
  </div><!-- end dash-right -->

  <div class="clear"></div>

  <strong>MyArcadePlugin Pro v<?php echo MYARCADE_VERSION;?></strong> | <strong><a href="http://myarcadeplugin.com/" target="_blank">MyArcadePlugin.com</a> </strong>
  <?php
 F011F5FA6950FDD84A7242122BC8934C3(); } ?>