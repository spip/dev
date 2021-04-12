;jQuery(function($) {

	// Au chargement de la page
	$(function() {
		toggle_code();
	});

	// Lors de rechargements ajax
	if (window.jQuery){
		$(function(){
			onAjaxLoad(toggle_code);
		});
	}

	/**
	 * Code pliable
	 * Ce sont des liens qui mènent vers des ancres internes.
	 * Les contenus correspondants sont cachés et affiché uniquement au clic.
	 *
	 * @example
	 * <a data-toggle="code" href="#truc">...</a>
	 * <div data-toggable id="truc">...<div>
	 */
	 function toggle_code() {
		$( 'a[data-toggle=code][href]' )
			.each(function() {
				var href = $(this).attr('href');
				var cible = href.substring(href.indexOf("#"));
				if (typeof($(cible).attr('data-toggable')) !== 'undefined') {
					$(cible).hide();
				}
			})
			.off('click.collapse').on('click.collapse', function(e) {
				e.preventDefault();
				var href = $(this).attr('href');
				var cible = href.substring(href.indexOf("#"));
				if (typeof($(cible).attr('data-toggable')) !== 'undefined') {
					$(cible).slideToggle('fast');
					$(this).toggleClass('open');
				}
			});
	}

});