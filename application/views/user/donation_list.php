
		<?php $this->load->view('user/header2');?>
		<style>
		    .paid{
		        background: #b6e81a;
                border-radius: 50px;
                padding: 1px 5px 1px 5px;
                color: #fff;
		    }
		    .failed{
		        background: red;
                border-radius: 50px;
                padding: 1px 5px 1px 5px;
                color: #fff;
		    }
		</style>
		<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Donation List</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Donation List</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
									<center><span class="text-danger"><?php echo $this->session->flashdata('update_banner');?></span></center>
									<center><span class="text-success" id="msg"></span></center>
									<table  id="myTable" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>S.No</th>
												<th>Amount</th>
												<th>Payment Status</th>
												<th>Payment Date</th>
												<!--<th>View</th>-->
											</tr>
										</thead>
										<tbody>
											<?php $i=1; foreach($donations_list as $row){?>
											<tr>
												<td><?php echo $i;?></td>
												<td><?php echo $row->total_amount;?></td>
												<td><?php if($row->payment_status == 1){
											                echo "<span class='paid'>Paid</span>";
												        }else{
												            echo "<span class='failed'>Failed</span>";
												        }
											        ;?>
											    </td>
												<td><?php echo $row->add_date;?></td>
												<!--<td><a href="<?php echo base_url();?>dashboard/view_donation/<?php echo base64_encode($row->don_id);?>" class="btn btn-primary">View </a></td>-->
											</tr>		
											<?php $i++; } ?>
										</tbody>
										<tfoot>
										    <tr>
												<th>S.No</th>
												<th>Amount</th>
												<th>Payment Status</th>
												<th>Payment Date</th>
												<!--<th>View</th>-->
											</tr>
										</tfoot>
									</table>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div id="addModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-body">
					<form action="<?php echo base_url();?>admin/add_banner" method="POST" enctype="multipart/form-data">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						 <input type="file" class="form-control" name="image"  required><br>
						 <input type="text" class="form-control" name="home_heading1"  placeholder="Heading1" required><br>
						 <input type="text" class="form-control" name="home_heading2" placeholder="Heading2" required><br>
						 <textarea class="form-control" name="home_heading3" required placeholder="Heading3"></textarea>
						 <button type="submit" class="btn btn-default">Add</button>
						 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</form>
					</div>
				</div>	
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
            function delete(id){
				var a = confirm("Do you want to really delete?");
				if(a==true)
				{
					$.ajax({
						type: "POST",
						data: {'id':id},
						url : "<?php echo base_url();?>admin/delete_homebanner",
						dataType:"json",
						success: function(data){
							var viewhtml ='';
							if(data.status > 0){
								$('#old'+id).css('display','none');
								var msg = "Record Deleted Succfilly...";
								$('#msg').html(msg);
							}
						}
					});
				}
            }
        </script>
		
       <?php $this->load->view('user/footer2');?>