<?php
/**
 * @package pugini
 */

 get_header();?>

<section id="primary" class="container content-area col-lg-9 col-md-9 col-sm-8">

	<main id="main" class="site-main" role="main">
		
		<?php while ( have_posts()) : the_post(); 
		
			get_template_part( 'content', 'page' ); 
		
		?>
	
		<?php comments_template('', true); ?>
		
		<?php endwhile; ?>
		
	</main><!-- #main -->
	
</section><!--/.primary -->

<section id="secondary" class="widget-area col-lg-3 col-md-3 col-sm-4" role="complementary">

	<?php if (! dynamic_sidebar( 'page-sidebar' ) ) : ?>
	
	<?php endif; ?>

</section><!-- .widget-area -->

<?php get_footer(); ?>