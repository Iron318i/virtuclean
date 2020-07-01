(function ($, root, undefined) {
    //var ajaxurl = '/wp-admin/admin-ajax.php';
	$(document).ready(function() {
		
		// Function for get url param
		var getUrlParameter = function getUrlParameter(sParam) {
			var sPageURL = window.location.search.substring(1),
				sURLVariables = sPageURL.split('&'),
				sParameterName,
				i;
		
			for (i = 0; i < sURLVariables.length; i++) {
				sParameterName = sURLVariables[i].split('=');
		
				if (sParameterName[0] === sParam) {
					return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
				}
			}
		};
		
		// Close modal
		$('.email_generator_modal_close').on('click', function(event) {
			event.preventDefault();
			$(document).find('#email_generator_modal').removeClass('show_this');
			$(document).find('#generate-email-code').prop("disabled", false);
		});
		
		
		// Show modal
		$('#generate-email-code').on('click', function(event) {
			event.preventDefault();
			$(this).prop("disabled", true);
			if(!$('.email_generator_modal').hasClass('show_this')) { 
				
				$('.email_generator_inner_content').empty();
				$('.email_generator_inner_content').val('');
				$(document).find('.email_generator_modal').addClass('show_this');
				var post_id = getUrlParameter('post')
	
				jQuery.ajax({
					url: ajaxurl,
					type: 'POST',
				data: {
					action: 'render_template',
					post_id: post_id,
				},
				beforeSend: function() {
					$('.email_generator_modal_loader').css("display", "block");
				 },
				}).done(function(response) { 
					try {
						console.log('response', response);
						var answer = JSON.parse(response);
						console.log('answer', answer);
						if( answer.status == '200' ){
							$('.email_generator_modal_loader').css("display", "none");
							$('.email_generator_inner_content').val(answer.html);
						}
						else{
							$('.email_generator_modal_loader').css("display", "none");
						}
					} 
					catch (err) {
						console.log('err', err);
					}
				});	

			}
			

		});

		
	});
})(jQuery, this);