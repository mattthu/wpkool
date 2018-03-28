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

		<h1 class="entry-title"><?php the_title(); ?></h1>
		
		<?php if ( get_post_format() == 'gallery' ) {
			?>
			<div class="flexslider">
		<?php 
		$args = array(
			'post_parent' => $post->ID,
			'post_type' => 'attachment',
			'orderby' => 'menu_order', // you can also sort images by date or be name
			'order' => 'ASC',
			'numberposts' => -1, // number of images (slides)
			'post_mime_type' => 'image',
			'post_status'    => null,
		);

		if ( $images = get_children( $args ) ) {
			// if there are no images in post, don't display anything
			echo '<ul class="slides">';

					foreach( $images as $image ) {
						echo '<li>';
						echo wp_get_attachment_image( $image->ID, 'thumb_img' );
						echo '</li>';
					}
					
			echo '</ul>'; 
		} ?>

		</div>
		<?php } else if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<?php the_post_thumbnail('pugini_thumb_img'); ?>
		<?php endif; ?>
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content( __( '[&hellip;]', 'pugini' ) );
		wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'pugini' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	
	<footer class="entry-meta">
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