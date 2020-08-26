	<style>#hometab > a{ background-color:#2a9da7; color:#fff; }</style>
	<div class="banner">
		<div id="bannimg" class="bxslider">
			<?php foreach($banner as $banner){?>
			<div class="bandetail">
				<div class="text-cont"><div class="text-cont-chld">
						<div class="container">
							<div class="row">
								<div class="col-sm-5">
								<!--<h1><span></span></h1>
								<h3 style="font-family: 'Titillium Web', sans-serif;">It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</h3>-->
								</div>
							</div>
						</div>
					</div>
				</div>
				<img src="<?php echo base_url();?>assets/images/banner/<?php if($banner->image !=""){echo $banner->image;}else{ echo '1.jpg';}?>" alt="">
			</div>
			<?php }?>
		</div>            
	</div>

	<div class="welco">
		<div class="container">
			<!--<h2>SENANI SUBRAHMANYA SWAMY TRUST </h2>-->
			<h2 style="text-align:left;">Development of Saiva Kshetra as per Sthala Puranam at Srisailam</h2>
				<!--<h3>An Accomplishment of Lord Siva Family as per Sthala Purana</h3>-->
				<p style="text-align:left;">Proposed Lord Senani Subrahmanya Swamy Temple and allied works as per Hindu mythology and promoting Vedic Traditions and Vedic eductional Institutions for the future generations along with improvement of Saiva Kshetra as per existing customs and formalities in the form of Sculptures, Engraved Pictures, Gopurams and Mandapas</p>
		</div>
	</div>


	<div id="abtp">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h2>About Sirsailam</h2>
					<?php echo $about_srisailam[0]['about'];?>
				</div>
				<div class="col-md-6">
					<div class="col-md-6"><img class="img-responsive img-thumbnail" src="<?php echo base_url();?>assets/images/a1.jpg" alt=""></div>
					<div class="col-md-6"><img class="img-responsive img-thumbnail" src="<?php echo base_url();?>assets/images/a2.jpg" alt=""></div>
					<div class="col-md-6"><img class="img-responsive img-thumbnail" src="<?php echo base_url();?>assets/images/a3.jpg" alt=""></div>
					<div class="col-md-6"><img class="img-responsive img-thumbnail" src="<?php echo base_url();?>assets/images/a4.jpg" alt=""></div>
				</div>
			 </div>
		</div>
	 </div>

	<div id="sptp">
		<div class="container">
			<div class="row">
				<h2 style="text-align:left; padding-left:16px;">Sthala Puranam</h2>        
				<div class="col-md-8">
					<?php echo $sthala_Puranam[0]['desc'];?>
				</div>				
				<div class="col-md-3">
					<div class="sptpimg">
					<img class="img-responsive img-thumbnail" src="<?php echo base_url();?>assets/images/<?php echo $sthala_Puranam[0]['image'];?>" alt="">
					</div>        
				</div>        
			</div>
		</div>
	</div>
