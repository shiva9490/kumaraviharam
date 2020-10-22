		<?php $this->load->view('admin/header1');?>
		<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Donation details</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Donation details</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <?php foreach($donation_details as $row){?>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3 class="text-muted">Payment Status</h3>
                                            <?php if($row->payment_status == 1){?>
									                Paid
									         <?php }else{ ?>
									                Failed
									         <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3 class="text-muted">Created By</h3>
                                             <h4 class="counter text-cyan"><?php echo $row->add_date;?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3>Donation Total</h3>
                                            <h4 class="counter text-success">₹ <?php echo $total = $row->total_amount;?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Products List</h3>
                            </div>
                            <div class="comment-widgets" id="comment">
                                <div class="table-responsive">
                                    <table class="table table-hover no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Description</th>
                                                <!--<th class="text-right">Quantity</th>
                                                <th class="text-right">Unit Cost</th>
                                                <th class="text-right">Total</th>-->
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <!--<tbody>
                                            <?php 
                                            $i=1;
                                            foreach($donation_details_list as $r){?>
                                            <tr>
                                                <td class="text-center"><?php echo $i;?></td>
                                                <td>
                                                    <?php echo $r->title;?>
                                                </td>
                                                <td class="text-right"><?php echo $r->qty;?> </td>
                                                <td class="text-right"> ₹ <?php echo $r->price;?> </td>
                                                <td class="text-right"> ₹ <?php echo $r->qty * $r->price;?> </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>-->
                                        <tbody>
                                            <?php 
                                            foreach($donation_details_list2 as $r){?>
                                            <?php if($r->general_donation != 0.00) { ?>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>General Donation</td>
                                                <td class="text-right"><?php echo  $r->general_donation;?> </td>
                                            </tr>
                                            <?php } if($r->temple_stone != 0.00) { ?>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td>Temple Stone</td>
                                                <td class="text-right"><?php echo  $r->temple_stone;?> </td>
                                            </tr>
                                            <?php } if($r->temple_flooor != 0.00) { ?>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td>Temple floor</td>
                                                <td class="text-right"><?php echo $r->temple_flooor;?> </td>
                                            </tr>
                                            <?php } if($r->sloka != 0.00) { ?>
                                            <tr>
                                                <td class="text-center">4</td>
                                                <td>Sloka</td>
                                                <td class="text-right"><?php echo  $r->sloka;?> </td>
                                            </tr>
                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-body bg-light">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="font-light m-t-0">Total</h5>
                                        </div>
                                        <div class="col-6 align-self-center display-6 text-right">
                                            <h4 class="text-success">₹ <?php echo $total;?></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="font-light m-t-0">Donation Total</h4>
                                        </div>
                                        <div class="col-6 align-self-center display-6 text-right">
                                            <h2 class="text-success">₹ <?php echo $total;?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
     
       <?php $this->load->view('admin/footer1');?>