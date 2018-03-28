<?php
/**
 * @package pugini
 */

get_header(); ?>
 
<section id="primary" class="container content-area col-lg-9 col-md-9 col-sm-8">
	<div id="content" class="site-content" role="main">
		
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
					the_archive_title('<h1 class="page-title">', '</h1>');
					the_archive_description('<div class="archive-description">', '</div>');	
				?>
			</header><!-- .page-header -->
			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php get_template_part( 'content', get_post_format() ); ?>
				
			<?php endwhile; ?>
			
			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>
				
			<?php endif; ?>
			
			<?php pugini_pagination_nav(); ?>

	</div><!-- #content -->

</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>