/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Notice section
	wp.customize( 'uri_department_notice_text', function( value ) {
		value.bind( function( to ) {
			$( '#dept-notice' ).text( to );
		});
	});
	wp.customize( 'uri_department_notice_type', function( value ) {
		value.bind( function( to ) {
			$( '#dept-notice' ).attr('class', '').addClass( to );
		} );
	});


	wp.customize( 'uri_department_department_address', function( value ) {
		value.bind( function( to ) {
			$( '#dept-address' ).text( to );
		});
	});
	wp.customize( 'uri_department_department_email', function( value ) {
		value.bind( function( to ) {
			$( '#dept-email' ).attr( 'href', 'mailto:'+to ).text( to );
		});
	});
	wp.customize( 'uri_department_department_phone', function( value ) {
		value.bind( function( to ) {
			$( '#dept-phone' ).text( to );
		});
	});

	wp.customize( 'uri_department_department_twitter', function( value ) {
		value.bind( function( to ) {
			$( '#dept-twitter' ).attr( 'href', 'http://www.twitter.com/' + to );
		});
	});
	wp.customize( 'uri_department_department_instagram', function( value ) {
		value.bind( function( to ) {
			$( '#dept-instagram' ).attr( 'href',  to );
		});
	});
	wp.customize( 'uri_department_department_facebook', function( value ) {
		value.bind( function( to ) {
			$( '#dept-facebook' ).attr( 'href',  to );
		});
	});
	wp.customize( 'uri_department_department_youtube', function( value ) {
		value.bind( function( to ) {
			$( '#dept-youtube' ).attr( 'href',  to );
		});
	});
	wp.customize( 'uri_department_department_linkedin', function( value ) {
		value.bind( function( to ) {
			$( '#dept-linkedin' ).attr( 'href',  to );
		});
	});


	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '#deptsec h1 a' ).eq(0).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '#dept-description' ).text( to );
		} );
	} );



} )( jQuery );


