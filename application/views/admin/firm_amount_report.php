<?php $data['a'] =  "Donation Report"; ?>
<?php $this->load->view('admin/header1',$data);?>
<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Firm Amount Report</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Firm Amount Report</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <form action="<?php echo base_url();?>admin/firm_amount_report" class="col-md-12" method="POST" enctype="multipart/form-data">
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
									<a class="btn btn-primary" target="_blank" href="<?php echo base_url();?>admin/firm_amount_report_print">Print</a>
									<div class="table-responsive m-t-40">
										<table id="example23" class="table table-bordered table-striped">
											<thead>
												<th>S.No</th>
												<th>Amout Category </th>
												<th class="text-right">Amount</th>
												<th>No of Donors</th>
											</thead>
											<tbody>
												<?php $i=1; foreach($firm_amount_report as $row){?>
												<tr>
													<td>1</td>	
													<td>Under 10K</td>
													<td class="text-right"><?php if($row->a) { echo $row->a; } else {echo  '0.00' ;}?></td>
													<td><?php echo $row->a1;?></td>
												</tr>		
												<tr>
													<td>2</td>	
													<td>10K - 50K</td>
													<td class="text-right"><?php if($row->b) { echo $row->b; } else {echo  '0.00' ;}?></td>
													<td><?php echo $row->b1;?></td>
												</tr>		
												<tr>
													<td>3</td>	
													<td>50k - 1 lakh</td>
													<td class="text-right"><?php if($row->c) { echo $row->c; } else {echo  '0.00' ;}?></td>
													<td><?php echo $row->c1;?></td>
												</tr>		
												<tr>
													<td>4</td>	
													<td>Above 1 lakh</td>
													<td class="text-right"><?php if($row->d) { echo $row->d; } else {echo  '0.00' ;}?></td>
													<td><?php echo $row->d1;?></td>
												</tr>		
												<?php $i++; } ?>
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
		text: "Amount Report"
	},
	data: [{
		type: "pie",
      	showInLegend: true,
		startAngle: 0,
		indexLabel: "{y}",
		dataPoints: [
		    <?php foreach($firm_amount_report as $row){?>
			{y: <?php if($row->a) { echo $row->a; } else {echo  0.00 ;}?>, name: "Under 10"},
			{y: <?php if($row->b) { echo $row->b; } else {echo  0.00 ;}?>, name: "10K - 50K"},
			{y: <?php if($row->c) { echo $row->c; } else {echo  0.00 ;}?>, name: "50k - 1 lakh"},
			{y: <?php if($row->d) { echo $row->d; } else {echo  0.00 ;}?>, name: "Above 1 lakh"}
			<?php } ?>
		]
	}]
});
chart.render();

}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php $this->load->view('admin/footer1');?>