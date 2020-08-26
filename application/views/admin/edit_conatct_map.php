
		<?php $this->load->view('admin/header1');?>
		<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Edit Map</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Edit Map</li>
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
										    <?php foreach($edit_conatct_map as $row){?>
											<form action="<?php echo base_url();?>admin/update_conatct_map/<?php echo $row->id;?>" method="POST" class="form-horizontal form-bordered" id="myForm" enctype="multipart/form-data">
												<div class="form-body">													
													<div class="form-group row">
														<label class="control-label text-right col-md-3">Map Iframe</label>
														<div class="col-md-9">
															<textarea style="width: 100%;" name="desc" class="from-control" required="" rows="8" ><?php echo $row->desc;?></textarea>
														</div>
													</div>
												</div>
												<div class="form-actions">
													<div class="row">
														<div class="col-md-12">
															<div class="row">
																<div class="offset-sm-3 col-md-9">
																	<button type="submit" class="btn btn-success"> Update</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</form>
										    <?php }?>
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