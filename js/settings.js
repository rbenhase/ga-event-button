(function($){
  
	FLBuilder._registerModuleHelper('ga-event-button', {

		rules: {
			link: {
				required: true
			},
			border_size: {
				required: true,
				number: true
			},
			bg_opacity: {
				required: true,
				number: true
			},
			font_size: {
				required: true,
				number: true
			},
			padding: {
				required: true,
				number: true
			},
			border_radius: {
				required: true,
				number: true
			},
			ga_category: {
				required: true
			},
			ga_action: {
				required: true
			},
			ga_value: {
				digits: true
			},
		},
		
		init: function()
		{
			$( 'input[name=bg_color]' ).on( 'change', this._bgColorChange );
			
			this._bgColorChange();
		},
		
		_bgColorChange: function()
		{
			var bgColor = $( 'input[name=bg_color]' ),
				style   = $( '#fl-builder-settings-section-style' );
			
			if ( '' == bgColor.val() ) {
				style.hide();
			}
			else {
				style.show();
			}
		}
	});
})(jQuery);