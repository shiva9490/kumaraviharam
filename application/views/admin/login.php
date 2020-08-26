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
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/favicon.ico">
    <title>Admin Dashboard</title>    
    <!-- page css -->
    <link href="<?php echo base_url();?>assets_admin/dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets_admin/dist/css/style.min.css" rel="stylesheet">
</head>
<style>
    .mg-50{
        margin-top:100px;
    }
    @media (max-width: 767px){
        .login-box {
            width: 100%;
        }
    }
</style>
<body class="skin-default card-no-border">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Kumaraviharam Admin</p>
        </div>
    </div>
    <section id="wrapper" class="mg-50">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="" style="background-image:url(<?php echo base_url();?>assets_admin//assets/images/background/login-register.jpg);">
                        <div class="login-box card">
                            <div class="card-body">
								<center>
									<img src="<?php echo base_url();?>assets/images/logo.png" alt="" /><hr>
								</center>	
								<center><span class="text-danger"><?php echo $this->session->flashdata('loginerror');?></span></center>
                                <form class="form-horizontal form-material" method="POST" action="<?php echo base_url('admin/login');?>">
            						<?php $csrf = array(
            								'name' => $this->security->get_csrf_token_name(),
            								'hash' => $this->security->get_csrf_hash()
            						); ?>
            						<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                    
                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="text" required="" name="username"  value="<?php echo $this->input->cookie('username');?>" placeholder="Username"> 
            							</div>
                                    </div>	
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input type="password" name="password" class="form-control"  value="<?php echo $this->input->cookie('password');?>" required="" placeholder="Password"> 
            							</div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div class="custom-control custom-checkbox">
            										<?php if($this->input->cookie('remember')!=''){ ?>
            											<input type="checkbox" class="custom-control-input" checked name="remember_me" value="1" id="customCheck1">
            										<?php } else { ?>
            											<input type="checkbox" class="custom-control-input" name="remember_me" value="1" id="customCheck1">
            										<?php } ?>
                                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <div class="col-xs-12 p-b-20">
                                            <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Log In</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>        
    </section>
    
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/popper/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
    
</body>
</html>