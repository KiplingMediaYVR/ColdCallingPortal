	jQuery(document).ready(function(){
		jQuery(".menu_tog").click(function(){
			jQuery("html").toggleClass("toggle_menu");
		});
		jQuery(".user_profile").click(function(){
			jQuery("html").toggleClass("toggle_menu");
		});
		jQuery(".menu-toggle").click(function(){
			jQuery("html").toggleClass("sidebar-open");
		});
		jQuery('.menu_tog').click(function(){
			jQuery('html').removeClass('sidebar-open');
		});
		jQuery('.user_profile').click(function(){
			jQuery('html').removeClass('sidebar-open');
		});
		jQuery('.menu-toggle').click(function(){
			jQuery('html').removeClass('toggle_menu');
		});
		jQuery('.main-navigation .close_button').click(function(){
			jQuery('body').removeClass('toggle_menu');
		});
		jQuery(".mobile-category > a").click(function(){
			jQuery(".category-block").toggleClass("category-show");
		});
	});
	
	jQuery(window).scroll(function(){
	  var sticky = jQuery('body'),
		  scroll = jQuery(window).scrollTop();

	  if (scroll >= 100) sticky.addClass('sticky_header');
	  else sticky.removeClass('sticky_header');
	}); 
	
	jQuery(document).ready(function(){
		jQuery(".sub-arrow").on('click',function(){
			jQuery(this).parent().toggleClass("category-show");
		});
	});
