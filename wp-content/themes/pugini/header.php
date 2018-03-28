<?php
/**
 * @package pugini
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
		
			<div class="over"></div>
			<div class="header-top">
				<div class="container">
					<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
						<i class="fa fa-bars"></i>
					</button>
			
					<div class="top-icons">
						<?php get_template_part('inc/social-icons'); ?>
						
						<div class="search-box-wrapper">
							<div class="search-box">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>

					<div id="navbarCollapse" class="collapse navbar-collapse">
						<nav id="primary-navigation" class="primary-navigation" role="navigation">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'sf-menu nav navbar-nav' ) ); ?>
						</nav>
					</div>
				</div>
			</div><!-- .header-top -->
			<div class="header-main text-center container">
				<h1 class="site-title">
			
					<?php pugini_custom_logo(); ?>

					<?php  if( esc_attr(get_theme_mod( 'show_title', 1 ) ) ) :  ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php endif; ?>
				</h1>
				<?php if ( '' !== get_bloginfo( 'description' ) && display_header_text() == 1 ) : ?>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php endif; ?>

			</div><!-- .header-main -->
		
		</header><!-- #masthead -->
		
		<?php get_template_part( 'inc/featured-post' ); ?>
		
		<div id="mw_full">
			<div class="container">
				<div class="row">