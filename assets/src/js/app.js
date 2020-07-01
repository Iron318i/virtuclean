
jQuery(document).ready(function($) {
    $( '.input_file' ).each( function()
    {
        var $input	 = $(this),
            $label	 = $( '.custom_btn_download' ),
            labelVal = $label.html();

        $input.on( 'change', function( e )
        {
            var fileName = '';

            if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else if( e.target.value )
                fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
                $label.find( 'span' ).html( fileName );
            else
                $label.html( labelVal );
        });

        // Firefox bug fix
        $input
            .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
            .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
    });
    /********LANDING PAGE**********/
    $(".l_btn_menu").click(function() {
        $(this).toggleClass('_open');
        $('.l__menu').slideToggle().addClass('_open');
    });

    // $(window).on("scroll", function() {
    //     if($(window).scrollTop() > 0) {
    //         $(".landing__header").addClass("_fixed");
    //     } else {
    //         //remove the background property so it comes transparent again (defined in your css)
    //         $(".landing__header").removeClass("_fixed");
    //     }
    // });
    $(".l_btn_video").click(function() {
        $(this).addClass('_open');
        $('.video_bg').addClass('open');
        let $video = $('#l_video_frame'),
            src = $video.attr('src');
        $video.attr('src', src + '&autoplay=1');
    });
    $('.l_reviews_owl').owlCarousel({
        loop: true,
        items: 1,
        nav: true
    });
    $('.l_product_s').owlCarousel({
        loop: true,
        margin: 15,
        nav: true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:2,
                nav:false
            },
            1000:{
                items:3,
                nav:true,
            }
        }
    });
    $('.l_form input, .l_form textarea').focus(function() {
        $(this).parents('.form-group').addClass('focused');

    });
    $('.l_form input, .l_form textarea').blur(function() {
        var inputValue = $(this).val();
        if (inputValue == "") {
            $(this).removeClass('filled');
            $(this).parents('.form-group').removeClass('focused');
        } else {
            $(this).addClass('filled');
        }
    });

    $('.l__menu a[href^="#"]').on('click', function (e) {
        e.preventDefault();

        const section = $($(this).attr('href'));
        const $toggle = $('.l_btn_menu ');

        if (section.length) {
            $('body, html').animate({
                scrollTop: section.offset().top - $('.landing__header').innerHeight()
            }, 900);
        }

        if ($toggle.hasClass('_open')) {
            $toggle.removeClass('_open');
            $('.l__menu').slideToggle().removeClass('_open');
        }
    });
    const windowHeight = window.innerHeight;
    const isVisible = (el, offset) => {
        let $elems = Array.from($(`[data-anchor="${el}"]`));

        if ($elems.length) {
            return $elems.some(function ($el) {
                $el = $($el);
                return offset >= $el.offset().top - windowHeight * 0.2 && offset < $el.offset().top + $el.innerHeight() * 0.9;
            });
        }
    };
    $(window).on('scroll', (e) => {
        let windowOffset = $(document).scrollTop();

        $('.landing__header')[windowOffset > 0 ? 'addClass' : 'removeClass']('_fixed');

        $('.l__menu a').each(function (i, link) {
            let el = $(link).attr('href');

            if (isVisible(el, windowOffset)) {
                $(this).addClass('is-active');
            } else {
                $(this).removeClass('is-active');
            }
        })
    });
    /******LANDING END*******/
    // acessories item image slider :)
    $('.accessories-item__slider').owlCarousel({
        loop: true,
        items: 1,
        nav: true
    });


    // close popap in top
    $( ".close-popap" ).click(function() {
        console.log('1');
        $( ".save-popap-top" ).fadeOut('slow');
    });

    //scroll

    $('.sleep-explore').on('click', function(e) {
        e.preventDefault();
        $("#second_h_block").animate({ scrollTop: $(document).height() }, 7000);
    });

    // header fixsed
    $(window).on("scroll", function() {
        if ($(window).scrollTop() > 0) {
            $(".virtuclean-header").addClass("sleep-fixed-header");
        } else {
            $(".virtuclean-header").removeClass("sleep-fixed-header");
        }
    });
    // popap promo
    // $('.popup-modal').magnificPopup({
    //     type: 'inline',
    //     preloader: false,
    //     focus: '#username',
    //     modal: true
    // });

    var _Seconds = $('.l_time').text(),
        int;
    int = setInterval(function() { // запускаем интервал
        if (_Seconds > 0) {
            _Seconds--;
            $('.l_time').text(_Seconds); // выводим получившееся значение в блок
        } else {
            clearInterval(int); // очищаем интервал, чтобы он не продолжал работу при _Seconds = 0
            $('.l_animation').fadeOut();

        }
    }, 2000);

    setTimeout(function() {
        if ($('#popap-promo').length) {
            $.magnificPopup.open({
                items: {
                    src: '#popap-promo'
                },
                type: 'inline'
            });
        }
    }, 5000);

    setTimeout(function() {
        if ($('#l_popap').length) {
            $.magnificPopup.open({
                items: {
                    src: '#l_popap'
                },
                type: 'inline'
            });
        }
    }, 10000);

    $(document).on('click', '.popup-modal-dismiss', function (e) {
        e.preventDefault();
        $.magnificPopup.close();
    });



    $(".head-mobile").on('click', function() {
        $(this).toggleClass('menu-opened');
        $('.menu_box').toggleClass('cssmenu-o');
        $('.virtuclean-header').toggleClass('open_bg');

    });
    var wpcf7Elm = document.querySelector( '.footer_newsletter' );
    wpcf7Elm.addEventListener('wpcf7mailsent', function(event) {
        var status = event.detail;
        console.log(status);
        jQuery('.btn_submit').addClass('send');
        jQuery('.form-input').addClass('send');
        // $( ".form-group" ).css('display','none');
        $('.footer_newsletter input').parents('.form-group').removeClass('focused');
    }, false);

    $('.footer_newsletter input').focus(function() {
        $('.footer_newsletter .form-group').addClass('focused');

        $('.footer_newsletter input ').blur(function() {
            var inputValue = $(this).val();
            if (inputValue == "") {
                $(this).removeClass('filled');
                $('.footer_newsletter .form-group').removeClass('focused');
            } else {
                $(this).addClass('filled');
            }
        });
    });
    $('a.scrool_down[href^="#"]').on('click', function (e) {
        e.preventDefault();

        const section = $($(this).attr('href'));
        if (section.length) {
            $('body, html').animate({
                scrollTop: section.offset().top - $('.virtuclean-header').innerHeight()
            }, 1400);
        }
    });
    jQuery('.home_product_owl').owlCarousel({
        loop: true,
        margin: 10,
        items: 1,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    jQuery('.home_product_owl .woocommerce-product-gallery__image a').attr("href", 'javascript:void(0);');

    $('.oldpage_tabs .tab-title a , .about-virtuclean .tab-title a').on('click', function(e) {
        e.preventDefault();
        var $index = $(this).index();
        //console.log($index);
        var $isSelected = $(this).hasClass('selected');

        if (!$isSelected) {
            $('a', '.tab-title').removeClass('selected');
            $('> div', '.tab-content').removeClass('selected');
            $(this).addClass('selected');
            $('> div', '.tab-content').eq($index).addClass('selected');
        }
        return false;
    });

    $('.oldpage_order_form input, .oldpage_order_form textarea').focus(function() {
        $(this).parents('.form-group').addClass('focused');
    });

    $('.oldpage_order_form input,.oldpage_order_form textarea').blur(function() {
        var inputValue = $(this).val();
        if (inputValue == "") {
            $(this).removeClass('filled');
            $(this).parents('.form-group').removeClass('focused');
        } else {
            $(this).addClass('filled');
        }
    });
    $('.registr_form_product input').focus(function() {
        $(this).parents('.form-group').addClass('focused');
    });

    $('.registr_form_product input').blur(function() {
        var inputValue = $(this).val();
        if (inputValue == "") {
            $(this).removeClass('filled');
            $(this).parents('.form-group').removeClass('focused');
        } else {
            $(this).addClass('filled');
        }
    });


    $('.about-us input, .about-us textarea').focus(function() {
        $(this).parents('.form-group').addClass('focused');
    });

    $('.about-us input, .about-us textarea').blur(function() {
        var inputValue = $(this).val();
        if (inputValue == "") {
            $(this).removeClass('filled');
            $(this).parents('.form-group').removeClass('focused');
        } else {
            $(this).addClass('filled');
        }
    });

    $('.question-form input, .question-form textarea').focus(function() {
        $(this).parents('.form-group').addClass('focused');
    });

    $('.question-form input, .question-form textarea').blur(function() {
        var inputValue = $(this).val();
        if (inputValue == "") {
            $(this).removeClass('filled');
            $(this).parents('.form-group').removeClass('focused');
        } else {
            $(this).addClass('filled');
        }
    });

    $('section .wpcf7').on('input', 'input, textarea', function(e) {
        if ($(this).parent().find('.wpcf7-not-valid-tip')) {
            $(this).parent().find('.wpcf7-not-valid-tip').css('display', 'none');
        }
    });

    $('section .wpcf7-form input, section .wpcf7-form textarea').each(function(key, el) {
        if ($(this).val() != "") {
            $(this).closest('.form-group').addClass('focused');
        }
    });

    /*$("body.page-faq #accordion").accordion({
    	collapsible: true,
    	active: 0,
    	animate: 200
    });*/


    var qty, qtyInput, qtyMinVal, qtyMaxVal;
    var gtyVirtuclean = function() {

        if ($('.product_qty_custom').length == 0) {
            return;
        }
        $('body').on('click', '.product_qty_minus', function() {
            qty = $(this).closest('.product_qty_custom');
            _decrease(qty);
        });
        $('body').on('click', '.product_qty_plus', function() {
            qty = $(this).closest('.product_qty_custom');
            _increase(qty);
        });
        $('body ').on('click', '.product_qty_minus', function() {
            _updateCart();
        });
        $('body ').on('click', '.product_qty_plus', function() {
            _updateCart();
        });
        $('body ').on('change', '.quantity input', function() {
            _updateCart();
        });

    }
    var _updateCart = function() {
        $("[name='update_cart']").removeAttr('disabled');
        $("[name='update_cart']").trigger("click");
    }
    var _decrease = function(qty) {
        qtyInput = $('input', qty);
        qtyMinVal = qtyInput.attr('min');
        qtyMaxVal = qtyInput.attr('max');
        var qrtCurrent = parseInt(qtyInput.val());
        if (qrtCurrent - 1 >= qtyMinVal) {
            qtyInput.val(qrtCurrent - 1);
        }
        if (qrtCurrent <= 1) {
            qtyInput.val(1);
        }
    }
    var _increase = function(qty) {
        qtyInput = $('input', qty);
        qtyMinVal = qtyInput.attr('min');
        qtyMaxVal = qtyInput.attr('max');
        var qrtCurrent = parseInt(qtyInput.val());
        qtyInput.val(qrtCurrent + 1);
    }
    gtyVirtuclean();

    $('.recent_reviews_owl').on('initialized.owl.carousel changed.owl.carousel', function(e) {
        if (!e.namespace) {
            return;
        }
        var carousel = e.relatedTarget;
        var current_item = carousel.relative(carousel.current()) + 1;
        var item_lenght = carousel.items().length;
        if (current_item >= 10) {
            $('#counter_slider').html('<span class="active_number">' + current_item + '</span><span class="all_number"> / ' + item_lenght + '</span>');
        } else {
            $('#counter_slider').html('<span class="active_number">0' + current_item + '</span><span class="all_number"> / 0' + item_lenght + '</span>');
        }
    }).owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        nav: true
    });
   // $(".recent_reviews_owl").trigger("to.owl.carousel", [2, 1])

    $('.accordion__item label').click(function() {
        if ($(this).parent().hasClass('open')) {
            $(this).parent().removeClass('open');
            return;
        }
        $(this).parents('#accordion').find('.accordion__item').removeClass('open');

        var _this = this;
        setTimeout(function() {
            $(_this).parent().toggleClass('open');
        }, 100);
    });

    jQuery('.about_product_owl').owlCarousel({
        loop: true,
        margin: 10,
        items: 1,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    jQuery('.about_product_owl .woocommerce-product-gallery__image a').attr("href", 'javascript:void(0);');

	$('.about-virtuclean .btn-image').click(function() {
		if ($(this).parent().hasClass('open')) {
			$(this).parent().removeClass('open');
			return;
		}
		var _this = this;
		setTimeout(function() {
			$(_this).parent().toggleClass('open');
		}, 100);
	});

	var sidebar = new StickySidebar('.box_info_product,.box_info', {topSpacing: 72, bottomSpacing: 40});

});

// $(document).scroll(function () {
//     var pos             = $(window).scrollTop();
//     var scroll_element  = $(document).find('.single_post-product');
//     var scroll_wrap     = $(scroll_element).parents('.col-md-4');
//     var from_top        = $('.hero').height();
//     var max             = scroll_wrap.outerHeight();
//     var header_pos      = $(document).find('.header-container').height();
//
//      if ( pos >= from_top - header_pos ) {
//         scroll_element.css("top", pos - from_top + header_pos + 'px');
//     }
//     else{
//         scroll_element.css("top", 'auto');
//     }
//
//     if (pos + from_top - header_pos  >= max) {
//         scroll_element.addClass('fix_this');
//     }
//     else{
//         scroll_element.removeClass('fix_this');
//     }
// });
