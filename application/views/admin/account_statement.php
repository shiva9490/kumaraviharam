<?php $data['a'] =  "Donation Report"; ?>
<?php $this->load->view('admin/header1',$data);?>
<style>
    .dt-buttons {
        display: block;
    }
</style>
<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Account Statement</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Account Statement</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
									<center><span id="msg"></span></center>
									<div class="table-responsive m-t-40">
										<table id="example23" class="table table-bordered table-striped">
											<thead>
												<th>S.No</th>
												<th>Unique ID</th>
												<th>First Name</th>
												<th>Last name</th>
												<th>Gender</th>
												<th>Email</th>
												<th>Phone</th>
												<th>City</th>
												<th>State</th>
												<th>Date&Time</th>
												<th>General Donation Amount</th>
												<th>Temple Stone Amount</th>
												<th>Temple Flooor Amount</th>
												<th>sloka Amount</th>
												<th>Total Amount</th>
											</thead>
											<tbody>
												<?php $i=1; foreach($account_statement as $row){?>
												<tr>
													<td><?php echo $i;?></td>	
													<td><?php echo $row->don_id;?></td>
													<td><?php echo $row->fullName;?></td>
													<td><?php echo $row->Surname;?></td>
													<td><?php echo $row->gender;?></td>
													<td><?php echo $row->Email;?></td>
													<td><?php echo $row->Mobile_Number;?></td>
													<td><?php echo $row->city;?></td>
													<td><?php echo $row->state;?></td>
													<td><?php echo $row->add_date;?></td>
													<td><?php echo $row->general_donation;?></td>
													<td><?php echo $row->temple_stone;?></td>
													<td><?php echo $row->temple_flooor;?></td>
													<td><?php echo $row->sloka;?></td>
													<td><?php echo $row->total_amount;?></td>
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