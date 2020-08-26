
      <div class="pagehding-sec">
         <div class="images-overlay"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="page-heading">
                     <h1>Portfolio</h1>
                  </div>
                  <div class="page-breadcrumb-inner">
                     <div class="page-breadcrumb">
                        <div class="breadcrumb-list">
                           <ul>
                              <li><a href="<?php echo base_url();?>">Home</a></li>
                              <li><a href="#">Portfolio</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="gallery-sec pt-100 pb-100">
         <div class="container-fluid">
            <div class="row">
				<div class="col-xs-12">
				<h3>We have executed projects of various sizes across various industry sectors for Indian clients and else where in the globe, Few of them include 3D model and detail engineering in Power Industry, Complete Plant design with equipment’s, Structure, Piping of Waste water treatment Plants, various type of skid design for Oil & Gas industry.
				<b>Kindly get in touch to know more about us.</b></h3>
				</div>
				<div class="gallery-area">                  
					<div class="collapse navbar-collapse latest--project" id="navbarfiltr">
						<h2 class="widget-title">Our Designs</h2>
					</div>
					<div class="gallery-container">
						<?php foreach($portfolio as $row){?>
						<div class="col-xs-12 col-sm-6 col-md-3 filtr-item Petroleum">
							<div class="gallery-item">
							<img style="height: 240px;width: 100%;" src="<?php echo base_url();?>assets/portfolio/<?php echo $row->portfolio_img;?>" alt="" />
							<div class="gallery-overlay">
								<div class="gallery-overlay-text">
									<span class="gallery-button">
									<a href="<?php echo base_url();?>assets/portfolio/<?php echo $row->portfolio_img;?>" class="gallery-photo"><i class="icofont-image"></i></a>
									</span>
								</div>
							</div>
							</div>
						</div>
						<?php } ?>
					</div>
					<?php foreach($portfolio_videos as $video){?>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<div class="video-inner">
							<div class="vedio-button">
								<a href="https://www.youtube.com/watch?v=<?php echo $video->por_video_link;?>"  class="mfp-iframe vedio-play">
								<i class="icofont-play"></i></a>
							</div>
						</div>
						<img src="https://img.youtube.com/vi/<?php echo $video->por_video_link;?>/0.jpg" alt="cook"/>
					</div>
					<?php } ?>
				</div>
            </div>
         </div>
      </div>
      