<?php
/**
 * @package pugini
 */

 get_header();?>

<section id="primary" class="container content-area  col-lg-9 col-md-9 col-sm-8">

		<main id="main" class="site-main" role="main">
		
		<?php while ( have_posts()) : the_post(); 
		
			get_template_part( 'content', 'single' ); 
		
		?>

		<?php pugini_pagination_nav(); ?>
	
		<?php comments_template('', true); ?>
		
		<?php endwhile; ?>
		
		</main><!-- #main -->
	
</section><!--/.primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>