<style>
 
#Signin > a{ background-color:#2a9da7; color:#fff; }
h2.center {
    text-align: center;
}
.col-sm-10.col-sm-offset-1{
box-shadow: 0px 0px 3px #000;
    border-radius: 7px;
    padding: 20px;
	background: #d6cccc38;
}
label.error{
	color : red;
}
input.razorpay-payment-button {
	color: #000;
	padding: 10px 51px;
	background: #2a9da7;
	border: 0px;
	float: right;
	border-bottom: 2px solid #2a9da7;
}
</style>
<div class="fluidbody">
	<div id="headerpage"></div>
	
	
	<div class="pagebanner">
	<img class="img-responsive" src="images/inner/donations.jpg" alt="">
</div>
<div class="psrtcolm">

	<div class="container">
     <div class="row">  
  
   
  <div class="col-sm-12" style="padding:10px 0px 0px 20px;">
     
     <div class="row">
       <div class="col-sm-7">
       <h2>Donation Details</h2><br>
       <div class="fom2">
        <?php foreach($checkout as $ra){?>      
       <div class="tablecol">
			<table class="table table-responsive">
			<thead>
			<tr>
			<th width="70">S.NO</th> 
			<th>DONATION FOR</th>
            <th>AMOUNT</th>                                                      
			</tr>
			</thead>
            
			<tbody>
             <?php $i =1; if($ra->general_donation != 0.00) { ?>
			<tr>
				<td align="center"><?php echo $i; ?></td>
				<td>General Donation</td>
				<td align="right"><?php echo $ra->general_donation?></td>
			</tr>               
			
			<?php $i++; }  if($ra->temple_stone != 0.00){ ?>
			<tr>
				<td align="center"><?php echo $i; ?></td>
				<td>Temple Stone Donation</td>
				<td align="right"><?php echo $ra->temple_stone?></td>
			</tr>
			<?php $i++; } if($ra->temple_flooor != 0.00) { ?>
			<tr>
				<td  align="center"><?php echo $i; ?></td>
				<td>Temple Floor Donation</td>
				<td align="right"><?php echo $ra->temple_flooor?></td>
			</tr>
			<?php $i++; } if($ra->sloka != 0.00) { ?>
			<tr>
				<td align="center"><?php echo $i; ?></td>
				<td>Sloka</td>
				<td align="right"><?php echo $ra->sloka?></td>
			</tr>
			<?php $i++; } ?>
			<tr>
			    <td align="center"><?php echo $i; ?></td>
			    <td>Total Amount</td>
			    <td align="right"><?php echo $tot =  $ra->total_amount?></td>
			</tr>               
			</tbody>
			</table>
			</div>
       
            </div><br><br>
            
            
            <h2>Donor Details</h2><br>
            <div class="fom2">
              
       <div class="tablecol">
			<table class="table table-responsive">
			<thead>
			<tr>
			<th width="200">Name</th> 
			<th><?php echo $name = $ra->fullName?></th>
            <th>SURNAME</th>
            <th><?php echo $name = $ra->Surname?></th>                                                      
			</tr>
			</thead>
            
			<tbody>
								
				<?php if($ra->doner_type == 1){ ?>
				<tr>
					<td>Gender</td>
					<td><?php echo $name = $ra->gender?></td>
					<td>Date of Birth</td>
					<td><?php echo $name = $ra->Date_of_Birth?></td>
				</tr>
				<?php } ?>
				<tr>
				    <?php if($ra->doner_type == 1){ ?>
					<td>Son Daughter</td>
					<td><?php echo $name = $ra->Son_Daughter?></td>
					<?php } else{ ?>
					<td>Firm</td>
					<td><?php echo $name = $ra->Firm?></td>
					<?php } ?>
					<td>Email</td>
					<td><?php echo $email = $ra->Email?></td>
				</tr>
				<tr>
					<td>Mobile number</td>
					<td><?php echo $phone = $ra->Mobile_Number?></td>
					<td>Address</td>
					<td><?php echo $ra->Address;?></td>
				</tr>
				<tr>
					<td>City</td>
					<td><?php echo $ra->city;?></td>
					<td>State</td>
					<td><?php echo $ra->state;?></td>
				</tr>
				<tr>
					<td>Pincode</td>
					<td><?php echo $ra->Pincode;?></td>
					<td>Name on Certificate</td>
					<td><?php echo $ra->Certificate;?></td>
				</tr>
				<?php if($ra->doner_type == 1){ ?>
				<tr>
					<td>Gotram</td>
					<td><?php echo $ra->Gotram;?></td>
					<td>Birthstar</td>
					<td><?php echo $ra->Birthstar;?></td>
				</tr>
				<?php } ?>
				<tr>
					<td>Source</td>
					<td><?php echo $ra->reference_marking;?></td>
					<td>Purpose of Donation</td>
					<td><?php echo $ra->Purpose;?></td>
				</tr>
				<tr>
					<td>PAN</td>
					<td><?php echo $ra->PAN;?></td>
					<td></td>
					<td></td>
				</tr>
                           
			</tbody>
			</table>
			</div>
			<?php } ?>
            <!--<button type="button" id="sb"  class="btn btn-primary my-4" onclick="fv()">Edit</button>-->
            <div class= "row">
                <div class= "col-md-6">
                    <a  class="btn btn-primary my-4" href="<?php echo base_url();?>donations/edit/<?php echo ($ids); ?>">Edit</a>
                </div>
                 <!--<button type="button" id="sb"  class="btn btn-primary my-4" onclick="fv()">Payment</button>-->
                <div class= "col-md-6">
                    <form id="paymentform" name="paymentform" action="<?php echo base_url('checkout/paymentsuccess/'.$ids); ?>" method="POST">
        		    <script
        		    	src="https://checkout.razorpay.com/v1/checkout.js"
        		    	data-key="rzp_test_ucMcSiyXYWbbic"
        		    	data-amount="<?php echo ($tot)*100;?>"
        		    	data-buttontext="Payment"
        		    	data-name="Kumara Viharam"
        		    	data-description="Purchase Description"
        		    	data-image="<?php echo base_url();?>assets/images/logo.png"
        		    	data-prefill.name="<?php echo $name;?>"
        		    	data-prefill.email="<?php echo $email;?>"
        		    	data-prefill.phone="<?php echo $phone;?>"
        		    	data-theme.color="#F37254"
        		    >
        		    </script>
        			    <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
        			    <input type="hidden" name="billing_id" value="<?php echo isset($ids)?$ids:''; ?>">
        			    <input type="hidden" name="payment_type" value="">						
        			</form>
    			</div>
			</div>
            </div>
           </div>
        </div>
        
        			    
      </div>          
        </div>
       </div>   
    </div>
	
	
</div>