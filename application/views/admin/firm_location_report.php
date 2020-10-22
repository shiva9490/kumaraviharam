<?php $data['a'] =  "Firm Donations Locations Wise Report"; ?>
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
                        <h4 class="text-themecolor">Firm Donations  Locations Wise Report</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Firm Donations Locations Wise Report</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <form action="<?php echo base_url();?>admin/firm_location_report" class="col-md-12" method="POST" enctype="multipart/form-data">
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
									<div class="table-responsive m-t-40">
										<table id="example23" class="table table-bordered table-striped">
											<thead>
												<th>S.No</th>
												<th>City</th>
												<th>State</th>
												<th class="text-right">Amount</th>
											</thead>
											<tbody>
												<?php $i=1; foreach($firm_location_report as $row){?>
												<tr>
													<td><?php echo $i; ?></td>	
													<td><?php echo $row->city; ?></td>
													<td><?php echo $row->state; ?></td>
													<td class="text-right"><?php echo $row->t;?></td>
												</tr>		
												<?php $i++; } ?>
											</tbody>
										</table>
									</div>
								</div>
                            </div>
                            <!--<div class="row">
                                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
/*
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Source Report"
	},
	data: [{
		type: "pie",
      	showInLegend: true,
		startAngle: 0,
		indexLabel: "{y}",
		dataPoints: [
		    <?php foreach($organiasations as $row){?>
			{y: <?php  echo $row->t ;?>, name: "<?php  echo $row->fest;?>"},
			<?php } ?>
		]
	}]
});
chart.render();

}*/
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php $this->load->view('admin/footer1');?>