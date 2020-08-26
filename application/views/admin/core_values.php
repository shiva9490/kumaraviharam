
		<?php $this->load->view('admin/header1');?>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/icofont.min.css">
		<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Our Core Values</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Our Core Values</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
									<center><?php echo $this->session->flashdata('update_mission');?></center>
									<center><span id="msg"></span></center>
									<?php if($core_values->num_rows() > 0){?>
									<div class="table-responsive m-t-40">
										<table id="myTable" class="table table-bordered table-striped">
											<thead>
												<th>S.No</th>
												<th>Title</th>
												<th>Desc</th>
												<th>Edit</th>
											</thead>
											<tbody>
												<?php $i="1"; foreach($core_values->result() as $row){?>
												<tr id="old<?php echo $row->core_id;?>">	
													<td><?php echo $i;?></td>
													<td><?php echo $row->Corevalues_name;?></td>									
													<td><?php echo $row->desc;?></td>										
													<td>													
														<a class="btn btn-warning shi" href="<?php echo base_url();?>admin/edit_core_values/<?php echo $row->core_id;?>">Edit</a>
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
		<?php $this->load->view('admin/footer1');?>