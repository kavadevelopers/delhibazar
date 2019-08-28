
<style type="text/css">


 
/*** Business Detail **/
.add_image {
    width: 100%;
    height: 110px;
}
.padding-5
{
    padding-right: 10px;
    padding-left: 10px;
    padding-bottom: 20px;
}
/*** Business Detail **/


.btn-outline-danger.focus, .btn-outline-danger:focus {
    box-shadow: unset !important;
}

.customer-img img {
    border-radius: 50%;
    width: 80px;
    height: 80px;
}

.color-red{ color : red;font-weight:bold; }
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
.add_div > p,.add_div > div > p{
    color: #000;
}

.kava_fade p{
    width: 100%;
    margin: 0;
}

.mobile p{
    width: 100%;
    margin: 0;
}

.kava_fade h5{
    font-size: 14px;
}

.tablat .add_div{
    margin-bottom: 10px;
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

<div>
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">

            <?php foreach ($this->shop_model->slider_where($shop[0]['id']) as $key => $value) { ?>

                <div class="swiper-slide">
                    <a href="<?= $this->config->config['admin_url'] ?>uploads/slider/<?= $value['image'] ?>" class="grid image-link">
                        <img src="<?= $this->config->config['admin_url'] ?>uploads/slider/<?= $value['image'] ?>" class="img-fluid" alt="#">
                    </a>
                </div>

            <?php } ?>

            
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
</div>



<!--============================= RESERVE A SEAT =============================-->
<section class="reserve-block">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5 title="Shop Name"><?= $shop[0]['shop_name'] ?></h5><br>
                <p class="reserve-description" title="Shop Info"><?= $shop[0]['category'] ?></p>
            </div>
            <div class="col-md-6">
                <div class="reserve-seat-block">
                    <div class="reserve-rating">
                        <span><?= round($ava_rating[0]['average'],1) ?></span>
                    </div>
                    <div class="review-btn">

                        <?php if($this->session->userdata('id')) { ?>

                            <?php if($this->rating_model->rating_where($this->uri->segment('3'),$this->session->userdata('id'))) { ?>
                            
                                <a href="#" class="btn btn-outline-danger" onclick="allready_click()" >WRITE A REVIEW</a>                            
                            <?php } else { ?>
                            
                                <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#myModal">WRITE A REVIEW</a>
                            
                            <?php } ?>

                        <?php } else { ?> 

                            <a href="#" class="btn btn-outline-danger" onclick="guest_click()">WRITE A REVIEW</a>
                            
                        <?php } ?>

                        <span><?= $total_review ?> reviews</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//END RESERVE A SEAT -->

<section class="reserve-block hidden-md hidden-lg hidden-sm mobile">
    <div class="container">
       
            <div class="col-md-12">

                    <div class="container text-center">
                        <p style="margin-top: 1rem"><span class="badge badge-warning" style="color: black;font-size: 68%;">ADVERTISEMENTS</span></p>
                    </div>
                
                <div class="row" style="padding: 10px 0;">
                

                    <?php if($this->shop_model->business_detail_ad('1')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->business_detail_ad('1') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->business_detail_ad('2')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->business_detail_ad('2') as $key => $hash_one) { ?>
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
                             
                            <?php if($this->shop_model->business_detail_ad('3')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->business_detail_ad('3') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->business_detail_ad('4')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->business_detail_ad('4') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->business_detail_ad('5')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->business_detail_ad('5') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->business_detail_ad('6')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->business_detail_ad('6') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->business_detail_ad('7')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->business_detail_ad('7') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->business_detail_ad('8')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->business_detail_ad('8') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->business_detail_ad('9')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->business_detail_ad('9') as $key => $hash_one) { ?>
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

                            


                            <?php if($this->shop_model->business_detail_ad('10')){ ?>
                                <div class="col-xs-6" style="margin-bottom:10px">
                                    <?php foreach ($this->shop_model->business_detail_ad('10') as $key => $hash_one) { ?>
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
            </div>
    </div>
</section>


<section class="reserve-block hidden-md hidden-lg hidden-xs tablat">
    <div class="container">
       
            <div class="col-md-12">

                    <div class="container text-center">
                        <p style="margin-top: 1rem"><span class="badge badge-warning" style="color: black;font-size: 68%;">ADVERTISEMENTS</span></p>
                    </div>
                
                <div class="row" style="padding: 10px 0;">

                    <?php if($this->shop_model->business_detail_ad('1')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->business_detail_ad('1') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->business_detail_ad('2')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->business_detail_ad('2') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->business_detail_ad('3')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->business_detail_ad('3') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->business_detail_ad('4')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->business_detail_ad('4') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->business_detail_ad('5')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->business_detail_ad('5') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->business_detail_ad('6')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->business_detail_ad('6') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->business_detail_ad('7')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->business_detail_ad('7') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->business_detail_ad('8')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->business_detail_ad('8') as $key => $hash_one) { ?>
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


                            <?php if($this->shop_model->business_detail_ad('9')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->business_detail_ad('9') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->business_detail_ad('10')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->business_detail_ad('10') as $key => $hash_one) { ?>
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

            </div>
       
    </div>
</section>

<!--============================= Desktop Add =============================-->
<section class="reserve-block hidden-xs hidden-sm">
    <div class="container">
       
            <div class="col-md-12">

                    <div class="container text-center">
                        <p style="margin-top: 1rem"><span class="badge badge-warning" style="color: black;font-size: 68%;">ADVERTISEMENTS</span></p>
                    </div>
                
                <div class="row" style="padding: 10px 0;">

                    <div class="col-md-1 padding-5"></div>
                    <?php if($this->shop_model->business_detail_ad('1')){ ?>
                        <div class="col-md-2 padding-5">
                            <?php foreach ($this->shop_model->business_detail_ad('1') as $key => $hash_one) { ?>
                            <?php 
                                if(empty($hash_one['link'] )){
                                    $href = 'href="javascript:;"';
                                }else{
                                    $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                }
                            ?>   
                            
                            <a <?= $href ?> class="ad_slide kava_fade">
                                <div class="col-md-12 add_div">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                    <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                        <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p><br>
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
                        <div class="col-md-2 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0;">
                                    <p>Contact For Ad</p>
                                    <p><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
               
                    <?php if($this->shop_model->business_detail_ad('2')){ ?>
                        <div class="col-md-2 padding-5">
                            <?php foreach ($this->shop_model->business_detail_ad('2') as $key => $hash_one) { ?>
                            <?php 
                                if(empty($hash_one['link'] )){
                                    $href = 'href="javascript:;"';
                                }else{
                                    $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                }
                            ?>   
                            
                            <a <?= $href ?> class="ad_slide2 kava_fade">
                                <div class="col-md-12 add_div">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                    <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                        <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-map-marker"></i> 
                                        <?= cut_string($hash_one['address'],22,'...') ?>  
                                    </p>
                                </div>
                            </a>
                        <?php } ?>

                            <style type="text/css">
                                .ad_slide2 {  
                                    display: none ; 
                                }
                            </style>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-2 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0;">
                                    <p>Contact For Ad</p>
                                    <p><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                    <?php if($this->shop_model->business_detail_ad('3')){ ?>
                        <div class="col-md-2 padding-5">
                            <?php foreach ($this->shop_model->business_detail_ad('3') as $key => $hash_one) { ?>
                            <?php 
                                if(empty($hash_one['link'] )){
                                    $href = 'href="javascript:;"';
                                }else{
                                    $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                }
                            ?>   
                            
                            <a <?= $href ?> class="ad_slide3 kava_fade">
                                <div class="col-md-12 add_div">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                    <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                        <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-map-marker"></i> 
                                        <?= cut_string($hash_one['address'],22,'...') ?>  
                                    </p>
                                </div>
                            </a>
                        <?php } ?>

                            <style type="text/css">
                                .ad_slide3 {  
                                    display: none ; 
                                }
                            </style>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-2 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0;">
                                    <p>Contact For Ad</p>
                                    <p><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->business_detail_ad('4')){ ?>
                        <div class="col-md-2 padding-5">
                            <?php foreach ($this->shop_model->business_detail_ad('4') as $key => $hash_one) { ?>
                            <?php 
                                if(empty($hash_one['link'] )){
                                    $href = 'href="javascript:;"';
                                }else{
                                    $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                }
                            ?>   
                            
                            <a <?= $href ?> class="ad_slide4 kava_fade">
                                <div class="col-md-12 add_div">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                    <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                        <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-map-marker"></i> 
                                        <?= cut_string($hash_one['address'],22,'...') ?>  
                                    </p>
                                </div>
                            </a>
                        <?php } ?>

                            <style type="text/css">
                                .ad_slide4 {  
                                    display: none ; 
                                }
                            </style>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-2 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0;">
                                    <p>Contact For Ad</p>
                                    <p><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->business_detail_ad('5')){ ?>
                        <div class="col-md-2 padding-5">
                            <?php foreach ($this->shop_model->business_detail_ad('5') as $key => $hash_one) { ?>
                            <?php 
                                if(empty($hash_one['link'] )){
                                    $href = 'href="javascript:;"';
                                }else{
                                    $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                }
                            ?>   
                            
                            <a <?= $href ?> class="ad_slide5 kava_fade">
                                <div class="col-md-12 add_div">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                    <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                        <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-map-marker"></i> 
                                        <?= cut_string($hash_one['address'],22,'...') ?>  
                                    </p>
                                </div>
                            </a>
                        <?php } ?>

                            <style type="text/css">
                                .ad_slide5 {  
                                    display: none ; 
                                }
                            </style>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-2 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0;">
                                    <p>Contact For Ad</p>
                                    <p><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>

            </div>

            <div class="col-md-12">
                
                <div class="row" style="padding: 10px 0;">

                    <div class="col-md-1 padding-5"></div>
                    <?php if($this->shop_model->business_detail_ad('6')){ ?>
                        <div class="col-md-2 padding-5">
                            <?php foreach ($this->shop_model->business_detail_ad('6') as $key => $hash_one) { ?>
                            <?php 
                                if(empty($hash_one['link'] )){
                                    $href = 'href="javascript:;"';
                                }else{
                                    $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                }
                            ?>   
                            
                            <a <?= $href ?> class="ad_slide6 kava_fade">
                                <div class="col-md-12 add_div">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                    <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                        <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-map-marker"></i> 
                                        <?= cut_string($hash_one['address'],22,'...') ?>  
                                    </p>
                                </div>
                            </a>
                        <?php } ?>

                            <style type="text/css">
                                .ad_slide6 {  
                                    display: none ; 
                                }
                            </style>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-2 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0;">
                                    <p>Contact For Ad</p>
                                    <p><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
               
                    <?php if($this->shop_model->business_detail_ad('7')){ ?>
                        <div class="col-md-2 padding-5">
                            <?php foreach ($this->shop_model->business_detail_ad('7') as $key => $hash_one) { ?>
                            <?php 
                                if(empty($hash_one['link'] )){
                                    $href = 'href="javascript:;"';
                                }else{
                                    $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                }
                            ?>   
                            
                            <a <?= $href ?> class="ad_slide7 kava_fade">
                                <div class="col-md-12 add_div">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                    <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                        <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-map-marker"></i> 
                                        <?= cut_string($hash_one['address'],22,'...') ?>  
                                    </p>
                                </div>
                            </a>
                        <?php } ?>

                            <style type="text/css">
                                .ad_slide7 {  
                                    display: none ; 
                                }
                            </style>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-2 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0;">
                                    <p>Contact For Ad</p>
                                    <p><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                    <?php if($this->shop_model->business_detail_ad('8')){ ?>
                        <div class="col-md-2 padding-5">
                            <?php foreach ($this->shop_model->business_detail_ad('8') as $key => $hash_one) { ?>
                            <?php 
                                if(empty($hash_one['link'] )){
                                    $href = 'href="javascript:;"';
                                }else{
                                    $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                }
                            ?>   
                            
                            <a <?= $href ?> class="ad_slide8 kava_fade">
                                <div class="col-md-12 add_div">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                    <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                        <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-map-marker"></i> 
                                        <?= cut_string($hash_one['address'],22,'...') ?>  
                                    </p>
                                </div>
                            </a>
                        <?php } ?>

                            <style type="text/css">
                                .ad_slide8 {  
                                    display: none ; 
                                }
                            </style>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-2 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0;">
                                    <p>Contact For Ad</p>
                                    <p><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->business_detail_ad('9')){ ?>
                        <div class="col-md-2 padding-5">
                            <?php foreach ($this->shop_model->business_detail_ad('9') as $key => $hash_one) { ?>
                            <?php 
                                if(empty($hash_one['link'] )){
                                    $href = 'href="javascript:;"';
                                }else{
                                    $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                }
                            ?>   
                            
                            <a <?= $href ?> class="ad_slide9 kava_fade">
                                <div class="col-md-12 add_div">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                    <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                        <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-map-marker"></i> 
                                        <?= cut_string($hash_one['address'],22,'...') ?>  
                                    </p>
                                </div>
                            </a>
                        <?php } ?>

                            <style type="text/css">
                                .ad_slide9 {  
                                    display: none ; 
                                }
                            </style>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-2 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0;">
                                    <p>Contact For Ad</p>
                                    <p><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->business_detail_ad('10')){ ?>
                        <div class="col-md-2 padding-5">
                            <?php foreach ($this->shop_model->business_detail_ad('10') as $key => $hash_one) { ?>
                            <?php 
                                if(empty($hash_one['link'] )){
                                    $href = 'href="javascript:;"';
                                }else{
                                    $href = 'href="'.$hash_one['link'].'" target="_blank"';
                                }
                            ?>   
                            
                            <a <?= $href ?> class="ad_slide10 kava_fade">
                                <div class="col-md-12 add_div">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                    <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                        <?= cut_string($hash_one['business_name'],13,'...') ?>        
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p><br>
                                    <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                        <i class="fa fa-map-marker"></i> 
                                        <?= cut_string($hash_one['address'],22,'...') ?>  
                                    </p>
                                </div>
                            </a>
                        <?php } ?>

                            <style type="text/css">
                                .ad_slide10 {  
                                    display: none ; 
                                }
                            </style>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-2 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0;">
                                    <p>Contact For Ad</p>
                                    <p><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
       
    </div>
</section>

<!--//=========================== Ad Section =============================-->


<!--============================= BOOKING DETAILS =============================-->
<section class="light-bg booking-details_wrap">
    <div class="container">
        <div class="row">
            
          
            <div class="col-md-9 responsive-wrap">
                

                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                        <p><?= nl2br($shop[0]['detail_desc']) ?></p>
                        <hr>
                        <div class="col-md-12 text-center" style="margin-bottom: 15px;"><h5>Information</h5></div>
                        <p><?= nl2br($shop[0]['info']) ?></p>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center" style="margin-bottom: 15px;"><h6>What We Offer</h6></div>
                        <?php foreach(explode(',',$shop[0]['pro_or_servi']) as $services => $service){ ?>
                            <div class="col-md-4">
                                <label class="custom-checkbox">
                                    <span class="ti-check-box"></span>
                                    <span class="custom-control-description"><?= $service ?></span>
                                </label> 
                            </div>
                        <?php } ?>
                    </div>
                </div>

                
            </div>
            <div class="col-md-3 responsive-wrap">
                <div class="contact-info">
                    <img src="<?= _get_shop_img($shop[0]['photo']) ?>" class="img-fluid" alt="#">
                        <div class="address" title="Landmark">
                            <span class="ti-pin-alt"></span>
                            <p><?= $shop[0]['landmark'] ?></p>
                        </div>
                        <div class="address" title="Address">
                            <span class="icon-location-pin"></span>
                            <p><?= $shop[0]['address'] ?></p>
                        </div>
                        <?php if($shop[0]['mobile_in_website'] == 0){ ?>
                            <div class="address" title="Mobile">
                                <span class="icon-screen-smartphone"></span>
                                <p><?= $shop[0]['mobile'] ?></p>
                            </div>
                        <?php } ?>
                        <?php if($shop[0]['whats_in_website'] == 0){ ?>
                            <div class="address" title="Watsapp No.">
                                <span class="fa fa-whatsapp"></span>
                                <p><?= $shop[0]['wp_no'] ?></p>
                            </div>
                        <?php } ?>
                        <div class="address" title="Hours Of Operation">
                            <span class="icon-clock"></span>
                            <p><?= $shop[0]['hour_operation'] ?>
                        </div>
                        <div class="address" title="Mode Of Payment">
                            <span class="fa fa-money"></span>
                            <p><?= $shop[0]['payment_mode'] ?>
                        </div>
                </div>
            </div>

            <div class="col-md-9 responsive-wrap">
                
                <div class="booking-checkbox_wrap mt-4">
                    <h5><?= $total_review ?> Reviews</h5>
                    
                    <?php foreach ($this->rating_model->review_list_with_limit($shop[0]['id'],5,0) as $key => $value) { 
                        $user = $this->rating_model->user_where($value['user_id'])[0];
                    ?>
                        <hr>
                        <div class="customer-review_wrap">

                            <?php if($this->session->userdata('id')){ ?>
                                <?php if($this->session->userdata('id') == $value['user_id']){ ?>
                                <p class="text-right" style="margin: 3px;">
                                    <a href="javascript:;" class="edit_button" data-subject="<?= $value['subject'] ?>" data-review="<?= $value['review'] ?>" data-rating="<?= $value['rating'] ?>" data-id="<?= $value['id'] ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </p>
                            <?php } } ?>

                            <div class="customer-img">
                                <img src="<?= base_url() ?>image/social_user_uploads/<?= $user['image'] ?>" class="img-fluid" alt="#">
                                <p><?= cut_string($user['first_name'].' '.$user['last_name'],13,'...') ?></p>
                                <span><?= $this->rating_model->count_user_review($value['user_id']) ?> Reviews</span>
                            </div>
                            <div class="customer-content-wrap">
                                <div class="customer-content">
                                    <div class="customer-review">
                                        <h6><?= cut_string($value['subject'],45,'...') ?></h6>
                                        <?= rating_dot($value['rating']); ?>
                                        <p><?= diff_date($value['created_at']); ?></p>
                                    </div>
                                    <div class="customer-rating"><?= round($value['rating'],1) ?>.0</div>
                                </div>
                                <p class="customer-text">
                                    <?= nl2br($value['review']) ?>
                                </p>
                            </div>
                        </div>

                    <?php } ?>
                    <hr>

                    <div id="other"></div>
                    <div class="customer-review_wrap text-center">
                        <?php if($total_review > 5){ ?>
                            <button type="button" class="btn btn-sm btn-default" id="load_more" style="cursor: pointer;"><span id="but_main">Load more</span> <span id="load" style="display: none;"><i class='fa fa-circle-o-notch fa-spin'></i> Loding</span></button>
                        <?php } ?>
                    </div>
                </div>

            </div>
      

        </div>
    </div>
</section>
<!--//END BOOKING DETAILS -->


<!--============================= Ad Section Mobile View =============================-->


<!--//=========================== Ad Section Mobile View =============================-->




<!-- Review Modal -->
<form method="post" id="review_modal" action="<?= base_url() ?>shop/rating">
    <div class="modal" id="myModal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Write a Review</h4>
              <button type="button" class="close" data-dismiss="modal" style="cursor: pointer;">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label class="font-weight-bold">Subject</label>
                    <input class="form-control" type="text" id="subject" name="subject" placeholder="Subject">
                    <span class="color-red" id="subject_span"></span>
                </div>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label class="font-weight-bold">Description</label>
                    <textarea class="form-control" type="text" name="review" id="review" placeholder="Description"></textarea>
                    <span class="color-red" id="review_span"></span>
                </div>
            </div>
            
            <div class="container">
                <p class="font-weight-bold" style="margin:0px;">Rating</p>
                    <div class="rate">

                        <input type="radio" id="star5" name="rating" value="5" />
                        <label for="star5" title="rating">5 stars</label>
                        <input type="radio" id="star4" name="rating" value="4" />
                        <label for="star4" title="rating">4 stars</label>
                        <input type="radio" id="star3" name="rating" value="3" />
                        <label for="star3" title="rating">3 stars</label>
                        <input type="radio" id="star2" name="rating" value="2" />
                        <label for="star2" title="rating">2 stars</label>
                        <input type="radio" id="star1" name="rating" value="1" />
                        <label for="star1" title="rating">1 star</label>

                    </div><br>
                    <p class="color-red" id="rating_span"></p>
            </div>

            <input type="hidden" name="shop_id" value="<?= $this->uri->segment('3') ?>">

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" style="cursor: pointer;">Save</button>
            </div>
            
          </div>
        </div>
    </div>
</form>

<form method="post" id="review_modal_edit" action="<?= base_url() ?>shop/edit_rating">
    <div class="modal" id="edit_myModal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Edit a Review</h4>
              <button type="button" class="close" data-dismiss="modal" style="cursor: pointer;">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label class="font-weight-bold">Subject</label>
                    <input class="form-control" type="text" id="edit_subject" name="subject" placeholder="Subject">
                    <span class="color-red" id="edit_subject_span"></span>
                </div>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label class="font-weight-bold">Description</label>
                    <textarea class="form-control" type="text" name="review" id="edit_review" placeholder="Description"></textarea>
                    <span class="color-red" id="edit_review_span"></span>
                </div>
            </div>
            
            <div class="container">
                <p class="font-weight-bold" style="margin:0px;">Rating</p>
                    <div class="rate">

                        <input type="radio" id="edit_star5" name="edit_rating" value="5" />
                        <label for="edit_star5" title="rating">5 stars</label>
                        <input type="radio" id="edit_star4" name="edit_rating" value="4" />
                        <label for="edit_star4" title="rating">4 stars</label>
                        <input type="radio" id="edit_star3" name="edit_rating" value="3" />
                        <label for="edit_star3" title="rating">3 stars</label>
                        <input type="radio" id="edit_star2" name="edit_rating" value="2" />
                        <label for="edit_star2" title="rating">2 stars</label>
                        <input type="radio" id="edit_star1" name="edit_rating" value="1" />
                        <label for="edit_star1" title="rating">1 star</label>

                    </div><br>
                    <p class="color-red" id="edit_rating_span"></p>
            </div>

            <input type="hidden" name="review_id" id="review_id" value="">
            <input type="hidden" name="shop_id" value="<?= $this->uri->segment('3') ?>">
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" style="cursor: pointer;">Save</button>
            </div>
            
          </div>
        </div>
    </div>
</form>

<input type="hidden" id="load_more_record" value="5">

<!-- // Review Modal -->
<script type="text/javascript">

function guest_click()
{
    swal("Cancelled", "Please Login First", "error");
}

function allready_click()
{
    swal("Cancelled", "Your rating is already submited", "error");   
}

$(document).ready(function(){
    $("#review_modal").submit(function(){
        var subject    = $('#subject').val();
        var review    = $('#review').val();
        var rating    = $("input[name='rating']:checked").val();
        var blank     = 0;
        

        // Subject Validation
        if(subject == ''){
            $('#subject_span').html("Subject is required");
            blank = 1;
            $('#subject_span').fadeIn();
        }
        else{
            $('#subject_span').fadeOut();
        }

        // Review Validation
        if(review == ''){
            $('#review_span').html("Description is required");
            blank = 1;
            $('#review_span').fadeIn();
        }
        else{
            $('#review_span').fadeOut();
        }

        // Rating Validation
        if(!rating){
            $('#rating_span').html("Rating is required");
            blank = 1;
            $('#rating_span').fadeIn();
        }
        else{
            $('#rating_span').fadeOut();
        }

        if(blank == 1){
            return false;
        }

    });

    $("#review_modal_edit").submit(function(){
        var subject    = $('#edit_subject').val();
        var review    = $('#edit_review').val();
        var rating    = $("input[name='edit_rating']:checked").val();
        var blank     = 0;
        

        // Subject Validation
        if(subject == ''){
            $('#edit_subject_span').html("Subject is required");
            blank = 1;
            $('#edit_subject_span').fadeIn();
        }
        else{
            $('#edit_subject_span').fadeOut();
        }

        // Review Validation
        if(review == ''){
            $('#edit_review_span').html("Description is required");
            blank = 1;
            $('#edit_review_span').fadeIn();
        }
        else{
            $('#edit_review_span').fadeOut();
        }

        // Rating Validation
        if(!rating){
            $('#edit_rating_span').html("Rating is required");
            blank = 1;
            $('#edit_rating_span').fadeIn();
        }
        else{
            $('#edit_rating_span').fadeOut();
        }

        if(blank == 1){
            return false;
        }

    });


    // Load More Button 
    $('#load_more').click(function(e){
        e.preventDefault();
        var record  =    $('#load_more_record').val();
        var shop_id =    '<?= $shop[0]['id'] ?>';
        
            $.ajax({
                type : "post",
                url : "<?= base_url() ?>shop/load_more",
                data : "record="+record+"&shop_id="+shop_id,
                cache : false,
                dataType: "json",
                beforeSend: function() {
                    $('#load').show();
                    $('#but_main').hide();
                },
                success:function( out ){
                    setTimeout(function(){
                        $('#other').append(out[1]);
                        $('#load_more_record').val(parseFloat($('#load_more_record').val()) + parseFloat(out[0]));
                        
                        if($('#load_more_record').val() == out[2])
                        {
                            $('#load_more').fadeOut();
                        }

                        $('#load').hide();
                        $('#but_main').show();

                    }, 2000);
                }
            });
    });


    $(document).delegate('.edit_button','click',function(){
        $('#edit_myModal').modal('show');
        $('#edit_subject').val($(this).data('subject'));
        $('#edit_review').val($(this).data('review'));
        $("input[name=edit_rating][value=" + $(this).data('rating') + "]").prop('checked', true);
        $('#review_id').val($(this).data('id'));
    });

});
</script>

<script type="text/javascript" src="<?= base_url('home_file/js/sliders.js') ?>"></script>

