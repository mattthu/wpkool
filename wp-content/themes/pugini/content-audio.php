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
	
	<?php if (is_home() || is_search() || is_archive() || is_tag()) : // Only display Excerpts for Search ?>
	<div class="entry-summary clearfix">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content post-audio clearfix">
		<?php the_content( __( '[&hellip;]', 'pugini' ) );	?>
	</div><!-- .entry-content -->
	<?php endif; ?>
	
	<footer class="entry-meta">
		<a class="more-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php _e( 'Read more', 'pugini' ); ?><span> &rarr;</span>
		</a>
		
		<div class="post-time">
			<i class="fa fa-calendar"></i><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_the_date(); ?>
			</a>
		</div>
		
		<div class="author-link">
			<i class="fa fa-user"></i><?php the_author_posts_link() ?>
		</div>
		
		<?php the_tags( '<i class="tag-link fa fa-tags"></i>', ', ', '' ); ?>

		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
			<i class="comments-link fa fa-comments-o"></i><?php comments_popup_link('0', '1', '%', 'comments-link', ''); ?>
		<?php endif; ?>
		
		<?php edit_post_link( __( 'Edit', 'pugini' ), '<span class="edit-link">', '</span>' ); ?>
		
		<?php pugini_post_icon(); ?>
	</footer><!-- .entry-meta -->	
	
</article><!-- #post-## -->