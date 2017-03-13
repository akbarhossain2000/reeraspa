(function($) {
	
	"use strict";
	
	
	//Hide Loading Box (Preloader)
	/* function handlePreloader() {
		if($('.preloader').length){
			$('.preloader').delay(500).fadeOut(500);
		}
	} */
	
	
	//Update Header Style + Scroll to Top
	function headerStyle() {
		if($('.main-header').length){
			var windowpos = $(window).scrollTop();
			var topHeight = $('.header-top').innerHeight();
			if (windowpos >= topHeight) {
				$('.main-header').addClass('header-fixed');
				$('#side-navigation').addClass('scrolled-down');
				$('.scroll-to-top').fadeIn(300);
			} else {
				$('.main-header').removeClass('header-fixed');
				$('#side-navigation').removeClass('scrolled-down');
				$('.scroll-to-top').fadeOut(300);
			}
		}
	}
	
	//Submenu Dropdown Toggle
	if($('.main-menu li.dropdown .submenu').length){
		$('.main-menu li.dropdown').append('<div class="dropdown-btn"></div>');
		
		//Dropdown Button
		$('.main-menu li.dropdown .dropdown-btn').on('click', function() {
			$(this).prev('.submenu').slideToggle(500);
		});
	}
	
	//Search Toggle Btn
	if($('.toggle-search').length){
		$('.toggle-search').on('click', function() {
			$('.header-search').slideToggle(300);
		});
		
	}
	
	
	//Update Default Banner to Fullscreen
	function fullBanner() {
		if($('.window-size').length){
			var defBannerHeight = $('.window-size .auto-container').innerHeight();
			var windowHeight = $(window).height() - $('.main-header').height();
			if (windowHeight >= defBannerHeight) {
				$('.window-size').css({'height':windowHeight,'min-height':windowHeight});
				$('.window-size .auto-container').css({'height':windowHeight,'min-height':windowHeight});
			} else {
				$('.window-size').css({'height':'auto','min-height':windowHeight});
				$('.window-size .auto-container').css({'min-height':windowHeight,'height':windowHeight});
			}
		}
	}
	
	
	//Main Slider / Revolution Slider
	if(jQuery('.main-slider .tp-banner').length){

		jQuery('.main-slider .tp-banner').show().revolution({
		  delay:7000,
		  startwidth:1200,
		  startheight:720,
		  hideThumbs:0,
	
		  thumbWidth:80,
		  thumbHeight:50,
		  thumbAmount:5,
	
		  navigationType:"bullet",
		  navigationArrows:"0",
		  navigationStyle:"preview4",
	
		  touchenabled:"on",
		  onHoverStop:"off",
	
		  swipe_velocity: 0.7,
		  swipe_min_touches: 1,
		  swipe_max_touches: 1,
		  drag_block_vertical: false,
	
		  parallax:"mouse",
		  parallaxBgFreeze:"on",
		  parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
	
		  keyboardNavigation:"on",
	
		  navigationHAlign:"center",
		  navigationVAlign:"bottom",
		  navigationHOffset:0,
		  navigationVOffset:20,
	
		  soloArrowLeftHalign:"left",
		  soloArrowLeftValign:"bottom",
		  soloArrowLeftHOffset:20,
		  soloArrowLeftVOffset:0,
	
		  soloArrowRightHalign:"right",
		  soloArrowRightValign:"bottom",
		  soloArrowRightHOffset:20,
		  soloArrowRightVOffset:0,
	
		  shadow:0,
		  fullWidth:"on",
		  fullScreen:"off",
	
		  spinner:"spinner4",
	
		  stopLoop:"off",
		  stopAfterLoops:-1,
		  stopAtSlide:-1,
	
		  shuffle:"off",
	
		  autoHeight:"off",
		  forceFullWidth:"on",
	
		  hideThumbsOnMobile:"on",
		  hideNavDelayOnMobile:1500,
		  hideBulletsOnMobile:"on",
		  hideArrowsOnMobile:"off",
		  hideThumbsUnderResolution:0,
	
		  hideSliderAtLimit:0,
		  hideCaptionAtLimit:0,
		  hideAllCaptionAtLilmit:0,
		  startWithSlide:0,
		  videoJsPath:"",
		  fullScreenOffsetContainer: ".header-top"
	  });

	}
	
	
	//Image Carousel Slider
	if ($('.image-carousel .slider').length) {
		$('.image-carousel .slider').bxSlider({
			adaptiveHeight: true,
			auto:true,
			controls: true,
			pause: 5000,
			speed: 500,
			pager: false,
			mode:'fade'
		});	
	}
	
	
	//Image Slider
	if ($('.image-slider .slider').length) {
		jQuery('.image-slider .slider').owlCarousel({
			loop:true,
			  navigation : false,
			  slideSpeed : 500,
			  autoplay: 5000,
			  responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1024:{
					items:1
				},
				1200:{
					items:1
				},
				1400:{
					items:1
				}
			}
		});    		
	}
	
	
	//Sponsors Slider
	if ($('.sponsors .slider').length) {
		$('.sponsors .slider').owlCarousel({
			loop:true,
			margin:20,
			nav:true,
			autoplay: 5000,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				800:{
					items:3
				},
				1024:{
					items:4
				},
				1100:{
					items:5
				}
			}
		});    		
	}
	
	
	//LightBox / Fancybox
	if($('.lightbox-image').length) {
		$('.lightbox-image').fancybox();
	}
	
	
	//Date TimePicker
	if($('.datetimepicker').length) {
		$('.datetimepicker').datetimepicker({
			dayOfWeekStart : 1,
			lang:'en',
			disabledDates:['1986/01/22','1986/01/23','1986/01/19'],
			startDate:	'2015/01/05'
		});
	}
	
	
	//Gallery Filter
	if($('.filter-list').length){
		$('.filter-list').mixItUp({});
	}
	
	
	//Parallax Background Scroll
	if($('.parallax-background .window-size').length){
		$('.parallax-background .window-size').parallax("20%", 0.4);
	}
	
	
	//Testimonials Slider
	if(jQuery('#testimonials-slider').length){
		var slider = new MasterSlider();
		slider.setup('testimonials-slider' , {
			loop:true,
			width:80,
			height:80,
			speed:20,
			view:'fadeBasic',
			space:80,
			wheel:true,
			autoplay:true
		});
		slider.control('arrows');
		slider.control('slideinfo',{insertTo:'#staff-info'});
	}
	
	
	//Skills Meter
	if($('.skill-box .skill-meter').length){
		$(".skill-box .skill-meter .bar").each(function() {
			var progressWidth = ($(this).attr('data-percent'));
			$(this).css('width',progressWidth);
		});
	}
	
	
	//Accordions
	if($('.accordion-box').length){
		$('.accordion-box .acc-btn').on('click', function() {
		
		if($(this).hasClass('active')!==true){
			$('.accordion-box .acc-btn').removeClass('active');
		}
		if ($(this).next('.acc-content').is(':visible')){
			$(this).removeClass('active');
			$(this).next('.acc-content').slideUp(400);
		}
		else{
			$(this).addClass('active');
			$('.accordion-box .acc-content').slideUp(400);
			$(this).next('.acc-content').slideDown(400);	
			}
		});
	}
	
	
	//Contact Form Validation
	if($('#contact-form').length){
		$('#contact-form').validate({ // initialize the plugin
			rules: {
				username: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				subject: {
					required: true
				},
				message: {
					required: true
				}
			}
		});
	}
	
	
	// Google Map Settings
	/* if($('#map-area').length){
		var map;
		 map = new GMaps({
			el: '#map-area',
			zoom: 14,
			scrollwheel:false,
			//Set Latitude and Longitude Here
			lat: -37.817085,
			lng: 144.955631
		  });
		  
		  //Add map Marker
		  map.addMarker({
			lat: -37.817085,
			lng: 144.955631,
			infoWindow: {
			  content: '<p><strong>Envato</strong><br>Melbourne VIC 3000, Australia</p>'
			}
		 
		});
	} */
	
	
	// Scroll to top
	if($('.scroll-to-top').length){
		$(".scroll-to-top").on('click', function() {
		   // animate
		   $('html, body').animate({
			   scrollTop: $('html, body').offset().top
			 }, 1000);
	
		});
	}
	
	// Elements Animation
	if($('.wow').length){
		var wow = new WOW(
		  {
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       true,       // trigger animations on mobile devices (default is true)
			live:         true       // act on asynchronously loaded content (default is true)
		  }
		);
		wow.init();
	}

/* ==========================================================================
   When document is ready, do
   ========================================================================== */
   
	$(document).on('ready', function() {
		headerStyle();
		fullBanner();
	});

/* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */
	
	$(window).on('scroll', function() {
		headerStyle();
	});
	
/* ==========================================================================
   When document is loading, do
   ========================================================================== */
	
	$(window).on('load', function() {
		//handlePreloader();
		fullBanner();
	});
	
/* ==========================================================================
   When Window is Resizing, do
   ========================================================================== */
	
	$(window).on('resize', function() {
		fullBanner();
	});
	
})(window.jQuery);