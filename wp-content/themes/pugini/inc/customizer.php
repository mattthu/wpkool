<?php
/**
 * 
 *
 * @package pugini
 */

/**
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pugini_customize_register($wp_customize){

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_control( 'display_header_text' )->label = __( 'Display Site Tagline', 'pugini' );

	$font_google = array(
		'Open Sans:400italic,700italic,400,700' => __( 'Open Sans', 'pugini' ),
		'Oswald:400,700' => __( 'Oswald', 'pugini' ),
		'Montserrat:400,700' => __( 'Montserrat', 'pugini' ),
		'Droid Sans:400,700' => __( 'Droid Sans', 'pugini' ),
		'Lato:400,700,400italic,700italic' => __( 'Lato', 'pugini' ),
		'Arvo:400,700,400italic,700italic' => __( 'Arvo', 'pugini' ),
		'PT Serif:400,700' => __( 'PT Serif', 'pugini' )
	);
	
	// Setting Title 
	$wp_customize->add_setting( 'show_title',  array(
			'default' => 1,
			'sanitize_callback' => 'pugini_sanitize_checkbox'
	 ) ); 
	 $wp_customize->add_control( 'show_title', array(
			'type'     => 'checkbox',
			'priority' => 30,
			'label'    => __( 'Display Site Title', 'pugini' ),
			'section'  => 'title_tagline',
	 ) );
	 
	// Layout Options
	$wp_customize->add_section( 'pugini_general' , array(
		'title'       => __( 'Layout Options', 'pugini' ),
		'priority'    => 41,
		'description' => '',
	) );
	
 	$wp_customize->add_setting( 'pugini_head_search', array (
		'default'        => '',
		'sanitize_callback' => 'pugini_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'hide_search', array(
		'label' => __( 'Hide top icon search', 'pugini'),
		'section' => 'pugini_general',
		'settings' => 'pugini_head_search',
		'type' => 'checkbox',
	));
	
	$wp_customize->add_setting('pugini_sidebar_position', array(
		'description' => __( 'Select Sidebar Position' , 'pugini' ),
		'default' => 'right',
		'sanitize_callback' => 'pugini_sanitize_sidebar_position',
	));
	
	$wp_customize->add_control('pugini_sidebar_position', array(
		'label'      => __( 'Display Sidebar on Left or Right', 'pugini' ),
		'section'    => 'pugini_general',
		'settings'   => 'pugini_sidebar_position',
		'type'       => 'select',
		'choices'    => array(
			'left' => __( 'Left', 'pugini' ),
			'right' => __( 'Right', 'pugini' )
			),
	));
	
	$wp_customize->add_setting(
        'headings_fonts',
        array(
            'sanitize_callback' => 'pugini_sanitize_fonts',
    ));
    
    $wp_customize->add_control(
        'headings_fonts',
        array(
            'type' => 'select',
			'default' => '1',
            'description' => esc_html__( 'Select your desired font for the headings. Playfair Display is the default Heading font.', 'pugini'),
            'section' => 'pugini_general',
            'choices' => $font_google
    ));
	
	// Home Box
	$wp_customize->add_section( 'pugini_homepage_settings', array(
		'title' => __( 'Homepage Promo Text Settings', 'pugini' ),
		'priority' => 42
	));
	
	$wp_customize->add_setting( 'pugini_home_title', array(
		'sanitize_callback' => 'pugini_sanitize_text',
	));
	
	$wp_customize->add_control( 'home_title', array(
		'label' => __('Title Box Home', 'pugini'),
		'section' => 'pugini_homepage_settings',
		'settings' => 'pugini_home_title',
		'type' => 'text',
	));
	$wp_customize->add_setting( 'pugini_home_text', array(
		'sanitize_callback' => 'pugini_sanitize_text',
	));
	
	$wp_customize->add_control( 'home_text', array(
		'label' => __('Text Box Home', 'pugini'),
		'section' => 'pugini_homepage_settings',
		'settings' => 'pugini_home_text',
		'type' => 'textarea',
	));
	
	// Featured Top Posts
	$wp_customize->add_section( 'pugini_featured', array(
		'title' => __( 'Featured Posts Area', 'pugini' ),
		'priority' => 43,
		)
	);
	
	$wp_customize->add_setting( 'pugini_featured_top', array(
		'sanitize_callback' => 'pugini_sanitize_category'
	) );	
	
	$wp_customize->add_control( 
		new Pugini_WP_Customize_Category_Control( 
			$wp_customize,
			'pugini_post_top', 
			array(
				'label' => __( 'Featured Posts Category', 'pugini' ),
				'section' => 'pugini_featured',
				'settings' => 'pugini_featured_top',
			)
		) 
	);
	
	$wp_customize->add_setting( 'pugini_show_post_top_info', array(
		'default' => '1',
		'sanitize_callback' => 'pugini_sanitize_checkbox',
	));
	
	$wp_customize->add_control('pugini_show_post_top_info', array(
		'label' => __( 'Show Featured Posts', 'pugini'),
		'section' => 'pugini_featured',
		'settings' => 'pugini_show_post_top_info',
		'type' => 'checkbox'
	));
	
	$wp_customize->add_setting( 'pugini_number_cat' , array(
		'sanitize_callback' => 'pugini_sanitize_number'
	));
	
	$wp_customize->add_control( 'pugini_number_cat' , array(
		'label' => __( 'Number of posts you want to show in featured area', 'pugini' ), 
		'section' => 'pugini_featured',
		'settings' => 'pugini_number_cat',
		'type' => 'number',
	));
	
	// Social Icons
	$wp_customize->add_section('pugini_social', array(
        'title'    => __('Social Media Links', 'pugini'),
        'priority' => 44,
    ));
	
    $wp_customize->add_setting('icon_facebook', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('pugini_icon_facebook', array(
        'label'      => __('Facebook', 'pugini'),
        'section'    => 'pugini_social',
        'settings'   => 'icon_facebook',
    ));
	
	$wp_customize->add_setting('icon_twitter', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	   
	$wp_customize->add_control('pugini_icon_twitter', array(
        'label'      => __('Twitter', 'pugini'),
        'section'    => 'pugini_social',
        'settings'   => 'icon_twitter',
    ));	
	
	$wp_customize->add_setting('icon_google', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	   
	$wp_customize->add_control('pugini_icon_google', array(
        'label'      => __('Google+', 'pugini'),
        'section'    => 'pugini_social',
        'settings'   => 'icon_google',
    ));
	
	$wp_customize->add_setting('icon_youtube', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	   
	$wp_customize->add_control('pugini_icon_youtube', array(
        'label'      => __('Youtube', 'pugini'),
        'section'    => 'pugini_social',
        'settings'   => 'icon_youtube',
    ));
	
	$wp_customize->add_setting('icon_linkedin', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	   
	$wp_customize->add_control('pugini_icon_linkedin', array(
        'label'      => __('LinkedIn', 'pugini'),
        'section'    => 'pugini_social',
        'settings'   => 'icon_linkedin',
    ));
	
	$wp_customize->add_setting('icon_instagram', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	   
	$wp_customize->add_control('pugini_icon_instagram', array(
        'label'      => __('Instagram', 'pugini'),
        'section'    => 'pugini_social',
        'settings'   => 'icon_instagram',
    ));
	
	$wp_customize->add_setting('icon_flickr', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	   
	$wp_customize->add_control('pugini_icon_flickr', array(
        'label'      => __('Flickr', 'pugini'),
        'section'    => 'pugini_social',
        'settings'   => 'icon_flickr',
    ));
	
	$wp_customize->add_setting('icon_pinterest', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	   
	$wp_customize->add_control('pugini_icon_pinterest', array(
        'label'      => __('Pinterest', 'pugini'),
        'section'    => 'pugini_social',
        'settings'   => 'icon_pinterest',
    ));
	
	$wp_customize->add_setting('icon_vimeo', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	   
	$wp_customize->add_control('pugini_icon_vimeo', array(
        'label'      => __('Vimeo', 'pugini'),
        'section'    => 'pugini_social',
        'settings'   => 'icon_vimeo',
    ));
	
	$wp_customize->add_setting('icon_tumblr', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	   
	$wp_customize->add_control('pugini_icon_tumblr', array(
        'label'      => __('Tumblr', 'pugini'),
        'section'    => 'pugini_social',
        'settings'   => 'icon_tumblr',
    ));
	
	$wp_customize->add_setting('icon_dribbble', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	   
	$wp_customize->add_control('pugini_icon_dribbble', array(
        'label'      => __('Dribbble', 'pugini'),
        'section'    => 'pugini_social',
        'settings'   => 'icon_dribbble',
    ));
	
	$wp_customize->add_setting('icon_rss', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	   
	$wp_customize->add_control('pugini_icon_rss', array(
        'label'      => __('RSS', 'pugini'),
        'section'    => 'pugini_social',
        'settings'   => 'icon_rss',
    ));
	
	// Setting Color
    $wp_customize->add_setting('pugini_header_bg_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'   => 'postMessage',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'pugini_header_bg_color', array(
        'label'    => __('Header Background Color', 'pugini'),
        'section'  => 'colors',
        'settings' => 'pugini_header_bg_color',
    )));
	
	// Footer Options
	$wp_customize->add_section( 'pugini_footer', array(
        'title'    => __('Footer Options', 'pugini'),
        'priority' => 45,
    ));
	
 	$wp_customize->add_setting('pugini_text_footer', array(
		'sanitize_callback' => 'pugini_sanitize_text',
	));

	$wp_customize->add_control( 'footer_text', array(
		'description' => __( 'Enter your text in footer.', 'pugini' ),
		'section' => 'pugini_footer',
		'settings' => 'pugini_text_footer',
		'priority' => 1
	));	
}
add_action('customize_register', 'pugini_customize_register');

/**
 * Sanitize checkbox
 */
