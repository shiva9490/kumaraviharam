		
      <div class="pagehding-sec">
         <div class="images-overlay"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="page-heading">
                     <h1><?php echo $blog_details[0]->blog_title;?></h1>
                  </div>
                  <div class="page-breadcrumb-inner">
                     <div class="page-breadcrumb">
                        <div class="breadcrumb-list">
							<ul>
								<li><a href="<?php echo base_url();?>">Home</a></li>
								<li><a href="#"><?php echo $blog_details[0]->blog_title;?></a></li>
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
			<?php foreach($blog_details as $blog){?>
               <div class="col-md-8">
                  <div class="single-blog">
                     <div class="sngl-blg-img">
                        <img src="<?php echo base_url();?>assets/img/blog-details.jpg" alt="" />
                     </div>
                     <div class="sngl-blg-dsc">
                        <ul>
                           <li>
								<i class="icofont-clock-time"></i>
								<?php $d=strtotime($blog->blog_add_date);
								echo date("d M Y", $d);?>
							</li>
                           <li><i class="icofont-ui-user"></i><?php echo $blog->blog_adduser;?></li>
                           <li><i class="icofont-comment"></i>24</li>
                        </ul>
                        <h2 class="blg-title"><a href="#"><?php echo $blog->blog_title;?></a></h2>
                        <?php echo $blog->blog_desc;?>
                     </div>
                     <div class="commentar-sec">
                        <h2><?php echo count($blog_comment);?> comment</h2>
						<?php foreach($blog_comment as $comment){?>
                        <div class="media">
                           <div class="media-body">
                              <h3 class="comment-author"><?php echo $comment->name;?></h3>
                              <p><?php echo $comment->blog_comment;?></p>
                           </div>
                        </div>
						<?php } ?>
                     </div>
                     <div class="contact-field">
                        <h3 class="comment-reply-title">Leave a comment</h3>
                        <form action="<?php echo base_url();?>blog/add_comment" method="post" id="commentform">
                           <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
                           <div class="row form-fields">
								<p class="comment-author col-md-4">
								<input type="hidden" name="id" value="<?php echo $blog_details[0]->blog_id;?>">
								<input placeholder="Your name" id="name" name="name" value="" required size="30" type="text"></p>
								<p class="author-email col-md-4">
								<input placeholder="E-mail" id="email" name="email" value="" required size="30" type="text"></p>
								<p class="author-website col-md-4">
								<input placeholder="Your Website" required id="mobile" name="mobile" value="" size="30" type="text"></p>
                           </div>
                           <p class="comment-form">
								<textarea placeholder="Write Your Comment" required id="blog_comment" name="blog_comment" cols="6" rows="4" aria-required="true"></textarea>
                           </p>
                           <p class="form-submit"><input name="submit" id="submit" class="submit" value="Post Comment" type="submit"></p>
                        </form>
                     </div>
                  </div>
               </div>
            <?php }?>
				<div class="col-md-4">
                  <div class="sidebar">
                     <div class="search-field">
                        <form action="#">
                           <input placeholder="Enter Search Here..." type="text">
                           <button type="submit"><i class="icofont-search-2"></i></button>
                        </form>
                     </div>
                     <div class="widget-two">
                        <h1>recent News</h1>
                        <div class="all_r_pst">
							<?php foreach($blog_list as $blo_list){ ?>
                           <div class="media">
                              <div class="relative-post">
                                 <div class="relative-post-thumb">
                                    <a href="#"><img src="<?php echo base_url();?>assets/img/r3.jpg" alt="" /></a>
                                 </div>
                                 <div class="media-body">
                                    <div class="single_r_dec">
                                       <h3><a href="<?php echo base_url('blog-details/'.$blo_list->blog_url);?>"><?php echo $blo_list->blog_title;?></a></h3>
                                       <ul>
                                          <li><a href="<?php echo base_url('blog-details/'.$blo_list->blog_url);?>">by <?php echo $blo_list->blog_adduser;?></a></li>
                                          <li><a href="<?php echo base_url('blog-details/'.$blo_list->blog_url);?>"><?php $d = strtotime($blo_list->blog_add_date);
								echo date("d M Y", $d);?></a></li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
							<?php } ?>
                        </div>
                     </div>
                     <div class="widget-tag">
                        <h1>Tag Cloud</h1>
                        <ul>
                           <li><a href="#">industrial</a></li>
                           <li><a href="#">oil</a></li>
                           <li><a href="#">Gass</a></li>
                           <li><a href="#">Energy Power</a></li>
                           <li><a href="#">Mechanical</a></li>
                           <li><a href="#">Repair </a></li>
                           <li><a href="#">Technical</a></li>
                           <li><a href="#">Petroleum </a></li>
                           <li><a href="#">Refinery </a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
	  
	
	  
		