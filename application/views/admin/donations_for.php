<?php $data['a'] =  "Donations  on behalf of  Report"; ?>
<?php $this->load->view('admin/header1',$data);?>
<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Donations on behalf of  Report</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Donations  on behalf of  Report</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <form action="<?php echo base_url();?>admin/donations_behalf" class="col-md-12" method="POST" enctype="multipart/form-data">
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
									<a target="_blank" class="btn btn-primary" href="<?php echo base_url();?>admin/donations_behalf_print">Print</a>
									<div class="table-responsive m-t-40">
										<table id="example23" class="table table-bordered table-striped">
											<thead>
												<th>S.No</th>
												<th>Son/Daughter</th>
												<th class="text-right">Amount</th>
											</thead>
											<tbody>
												<?php $i=1; foreach($donation_for as $row){?>
												<tr>
													<td><?php echo $i; ?></td>	
													<td><?php if($row->Son_Daughter) { echo $row->Son_Daughter; } else {echo  "None" ;}?></td>
													<td  class="text-right"><?php echo $row->t;?></td>
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
/*
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Donations on behalf of Report"
	},
	data: [{
		type: "pie",
      	showInLegend: true,
		startAngle: 0,
		indexLabel: "{y}",
		dataPoints: [
		    <?php foreach($donation_for as $row){?>
			{y: <?php  echo $row->t ;?>, name: "<?php if($row->Son_Daughter) { echo $row->Son_Daughter; } else {echo  "None" ;}?>"},
			<?php } ?>
		]
	}]
});
chart.render();

}*/
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  theme: "light1", // "light1", "light2", "dark1"
  animationEnabled: true,
  exportEnabled: true,
  title: {
    text: "Donations on behalf of Report"
  },
  axisX: {
    margin: 10,
    labelPlacement: "inside",
    tickPlacement: "inside"
  },
  axisY2: {
    title: "Views (in billion)",
    titleFontSize: 14,
    includeZero: true,
    suffix: "rs"
  },
  data: [{
    type: "bar",
    axisYType: "secondary",
    yValueFormatString: "#,###.#rs",
    indexLabel: "{y}",
    dataPoints: [
        <?php foreach($donation_for as $row){?>
        { label: "<?php if($row->Son_Daughter) { echo $row->Son_Daughter; } else {echo  "None" ;}?>", y:<?php  echo $row->t ;?> },
        <?php } ?>
    ]
  }]
});
chart.render();
  
}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php $this->load->view('admin/footer1');?>