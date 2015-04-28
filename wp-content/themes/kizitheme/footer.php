<footer id="footer">
	<div class="container-1400">
		© <?php bloginfo('name'); ?> 2013 | <?php bloginfo('description'); ?>
    <div class="right">
      <div class="menu-footer">
        <ul>
          <?php if ( has_nav_menu('footer') ) { ?> 
            <?php wp_nav_menu( array('theme_location'  => 'footer', 'menu' => 'footer', 'container' => '', 'items_wrap' => '%3$s')); ?>
          <?php } ?>
          <li><?php _e("Powered by", "kizitheme"); ?> <a href="http://juegostoon.net/" target="_blank">Kizi Games</a></li>
        </ul>
      </div>
    </div>
	</div>
</footer>

<?php if (is_single()) { ?>
<?php $preload = of_get_option('preloader_time'); ?>
<script type="text/javascript">
var j = jQuery.noConflict();
j(function (){
    var seconds = "<?php echo $preload; ?>";
    j('body').oneTime(seconds*1000, function() {
      j('.preloader').hide();
      j('.thegame').show();
    }); 
});
j(document).ready(function(){
            j(".skip").click(function(){
                j('.preloader').hide();
                j('.thegame').show();
            });
            
        });
</script>
<?php } ?>

<?php echo of_get_option('tracking_code') ?>

<?php wp_footer(); ?>

</body>
</html>