<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width; initial-scale=1.0">
  <title><?php wp_title(' - ', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
  <?php wp_head(); ?>
  <?php include(TEMPLATEPATH .'/style.php'); ?>
  <script type="text/javascript"> jQuery( document ).ready( function( $ ) { $( '#games' ).masonry( { columnWidth: 145 } ); } ); </script>
</head>
<body <?php body_class(); ?>>

<header id="header">
  <div style="padding: 0 20px;">
    <div class="logo">
      <?php if (of_get_option('logo')) { ?>
          <div class="logo">
            <a href="<?php echo site_url(); ?>"><img src="<?php echo of_get_option('logo'); ?>"></a>
          </div>
      <?php } else { ?>
          <div class="logo">
            <a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"></a>
          </div>
      <?php } ?>
    </div>
    <div class="header-search">
      <form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="submit" class="submitbttn" value="" />
        <input type="text" value="Search Games..." name="s" id="s" class="text" />
      </form>
    </div>
    <div class="menu">
      <a class="btn"><?php _e("Categories", "kizitheme"); ?> <span class="icon icon-angle-down"></span></a>
      <ul class="actions">
        <?php wp_list_categories('orderby=name&title_li='); ?>
      </ul>
    </div>
    <!-- <a class="btn2">Hot <span class="icon icon-star"></span></a> -->
    <div class="social">
      <ul>
        <li class="facebook"><a href="<?php echo of_get_option('facebook_url'); ?>"><span class="icon icon-facebook"></span></a></li>
        <?php if (of_get_option('twitter_url')) { ?><li class="twitter"><a href="<?php echo of_get_option('twitter_url'); ?>"><span class="icon icon-twitter"></span></a></li><?php } ?>
        <?php if (of_get_option('plus_url')) { ?><li class="gplus"><a href="<?php echo of_get_option('plus_url'); ?>"><span class="icon icon-gplus"></span></a></li><?php } ?>
        <?php if (of_get_option('youtube_url')) { ?><li class="youtube"><a href="<?php echo of_get_option('youtube_url'); ?>"><span class="icon icon-youtube-play"></span></a></li><?php } ?>
      </ul>
    </div>
  </div>
</header>

<div class="fixheader"></div>