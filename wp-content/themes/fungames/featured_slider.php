<div class="listi"><?php _e("Featured Games", "fungames"); ?></div>
<div id="postlist">
  <ul class="spy">
    <?php
      if ( empty($fungames_featured_count) ) { $fungames_featured_count = 16; }
      // Get the post order
      if ( get_option('fungames_order_games') == 'Random') {
        $order = '&orderby=rand';
      } else { $order = ''; }
      $query = new WP_Query('showposts='.$fungames_featured_count.$order);
      while ($query->have_posts()) : $query->the_post();
    ?>
      <li>
        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
          <img src="<?php echo get_post_meta($post->ID, 'mabp_thumbnail_url', true); ?>" height="80" width="80" alt="<?php the_title(); ?>" />
          <h2><?php the_title(); ?></h2>
        </a>

        <div class="fcats"><?php the_category(', '); ?> </div>
        <div class="auth">
          <?php fungames_get_excerpt(110); ?>
        </div>
      </li>
    <?php endwhile; ?>
  </ul>
</div> <?php // end postlist ?>
<div class="clear"></div>