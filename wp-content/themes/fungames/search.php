<?php get_header(); ?>

<div id="content" class="content<?php echo get_option('fungames_sidebar_position'); ?>">

  <?php
  // Do some action before the page output
  do_action('fungames_before_search');

  if (have_posts()) :
    ?>
    <h2 class="pagetitle">
      <?php _e("Search Results", "fungames"); ?>
    </h2>

    <?php while (have_posts()) : the_post(); ?>
      <div class="single_game" id="post-<?php the_ID(); ?>">
        <div class="title">
          <h2>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'fungames'); ?> <?php the_title_attribute(); ?>">
              <?php the_title(); ?>
            </a>
          </h2>

          <?php if(function_exists('the_ratings')) : ?>
            <div align="right" style="padding-right:10px;">
              <?php the_ratings(); ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="cover">
          <div class="entry">
            <?php if ($wp_query->current_post == 0) : ?>
              <?php // Show content banner if configured ?>
              <?php $banner = get_option('fungames_adcontent'); // 300 x 250 ?>
              <?php if ($banner) : ?>
                <div class="adright">
                  <?php echo stripslashes($banner); ?>
                </div>
              <?php endif; ?>
            <?php endif; ?>

            <a href="<?php the_permalink() ?>" rel="bookmark" title="Play <?php the_title_attribute(); ?>"><img src="<?php myabp_print_thumbnail_url(); ?>" width="100" height="100" style="float:left;"></a>
            <?php fungames_get_excerpt(180); ?>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Play <?php the_title_attribute(); ?>"><?php _e('Play Now', 'fungames'); ?></a>

            <div class="clear"></div>
          </div> <?php // end entry ?>
        </div>  <?php // end cover ?>
      </div> <?php // end single_game ?>
    <?php endwhile; ?>

    <?php
    // Do some action after the page output
    do_action('fungames_after_search');

    fungames_navigation();

  else :
    // Nothing found!
    ?>
    <h2 class="pagetitle">
      <?php _e("Sorry, Can't find that Game. But maybe you like one of these games:", "fungames"); ?>
    </h2>

    <?php
    // Get some random games
    get_template_part('games', 'random');

  endif;

  // Do some actions before the content wrap ends
  do_action('fungames_before_content_end');
  ?>

</div> <?php // content ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>