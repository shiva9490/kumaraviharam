
		<?php $this->load->view('user/header2');?>
		<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Profile Details</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Profile Details</li>
                            </ol>
                        </div>
                    </div>
                </div>
    
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
									<?php foreach($user_details as $r){?>
									 <center><?php echo $this->session->flashdata('update');?></center>
									<form id="contactForm" action="<?php echo base_url();?>dashboard/update_profile" method="post" onsubmit="return validateForm()">
									<div class="row">
									    <div class="col-md-6 col-xs-12">
            								<label>Full Name :</label>
            								<input type="text" name="name" id="name" placeholder="Full Name" value="<?php echo $r->name; ?>" required class="form-control">
            							</div>
            							<div class="col-md-6 col-xs-12">
            								<label>Email :</label>
            								<input type="email" name="email" id="email" placeholder="Email" value="<?php echo $r->email; ?>" required class="form-control">
            							</div>
            							<div class="col-md-6 col-xs-12">
            								<label>Phone No :</label>
            								<input type="text" name="phone" id="phone" value="<?php echo $r->phone; ?>" placeholder="Phone NO" disabled required class="form-control">
            							</div>
            							<div class="col-md-6 col-xs-12">
            								<label>Pincode :</label>
            								<input type="text" name="pincode"  id="pincode" value="<?php echo $r->pincode; ?>" required placeholder="Pincode" id="pincode" class="form-control">
            							</div>
            							<div class="col-md-6 col-xs-12">
            								<label for="state">Area: </label>
            								<input type="text" name="area" size="40" value="<?php echo $r->area; ?>" list="areas" class="form-control input-style-2" placeholder="Area" required >							
            								<datalist id="areas" required> </datalist>
            							</div>
            							<div class="col-md-6 col-xs-12">
            								<label for="state">City: </label>
            								<input type="text" name="city" size="40" id="city" value="<?php echo $r->city; ?>" class="form-control input-style-2" placeholder="City" required>
            							</div>
            							<div class="col-md-6 col-xs-12">
            								<label for="state">State: </label>
            								<input type="text" name="state" size="40" id="state" value="<?php echo $r->state; ?>" class="form-control input-style-2" placeholder="State" required>   
            							</div>
            							<div class="col-md-6 col-xs-12">
            								<label for="state">District: </label>							
            								<input type="text" name="district" value="<?php echo $r->district; ?>" size="40" id="district" class="form-control input-style-2" placeholder="District" required >
            							</div>
            							<div class="col-md-12 col-xs-12">
            								<label>Address :</label>
            								<textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"><?php echo $r->address; ?></textarea><br>
            							</div>
            							<center>
            								<button class="btn btn-prime center" type="submit">Update</button>
            							</center>
									</div>
									</form>
									<?php } ?>
								</div>
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
		<?php $this->load->view('user/footer2');?>