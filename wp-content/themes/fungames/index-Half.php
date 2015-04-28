<?php
/**
 * Template to display Full Width Content
 */
?>

<?php global $games, $category, $cat_id, $height; ?>

<div class="gamebox" <?php echo $height; ?>>
  <h2>
    <a href="<?php echo get_category_link($cat_id); ?>">
      <?php echo $category->name; ?>
    </a>
  </h2>

  <div class="spacer"></div>

  <?php foreach ($games as $post) : ?>
  <div class="game_title">

    <span class="game_thumb">
      <a href="<?php the_permalink() ?>" class="thumb_link" rel="bookmark" title="<?php echo $post->post_title; ?>" ><?php myabp_print_thumbnail(75, 75); ?></a>
    </span>

    <span class="game_details">
      <h3>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo $post->post_title; ?>" >
          <?php myabp_get_title(20); ?>
        </a>
      </h3>
      <?php fungames_get_excerpt(130) ?>
    </span>

  </div>
  <?php endforeach; ?>

  <div class="cat_link">
    <a href="<?php echo get_category_link($cat_id); ?>">
      <?php _e("More Games", "fungames"); ?>
    </a>
  </div>

  <div class="clear"></div>
</div>