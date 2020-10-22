<?php $data['a'] =  "Sloka Report"; ?>
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
                        <h4 class="text-themecolor">Sloka Report</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Sloka Report</li>
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
												<th>Name</th>
												<th>Gotram</th>
												<th>Birthstar</th>
											</thead>
											<tbody>
												<?php $i=1; foreach($sloka_report as $row){?>
												<tr>
													<td><?php echo $i; ?></td>	
													<td><?php echo $row->fullName; ?></td>
													<td><?php echo $row->Gotram; ?></td>
													<td><?php echo $row->Birthstar;?></td>
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