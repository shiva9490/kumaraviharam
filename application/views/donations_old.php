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
     <div class="row">
    <div class="col-sm-12 ">
   
    <div class="col-sm-7">
    <div class="strpuram">
    	<h2>BENEFITS OF YOUR CONTRIBUTION</h2>
        <?php echo $donations_benefits[0]['desc']?>
     <h2>Donor Registration Form : <a href="<?php echo base_url();?>assets/images/donation/REG-name-ofthe-donor.pdf" target="_blank"><img src="<?php echo base_url();?>assets/images/pdf-icon2.png" alt=""></a></h2>     
		<p> For further details contact +91-6302152736.</p>           
    
    </div>
    </div>
    
    <div class="col-sm-5">
            	<div class="workproces rightcont">
            	<h2>Bank Account</h2>
					<?php if(count($bank_accounts) > 0){
						foreach($bank_accounts as $r){?>
					 <h4 style="text-align: left;"><?php echo $r->title;?>:</h4>
					<?php echo $r->desc;?>
					<?php } 
					}?>
					<!--<h4  style="text-align: left; margin-top: -20px;">FOR FOREIGN CONTRIBUTIONS:</h4>
								   <p>A/c Name : <strong>SRI SHARADA PEETHAM, SRINGERI</strong><br>
					Purpose : SRI KUMARA VIHARAM, SRISAILAM<br>
					Bank : STATE BANK OF INDIA<br>
					A/c. No : 37487062775<br>
					SWIFT CODE : SBININBB770<br>
					IFSC Code : SBIN0040290<br>
					Branch : SRINGERI KARNATAKA STATE</p>-->
					
					<p>Contributors can transfer their amounts in the given accounts accordingly. (80G Certificate will be issued to the applicable donors)</p>
					           
                </div>
            </div>    
    </div>
    </div> <hr style="border-top: 1px solid #b0afae;">
  
  
  <div class="rfnd">
  <div class="row">
  <div class="col-sm-10 col-sm-offset-1">
  <h2>Redefining the History of Centuries </h2>
  <ul class="ulli" style="margin-left:30px;">
  <li>Built to last for Centuries </li>
 <li>Destiny Pilgrimage for Lord Siva devotees of national and international </li>
 <li>Feather in the cap of Rayalaseema and Andhra Pradesh</li>  
 <li>A unique temple for devotees built by devotees</li>
 <li>Unique design attracts all generations </li>
  </ul>
  </div>
  
  </div>
  </div> <hr style="border-top: 1px solid #b0afae;">
  
			<div class="col-sm-10 col-sm-offset-1" style="padding:10px 0px 0px 20px;">
				<div class="row">
					<h2>Fund Raising Plan - Major Offerings</h2><br>  
					<form action="<?php echo base_url();?>donations/add" method="post">
					<div class="tablecol">
						<table class="table table-responsive">
							<thead>
								<tr>
									<th>S.No</th> 
									<th>Item Specification </th>
									<th>Price/Unit in Rs</th>            
									<th>Qty</th>
									<th>Total</th>																		 
								</tr>
							</thead>				
							<tbody>
								<?php $i=1;foreach($fund_raising_plan as $r){?>
								<tr class="sh">
									<td>
										<?php echo $i;?>
										<input type="hidden" name="id[]" value="<?php echo $r->id;?>">
									</td>
									<td><?php echo $r->title;?></td>
									<td>
										<?php echo $r->price;?> 
										<?php if(!empty($r->unit)){ echo '/';}?> <?php echo $r->unit;?>
										<input type="hidden" name="price[]" id="price<?php echo $i;?>" value="<?php echo $r->price;?>">
									</td>
									<td>
										<input type="number" min="0" name="qty[]" id="qty<?php echo $i;?>" onkeyup="qty(<?php echo $i;?>)" placeholder="0">
									</td>
									<td>
										<span class="subtotal" id="subtotal<?php echo $i;?>">0.00</span>
										<input type="hidden" class="sub" name="" id="sub<?php echo $i;?>">
									</td>
								</tr>
								<?php $i++; } ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td><b>Total</b></td>
									<td>
										<b><span id="totalprice1">0.00</span></b>
										<input type="hidden" name="total" id="totalprice">
									</td>
								</tr>
							</tbody>
						</table>
						<button type="submit" id="donation"  disabled='disabled' class="btn btn-primary" style="float:right;">Donations</button>						
					</div>
					</form>
				</div>         
			</div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	function qty(id){
		$('#totalprice1').empty();
		$('#totalprice').empty();
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