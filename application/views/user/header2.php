<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png" type="text/css">
		
    <title>User Dashboard</title>
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
</style>
<body class="skin-default fixed-layout">
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
                            <a  href="<?php echo base_url();?>" aria-expanded="false">
                                <i class="icon-speedometer"></i>
                                <span class="hide-menu">Dashboard
                                </span>
                            </a>							
                        </li>
						<li>
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>Dashboard/user_details" aria-expanded="false">
                                <i class="ti-view-grid"></i>
                                <span class="hide-menu">Prfile deatils</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>Dashboard/donations" aria-expanded="false">
                                <i class="ti-view-grid"></i>
                                <span class="hide-menu">Donations List</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>Signin/logout" aria-expanded="false">
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
        
        