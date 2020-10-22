<?php $data['a'] =  "Age Wise Report"; ?>
<?php $this->load->view('admin/header1',$data);?>
<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Age wise Report</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Age wise Report</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <form action="<?php echo base_url();?>admin/age_report" class="col-md-12" method="POST" enctype="multipart/form-data">
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
											<button type="submit" class="btn btn-success"> Go</button>
										</div>
									</div>	
							</form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
									<center><span id="msg"></span></center>
									<a target="_blank" class="btn btn-primary" href="<?php echo base_url();?>admin/age_report_print">Print</a>
									<div class="table-responsive m-t-40">
										<table id="example23" class="table table-bordered table-striped">
											<thead>
												<th>S.No</th>
												<th>Age Group</th>
												<th class="text-right">Amount</th>
											</thead>
											<tbody>
												<?php foreach($age_report as $row){?>
												<tr>
													<td>1</td>	
													<td>Below 20yrs</td>
													<td class="text-right"><?php if($row->u20){ echo $row->u20; } else { echo '0.00';}?></td>
												</tr>		
												<tr>
													<td>2</td>	
													<td>20-35 yrs</td>
													<td class="text-right"><?php if($row->a2035){ echo $row->a2035; } else { echo '0.00';}?></td>
												</tr>		
												<tr>
													<td>3</td>	
													<td>35-45 yrs</td>
													<td class="text-right"><?php if($row->a3545){ echo $row->a3545; } else { echo '0.00';}?></td>
												</tr>		
												<tr>
													<td>4</td>	
													<td>45-55 yrs</td>
													<td class="text-right"><?php if($row->a4555){ echo $row->a4555; } else { echo '0.00';}?></td>
												</tr>		
												<tr>
													<td>4</td>	
													<td>Above 55 yrs</td>
													<td class="text-right"><?php if($row->a55){ echo $row->a55; } else { echo '0.00';}?></td>
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
		text: "Age Report"
	},
	data: [{
		type: "bar",
      	showInLegend: true,
		startAngle: 0,
		indexLabel: "{}",
		dataPoints: [
		    <?php foreach($age_report as $row){?>
			{y: <?php if($row->u20){ echo $row->u20; } else { echo 0.00;}?>, label: "Below 20yrs"},
			{y: <?php if($row->a2035){ echo $row->a2035; } else { echo 0.00;}?>, label: "20-30 yrs"},
			{y: <?php if($row->a3545){ echo $row->a3545; } else { echo 0.00;}?>, label: "35-45 yrs"},
			{y: <?php if($row->a4555){ echo $row->a4555; } else { echo 0.00;}?>, label: "45-55 yrs"},
			{y: <?php if($row->a55){ echo $row->a55; } else { echo 0.00;}?>, label: "Above 55 yrs"}
			<?php } ?>
		]
	}]
});
chart.render();

}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php $this->load->view('admin/footer1');?>