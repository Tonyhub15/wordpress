<?php $paged = get_query_var('paged') ? get_query_var('paged') : 1; $wp_query = new WP_Query(array('posts_per_page' => 7, 'paged' => $paged, 'orderby'=>'rand') ); while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    <article class="games">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php if ( get_post_meta( get_the_ID(), 'mg_hot', true ) ) { ?>
			    <?php if ( has_post_thumbnail() ) { ?>
		            <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn" style="margin: 130px 110px;">Play</div><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&h=178&w=178&zc=1" alt="<?php the_title(); ?>" width="178" height="178" /></div>
		        <?php } else { ?>
		            <?php  if ( get_post_meta( get_the_ID(), 'mabp_thumbnail_url', true ) ) { ?>
		                <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn">Play</div><?php myarcade_thumbnail(178, 178); ?></div>
		            <?php } else { ?>
		                <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn">Play</div><img src="<?php bloginfo('template_directory'); ?>/images/noimg.jpg" alt="<?php the_title(); ?>" width="178" height="178" /></div>
		            <?php } ?>
		        <?php } ?>
            <?php } else { ?>
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn">Play</div><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&h=140&w=140&zc=1" alt="<?php the_title(); ?>" width="140" height="140" /></div>
                <?php } else { ?>
                    <?php  if ( get_post_meta( get_the_ID(), 'mabp_thumbnail_url', true ) ) { ?>
                        <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn">Play</div><?php myarcade_thumbnail(140, 140); ?></div>
                    <?php } else { ?>
                        <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn">Play</div><img src="<?php bloginfo('template_directory'); ?>/images/noimg.jpg" alt="<?php the_title(); ?>" width="140" height="140" /></div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
	    </a>
	</article>
<?php endwhile; wp_reset_query(); ?>