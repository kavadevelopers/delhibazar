<style type="text/css">
    .add_image {
        width: 100%;
        height: 150px;
    }
</style>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 responsive-wrap">
                <div class="row detail-filter-wrap">
                    <div class="col-md-4 featured-responsive">
                        <div class="detail-filter-text">
                            <p><?= count($shop); ?> Results For <span>Shops</span></p>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding: 10px 0;">
                    <?php if($this->shop_model->listing_ad('1')){ $hash_one = $this->shop_model->listing_ad('1')[0]; ?>
                        <div class="col-md-4">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
                                <div class="col-md-12 add_div">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                    <h6 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                        <?= cut_string($hash_one['business_name'],16,'...') ?>        
                                    </h6>
                                    <p style="text-align: left; margin: 0 2px; font-size: 15px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 15px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 15px;">
                                        <i class="fa fa-map-marker"></i> 
                                        <?= cut_string($hash_one['address'],22,'...') ?>  
                                    </p>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                    <?php if($this->shop_model->listing_ad('2')){ $hash_one = $this->shop_model->listing_ad('2')[0]; ?>
                        <div class="col-md-4">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
                                <div class="col-md-12 add_div">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                    <h6 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                        <?= cut_string($hash_one['business_name'],16,'...') ?>        
                                    </h6>
                                    <p style="text-align: left; margin: 0 2px; font-size: 15px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 15px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 15px;">
                                        <i class="fa fa-map-marker"></i> 
                                        <?= cut_string($hash_one['address'],22,'...') ?>  
                                    </p>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                    <?php if($this->shop_model->listing_ad('3')){ $hash_one = $this->shop_model->listing_ad('3')[0]; ?>
                        <div class="col-md-4">
                            <a href="<?= $hash_one['link'] ?>" target="_blank">
                                <div class="col-md-12 add_div">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $hash_one['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                    <h6 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                        <?= cut_string($hash_one['business_name'],16,'...') ?>        
                                    </h6>
                                    <p style="text-align: left; margin: 0 2px; font-size: 15px;">
                                        <i class="fa fa-phone"></i> <?= $hash_one['mobile'] ?>
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 15px;">
                                        <i class="fa fa-info-circle"></i> 
                                        <?= cut_string($hash_one['intro'],22,'...') ?>  
                                    </p>
                                    <p style="text-align: left; margin: 0 2px; font-size: 15px;">
                                        <i class="fa fa-map-marker"></i> 
                                        <?= cut_string($hash_one['address'],22,'...') ?>  
                                    </p>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                
                <div class="row light-bg detail-options-wrap" style="min-height: 500px;">
                    <?php foreach ($shop as $key => $value) { ?>
                        <div class="col-sm-6 col-lg-12 col-xl-6 featured-responsive">
                            <div class="featured-place-wrap">
                                <a href="<?= base_url() ?>shop/shop_detail/<?= $value['id'] ?>">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/shop/<?= $value['photo'] ?>" class="img-fluid" alt="#">
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
                                            <li><span class="icon-screen-smartphone"></span>
                                                <p><?= $value['mobile'] ?></p>
                                            </li>
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
            
            <div class="col-md-5 responsive-wrap map-wrap">
                <div class="map-fix">
                    <div id="map" data-lat="40.674" data-lon="-73.945" data-zoom="14"></div>
                </div>
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
<!-- Map JS (Please change the API key below. Read documentation for more info) -->
<script src="https://maps.googleapis.com/maps/api/js?callback=myMap&key=AIzaSyDMTUkJAmi1ahsx9uCGSgmcSmqDTBF9ygg"></script>