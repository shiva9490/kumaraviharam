<style>
#Signin > a{ background-color:#2a9da7; color:#fff; }
h2.center {
    text-align: center;
}
.col-sm-8.col-sm-offset-1{
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

	<div class="psrtcolm">
		<div class="container">  
			<div class="row"> 
				<div class="col-sm-1"></div>
				<div class="col-sm-8 col-sm-offset-1">							
					<h2 class="center">Regisation </h2><br>
					<div class="row"> 
						<center><span class="text-danger"><?php echo $this->session->flashdata('reg');?></span></center>
						<form id="contactForm" action="<?php echo base_url();?>Signup" method="post" onsubmit="return validateForm()">
							<div class="col-md-6 col-xs-12">
								
								<label>Full Name :</label>
								<input type="text" name="name" id="name" placeholder="Full Name" value="<?php echo set_value('name'); ?>" required class="form-control">
							</div>
							<div class="col-md-6 col-xs-12">
								<label>Email :</label>
								<input type="email" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>" required class="form-control">
							</div>
							<div class="col-md-6 col-xs-12">
								<label>Phone No :</label>
								<input type="text" name="phone" id="phone" value="<?php echo set_value('phone'); ?>" placeholder="Phone NO" required class="form-control">
							</div>
							<div class="col-md-6 col-xs-12">
								<label>Pincode :</label>
								<input type="text" name="pincode" id="pincode" value="<?php echo set_value('pincode'); ?>" required placeholder="Pincode" id="pincode" class="form-control">
							</div>
							<div class="col-md-6 col-xs-12">
								<label for="state">Area: </label>
								<input type="text" name="area" size="40" value="<?php echo set_value('area'); ?>" list="areas" class="form-control input-style-2" placeholder="Area" required >							
								<datalist id="areas" required> </datalist>
							</div>
							<div class="col-md-6 col-xs-12">
								<label for="state">City: </label>
								<input type="text" name="city" size="40" id="city" value="<?php echo set_value('city'); ?>" class="form-control input-style-2" placeholder="City" required>
							</div>
							<div class="col-md-6 col-xs-12">
								<label for="state">State: </label>
								<input type="text" name="state" size="40" id="state" value="<?php echo set_value('state'); ?>" class="form-control input-style-2" placeholder="State" required>   
							</div>
							<div class="col-md-6 col-xs-12">
								<label for="state">District: </label>							
								<input type="text" name="district" value="<?php echo set_value('district'); ?>" size="40" id="district" class="form-control input-style-2" placeholder="District" required >
							</div>
							<div class="col-md-12 col-xs-12">
								<label>Address :</label>
								<textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"><?php echo set_value('address'); ?></textarea><br>
							</div>
							<center>
								<button class="btn btn-prime center" type="submit">Registered</button>
							</center>
						</form>
						<p>I have kumaraviharam <a href="<?php echo base_url();?>signin">account</a></p>
					</div>
				</div>
			</div>
		</div>    
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script type="text/javascript">
    $("#pincode").keyup(function(){
      $("#areas").empty();
        var zipcode = $(this).val();
        if ( (zipcode.length == 6)){
			
            $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>api/cities_mandal",
              data: {'zipcode': zipcode },
              dataType: "json",
              success: function(data){
                if(data.Status == 'Success') {
                  $('#state').val(data.PostOffice[0].State);
                  $('#district').val(data.PostOffice[0].District);
                  $('#city').val(data.PostOffice[0].Circle);
                    for(var i=0; i< (data.PostOffice).length; i++) {
                      $('#areas').append("<option value="+data.PostOffice[i].Name+">"+data.PostOffice[i].Name+"</option>");
                    }
                  } else if(data.Status == 'Error'){
                    alert('You May Entered wrong pincode please try with another Pincode.');
                }
              },
              failure: function(errMsg) {
              alert('You May Entered wrong pincode please try with another Pincode.');
              }
        })
      }
  });
</script>
<script>
    $().ready(function () {
      // validate signup form on keyup and submit
         $("#contactForm").validate({
            rules:{
                name: "required",
                email: "required",
                phone: "required",
                //reason: "required",
                message: "required",
                pincode: "required",
                address: "required",
                areas: "required",
                city: "required",
                state: "required",
                district: "required",
                fname: "required",
                lname: "required",
                password: "required",
                cpassword: "required",
                otp: "required",
				
				otp:{
                  required: true,
                  minlength: 6
                },
                email:{
                  required: true,
                  email: true
                },
                enter_captcha:{
                  required: true,
                  minlength: 6
                },
                enter_captcha1:{
                  required: true,
                  minlength: 6
                },
                pincode:{
                  required: true,
                  minlength: 6
                },
                password: {
                    required: true,
                    minlength: 5
                },
                cpassword: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                }
            },
            messages:{
                name: "Please enter your full name",
                phone: "Please enter your phone",
                //reason: "Please enter your reason",
                message: "Please enter your Address",
                pincode: "Please enter pincode",
                email: "Please enter a valid email address",
                address: "Please enter address",
                areas: "Please enter areas",
                city: "Please enter city",
                state: "Please enter state",
                district: "Please enter district",
                otp: "Please enter otp",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                cpassword: "Please enter confirm password",
            },
            submitHandler: function (form) { // for demo
                //alert('valid form');
                form.submit();
                return false;
            }
        });
    });
</script>