<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets_admin/dist/css/style.min.css" rel="stylesheet">
<![endif]-->
</head>

<body class="skin-default fixed-layout">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">kumaraviharam admin</p>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <h3>Firm Amount Report</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
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
                                        </table>
                                    </div>
                                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                    <a  class="printPage btn btn-primary" href="#">Print</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/popper/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url();?>assets_admin/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url();?>assets_admin/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>assets_admin/dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>assets_admin/dist/js/custom.min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/dist/js/pages/jquery.PrintArea.js" type="text/JavaScript"></script>
    <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>
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
    <script>
        $('a.printPage').click(function(){
           window.print();
           window.close();
           return false;
        });
    </script>
    
</body>

</html>