/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Site title
	wp.customize('pugini_header_bg_color',function( value ) {
		value.bind( function( newval ) {
			$('#masthead, .header-top .search-box-wrapper input').css('background-color', newval );
		} );
	});
	// Site description
	wp.customize('header_textcolor',function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-header h2' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-header h2' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
			//$('h2.site-description').css('color', newval );
		} );
		//value.bind( function( newval ) {
		//	
		//} );
	});

} )( jQuery );
