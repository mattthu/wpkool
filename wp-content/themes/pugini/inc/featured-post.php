<?php

if ( get_theme_mod('pugini_show_post_top_info', 1 ) && is_front_page() ) : 

$featured_cat_id = get_theme_mod( 'pugini_featured_top' );
$number_featured_post = get_theme_mod( 'pugini_number_cat' );

$args = array(
        'offset'           => 0,
        'cat' => $featured_cat_id,
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'post_type'        => 'post',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'post_status'      => 'publish',
        'posts_per_page'      => $number_featured_post,
        'suppress_filters' => true
);

$the_query = new WP_Query( $args );
?>
<section class="featured-carousel mw-box-slider">

	<div class="flexslider">
		<ul class="slides">
		<?php if ($the_query->have_posts()) : ?>
		<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
		
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
    		<li>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php the_post_thumbnail('thumb_mini'); ?>
					<header class="entry-header">
						<div class="cat-link">
							<?php the_category(', '); ?>
						</div>

						<div class="mw_title">
							<h2 class="entry-title">
								<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h2>
						</div><!-- .mw_title -->
					</header><!-- .entry-header -->
				</article>
		    </li>
		<?php endif; ?>
		
		<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
		</ul>
	</div>
</section>

<?php endif; ?>