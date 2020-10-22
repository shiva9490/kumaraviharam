<?php $data['a'] =  "Festival"; ?>
<?php $this->load->view('admin/header1',$data);?>
<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Festival</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Festival</li>
                            </ol>
                            <a type="button" class="btn btn-info d-none d-lg-block m-l-15" href="<?php echo base_url();?>admin/add_fest"> Add Festival</a>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <center><span class="text-danger"><?php echo $this->session->flashdata('fest');?></span></center>
                                <div class="col-md-12">
									<center><span id="msg"></span></center>
									<div class="table-responsive m-t-40">
										<table id="example23" class="table table-bordered table-striped">
											<thead>
												<th>S.No</th>
												<th>Festival Name</th>
												<th>Festival Date</th>
												<th>Delete</th>
											</thead>
											<tbody>
												<?php $i=1; foreach($fest as $row){?>
												<tr>
													<td><?php echo $i; ?></td>	
													<td><?php echo $row->fest_name; ?></td>
													<td><?php echo $row->fest_date; ?></td>
													<td><a href="<?php echo base_url('admin/delete_fest/'.$row->fest_id);?>"class="btn btn-danger" onclick="return confirm ('Do you want to Delete this record?');">Delete</a></td>
												</tr>		
												<?php $i++; } ?>
											</tbody>
										</table>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $this->load->view('admin/footer1');?>