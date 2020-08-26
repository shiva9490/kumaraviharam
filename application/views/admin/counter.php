
		<?php $this->load->view('admin/header1');?>
		<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Counter</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Counter</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
									<center><?php echo $this->session->flashdata('counter');?></center>
									<center><span id="msg"></span></center>
									<?php if(count($counter) > 0){?>
									<div class="table-responsive m-t-40">
										<table id="myTable" class="table table-bordered table-striped">
											<thead>
												<th>S.No</th>
												<th>Title</th>
												<th>Count</th>
												<th>Edit</th>
											</thead>
											<tbody>
												<?php $i="1"; foreach($counter as $row){?>
												<tr id="old<?php echo $row->id;?>">		
													<td><?php echo $i;?></td>
													<td><?php echo $row->title;?></td>
													<td><?php echo $row->count;?></td>	
													<td>
														<a href="<?php echo base_url();?>admin/edit_counter/<?php echo $row->id;?>" class="btn btn-warning shi" >Edit</a>
													</td>
												</tr>		
												<?php $i++; } ?>
											</tbody>
										</table>
									</div>
									<?php } else{?>
									<center>
										<h3>No data found...</h3>
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
			function msg(){
				$("#msg").show();
				setTimeout(function() { $(".alert").hide(); }, 3000);
			}
		</script>
		<?php $this->load->view('admin/footer1');?>