if (!function_exists( 'pugini_sanitize_checkbox' ) ) :
	function pugini_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}
endif;

/**
 * Text
 */
function pugini_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Choices
 */
function pugini_sanitize_header_position( $input ) {
	$valid = array(
		'left' => __( 'Left', 'pugini' ),
        'right' => __( 'Right', 'pugini' ),
        'center' => __( 'Center', 'pugini' )
	);
 
	if ( array_key_exists( $input, $valid  ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Adds sanitization callback function: Number
 */
function pugini_sanitize_number( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

/**
 * Sidebar
 */
function pugini_sanitize_sidebar_position( $input ) {
	$valid = array(
		'left' => __( 'Left', 'pugini' ),
        'right' => __( 'Right', 'pugini' )
	);

	if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Category
 */ 
function pugini_sanitize_category( $input ) {
	if ( term_exists(get_cat_name( $input ), 'category') )
		return $input;
	else 
		return '';
}
if ( class_exists( 'WP_Customize_Control' ) ) {
    class Pugini_WP_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'pugini' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );

            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}

/*
 * Sanitizes Fonts 
 **/
function pugini_sanitize_fonts( $input ) {  
    $valid = array(
		'Open Sans:400italic,700italic,400,700' => __( 'Open Sans', 'pugini' ),
		'Oswald:400,700' => __( 'Oswald', 'pugini' ),
		'Montserrat:400,700' => __( 'Montserrat', 'pugini' ),
		'Droid Sans:400,700' => __( 'Droid Sans', 'pugini' ),
		'Lato:400,700,400italic,700italic' => __( 'Lato', 'pugini' ),
		'Arvo:400,700,400italic,700italic' => __( 'Arvo', 'pugini' ),
		'PT Serif:400,700' => __( 'PT Serif', 'pugini' )
	);
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pugini_customize() {
	wp_enqueue_script( 'pugini_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), true );
}
add_action( 'customize_preview_init', 'pugini_customize' );

function pugini_css() {
	$header_text_color = get_header_textcolor();

	$headings_font = esc_html(get_theme_mod('headings_fonts')); 

	$font_pieces = explode(":", $headings_font);

    ?>
		<style type="text/css">
			<?php if ( get_theme_mod('pugini_header_bg_color') ) :
			?>
				#masthead { 
					background-color: <?php echo esc_html( get_theme_mod( 'pugini_header_bg_color', '#ffffff' ) ); ?>; 
				}
			<?php endif; ?>
			
			<?php
			// Has the text been hidden?
			if ( 'blank' == $header_text_color ) :
			?>
				.site-header h2 {
					position: absolute;
					clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
					clip: rect(1px, 1px, 1px, 1px);
				}
			<?php
			// If the user has set a custom color for the text use that
			else :
			?>
				.site-title a,
				.site-title a:hover,
				.site-title a:focus,
				.site-header h2 {
					color: #<?php echo esc_html( $header_text_color ); ?>;
				}
			<?php endif; ?>
			
			<?php if ( get_header_image() ) : ?>
			.site-header {
				background: url('<?php header_image(); ?>') no-repeat scroll 50% 0% / cover;
				min-height: 350px;
			}
			<?php endif; ?>
			
			<?php if ( $headings_font ) { ?>
			h1, h2, h3, h4, h5, h6, .page-entry-header .entry-title {
				font-family: <?php echo esc_html( $font_pieces[0] ); ?>
			}
			<?php } ?>
		</style>
    <?php
}
add_action( 'wp_head', 'pugini_css');