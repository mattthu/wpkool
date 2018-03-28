<?php
/**
 * @package pugini
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<div class="cat-link">
			<?php the_category(', '); ?>
		</div>

		<div class="mw_title">
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
		</div><!-- .mw_title -->
		
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<div class="thumb_img_post">
				<a href="<?php the_permalink(); ?>" rel="bookmark">
					<?php the_post_thumbnail('pugini_thumb_img'); ?>
				</a>
			</div>
		<?php endif; ?>

	</header><!-- .entry-header -->
	
	<div class="entry-summary clearfix">
		<?php the_content( __( '[&hellip;]', 'pugini' ) );	?>
	</div><!-- .entry-summary -->

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'pugini' ), '<span class="edit-link">', '</span>' ); ?>
		
		<?php pugini_post_icon(); ?>
	</footer><!-- .entry-meta -->
	
</article><!-- #post-## -->