<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="339f-SE5_P4wJmz9gznA91rQnws92AsPmviluNAr5Lo" />
	<title>Welcome to Kumara Viharam</title>
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png" type="text/css">
	<!--<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="<?php echo base_url();?>assets/css/custome.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/jquery.bxslider.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/fonts/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
	<!-- Bootstrap -->
	<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/lightbox/jquery.fancybox.css?v=2.1.5" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/lightbox/jquery.fancybox-buttons.css?v=1.0.5" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/lightbox/jquery.fancybox-thumbs.css?v=1.0.7" />
</head>
<style>
.dropdown-menu{
    left: -85px;
}
</style>
<style>#donationtab > a{ background-color:#2a9da7; color:#fff; } hr{border-top: "1px solid #b0afae;"}</style>
<body>
    
    <div id="mainheader">
    <div class="header">
        <div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-sm-3 col-md-3  col-xs-6">
					<div class="logo">
						<a href=""><img class="img-responsive" src="<?php echo base_url();?>assets/images/logo.png" alt=""></a>
					</div>
				</div>
				<div class="col-lg-9 col-sm-6 col-md-9">
					<div class="navigation fa-pull-right">
						<div class="mainmenu">
							<ul>
								<li id="hometab" class="active"><a href="<?php echo base_url();?>">Home</a></li>                     
								<li id="aboutustab"><a href="<?php echo base_url();?>about-us">About Kumara Viharam</a></li>
								<!--<li id="sthalapuranamtab"><a href="project-master.html">Sthala Puranam</a>
								<ul>
								<li><a href="project-master.html">Project Master Plan</a></li>                           
								</ul>                                       
								</li>-->
								<li id="testimonitab"><a href="<?php echo base_url();?>testimonials">Testimonials</a></li> 
								<li id="eventstab"><a href="<?php echo base_url();?>events">Events</a></li>
								<li id="keypersonstab"><a href="<?php echo base_url();?>key-persons">Blessings</a></li> 
								<li id="donationtab"><a href="<?php echo base_url();?>donations">Donations</a></li>                                                                
								<li id="contab"><a href="<?php echo base_url();?>contact">Contact</a></li>
								<!--<?php if(isset($this->session->userdata['User_loggin'][0]['user_id']) && !empty($this->session->userdata['User_loggin'][0]['user_id'])){?>
								<li>
								    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php echo $this->session->userdata['User_loggin'][0]['name'];?> <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="<?php echo base_url();?>dashboard">DashBoard</a>
                                            <a href="<?php echo base_url();?>Signin/logout">Log out</a>
                                        </div>
                                    </div>
								</li>
								<?php }else{?>
								<li id="Signin"><a href="<?php echo base_url();?>Signin">Sign in / Sign up</a></li>
								<?php } ?>-->
							</ul>
						</div>
						
						<div id="respo_menu">
							<div class="respnav"><i class="fa fa-bars" aria-hidden="true"></i></div>
							<div id="respo-submenu">
								<ul>
									<li id="hometab" class="active"><a href="<?php echo base_url();?>">Home</a></li>                     
									<li id="aboutustab"><a href="<?php echo base_url();?>about-us">About Kumara Viharam</a></li>
									<!--<li id="sthalapuranamtab"><a href="project-master.html">Sthala Puranam</a>
									<ul>
									<li><a href="project-master.html">Project Master Plan</a></li>                           
									</ul>                                       
									</li>-->
									<li id="testimonitab"><a href="<?php echo base_url();?>testimonials">Testimonials</a></li> 
									<li id="eventstab"><a href="<?php echo base_url();?>events">Events</a></li>
									<li id="keypersonstab"><a href="<?php echo base_url();?>key-persons">Blessings</a></li> 
									<li id="donationtab"><a href="<?php echo base_url();?>donations">Donations</a></li>                                                                
									<li id="contab"><a href="<?php echo base_url();?>contact">Contact</a></li>
									<?php if(isset($this->session->userdata['User_loggin'][0]['user_id']) && !empty($this->session->userdata['User_loggin'][0]['user_id'])){?>
    								<li><?php echo $this->session->userdata['User_loggin'][0]['name'];?></li>
    								<li id="Signin"><a href="<?php echo base_url();?>Signin/logout">Log out</a></li>
    								<?php }else{?>
    								<li id="Signin"><a href="<?php echo base_url();?>Signin">Sign in / Sign up</a></li>
    								<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
    	</div>
	</div>
</div>
