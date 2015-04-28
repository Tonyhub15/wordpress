<?php
/* Single Post Template: Blog Post Template */
?>

<?php get_header(); ?>

<div id="content" class="content<?php echo get_option('fungames_sidebar_position'); ?>">
  <?php if (class_exists('breadcrumb_navigation_xt')) : ?>
    <div class="breadcrumb">
       <?php _e("You Are Here: ", "fungames"); ?>
        <?php
        $mybreadcrumb = new breadcrumb_navigation_xt;
        $mybreadcrumb->display();
        ?>
    </div>
  <?php endif; ?>

  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="singlepage" id="post-<?php the_ID(); ?>">
        <div class="title">
          <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to", 'fungames') ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          <div class="date"><span class="author"><?php _e("Posted by", 'fungames') ?> <?php the_author(); ?></span> <span class="clock"> <?php _e("on", 'fungames') ?> <?php the_time('F - j - Y'); ?></span></div>
        </div>

        <div class="cover">
          <div class="entry">
            <?php $banner = get_option('fungames_adcontent'); ?>
              <?php if ($banner) : ?>
                <div style="float:left;margin: 0 10px 10px 0;">
                  <?php echo stripslashes($banner); ?>
                </div>
              <?php endif; ?>
            <?php the_content(__('Read more..', 'fungames')); ?>
            <div class="clear"></div>

            <?php // Display sexy bookmarks if plugin installed ?>
            <?php if( function_exists('selfserv_shareaholic') ) { selfserv_shareaholic(); } ?>
          </div>
        </div>
      </div>

      <div class="clear"></div>

      <div class="allcomments">
        <?php comments_template(); ?>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <div class="title">
      <h2><?php _e('Oops.. Nothing Found!', 'fungames'); ?></h2>
    </div>
    <div class="cover">
      <p>
        <?php _e('I think what you are looking for is not here or it has been moved. Please try a different search..', 'fungames'); ?>
      </p>
    </div>
  <?php endif; ?>
</div> <?php // end content ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>