<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="<?= base_url() ?>image/favicon.png" type="image/png">
        <title>DELHIBAZAR</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?= base_url() ?>user_login/css/bootstrap.css">
        <link rel="stylesheet" href="<?= base_url() ?>user_login/vendors/linericon/style.css">
        <link rel="stylesheet" href="<?= base_url() ?>user_login/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>user_login/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>user_login/vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="<?= base_url() ?>user_login/vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="<?= base_url() ?>user_login/vendors/animate-css/animate.css">
        <link rel="stylesheet" href="<?= base_url() ?>user_login/vendors/jquery-ui/jquery-ui.css"> 
        <!-- main css -->
        <link rel="stylesheet" href="<?= base_url() ?>user_login/css/style.css">
        <link rel="stylesheet" href="<?= base_url() ?>user_login/css/responsive.css">
        
        <!-- sweet alert css -->
        <link rel="stylesheet" href="<?= base_url() ?>user_login/alert/sweetalert.css">
        <!-- sweet alert css -->


        <script src="<?= base_url() ?>user_login/js/jquery-3.2.1.min.js"></script>

        <!-- sweet alert js -->
        <script src="<?= base_url() ?>user_login/alert/sweetalert.min.js"></script>
        <!-- sweet alert js -->

    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
           	<div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light main_box">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						 <a class="navbar-brand" href="<?= base_url(); ?>" style="width: 200px;" ><img src="<?= base_url(); ?>image/logo.png" style="width: 100%;"></a>
						
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item"><a class="nav-link" href="index.html">Home</a></li> 
								
								<li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
								
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User</a>
									<ul class="dropdown-menu">
										
										<?php if($this->session->userdata('id')) { ?>
										
											<li class="nav-item"><a class="nav-link" href="<?= base_url() ?>welcome/logout">Logout</a></li>
										
										<?php }else{ ?> 

											<li class="nav-item"><a class="nav-link" href="<?= base_url() ?>login">Login</a></li>
											<li class="nav-item"><a class="nav-link" href="<?= base_url() ?>register">Register</a></li>

										<?php } ?>
									</ul>
								</li> 
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="nav-item"><a href="#" class="cart"><i class="lnr lnr lnr-cart"></i></a></li>
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
        
<script type="text/javascript">
<?php if(!empty($this->session->flashdata('error'))){ ?>
	JSalert();
	function JSalert()
	{
		swal("Cancelled", "<?= $this->session->flashdata('error'); ?>", "error");
	}
	  
	
<?php $this->session->set_flashdata('error',''); } ?>

<?php if(!empty($this->session->flashdata('msg'))){ ?>
	JSalert();
	function JSalert(){
 		swal("Congrats!","<?= $this->session->flashdata('msg'); ?>", "success");
	}
<?php $this->session->set_flashdata('msg',''); } ?>

</script>
        
        
        