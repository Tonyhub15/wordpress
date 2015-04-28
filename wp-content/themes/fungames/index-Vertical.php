<?php
/**
 * Template to display Vertical Category Boxes
 */
?>
<?php
global $games, $category, $cat_id, $catcount, $banner, $height;

$catcount++;
$gamecount = 0;
?>
<div class="gamebox" <?php echo $height; ?>>
  <h2>
    <a href="<?php echo get_category_link($cat_id); ?>">
      <?php echo $category->name; ?>
    </a>
  </h2>

  <?php // print out all games from this category ?>
  <?php foreach ($games as $post) : ?>
    <?php $gamecount++; ?>
    <div class="game_title">
      <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo $post->post_title; ?>" >
        <?php myabp_get_title(10); ?>
      </a>
      <br />
      <a href="<?php the_permalink() ?>" class="thumb_link" rel="bookmark" title="<?php echo $post->post_title; ?>" >
        <?php myabp_print_thumbnail(85, 85); ?>
      </a>
    </div>
    <?php
    if ( $banner ) {
      if ( ($gamecount == 2) && (($catcount == 2) || ($catcount == 4) )) {
        echo '<div style="clear:both;padding-top:10px;height:212px;text-align:center;margin-bottom:5px;"><small>Advertisement</small>'.$banner.'</div>';
        break;
      }
    }
    ?>
  <?php endforeach; ?>

  <div class="cat_link">
    <a href="<?php echo get_category_link($cat_id); ?>">
      <?php _e("More Games", "fungames"); ?>
    </a>
  </div>

  <div class="clear"></div>
</div>