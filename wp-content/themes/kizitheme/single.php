<?php get_header(); ?>

<?php setPostViews(get_the_ID()); ?>

<section class="container">

  <?php if (of_get_option('single_728x90')) { ?>
  <div style="float:left; width: 100%;">
    <?php if (of_get_option('ad_728x90')) { ?>
        <div class="ad728"><?php echo of_get_option('ad_728x90') ?></div>
    <?php } else { ?>
        <div class="ad728"><img src="<?php echo get_template_directory_uri(); ?>/images/728.png" /></div>
    <?php } ?>
  </div>
  <?php } ?>

  <div style="position: relative; width: 100%; float: left;">
    <?php if (of_get_option('single_160x600')) { ?>
      <?php if (of_get_option('ad_160x600')) { ?>
        <div class="ad160"><?php echo of_get_option('ad_160x600') ?></div>
      <?php } else { ?>
        <div class="ad160"><img src="<?php echo get_template_directory_uri(); ?>/images/160.png" /></div>
      <?php } ?> 
    <?php } ?> 
    <?php while (have_posts()) : the_post(); ?>
    <div class="main-game border-radius">
      <div class="title-special border-radius-top">
        <div class="padding-10">
          <span class="logofont"><?php bloginfo('name'); ?></span>
          <nav class="control">
            <ul>
              <li><a href="<?php echo site_url(); ?>"><span class="icon icon-home"></span></a></li>
              <?php if ( get_post_meta( get_the_ID(), 'mg_walk', true ) ) { ?>
                <li class="walkbtn"><a href="#"><span class="icon icon-youtube"></span> <?php _e("Walkthrough", "kizitheme"); ?></a></li>
              <?php } ?> 
            </ul>
          </nav>
          <span class="playcount border-radius"><?php _e("Gameplays", "kizitheme"); ?> <?php echo getPostViews(get_the_ID()); ?></span>
        </div>
      </div>
      <div class="subtitle">
        <h1><?php _e("You are playing", "kizitheme"); ?> <?php the_title(); ?></h1>
      </div>
      <?php if ( get_post_meta( get_the_ID(), 'mg_walk', true ) ) { ?>
        <div class="walkthrough">
          <center>
            <?php $walkvideo = get_post_meta($post->ID, "mg_walk", true); ?>
            <iframe width="560" height="320" src="//www.youtube.com/embed/<?php echo $walkvideo; ?>" frameborder="0" allowfullscreen></iframe>
          </center>
        </div>
      <?php } ?>
      <div class="description">
        <div class="padding-10">
          <?php the_content(); ?>
        </div>
      </div>
      <div class="preloader">
        <?php if (of_get_option('preloader')) { ?>
              <?php } else { ?>
                <?php if (of_get_option('preloader_336x280')) { ?>
                  <?php if (of_get_option('ad_336x280')) { ?>
                    <div class="ad336"><?php echo of_get_option('ad_336x280') ?></div>
                  <?php } else { ?>
                    <div class="ad336"><img src="<?php echo get_template_directory_uri(); ?>/images/336.png" /></div>
                  <?php } ?>
                <?php } ?>
                <p>
                  <?php _e("Game loading!", "kizitheme"); ?>
                  <br /><br />
                  <img src="<?php echo get_template_directory_uri(); ?>/images/loading.gif" />
                  <br /><br />
                  <a href="#" class="skip"><?php _e("Skip", "kizitheme"); ?></a>
                <p>
              <?php } ?>
      </div>
      <div class="thegame">
        <div class="padding-10">
        <center>
          <?php if ( get_post_meta( get_the_ID(), 'mg_game', true ) || (function_exists('get_game')) ) { ?>
            <?php if ( get_post_meta( get_the_ID(), 'mg_game', true ) ) { ?>
              <iframe frameborder="0" height="600" scrolling="no" src="<?php echo get_post_meta($post->ID, "mg_game", true); ?>" width="720"></iframe>
            <?php } else { ?>
              <?php $embedcode = get_game($post->ID); global $mypostid; $mypostid = $post->ID; echo myarcade_get_leaderboard_code(); echo $embedcode; ?> 
            <?php } ?>
          <?php } else { ?>
            <?php _e('Please upload a game file!', 'kizitheme'); ?>
          <?php } ?> 
        </center>
        </div>
      </div>
      <?php if (has_tag( $tag, $post )) { ?>
        <div class="tags">
          <?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
        </div>
      <?php } ?>
      <div class="related">
        <div style="width: 100%; padding: 10px; text-align: center; float:left;">
          <?php get_template_part('related'); ?>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
    <?php if (of_get_option('single_160x600')) { ?>
      <?php if (of_get_option('ad_160x600')) { ?>
        <div class="ad160-right"><?php echo of_get_option('ad_160x600') ?></div>
      <?php } else { ?>
        <div class="ad160-right"><img src="<?php echo get_template_directory_uri(); ?>/images/160.png" /></div>
      <?php } ?> 
    <?php } ?> 
  </div>

  <?php if (of_get_option('single_728x90')) { ?>
  <div style="float:left; width: 100%;">
    <?php if (of_get_option('ad_728x90')) { ?>
        <div class="ad728"><?php echo of_get_option('ad_728x90') ?></div>
    <?php } else { ?>
        <div class="ad728"><img src="<?php echo get_template_directory_uri(); ?>/images/728.png" /></div>
    <?php } ?>
  </div>
  <?php } ?>

</section>

<?php get_footer(); ?>