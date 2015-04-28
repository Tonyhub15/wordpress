<?php
/**
 * Template to display Horizontal Category Boxes
 */
?>

<?php global $category, $games, $cat_id; ?>

<div class="gamebox">
  <h2>
    <a href="<?php echo get_category_link($cat_id); ?>">
      <?php echo $category->name; ?>
    </a>
  </h2>

  <?php // print out all games from this category ?>
  <?php foreach ($games as $post) : ?>
  <div class="game_title">
    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo $post->post_title; ?>" >
      <?php myabp_get_title(10); ?>
    </a>
    <br />
    <a href="<?php the_permalink() ?>" class="thumb_link" rel="bookmark" title="<?php echo $post->post_title; ?>" >
      <?php myabp_print_thumbnail(85, 85); ?>
    </a>
  </div>
  <?php endforeach; ?>

  <div class="cat_link">
    <a href="<?php echo get_category_link($cat_id); ?>">
      <?php _e("More Games", "fungames"); ?>
    </a>
  </div>

 <div class="clear"></div>
</div>