
		<?php $this->load->view('admin/header1');?>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/icofont.min.css">
		<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Social media liks</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">social media liks</li>
                            </ol>
                        </div>
                    </div>
                </div>
				    <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
									<center><?php echo $this->session->flashdata('update_social_link');?></center>
									<center><span id="msg"></span></center>
									<?php if($social_media_liks > 0){?>
									<div class="table-responsive m-t-40">
										<table id="myTable" class="table table-bordered table-striped">
											<thead>
												<th>S.No</th>
												<th>Media name</th>
												<th>Media Link</th>
												<th>Status</th>
												<th>Edit</th>
											</thead>
											<tbody>
												<?php $i=1; foreach($social_media_liks as $row){?>
												<tr id="old<?php echo $row->id;?>">
													<td><?php echo $i;?></td>
													<td>
														<i class="<?php echo $row->social_media;?>"></i>
													</td>
													<td><?php echo $row->social_link;?></td>
													<td>
														<span id="view<?php echo $row->id;?>"></span>
														<span id="active<?php echo $row->id;?>">
															<?php if($row->social_status == 1){ $status = "Active" ; }else{ $status = "Inactive" ;}?>
															<?php if($row->social_status == 1){?>
																<button class="btn btn-info shi" onclick="inactive(<?php echo $row->id;?>)" ><?php echo $status;?></button>
															<?php }else{?>
																<button class="btn btn-warning shi" onclick="active(<?php echo $row->id;?>)"><?php echo $status;?></button>
															<?php } ?>
														</span>
													</td>													
													<td>													
														<a class="btn btn-warning shi" data-toggle="modal" data-target="#addModal<?php echo $i;?>">Edit</a>
														<div id="addModal<?php echo $i;?>" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<!-- Modal content-->
															<div class="modal-content">
																<div class="modal-body">
																	<form action="<?php echo base_url();?>admin/update_social_link/<?php echo $row->id;?>" method="POST" enctype="multipart/form-data">
																		 <button type="button" class="close" data-dismiss="modal">&times;</button>
																		 <label><i class="<?php echo $row->social_media;?>"></i> - Social Link</label>
																		 <input type="text" class="form-control" name="social_link"  value="<?php echo $row->social_link;?>" placeholder="Social Link" required><br>
																		 <button type="submit" class="btn btn-default">Update</button>
																		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																	</form>
																</div>
															</div>	
														</div>
													</div>
													</td>
												</tr>		
												<?php $i++; } ?>
											</tbody>
										</table>
									</div>
									<?php } ?>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            
			</div>
        </div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
			function inactive(id){
				$.ajax({
					type: "POST",
					data: {'id':id},
					url : "<?php echo base_url();?>admin/inactive_social_media",
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
					url : "<?php echo base_url();?>admin/active_social_media",
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
			$(document).ready(function(){
				msg();
			});
			function msg(){
				$(".alert").show();
				setTimeout(function() { $(".alert").hide(); }, 3000);
			}
		</script>
	<?php $this->load->view('admin/footer1');?>