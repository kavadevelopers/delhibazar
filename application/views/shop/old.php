 <style type="text/css">
	.img-height
	{
		height: 250px;
	}
</style>
 <section class="reserve-block">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5><?= $shop[0]['shop_name'] ?></h5>
                <p><span>$$$</span>$$</p><br>
                <p class="reserve-description"><?= $shop[0]['info'] ?></p>
            </div>
		</div>
    </div>
</section>

 <section class="light-bg booking-details_wrap">
        <div class="container">
            <div class="row">
                
                <div class="col-md-8 responsive-wrap">
                    <div class="booking-checkbox_wrap">
                        <div class="booking-checkbox">

                        	<?php if($shop[0]['photo'] == ''){ ?>
			            		<img src="<?= base_url() ?>/no_image.png" class="img-responsive img-height img-fluid" alt="No image" height="200px;">
			            	<?php } else{ ?>
								<img class="img-responsive img-height img-fluid" src="<?= $this->config->config['admin_url'] ?>uploads/shop/<?= $shop[0]['photo'] ?>" />
			            	<?php } ?>

						</div>
                    </div>
                </div>

                <div class="col-md-4 responsive-wrap">
                    <div class="contact-info">
                        
                        <div class="address">
                            <span class="icon-location-pin"></span>
                            <p><?= $shop[0]['shop_name'] ?></p>
                        </div>
                        <div class="address">
                            <span class="icon-screen-smartphone"></span>
                            <p><?= $shop[0]['mobile'] ?></p>
                        </div>
                        <div class="address">
                            <span class="icon-location-pin"></span>
                            <p><?= $shop[0]['address'] ?></p>
                        </div>
                        <div class="address">
                            <span class="icon-location-pin"></span>
                            <p><?= $shop[0]['landmark'] ?></p>
                        </div>
                        <div class="address">
                            <span class="icon-clock"></span>
                            <p><?= $shop[0]['hour_operation'] ?><br>
                                <span class="open-now">OPEN NOW</span></p>
                        </div>
                        
                    </div>
                    
                </div>

            </div>
        </div>
</section>



