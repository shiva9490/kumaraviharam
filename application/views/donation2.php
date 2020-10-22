<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<style>
#donationtab > a{ background-color:#2a9da7; color:#fff; }
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<div class="fluidbody">
<div id="headerpage"></div>
    <div class="pagebanner">
    	<img class="img-responsive" src="<?php echo base_url();?>assets/images/inner/donations.jpg" alt="">
    </div>
<div class="psrtcolm">
	<div class="container">
	    <form id="donation" action="<?php echo base_url();?>donations2/add" method="post" onsubmit="return validateForm()">
	    <div class="row">
			<h2>Fund Raising Plan - Major Offerings</h2><br>
			<div class="tablecol">
				<table class="table table-responsive vi_table">
					<thead>
						<tr>
							<th>S.No</th> 
							<th>Item Specification </th>
							<!--<th>Price/Unit in Rs</th>            
							<th>Qty</th>-->
							<th>Total</th>																		 
						</tr>
					</thead>				
					<tbody>
			    
			    <tr>
			        <td><input type="checkbox" id="gCheck" onclick="general()"></td>
			        <td>General Donation</td>
                    <!--<td> </td>
                    <td>0</td>-->
                    <td><input type="number" id="gm" name="donation" disabled  placeholder="0.00" min=100.00></td>
                    
                    <!-- <td><p class="btn btn-primary"><a style="color:#fff;" href="">Donation</a></p></td>             -->
			    </tr>  
			    
			    <tr>
			        <td><input type="checkbox" id="sCheck" onclick="stonec()"></td>
			        <td>
			        	<select class="form-control" id="sd" disabled onchange='checkvalue(this.value)'>
			        		<option>Choose Temple Stones</option>
			        		<option value="5">5 Stones</option>
			        		<option value="10">10 Stones</option>
			        		<option value="25">25 Stones</option>
			        		<option value="50">50 Stones</option>
			        		<option value="others">Others</option>
			        	</select><br>
			        	<input type="number" min='1' id="stone" style='display:none'/>
			        	<!--<div id="others" style="display:none;">
			        		<input type="text" class="form-control" name="">
			        	</div>-->
			        </td>
                    <!--<td>1116.00  </td>
                    <td>0</td>-->
                    <td>0.00</td>
                    <!-- <td><p class="btn btn-primary"><a style="color:#fff;" href="">Donation</a></p></td>-->
			    </tr> 
			                          
			    <tr>
			    <td><input type="checkbox" id="fCheck" onclick="floorc()"></td>
			    <td>
			    	<select class="form-control" id="fd" disabled onchange='checkvalue2(this.value)'>
			    		<option>Choose Temple Floor Area</option>
			    		<option value="1">1 SFT</option>
			    		<option value="3">3 SFT</option>
			    		<option value="5">5 SFT</option>
			    		<option value="25">25 SFT</option>
			    		<option value="others">Others</option>
			    	</select><br>
			        <input type="number" min='1' id="floor" style='display:none'/>
			    </td>
			    <!--<td>2016.00</td>
                <td>0</td>-->
                <td>0.00</td>
            
                <!-- <td><p class="btn btn-primary"><a style="color:#fff;" href="">Donation</a></p></td>             -->
			    </tr>  
			    <tr>
			    <td><input type="checkbox"></td>
			    <td>Sloka</td>
                <!--<td>116000.00</td>
                <td>0</td>-->
                <td>0.00</td>
                
                <!-- <td><p class="btn btn-primary"><a style="color:#fff;" href="">Donation</a></p></td>             -->
			    </tr> 
            
                <tr>
			    <td></td>
			    <!--<td></td>
                <td></td>-->
                <td>Total</td> 
                <td>0.00 <input type='hidden' name="total" value='0'></td> 
                
                <!-- <td><p class="btn btn-primary"><a style="color:#fff;" href="">Donation</a></p></td>             -->
			    </tr> 
                     
			</tbody>
			
				</table>
			</div>
		</div>  
	    <div class="row">
            <!-- Tabs -->
            <section id="tabs">
				<h6 class="section-title h1">Type of Donor  :</h6>
					<div class="row">
            			<div class="col-xs-12 ">
            			    <?php echo validation_errors();?>
            				<nav>
                                <ul class="nav nav-pills">
                                    <li class="active"><a  data-id="1"  data-toggle="pill" href="#Individual">Individual</a></li>
                                    <li><a  data-id="2" data-toggle="pill" href="#Firm_Company">Firm /Company</a></li>
                                </ul>
                            </nav>
                            
            				<div class="tab-content" style="margin-top:20px;">
                                <!-- Individual tab start -->
            					<div class="tab-pane fade in active" id="Individual" role="tabpanel" aria-labelledby="nav-Individual-tab">
                                    <!-- Detail Form Start -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="well form-horizontal">
                                                <fieldset>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-md-4 control-label">Donor First Name* :</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                <input type="hidden" value="1" name="doner_type">
                                                                <input id="fullName" name="fullName" placeholder="First Name" class="form-control" required="true" value="<?php echo set_value('fullName'); ?>" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
														<label class="col-md-4 control-label">Donor Surname* :</label>
														<div class="col-md-8 inputGroupContainer">
														    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
														        <input id="Surname" name="Surname" placeholder="Surname" class="form-control" required="true" value="<?php echo set_value('Surname'); ?>" type="text">
														    </div>
														</div>
													</div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-md-4 control-label">Gender*:</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                                            <select class="selectpicker form-control" name="gender" required="true">
                                                                <option value="">Select Gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
														<label class="col-md-4 control-label">Date of Birth* :</label>
														<div class="col-md-8 inputGroupContainer">
														    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
														        <input id="Date of Birth" name="Date_of_Birth" placeholder="Date of Birth" class="form-control" required="true" value="<?php echo set_value('Date_of_Birth'); ?>" type="date">
														    </div>
														</div>
													</div>
                                                    <div class="form-group col-md-6">
                                                       <label class="col-md-4 control-label">Son/Daughter:</label>
                                                       <div class="col-md-8 inputGroupContainer">
                                                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                                               <input id="Son/Daughter" name="Son_Daughter" placeholder="Son/Daughter" class="form-control" value="<?php echo set_value('Son_Daughter'); ?>" type="text">
                                                           </div>
                                                       </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
														<label class="col-md-4 control-label">Mobile Number* :</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
															    <input id="Mobile Number" name="Mobile_Number" placeholder="Mobile Number" pattern="[6789][0-9]{9}" class="form-control" required="true" value="<?php echo set_value('Mobile_Number'); ?>" type="number">
															</div>
														</div>
													</div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-md-4 control-label">Email*: </label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                                <input id="Email" name="Email" placeholder="Email" class="form-control" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo set_value('Email'); ?>" type="email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-md-4 control-label">Address*:</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                                            <input id="Address" name="Address" placeholder="Address" class="form-control" required="true" value="<?php echo set_value('Address'); ?>" type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-md-4 control-label">Pincode*: </label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                                                <input id="Pincode" name="Pincode" placeholder="Pincode" class="form-control" required="true" value="<?php echo set_value('Pincode'); ?>"  type="number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
														<label class="col-md-4 control-label">City</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
															    <input id="city" name="city" placeholder="City" class="form-control" required="true" value="<?php echo set_value('city'); ?>" type="text">
															</div>
														</div>
													</div>
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">State</label>
														<div class="col-md-8 inputGroupContainer">
														    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
														        <input id="state" name="state" placeholder="State" class="form-control" required="true" value="<?php echo set_value('state'); ?>" type="text">
														    </div>
														</div>
													</div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-md-4 control-label">Gotram</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                                <input id="Gotram" name="Gotram" placeholder="Gotram" class="form-control" value="<?php echo set_value('Gotram'); ?>" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
														<label class="col-md-4 control-label">Offering on behalf of (name on Certificate)*</label>
														<div class="col-md-8 inputGroupContainer">
														    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
														        <input id="Certificate" name="Certificate" placeholder="name on Certificate" class="form-control" required="true" value="<?php echo set_value('Certificate'); ?>" type="text">
														    </div>
														</div>
													</div>
                                                    <!--<div class="form-group col-md-6">
                                                        <label class="col-md-4 control-label">Phone Number</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                                                <input id="phoneNumber" name="phoneNumber" placeholder="Phone Number" class="form-control" required="true" value="<?php echo set_value('phoneNumber'); ?>" type="text">
                                                            </div>
                                                        </div>
                                                    </div>-->
                                                    <div class="row" style="margin-top:20px;">
                                                        <div class="form-group col-md-6">
    														<label class="col-md-4 control-label">Birthstar*: </label>
    														<div class="col-md-8 inputGroupContainer">
    															<div class="input-group">
    																<span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
    																<select class="selectpicker form-control" name="Birthstar" required>
    																	<option value="">Select Birthstar</option>
    																	<option value="Ashwini">Ashwini</option>
    																	<option value="Bharani">Bharani</option>
    																	<option value="Krithika">Kritthika</option>
    																	<option value="Rohini">Rohini</option>
    																	<option value="Mrigashiras">Mrigashiras</option>
    																	<option value="Aardhra /Arudra">Aardhra /Arudra</option>
    																	<option value="Punarvasu">Punarvasu</option>
    																	<option value="Pushyami">Pushyami</option>
    																	<option value="Ashlesha">Ashlesha</option>
    																	<option value="Magha/Makha">Magha/Makha</option>
    																	<option value="PoorvaPhalguni">PoorvaPhalguni</option>
    																	<option value="Uthraphalguni">Uthraphalguni</option>
    																	<option value="Hastha">Hastha</option>
    																	<option value="Chitra">Chitra</option>
    																	<option value="Swaathi">Swaathi</option>
    																	<option value="Vishaakha">Vishaakha</option>
    																	<option value="Anuraadha">Anuraadha</option>
    																	<option value="Jyeshta">Jyeshta</option>
    																	<option value="Moola">Moola</option>
    																	<option value="Poorvashaada">Poorvashaada</option>
    																	<option value="Uthrashaada">Uthrashaada</option>
    																	<option value="Shraavan">Shraavan</option>
    																	<option value="Dhanishta">Dhanishta</option>
    																	<option value="Shathabhisha">Shathabhisha</option>
    																	<option value="Poorvabhadra">Poorvabhadra</option>
    																	<option value="Uthrabhadra">Uthrabhadra</option>
    																	<option value="Revathi">Revathi</option>
    																</select>
    															</div>
    														</div>
    													</div>
    													<div class="form-group col-md-6">
    														<label class="col-md-4 control-label">Source/Reference for making donation :</label>
    														<div class="col-md-8 inputGroupContainer">
    															<div class="input-group">
    																<span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
    																<select class="selectpicker form-control" name="reference_marking">
    																	<option value="Facebook">Facebook</option>
    																	<option value="Twitter">Twitter</option>
    																	<option value="Instagram">Instagram</option>
    																</select>
    															</div>
    														</div>
    													</div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-md-4 control-label">Purpose of Donation:</label>
                                                            <div class="col-md-8 inputGroupContainer">
                                                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                                                    <input id="Purpose" name="Purpose" placeholder="Purpose of Donation" class="form-control"  value="<?php echo set_value('Purpose'); ?>" type="text">
                                                               </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
    														<label class="col-md-4 control-label">PAN:</label>
    														<div class="col-md-8 inputGroupContainer">
    														    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
    														        <input id="PAN" name="PAN" placeholder="PAN" onkeyup="panv()" class="form-control" value="<?php echo set_value('PAN'); ?>" type="text">
    														    </div>
    														</div>
    													</div>
													</div>
                                              </fieldset>
											</div>
                                        </div>
                                    </div>
                                    <!-- Detail form End -->
                                </div>
            					<div class="tab-pane fade" id="Firm_Company" role="tabpanel" aria-labelledby="nav-Firm_Company-tab">									
									<!-- Detail Form Start -->								  
									<div class="row">
										<div class="col-md-12">
											<div class="well form-horizontal">
												<fieldset>
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Donor First Name* :</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
															    <input type="hidden" value="2" name="doner_type">
															    <input id="fullName" name="fullName" placeholder="First Name" class="form-control" required="true" value="" type="text">
															</div>
														</div>
													</div>
								                    <div class="form-group col-md-6">
														<label class="col-md-4 control-label">Donor Surname* :</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
															    <input id="Surname" name="Surname" placeholder="Surname" class="form-control" required="true" value="" type="text">
															</div>
														</div>
													</div>
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Firm/Company  Name* : </label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
															    <input id="Firm" name="Firm" placeholder="Firm/Company" class="form-control" required="true" value="" type="text">
															</div>
														</div>
													</div>
													
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Email*: </label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
															    <input id="Email" name="Email" placeholder="Email" class="form-control" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="" type="email">
															</div>
														</div>
													</div>
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Address*:</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
															    <input id="Address" name="Address" placeholder="Address" class="form-control" required="true" value="" type="text">
															</div>
														</div>
													</div>
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Pincode*: </label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
															    <input id="Pincode" name="Pincode" placeholder="Pincode" class="form-control" required="true" value="" type="number">
															</div>
														</div>
													</div>
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Purpose of Donation:</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
															    <input id="Purpose" name="Purpose" placeholder="Purpose of Donation" class="form-control" value="<?php echo set_value('Pincode'); ?>" type="text">
														    </div>
														</div>
													</div>
													
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Mobile Number* :</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
															    <input id="Mobile Number" name="Mobile_Number" placeholder="Mobile Number" pattern="[6789][0-9]{9}" class="form-control" required="true" value="" type="number">
															</div>
														</div>
													</div>
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">City</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
															    <input id="city" name="city" placeholder="City" class="form-control" required="true" value="<?php echo set_value('city'); ?>" type="text">
															</div>
														</div>
													</div>
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">State</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
															    <input id="state" name="state" placeholder="State" class="form-control" required="true" value="<?php echo set_value('state'); ?>" type="text">
															</div>
														</div>
													</div>
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Offering on behalf of (name on Certificate)*</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
															    <input id="Certificate" name="Certificate" placeholder="name on Certificate" class="form-control" required="true" value="" type="text">
															</div>
														</div>
													</div>
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Source/Reference for making donation :</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
															    <input id="Reference" name="Reference" placeholder="Reference" class="form-control"  value="" type="file">
															</div>
														</div>
													</div>
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">PAN:</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
															    <input id="PAN" name="PAN" placeholder="PAN" class="form-control" value="" type="text">
															</div>
														</div>
													</div>
												</fieldset>
											</div>
										</div>
									</div>
									<!-- Detail form End -->
								</div>   
                               <!-- Firm_Company tab ends -->            
            				</div>
                                <!-- individual tab ends -->
							<div class="col-md-12">
								<div class="span3 offset1">
									<label class="checkbox"> <input type="checkbox" required/>
									<p>I confirm that the information given in this form is true, complete and accurate. <br>
										I agree that the above contribution may be treated as donation towards the development of Kumara Viharam.
										</p>
									</label>
									<button type="submit" class="btn btn-primary my-4">Submit</button>
								</div>
							</div>
            			</div>            			
            		</div>
            </section>
            <!-- ./Tabs -->   
        </div>
        </form>
    </div>
