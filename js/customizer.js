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
			if($( '.site-notice' ).length == 0) {
				$('#uri-header').after('<div class="site-notice-wrapper"><div class="marginator"><div class="site-notice"></div></div></div>');
			}
			if(to == ''){
				$( '.site-notice' ).remove();
			}
			var decoded = $("<textarea/>").html(to).text();
			$( '.site-notice' ).html( decoded );
		});
	});
	wp.customize( 'uri_department_notice_type', function( value ) {
		value.bind( function( to ) {
			$( '.site-notice-wrapper' ).attr('class', 'site-notice-wrapper').addClass( to );
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



} )( jQuery );


