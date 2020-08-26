// JavaScript Document
$(document).ready(function() {   
	$(".mainmenu ul li").on("mouseenter",function(){
		$(this).children(".mainmenu ul li ul").stop().slideDown('fast');
	});
	$(".mainmenu ul li").on("mouseleave",function(){
		$(this).children(".mainmenu ul li ul").stop().slideUp('fast');
	});
	
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
	
	
	 
	$("#enquiryfrm").validate({	
	rules:{
		name:{ required:true,  },
		email:{ required:true, email:true },
		city:{ required:true,  },
		mobile:{  required:true,
				  minlength:9,
				  maxlength:10,
				  number: true
				},
		message:"required",
	},
	messages:{		
	},
	submitHandler:function(form){
		form.submit();
	}
	});	
	
	
	$("#enquiryfrm").validate({	
	rules:{
		name:{ required:true,  },
		email:{ required:true, email:true },
		
		mobile:{  required:true,
				  minlength:9,
				  maxlength:10,
				  number: true
				},
		city:"required",
		Message:"required",
	},
	messages:{		
	},
	submitHandler:function(form){
		form.submit();
	}
	});	
});	