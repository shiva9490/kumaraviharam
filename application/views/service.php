
      <div class="pagehding-sec">
         <div class="images-overlay"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="page-heading">
                     <h1>Service</h1>
                  </div>
                  <div class="page-breadcrumb-inner">
                     <div class="page-breadcrumb">
                        <div class="breadcrumb-list">
                           <ul>
                              <li><a href="<?php echo base_url();?>">Home</a></li>
                              <li><a href="#">Service</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="service-details-page pt-100 pb-100">
         <div class="container">
            <div class="row">
				<div class="col-md-4">
					<div class="sidebar">
						<div class="service-cat-widget">
							<h2 class="widget-title">Service Categroy</h2>
							<ul class="nav nav-tabs">
							<?php $i="1";foreach($service_list as $service){?>
								<li <?php if($i==1){echo 'class="active"';}?>><a data-toggle="tab" href="#<?php echo $i;?>"><?php echo $service->ser_title;?></a></li>
							<?php $i++;  } ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="service-details tab-content">
						<?php $j="1";
								foreach($services as $row){?>
						<div id="<?php echo $j;?>" class="tab-pane fade <?php if($j==1){echo 'in active';}?>">
							<h2><?php echo $row->ser_title;?> </h2>
							<div class="service-details-thumb">
								<img src="<?php echo base_url();?>assets/img/<?php echo $row->ser_img;?>" alt="<?php echo $row->ser_img;?>"/>
							</div>
							<?php echo $row->ser_desc;?>
						</div>
						<?php $j++; }?>
					</div>
				</div>
			 </div>
		  </div>
