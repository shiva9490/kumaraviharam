
		<?php $this->load->view('admin/header1');?>
		<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">About concept evolution</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">About concept_evolution</li>
                            </ol>
                            <a href="<?php echo base_url();?>admin/about_concept_evolution" class="btn btn-info d-none d-lg-block m-l-15" > Add concept evolution</a>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
									<center><?php echo $this->session->flashdata('add_concept_evolution');?></center>
									<center><?php echo $this->session->flashdata('update_concept_evolution');?></center>
									<center><span id="msg"></span></center>
									<?php if($concept_evolution > 0){?>
									<div class="table-responsive m-t-40">
										<table id="myTable" class="table table-bordered table-striped">
											<thead>
												<th>S.No</th>
												<th>Imag</th>
												<th>Title</th>
												<th>Desc</th>
												<th>Status</th>
												<th>Edit</th>
												<th>Delete</th>
											</thead>
											<tbody>
												<?php $i=1; foreach($concept_evolution as $row){?>
												<tr id="old<?php echo $row->id;?>">
													<td><?php echo $i;?></td>													
													<td><img src="<?php echo base_url();?>assets/images/<?php echo $row->image;?>" width="100%"></td>
													<td><?php echo $row->title;?></td>
													<td><?php echo $row->desc;?></td>
													<td>
														<span id="view<?php echo $row->id;?>"></span>
														<span id="active<?php echo $row->id;?>">
															<?php if($row->status == 1){ $status = "Active" ; }else{ $status = "Inactive" ;}?>
															<?php if($row->status == 1){?>
																<button class="btn btn-info shi" onclick="inactive(<?php echo $row->id;?>)" ><?php echo $status;?></button>
															<?php }else{?>
																<button class="btn btn-warning shi" onclick="active(<?php echo $row->id;?>)"><?php echo $status;?></button>
															<?php } ?>
														</span>
													</td>													
													<td>													
														<a class="btn btn-warning shi" href="<?php echo base_url();?>admin/edit_concept_evolution/<?php echo $row->id;?>">Edit</a>
													</td>
													<td>
														<button class="btn btn-danger shi" onclick="deletecatogry(<?php echo $row->id;?>)">Delete</button>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
            function deletecatogry(id){
				var a = confirm("Do you want to really delete?");
				if(a == true){
					$.ajax({
						type: "POST",
						data: {'id':id},
						url : "<?php echo base_url();?>admin/delete_concept_evolution",
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
					url : "<?php echo base_url();?>admin/inactive_concept_evolution",
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
					url : "<?php echo base_url();?>admin/active_concept_evolution",
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