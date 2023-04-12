/**
 * Menu principal
 */
if ( jQuery( '#primary-menu' ).length ) {
	jQuery( '#btn-menu-mobile' ).on( 'click', function() {
		jQuery( '#menu-mobile' ).fadeToggle( 'fast' );
	} );
}

/**
 * Animaciones
 */

if ( jQuery( '#lineas-cervantes-1' ).length ) {
	jQuery( '#lineas-cervantes-1 img' ).delay( 1000 ).animate(
		{ width: '100%' },
		{ duration: 1000 }
	);
}
