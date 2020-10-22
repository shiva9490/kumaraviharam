<?php $data['a'] =  "Firm Donation Report"; ?>
<?php $this->load->view('admin/header1',$data);?>
<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Firm Donation Report</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Firm Donation Report</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <form action="<?php echo base_url();?>admin/firm_donation" class="col-md-12" method="POST" enctype="multipart/form-data">
									<div class="row">
									    
									     <label class="text-right col-md-2">From Date</label>
										<div class="col-md-3">
										   
											<input type="date" name="from" value="" class="form-control" required >
										</div>
										<label  class="text-right col-md-2">To date</label>
										<div class="col-md-3">
										
											<input type="date" name="to" value="" class="form-control" required >
										</div>
										<div class="col-md-2">
											<button type="submit" class="btn btn-success"> GO</button>
										</div>
									</div>	
							</form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
									<center><span id="msg"></span></center>
									<a target="_blank" class="btn btn-primary" href="<?php echo base_url();?>admin/firm_donation_print">Print</a>
									<div class="table-responsive m-t-40">
										<table id="example23" class="table table-bordered table-striped">
											<thead>
												<th>S.No</th>
												<th>Donation Particulars</th>
												<th class="text-right">Amount</th>
											</thead>
											<tbody>
												<?php foreach($firm_donation as $row){?>
												<tr>
													<td>1</td>	
													<td>Genaral</td>
													<td class="text-right"><?php echo $row->general;?></td>
												</tr>		
												<tr>
													<td>2</td>	
													<td>Stone</td>
													<td class="text-right"><?php echo $row->stone;?></td>
												</tr>		
												<tr>
													<td>3</td>	
													<td>Floor</td>
													<td class="text-right"><?php echo $row->floor;?></td>
												</tr>		
												<tr>
													<td>4</td>	
													<td>Sloka</td>
													<td class="text-right"><?php echo $row->sloka;?></td>
												</tr>		
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
                            </div>
                            <div class="row">
                                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Donation Report"
	},
	data: [{
		type: "pie",
      	showInLegend: true,
		startAngle: 0,
		indexLabel: "{y}",
		dataPoints: [
		    <?php foreach($firm_donation as $row){?>
			{y: <?php echo $row->general;?>, name: "General"},
			{y: <?php echo $row->stone;?>, name: "stone"},
			{y: <?php echo $row->floor;?>, name: "floor"},
			{y: <?php echo $row->sloka;?>, name: "sloka"}
			<?php } ?>
		]
	}]
});
chart.render();

}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php $this->load->view('admin/footer1');?>