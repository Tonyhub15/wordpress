<?php get_header(); ?>
    
    <div class="spacer-special"></div>

    <?php if (of_get_option('index_728x90')) { ?>
    <div style="float:left; width: 100%;">
        <?php if (of_get_option('ad_728x90')) { ?>
            <div class="ad728"><?php echo of_get_option('ad_728x90') ?></div>
        <?php } else { ?>
            <div class="ad728"><img src="<?php echo get_template_directory_uri(); ?>/images/728.png" /></div>
        <?php } ?>
    </div>
    <?php } ?>    
    
    <div style="padding-bottom: 20px; padding-left: 8px;">
    	<section id="games">
            <?php get_template_part( 'loop', 'index' ); ?>
        </section>
    </div>
<?php get_footer(); ?>