<?php get_header(); ?>

<section class="container">
	<div class="main">
		<?php while (have_posts()) : the_post(); ?>
	  <div class="title-special border-radius-top">
        <div class="padding-10">
          <h2><?php the_title(); ?></h2>
        </div>
      </div>
	  <div class="padding-10">
	  	<div class="clearfix"></div>
		<p><?php the_content(); ?></p>	
	  </div>
	  <?php endwhile; ?>
	</div>
</section>

<?php get_footer(); ?>