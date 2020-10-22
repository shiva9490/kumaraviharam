<?php $this->load->view('admin/header1',$data);?>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Firm Festival Report"
	},
	data: [{
		type: "pie",
      	showInLegend: true,
		startAngle: 0,
		indexLabel: "{y}",
		dataPoints: [
		    <?php foreach($firm_fest_donations as $row){?>
			{y: <?php  echo $row->t ;?>, name: "<?php  echo $row->fest;?>"},
			<?php } ?>
		]
	}]
});
chart.render();

}
</script>
        <div class="page-wrapper" >
            <div class="container-fluid">
                <div class="card-group">
                    <div class="card">
                        <div class="card-body" >
                            <div class="row">
                                <div class="col-md-12">
									<center><span id="msg"></span></center>
									<div class="table-responsive m-t-40">
										<table id="example23" class="table table-bordered table-striped">
											<thead>
												<th>S.No</th>
												<th>Festival</th>
												<th class="text-right">Amount</th>
												<th>No of Donations</th>
											</thead>
											<tbody>
												<?php $i=1; foreach($firm_fest_donations as $row){?>
												<tr>
													<td><?php echo $i; ?></td>	
													<td><?php echo $row->fest; ?></td>
													<td class="text-right"><?php echo $row->t;?></td>
													<td><?php echo $row->c;?></td>
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
        


<?php $this->load->view('admin/footer1');?>