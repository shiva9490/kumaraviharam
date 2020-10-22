
		<?php $this->load->view('admin/header1');?>
		<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Edit Counter</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Edit Counter</li>
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
										    <?php foreach($edit_fund_raising_plan as $row){?>
											<form action="<?php echo base_url();?>admin/updatefund_raising_plan/<?php echo $row->id;?>" method="POST" class="form-horizontal form-bordered" id="myForm" enctype="multipart/form-data">
												<div class="form-body">
													<div class="form-group row">
														<label class="control-label text-right col-md-3">Title</label>
														<div class="col-md-9">
															<input type="text" placeholder=" Title "  value="<?php echo $row->title;?>" class="form-control" name="title">
														</div>
													</div>
													
													<div class="form-group row">
														<label class="control-label text-right col-md-3">Price </label>
														<div class="col-md-9">
															<input type="text" placeholder="Prince"  value="<?php echo $row->price;?>" class="form-control" name="price">
														</div>
													</div>
													<div class="form-group row">
														<label class="control-label text-right col-md-3">Unit </label>
														<div class="col-md-9">
															<input type="text" placeholder="Unit"  value="<?php echo $row->unit;?>" class="form-control" name="unit">
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