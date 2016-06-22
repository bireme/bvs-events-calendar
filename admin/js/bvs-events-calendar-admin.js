(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$(document).on('keyup', '.acf_relationship input.relationship_search', function( e ){

		e.stopImmediatePropagation();

        // vars
        var val = $(this).val().toLowerCase(),
            $el = $(this).closest('.relationship_left').find('.relationship_list');

        $el.find('li a').each(function() {
            var text = $(this)
            	.clone()    //clone the element
			    .children() //select all the children
			    .remove()   //remove all the children
			    .end()      //again go back to selected element
			    .text()
			    .toLowerCase();

            if ( text.indexOf(val) == -1 )
                $(this).parent().addClass('hide_relationship_item');
            else
            	$(this).parent().removeClass('hide_relationship_item');
        });

	});

})( jQuery );
