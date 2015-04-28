<div id="content" class="content<?php echo get_option('fungames_sidebar_position'); ?>">
  <div class="single_game" id="post-<?php the_ID(); ?>">

    <div class="title">
      <h2>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'fungames'); ?> <?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h2>

      <div align="right" style="padding-right:10px;">
        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
      </div>
    </div> <?php // end title ?>

    <div class="cover">
      <div class="entry">
        <?php
        // Show content banner if available
        $content_banner = get_option('fungames_adcontent');
        if ( !empty($content_banner) ) {
          ?>
          <div class="adright">
            <?php echo stripslashes($content_banner); ?>
          </div>
          <?php
        }

        // Display post content
        the_content();

        if (function_exists('the_views')) {
          ?>
          <h3>
            <?php _e("Game Stats", "fungames"); ?>
          </h3>
          <?php the_views(); ?>
          <br /><br />
          <?php
        }

        // Display game screen shots if available and enabled
        if ( (get_option('fungames_dispay_screens') == 'enable') && myabp_count_screenshots() ) {
          ?>
          <div class="clear"></div>
          <h3><?php the_title(''); ?> <?php _e('Screen Shots', 'fungames'); ?></h3>
          <div class="screencenter">
            <?php myabp_print_screenshot_all(130, 130, 'screen_thumb'); ?>
          </div>
          <?php
        }

        // Display the game Video
        if ( get_option('fungames_dispay_video') == 'enable') {
          $video = myabp_get_video();
          if ( $video ) {
            ?>
            <div class="game_video">
              <?php echo "<h3>" . __("Game Video", 'fungames') . "</h3>"; ?>
              <div class="embed_video">
                <?php echo $video; ?>
              </div>
            </div>
            <?php
          }
        }

        // Display game tags
        the_tags( '<h3>'.__("Game Tags", "fungames").'</h3><p>', ', ', '</p>');
        ?>

        <h3><?php _e("Game Categories", "fungames"); ?></h3>
        <div class="category">
          <?php the_category(', '); ?>
        </div>

        <?php
        // Display some manage links if logged in user is an admin
        fungames_admin_links();
        ?>

        <?php
        // Display Google Rich Snippets
        fungames_rich_snippet();
        ?>

        <?php // Display sexy bookmarks if plugin installed ?>
        <?php if( function_exists('selfserv_shareaholic') ) { echo '<div class="clear"></div>'; selfserv_shareaholic(); } ?>

        <div class="clear"></div>
      </div> <?php // end entry ?>
    </div> <?php // end cover ?>
  </div> <?php // single_game ?>

  <?php
  // Show the game share box
  if ( (get_option('fungames_share_box') == 'enable') && (get_post_meta($post->ID, "mabp_game_type", true) != 'embed') ) {
    ?>
    <div class="single_game">
      <h2><?php _e("Do You Like This Game?", "fungames"); ?></h2>
      <p><?php _e("Embed this game on your MySpace or on your Website:", "fungames"); ?></p>
      <form name="select_all"><textarea name="text_area" onClick="javascript:this.form.text_area.focus();this.form.text_area.select();"><a href="<?php echo home_url();?>"><?php bloginfo('name'); ?></a><br /><?php echo get_game($post->ID); ?></textarea>
      </form>
    </div>
    <?php
  }
  ?>

  <div class="clear"></div>

  <div class="allcomments">
    <?php comments_template(); ?>
  </div>

  <?php
  // Display related (YARPP required) or random games
  fungames_related();
  ?>

</div> <?php // end content ?>
<div id="turnoff"></div>

<?php get_sidebar(); ?>
<div class="clear"></div>
