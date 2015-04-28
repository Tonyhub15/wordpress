<!-- Start the Loop. -->
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
<?php $loopcounter = 0; while (have_posts()) : the_post(); $loopcounter++; ?>
	<?php if ( get_post_meta( get_the_ID(), 'mg_hot', true ) ) { ?>
        <article class="games w2">
        	<div class="hot-badge"></div>
    <?php } else { ?>
        <article class="games">
    <?php } ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php if ( get_post_meta( get_the_ID(), 'mg_hot', true ) ) { ?>
			    <?php if ( has_post_thumbnail() ) { ?>
		            <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn" style="margin: 130px 110px;"><?php _e("Play", "kizitheme"); ?></div><img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php get_image_url(); ?>&h=178&w=178&zc=1" alt="<?php the_title(); ?>" width="178" height="178" /></div>
		        <?php } else { ?>
		            <?php  if ( get_post_meta( get_the_ID(), 'mabp_thumbnail_url', true ) ) { ?>
		                <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn"><?php _e("Play", "kizitheme"); ?></div><?php myarcade_thumbnail(178, 178); ?></div>
		            <?php } else { ?>
		                <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn"><?php _e("Play", "kizitheme"); ?></div><img src="<?php echo get_template_directory_uri(); ?>/images/noimg.jpg" alt="<?php the_title(); ?>" width="178" height="178" /></div>
		            <?php } ?>
		        <?php } ?>
            <?php } else { ?>
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn"><?php _e("Play", "kizitheme"); ?></div><img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php get_image_url(); ?>&h=140&w=140&zc=1" alt="<?php the_title(); ?>" width="140" height="140" /></div>
                <?php } else { ?>
                    <?php  if ( get_post_meta( get_the_ID(), 'mabp_thumbnail_url', true ) ) { ?>
                        <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn"><?php _e("Play", "kizitheme"); ?></div><?php myarcade_thumbnail(140, 140); ?></div>
                    <?php } else { ?>
                        <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn"><?php _e("Play", "kizitheme"); ?></div><img src="<?php echo get_template_directory_uri(); ?>/images/noimg.jpg" alt="<?php the_title(); ?>" width="140" height="140" /></div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
	    </a>
	</article>
<?php endwhile; ?>
<?php if(function_exists('pagenavi')) { pagenavi(); } ?>