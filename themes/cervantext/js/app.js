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

/**
 * Preguntas frecuentes
 */

if ( jQuery( '.btn-toggle-question' ).length ) {
	jQuery( '.btn-toggle-question' ).on( 'click', function() {
		const btnElement = jQuery( this );
		btnElement.find( 'i' ).toggleClass( 'rotate-45' );
		btnElement
			.parent( 'div' )
			.toggleClass( 'bg-light-pink-500' )
			.toggleClass( 'bg-white' );
		btnElement
			.parent( 'div' )
			.find( '.response-content' )
			.stop( true, true )
			.fadeToggle();
	} );
}
