<?php get_header(); ?>

<div id="content" class="content<?php echo get_option('fungames_sidebar_position'); ?>">
  <?php
  // Do some actions just before game category boxes
  do_action('fungames_before_archive');
  ?>

  <div class="archive_view">
    <?php
    // Generate Archive title
    if ( have_posts() ) :
      ?><h1><?php
      //$post = $posts[0];
      if (is_category()) {
        echo single_cat_title();
      } elseif (is_day()) {
        _e("Archive for", "fungames"); ?> <?php the_time('F jS, Y');
      } elseif (is_month()) {
        _e("Archive for", "fungames"); ?> <?php the_time('F, Y');
      } elseif (is_year()) {
        _e("Archive for", "fungames"); ?> <?php the_time('Y');
      } elseif (is_author()) {
        _e("Author Archive", "fungames");
      } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
        _e("Blog Archives", "fungames");
      } elseif (is_tag() ) {
        _e("Browse by tag:", "fungames"); ?> <?php echo single_tag_title( '', false );
      } else {
        _e("Blog Archives", "fungames");
      }
      ?></h1><?php

      while (have_posts()) : the_post();
        ?>
        <div class="cat_view">
          <div class="gametitle">
            <h4>
              <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php myabp_get_title(40); ?></a>
            </h4>
          </div>

          <div class="cover">
            <div class="entry">
              <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(esc_attr__('Permanent Link to %s', 'fungames'), the_title_attribute('echo=0')) ?>">
                <?php if (has_post_thumbnail()): ?>
                  <?php the_post_thumbnail(array(80,80), array('class'	=> "alignleft") ) ?>
                <?php else: ?>
                  <img src="<?php myabp_print_thumbnail_url(); ?>" height="80" width="80" alt="<?php echo $post->post_title; ?>" align="left" />
                <?php endif ?>
              </a>
              <?php fungames_get_excerpt(180); ?>
              <div class="clear"></div>
            </div>
          </div>

          <?php if(function_exists('the_ratings')) : ?>
            <div align="left">
              <?php the_ratings(); ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>

      <div class="clear"></div>

      <?php fungames_navigation(); ?>

    <?php else: ?>
      <h1 class="title"><?php _e("Not Found", "fungames"); ?></h1>
      <p><?php _e("Sorry, but you are looking for something that isn't here.", "fungames"); ?></p>
    <?php endif; ?>
  </div> <?php // end archive ?>

  <?php
  // Do some actions before the content wrap ends
  do_action('fungames_after_archive');
  ?>

</div> <?php // end content ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>