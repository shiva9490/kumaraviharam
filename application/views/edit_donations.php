
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<style>

span.error {
    color: red;
}
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
/*label#price1-error {
    width: 100%;
    color: red;
}*/
</style>
<div class="fluidbody">
<div id="headerpage"></div>
    <div class="pagebanner">
    	<img class="img-responsive" src="<?php echo base_url();?>assets/images/inner/donations.jpg" alt="">
    </div>
<div class="psrtcolm">
	<div class="container">
	    
	    <div class="row">  
        <div class="col-sm-12" style="padding:10px 0px 0px 20px;">
	    <?php foreach($editdonation as $erow) {  ?>
	    <form id="donationfome" name="myForm" action="<?php echo base_url();?>donations/update/<?php echo $erow->donationid?>" method="post" onsubmit="return validateForm()">
	    
	    
	    <div class="row">
	        <div class="col-sm-6">
			<h2>Fund Raising Plan - Major Offerings</h2><br>
			<div class="fom2">
			<div class="tablecol">
				<table class="table table-responsive">
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
        			        <td align="center"><input type="checkbox" id="gCheck" <?php if($erow->general_donation != 0.00){ ?> checked <?php } ?>  onclick="general()"></td>
        			        <td>General Donation</td>
                            <td>
                                <input type="hidden" name="donation">
        						<input type="number" id="price1" name="donation" <?php if($erow->general_donation == 0.00){ ?> disabled <?php } ?> value ="<?php echo $erow->general_donation?>"  onkeyup="qty(1)" placeholder="0.00" min="100.00">
        						<input type="hidden" name="General" id="qty1" value="1">
        						<input type="hidden" class="sub" name="General" id="sub1">
        					</td>
        			    </tr>
        			    <tr>
        			        <td align="center"><input type="checkbox" id="sCheck" <?php if($erow->temple_stone != 0.00){ ?> checked <?php } ?> onclick="stonec()"></td>
        			        <td width="320">
        			            <div class="row">
                                 <div class="col-md-6">Temple Stone</div>
                                 <div class="col-md-6">
        			            <?php //echo '<pre>';print_r($stone_plan);exit;?>
        			        	<select class="form-control" id="price2" <?php if($erow->temple_stone == 0.00){ ?> disabled <?php } ?>  onchange="qty(2)">
        			        		<option value="">Choose Temple Stones</option>
        			        		<?php foreach($stone_plan as $row) { ?>
        			        		<option <?php if($erow->temple_stone == $row->price){ ?> selected <?php } ?> value="<?php echo $row->price; ?>"><?php echo $row->title; ?></option>
        			        		<?php } ?>
        			        		<!--<option value="others">Others</option>-->
        			        	</select><br>
        			        	<input type="hidden" name="General" class="dropdown1" id="qty2" value="1">
        			        	<input type="number" min='1' class="form-control" onkeyup="qty(2)" placeholder="Enter stone qty" id="stone" style='display:none'/>
        			        	<input type="hidden" name="General" class="dropdown2" id="pricestone" value="<?php echo $stone_plan[0]->price?>" style="display:none;">
        			        	<input type="hidden" class="sub" name="stone" id="sub2" value = "<?php echo $erow->temple_stone?>">
        			            </div>
        			            </div>
        			        </td>
                            <td><span class="sub2"><?php echo $erow->temple_stone?></span></td>
        			    </tr>             
        			    <tr>
            			    <td align="center"><input type="checkbox" id="fCheck" <?php if($erow->temple_flooor != 0.00){ ?> checked <?php } ?> onclick="floorc()"></td>
            			    <td>
            			        <div class="row">
                                <div class="col-md-6">Temple Floor Area</div>
                                <div class="col-md-6">
            			    	<select class="form-control" id="price3" <?php if($erow->temple_flooor == 0.00){ ?> disabled <?php } ?> onchange="qty(3)">
            			    		<option value="">Choose Temple Floor Area</option>
            			    		<?php foreach($floor_plan as $row) { ?>
            			    		<option <?php if($erow->temple_flooor == $row->price){ ?> selected <?php } ?> value="<?php echo $row->price; ?>"><?php echo $row->title; ?></option>
            			    		<?php } ?>
            			    		<!--<option value="others">Others</option>-->
            			    	</select><br>
            			        <input type="hidden" name="General" id="qty3"  class="dropdown3" value="1">
            					<input type="number" min='1' class="form-control" onkeyup="qty(3)" placeholder="Enter stone qty" id="floor" style='display:none'/>
            					<input type="hidden" name="General" class="dropdown4" id="price3" value="<?php echo $floor_plan[0]->price?>" style="display:none;">
            					<input type="hidden" class="sub" name="floor" id="sub3" value = "<?php echo $erow->temple_flooor?>">
            			        </div>
            			        </div>
            			    </td>
                            <td><span class="sub3"><?php echo $erow->temple_flooor?></span></td>
        			    </tr>  
        			    <tr>
            			    <td align="center"><input type="checkbox" <?php if($erow->sloka != 0.00){ ?> checked <?php } ?> id="sloka" onclick="qty(4)"></td>
            			    <td>Sloka
            			        <?php foreach($sloka_plan as $row) { ?>
            			        <input type="hidden" name="General" id="price4" value="<?php echo $row->price; ?>">
            			        <?php } ?>
            					<input type="hidden" name="General" id="qty4" value="1">
            					<input type="hidden" class="sub" name="sloka" id="sub4"  value = "<?php echo $erow->sloka?>">
            				</td>
                            <td><span class="sub4"><?php echo $erow->sloka?></span></td>
        			    </tr>
                        <tr>
            			    <td></td>
                            <td>Total</td> 
                            <td>
                                <span id="totalprice1"><?php echo $erow->total_amount?></span>
                                <input type='hidden' name="totalprice" id="totalprice" value='<?php echo $erow->total_amount?>'>
                            </td>
        			    </tr> 
    			    </tbody>
			
				</table>
			</div>
			</div>
		</div>  
		</div>  
	    <div class="row">
            <!-- Tabs -->
                <div class="col-sm-11">            	
            	<div class="contcolm">
				<div class="dnr"><h2>Type of Donor </h2> </div>
					<div class="row">
            			<div class="col-xs-12 ">
            			    <?php echo validation_errors();?>
            				<nav>
                                <ul class="nav nav-tabs">
                                    <li <?php if($erow->doner_type == 1) { ?> class="active" <?php } ?>><a  data-id="1"  data-toggle="pill" href="#Individual">Individual</a></li>
                                    <li <?php if($erow->doner_type == 2) { ?> class="active" <?php } ?>><a  data-id="2" data-toggle="pill" href="#Firm_Company">Firm /Company</a></li>
                                </ul>
                                <input type="hidden" value="<?php echo $erow->doner_type ?>" name="inf" id ="inf">
                            </nav>
                            
            				<div class="tab-content" style="margin-top:20px;">
            				    
                                <!-- Individual tab start -->
            					<div class="tab-pane fade in <?php if($erow->doner_type == 1) { ?> active <?php } ?>" id="Individual" role="tabpanel" aria-labelledby="nav-Individual-tab">
                                    <!-- Detail Form Start -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="fom2">
                                                    <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="col-md-4 control-label">Donor First Name* :</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                <input type="hidden" value="1" name="doner_type">
                                                                <input type="hidden" value="<?php echo $erow->donationid;?>" name="donationid">
                                                                <input id="fullName" name="fullName" placeholder="First Name" class="form-control" required="true" value="<?php if($erow->doner_type == 1) { echo $erow->fullName; } ?>" type="text">
                                                            </div><span class="error" id="error1"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
														<label class="col-md-4 control-label">Donor Surname* :</label>
														<div class="col-md-8 inputGroupContainer">
														    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
														        <input id="Surname" name="Surname" placeholder="Surname" class="form-control" required="true" value="<?php if($erow->doner_type == 1) { echo $erow->Surname;} ?>" type="text">
														    </div><span class="error" id="error2"></span>
														</div>
													</div>
													</div>
													<div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="col-md-4 control-label">Gender*:</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-user"></i></span>
                                                            <select class="selectpicker form-control" name="gender" id='Gender' required="true">
                                                                <option value="">Select Gender</option>
                                                                <option <?php if (($erow->gender == "Male") && ($erow->doner_type == 1)) {  ?> selected <?php } ?> value="Male">Male</option>
                                                                <option <?php if (($erow->gender == "Female") && ($erow->doner_type == 1)) {  ?> selected <?php } ?> value="Female">Female</option>
                                                            </select>
                                                        </div><span class="error" id="error3"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
														<label class="col-md-4 control-label">Date of Birth* :</label>
														<div class="col-md-8 inputGroupContainer">
														    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
														        <input id="Date_of_Birth" name="Date_of_Birth" placeholder="Date of Birth" class="form-control" required="true" value="<?php if($erow->doner_type == 1) { echo $erow->Date_of_Birth;} ?>" type="date">
														    </div><span class="error" id="error10"></span>
														</div>
													</div>
													</div>
													<div class="row">
                                                    <div class="form-group col-md-6">
                                                       <label class="col-md-4 control-label">Son/Daughter:</label>
                                                       <div class="col-md-8 inputGroupContainer">
                                                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                <select class="selectpicker form-control" id="Son/Daughter" name="Son_Daughter">
    		                                                        <option <?php  if(($erow->doner_type == 1) && ($erow->Son_Daughter == "Andhra Pradesh")) { ?> selected <?php } ?> value="">Select</option>
    		                                                        <option <?php  if(($erow->doner_type == 1) && ($erow->Son_Daughter == "Son")) { ?> selected <?php } ?> value="Son">Son</option>
    		                                                        <option <?php  if(($erow->doner_type == 1) && ($erow->Son_Daughter == "Daughter")) { ?> selected <?php } ?> value="Daughter">Daughter</option>
    		                                                        <option <?php  if(($erow->doner_type == 1) && ($erow->Son_Daughter == "Grand Children")) { ?> selected <?php } ?> value="Grand Children">Grand Children</option>
    		                                                        <option <?php  if(($erow->doner_type == 1) && ($erow->Son_Daughter == "Relatives")) { ?> selected <?php } ?> value="Relatives">Relatives</option>
    		                                                        <option <?php  if(($erow->doner_type == 1) && ($erow->Son_Daughter == "Spouse")) { ?> selected <?php } ?> value="Spouse">Spouse</option>
    		                                                        <option <?php  if(($erow->doner_type == 1) && ($erow->Son_Daughter == "Parents")) { ?> selected <?php } ?> value="Parents">Parents</option>
    		                                                        <option <?php  if(($erow->doner_type == 1) && ($erow->Son_Daughter == "other")) { ?> selected <?php } ?> value="other">Other</option>
    		                                                    </select>
                                                            </div>
                                                       </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
														<label class="col-md-4 control-label">Mobile Number* :</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
															    <input id="Mobile_Number" name="Mobile_Number" placeholder="Mobile Number" pattern="[6789][0-9]{9}" class="form-control" required="true" value="<?php if($erow->doner_type == 1) { echo $erow->Mobile_Number;} ?>" type="text" onkeypress="return NumbersOnly(this,event)" maxlength="10">
															</div><span class="error" id="error4"></span>
														</div>
													</div>
													</div>
													<div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="col-md-4 control-label">Email*: </label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                                <input id="Email" name="Email" placeholder="Email" class="form-control" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php if($erow->doner_type == 1) { echo $erow->Email;} ?>" type="email">
                                                            </div><span class="error" id="error9"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-md-4 control-label">Address*:</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                                            <input id="Address" name="Address" placeholder="Address" class="form-control" required="true" value="<?php if($erow->doner_type == 1) { echo $erow->Address;} ?>" type="text">
                                                            </div><span class="error" id="error5"></span>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="col-md-4 control-label">Pincode*: </label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                                                <input id="Pincode" name="Pincode" placeholder="Pincode" class="form-control" required="true" value="<?php if($erow->doner_type == 1) { echo $erow->Pincode; } ?>"  type="text" onkeypress="return NumbersOnly(this,event)" maxlength="6">
                                                            </div><span class="error" id="error6"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
														<label class="col-md-4 control-label">City</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
															    <input id="city" name="city" placeholder="City" class="form-control" required="true" value="<?php if($erow->doner_type == 1) { echo $erow->city;} ?>" type="text">
															</div>
														</div>
													</div>
													</div>
													<div class="row">
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">State *</label>
														<div class="col-md-8 inputGroupContainer">
														    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
														        <select id="state" name="state"  class="selectpicker form-control"  required>
    																	<option value="">Select State</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Andhra Pradesh")) { ?> selected <?php } ?> value="Andhra Pradesh">Andhra Pradesh</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Arunachal Pradesh")) { ?> selected <?php } ?> value="Arunachal Pradesh">Arunachal Pradesh</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Assam")) { ?> selected <?php } ?> value="Assam">Assam</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Bihar")) { ?> selected <?php } ?> value="Bihar">Bihar</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Chhattisgarh")) { ?> selected <?php } ?> value="Chhattisgarh">Chhattisgarh</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Goa")) { ?> selected <?php } ?> value="Goa">Goa</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Gujarat")) { ?> selected <?php } ?> value="Gujarat">Gujarat</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Haryana")) { ?> selected <?php } ?> value="Haryana">Haryana</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Himachal Pradesh")) { ?> selected <?php } ?> value="Himachal Pradesh">Himachal Pradesh</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Jammu and Kashmir")) { ?> selected <?php } ?> value="Jammu and Kashmir">Jammu and Kashmir</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Jharkhand")) { ?> selected <?php } ?> value="Jharkhand">Jharkhand</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Karnataka")) { ?> selected <?php } ?> value="Karnataka">Karnataka</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Kerala")) { ?> selected <?php } ?> value="Kerala">Kerala</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Madhya Pradesh")) { ?> selected <?php } ?> value="Madhya Pradesh">Madhya Pradesh</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Maharashtra")) { ?> selected <?php } ?> value="Maharashtra">Maharashtra</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Manipur")) { ?> selected <?php } ?> value="Manipur">Manipur</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Meghalaya")) { ?> selected <?php } ?> value="Meghalaya">Meghalaya</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Mizoram")) { ?> selected <?php } ?> value="Mizoram">Mizoram</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Nagaland")) { ?> selected <?php } ?> value="Nagaland">Nagaland</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Odisha")) { ?> selected <?php } ?> value="Odisha">Odisha</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Punjab")) { ?> selected <?php } ?> value="Punjab">Punjab</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Rajasthan")) { ?> selected <?php } ?> value="Rajasthan">Rajasthan</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Sikkim")) { ?> selected <?php } ?> value="Sikkim">Sikkim</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Tamil Nadu")) { ?> selected <?php } ?> value="Tamil Nadu">Tamil Nadu</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Telangana")) { ?> selected <?php } ?> value="Telangana">Telangana</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Tripura")) { ?> selected <?php } ?> value="Tripura">Tripura</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Uttar Pradesh")) { ?> selected <?php } ?> value="Uttar Pradesh">Uttar Pradesh</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Uttarakhand")) { ?> selected <?php } ?> value="Uttarakhand">Uttarakhand</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "West Bengal")) { ?> selected <?php } ?> value="West Bengal">West Bengal</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Andaman and Nicobar")) { ?> selected <?php } ?> value="Andaman and Nicobar">Andaman and Nicobar</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Chandigarh")) { ?> selected <?php } ?> value="Chandigarh">Chandigarh</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Dadra and Nagar Haveli")) { ?> selected <?php } ?> value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Daman and Diu")) { ?> selected <?php } ?> value="Daman and Diu">Daman and Diu</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Delhi")) { ?> selected <?php } ?> value="Delhi">Delhi</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Lakshadweep")) { ?> selected <?php } ?> value="Lakshadweep">Lakshadweep</option>
    																	<option <?php  if(($erow->doner_type == 1) && ($erow->state == "Ladakh and Puducherry")) { ?> selected <?php } ?> value="Ladakh and Puducherry">Ladakh and Puducherry</option>
    																</select>
														    </div><span class="error" id="error13"></span>
														</div>
													</div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-md-4 control-label">Gotram</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                                                <input id="Gotram" name="Gotram" placeholder="Gotram" class="form-control" value="<?php if($erow->doner_type == 1) { echo $erow->Gotram; } ?>" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="form-group col-md-6">
														<label class="col-md-4 control-label">Offering on behalf of (name on Certificate)*</label>
														<div class="col-md-8 inputGroupContainer">
														    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
														        <input id="Certificate" name="Certificate" placeholder="name on Certificate" class="form-control" required="true" value="<?php if($erow->doner_type == 1) { echo $erow->Certificate;} ?>" type="text">
														    </div><span class="error" id="error7"></span>
														</div>
													</div>
                                                    
                                                        <div class="form-group col-md-6">
    														<label class="col-md-4 control-label">Birthstar*: </label>
    														<div class="col-md-8 inputGroupContainer">
    															<div class="input-group">
    																<span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
    																<select class="selectpicker form-control" name="Birthstar" id="Birthstar" required>
    																	<option  value="">Select Birthstar</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Ashwini")) {  ?> selected <?php } ?> value="Ashwini">Ashwini</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Bharani")) {  ?> selected <?php } ?> value="Bharani">Bharani</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Krithika")) {  ?> selected <?php } ?> value="Krithika">Kritthika</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Rohini")) {  ?> selected <?php } ?> value="Rohini">Rohini</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Mrigashiras")) {  ?> selected <?php } ?> value="Mrigashiras">Mrigashiras</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Aardhra /Arudra")) {  ?> selected <?php } ?> value="Aardhra /Arudra">Aardhra /Arudra</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Punarvasu")) {  ?> selected <?php } ?> value="Punarvasu">Punarvasu</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Pushyami")) {  ?> selected <?php } ?> value="Pushyami">Pushyami</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Ashlesha")) {  ?> selected <?php } ?> value="Ashlesha">Ashlesha</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Magha/Makha")) {  ?> selected <?php } ?> value="Magha/Makha">Magha/Makha</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "PoorvaPhalguni")) {  ?> selected <?php } ?> value="PoorvaPhalguni">PoorvaPhalguni</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Uthraphalguni")) {  ?> selected <?php } ?> value="Uthraphalguni">Uthraphalguni</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Hastha")) {  ?> selected <?php } ?> value="Hastha">Hastha</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Chitra")) {  ?> selected <?php } ?> value="Chitra">Chitra</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Swaathi")) {  ?> selected <?php } ?> value="Swaathi">Swaathi</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Vishaakha")) {  ?> selected <?php } ?> value="Vishaakha">Vishaakha</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Anuraadha")) {  ?> selected <?php } ?> value="Anuraadha">Anuraadha</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Jyeshta")) {  ?> selected <?php } ?> value="Jyeshta">Jyeshta</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Moola")) {  ?> selected <?php } ?> value="Moola">Moola</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Poorvashaada")) {  ?> selected <?php } ?> value="Poorvashaada">Poorvashaada</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Uthrashaada")) {  ?> selected <?php } ?> value="Uthrashaada">Uthrashaada</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Shraavan")) {  ?> selected <?php } ?> value="Shraavan">Shraavan</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Dhanishta")) {  ?> selected <?php } ?> value="Dhanishta">Dhanishta</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Shathabhisha")) {  ?> selected <?php } ?> value="Shathabhisha">Shathabhisha</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Poorvabhadra")) {  ?> selected <?php } ?> value="Poorvabhadra">Poorvabhadra</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Uthrabhadra")) {  ?> selected <?php } ?> value="Uthrabhadra">Uthrabhadra</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->Birthstar == "Revathi")) {  ?> selected <?php } ?> value="Revathi">Revathi</option>
    															</select>
    															</div><span class="error" id="error8"></span>
    													    </div>
    													</div>
    												</div>
    												<div class="row">
    													<div class="form-group col-md-6">
    														<label class="col-md-4 control-label">Source/Reference for making donation :</label>
    														<div class="col-md-8 inputGroupContainer">
    															<div class="input-group">
    																<span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
    																<select class="selectpicker form-control" name="reference_marking">
    																    <option  value="">Select </option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->reference_marking == "Facebook")) {  ?> selected <?php } ?> value="Facebook">Facebook</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->reference_marking == "Twitter")) {  ?> selected <?php } ?> value="Twitter">Twitter</option>
    																	<option <?php if(($erow->doner_type == 1) && ($erow->reference_marking == "Instagram")) {  ?> selected <?php } ?> value="Instagram">Instagram</option>
    		                                                            <option <?php if(($erow->doner_type == 1) && ($erow->reference_marking == "Whatsapp")) {  ?> selected <?php } ?>  value="Whatsapp">Whatsapp</option>
    		                                                            <option <?php if(($erow->doner_type == 1) && ($erow->reference_marking == "NTV")) {  ?> selected <?php } ?>  value="NTV">NTV</option>
    		                                                            <option <?php if(($erow->doner_type == 1) && ($erow->reference_marking == "Sakshi TV")) {  ?> selected <?php } ?>  value="Sakshi TV">Sakshi TV</option>
    		                                                            <option <?php if(($erow->doner_type == 1) && ($erow->reference_marking == "TV9")) {  ?> selected <?php } ?>  value="TV9">TV9</option>
    		                                                            <option <?php if(($erow->doner_type == 1) && ($erow->reference_marking == "Times of India")) {  ?> selected <?php } ?>  value="Times of India">Times of India</option>
    		                                                            <option <?php if(($erow->doner_type == 1) && ($erow->reference_marking == "Enadu Paper")) {  ?> selected <?php } ?>  value="Enadu Paper">Enadu Paper</option>
    		                                                            <option <?php if(($erow->doner_type == 1) && ($erow->reference_marking == "My temple")) {  ?> selected <?php } ?>  value="My temple">My temple</option>
    		                                                            <option <?php if(($erow->doner_type == 1) && ($erow->reference_marking == "other")) {  ?> selected <?php } ?>  value="other">Other</option>
    																</select>
    															</div>
    														</div>
    													</div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-md-4 control-label">Purpose of Donation:</label>
                                                            <div class="col-md-8 inputGroupContainer">
                                                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                                                    <select class="selectpicker form-control" id="Purpose" name="Purpose">
    		                                                        <option  value="">Select</option>
    		                                                        <option <?php if(($erow->doner_type == 1) && ($erow->Purpose == "Marriage")) {  ?> selected <?php } ?>   value="Marriage">Marriage</option>
    		                                                        <option <?php if(($erow->doner_type == 1) && ($erow->Purpose == "Children")) {  ?> selected <?php } ?>   value="Children">Children</option>
    		                                                        <option <?php if(($erow->doner_type == 1) && ($erow->Purpose == "Job")) {  ?> selected <?php } ?>   value="Job">Job</option>
    		                                                        <option <?php if(($erow->doner_type == 1) && ($erow->Purpose == "Debts Clearing")) {  ?> selected <?php } ?>   value="Debts Clearing">Debts Clearing</option>
    		                                                        <option <?php if(($erow->doner_type == 1) && ($erow->Purpose == "Health")) {  ?> selected <?php } ?>   value="Health">Health</option>
    		                                                        <option <?php if(($erow->doner_type == 1) && ($erow->Purpose == "Education")) {  ?> selected <?php } ?>   value="Education">Education</option>
    		                                                        <option <?php if(($erow->doner_type == 1) && ($erow->Purpose == "other")) {  ?> selected <?php } ?>   value="other">Other</option>
    		                                                        </select>
                                                               </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
    														<label class="col-md-4 control-label">PAN:</label>
    														<div class="col-md-8 inputGroupContainer">
    														    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    														        <input id="PAN" name="PAN"  placeholder="PAN" onkeyup="panv()" class="form-control" value="<?php if($erow->doner_type == 1) { echo $erow->PAN; } ?>" type="text">
    														    </div><span class="error" id="error12"></span>
    														</div>
    													</div>
    												</div>
											</div>
                                        </div>
                                    </div>
                                    <!-- Detail form End -->
                                </div>
            					<div class="tab-pane fade in <?php if($erow->doner_type == 2) { ?> active <?php } ?>" id="Firm_Company" role="tabpanel" aria-labelledby="nav-Firm_Company-tab">									
									<!-- Detail Form Start -->								  
									<div class="row">
										<div class="col-md-12">
											<div class="fom2">
												    <div class="row">
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Donor First Name* :</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
															    <input <?php if($erow->doner_type != 2) { ?> disabled <?php } ?> type="hidden" value="2" name="doner_type">
															    <input <?php if($erow->doner_type != 2) { ?> disabled <?php } ?> id="fullName1" name="fullName" placeholder="First Name" class="form-control" required="true" value="<?php if($erow->doner_type == 2) { echo $erow->fullName; } ?>" type="text">
															</div><span class="error" id="err1"></span>
														</div>
													</div>
								                    <div class="form-group col-md-6">
														<label class="col-md-4 control-label">Donor Surname* :</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
															    <input <?php if($erow->doner_type != 2) { ?> disabled <?php } ?> id="Surname1" name="Surname" placeholder="Surname" class="form-control" required="true" value="<?php if($erow->doner_type == 2) { echo $erow->Surname; } ?>" type="text">
															</div><span class="error" id="err2"></span>
														</div>
													</div>
													</div>
													<div class="row">
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Firm/Company  Name* : </label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
															    <input <?php if($erow->doner_type != 2) { ?> disabled <?php } ?> id="Firm" name="Firm" placeholder="Firm/Company" class="form-control" required="true" value="<?php if($erow->doner_type == 2) { echo $erow->Firm; } ?>" type="text">
															</div><span class="error" id="err3"></span>
														</div>
													</div>
													
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Email*: </label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
															    <input <?php if($erow->doner_type != 2) { ?> disabled <?php } ?> id="Email1" name="Email" placeholder="Email" class="form-control" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php if($erow->doner_type == 2) { echo $erow->Email; } ?>" type="email">
															</div><span class="error" id="err4"></span>
														</div>
													</div>
													</div>
													<div class="row">
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Address*:</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
															    <input <?php if($erow->doner_type != 2) { ?> disabled <?php } ?> id="Address1" name="Address" placeholder="Address" class="form-control" required="true" value="<?php if($erow->doner_type == 2) { echo $erow->Address; } ?>" type="text">
															</div><span class="error" id="err5"></span>
														</div>
													</div>
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Pincode*: </label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
															    <input <?php if($erow->doner_type != 2) { ?> disabled <?php } ?> id="Pincode1" name="Pincode" placeholder="Pincode" class="form-control" required="true" value="<?php if($erow->doner_type == 2) { echo $erow->Pincode; } ?>" type="text" onkeypress="return NumbersOnly(this,event)" maxlength="6">
															</div><span class="error" id="err6"></span>
														</div>
													</div>
													</div>
													<div class="row">
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Purpose of Donation:</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
															       <select  <?php if($erow->doner_type != 2) { ?> disabled <?php } ?> class="selectpicker form-control" id="Purpose" name="Purpose">
    		                                                        <option <?php if(($erow->doner_type == 2) && ($erow->Purpose == "other")) {  ?> selected <?php } ?>   value="">Select</option>
    		                                                        <option <?php if(($erow->doner_type == 2) && ($erow->Purpose == "Marriage")) {  ?> selected <?php } ?>   value="Marriage">Marriage</option>
    		                                                        <option <?php if(($erow->doner_type == 2) && ($erow->Purpose == "Children")) {  ?> selected <?php } ?>   value="Children">Children</option>
    		                                                        <option <?php if(($erow->doner_type == 2) && ($erow->Purpose == "Job")) {  ?> selected <?php } ?>   value="Job">Job</option>
    		                                                        <option <?php if(($erow->doner_type == 2) && ($erow->Purpose == "Debts Clearing")) {  ?> selected <?php } ?>   value="Debts Clearing">Debts Clearing</option>
    		                                                        <option <?php if(($erow->doner_type == 2) && ($erow->Purpose == "Health")) {  ?> selected <?php } ?>   value="Health">Health</option>
    		                                                        <option <?php if(($erow->doner_type == 2) && ($erow->Purpose == "Education")) {  ?> selected <?php } ?>   value="Education">Education</option>
    		                                                        <option <?php if(($erow->doner_type == 2) && ($erow->Purpose == "other")) {  ?> selected <?php } ?>   value="other">Other</option>
    		                                                        </select>
														    </div>
														</div>
													</div>
													
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Mobile Number* :</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
															    <input <?php if($erow->doner_type != 2) { ?> disabled <?php } ?> id="Mobile_Number1" name="Mobile_Number" placeholder="Mobile Number" pattern="[6789][0-9]{9}" class="form-control" required="true" value="<?php if($erow->doner_type == 2) { echo $erow->Mobile_Number	; } ?>" type="text" onkeypress="return NumbersOnly(this,event)" maxlength="10">
															</div><span class="error" id="err7"></span>
														</div>
													</div>
													</div>
													<div class="row">
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">City</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
															    <input <?php if($erow->doner_type != 2) { ?> disabled <?php } ?> id="city1" name="city" placeholder="City" class="form-control" required="true" value="<?php if($erow->doner_type == 2) { echo $erow->city; } ?>" type="text">
															</div>
														</div>
													</div>
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">State</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
															    <select <?php if($erow->doner_type != 2) { ?> disabled <?php } ?> id="state1" name="state"  class="selectpicker form-control"  required>
    																	<option value="">Select State</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Andhra Pradesh")) { ?> selected <?php } ?> value="Andhra Pradesh">Andhra Pradesh</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Arunachal Pradesh")) { ?> selected <?php } ?> value="Arunachal Pradesh">Arunachal Pradesh</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Assam")) { ?> selected <?php } ?> value="Assam">Assam</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Bihar")) { ?> selected <?php } ?> value="Bihar">Bihar</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Chhattisgarh")) { ?> selected <?php } ?> value="Chhattisgarh">Chhattisgarh</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Goa")) { ?> selected <?php } ?> value="Goa">Goa</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Gujarat")) { ?> selected <?php } ?> value="Gujarat">Gujarat</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Haryana")) { ?> selected <?php } ?> value="Haryana">Haryana</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Himachal Pradesh")) { ?> selected <?php } ?> value="Himachal Pradesh">Himachal Pradesh</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Jammu and Kashmir")) { ?> selected <?php } ?> value="Jammu and Kashmir">Jammu and Kashmir</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Jharkhand")) { ?> selected <?php } ?> value="Jharkhand">Jharkhand</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Karnataka")) { ?> selected <?php } ?> value="Karnataka">Karnataka</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Kerala")) { ?> selected <?php } ?> value="Kerala">Kerala</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Madhya Pradesh")) { ?> selected <?php } ?> value="Madhya Pradesh">Madhya Pradesh</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Maharashtra")) { ?> selected <?php } ?> value="Maharashtra">Maharashtra</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Manipur")) { ?> selected <?php } ?> value="Manipur">Manipur</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Meghalaya")) { ?> selected <?php } ?> value="Meghalaya">Meghalaya</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Mizoram")) { ?> selected <?php } ?> value="Mizoram">Mizoram</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Nagaland")) { ?> selected <?php } ?> value="Nagaland">Nagaland</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Odisha")) { ?> selected <?php } ?> value="Odisha">Odisha</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Punjab")) { ?> selected <?php } ?> value="Punjab">Punjab</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Rajasthan")) { ?> selected <?php } ?> value="Rajasthan">Rajasthan</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Sikkim")) { ?> selected <?php } ?> value="Sikkim">Sikkim</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Tamil Nadu")) { ?> selected <?php } ?> value="Tamil Nadu">Tamil Nadu</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Telangana")) { ?> selected <?php } ?> value="Telangana">Telangana</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Tripura")) { ?> selected <?php } ?> value="Tripura">Tripura</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Uttar Pradesh")) { ?> selected <?php } ?> value="Uttar Pradesh">Uttar Pradesh</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Uttarakhand")) { ?> selected <?php } ?> value="Uttarakhand">Uttarakhand</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "West Bengal")) { ?> selected <?php } ?> value="West Bengal">West Bengal</option>
    																    <option <?php  if(($erow->doner_type == 2) && ($erow->state == "Andaman and Nicobar")) { ?> selected <?php } ?> value="Andaman and Nicobar">Andaman and Nicobar</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Chandigarh")) { ?> selected <?php } ?> value="Chandigarh">Chandigarh</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Dadra and Nagar Haveli")) { ?> selected <?php } ?> value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Daman and Diu")) { ?> selected <?php } ?> value="Daman and Diu">Daman and Diu</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Delhi")) { ?> selected <?php } ?> value="Delhi">Delhi</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Lakshadweep")) { ?> selected <?php } ?> value="Lakshadweep">Lakshadweep</option>
    																	<option <?php  if(($erow->doner_type == 2) && ($erow->state == "Ladakh and Puducherry")) { ?> selected <?php } ?> value="Ladakh and Puducherry">Ladakh and Puducherry</option>
    																</select>
															</div><span class="error" id="err8"></span>
														</div>
													</div>
													</div>
													<div class="row">
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Offering on behalf of (name on Certificate)*</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
															    <input <?php if($erow->doner_type != 2) { ?> disabled <?php } ?> id="Certificate1" name="Certificate" placeholder="name on Certificate" class="form-control" required="true" value="<?php if($erow->doner_type == 2) { echo $erow->Certificate; } ?>" type="text">
															</div><span class="error" id="err9"></span>
														</div>
													</div>
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">Source/Reference for making donation :</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
															    <select class="selectpicker form-control" name="reference_marking" <?php if($erow->doner_type != 2) { ?> disabled <?php } ?>>
    															    <option  value="">Select </option>
    																<option <?php if(($erow->doner_type == 2) && ($erow->reference_marking == "Facebook")) {  ?> selected <?php } ?> value="Facebook">Facebook</option>
    																<option <?php if(($erow->doner_type == 2) && ($erow->reference_marking == "Twitter")) {  ?> selected <?php } ?> value="Twitter">Twitter</option>
    																<option <?php if(($erow->doner_type == 2) && ($erow->reference_marking == "Instagram")) {  ?> selected <?php } ?> value="Instagram">Instagram</option>
    															    <option <?php if(($erow->doner_type == 2) && ($erow->reference_marking == "Whatsapp")) {  ?> selected <?php } ?>  value="Whatsapp">Whatsapp</option>
    		                                                        <option <?php if(($erow->doner_type == 2) && ($erow->reference_marking == "NTV")) {  ?> selected <?php } ?>  value="NTV">NTV</option>
    		                                                        <option <?php if(($erow->doner_type == 2) && ($erow->reference_marking == "Sakshi TV")) {  ?> selected <?php } ?>  value="Sakshi TV">Sakshi TV</option>
    		                                                        <option <?php if(($erow->doner_type == 2) && ($erow->reference_marking == "TV9")) {  ?> selected <?php } ?>  value="TV9">TV9</option>
    		                                                        <option <?php if(($erow->doner_type == 2) && ($erow->reference_marking == "Times of India")) {  ?> selected <?php } ?>  value="Times of India">Times of India</option>
    		                                                        <option <?php if(($erow->doner_type == 2) && ($erow->reference_marking == "Enadu Paper")) {  ?> selected <?php } ?>  value="Enadu Paper">Enadu Paper</option>
    		                                                        <option <?php if(($erow->doner_type == 2) && ($erow->reference_marking == "My temple")) {  ?> selected <?php } ?>  value="My temple">My temple</option>
    		                                                        <option <?php if(($erow->doner_type == 2) && ($erow->reference_marking == "other")) {  ?> selected <?php } ?>  value="other">Other</option>
    																</select>
															</div>
														</div>
													</div>
													</div>
													<div class="row">
													<div class="form-group col-md-6">
														<label class="col-md-4 control-label">PAN:</label>
														<div class="col-md-8 inputGroupContainer">
															<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
															    <input id="PAN1" name="PAN" <?php if(($erow->PAN != '') && ($erow->doner_type != 2)) { ?> disabled <?php } ?> placeholder="PAN" class="form-control" value="<?php if($erow->doner_type == 2) { echo $erow->PAN; } ?>" type="text">
															</div><span class="error" id="err10"></span>
														</div>
													</div>
													</div>
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
								    <span class="error" id="error11"></span>
									<label class="checkbox"> <input id="tc" name="tc" type="checkbox" required/>
									<p>I confirm that the information given in this form is true, complete and accurate. <br>
										I agree that the above contribution may be treated as donation towards the development of Kumara Viharam.
										</p>
									</label>
									<button type="button" id="sb" class="btn btn-primary my-4" onclick="fv()">Submit</button>
								</div>
							</div>
            			</div>            			
            		</div>
            <!-- ./Tabs -->   
                </div>
                </div>
        </div>
        
        </form>
        <?php } ?>
    </div>
    </div>
    </div>
