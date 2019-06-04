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
                
                <div class="row light-bg detail-options-wrap" style="min-height: 500px;">
                    <?php foreach ($shop as $key => $value) { ?>
                        <div class="col-sm-6 col-lg-12 col-xl-6 featured-responsive">
                            <div class="featured-place-wrap">
                                <a href="<?= base_url() ?>shop/shop_detail/<?= $value['id'] ?>">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/shop/<?= $value['photo'] ?>" class="img-fluid" alt="#">
                                    <span class="featured-rating-orange" style="padding: 13px 5px;"><?= round($this->rating_model->get_avarage_rating($value['id'])[0]['average'],1) ?></span>
                                    <div class="featured-title-box">
                                        <h6><?= $value['shop_name'] ?></h6>
                                        <p><?= $this->rating_model->count_review($value['id']) ?> Reviews</p>
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