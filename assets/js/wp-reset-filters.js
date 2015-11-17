/* global WP_Reset_Filters */
jQuery( document ).ready( function ( $ ) {

	// Alter the "Filter" button
	$( '#post-query-submit' )
		.addClass( 'button-primary' )
		.after(
			'<button class="button" id="wp-reset-filters" ' + WP_Reset_Filters.button_disabled + '>' + WP_Reset_Filters.button_text + '</button>'
		);

	// Reload on "Reset" click
	$( '#wp-reset-filters' ).on( 'click', function( e ) {
		e.preventDefault();

		// Guess at the most logical place to reload
		var reload_url = $( '#adminmenu li.current a.current' ).attr( 'href' );

		window.location.href = reload_url;
	} );
} );
