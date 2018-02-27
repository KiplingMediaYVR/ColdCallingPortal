	$(document).ready(function(){
		$(".menu_tog").click(function(){
			$("html").toggleClass("toggle_menu");
		});
		$(".user_profile").click(function(){
			$("html").toggleClass("toggle_menu");
		});
		$(".menu-toggle").click(function(){
			$("html").toggleClass("sidebar-open");
		});
		$('.menu_tog').click(function(){
			$('html').removeClass('sidebar-open');
		});
		$('.user_profile').click(function(){
			$('html').removeClass('sidebar-open');
		});
		$('.menu-toggle').click(function(){
			$('html').removeClass('toggle_menu');
		});
		$('.main-navigation .close_button').click(function(){
			$('body').removeClass('toggle_menu');
		});
		$(".mobile-category > a").click(function(){
			$(".category-block").toggleClass("category-show");
		});
	});
	
	jQuery(window).scroll(function(){
	  var sticky = jQuery('body'),
		  scroll = jQuery(window).scrollTop();

	  if (scroll >= 100) sticky.addClass('sticky_header');
	  else sticky.removeClass('sticky_header');
	}); 
	
	$(document).ready(function(){
		jQuery(".sub-arrow").on('click',function(){
			jQuery(this).parent().toggleClass("category-show");
		});
	});
