<style>
#Signin > a{ background-color:#2a9da7; color:#fff; }
h2.center {
    text-align: center;
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
				<div class="col-sm-4 col-sm-offset-1">							
					<h2 class="center">Login </h2><br>
					<div class="row"> 
						<center><span class="text-danger"><?php echo $this->session->flashdata('log');?></span></center>
						<center><span class="text-danger"><?php echo $this->session->flashdata('logout');?></span></center>
						<form action="<?php echo base_url();?>signin" method="post" id="contactForm" onsubmit="return validateForm()">
							<div class="col-md-12 col-xs-12">
								<label>Phone No :</label>
								<input type="text" name="phone" id="phone" value="" placeholder="Phone NO" class="form-control" required>
							</div>
							<center>
							<br>
								<button style="margin-top: 20px;" class="btn btn-prime center" type="submit">Login</button><br>
								New to kumaraviharam? <a href="<?php echo base_url();?>signup">Create an account.</a>
							</center>
						</form>
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