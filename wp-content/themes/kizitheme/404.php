<?php get_header(); ?>

<section class="container" style="padding: 150px 0;">
	<center>
		<img src="<?php echo get_template_directory_uri(); ?>/images/notfound.png" />
		<br />
		<h2><?php _e("Sorry, the search is not found!", "kizitheme"); ?></h2>
		<br />
		<p><?php _e("Try another search...", "kizitheme"); ?>.</p>
	</center>
</section>

<?php get_footer(); ?>