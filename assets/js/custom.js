// JavaScript Document

var highestBox = 0;
	$('.boxcol').each(function(){  
		if($(this).height() > highestBox){  
		highestBox = $(this).height();  
	}
});    
$('.boxcol').height(highestBox);

var highestBox = 1;
	$('.fourclm').each(function(){  
		if($(this).height() > highestBox){  
		highestBox = $(this).height();  
	}
});    
$('.fourclm').height(highestBox);

var highestBox = 2;
	$('.heighclm').each(function(){  
		if($(this).height() > highestBox){  
		highestBox = $(this).height();  
	}
});    
$('.heighclm').height(highestBox);


$(window).scroll(function(){
	var hedFix = $('.header').height();
	var scroll = $(window).scrollTop();
	if(scroll >= hedFix){
		$('.header').addClass('headfixed');
	}else{
		$('.header').removeClass('headfixed');
	}		
});

$(document).ready(function() {			
	var press = 0;
	$('.respnav').on('click',function(){
		if(press == 0){
			$('#respo-submenu').animate({left:'0'},'fast');
			press = 1;
		}else{
			$('#respo-submenu').animate({left:'-100%'},'fast');
			press = 0;
		}
	});
	
	
	$('#banner').css('padding-top',$('#headerpage').height() + "px");	
	$('.mainmenu ul li').on('mouseenter',function(){
		$(this).children('ul').stop().slideDown('fast');
	});
	$('.mainmenu ul li').on('mouseleave',function(){
		$(this).children('ul').stop().slideUp('fast');
	});	
	
	var $animation_elements = $('.frombackcol,.fromleftcol,.fromrightcol,.bgtext');
	var $window = $(window);
	$window.on('scroll', check_if_in_view);
	$window.on('scroll resize', check_if_in_view);
	$window.trigger('scroll');
	function check_if_in_view() {
	  var window_height = $window.height();
	  var window_top_position = $window.scrollTop();
	  var window_bottom_position = (window_top_position + window_height);
	
	  $.each($animation_elements, function() {
		var $element = $(this);
		//var element_height = $element.outerHeight();
		var element_top_position = $element.offset().top;
		//var element_bottom_position = (element_top_position + element_height);
	
		//check to see if this current container is within viewport
		if (element_top_position <= window_bottom_position) {
		  $element.addClass('animibacknrml');
		  $element.addClass('animileftnrml');
		  $element.addClass('animirightnrml');
		  $element.addClass('animtbgtext');
		} else {
		  $element.removeClass('animibacknrml');
		  $element.removeClass('animileftnrml');
		  $element.removeClass('animirightnrml');
		  $element.removeClass('animtbgtext');
		}
	  });
	}	
});	
