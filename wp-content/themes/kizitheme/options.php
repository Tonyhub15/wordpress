<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('Appearance', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Logo', 'options_framework_theme'),
		'desc' => __('Upload a logo image', 'options_framework_theme'),
		'id' => 'logo',
		'type' => 'upload');

	$options[] = array(
		'name' =>  __('Background', 'options_framework_theme'),
		'desc' => __('Body background, can be image or color or both', 'options_framework_theme'),
		'id' => 'body_bg',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' =>  __('Colors', 'options_framework_theme'),
		'desc' => __('Main Color', 'options_framework_theme'),
		'id' => 'ppal-color',
		'std' => '',
		'type' => 'color' );

	$options[] = array(
		'desc' => __('Secondary Color', 'options_framework_theme'),
		'id' => 'sec-color',
		'std' => '',
		'type' => 'color' );

	$options[] = array(
		'name' =>  __('Texts', 'options_framework_theme'),
		'desc' => __('Links color', 'options_framework_theme'),
		'id' => 'link-color',
		'std' => '',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Ads', 'options_framework_theme'),
		'type' => 'heading');


	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	$options[] = array(
		'name' => __('Enable ads in the index?', 'options_framework_theme'),
		'desc' => __('Enable a banner of 728x90 in the index page', 'options_framework_theme'),
		'id' => 'index_728x90',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Enable ads in the single?', 'options_framework_theme'),
		'desc' => __('Ads in the header and bottom of game, size: 728x90', 'options_framework_theme'),
		'id' => 'single_728x90',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'desc' => __('Enable a banner of 160x600 in the Single game?', 'options_framework_theme'),
		'id' => 'single_160x600',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('160x600 Banner', 'options_framework_theme'),
		'id' => 'ad_160x600',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => __('728x90 Banner', 'options_framework_theme'),
		'id' => 'ad_728x90',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => __('Settings', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Social Buttons', 'options_framework_theme'),
		'desc' => __('Facebook fanpage or profile URL', 'options_framework_theme'),
		'id' => 'facebook_url',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'desc' => __('Twitter URL', 'options_framework_theme'),
		'id' => 'twitter_url',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'desc' => __('Google Plus page or profile URL', 'options_framework_theme'),
		'id' => 'plus_url',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'desc' => __('Youtube Channel', 'options_framework_theme'),
		'id' => 'youtube_url',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Tracking Code', 'options_framework_theme'),
		'id' => 'tracking_code',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => __('Preloader', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Disable the preloader?', 'options_framework_theme'),
		'desc' => __('Disable the game preloader', 'options_framework_theme'),
		'id' => 'preloader',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Time of preload', 'options_framework_theme'),
		'desc' => __('Write the time to preload the game in seconds.', 'options_framework_theme'),
		'id' => 'preloader_time',
		'std' => '15',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Enable the ad in the preloader?', 'options_framework_theme'),
		'desc' => __('Enable an ad of 336x280 in the game preloader', 'options_framework_theme'),
		'id' => 'preloader_336x280',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('336x280 Banner', 'options_framework_theme'),
		'id' => 'ad_336x280',
		'type' => 'editor',
		'settings' => $wp_editor_settings );


	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#stats_hidden').click(function() {
  		$('#section-face').fadeToggle(400);
  		$('#section-twit').fadeToggle(400);
  		$('#section-gam').fadeToggle(400);
  		$('#section-facebook_id').fadeToggle(400);
	});

	if ($('#stats_hidden:checked').val() !== undefined) {
		$('#section-face').show();
		$('#section-twit').show();
		$('#section-gam').show();
		$('#section-facebook_id').show();
	}

	$('#preloader_banner').click(function() {
  		$('#section-ad_336x280_preloader').fadeToggle(400);
	});

	if ($('#preloader_banner:checked').val() !== undefined) {
		$('#section-ad_336x280_preloader').show();
	}

	$('#ads_index').click(function() {
  		$('#section-336x280_index').fadeToggle(400);
  		$('#section-728x90_index').fadeToggle(400);
  		$('#section-728x90_middle_index').fadeToggle(400);
	});

	if ($('#ads_index:checked').val() !== undefined) {
		$('#section-336x280_index').show();
		$('#section-728x90_index').show();
		$('#section-728x90_middle_index').show();
	}

	$('#ads_game').click(function() {
  		$('#section-336x280_game_up').fadeToggle(400);
  		$('#section-336x280_game_down').fadeToggle(400);
  		$('#section-728x90_game_up').fadeToggle(400);
  		$('#section-728x90_game_down').fadeToggle(400);
	});

	if ($('#ads_game:checked').val() !== undefined) {
		$('#section-336x280_game_up').show();
		$('#section-336x280_game_down').show();
		$('#section-728x90_game_up').show();
		$('#section-728x90_game_down').show();
	}

	$('#ads_blog').click(function() {
  		$('#section-336x280_blog_up').fadeToggle(400);
  		$('#section-336x280_blog_down').fadeToggle(400);
  		$('#section-728x90_blog_up').fadeToggle(400);
  		$('#section-728x90_blog_down').fadeToggle(400);
	});

	if ($('#ads_blog:checked').val() !== undefined) {
		$('#section-336x280_blog_up').show();
		$('#section-336x280_blog_down').show();
		$('#section-728x90_blog_up').show();
		$('#section-728x90_blog_down').show();
	}

	$('#ads_page').click(function() {
  		$('#section-336x280_page_up').fadeToggle(400);
  		$('#section-336x280_page_down').fadeToggle(400);
  		$('#section-728x90_page_up').fadeToggle(400);
  		$('#section-728x90_page_down').fadeToggle(400);
	});

	if ($('#ads_page:checked').val() !== undefined) {
		$('#section-336x280_page_up').show();
		$('#section-336x280_page_down').show();
		$('#section-728x90_page_up').show();
		$('#section-728x90_page_down').show();
	}

	$('#ads_sidebar').click(function() {
  		$('#section-250x250_sidebar').fadeToggle(400);
	});

	if ($('#ads_sidebar:checked').val() !== undefined) {
		$('#section-250x250_sidebar').show();
	}

});
</script>

<?php
}