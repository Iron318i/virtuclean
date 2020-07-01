(function( $ ) {
	var ajaxurl = "https://www.virtuclean.com/wp-admin/admin-ajax.php";
jQuery(document).ready(function($) {
    $('#gift_pissllow').on('click',function(e) {
        e.preventDefault();
		console.log('click');
        $.ajax({
            url: ajaxurl,
			type: 'POST',
            data: {
                action: 'gift_product_pillow'
            }
        }).done( function (response) {
			console.log(response);
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
                window.location.href = 'https://www.virtuclean.com/cart/';
            }
        });
    });

    $('.woocommerce a.remove').on('click',function(e) {
        var product_id = jQuery(this).attr("data-product_id");
        if(product_id == 125){
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