
		<?php $this->load->view('admin/header1');?>
		<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Products Images List</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Products Images List</li>
                            </ol>
                            <a data-toggle="modal" data-target="#myModal" class="btn btn-info d-none d-lg-block m-l-15"> Add Image</a>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
									<center><span class="text-danger"><?php echo $this->session->flashdata('update_productimage');?></span></center>
									<center><span class="text-danger"><?php echo $this->session->flashdata('add_productimage');?></span></center>
									<center><span id="msg"></span></center>
									<?php if($about_images->num_rows() > 0){?>
									<div class="table-responsive m-t-40">
										<table id="myTable" class="table table-bordered table-striped">
											<thead>
												<th>S.No</th>
												<th>Image</th>
												<th>Status</th>
											</thead>
											<tbody>
												<?php $i=1; foreach($about_images->result() as $row){?>
												<tr id="old<?php echo $row->about;?>">
													<td><?php echo $i;?></td>
													<td><?php if($row->about_images != ""){ ?>
													    <img src="<?php echo base_url();?>assets/about/<?php echo $row->about_images;?>" style="width:150px;height:150px;"><br>
													    <?php } else {?>
													    <img src="<?php echo base_url();?>assets_admin/defalt.png"><br>
													    <a href="" class="btn btn-info shi">Add images</a>
													    <?php } ?>
													    <?php $pro_id = $row->about;?>
													</td>
													<td>
														<span id="view<?php echo $row->about;?>"></span>
														<span id="active<?php echo $row->about;?>">
															<?php if($row->about_image_status == 1){ $status = "Active" ; }else{ $status = "Inactive" ;}?>
															<?php if($row->about_image_status == 1){?>
																<button class="btn btn-info shi" onclick="inactive(<?php echo $row->about;?>)" ><?php echo $status;?></button>
															<?php }else{?>
																<button class="btn btn-warning shi" onclick="active(<?php echo $row->about;?>)"><?php echo $status;?></button>
															<?php } ?>
														</span><br>
														<button class="btn btn-warning shi" data-toggle="modal" data-target="#myModal<?php echo $i;?>">Edit</button>
														<div class="modal" id="myModal<?php echo $i;?>">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                 <!-- Modal Header -->
                                                                 <div class="modal-header">
                                                                   <h4 class="modal-title">Add Image</h4>
                                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                 </div>
                                                                 <!-- Modal body -->
                                                                 <form action="<?php echo  base_url();?>admin/update_aboutimage/<?php echo $row->about;?>" method="POST" enctype="multipart/form-data">
                                                                 <div class="modal-body">
                                                                     <input type="file" class="form-control"  name="image" required><br>
                                                                   <center>
                                                                        <button type="submit" class="btn btn-success" >Add</button>
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                   </center>
                                                                 </div>
                                                                 </form>
                                                            </div>
                                                        </div>
                                                        </div>
														<button class="btn btn-danger shi" onclick="deletecatogry(<?php echo $row->about;?>)">Delete</button>
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
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                 <!-- Modal Header -->
                 <div class="modal-header">
                   <h4 class="modal-title">Add Image</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>
                 <!-- Modal body -->
                 <form action="<?php echo  base_url();?>admin/add_aboutimage" method="POST" enctype="multipart/form-data">
                 <div class="modal-body">
                     <input type="file" class="form-control"  name="image" required><br>
                   <center>
                        <button type="submit" class="btn btn-success" >Add</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                   </center>
                 </div>
                 </form>
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
						url : "<?php echo base_url();?>admin/delete_aboutimage",
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
					url : "<?php echo base_url();?>admin/inactive_aboutimage",
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
					url : "<?php echo base_url();?>admin/active_aboutimage",
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