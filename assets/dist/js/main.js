$(document).ready(function(){
  $('.slider').slick();

// Smooth scroll to anchor.
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
	anchor.addEventListener('click', function (e) {
		e.preventDefault();
		document.querySelector(this.getAttribute('href')).scrollIntoView({
			behavior: 'smooth'
		});
	});
});

  $(function() {

    $(window).scroll(function() {

    if($(this).scrollTop() != 0) {

    $('#toTop').fadeIn();

    } else {

    $('#toTop').fadeOut();

    }

    });

    $('#toTop').click(function() {

    $('body,html').animate({scrollTop:0},800);

    });

    });

    $(document).ready(function() {
      $('.burger').on('click', function(e) {
          e.preventDefault();
          $('.burger').toggleClass('active');
          $('.fullscreen-menu').toggleClass('active_menu');
          $('body').toggleClass('hidden');
      });
      $('.header').on('click', '.active_menu a', function(e) {
        $('.fullscreen-menu').toggleClass('active_menu');
        $('body').toggleClass('hidden');
        $('.burger').toggleClass('active');
      });
  });

});

$('.load-more a').on('click', function(e) {
    e.preventDefault();
    $('.wrapper').css("max-height", "100%");
    $('.load-more').css("display", "none");
});

$(window).on('load', function () {
    let minunesTime = document.querySelector('[data-minutes]');
    let secondsTime = document.querySelector('[data-seconds]');
    var woocommerce_cart_hash = $.cookie("woocommerce_cart_hash");
    var timerData = $.cookie("timer_order");
    $.cookie("woocomerse_items_changes", woocommerce_cart_hash, { expires: 1, path: '/' });

     var countDownDate = new Date(timerData * 1000);


    var x = setInterval(function() {


    var now = new Date().getTime();
    var distance = countDownDate - now;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";
    minunesTime.innerHTML = minutes;
    secondsTime.innerHTML = seconds;

    if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "EXPIRED";
      minunesTime.innerHTML = '0';
      secondsTime.innerHTML = '0';
    }
  }, 1000);
});

