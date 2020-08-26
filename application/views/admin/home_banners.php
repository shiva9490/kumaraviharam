
		<?php $this->load->view('admin/header1');?>
		<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Home banners List</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Home banners Charges List</li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#addModal"> Add Home Banner</button>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
									<center><?php echo $this->session->flashdata('add_delivery');?></center>
									<center><?php echo $this->session->flashdata('update_delivery');?></center>
									<center><span id="msg"></span></center>
									<?php if($home_banners->num_rows() > 0){?>
									<div class="table-responsive m-t-40">
										<table id="myTable" class="table table-bordered table-striped">
											<thead>
												<th>S.No</th>
												<th>Imag</th>
												<th>Status</th>
												<th>Edit</th>
												<th>Delete</th>
											</thead>
											<tbody>
												<?php $i=1; foreach($home_banners->result() as $row){?>
												<tr id="old<?php echo $row->banner_id;?>">
													<td><?php echo $i;?></td>													
													<td><img src="<?php echo base_url();?>assets/images/banner/<?php echo $row->image;?>" width="100%"></td>
													<td>
														<span id="view<?php echo $row->banner_id;?>"></span>
														<span id="active<?php echo $row->banner_id;?>">
															<?php if($row->banner_status == 1){ $status = "Active" ; }else{ $status = "Inactive" ;}?>
															<?php if($row->banner_status == 1){?>
																<button class="btn btn-info shi" onclick="inactive(<?php echo $row->banner_id;?>)" ><?php echo $status;?></button>
															<?php }else{?>
																<button class="btn btn-warning shi" onclick="active(<?php echo $row->banner_id;?>)"><?php echo $status;?></button>
															<?php } ?>
														</span>
													</td>													
													<td>													
														<button class="btn btn-warning shi" data-toggle="modal" data-target="#myModal<?php echo $i;?>">Edit</button>
														<div id="myModal<?php echo $i;?>" class="modal fade" role="dialog">
															<div class="modal-dialog">
																<!-- Modal content-->
																<div class="modal-content">	
																	<div class="modal-body">
																	<form action="<?php echo base_url();?>admin/update_homebanner/<?php echo $row->banner_id;?>" method="POST" enctype="multipart/form-data">
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																		<h2>Update Home Banner</h2>
																		 <label>Image size (1350 X 550 px)</label>
                                                						 <input type="file" class="form-control" name="image"  value="" placeholder="" required>
                                                						<button type="submit" class="btn btn-default">Update</button>
																		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																	</form>
																	</div>
																</div>	
															</div>
														</div>
													</td>
													<td>
														<button class="btn btn-danger shi" onclick="deletecatogry(<?php echo $row->banner_id;?>)">Delete</button>
													</td>
												</tr>		
												<?php $i++; } ?>
											</tbody>
										</table>
									</div>
									<?php } else{?>
									<center>
										<button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus-circle"></i> Add Home banners </button>
									</center>
									<?php } ?>
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
					    <form action="<?php echo base_url();?>admin/add_homebanner" method="POST" enctype="multipart/form-data">
					    	 <button type="button" class="close" data-dismiss="modal">&times;</button>
					    	 <label>Image size (1350 X 550 px)</label>
					    	 <input type="file" class="form-control" name="image"  value="" placeholder="" required><br>
					    	<button type="submit" class="btn btn-default">Add</button>
					    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					    </form>
					</div>
				</div>	
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
            function deletecatogry(id){
				var a = confirm("Do you want to really delete?");
				if(a == true){
					$.ajax({
						type: "POST",
						data: {'id':id},
						url : "<?php echo base_url();?>admin/delete_homebanner",
						dataType:"json",
						success: function(data){
							var viewhtml ='';
							if(data.status > 0){
								$('#old'+id).css('display','none');
								var view = '<div class="alert">Record Delete Succfully...</div>';
								$('#msg').html(view);
								msg();
							}
						}
					});
				}
            }
		</script>
		<script>
			function inactive(id){
				$.ajax({
					type: "POST",
					data: {'id':id},
					url : "<?php echo base_url();?>admin/inactive_homebanner",
					dataType:"json",
					success: function(data){
						var viewhtml ='';
						if(data.status > 0){
							$('#active'+id).css('display','none');
							var view = '<button class="btn btn-warning shi" onclick="active('+id+')">Inactive</button>';
							$('#view'+id).html(view);
						}
					}
				});
			}
		</script>		
		<script>
			function active(id){
				$.ajax({
					type: "POST",
					data: {'id':id},
					url : "<?php echo base_url();?>admin/active_homebanner",
					dataType:"json",
					success: function(data){
						var viewhtml ='';
						if(data.status > 0){
							$('#active'+id).css('display','none');
							var view = '<button class="btn btn-info shi" onclick="inactive('+id+')">Active</button>';
							$('#view'+id).html(view);
						}
					}
				});
			}
        </script>
		<script>
			function msg(){
				$("#msg").show();
				setTimeout(function() { $("#msg").hide(); }, 5000);
			}
		</script>
		<?php $this->load->view('admin/footer1');?>