<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <link rel="shortcut icon" href="<?= base_url() ?>image/favicon.png">
    <title>DELHIBAZAR</title>
    <link rel="stylesheet" href="<?= base_url() ?>temp_1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>temp_1/css/simple-line-icons.css">

    <!-- Fa Fa Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>home_file/css/font-awesome/css/font-awesome.min.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>temp_1/css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="<?= base_url() ?>temp_1/css/set1.css">
    <!-- Swipper Slider -->
    <link rel="stylesheet" href="<?= base_url() ?>temp_1/css/swiper.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>temp_1/css/magnific-popup.css">
    <!-- Main CSS -->

    <link rel="stylesheet" href="<?= base_url() ?>user_login/alert/sweetalert.css">
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    
    <link rel="stylesheet" href="<?= base_url() ?>temp_1/css/style.css">
    <script src="<?= base_url() ?>temp_1/js/jquery-3.2.1.min.js"></script>

    <script src="<?= base_url() ?>user_login/alert/sweetalert.min.js"></script>
</head>

<body>

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

    <!--============================= HEADER =============================-->
    <div class="dark-bg sticky-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="<?= base_url(); ?>" style="width: 200px;" ><img src="<?= base_url(); ?>image/logo.png" style="width: 100%;"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon-menu"></span>
            </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url(); ?>">Home</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User
                                    <span class="icon-arrow-down"></span>
                                    </a>
                                    
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <?php if($this->session->userdata('id')) { ?>
                                        
                                            <a class="dropdown-item" href="<?= base_url() ?>welcome/logout">Logout</a>
                                        
                                        <?php }else{ ?> 

                                            <a class="dropdown-item" href="<?= base_url() ?>login">Login</a>
                                            <a class="dropdown-item" href="<?= base_url() ?>register">Register</a>

                                        <?php } ?>

                                    </div>
                                </li>


                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--//END HEADER -->