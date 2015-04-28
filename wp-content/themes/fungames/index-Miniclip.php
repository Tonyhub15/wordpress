<?php
/**
 * Template to display Vertical Category Boxes
 */
?>
<?php global $games, $category, $cat_id, $height;?>

<div class="gamebox" <?php echo $height;?>>
  <h2>
    <a href="<?php echo get_category_link($cat_id); ?>">
      <?php echo $category->name; ?>
    </a>
  </h2>

  <?php $gamecounter = 0; ?>
  <?php foreach ($games as $post) : ?>
    <?php $gamecounter++; ?>
    <?php if ($gamecounter <= 2) : ?>
    <div class="game_title">
      <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo $post->post_title; ?>" >
        <?php myabp_get_title(10); ?>
      </a>
      <br />
      <a href="<?php the_permalink() ?>" class="thumb_link" rel="bookmark" title="<?php echo $post->post_title; ?>" >
        <?php myabp_print_thumbnail(85, 85); ?>
      </a>
    </div>
  <?php else: ?>
    <?php if ($gamecounter == 3) : ?>
    <div class="clear"></div>
    <ul class="games-ul">
    <?php endif; ?>
      <li>
        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"> <?php myabp_get_title(20); ?></a>
      </li>
  <?php endif; ?>
  <?php endforeach; ?>
    </ul>

  <div class="cat_link">
    <a href="<?php echo get_category_link($cat_id); ?>">
      <?php _e("More Games", "fungames"); ?>
    </a>
  </div>

  <div class="clear"></div>
</div>