</div>



<script>
	function qty(id){
		$('#totalprice1').empty();
		$('#totalprice').val(' ');
		var qty = $('#qty'+id).val();
		var price = $('#price'+id).val();
		if(id == 4){
		    //alert(id);
		    var checkBox4 = document.getElementById("sloka");
		    //alert(checkBox4);
		    if(checkBox4.checked == true){
		    	qtys();
		    	$('#subtotal'+id).html((qty*price).toFixed(2));
		    	$('#sub'+id).val((qty*price).toFixed(2));
		    	$('.sub'+id).html((qty*price).toFixed(2));
		    	var sum = 0;
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
		    }else{
		    	qtys();
		    	var d = 0;
		    	$('#subtotal'+id).html((qty*price).toFixed(2));
		    	$('#sub'+id).val((d).toFixed(2));
		    	$('.sub'+id).html((d).toFixed(2));
		    	
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
		} else{
		    if(price != "others"){
		    	if(id == 2){
		    	    qtys();
		        } else if(id == 3){
		            checkvalue2();
		        }
		    	$('#subtotal'+id).html((qty*price).toFixed(2));
		    	$('#sub'+id).val((qty*price).toFixed(2));
		    	$('.sub'+id).html((qty*price).toFixed(2));
		    	var sum = 0;
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
		    }else{
		        if(id == 2){
		            qtys();
		            var p3 = $('#stone').val();
		            var s = $('#pricestone').val();
		            //alert(s);
		            $('#subtotal'+id).html((s*p3).toFixed(2));
    		    	$('#sub'+id).val((s*p3).toFixed(2));
    		    	$('.sub'+id).html((s*p3).toFixed(2));
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
		    	    
		    	    
		        } else if(id == 3){
		            checkvalue2();
		        }
		    }
	    }
	    
	    if(sum>=50000){
	        var inf = document.getElementById('inf').value;
	        if(inf==1){
	            $("#PAN").prop('disabled', false);
	            $("#PAN1").prop('disabled', true);
	        } else {
	            $("#PAN").prop('disabled', true);
	            $("#PAN1").prop('disabled', false);
	        }
	    } else{
	        $("#PAN").prop('disabled', true);
	        $("#PAN1").prop('disabled', true);
	    }
	}
</script>
<script>
    $().ready(function () {
      // validate signup form on keyup and submit
         $("#donationfome").validate({
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
        var totalprice = document.getElementById('totalprice').value;
        if(target == "#Firm_Company"){
            $("#Individual input").prop('disabled', true);
            $("#Individual select").prop('disabled', true);
            $("#Firm_Company input").prop('disabled', false);
            $("#Firm_Company select").prop('disabled', false);
            if(totalprice >= 50000){
                $("#PAN1").prop('disabled', false);
            } else{
                $("#PAN1").prop('disabled', true);
            }
        }else if(target == "#Individual"){
            $("#Individual select").prop('disabled', false);
            $("#Individual input").prop('disabled', false);
            $("#Firm_Company input").prop('disabled', true);
            $("#Firm_Company select").prop('disabled', true);
            if(totalprice >= 50000){
                $("#PAN").prop('disabled', false);
            } else{
                $("#PAN").prop('disabled', true);
            }
        }else{
        }
    });
})

</script>
<script type="text/javascript">    
$(document).ready(function(){ 
    $("#PAN").change(function () {      
    var inputvalues = $(this).val();      
      var regex = /[A-Z,a-z]{5}[0-9]{4}[A-Z,a-z]{1}$/;    
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
                  //$('#city').val(data.PostOffice[0].Circle);
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
<script type="text/javascript">
    $("#Pincode1").keyup(function(){
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
                  $('#state1').val(data.PostOffice[0].State);
                  $('#district1').val(data.PostOffice[0].District);
                  //$('#city1').val(data.PostOffice[0].Circle);
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
    function qtys(){
    	var val= $('#price2').val();
        if(val==="others"){
            var a = 0;
            $('#sub2').val((a).toFixed(2));
        	$('.sub2').html((a).toFixed(2));
        	$('.dropdown1').css('display','none');
        	$('.dropdown2').css('display','block');
            document.getElementById('stone').style.display='block';
        }else{
           document.getElementById('stone').style.display='none'; 
    	}
    }
    
    function checkvalue2(){
        var val= $('#price3').val();
        if(val==="others")
           document.getElementById('floor').style.display='block';
        else
           document.getElementById('floor').style.display='none'; 
    }
function general() {
  var checkBox = document.getElementById("gCheck");
  //var text = document.getElementById("gm");
  if (checkBox.checked == true){
    $("#price1").prop('disabled', false);
  } else {
		$('#price1').val('0.00');
		$('#sub1').val('0.00');
      $("#price1").prop('disabled', true);
      qty(1)
  }
}
function stonec(){
   var checkBox = document.getElementById("sCheck");
  //var text = document.getElementById("gm");
  if (checkBox.checked == true){
    $("#price2").prop('disabled', false);
  } else {
      $("#price2").prop('disabled', true);
	  $("#price2")[0].selectedIndex = '';
      qty(2);
      var a = 0;
      $('#sub2').val((a).toFixed(2));
	  $('.sub2').html((a).toFixed(2));
  }   
}
function floorc(){
   var checkBox = document.getElementById("fCheck");
  //var text = document.getElementById("gm");
  if (checkBox.checked == true){
    $("#price3").prop('disabled', false);
  } else {
      var b = 0;
      $("#price3").prop('disabled', true);
      $("#price3")[0].selectedIndex = '';
      qty(3);
      $('#sub3').val((b).toFixed(2));
	  $('.sub3').html((b).toFixed(2));
  }   
}
function sloka(){
    //alert('a');
   var checkBox = document.getElementById("sloka");
    var qty4 = $('#qty4').val();
    var price4 = $('#price4').val();
    if (checkBox.checked == true){
        $('#sub4').val((qty4).toFixed(2));
	    $('.sub4').html((qty4).toFixed(2));
	    var sum = 0;
		$('.sub').each(function(){
			if($(this).val()!=""){
				sum += parseFloat($(this).val());
			}
		});
		$('#totalprice1').append(sum.toFixed(2));
		$('#totalprice').val(sum.toFixed(2));
		
    } else {
        //$("#price3").prop('disabled', true);
        var c = 0;
        alert(a);
        $('#sub4').val((c).toFixed(2));
        $('.sub4').html((c).toFixed(2));
        var sum = 0;
        $('.sub').each(function(){
            if($(this).val()!=""){
                sum += parseFloat($(this).val());
            }
        });
        $('#totalprice1').append(sum.toFixed(2));
        $('#totalprice').val(sum.toFixed(2));
		
  }   
}
</script>
<!--<script>
    function validateForm() {
      var x, text;
      x = document.getElementById("fullName").value;
      alert(x);
      if (x == '') {
        text = "please fill this field";
      }
      document.getElementById("d1").innerHTML = text;
    }
</script>-->
<script>
    function fv() {
        var inf = document.getElementById('inf').value;
        
        if(inf == 1){
        var regex = /[A-Z,a-z]{5}[0-9]{4}[A-Z,a-z]{1}$/;
        var totalprice = document.getElementById('totalprice').value;
        var uname = document.getElementById('fullName').value;
        var surname = document.getElementById('Surname').value;
        var gender = document.getElementById('Gender').value;
        var Mobile_Number = document.getElementById('Mobile_Number').value;
        var Email = document.getElementById('Email').value;
        var Address = document.getElementById('Address').value;
        var Pincode = document.getElementById('Pincode').value;
        var Certificate = document.getElementById('Certificate').value;
        var Birthstar = document.getElementById('Birthstar').value;
        var Date_of_Birth = document.getElementById('Date_of_Birth').value;
        var PAN = document.getElementById('PAN').value;
        var tc = document.getElementById('tc');
        var state = document.getElementById('state').value;
       //alert(Mobile_Number.length);
        if (!uname) {
            document.getElementById("error1").innerHTML = "Enter First Name";
            return false;
        } else if(!surname) { 
            document.getElementById("error1").innerHTML = "";
            document.getElementById("error2").innerHTML = "Enter surname";
        } else if(!gender) { 
            document.getElementById("error1").innerHTML = "";
            document.getElementById("error2").innerHTML = "";
            document.getElementById("error3").innerHTML = "select gender";
        } else if(!Date_of_Birth) { 
            document.getElementById("error1").innerHTML = "";
            document.getElementById("error2").innerHTML = "";
            document.getElementById("error3").innerHTML = "";
            document.getElementById("error10").innerHTML = "Enter Date of Birth";
        } else if(Mobile_Number.length != 10) { 
            document.getElementById("error1").innerHTML = "";
            document.getElementById("error2").innerHTML = "";
            document.getElementById("error3").innerHTML = "";
            document.getElementById("error10").innerHTML = "";
            document.getElementById("error4").innerHTML = "Enter Mobile Number";
        } else if(!Email) { 
            document.getElementById("error1").innerHTML = "";
            document.getElementById("error2").innerHTML = "";
            document.getElementById("error3").innerHTML = "";
            document.getElementById("error10").innerHTML = "";
            document.getElementById("error4").innerHTML = "";
            document.getElementById("error9").innerHTML = "Enter Email";
        } else if(!Address) { 
            document.getElementById("error1").innerHTML = "";
            document.getElementById("error2").innerHTML = "";
            document.getElementById("error3").innerHTML = "";
            document.getElementById("error10").innerHTML = "";
            document.getElementById("error4").innerHTML = "";
            document.getElementById("error9").innerHTML = "";
            document.getElementById("error5").innerHTML = "Enter Address";
        } else if(Pincode.length != 6) { 
            document.getElementById("error1").innerHTML = "";
            document.getElementById("error2").innerHTML = "";
            document.getElementById("error3").innerHTML = "";
            document.getElementById("error10").innerHTML = "";
            document.getElementById("error4").innerHTML = "";
            document.getElementById("error9").innerHTML = "";
            document.getElementById("error5").innerHTML = "";
            document.getElementById("error6").innerHTML = "Enter Pincode";
        }  else if(state != null && state.checked) { 
            alert(a)
            document.getElementById("error1").innerHTML = "";
            document.getElementById("error2").innerHTML = "";
            document.getElementById("error3").innerHTML = "";
            document.getElementById("error10").innerHTML = "";
            document.getElementById("error4").innerHTML = "";
            document.getElementById("error9").innerHTML = "";
            document.getElementById("error5").innerHTML = "";
            document.getElementById("error6").innerHTML = "";
            document.getElementById("error13").innerHTML = "select State";
        }  else if(!Certificate) { 
            document.getElementById("error1").innerHTML = "";
            document.getElementById("error2").innerHTML = "";
            document.getElementById("error3").innerHTML = "";
            document.getElementById("error10").innerHTML = "";
            document.getElementById("error4").innerHTML = "";
            document.getElementById("error9").innerHTML = "";
            document.getElementById("error5").innerHTML = "";
            document.getElementById("error6").innerHTML = "";
            document.getElementById("error13").innerHTML = "";
            document.getElementById("error7").innerHTML = "Enter name on Certificate";
        } else if(!Birthstar) { 
            document.getElementById("error1").innerHTML = "";
            document.getElementById("error2").innerHTML = "";
            document.getElementById("error3").innerHTML = "";
            document.getElementById("error10").innerHTML = "";
            document.getElementById("error4").innerHTML = "";
            document.getElementById("error9").innerHTML = "";
            document.getElementById("error5").innerHTML = "";
            document.getElementById("error6").innerHTML = "";
            document.getElementById("error7").innerHTML = "";
            document.getElementById("error8").innerHTML = "Enter Birthstar";
        } else if(!regex.test(PAN) && totalprice >= 50000){ 
            document.getElementById("error1").innerHTML = "";
            document.getElementById("error2").innerHTML = "";
            document.getElementById("error3").innerHTML = "";
            document.getElementById("error10").innerHTML = "";
            document.getElementById("error4").innerHTML = "";
            document.getElementById("error9").innerHTML = "";
            document.getElementById("error5").innerHTML = "";
            document.getElementById("error6").innerHTML = "";
            document.getElementById("error7").innerHTML = "";
            document.getElementById("error8").innerHTML = "";
            document.getElementById("error12").innerHTML = "Enter valid pan card number";
        }else {
             if (tc != null && tc.checked){
            document.myForm.submit();
            }else{
                document.getElementById("error1").innerHTML = "";
                document.getElementById("error2").innerHTML = "";
                document.getElementById("error3").innerHTML = "";
                document.getElementById("error10").innerHTML = "";
                document.getElementById("error4").innerHTML = "";
                document.getElementById("error9").innerHTML = "";
                document.getElementById("error5").innerHTML = "";
                document.getElementById("error6").innerHTML = "";
                document.getElementById("error7").innerHTML = "";
                document.getElementById("error8").innerHTML = "";
                document.getElementById("error12").innerHTML = "";
                document.getElementById("error11").innerHTML = "this field check";
            }
           
        }
        } else {
            var regex = /[A-Z,a-z]{5}[0-9]{4}[A-Z,a-z]{1}$/;
            var totalprice = document.getElementById('totalprice').value;
            var uname = document.getElementById('fullName1').value;
            var surname = document.getElementById('Surname1').value;
            var Firm = document.getElementById('Firm').value;
            var Mobile_Number = document.getElementById('Mobile_Number1').value;
            var Email = document.getElementById('Email1').value;
            var Address = document.getElementById('Address1').value;
            var Pincode = document.getElementById('Pincode1').value;
            var Certificate = document.getElementById('Certificate1').value;
            var PAN = document.getElementById('PAN1').value;
            var tc = document.getElementById('tc');
            var state = document.getElementById('state1').value;
            if (!uname) {
            document.getElementById("err1").innerHTML = "Enter First Name";
            return false;
            }  else if(!surname) { 
            document.getElementById("err1").innerHTML = "";
            document.getElementById("err2").innerHTML = "Enter surname";
            }  else if(!Firm) { 
            document.getElementById("err1").innerHTML = "";
            document.getElementById("err2").innerHTML = "";
            document.getElementById("err3").innerHTML = "Enter Firm/Company Name";
            }  else if(!Email) { 
            document.getElementById("err1").innerHTML = "";
            document.getElementById("err2").innerHTML = "";
            document.getElementById("err3").innerHTML = "";
            document.getElementById("err4").innerHTML = "Enter Email";
            }  else if(!Address) { 
            document.getElementById("err1").innerHTML = "";
            document.getElementById("err2").innerHTML = "";
            document.getElementById("err3").innerHTML = "";
            document.getElementById("err4").innerHTML = "";
            document.getElementById("err5").innerHTML = "Enter Address";
            }  else if(Pincode.length != 6) { 
            document.getElementById("err1").innerHTML = "";
            document.getElementById("err2").innerHTML = "";
            document.getElementById("err3").innerHTML = "";
            document.getElementById("err4").innerHTML = "";
            document.getElementById("err5").innerHTML = "";
            document.getElementById("err6").innerHTML = "Enter Pincode";
            }  else if(Mobile_Number.length != 10) { 
            document.getElementById("err1").innerHTML = "";
            document.getElementById("err2").innerHTML = "";
            document.getElementById("err3").innerHTML = "";
            document.getElementById("err4").innerHTML = "";
            document.getElementById("err5").innerHTML = "";
            document.getElementById("err6").innerHTML = "";
            document.getElementById("err7").innerHTML = "Enter Mobile Number";
            }  else if(state != null && state.checked) { 
            document.getElementById("err1").innerHTML = "";
            document.getElementById("err2").innerHTML = "";
            document.getElementById("err3").innerHTML = "";
            document.getElementById("err4").innerHTML = "";
            document.getElementById("err5").innerHTML = "";
            document.getElementById("err6").innerHTML = "";
            document.getElementById("err7").innerHTML = "";
            document.getElementById("err8").innerHTML = "select State";
            }  else if(!Certificate) { 
            document.getElementById("err1").innerHTML = "";
            document.getElementById("err2").innerHTML = "";
            document.getElementById("err3").innerHTML = "";
            document.getElementById("err4").innerHTML = "";
            document.getElementById("err5").innerHTML = "";
            document.getElementById("err6").innerHTML = "";
            document.getElementById("err7").innerHTML = "";
            document.getElementById("err8").innerHTML = "";
            document.getElementById("err9").innerHTML = "Enter name on Certificate";
            }else if(!regex.test(PAN) && totalprice >= 50000){
            document.getElementById("err1").innerHTML = "";
            document.getElementById("err2").innerHTML = "";
            document.getElementById("err3").innerHTML = "";
            document.getElementById("err4").innerHTML = "";
            document.getElementById("err5").innerHTML = "";
            document.getElementById("err6").innerHTML = "";
            document.getElementById("err7").innerHTML = "";
            document.getElementById("err8").innerHTML = "";
            document.getElementById("err9").innerHTML = "";
            document.getElementById("err10").innerHTML = "Enter PAN card no";
        }else {
             if (tc != null && tc.checked){
            document.myForm.submit();
            }else{
                document.getElementById("err1").innerHTML = "";
                document.getElementById("err2").innerHTML = "";
                document.getElementById("err3").innerHTML = "";
                document.getElementById("err4").innerHTML = "";
                document.getElementById("err5").innerHTML = "";
                document.getElementById("err6").innerHTML = "";
                document.getElementById("err7").innerHTML = "";
                document.getElementById("err8").innerHTML = "";
                document.getElementById("err9").innerHTML = "";
                document.getElementById("error11").innerHTML = "this field check";
            }
           
        }
        }
    }
</script>
	<script>
			function NumbersOnly(MyField, e, dec)
          {
                var key;
                var keychar;
                if (window.event)
                        key = window.event.keyCode;
                else if (e)
                        key = e.which;
                else
                        return true;
                keychar = String.fromCharCode(key);
                if ((key==null) || (key==0) || (key==8) ||        (key==9) || (key==13) || (key==27) )                           return true;                                                else if ((("+0123456789").indexOf(keychar) > -1))                           return true;                                                else if (dec && (keychar == "."))                           {                           MyField.form.elements[dec].focus();                           return false;                           }                        else                           return false;                }
	</script>
<script>
function inf(a){
    $('#inf').val(a);
    var totalprice = document.getElementById('totalprice').value;
    if((a==1) && (totalprice >= 50000)){
         $("#PAN").prop('disabled', false);
         $("#PAN1").prop('disabled', true);
    }else if((a==2) && (totalprice >= 50000)){
         $("#PAN1").prop('disabled', false);
         $("#PAN").prop('disabled', true);
    }
}	
</script>