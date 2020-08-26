
		<?php $this->load->view('admin/header1');?>
		<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Home Quality Policy</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Home Quality Policy</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
									<center><?php echo $this->session->flashdata('update_home_quality');?></center>
									<center><span id="msg"></span></center>
									<?php if($home_quality > 0){?>
									<div class="table-responsive m-t-40">
										<table id="myTable" class="table table-bordered table-striped">
											<thead>
												<th>S.No</th>
												<th>Desc</th>
												<th>Edit</th>
											</thead>
											<tbody>
												<?php $i="1"; foreach($home_quality as $row){?>
												<tr id="old<?php echo $row->id;?>">	
													<td><?php echo $i;?></td>
													<td><?php echo $row->descc;?></td>
													<td>													
														<a class="btn btn-warning shi" href="<?php echo base_url();?>admin/edit_home_quality/<?php echo $row->id;?>">Edit</a>
													</td>
												</tr>		
												<?php  $i++; } ?>
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
            function deletecatogry(id){
				var a = confirm("Do you want to really delete?");
				if(a == true){
					$.ajax({
						type: "POST",
						data: {'id':id},
						url : "<?php echo base_url();?>admin/delete_blog",
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
					url : "<?php echo base_url();?>admin/inactive_blog",
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
					url : "<?php echo base_url();?>admin/active_blog",
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