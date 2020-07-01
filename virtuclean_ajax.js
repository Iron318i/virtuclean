(function( $ ) {
		jQuery(document).ready(function($) {

			$('#gift_pillow').on('click',function(e) {
				//console.log('click');
				e.preventDefault();
				$.ajax({
					url: ajaxurl,
					method: 'post',
					data: {
						'action': 'gift_product_pillow'
					}
				}).done( function (response) {
					if( response.error != 'undefined' && response.error ){
						return true;
					} else {
					   window.location.href = '/cart/';
					}
				});
			});

			$('#gift_wipes').on('click',function(e) {
				e.preventDefault();
				$.ajax({
					url: ajaxurl,
					method: 'post',
					data: {
						'action': 'gift_product_wipes'
					}
				}).done( function (response) {
					if( response.error != 'undefined' && response.error ){
						return true;
					} else {
						window.location.href = '/cart/';
					}
				});
			});

			$('.woocommerce a.remove').on('click',function(e) {
				var product_id = jQuery(this).attr("data-product_id");
				//console.log(product_id);
				 $(".woocommerce-cart-form").addClass("processing");
				if(product_id == 125){
					e.preventDefault();
					$.ajax({
						url: ajaxurl,
						method: 'post',
						data: {
							'action': 'gift_remove'
						}
					}).done( function (response) {
						console.log(response);
						window.location.href = '/cart/';
						if( response.error != 'undefined' && response.error ){
							return true;
						}
					});
				}
			});
	});
})(jQuery)