<!-- Start the Loop. -->
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
<?php $loopcounter = 0; while (have_posts()) : the_post(); $loopcounter++; ?>
	<?php if ( get_post_meta( get_the_ID(), 'mg_hot', true ) ) { ?>
        <article class="games w2">
        	<div class="hot-badge"></div>
    <?php } else { ?>
        <article class="games">
        	<?php if (1 == $paged AND $loopcounter <= 5) { ?>
        	    <div class="new-badge"></div>
        	<?php } ?> 
    <?php } ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php if ( get_post_meta( get_the_ID(), 'mg_hot', true ) ) { ?>
			    <?php if ( has_post_thumbnail() ) { ?>
		            <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn" style="margin: 130px 110px;"><?php _e("Play", "kizitheme"); ?></div><img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php get_image_url(); ?>&h=281&w=281&zc=1" alt="<?php the_title(); ?>" width="281" height="281" /></div>
		        <?php } else { ?>
		            <?php  if ( get_post_meta( get_the_ID(), 'mabp_thumbnail_url', true ) ) { ?>
		                <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn" style="margin: 130px 110px;"><?php _e("Play", "kizitheme"); ?></div><?php myarcade_thumbnail(281, 281); ?></div>
		            <?php } else { ?>
		                <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn" style="margin: 130px 110px;"><?php _e("Play", "kizitheme"); ?></div><img src="<?php echo get_template_directory_uri(); ?>/images/noimg.jpg" alt="<?php the_title(); ?>" width="281" height="281" /></div>
		            <?php } ?>
		        <?php } ?>
            <?php } else { ?>
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn"><?php _e("Play", "kizitheme"); ?></div><img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php get_image_url(); ?>&h=137&w=137&zc=1" alt="<?php the_title(); ?>" width="137" height="137" /></div>
                <?php } else { ?>
                    <?php  if ( get_post_meta( get_the_ID(), 'mabp_thumbnail_url', true ) ) { ?>
                        <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn"><?php _e("Play", "kizitheme"); ?></div><?php myarcade_thumbnail(137, 137); ?></div>
                    <?php } else { ?>
                        <div class="thumb"><div class="gametitle"><?php the_title(); ?></div><div class="playbttn"><?php _e("Play", "kizitheme"); ?></div><img src="<?php echo get_template_directory_uri(); ?>/images/noimg.jpg" alt="<?php the_title(); ?>" width="137" height="137" /></div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
	    </a>
	</article>
<?php endwhile; ?>
<?php if(function_exists('pagenavi')) { pagenavi(); } ?>