<?php 
    $CI=&get_instance();
    $CI->load->model('product_model');
    $CI->load->model('general_model');

    $setting = $this->general_model->setting();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="keywords" content="<?= get_setting()['meta_keywords'] ?>">
        <meta name="description" content="<?= get_setting()['meta_description'] ?>">
        <link href="<?= base_url() ?>home_file/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>home_file/css/home_style.css">
        <link rel="shortcut icon" href="<?= base_url() ?>image/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>DELHIBAZAR</title>
        <link rel="stylesheet" href="<?= base_url() ?>home_file/jQueryUI/jquery-ui.css">

        <link rel="stylesheet" href="<?= base_url() ?>home_file/css/font-awesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="<?= base_url() ?>user_login/alert/sweetalert.css">

        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="<?= base_url() ?>home_file/jQueryUI/jquery-ui.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>home_file/js/main.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>home_file/kava.js"></script>
        <link rel="stylesheet" href="<?= base_url() ?>home_file/kava.css">

        <script src="<?= base_url() ?>user_login/alert/sweetalert.min.js"></script>
        <script async src="https://platform-api.sharethis.com/js/sharethis.js#property=5cfd1d9d4351e9001264fde8&product=sticky-share-buttons"></script>
        <script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>

    <style type="text/css">
        .col-md-12 > .col-md-2 { padding: 0 30px; }
        .badge-warning{ color:black;background: #ffc107; }
        .badge{
           
            border-radius: .25rem;
        }

        .kava_fade {  
            -webkit-animation-name: kava_fade;  
            -webkit-animation-duration: 1.5s;  
            animation-name: kava_fade;  
            animation-duration: 1.5s;  
        }  
        @-webkit-keyframes kava_fade {  
            from {  
                opacity: .4  
            }  
            to {  
                opacity: 1  
            }  
        }  

        @keyframes kava_fade {  
            from {  
                opacity: .4  
            }  
            to {  
                opacity: 1  
            }  
        }

    </style>

    </head>
    <body>

        <!-- <div class="overlay-2">
          <div class="videoBox" id="videobox">
            <a class="close"><i class="fa fa-close a-iii"></i></a>
            <video autoplay controls src="<?= base_url() ?>SampleVideo.mp4"></video>
          </div>
        </div> -->

        <div id="wrapper">
            <div class="overlay"></div>
            <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
                <ul class="nav sidebar-nav">
                    <li class="sidebar-brand">
                        <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                            <span class="hamb-top"></span>
                            <span class="hamb-middle"></span>
                            <span class="hamb-bottom"></span>
                        </button>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>">Home</a>
                    </li>

                    <li>
                        <a href="<?= base_url(); ?>home">Shopping</a>
                    </li>
                    
                    <li>
                        <a href="<?= base_url(); ?>#">Blog</a>
                    </li>
                    
                    <?php if($this->session->userdata('id')) { ?>
                        <li>
                            <a href="<?= base_url(); ?>welcome/logout">Logout</a>
                        </li>
                    <?php } else{ ?> 

                        <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>login">Login</a>
                        
                    <?php } ?>


                </ul>
            </nav>

            <div class="container" style="margin-top: 5px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-xs-12 col-sm-12 hidden-md hidden-lg text-center justify-content-sm-center">
                            <div class="col-xs-1 col-sm-1"></div>
                            <div class="col-xs-5 col-sm-5 hidden-md hidden-lg">
                                
                                <p id="MydateDisplay" style="font-size: 14px;color: #fff;text-align: center;background-color: #34495e;margin: 0 auto;padding: 12px 0px;font-family: calibri;width: 120px; height: 60px;"></p>

                            </div>
                            <div class="col-xs-5 col-sm-5 hidden-md hidden-lg">
                            <!-- weather widget start -->
                                <a target="_blank" href="https://www.booked.net/weather/new-delhi-18038"><img src="https://w.bookcdn.com/weather/picture/26_18038_1_1_34495e_250_2c3e50_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=2&domid=w209&anc_id=65336"  alt="booked.net"/></a>
                            <!-- weather widget end -->
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-xs-12 col-sm-12 hidden-sm hidden-xs">
                            
                            <p id="MydateDisplay1" style="font-size: 14px;color: #fff;text-align: center;background-color: #34495e;margin: 0 0 10px;padding: 12px 0px;font-family: calibri;width: 120px; height: 60px;"></p>

                        </div>
                        <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12" style="margin-top: 5px; height: 90px !important;">
                            
                            <div class="col-md-12 text-center blink" style=" background: #34495e; height: 70px;">
                                <p style="height: 40px;margin: 0;color: #ffc107; padding: 5px; font-weight: bold;">
                                    <?= get_setting()['dis_text'] ?>
                                </p>
                                <?php if(get_setting()['btn_text'] != ''){ ?>
                                    <a href="<?= get_setting()['btn_link'] ?>" target="_blank" class="btn btn-warning btn-xs">
                                        <?= get_setting()['btn_text'] ?>        
                                    </a>
                                <?php } ?>
                            </div>

                            <style type="text/css">
                                @keyframes blink{
                                    0%{opacity: 0;}
                                    50%{opacity: .5;}
                                    100%{opacity: 1;}
                                }
                                .blink p{
                                    animation: blink 1s linear infinite;
                                }
                            </style>

                        </div>

                        <div class="col-md-2 col-lg-2 text-center col-xs-12 col-sm-12 hidden-sm hidden-xs">
                        <!-- weather widget start -->
                            <a target="_blank" href="https://www.booked.net/weather/new-delhi-18038"><img src="https://w.bookcdn.com/weather/picture/26_18038_1_1_34495e_250_2c3e50_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=2&domid=w209&anc_id=65336"  alt="booked.net"/></a>
                        <!-- weather widget end -->
                        </div>

                    </div>
                </div>
            </div>

            <?php if(!empty(get_setting()['announcements'])){ ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <marquee style="background: #ffc107; border-radius: 3px;" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="3">    
                                        <?= get_setting()['announcements'] ?>
                                    </marquee>
                                </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            
            <div class="container">
                <div class="row justify-content-md-center hidden-xs hidden-sm">
                        <div class="col-md-12 text-center center-fource justify-content-md-center">
                            <p><span class="badge badge-warning">ADVERTISEMENTS</span></p>
                            <div class="col-md-1"></div>
                            <?php if($this->shop_model->hash_dynamic_add('1')){ ?>
                                <div class="col-md-2 sliders_ads">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('1') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    
                                    <a <?= $href ?> class="ad_slide kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>

                                    </a>

                                    <?php } ?>

                                    <style type="text/css">
                                        .ad_slide {  
                                            display: none ; 
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-md-2">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad home.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if($this->shop_model->hash_dynamic_add('2')){ ?>
                                <div class="col-md-2 sliders_ads">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('2') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    
                                    <a <?= $href ?> class="ad_slide2 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>

                                    </a>

                                    <?php } ?>

                                    <style type="text/css">
                                        .ad_slide2 {  
                                            display: none  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-md-2">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad home.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('3')){ ?>
                                <div class="col-md-2 sliders_ads">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('3') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    
                                    <a <?= $href ?> class="ad_slide3 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>

                                    </a>

                                    <?php } ?>

                                    <style type="text/css">
                                        .ad_slide3 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-md-2">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad home.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('4')){ ?>
                                <div class="col-md-2 sliders_ads">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('4') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    
                                    <a <?= $href ?> class="ad_slide4 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>

                                    </a>

                                    <?php } ?>

                                    <style type="text/css">
                                        .ad_slide4 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-md-2">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad home.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('5')){ ?>
                                <div class="col-md-2 sliders_ads">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('5') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    
                                    <a <?= $href ?> class="ad_slide5 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>

                                    </a>

                                    <?php } ?>

                                    <style type="text/css">
                                        .ad_slide5 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-md-2">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad home.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 20px; margin-top: 15px;">
                            <img class="center-block" src="<?= base_url() ?>image/logo.png" width="270" alt="DELHIBAZAR" id="logo">
                            <form method="get" action="<?= base_url() ?>welcome/list">
                                <div class="row text-center center_new_f">
                                    <div class="col-12 col-xs-12 col-lg-6 col-md-6 col-sm-12">
                                        <div class="input-group">
                                                <input type="text" id="search" class="form-control" placeholder="what are you looking for?" name="search" style="border-radius: 50px 0px 0px 50px; padding: 20px;">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="submit" style="border-radius: 0px 50px 50px 0px; padding: 10px 16px;"><i class="fa fa-search"></i></button>
                                                </span>
                                        </div>
                                    </div>
                                </div>

                                
                            </form>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-12 text-center center-fource justify-content-md-center hidden-sm hidden-xs">
                            <p><span class="badge badge-warning">ADVERTISEMENTS</span></p>
                            <div class="col-md-1"></div>
                                
                            <?php if($this->shop_model->hash_dynamic_add('6')){ ?>
                                <div class="col-md-2 sliders_ads">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('6') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    
                                    <a <?= $href ?> class="ad_slide6 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>

                                    </a>

                                    <?php } ?>

                                    <style type="text/css">
                                        .ad_slide6 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-md-2">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad home.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('7')){ ?>
                                <div class="col-md-2 sliders_ads">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('7') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    
                                    <a <?= $href ?> class="ad_slide7 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>

                                    </a>

                                    <?php } ?>

                                    <style type="text/css">
                                        .ad_slide7 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-md-2">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad home.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('8')){ ?>
                                <div class="col-md-2 sliders_ads">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('8') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    
                                    <a <?= $href ?> class="ad_slide8 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>

                                    </a>

                                    <?php } ?>

                                    <style type="text/css">
                                        .ad_slide8 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-md-2">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad home.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('9')){ ?>
                                <div class="col-md-2 sliders_ads">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('9') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    
                                    <a <?= $href ?> class="ad_slide9 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>

                                    </a>

                                    <?php } ?>

                                    <style type="text/css">
                                        .ad_slide9 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-md-2">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad home.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('10')){ ?>
                                <div class="col-md-2 sliders_ads">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('10') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    
                                    <a <?= $href ?> class="ad_slide10 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>

                                    </a>

                                    <?php } ?>

                                    <style type="text/css">
                                        .ad_slide10 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-md-2">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad home.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="col-md-1"></div>
                        </div>





                        <!-----------------------------------------------------------
                        -------------------------------------------------------------
                                                TABLET VIEW 
                        -------------------------------------------------------------
                        ------------------------------------------------------------->

                        <div class="col-sm-12 hidden-xs hidden-lg hidden-md tb-padding">
                            <p class="text-center" style="padding-bottom: 1rem;"><span class="badge badge-warning">ADVERTISEMENTS</span></p>
                            
                            <?php if($this->shop_model->hash_dynamic_add('1')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('1') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_tab1 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],15,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>

                                    <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_tab1 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-3">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('2')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('2') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_tab2 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],15,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>

                                    <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_tab2 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-3">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('3')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('3') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_tab3 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],15,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>

                                    <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_tab3 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-3">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('4')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('4') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_tab4 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],15,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>

                                    <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_tab4 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-3">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('5')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('5') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_tab5 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],15,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>

                                    <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_tab5 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-3">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('6')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('6') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_tab6 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],15,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>

                                    <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_tab6 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-3">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('7')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('7') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_tab7 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],15,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>

                                    <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_tab7 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-3">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('8')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('8') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_tab8 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],15,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>

                                    <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_tab8 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-3">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="col-xs-3"></div>


                            <?php if($this->shop_model->hash_dynamic_add('9')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('9') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_tab9 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],15,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>

                                    <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_tab9 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-3">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('10')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->hash_dynamic_add('10') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_tab10 kava_fade">
                                        <div class="col-md-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],15,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>

                                    <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_tab10 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-3">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <!--//-----------------       TABLET VIEW       ------------->
                        
                                                
                        <!-----------------------------------------------------------
                        -------------------------------------------------------------
                                                Mobile VIEW 
                        -------------------------------------------------------------
                        ------------------------------------------------------------->

                        <div class="col-xs-12 hidden-sm hidden-lg hidden-md tb-padding">
                            <p class="text-center" style="padding-bottom: 1rem;"><span class="badge badge-warning">ADVERTISEMENTS</span></p>

                            <?php if($this->shop_model->hash_dynamic_add('1')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->hash_dynamic_add('1') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_mob1 kava_fade">
                                        <div class="col-sm-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],22,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>
                                <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_mob1 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('2')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->hash_dynamic_add('2') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_mob2 kava_fade">
                                        <div class="col-sm-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],22,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>
                                <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_mob2 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                             
                            <?php if($this->shop_model->hash_dynamic_add('3')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->hash_dynamic_add('3') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_mob3 kava_fade">
                                        <div class="col-sm-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],22,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>
                                <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_mob3 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('4')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->hash_dynamic_add('4') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_mob4 kava_fade">
                                        <div class="col-sm-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],22,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>
                                <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_mob4 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('5')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->hash_dynamic_add('5') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_mob5 kava_fade">
                                        <div class="col-sm-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],22,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>
                                <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_mob5 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('6')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->hash_dynamic_add('6') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_mob6 kava_fade">
                                        <div class="col-sm-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],22,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>
                                <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_mob6 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('7')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->hash_dynamic_add('7') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_mob7 kava_fade">
                                        <div class="col-sm-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],22,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>
                                <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_mob7 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('8')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->hash_dynamic_add('8') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_mob8 kava_fade">
                                        <div class="col-sm-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],22,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>
                                <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_mob8 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->shop_model->hash_dynamic_add('9')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->hash_dynamic_add('9') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_mob9 kava_fade">
                                        <div class="col-sm-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],22,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>
                                <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_mob9 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            


                            <?php if($this->shop_model->hash_dynamic_add('10')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->hash_dynamic_add('10') as $key => $hash_one) { ?>
                                    <?php 
                                        if(empty($hash_one['link'] )){
                                            $href = 'href="javascript:;"';
                                        }else{
                                            $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                        }
                                    ?>   
                                    <a <?= $href ?> class="ad_slide_mob10 kava_fade">
                                        <div class="col-sm-12 add_div">
                                            <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                            <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                <?= cut_string($hash_one['business_name'],22,'...') ?>        
                                            </h5>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-info-circle"></i> 
                                                <?= cut_string($hash_one['intro'],22,'...') ?>  
                                            </p>
                                            <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                <i class="fa fa-map-marker"></i> 
                                                <?= cut_string($hash_one['address'],22,'...') ?>  
                                            </p>
                                        </div>
                                    </a>
                                <?php } ?>
                                    <style type="text/css">
                                        .ad_slide_mob10 {  
                                            display: none;  
                                        }
                                    </style>
                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <div class="add_div">
                                        <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;">Contact For Ad</p>
                                        <p style="margin-bottom: 3px;padding-left:3px;font-size:10px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <!--//-----------------       MOBILE VIEW       ------------->
                        
                </div>
            </div>
                

                <div id="footer" style="margin-top: 1em;">
                    <div id="footer-fix" class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">

                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <div class="col-md-4 col-xs-12 col-sm-12" style="display: flex; justify-content: center; margin:5px 0">

                                    
                                    <a href="<?= base_url(); ?>pages/about" class="a_footer">About</a>
                                    <a href="<?= base_url(); ?>pages/contact" class="a_footer">Contact</a>
                                    

                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12" style="display: flex; justify-content: center; margin:5px 0">
                                     
                                        <?php foreach (social_icons() as $key => $value) { ?>
                                             
                                            
                                            <a href="<?= $value['link'] ?>" target="_blank" class="a_footer"> 
                                                <i class="fa <?= $value['class'] ?>"></i>
                                            </a>
                                            
                                            
                                        <?php } ?>
                                    
                                </div>
                                <div class="col-md-4  col-xs-12 col-sm-12" style="display: flex; justify-content: center; margin:5px 0">
                                    
                                    
                                      <a href="<?= base_url(); ?>pages/terms" class="a_footer"> 
                                        Terms
                                      </a>
                                  
                                      <a href="<?= base_url(); ?>pages/privacy" class="a_footer"> 
                                        Privacy
                                      </a>

                                    </ul>

                                </div>
                            </div>

                        </div>
                        <div class="container-fluid copyrights_div">
                            
                            <p>Copyright &copy; 2019 DELHIBAZAR | <span>Powered By : <a style="color: #c5322d;" target="_blank" href="https://kavadevelopers.com">Kava Developers</a></span></p>
                            
                        </div>
                    </div>
                </div>
            

        </div>

            <!--  HEADER 2 SESSION MESSAGE -->
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
            <!-- //  HEADER 2 SESSION MESSAGE -->
            <script type="text/javascript">
              $(function() {
                  $(document).on('keyup',function(e) {
                    if (e.keyCode == 27) {
                        $('.overlay-2').remove();
                    }
                  });
                            
                  $('body').on('click','.overlay-2, .close', function() {
                    $('.overlay-2').remove();
                  });
                            
                  $('body').on('click','.videoBox', function(e) {
                      e.stopPropagation();
                  });
              });




              startTime();
              $(function(){
                  $('form').submit(function(){
                      if($.trim($('#search').val()) == '')
                      {
                          return false;
                      }

                  });

                  // $( "#search").autocomplete({
                  //     source: "<?= base_url('welcome/shop_autocomplete/?');?>",
                  //     select: function (event, ui) {
                  //         $("#search").val(ui.item.label);
                  //       }
                  // });

                   $( "#search").addClass('search');

                  $('iframe').load( function() {
                      $('iframe').contents().find("head")
                        .append($("<style type='text/css'>  #weatherWidget{ font-size: 12px !important; }  </style>"));
                  });
              });
            </script>

            <!--  FOOTER REMOVE CLASS -->
            <script type="text/javascript">
            $(function(){ 

                $(window).resize(function() {
                    if ($(window).width() < 1366) {
                        $('#footer-fix').removeClass('navbar-fixed-bottom');
                    } else {
                        $('#footer-fix').addClass('navbar-fixed-bottom');
                    }
                }).resize();
            });
            </script>
           
            <script type="text/javascript" src="<?= base_url('home_file/js/sliders.js') ?>"></script>
           
    </body>
</html>

