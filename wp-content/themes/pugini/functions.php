<?php

if ( ! function_exists( 'pugini_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function pugini_setup() {
	global $content_width;
	
	if ( ! isset( $content_width ) ) {
		$content_width = 870;
	}
	
	load_theme_textdomain( 'pugini', get_template_directory() . '/languages' );
	
	add_theme_support( 'automatic-feed-links' );
	
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'pugini_thumb_big', 1170, 550, true );
	add_image_size( 'pugini_thumb_img', 870, 400, true );
	add_image_size( 'pugini_thumb_mini', 640, 350, true );
	add_image_size( 'pugini_thumb_small', 100, 100, true );

	
	add_theme_support( 'custom-background', apply_filters( 'pugini_custom_background_args', array(
		'default-color' => 'e5e5e5',
		'default-image' => '',
	) ) );
	
	$args = array(
		'flex-width' => true,
		'flex-height' => true,
		'width' => 1980,
		'height' => 350,
		'default-text-color'  => '#88C0B4',
	);
	add_theme_support( 'custom-header', $args );
	
	// Post Formats	
	add_theme_support( 'post-formats', array( 'image', 'gallery', 'video', 'quote', 'link', 'audio', 'status' ) );
	
	register_nav_menus( array(
		'primary' => __( 'Main Menu', 'pugini' )
	) );
	
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	) );
	
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 440,
		'flex-height' => true,
		'flex-width'  => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'pugini_setup' );

/**
 * Enqueue scripts and styles
 */
function pugini_scripts() {
	$headings_font = esc_html( get_theme_mod( 'headings_fonts' ) );
	
	if( $headings_font ){
		wp_enqueue_style( 'pugini-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );
	}else{
		wp_enqueue_style( 'pugini-headings-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700' );
	}
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'jquery-flexslider', get_template_directory_uri() . '/css/flexslider.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'pugini-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ), '201408', true  );
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'hoverIntent', get_template_directory_uri() . '/js/hoverIntent.js', array( 'jquery' ), '', true );
	//wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), '201408', true  );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '201408', true  );
	wp_enqueue_script( 'pugini-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '201408', true  );
	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.js', array(), '', true );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pugini_scripts' );

function pugini_add_editor_styles() {
	add_editor_style( 'editor-style.css' );
}
add_action( 'after_setup_theme', 'pugini_add_editor_styles' );

function pugini_post_icon() {

	if( is_sticky() ) { 
		$post_icon = '<i class="fa fa-star-o"></i>';
	} else if ( get_post_format() == 'quote' ) {
 		$post_icon = '<i class="fa fa-quote-right"></i>';
 	} else if ( get_post_format() == 'gallery' ) {
 		$post_icon = '<i class="fa fa-camera"></i>';
 	} else if ( get_post_format() == 'image' ) {
 		$post_icon = '<i class="fa fa-picture-o"></i>';
 	} else if ( get_post_format() == 'status' ) {
 		$post_icon = '<i class="fa fa-bullhorn"></i>';
 	} else if ( get_post_format() == 'video' ) {
 		$post_icon = '<i class="fa fa-film"></i>';
 	} else if ( get_post_format() == 'audio' ) {
 		$post_icon = '<i class="fa fa-music"></i>';
 	} else if ( get_post_format() == 'link' ) {
 		$post_icon = '<i class="fa fa-link"></i>';
 	}  else {
 		$post_icon = '<i class="fa fa-pencil-square-o"></i>';
 	}

 	$output = '<div class="post-icon pull-right">';
	$output .= '<span>'.$post_icon.'</span>';
	$output .= '</div>';

	echo $output;
}

/**
 * Register Widget Areas
 */
function pugini_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Blog Sidebar', 'pugini' ),
		'id' => 'blog-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __( 'Page Sidebar', 'pugini' ),
		'id' => 'page-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __( 'Footer Widget 1', 'pugini' ),
		'id' => 'footer1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __( 'Footer Widget 2', 'pugini' ),
		'id' => 'footer2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __( 'Footer Widget 3', 'pugini' ),
		'id' => 'footer3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'pugini_widgets_init');

function pugini_pagination_nav(){
	global $wp_query, $post;
	
	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';
	
	?>
	
	<?php if ( is_single() ) :

		the_post_navigation( array(
			'next_text' => '<span class="meta-nav">' . __( 'Next Article', 'pugini' ) . '</span>' .
				'<span class="screen-reader-text">' . __( 'Next Article:', 'pugini' ) . '</span> ' .
				'<span>%title <i class="fa fa-angle-double-right"></i></span>',

			'prev_text' => '<span class="meta-nav">' . __( 'Previous Article', 'pugini' ) . '</span>' .
				'<span class="screen-reader-text">' . __( 'Previous Post:', 'pugini' ) . '</span> ' .
				'<span><i class="fa fa-angle-double-left"></i> %title</span>',
			)
		);
		
	?>
	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
		<nav class="navigation <?php echo $nav_class; ?>" role="navigation">
			
			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'pugini' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'pugini' ) ); ?></div>
			<?php endif; ?>

		</nav>
	<?php endif;
}

/* Customize font-size of tag cloud widget
----------------------------------- */
 
function pugini_set_number_tags($args) {
	$args['smallest'] = 12;
	$args['largest'] = 12;
	return $args;
}
add_filter('widget_tag_cloud_args','pugini_set_number_tags');

if ( ! function_exists( 'pugini_body_classes' ) ) :

	function pugini_body_classes( $classes ) {

		// Adds a class of group-blog to blogs with more than 1 published author
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		$layout_sidebar = get_theme_mod( 'pugini_sidebar_position' );
		if ( $layout_sidebar == 'left' ) {
			$classes[] = 'left-sidebar';
		}
		
		return $classes;
	}
	
endif; 
add_filter( 'body_class', 'pugini_body_classes' );

/**
* Logo
*/
function pugini_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

require_once( trailingslashit( get_template_directory() ) . 'pugini-customize-pro/more-themes/class-customize.php' );
?>