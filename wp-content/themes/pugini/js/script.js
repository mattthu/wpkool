jQuery(document).ready(function($){
	$('ul.sf-menu').superfish({
		hoverClass: 'activ',
		delay: 300,
		animation: {opacity:'show', height:'show'},
		speed: 'fast',
		speedOut: 'normal', 
		autoArrows: true,//false,
		dropShadows: false,
	});

	$('.navbar-toggle').click(

		function () {
			$('.sf-menu').toggleClass("xactive");			
		}		
	);
	
	//$('.sf-with-ul').append('<span class="tog"></span>')
	
	$('.featured-carousel .flexslider').flexslider({
		animation: "slide",
		animationLoop: true,
		itemWidth: 210,
		//itemMargin: 5,
		minItems: 1,
		maxItems: 4,
		directionNav: true,
		controlNav: false,
	});

	$('.flexslider').flexslider({
		animation: "slide",
	});
	

	$('.top-icons .fa-search').click(function() {
		$(".search-box-wrapper").slideToggle('slow', function(){
			$('.top-icons .fa-search').toggleClass('active');
		});
		return false;
	});

	$(window).scroll(function () {
		if ($(this).scrollTop() > 200) {
			$('.mw-go-top').fadeIn();
		} else {
			$('.mw-go-top').fadeOut();
		}
	});

	$('.mw-go-top').click(function() {
		$("html, body").animate({ scrollTop: 0 }, 1000);
	});

});