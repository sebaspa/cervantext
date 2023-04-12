/**
 * Menu principal
 */
if ( jQuery( '#primary-menu' ).length ) {
	jQuery( '#btn-menu-mobile' ).on( 'click', function() {
		jQuery( '#menu-mobile' ).fadeToggle( 'fast' );
	} );
}

/**
 * Home
 */

/**
 * Animacion banner 1
 */

if ( jQuery( '#lineas-cervantes-1' ).length ) {
	jQuery( '#lineas-cervantes-1 img' )
		.delay( 1000 )
		.animate( { width: '100%' }, { duration: 1000 } );
}

if ( jQuery( '#banner-tiping-msg' ).length ) {
	const texts = jQuery( '#banner-tiping-msg' ).data( 'words' );
	new Typed( '#banner-tiping-msg', {
		strings: texts.split( ',' ),
		typeSpeed: 100,
		backSpeed: 50,
		backDelay: 500,
		startDelay: 50,
		cursorChar: '_',
		loop: true,
	} );
}
