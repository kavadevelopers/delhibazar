<style type="text/css">
    .add_image {
        width: 100%;
        height: 120px;
    }
    .padding-5
    {
        padding-bottom: 10px;
    }

    .padding-5 > a{
        text-decoration: none;
    }
    .featured-place-wrap{
        border: 2px solid #d63a3a;
    }
    .featured-title-box > ul > li > p,.featured-title-box > ul > li > span{
        color: #92140c !important;
    } 

    .featured-title-box > p{
        color: #000;
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

    .kava_fade h5{
        font-size: 14px;
    }
    .add_div{
        margin-bottom: 10px;
    }
</style>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 responsive-wrap">
                <div class="row detail-filter-wrap">
                    <div class="col-md-4 featured-responsive">
                        <div class="detail-filter-text">
                            <p><?= count($shop); ?> Results For <span>"<?= $_GET['search'] ?>"</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

                        <!-----------------------------------------------------------
                        -------------------------------------------------------------
                                                TABLET VIEW 
                        -------------------------------------------------------------
                        ------------------------------------------------------------->

                        <div class="col-sm-12 hidden-xs hidden-lg hidden-md tb-padding">
                            <p class="text-center" style="padding-bottom: 1rem;"><span class="badge badge-warning">ADVERTISEMENTS</span></p>
                            
                            <?php if($this->shop_model->listing_ad('1')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->listing_ad('1') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->listing_ad('2')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->listing_ad('2') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->listing_ad('3')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->listing_ad('3') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->listing_ad('4')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->listing_ad('4') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->listing_ad('5')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->listing_ad('5') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->listing_ad('6')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->listing_ad('6') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->listing_ad('7')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->listing_ad('7') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->listing_ad('8')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->listing_ad('8') as $key => $hash_one) { ?>
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


                            <?php if($this->shop_model->listing_ad('9')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->listing_ad('9') as $key => $hash_one) { ?>
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

                            <?php if($this->shop_model->listing_ad('10')){ ?>
                                <div class="col-xs-3">

                                    <?php foreach ($this->shop_model->listing_ad('10') as $key => $hash_one) { ?>
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


            <div class="col-xs-12 hidden-md hidden-sm hidden-lg mb-view">
                    <p class="text-center"><span class="badge badge-warning">ADVERTISEMENTS</span></p>
                    
                    <?php if($this->shop_model->listing_ad('1')){ ?>
                        <div class="col-xs-6 padding-5">

                        <?php foreach ($this->shop_model->listing_ad('1') as $key => $hash_one) { ?>
                        <?php 
                            if(empty($hash_one['link'] )){
                                $href = 'href="javascript:;"';
                            }else{
                                $href = 'href="'.$hash_one['link'].'" target="_blank"';
                            }
                        ?> 

                        <a <?= $href ?> class="ad_slide_mob1 kava_fade">
                            <div class="col-xs-12 add_div">
                                <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                    <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-info-circle"></i> 
                                    <?= cut_string($hash_one['intro'],22,'...') ?>  
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('2')){ ?>
                        <div class="col-xs-6 padding-5">

                        <?php foreach ($this->shop_model->listing_ad('2') as $key => $hash_one) { ?>
                        <?php 
                            if(empty($hash_one['link'] )){
                                $href = 'href="javascript:;"';
                            }else{
                                $href = 'href="'.$hash_one['link'].'" target="_blank"';
                            }
                        ?> 

                        <a <?= $href ?> class="ad_slide_mob2 kava_fade">
                            <div class="col-xs-12 add_div">
                                <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                    <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-info-circle"></i> 
                                    <?= cut_string($hash_one['intro'],22,'...') ?>  
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                     <?php if($this->shop_model->listing_ad('3')){ ?>
                        <div class="col-xs-6 padding-5">

                        <?php foreach ($this->shop_model->listing_ad('3') as $key => $hash_one) { ?>
                        <?php 
                            if(empty($hash_one['link'] )){
                                $href = 'href="javascript:;"';
                            }else{
                                $href = 'href="'.$hash_one['link'].'" target="_blank"';
                            }
                        ?> 

                        <a <?= $href ?> class="ad_slide_mob3 kava_fade">
                            <div class="col-xs-12 add_div">
                                <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                    <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-info-circle"></i> 
                                    <?= cut_string($hash_one['intro'],22,'...') ?>  
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('4')){ ?>
                        <div class="col-xs-6 padding-5">

                        <?php foreach ($this->shop_model->listing_ad('4') as $key => $hash_one) { ?>
                        <?php 
                            if(empty($hash_one['link'] )){
                                $href = 'href="javascript:;"';
                            }else{
                                $href = 'href="'.$hash_one['link'].'" target="_blank"';
                            }
                        ?> 

                        <a <?= $href ?> class="ad_slide_mob4 kava_fade">
                            <div class="col-xs-12 add_div">
                                <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                    <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-info-circle"></i> 
                                    <?= cut_string($hash_one['intro'],22,'...') ?>  
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('5')){ ?>
                        <div class="col-xs-6 padding-5">

                        <?php foreach ($this->shop_model->listing_ad('5') as $key => $hash_one) { ?>
                        <?php 
                            if(empty($hash_one['link'] )){
                                $href = 'href="javascript:;"';
                            }else{
                                $href = 'href="'.$hash_one['link'].'" target="_blank"';
                            }
                        ?> 

                        <a <?= $href ?> class="ad_slide_mob5 kava_fade">
                            <div class="col-xs-12 add_div">
                                <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                    <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-info-circle"></i> 
                                    <?= cut_string($hash_one['intro'],22,'...') ?>  
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 22px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p>
                                    <p style="margin-bottom: 3px"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('6')){ ?>
                        <div class="col-xs-6 padding-5">

                        <?php foreach ($this->shop_model->listing_ad('6') as $key => $hash_one) { ?>
                        <?php 
                            if(empty($hash_one['link'] )){
                                $href = 'href="javascript:;"';
                            }else{
                                $href = 'href="'.$hash_one['link'].'" target="_blank"';
                            }
                        ?> 

                        <a <?= $href ?> class="ad_slide_mob6 kava_fade">
                            <div class="col-xs-12 add_div">
                                <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                    <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-info-circle"></i> 
                                    <?= cut_string($hash_one['intro'],22,'...') ?>  
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('7')){ ?>
                        <div class="col-xs-6 padding-5">

                        <?php foreach ($this->shop_model->listing_ad('7') as $key => $hash_one) { ?>
                        <?php 
                            if(empty($hash_one['link'] )){
                                $href = 'href="javascript:;"';
                            }else{
                                $href = 'href="'.$hash_one['link'].'" target="_blank"';
                            }
                        ?> 

                        <a <?= $href ?> class="ad_slide_mob7 kava_fade">
                            <div class="col-xs-12 add_div">
                                <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                    <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-info-circle"></i> 
                                    <?= cut_string($hash_one['intro'],22,'...') ?>  
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('8')){ ?>
                        <div class="col-xs-6 padding-5">

                        <?php foreach ($this->shop_model->listing_ad('8') as $key => $hash_one) { ?>
                        <?php 
                            if(empty($hash_one['link'] )){
                                $href = 'href="javascript:;"';
                            }else{
                                $href = 'href="'.$hash_one['link'].'" target="_blank"';
                            }
                        ?> 

                        <a <?= $href ?> class="ad_slide_mob8 kava_fade">
                            <div class="col-xs-12 add_div">
                                <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                    <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-info-circle"></i> 
                                    <?= cut_string($hash_one['intro'],22,'...') ?>  
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('9')){ ?>
                        <div class="col-xs-6 padding-5">

                        <?php foreach ($this->shop_model->listing_ad('9') as $key => $hash_one) { ?>
                        <?php 
                            if(empty($hash_one['link'] )){
                                $href = 'href="javascript:;"';
                            }else{
                                $href = 'href="'.$hash_one['link'].'" target="_blank"';
                            }
                        ?> 

                        <a <?= $href ?> class="ad_slide_mob9 kava_fade">
                            <div class="col-xs-12 add_div">
                                <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                    <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-info-circle"></i> 
                                    <?= cut_string($hash_one['intro'],22,'...') ?>  
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('10')){ ?>
                        <div class="col-xs-6 padding-5">

                        <?php foreach ($this->shop_model->listing_ad('10') as $key => $hash_one) { ?>
                        <?php 
                            if(empty($hash_one['link'] )){
                                $href = 'href="javascript:;"';
                            }else{
                                $href = 'href="'.$hash_one['link'].'" target="_blank"';
                            }
                        ?> 

                        <a <?= $href ?> class="ad_slide_mob10 kava_fade">
                            <div class="col-xs-12 add_div">
                                <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image img-responsive" style="margin-bottom: 2px;">
                                <p style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                    <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-info-circle"></i> 
                                    <?= cut_string($hash_one['intro'],22,'...') ?>  
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 hidden-xs hidden-sm">
                    <p class="text-center" style="margin-top: 1rem"><span class="badge badge-warning">ADVERTISEMENTS</span></p>

                    <?php if($this->shop_model->listing_ad('1')){ ?>
                        <div class="col-md-12 padding-5">

                            <?php foreach ($this->shop_model->listing_ad('1') as $key => $hash_one) { ?>
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
                                        <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                    <?php } else { ?>
                        <div class="col-md-12 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p>
                                    <p style="margin-bottom: 3px"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                    <?php if($this->shop_model->listing_ad('2')){ ?>
                        <div class="col-md-12 padding-5">

                            <?php foreach ($this->shop_model->listing_ad('2') as $key => $hash_one) { ?>
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
                                        <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                    <?php } else { ?>
                        <div class="col-md-12 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p>
                                    <p style="margin-bottom: 3px"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('3')){ ?>
                        <div class="col-md-12 padding-5">

                            <?php foreach ($this->shop_model->listing_ad('3') as $key => $hash_one) { ?>
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
                                        <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                    <?php } else { ?>
                        <div class="col-md-12 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p>
                                    <p style="margin-bottom: 3px"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('4')){ ?>
                        <div class="col-md-12 padding-5">

                            <?php foreach ($this->shop_model->listing_ad('4') as $key => $hash_one) { ?>
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
                                        <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                    <?php } else { ?>
                        <div class="col-md-12 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p>
                                    <p style="margin-bottom: 3px"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('5')){ ?>
                        <div class="col-md-12 padding-5">

                            <?php foreach ($this->shop_model->listing_ad('5') as $key => $hash_one) { ?>
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
                                        <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                    <?php } else { ?>
                        <div class="col-md-12 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p>
                                    <p style="margin-bottom: 3px"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

            </div>


            <div class="col-md-8 col-xs-12 col-sm-12">
                <div class="row light-bg text-center">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 col-sm-12 col-xs-12" style="padding:5px;">
                        <div class="form-group">
                            <select class="form-control form-control-sm" onchange="window.location.href='<?= base_url() ?>shop/session_ad/?data=<?= $this->input->get('search'); ?>&val='+this.value">

                                <option value="">Filter Result</option>
                                <option value="rating" <?= selected_filter_listing("rating") ?>>Rating</option>
                                <option value="new"     <?= selected_filter_listing("new") ?>>Newest</option>
                                <option value="old"     <?= selected_filter_listing("old") ?>>Oldest</option>
                                <option value="comment" <?= selected_filter_listing("comment") ?>>Most Commented</option>

                            </select>
                        </div>
                    </div>    
                    <div class="col-md-4"></div>
                </div>


                <div class="row light-bg detail-options-wrap" style="min-height: 500px;">
                    <?php foreach ($shop as $key => $value) { ?>
                        <div class="col-sm-12 col-lg-12 col-xl-6 featured-responsive col-xs-12">
                            <div class="featured-place-wrap">
                                <a href="<?= base_url() ?>shop/shop_detail/<?= $value['id'] ?>">
                                    <img src="<?= _get_shop_img($value['photo']) ?>" class="img-fluid" alt="#">
                                    <span class="featured-rating-orange" style="padding: 13px 5px;"><?= round($this->rating_model->get_avarage_rating($value['id'])[0]['average'],1) ?></span>
                                    <div class="featured-title-box">
                                        <h6><?= $value['shop_name'] ?></h6>

                                        <p><?= cut_string($value['category'],15,'...') ?></p> <span>• </span>
                                        <p><?= $this->rating_model->count_review($value['id']) ?> Reviews</p><span>• </span>
                                        <p><?= rating_dollar(round($this->rating_model->get_avarage_rating($value['id'])[0]['average'],1)) ?></p>
                                        <ul>
                                            <li><span class="icon-location-pin"></span>
                                                <p><?= cut_string($value['address'],35,'...') ?>  </p>
                                            </li>
                                            <li><span class="ti-view-grid"></span>
                                                <p><?= cut_string($value['pro_or_servi'],35,'...') ?>  </p>
                                            </li>
                                            <?php if($value['mobile_in_website'] == 0){ ?>
                                                <li><span class="icon-screen-smartphone"></span>
                                                    <p><?= $value['mobile'] ?></p>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <div class="bottom-icons">
                                            <div class="closed-now"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>    
                
            <div class="col-md-2  hidden-xs hidden-sm">
                
                <p class="text-center" style="margin-top: 1rem"><span class="badge badge-warning">ADVERTISEMENTS</span></p>
                <?php if($this->shop_model->listing_ad('6')){ ?>
                    <div class="col-md-12 padding-5">

                        <?php foreach ($this->shop_model->listing_ad('6') as $key => $hash_one) { ?>
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
                                    <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-info-circle"></i> 
                                    <?= cut_string($hash_one['intro'],22,'...') ?>  
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                <?php } else { ?>
                    <div class="col-md-12 padding-5">
                        <div class="add_div">
                            <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                            <div style="padding: 15px 0 0 4px;">
                                <p style="margin-bottom: 3px;">Contact For Ad</p>
                                <p style="margin-bottom: 3px"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if($this->shop_model->listing_ad('7')){ ?>
                    <div class="col-md-12 padding-5">

                        <?php foreach ($this->shop_model->listing_ad('7') as $key => $hash_one) { ?>
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
                                    <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-info-circle"></i> 
                                    <?= cut_string($hash_one['intro'],22,'...') ?>  
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                <?php } else { ?>
                    <div class="col-md-12 padding-5">
                        <div class="add_div">
                            <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                            <div style="padding: 15px 0 0 4px;">
                                <p style="margin-bottom: 3px;">Contact For Ad</p>
                                <p style="margin-bottom: 3px"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if($this->shop_model->listing_ad('8')){ ?>
                    <div class="col-md-12 padding-5">

                        <?php foreach ($this->shop_model->listing_ad('8') as $key => $hash_one) { ?>
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
                                    <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-info-circle"></i> 
                                    <?= cut_string($hash_one['intro'],22,'...') ?>  
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                <?php } else { ?>
                    <div class="col-md-12 padding-5">
                        <div class="add_div">
                            <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                            <div style="padding: 15px 0 0 4px;">
                                <p style="margin-bottom: 3px;">Contact For Ad</p>
                                <p style="margin-bottom: 3px"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if($this->shop_model->listing_ad('9')){ ?>
                    <div class="col-md-12 padding-5">

                        <?php foreach ($this->shop_model->listing_ad('9') as $key => $hash_one) { ?>
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
                                    <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-info-circle"></i> 
                                    <?= cut_string($hash_one['intro'],22,'...') ?>  
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                <?php } else { ?>
                    <div class="col-md-12 padding-5">
                        <div class="add_div">
                            <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                            <div style="padding: 15px 0 0 4px;">
                                <p style="margin-bottom: 3px;">Contact For Ad</p>
                                <p style="margin-bottom: 3px"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if($this->shop_model->listing_ad('10')){ ?>
                    <div class="col-md-12 padding-5">

                        <?php foreach ($this->shop_model->listing_ad('10') as $key => $hash_one) { ?>
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
                                    <?= cut_string($hash_one['business_name'],17,'...') ?>        
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
                                    <i class="fa fa-info-circle"></i> 
                                    <?= cut_string($hash_one['intro'],22,'...') ?>  
                                </p>
                                <p style="text-align: left; margin: 0 2px; font-size: 12px;">
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
                <?php } else { ?>
                    <div class="col-md-12 padding-5">
                        <div class="add_div">
                            <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                            <div style="padding: 15px 0 0 4px;">
                                <p style="margin-bottom: 3px;">Contact For Ad</p>
                                <p style="margin-bottom: 3px"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
                
               
        </div>

        <!------------------------------------------------------
        --------------------------------------------------------
                            MOBILE VIEW
        --------------------------------------------------------
        -------------------------------------------------------->
        

    </div>
</section>


<script>
    $(".map-icon").click(function() {
        $(".map-fix").toggle();
    });
</script>
<script>
    // Want to customize colors? go to snazzymaps.com
    function myMap() {
        var maplat = $('#map').data('lat');
        var maplon = $('#map').data('lon');
        var mapzoom = $('#map').data('zoom');
        // Styles a map in night mode.
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: maplat,
                lng: maplon
            },
            zoom: mapzoom,
            scrollwheel: false
        });
        var marker = new google.maps.Marker({
            position: {
                lat: maplat,
                lng: maplon
            },
            map: map,
            title: 'We are here!'
        });
    }
</script>

<script type="text/javascript" src="<?= base_url('home_file/js/sliders.js') ?>"></script>