</div>



<script>
	function qty(id){
	    //alert(id);
		$('#totalprice1').empty();
		$('#totalprice').val(' ');
		var qty = $('#qty'+id).val();
		var price = $('#price'+id).val();
		$('#subtotal'+id).html((qty*price).toFixed(2));
		$('#sub'+id).val((qty*price).toFixed(2));
		var sum = 0;
		$('.sub').each(function(){
			if($(this).val()!=""){
				sum += parseFloat($(this).val());
			}
		});
		if(sum != 0){
    		$('#totalprice1').append(sum.toFixed(2));
    		$('#totalprice').val(sum.toFixed(2));
    		 $('#donation').prop('disabled', false);
		}else{
		    $('#donation').prop('disabled', true);
		}
	}
</script>
<script>
    $().ready(function () {
      // validate signup form on keyup and submit
         $("#donation").validate({
            rules:{
                fullName: "required",
                Surname: "required",
                //phone: "required",
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
				
                email:{
                  required: true,
                  email: true
                },
                pincode:{
                  required: true,
                  minlength: 6
                },
            },
            messages:{
                fullName: "Please enter your full name",
                Surname: "Please enter your Sure name",
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
<script type="text/javascript">
$(function () {
    $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href")
        //alert(target);
        if(target == "#Firm_Company"){
            $("#Individual input").prop('disabled', true);
            $("#Individual select").prop('disabled', true);
            $("#Firm_Company input").prop('disabled', false);
        }else if(target == "#Individual"){
            $("#Individual select").prop('disabled', false);
            $("#Individual input").prop('disabled', false);
            $("#Firm_Company input").prop('disabled', true);
        }else{
        }
    });
})
che();
function che(){
$("#Firm_Company input").prop('disabled', true);
}
</script>
<script type="text/javascript">    
$(document).ready(function(){ 
    $("#PAN").change(function () {      
    var inputvalues = $(this).val();      
      var regex = /[A-Z]{5}[0-9]{4}[A-Z]{1}$/;    
      if(!regex.test(inputvalues)){      
      $("#PAN").val("");
      alert("invalid PAN no");    
      return regex.test(inputvalues);    
      }    
    });
});    
</script> 
  <script type="text/javascript">
    $("#Pincode").keyup(function(){
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
function checkvalue(val)
{
    if(val==="others")
       document.getElementById('stone').style.display='block';
    else
       document.getElementById('stone').style.display='none'; 
}
function checkvalue2(val)
{
    if(val==="others")
       document.getElementById('floor').style.display='block';
    else
       document.getElementById('floor').style.display='none'; 
}
function general() {
  var checkBox = document.getElementById("gCheck");
  //var text = document.getElementById("gm");
  if (checkBox.checked == true){
    $("#gm").prop('disabled', false);
  } else {
      $("#gm").prop('disabled', true);
  }
}
function stonec(){
   var checkBox = document.getElementById("sCheck");
  //var text = document.getElementById("gm");
  if (checkBox.checked == true){
    $("#sd").prop('disabled', false);
  } else {
      $("#sd").prop('disabled', true);
  }   
}
function floorc(){
   var checkBox = document.getElementById("fCheck");
  //var text = document.getElementById("gm");
  if (checkBox.checked == true){
    $("#fd").prop('disabled', false);
  } else {
      $("#fd").prop('disabled', true);
  }   
}
</script>