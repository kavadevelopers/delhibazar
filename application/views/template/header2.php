<?php 
$CI=&get_instance();
$CI->load->model('product_model');
$CI->load->model('cart_model');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <style type="text/css">
            body::-webkit-scrollbar {
                width: 10px;
            }
         
            body::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                border-radius: 10px;
            }
             
            body::-webkit-scrollbar-thumb {
              background-color: #ffc107;
              border-radius: 10px;
              outline: 1px solid slategrey;
            }
        </style>
        <?php if($this->uri->segment(2) == 'product_detail'){ ?>
	        <?php $_product = $CI->product_model->product_where($this->uri->segment(3)); ?>
	    	<meta name="keywords" content="<?= $_product[0]['keyword'] ?>">
	    	<meta name="description" content="<?= $_product[0]['description'] ?>">
	    <?php }else if($this->uri->segment(2) == 'about'){ ?>
	    	<?php $page = $CI->db->get_where('pages',['id' => '1'])->result_array(); ?>
	    	<meta name="keywords" content="<?= $page[0]['keyword'] ?>">
	    	<meta name="description" content="<?= $page[0]['description'] ?>">
	    <?php }else if($this->uri->segment(2) == 'terms'){ ?>
	    	
	    	<?php $page = $CI->db->get_where('pages',['id' => '2'])->result_array(); ?>
	    	<meta name="keywords" content="<?= $page[0]['keyword'] ?>">
	    	<meta name="description" content="<?= $page[0]['description'] ?>">

	    <?php }else if($this->uri->segment(2) == 'privacy'){ ?>
	    	
	    	<?php $page = $CI->db->get_where('pages',['id' => '3'])->result_array(); ?>
	    	<meta name="keywords" content="<?= $page[0]['keyword'] ?>">
	    	<meta name="description" content="<?= $page[0]['description'] ?>">
	    <?php }else if($this->uri->segment(2) == 'return_policy'){ ?>
	    	
	    	<?php $page = $CI->db->get_where('pages',['id' => '4'])->result_array(); ?>
	    	<meta name="keywords" content="<?= $page[0]['keyword'] ?>">
	    	<meta name="description" content="<?= $page[0]['description'] ?>">

	    <?php }else if($this->uri->segment(1) == 'home'){ ?>
	    	
	    	<?php $page = $CI->db->get_where('pages',['id' => '5'])->result_array(); ?>
	    	<meta name="keywords" content="<?= $page[0]['keyword'] ?>">
	    	<meta name="description" content="<?= $page[0]['description'] ?>">

	    <?php }else{ ?>
	    	<meta name="keywords" content="<?= get_setting()['meta_keywords'] ?>">
	    	<meta name="description" content="<?= get_setting()['meta_description'] ?>">	
	    <?php } ?>

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
        <script type="text/javascript" src="<?= base_url() ?>home_file/kava.js"></script>
        <script async src="https://platform-api.sharethis.com/js/sharethis.js#property=5cfd1d9d4351e9001264fde8&product=sticky-share-buttons"></script>

        <style type="text/css">
        	.banner_area {
			    min-height: auto !important;
			}
			.sample-text-area {
				padding: 30px 0 70px 0;
			}
        </style>

       
    </head>

    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">

        	<div class="top_menu row m0">
           		<div class="container">
					<div class="float-left">
						<a href="mailto:<?= get_setting()['email'] ?>"><?= get_setting()['email'] ?></a>
						<a href="#">Welcome to DELHIBAZAR</a>
					</div>
					<div class="float-right">
						<ul class="header_social">

							<?php foreach (social_icons() as $key => $value) { ?>
							
							<li><a href="<?= $value['link'] ?>" target="_blank"><i class="fa <?= $value['class'] ?>"></i></a></li>

							<?php } ?>
							
						</ul>
					</div>
           		</div>	
           	</div>

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
								<li class="nav-item"><a class="nav-link" href="<?= base_url() ?>home">Home</a></li> 
								<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>pages/about">About</a></li>
								
								<!-- <li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shopping</a>
									
									<ul class="dropdown-menu">
										
										<?php  foreach ($CI->product_model->get_category() as $key => $value) { ?>
											
										<li class="nav-item">
											<a class="nav-link" href="<?= base_url('products/list/').$value['id'] ?>"><?= $value['name'] ?></a>
										</li>
										
										<?php } ?>
									
									</ul>
								</li> -->


								<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>">Listing</a></li>

								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <i class="fa fa-chevron-down"></i></a>
									
									<ul class="dropdown-menu">
										
										
											
										<li class="nav-item">
											<a class="nav-link" href="<?= base_url(); ?>pages/terms">
												Terms
											</a>
										</li>

										<li class="nav-item">
											<a class="nav-link" href="<?= base_url(); ?>pages/privacy">
												Privacy
											</a>
										</li>

										<li class="nav-item">
											<a class="nav-link" href="<?= base_url(); ?>pages/return_policy">
												Return Policy
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="<?= base_url(); ?>pages/order_traking">
												Order Traking
											</a>
										</li>
									
									</ul>
								</li>

								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User <i class="fa fa-chevron-down"></i></a>
									<ul class="dropdown-menu">
										
										<?php if($this->session->userdata('id')) { ?>
										
											<li class="nav-item"><a class="nav-link" href="<?= base_url() ?>welcome/logout">Logout</a></li>
										
										<?php }else{ ?> 

											<li class="nav-item"><a class="nav-link" href="<?= base_url() ?>login">Login</a></li>
											<li class="nav-item"><a class="nav-link" href="<?= base_url() ?>register">Register</a></li>

										<?php } ?>
									</ul>
								</li>

								<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>pages/contact">Contact</a></li>

							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="nav-item"><a href="<?= base_url() ?>cart" class="cart"><i class="lnr lnr lnr-cart"></i>
								<?php if($this->session->userdata('id')){ $product = $CI->cart_model->user_cart_where($this->session->userdata('id')); echo count($product); } ?>
								</a></li>

								<li class="nav-item">
									<a href="<?= base_url() ?>cart/wishlist" class="cart"><i class="lnr lnr lnr-heart"></i>
									<?php if($this->session->userdata('id')){ 
										echo $CI->cart_model->count_wishlist($this->session->userdata('id'));
									} ?>
									</a>
								</li>
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
        
        
        