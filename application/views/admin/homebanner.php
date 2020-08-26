
		<?php $this->load->view('admin/header1');?>
		<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Dashboard 1</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard 1</li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus-circle"></i> Add New Banner</button>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
									<center><span class="text-danger"><?php echo $this->session->flashdata('update_banner');?></span></center>
									<center><span class="text-success" id="msg"></span></center>
									<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>S.No</th>
												<th>Banner Image</th>
												<th>Sub Title</th>
												<th>Title</th>
												<th>Sub Title2</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php $i=1; foreach($home_banner->result() as $row){?>
											<tr>
												<td><?php echo $i;?></td>
												<td><img  style="width:100%;"src="<?php echo base_url();?>assets/img/<?php echo $row->home_banners;?>"><br>
												<button class="btn btn-warning" data-toggle="modal" data-target="#image<?php echo $i;?>">Edit Image</button></td>
												<td><?php echo $row->home_heading1;?></td>
												<td><?php echo $row->home_heading2;?></td>
												<td><?php echo $row->home_heading3;?></td>
												<td>
													<?php if($row->home_status == 1){ $status = "Active" ; }else{ $status = "Inactive" ;}?>
													<button class="btn btn-info shi"><?php echo $status;?></button>
													<button class="btn btn-warning shi" data-toggle="modal" data-target="#myModal<?php echo $i;?>">Edit</button>
													<div id="myModal<?php echo $i;?>" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<!-- Modal content-->
															<div class="modal-content">
																<div class="modal-body">
																<form action="<?php echo base_url();?>admin/update_banner/<?php echo $row->home_banners_id;?>" method="POST">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	 <input type="text" class="form-control" name="home_heading1" value="<?php echo$row->home_heading1;?>" required><br>
																	 <input type="text" class="form-control" name="home_heading2" value="<?php echo$row->home_heading2;?>" required><br>
																	 <textarea class="form-control" name="home_heading3" required><?php echo$row->home_heading3;?></textarea>
																	 <button type="submit" class="btn btn-default">Update</button>
																	 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																</form>
																</div>
															</div>	
														</div>
													</div>
													<div id="image<?php echo $i;?>" class="modal fade" role="dialog">
														<div class="modal-dialog">	
															<!-- Modal content-->
															<div class="modal-content">
																<div class="modal-body">
																<form action="<?php echo base_url();?>admin/update_bannerimage/<?php echo $row->home_banners_id;?>" method="POST" enctype="multipart/form-data">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	 <input type="file" class="form-control" name="image" value="<?php echo$row->home_banners;?>" required><br>
																	 <button type="submit" class="btn btn-default">Update</button>
																	 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																</form>
																</div>
															</div>	
														</div>
													</div>
													<button class="btn btn-danger shi" onclick="delete(<?php echo $row->home_banners_id;?>)">Delete</button>
												</td>
											</tr>		
											<?php $i++; } ?>
										</tbody>
										<tfoot>
											<tr>
												<th>S.No</th>
												<th>Banner Image</th>
												<th>Sub Title</th>
												<th>Title</th>
												<th>Sub Title2</th>
												<th>Status</th>
											</tr>
										</tfoot>
									</table>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div id="addModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-body">
					<form action="<?php echo base_url();?>admin/add_banner" method="POST" enctype="multipart/form-data">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						 <input type="file" class="form-control" name="image"  required><br>
						 <input type="text" class="form-control" name="home_heading1"  placeholder="Heading1" required><br>
						 <input type="text" class="form-control" name="home_heading2" placeholder="Heading2" required><br>
						 <textarea class="form-control" name="home_heading3" required placeholder="Heading3"></textarea>
						 <button type="submit" class="btn btn-default">Add</button>
						 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</form>
					</div>
				</div>	
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
            function delete(id){
				var a = confirm("Do you want to really delete?");
				if(a==true)
				{
					$.ajax({
						type: "POST",
						data: {'id':id},
						url : "<?php echo base_url();?>admin/delete_homebanner",
						dataType:"json",
						success: function(data){
							var viewhtml ='';
							if(data.status > 0){
								$('#old'+id).css('display','none');
								var msg = "Record Deleted Succfilly...";
								$('#msg').html(msg);
							}
						}
					});
				}
            }
        </script>
		
       <?php $this->load->view('admin/footer1');?>