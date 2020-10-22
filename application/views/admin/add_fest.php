        <?php $data['a'] = 'Add Festival'; ?>
		<?php $this->load->view('admin/header1',$data);?>
		<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Add Festival</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Add Festival</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
										    	<center><span class="text-danger"><?php echo $this->session->flashdata('addfest');?></span></center>
										    <form action="<?php echo base_url();?>admin/addfest" method="POST" class="form-horizontal form-bordered" id="myForm" enctype="multipart/form-data">
												<div class="form-body">
													<div class="form-group row">
														<label class="control-label text-right col-md-3">Fest Name</label>
														<div class="col-md-9">
															<input type="text" name="fest" placeholder="title" value="" class="form-control" required >
														</div>
													</div>
													<div class="form-group row">
														<label class="control-label text-right col-md-3">Date</label>
														<div class="col-md-9">
															<input type="date" name="d"  value="" class="form-control" required >
														</div>
													</div>
												</div>
												<div class="form-actions">
													<div class="row">
														<div class="col-md-12">
															<div class="row">
																<div class="offset-sm-3 col-md-9">
																	<button type="submit" class="btn btn-success"> Add</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
                
						</div>
                    </div>
                </div>
            </div>
        </div>

	<?php $this->load->view('admin/footer1');?>