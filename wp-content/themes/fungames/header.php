<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> >
<head profile="http://gmpg.org/xfn/11">
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title>
<?php
// Generate Page Title dynamically
if (is_home()) {
  bloginfo('name'); ?> - <?php bloginfo('description');
} elseif (is_category()) {
  single_cat_title(); ?> - <?php bloginfo('name');
} elseif (is_single()) {
  single_post_title();
} elseif (is_page()) {
  bloginfo('name'); ?>: <?php single_post_title();
} elseif (is_404()) {
  bloginfo('name'); ?> - <?php _e("Page not found", "fungames");
} elseif (is_search()) {
   bloginfo('name'); ?> - <?php _e("Search results for", "fungames"); echo esc_html($s, 1);
}
?>
</title>

<?php
// Custom Favicon
if ( get_option('fungames_custom_favicon_status') == 'enable' ) {
  $faviconurl = get_option('fungames_custom_favicon');
  ?><link rel="shortcut icon" href="<?php echo $faviconurl ?>" /><?php
}

// Custom Meta Description and Keywords
// Activate only if you don't use a WordPress SEO plugin!
if ( get_option('fungames_site_sitedesc_status') == 'enable' ) {
  ?>
  <meta name="keywords" content="<?php echo stripslashes(get_option('fungames_custom_site_keywords')); ?>" />
  <meta name="description" content="<?php echo stripslashes(get_option('fungames_custom_sitedesc')); ?>" />
  <?php
} ?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php _e("RSS Feed", "fungames"); ?>" href="<?php bloginfo('rss2_url'); ?>" />

<?php if ( defined('FUNGAMES_DEVELOP') && (FUNGAMES_DEVELOP == true) ) : ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style_dev.css" type="text/css" media="screen" />
<?php else: ?>
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="all" />
<?php endif; ?>

<?php
/* We add some JavaScript to pages with the comment form
 * to support sites with threaded comments (when in use).
 */
if ( is_singular() && get_option( 'thread_comments' ) )
  wp_enqueue_script( 'comment-reply' );

/* Always have wp_head() just before the closing </head>
 * tag of your theme, or you will break many plugins, which
 * generally use this hook to add elements to <head> such
 * as styles, scripts, and meta tags.
 */
wp_head();

// Display custom Header code here (NO HTML OR TEXT!)
if ( get_option('fungames_custom_headercode_status') == 'enable' ) {
  echo stripslashes( get_option('fungames_custom_headercode') );
}
?>
</head>

<body <?php body_class(); ?>>

<?php
// Do some actions before we open the page wrapper
do_action('fungames_before_wrapper');
?>

<div id="wrapper">
  <?php
  // Custom Header Image
  $header_img = get_header_image();
  if ( !empty($header_img) ) {
    $header_bg_style = 'style="background-image:url('.$header_img.');"';
  } else {
    $header_bg_style = '';
  }

  // Do some actions before the header output
  do_action('fungames_before_header');

  ?>
  <div id="top" <?php echo $header_bg_style; ?>>

    <div class="blogname">
      <?php
      // Generate dynamic heading for SEO
      if ( is_home() || is_front_page() ) {
        $heading_open = '<h1>';
        $heading_close = '</h1>';
      } else {
        $heading_open = '<h2>';
        $heading_close = '</h2>';
      }
      ?>
      <?php echo $heading_open; ?>
        <a href="<?php echo home_url();?>" title="<?php bloginfo('name');?>">
          <?php fungames_logo(); ?>
        </a>
      <?php echo $heading_close; ?>
    </div>

    <?php // include header banner ?>
    <div id="headbanner"> <?php echo stripslashes( get_option('fungames_headerad') ); ?></div>

    <?php // show search form ?>
    <div id="rss">
      <form method="get" id="search_form" action="<?php bloginfo ('url'); ?>">
        <input type="text" name="s" id="s" value="<?php _e("Search For Games...", "fungames"); ?>" onfocus="if (this.value == '<?php _e("Search For Games...", "fungames"); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e("Search For Games...", "fungames"); ?>';}" />
        <input type="submit" name="btn_search" id="btn_search" value="" />
      </form>
    </div> <?php // end rss ?>

    <div class="clear"></div>
  </div> <?php // end top ?>

  <?php
  // Do some actions before the main menu
  do_action('fungames_before_menu');
  ?>

  <?php // Header menu ?>
  <div id="catcontainer">
    <div id="catmenu">
      <ul>
      <?php
        // show header menu
        wp_nav_menu( array(
            'theme_location'  => 'primary',
            'menu_id' => '',
            'container' => '',
            'fallback_cb' => 'fungames_default_header_menu'
            )
         );
      ?>
      </ul>
    </div><!-- #catmenu -->
    <div class="clear"></div>
  </div>

  <div class="clear"></div>

  <?php
  // Do some actions after the main menu
  do_action('fungames_after_menu');
  ?>

  <div id="fgpage">
    <?php
    // Include the step carousel slider if activated (Only on the front page)
    get_template_part('step-carousel');

    // Display Breadcrub Navigation on all pages except on the front page
    fungames_breadcumb();

    // Include the login box
    get_template_part('loginform');

    // Do some actions before the content wrap
    do_action('fungames_before_content');