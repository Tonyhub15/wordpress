<?php /*
List template
This template returns the related posts as a comma-separated list.
Author: Daniel Bakovic
*/
?>
<?php if ( $related_query->have_posts() ): ?>
  <div class="related">
    <h3><?php _e("More Games", "fungames"); ?></h3>
    <ul>
    <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
      <li>
        <div class="moregames">
          <?php $screen = get_post_meta($post->ID, 'mabp_thumbnail_url', true); ?>
          <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
            <img src="<?php echo $screen; ?>" height="80" width="80" alt="<?php the_title_attribute(); ?>" align="left" />
            <?php the_title(); ?>
          </a>
          <br />
          <?php fungames_get_excerpt(280); ?>
        </div> <?php // end moregames ?>
      </li>
    <?php endwhile; ?>
    </ul>
  </div>
<?php endif; ?>