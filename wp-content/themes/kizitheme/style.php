<?php global $post; ?>
<style type="text/css">
<?php $background = of_get_option('body_bg');
            if ($background) {
                if ($background['color']) {
                    echo 'body { background-color: '.$background['color'].'; background-image: url('.$background['image'].'); background-repeat: '.$background['repeat'].'; background-position: '.$background['position'].'; background-attachment: '.$background['attachment'].';  }';
                }
            } else {
}; ?>

<?php $logo = of_get_option('logo');
            if ($logo) {
                echo 'header.logo a { background-image: url('.$logo.'); }';
}; ?>

a, a:active, a:visited { color: <?php echo of_get_option('link-color'); ?>; }
a:hover { color: <?php echo of_get_option('sec-color'); ?>; }

#header, .title-special {
	background-color: <?php echo of_get_option('ppal-color'); ?>;
}

#header, .games, .title-special {
	border-color: <?php echo of_get_option('ppal-color'); ?>;
}

.games .playbttn, .pagenavi span.current, a.btn2  {
	background-color: <?php echo of_get_option('sec-color'); ?>;
}

a.btn2, .games:hover {
	border-color: <?php echo of_get_option('sec-color'); ?>;
}

.games .playbttn:hover, .title-special span.logofont, .menu span.icon:before, a.btn2 span.icon:before, .menu ul.actions a:hover {
	color: <?php echo of_get_option('sec-color'); ?>;
}

<?php if (of_get_option('preloader')) { ?>
.thegame {
	display:block;
}
.preloader {
	display: none;
}
<?php } ?>

<?php if(class_exists('Infinite_Scroll')) { ?>
.pagenavi { display: none; }
<?php } ?>

</style>