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
            <div class="col-md-2 hidden-xs hidden-sm">
                    <p class="text-center" style="margin-top: 1rem"><span class="badge badge-warning">ADVERTISEMENTS</span></p>

                    <?php if($this->shop_model->listing_ad('1')){ $hash_one = $this->shop_model->listing_ad('1')[0]; ?>
                        <div class="col-md-12 padding-5">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
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


                    <?php if($this->shop_model->listing_ad('2')){ $hash_one = $this->shop_model->listing_ad('2')[0]; ?>
                        <div class="col-md-12 padding-5">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
                                <div class="col-md-12 add_div">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
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

                    <?php if($this->shop_model->listing_ad('3')){ $hash_one = $this->shop_model->listing_ad('3')[0]; ?>
                        <div class="col-md-12 padding-5">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
                                <div class="col-md-12 add_div">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
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

                    <?php if($this->shop_model->listing_ad('4')){ $hash_one = $this->shop_model->listing_ad('4')[0]; ?>
                        <div class="col-md-12 padding-5">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
                                <div class="col-md-12 add_div">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
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

                    <?php if($this->shop_model->listing_ad('5')){ $hash_one = $this->shop_model->listing_ad('5')[0]; ?>
                        <div class="col-md-12 padding-5">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
                                <div class="col-md-12 add_div">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
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
                <div class="row light-bg detail-options-wrap" style="min-height: 500px;">
                    <?php foreach ($shop as $key => $value) { ?>
                        <div class="col-sm-6 col-lg-12 col-xl-6 featured-responsive col-xs-12">
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
                <?php if($this->shop_model->listing_ad('6')){ $hash_one = $this->shop_model->listing_ad('6')[0]; ?>
                    <div class="col-md-12 padding-5">
                        <a href="<?= $hash_one['link'] ?>" target="_blank">
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

                <?php if($this->shop_model->listing_ad('7')){ $hash_one = $this->shop_model->listing_ad('7')[0]; ?>
                    <div class="col-md-12 padding-5">
                        <a href="<?= $hash_one['link'] ?>" target="_blank">
                            <div class="col-md-12 add_div">
                                <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
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

                <?php if($this->shop_model->listing_ad('8')){ $hash_one = $this->shop_model->listing_ad('8')[0]; ?>
                    <div class="col-md-12 padding-5">
                        <a href="<?= $hash_one['link'] ?>" target="_blank">
                            <div class="col-md-12 add_div">
                                <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
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

                <?php if($this->shop_model->listing_ad('9')){ $hash_one = $this->shop_model->listing_ad('9')[0]; ?>
                    <div class="col-md-12 padding-5">
                        <a href="<?= $hash_one['link'] ?>" target="_blank">
                            <div class="col-md-12 add_div">
                                <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
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

                <?php if($this->shop_model->listing_ad('10')){ $hash_one = $this->shop_model->listing_ad('10')[0]; ?>
                    <div class="col-md-12 padding-5">
                        <a href="<?= $hash_one['link'] ?>" target="_blank">
                            <div class="col-md-12 add_div">
                                <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
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
        <div class="row">
            <div class="col-xs-12 hidden-md hidden-sm hidden-lg mb-view">
                    <p class="text-center"><span class="badge badge-warning">ADVERTISEMENTS</span></p>
                    
                    <?php if($this->shop_model->listing_ad('1')){ $hash_one = $this->shop_model->listing_ad('1')[0]; ?>
                        <div class="col-xs-6 padding-5">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
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
                        </div>
                    <?php } else { ?>
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p><br>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('2')){ $hash_one = $this->shop_model->listing_ad('2')[0]; ?>
                        <div class="col-xs-6 padding-5">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
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
                        </div>
                    <?php } else { ?>
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p><br>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                     <?php if($this->shop_model->listing_ad('3')){ $hash_one = $this->shop_model->listing_ad('3')[0]; ?>
                        <div class="col-xs-6 padding-5">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
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
                        </div>
                    <?php } else { ?>
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p><br>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('4')){ $hash_one = $this->shop_model->listing_ad('4')[0]; ?>
                        <div class="col-xs-6 padding-5">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
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
                        </div>
                    <?php } else { ?>
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p><br>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('5')){ $hash_one = $this->shop_model->listing_ad('5')[0]; ?>
                        <div class="col-xs-6 padding-5">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
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
                        </div>
                    <?php } else { ?>
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 22px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p><br>
                                    <p style="margin-bottom: 3px"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('6')){ $hash_one = $this->shop_model->listing_ad('6')[0]; ?>
                        <div class="col-xs-6 padding-5">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
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
                        </div>
                    <?php } else { ?>
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p><br><br>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('7')){ $hash_one = $this->shop_model->listing_ad('7')[0]; ?>
                        <div class="col-xs-6 padding-5">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
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
                        </div>
                    <?php } else { ?>
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p><br>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('8')){ $hash_one = $this->shop_model->listing_ad('8')[0]; ?>
                        <div class="col-xs-6 padding-5">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
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
                        </div>
                    <?php } else { ?>
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p><br>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('9')){ $hash_one = $this->shop_model->listing_ad('9')[0]; ?>
                        <div class="col-xs-6 padding-5">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
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
                        </div>
                    <?php } else { ?>
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p><br>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($this->shop_model->listing_ad('10')){ $hash_one = $this->shop_model->listing_ad('10')[0]; ?>
                        <div class="col-xs-6 padding-5">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
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
                        </div>
                    <?php } else { ?>
                        <div class="col-xs-6 padding-5">
                            <div class="add_div">
                                <img src="<?= base_url() ?>image/ad.jpg" class="add_image" style="margin-bottom: 2px;">
                                <div style="padding: 15px 0 0 4px;">
                                    <p style="margin-bottom: 3px;">Contact For Ad</p><br>
                                    <p style="margin-bottom: 3px;padding-bottom:13px;"><i class="fa fa-phone"></i> <?= $setting['ad_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
            </div>
        </div>

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

