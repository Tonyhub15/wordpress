<?php
if ( get_option('fungames_nivoslider') == 'enable' ) {
  // Get the post order
  if ( get_option('fungames_nivoslider_order') == 'Random') {
    $order = 'rand';
  } else { $order = 'date'; }

  $catID = get_option('fungames_nivoslider_category');

  $game_query = array (
    'showposts' => 10,
    'cat' => $catID,
    'orderby' => $order,
    'meta_query' => array (
      array(
        'key' => 'mabp_screen1_url',
        'value' => 'http',
        'compare' => 'LIKE'
      )
    )
  );

  $games = new WP_Query($game_query);

  if ( $games->have_posts() ) {
    ?>
    <div class="contentbox customslider">
      <div class="slider-wrapper theme-orman">
        <div class="ribbon"></div>
        <div id="slider" class="nivoSlider">
        <?php
        while ($games->have_posts()) {
          $games->the_post();

          $screen = base64_encode(myabp_print_screenshot_url(1, false));
          $img = get_template_directory_uri().'/timthumb.php?src='.$screen.'&w=587&h=218&zc=1&q=100';
          ?>
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <img src="<?php echo $img; ?>" alt="<?php the_title_attribute(); ?>" title="<?php echo wp_strip_all_tags(fungames_get_excerpt(200, false)); ?>" width="587" heigh="218" />
          </a>
          <?php
        }
        ?>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    jQuery(window).load(function() {
        jQuery('#slider').nivoSlider({
          animSpeed: 600,
          pauseTime: 4000,
          <?php
          if ( get_option('fungames_topslider_auto') == 'disable') {
            echo 'manualAdvance:true';
          }
          ?>
        });
    });
    </script>
    <?php
  }

  // Reset WordPress query
  wp_reset_query();
}
?>