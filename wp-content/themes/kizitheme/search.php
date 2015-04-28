<?php get_header(); ?>

    <?php if (of_get_option('index_728x90')) { ?>
        <?php if (of_get_option('ad_728x90')) { ?>
            <div class="ad728"><?php echo of_get_option('ad_728x90') ?></div>
        <?php } else { ?>
            <div class="ad728"><img src="<?php echo get_template_directory_uri(); ?>/images/728.png" /></div>
        <?php } ?>
    <?php } ?>

    <div style="padding-bottom: 20px; padding-left: 8px;">
        <div class="padding-10">
            <h2>
                <?php _e("Search for", "kizitheme"); ?> <?php echo get_search_query(); ?>
            </h2>
        </div>
        <section id="games">
            <?php get_template_part( 'loop', 'search' ); ?>
        </section>
    </div>

<?php get_footer(); ?>