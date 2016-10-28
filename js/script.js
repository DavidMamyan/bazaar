$(document).ready(function () {
	var current_top = parseInt($('#follow').css('top'));
		$('#follow').fadeIn('normal').click(function(){
	});
	$(window).scroll(function(){
		var top = $(window).scrollTop();
		$('#follow').css('top', top + current_top);
	})

	 // * Currency widget  v1.0
 // * Tested with jQuery 1.3.x and 1.4.x.
 // * Released under CC-BY-SA http://creativecommons.org/licenses/by-sa/3.0/

		 	$('#currency_widget_holder').currency_widget(); // currency widget with default options
			$('#currency_widget_holder').currency_widget({ editable_amount: false }); // don't let the visitor change the amount to convert
			$('#currency_widget_holder').currency_widget({ amount: '10' }); // preset the amount
			$('#currency_widget_holder').currency_widget({ source_currency: 'EUR', target_currency: 'USD' }); // preset the source and target currencies
			$('#currency_widget_holder').currency_widget({ editable_source_currency: false, editable_target_currency: false }); // don't let the visitor change currencies
			$('#currency_widget_holder').currency_widget({ 
				 source_currencies: { 'USD': 'US Dollar ($)', 'EUR': 'Euro (€)', 'SEK': 'Svenska kronor (kr)' }
				,target_currencies: { 'USD': 'US Dollar ($)', 'EUR': 'Euro (€)', 'SEK': 'Svenska kronor (kr)' }
			}); // set the available currencies
			$('#currency_widget_holder').currency_widget({ header: true, header_text: 'Currency converter' }); // set the header
			$('#currency_widget_holder').currency_widget({ url: '../mod/currency-ajax.php' }); // set the url to the serversite converter
			$('#currency_widget_holder').currency_widget({ 
				 show_labels: true
				,labels: {
					 amount: 'Amount:'
					,from: 'From:'
					,to: 'To:'
					,convert: 'Convert!'
					,price: 'Price:'
				}
			}); // Whether to show labels and the labels themselves
			
			// you can also set these options globally, e.g.
			$.currency_widget.defaults.amount = '10';
			$('#currency_widget_holder').currency_widget(); // amount will be set to 10
 
})
