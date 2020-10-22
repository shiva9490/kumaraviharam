<style>
#Signin > a{ background-color:#2a9da7; color:#fff; }
h2.center {
    text-align: center;
}
.psrtcolm{
    margin-top:150px;
}
.col-sm-4.col-sm-offset-1{
box-shadow: 0px 0px 3px #000;
    border-radius: 7px;
    padding: 20px;
	background: #d6cccc38;
}
label.error{
	color : red;
}
 #footer {
    text-align: center;
    background-color: #2a9da7;
    position: fixed;
    width: 100%;
    bottom: 0;
}
</style>
<div class="fluidbody">
	<div id="headerpage"></div>

	<div class="psrtcolm">
		<div class="container">  
			<div class="row"> 
				<div class="col-sm-3"></div>
				<div class="col-sm-4">							
					<a href="<?php echo base_url();?>" class="f-fallback email-masthead_name">
                        <center><img src="<?php echo base_url();?>assets/images/logo.png"></center>
                    </a>
					<div class="row"> 
						<center>
						    <h1>404 Error</h1>
						    <a href="<?php echo base_url();?>">Back to home</a>
						</center>
					</div>
				</div>
			</div>
		</div>    
	</div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  
<script>
    $().ready(function () {
      // validate signup form on keyup and submit
         $("#contactForm").validate({
            rules:{
                phone: "required",
				phone:{
                  required: true,
                  minlength: 10
                }
            },
            messages:{
                phone: "Please enter your phone",
            },
            submitHandler: function (form) { // for demo
                //alert('valid form');
                form.submit();
                return false;
            }
        });
    });
</script>