<style>
#Signin > a{ background-color:#2a9da7; color:#fff; }
.col-sm-4.col-sm-offset-1{
box-shadow: 0px 0px 3px #000;
    border-radius: 7px;
    padding: 20px;
	background: #d6cccc38;
}
label.error{
	color : red;
}
</style>
<div class="fluidbody">
	<div id="headerpage"></div>
	<div class="pagebanner">
	</div>
	<div class="psrtcolm">
		<div class="container">  
			<div class="row"> 
				<div class="col-sm-3"></div>
				<div class="col-sm-4 col-sm-offset-1">							
					<h2 class="center">OTP Verfication</h2><br>
					<div class="row">
						<center><span class="text-danger"><?php echo $this->session->flashdata('log');?></span>
						<span class="text-danger"><?php echo $this->session->flashdata('otp');?></span></center>
						<form action="<?php echo base_url();?>api/verification" method="post" id="contactForm" onsubmit="return validateForm()">
							<div class="col-md-12 col-xs-12">
								<label>Otp :</label>
								<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
								<input type="text" name="otp" id="otp" placeholder="Otp" value="" class="form-control" required>
								OTP :<?php echo $_GET['pin'];?>
							</div>
							<br>
							<center>
								<button style="margin-top: 20px;"  class="btn btn-prime center" type="submit">Submit</button>
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
                otp: "required",
				otp:{
					required: true,
					minlength: 6
                }                
            },
            messages:{
                otp: "Please enter otp",
            },
            submitHandler: function (form) { // for demo
                //alert('valid form');
                form.submit();
                return false;
            }
        });
    });
</script>