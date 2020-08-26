
      <div class="pagehding-sec">
         <div class="images-overlay"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="page-heading">
                     <h1>Blog</h1>
                  </div>
                  <div class="page-breadcrumb-inner">
                     <div class="page-breadcrumb">
                        <div class="breadcrumb-list">
                           <ul>
                              <li><a href="<?php echo base_url();?>">Home</a></li>
                              <li><a href="#">Blog</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="blog-sec pt-100 pb-70">
         <div class="container">
            <div class="row">
				<?php foreach($blog as $blog){?>
				<div class="col-md-4 col-sm-4">
					<div class="sngl-blg">
						<div class="sngl-blg-img">
							<img src="<?php echo base_url();?>assets/img/b1.jpg" alt="" />
						</div>
						<div class="sngl-blg-dsc">
							<ul>
								<li>
									<i class="icofont-clock-time"></i>
									<?php $d=strtotime($blog->blog_add_date);
									echo date("d M Y", $d);?></li>
								<li>
									<i class="icofont-ui-user"></i>
									<?php echo $blog->blog_adduser;?>
								</li>
							</ul>
							<h2 class="blg-title"><a href="<?php echo base_url('blog-details/'.$blog->blog_url);?>"><?php echo $blog->blog_title;?></a></h2>
							<?php echo substr($blog->blog_desc,0,100);?><br>
							<a href="<?php echo base_url('blog-details/'.$blog->blog_url);?>" class="rdmoreBtn">Learn More<i class="icofont-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<?php } ?>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="pagination custom-pagination">
                     <?php if (isset($links)) { ?>
						<?php echo $links[0] ?>
					<?php } ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
     