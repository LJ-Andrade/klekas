//////////////////////////////
// 						    //
//        PLUGINS           //
//                          //
//////////////////////////////

new WOW().init();

//////////////////////////////
// 					        //
//        NAVIGATION        //
//                          //
//////////////////////////////

$(document).ready(function () {

	var section       = $('#ActualSection').data('section');
	var logo          = $('.navbar .navbar-brand');
	var navbar        = $('.navbar-default');

	function nav_logic() {

		switch(section) {

			//////// HOME /////////
			case "home":
				// $('body').css('padding-top','0');
				logo.css('opacity','0');
				// $('.navbar .navbar-right').css('border-bottom', '1px solid white');
				navbar.addClass('home-nav');

				$(window).scroll(function() {
					var scrollPos = $(window).scrollTop();

					if (scrollPos > 250) {
						navbar.addClass('change-nav');
						logo.css('opacity','100');
					} else {
						navbar.removeClass('change-nav');
						logo.css('opacity','0');
					}
				});

			break;

			//////// PORTFOLIO /////////
			case "portfolio":

				navbar = $('.navbar-default');		
				navbar.addClass('nav-portfolio');
				$('body').css('background-color','#f9f9f9');
				$(window).scroll(function() {
					var scrollPos = $(window).scrollTop();

					if (scrollPos > 250) {
						navbar.addClass('change-nav');
					} else {
						navbar.removeClass('change-nav');
					}
				});

			break;


			//////// GENERIC /////////
			default:
				$(window).scroll(function() {
					
					var scrollPos = $(window).scrollTop(),
					navbar   = $('.navbar-default');
					
					if (scrollPos > 250) {
						navbar.addClass('change-nav');
					} else {
						navbar.removeClass('change-nav');
					}
				});
	    }

    }
    // ----------- End Navigation Script ------------ //

    //Activate nav effects in desktop
	if (screen.width > 775) {
        nav_logic();
 	} 


}); // Document Ready
