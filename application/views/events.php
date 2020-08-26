<style>#eventstab > a{ background-color:#2a9da7; color:#fff; }</style>
<div class="fluidbody">
<div id="headerpage"></div>

<div class="pagebanner">
	<img class="img-responsive" src="<?php echo base_url();?>assets/images/inner/events.jpg" alt="">
</div>
<div class="psrtcolm">
	<div class="container">  
    <div class="row"> 
    <div class="col-lg-12">
    <h2><span style="padding-left:34px;">Bhoomi Pooja Performed by</span></h2>
     <div class="col-lg-5">
     <div class="etr">    
        <h3>Jagadguru Shankaracharya</h3>
        <h3>Sri. Sri. Vidhusekhara Bharati Teertha Swamy </h3>
        <h3>Sri Sarada Peetham, Sringeri.</h3>
     </div>
     </div>
    
     <div class="col-lg-4">
     <div class="etr">  
     <div class="ulli">
<li>Conceptual Drawings are Aprroved </li>
<li>Bhoomi Pooja & Shilanyasa performed</li>
<li>Model of the Temple Layout is Ready</li>
<li>Trust Office is in Progress </li>
</div>
     </div>

</div>
    
    
    
   </div>
   </div>
  <hr style="border-top: 1px solid #b0afae;"> 
    
    <div class="col-sm-12">
     <div class="col-sm-12">            	
            	<div class="contcolm">
                 <h2 >Events</h2>                	 
                    <h4>Bhoomi Pooja</h4>                   
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Photos</a></li>
                        <li><a data-toggle="tab" href="#menu1">Videos</a></li>
                        
                  	</ul>                                
                     <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <h4>&nbsp;</h4>
                            <ul class="row"> 
							<?php if(count($event_image)> 0){
								foreach($event_image as $r){?>
							   <li class="col-md-3 col-sm-3 col-xs-12"><a class="Defensegal" data-fancybox-group="gallery" href="<?php echo base_url();?>assets/images/gallery/<?php echo $r->image;?>" data-lightbox="example-set" title=""><img class="example-image img-responsive thumbnail" src="<?php echo base_url();?>assets/images/gallery/<?php echo $r->image;?>" alt="" /></a></li>	
								<?php }
								}else{?>
									 <h4 style="margin:0px 0px 10px 0px ;font-size:38px; color:#2a9da7; font-family: 'Titillium Web', sans-serif; text-align:center;"> Will update soon</h4>
								<?php } ?>
                            </ul>                                    
                        </div>
                        
                        <div id="menu1" class="tab-pane fade">
							<h4>&nbsp;</h4>                         
							<ul class="row">
								<?php if(count($event_video) > 0){
								foreach($event_video as $r){?>
								<li class="col-md-4 col-sm-4 col-xs-12">
									<a class="Defensegal" data-fancybox-group="gallery" href="https://www.youtube.com/embed/<?php echo $r->video;?>?autoplay=1" data-lightbox="example-set" title=""><img class="example-image img-responsive thumbnail" src="https://img.youtube.com/vi/<?php echo $r->video;?>/0.jpg" alt="" /></a>
								</li>
								<?php }
								} else {?>
										<h4 style="margin:0px 0px 10px 0px ;font-size:38px; color:#2a9da7; font-family: 'Titillium Web', sans-serif; text-align:center;"> Will update soon</h4>
								<?php } ?>
                            </ul>      
                        </div> 
                      </div> 
                </div>
                               
            </div>
    	
        
    </div>
    </div>
</div>

<!--<div id="footercol"> 
    <div class="container">
    	<div class="row">
    	<div class="col-sm-3 footermenu">
        	<h3>Registered Office</h3>
            <div class="contaddre">
             <p><i class="fa fa-map-marker" aria-hidden="true"></i>                      
Plot No.1222<br>
H.No.8-2-293/82/A/1222/F4<br>
Fourth Floor,Road No.36, <br>
Jubilee Hills, Hyderabad - 500033,<br>
Telangana, INDIA<br>
Website: www.ssstsrisailam.org<br>
</p>
            </div>
            
            <div class="socialcol">
            	<ul>
                	<li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href=""><i class="fa fa-google" aria-hidden="true"></i></a></li>
                    <li><a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-3 footermenu">
        	<h3>Correspondence Office</h3>
            <div class="contaddre">
            <p><i class="fa fa-map-marker" aria-hidden="true"></i>                      
                          Plot No.27, <br>
                          First Floor,Road No.3,<br>
                          Banjara Hills<br>
                          Hyderabad - 50034,<br>
                          Telangana, INDIA.<br>
                          Website: www.ssst-srisailam.org </p> 
                         </div>
                         </div>
        
         <div class="col-sm-3 footermenu">
         <h3>Trust Office</h3>
         <div class="contaddre">
          <p><i class="fa fa-map-marker" aria-hidden="true"></i>                      
                           Helipad Area,<br>
                           Backside Srisailam Main Temple,<br>
                           Srisailam - 518101,<br>
                           AP. INDIA.<br>                         
                          <strong>Phone:</strong> +91-63021 52736 <br>
                          <strong> E-mail:</strong> info@ssstsrisailam.org<br>
                          </p>              
                          </div>
                          </div>
        
         <div class="col-sm-3 footermenu">
            <h3>Are you interested to donate</h3>
            <h5>Join Hands with us</h5>
            <div class="fom">
             <form id="enquiryfrm" action="enquiry-form.php" onSubmit="return formvalidateone()" enctype="multipart/form-data" method="post">
                <ul>
                    <li><input class="form-control" type="text" name="name" placeholder="Name"></li>
                    <li><input class="form-control" type="text" name="email" placeholder="Email Id"></li>
                    <li><input class="form-control" type="text" name="mobile" placeholder="Mobile"></li>
                    <li><textarea class="form-control" type="text" name="message"></textarea></li>       
                    <li><button class="btn" style="background-color:#f46526; color:#fff;" type="submit" value="Submit">Submit</button></li>
                </ul>
            </form>
            </div>
        </div>
        
       
                 
        </div>
    </div>
</div>-->	
