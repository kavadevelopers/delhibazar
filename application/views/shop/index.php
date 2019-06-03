<section>
    <div class="container-fluid">
        <?php if($shop){ ?>
        <div class="row">
            <div class="col-md-7 responsive-wrap">
                <div class="row detail-filter-wrap">
                    <div class="col-md-4 featured-responsive">
                        <div class="detail-filter-text">
                            <p><?= count($shop); ?> Results For <span>Shops</span></p>
                        </div>
                    </div>
                </div>
                
                <div class="row light-bg detail-options-wrap">
                    <?php foreach ($shop as $key => $value) { ?>
                        <div class="col-sm-6 col-lg-12 col-xl-6 featured-responsive">
                            <div class="featured-place-wrap">
                                <a href="detail.html">
                                    <img src="<?= $this->config->config['admin_url'] ?>uploads/shop/<?= $value['photo'] ?>" class="img-fluid" alt="#">
                                    <span class="featured-rating-orange ">6.5</span>
                                    <div class="featured-title-box">
                                        <h6><?= $value['shop_name'] ?></h6>
                                        <p>Shop </p> <span>• </span>
                                        <p>3 Reviews</p> <span> • </span>
                                        <p><span>$$$</span>$$</p>
                                        <ul>
                                            <li><span class="icon-location-pin"></span>
                                                <p><?= $value['address'] ?></p>
                                            </li>
                                            <li><span class="icon-screen-smartphone"></span>
                                                <p><?= $value['mobile'] ?></p>
                                            </li>
                                        </ul>
                                        <div class="bottom-icons">
                                            <div class="closed-now">CLOSED NOW</div>
                                            <span class="ti-heart"></span>
                                            <span class="ti-bookmark"></span>
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
    <?php } else { ?>
        <div class="container text-center" style="padding : 70px 0;">
            <div class="detail-filter-text" style="padding: 40px 0;">
                <h5><?= count($shop); ?> Results For <span>Shops</span></h5>
            </div>
            <h1 style="color: black;text-align: center;">Result Not Found</h1>
        </div>
    <?php } ?>
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