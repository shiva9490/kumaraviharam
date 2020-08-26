<style>#contab > a{ background-color:#2a9da7; color:#fff; }</style>
<div class="fluidbody">
	<div id="headerpage"></div>
	<div class="pagebanner">
		<img class="img-responsive" src="<?php echo base_url();?>assets/images/inner/contact.jpg" alt="">
	</div>
	<div class="concolm">
    	<div class="container">
        	<div class="row">			
				<div class="col-sm-1">&nbsp;</div>				
				<div class="col-sm-5 ktr">
					<h2>KUMARA VIHARAM</h2>
					<h4><?php echo $address[0]['title']?></h4>
					<p><i class="fa fa-map-marker" aria-hidden="true"></i></p>					 
					<?php echo $address[0]['desc']?>
					<h4><?php echo $address[1]['title']?></h4>
					<p><i class="fa fa-map-marker" aria-hidden="true"></i> </p>
					<?php echo $address[1]['desc']?>
				</div>
				
				<div class="col-sm-5">
					<h4></h4>
					<h4><?php echo $address[2]['title']?></h4>
					<p><i class="fa fa-map-marker" aria-hidden="true"></i></p>                   
					   <?php echo $address[2]['desc']?>
					<p>Phone: +91-63021 52736<br>
						E-mail: info@kumaraviharam.org<br>
						Web: www.kumaraviharam.org
					</p>
				</div>                         
                  
			</div>  
        
			<div class="row">
				<div class="maps">
					<div class="col-md-9 col-sm-offset-1">
						<?php echo $map[0]['desc'];?>
					</div> 
				</div>       
			</div>
        
			<p><span style="font-size:10px; margin-top:40px;">Disclaimer: The information contained in this website (Images may include sketches, artist impressions and Web site) is for illustration purposes only and is subject to change during the further development stages.</span></p> 
		</div> 
	</div> 
</div> 