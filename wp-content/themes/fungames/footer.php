
<?php
// Do some actions before the footer
do_action('fungames_before_footer');
?>

<div id="footbar">

  <div id="menu">
    <ul>
      <?php
      // show header menu
      wp_nav_menu( array(
          'theme_location'  => 'footer',
          'menu_id' => '',
          'container' => '',
          'fallback_cb' => 'fungames_default_footer_menu'
          )
       );
    ?>
    </ul>
  </div> <?php // end menu ?>

  <div class="clear"></div>

  <div id="footer">
    <?php get_sidebar('footer'); ?>
  </div>

  <?php
  $affiliate_link = get_option('fungames_affiliate');
  if ( empty( $affiliate_link ) ) $affiliate_link = 'http://myarcadeplugin.com/';
  $affiliate_text = get_option('fungames_affiliate_text');
  if ( empty( $affiliate_text ) ) $affiliate_text = 'WordPress Arcade';
  ?>
  <div style="float:right;margin: 10px 10px 0 0;"><?php bloginfo('name'); ?> is proudly powered by <a href="<?php echo $affiliate_link; ?>" title="<?php echo $affiliate_text; ?>"><?php echo $affiliate_text; ?></a></div>
  <div class="clear"></div>

</div> <?php // end footer ?>

<?php
// Do some actions after the footer
do_action('fungames_after_footer');
?>

</div> <?php // end fgpage ?>

<?php
wp_footer();

// custom footer code
if ( get_option('fungames_custom_footercode_status') == 'enable' ) {
  echo stripslashes(get_option('fungames_custom_footercode'));
}
?>
<?php /*echo '<!-- '.get_num_queries().' queries. '; timer_stop(1); echo ' seconds. -->'; */ ?>
</div> <?php // end wrapper ?>
</body>
</html>