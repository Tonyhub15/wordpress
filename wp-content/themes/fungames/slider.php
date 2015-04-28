<?php if ( !get_option('fungames_slider_type')  || get_option('fungames_slider_type') == 'Default' )  : ?>
<script type="text/javascript">
  stepcarousel.setup({
    galleryid: 'mygallery',     // id of carousel DIV
    beltclass: 'belt',          // class of inner "belt" DIV containing all the panel DIVs
    panelclass: 'panel',        // class of panel DIVs each holding content
    <?php if ( get_option('fungames_topslider_auto') == 'enable') : ?>
    autostep: {enable:true, moveby:1, pause:3000},
    <?php endif; ?>
    panelbehavior: {speed:500, wraparound:true, persist:true},
    defaultbuttons: {enable: true, moveby: 2, leftnav: ['<?php echo get_template_directory_uri(); ?>/images/arrleft.jpg', -10, 68], rightnav: ['<?php echo get_template_directory_uri(); ?>/images/arrright.jpg', 14, 68]},
    statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
    contenttype: ['external'] //content setting ['inline'] or ['external', 'path_to_external_file']
  })
</script>

<div id="myslides">
  <div id="mygallery" class="stepcarousel">
    <div class="belt">
      <?php
        if ( get_option('fungames_order_games_slider') == 'Random') { $order = 'rand'; } else { $order = 'date'; }
        $catID = get_option('fungames_slidercategory');
        $query = new WP_Query('cat='.$catID.'&showposts=20&orderby='.$order);
        while ($query->have_posts()) :
          $query->the_post();
      ?>
          <div class="panel">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Play", 'fungames'); ?> <?php the_title_attribute(); ?>">
              <img src="<?php echo get_post_meta($post->ID, 'mabp_thumbnail_url', true); ?>" height='100' width='100' alt="<?php echo the_title(); ?>"/>
            </a>
            <h2>
              <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Play", 'fungames'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            </h2>
          </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>
<div class="clear"></div>
<?php endif; ?>