<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png" type="text/css">
	
    <title> <?php echo $a; ?></title>
    <link href="<?php echo base_url();?>assets_admin/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_admin/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_admin/dist/css/style.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_admin/dist/css/pages/dashboard1.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_admin/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_admin/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
    <link href="<?php echo base_url();?>assets_admin/node_modules/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="<?php echo base_url();?>assets_admin/node_modules/jquery-asColorPicker-master/dist/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="<?php echo base_url();?>assets_admin/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="<?php echo base_url();?>assets_admin/node_modules/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_admin/node_modules/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
</head>
<style>
	.alert {
	  padding: 20px;
	  background-color: #f44336;
	  color: white;
	}

	.closebtn {
	  margin-left: 15px;
	  color: white;
	  font-weight: bold;
	  float: right;
	  font-size: 22px;
	  line-height: 20px;
	  cursor: pointer;
	  transition: 0.3s;
	}

	.closebtn:hover {
	  color: black;
	}
	.dt-buttons {
        display: none;
    }
</style>

<body class="skin-default fixed-layout" id="printarea">
    <div id="main-wrapper">
        <header class="topbar">
            <?php if(isset($this->session->userdata['security_loggin']['admin_id']) && !empty($this->session->userdata['security_loggin']['admin_id'])){?>
                <a href="<?php echo base_url();?>admin/security_loggin" class="btn btn-danger" style="float: right;margin-top: 10px;margin-right: 15px;">Logout Security</a>
            <?php }else{ }?>
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url();?>admin">
                        <!-- Logo icon -->
						<b>
                            <img src="<?php echo base_url();?>assets/images/logo.png" alt="homepage" class="dark-logo" style="width: 75%;" />
                            <!-- Light Logo icon -->
                        </b>
					</a>
                </div>
            </nav>
        </header>
		
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">                        
                        <li>
                            <a  href="<?php echo base_url();?>admin" aria-expanded="false">
                                <i class="icon-speedometer"></i>
                                <span class="hide-menu">Dashboard
                                </span>
                            </a>							
                        </li>
						<!--<li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti-layout-grid2"></i>
                                <span class="hide-menu">Home</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
								<li>
                                    <a href="<?php echo base_url();?>admin/home_banners">Home Banners</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/home_about">About Sirsailam</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/Sthala_Puranam">Sthala Puranam</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti-layout-grid2"></i>
                                <span class="hide-menu">About</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="<?php echo base_url();?>admin/sthalapuranam">Sthala Puranam</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/concept_evolution">Concept Evolution</a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/testimonials" aria-expanded="false">
                                <i class="ti-view-grid"></i>
                                <span class="hide-menu">Testimonials</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti-image"></i>
                                <span class="hide-menu">Events</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="<?php echo base_url();?>admin/event_imges">Images</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/events_videos">Vidoes</a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/blessings" aria-expanded="false">
                                <i class="ti-view-grid"></i>
                                <span class="hide-menu">blessings List</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti-image"></i>
                                <span class="hide-menu">Donations</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="<?php echo base_url();?>admin/bank_accounts">Bank Accounts</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/donations_benefits">Benefits of your contribution</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/fund_raising_plan">Fund Raising Plan</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti-image"></i>
                                <span class="hide-menu">conatct us</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="<?php echo base_url();?>admin/conatct_map">Map</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/conatct_address">Address</a>
                                </li>
                            </ul>
                        </li>
                        -->
                        
						<li>
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/fund_raising_plan" aria-expanded="false">
                                <i class="ti-view-grid"></i>
                                <span class="hide-menu">Donations </span>
                            </a>
                        </li>
                        <!--<li>
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/donations_list" aria-expanded="false">
                                <i class="ti-view-grid"></i>
                                <span class="hide-menu">Donations List</span>
                            </a>
                        </li>-->
                        <li>
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/fest" aria-expanded="false">
                                <i class="ti-view-grid"></i>
                                <span class="hide-menu">Festival Dates </span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                
                                <span class="hide-menu">Individual Donations</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="<?php echo base_url();?>admin/account_statement">Account Statement</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/donation_report">Donation Report</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/amount_report">Amount Report</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/source_report">Source Report</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/donations_behalf">Donations behalf of</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/purpose_report">Purpose Report</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/donations_week">Donatios Week Report</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/fest_donations">Festival Report</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/location_report">Location Report</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/age_report">Age Report</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/sloka_report">Sloka Report</a>
                                </li>
                            </ul>
                        </li>
						
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                
                                <span class="hide-menu">Firm Donations</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
								<li>
                                    <a href="<?php echo base_url();?>admin/firm_donation">Donation Report</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/firm_amount_report">Amount Report</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/firm_source_report">Source Report</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/firm_purpose_report">Purpose Report</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/firm_donations_week">Donations week Report</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/firm_fest_donations">Festival  Report</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/organiasations">Organiasations Report</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/firm_location_report">Location Report</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/firm_sloka_report">Sloka Report</a>
                                </li>
                            </ul>
                        </li>
						<!--<li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti-image"></i>
                                <span class="hide-menu">Settings</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="<?php echo base_url();?>admin/conatct_details">Contact Details</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/counter">Counter</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/social_media_liks">Social Media Liks</a>
                                </li>
                            </ul>
                        </li>-->
						
                        <li>
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/logout" aria-expanded="false">
                                <i class="ti-power-off"></i>
                                <span class="hide-menu">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        
        