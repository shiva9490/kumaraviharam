// JavaScript Document

// JavaScript Document
$(document).on("ready",function() {
	$(".mainmenu ul li").on('mouseenter',function(){
		$(this).children(".mainmenu ul li ul").stop().slideDown('fast');
	});
	$(".mainmenu ul li").on('mouseleave',function(){
		$(this).children(".mainmenu ul li ul").stop().slideUp('fast');
	});
	
	
	$(window).load(function(e) {
		$('#loading').fadeOut('fast');
	});	 
		
	var $active = $('#accordion .panel-collapse.in').prev().addClass('active');
	$active.find('a').append('<span class="glyphicon glyphicon-minus pull-right"></span>');
	$('#accordion .panel-heading').not($active).find('a').prepend('<span class="glyphicon glyphicon-plus pull-right"></span>');
	$('#accordion').on('show.bs.collapse', function (e)
	{
		$('#accordion .panel-heading.active').removeClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
		$(e.target).prev().addClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
	});
	$('#accordion').on('hide.bs.collapse', function (e)
	{
		$(e.target).prev().removeClass('active').find('.glyphicon').removeClass('glyphicon-minus').addClass('glyphicon-plus');
	});
});
