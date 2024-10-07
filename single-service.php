<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!-- Page Content -->
		<div class="container">

			<h1 class="my-4"><?php the_title(); ?></h1>

			<!-- Marketing Icons Section -->
			<div class="row">
			<div class="col-md-4"><?php get_sidebar('service'); ?></div>
			<div class="col-md-8"><?php get_template_part('inc/content'); ?></div>
			</div>
			<div class="row">
				<p>Visits: <strong><?php the_post_views(); ?><strong></p>
			</div>
			 
			<?php if(!empty(CT_SETTINGS['CT_related_posts']) && CT_SETTINGS['CT_related_posts'] == true): _related_posts(); endif;?>
		</div>
<?php endwhile;
endif;
?>
<!-- /.container -->

<!-- Footer -->
<?php get_footer(); ?>