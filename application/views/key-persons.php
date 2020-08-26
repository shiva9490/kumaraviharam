
<style>#keypersonstab > a{ background-color:#2a9da7; color:#fff; }</style>
<div class="fluidbody">
<div id="headerpage"></div>

<div class="pagebanner">
	<img class="img-responsive" src="<?php echo base_url();?>assets/images/inner/key.jpg" alt="">
</div>
<div class="procescolm">
	<div class="container">
    	<h2>Blessings of Guruji’s</h2>
        
        <div class="row">
            <div class="col-sm-12">
            	<div class="heighclm">
					<div class="row">
						<?php if(count($blessings) >0) {
						foreach($blessings as $r){?>
						<div class="col-sm-3" style="padding:0;">
							<div class="leftcont">
								<div class="tktr">
									<img class="img-responsive img-thumbnail" src="<?php echo base_url();?>assets/images/<?php echo $r->image;?>" alt="">
									<p><strong>Blessed by</strong></p>
									<h2><?php echo $r->title;?></h2>
									<?php echo $r->desc;?>
									
								</div>
						</div>
							</div>
						<?php } } else{?>
						<h4>No data found...</h4>
						<?php } ?>						
					</div>               
                </div>
            </div>
           
        </div>
     </div>
</div>
        