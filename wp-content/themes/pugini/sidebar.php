<?php
/**
 * @package pugini
 */
 
if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
	return;
}
?>
<section id="secondary" class="widget-area col-lg-3 col-md-3 col-sm-4" role="complementary">

	<?php if ( ! dynamic_sidebar( 'blog-sidebar' ) ) : ?>
		<aside id="search" class="widget widget_search">
			<?php get_search_form(); ?>
		</aside>
		
		<aside class="widget widget_categories">

			<h3 class="widget-title"><?php _e( 'Categories', 'pugini' ); ?></h3>
				<ul><?php wp_list_categories('title_li='); ?></ul>

		</aside>
		
		<aside class="widget widget_recent_entries">

			<h3 class="widget-title"><?php _e( 'Recent Posts', 'pugini' ); ?></h3>
				<ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>

		</aside>
	<?php endif; // blog-widget ?>

</section><!-- #secondary .widget-area -->