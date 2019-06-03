<style type="text/css">
	.img-height
	{
		height: 200px;
	}
</style>

<section class="main-block light-bg">
    <div class="container">
		<div class="row">

			<?php if($shop){ foreach ($shop as $key => $value) { ?>
			    
			    <div class="col-md-4 featured-responsive">
			        <div class="featured-place-wrap">
			            <a href="<?= base_url() ?>shop/shop_detail/<?= $value['id'] ?>">
			            	
			            	<?php if($value['photo'] == ''){ ?>
			            		<img src="<?= base_url() ?>/no_image.png" class="img-height img-fluid" alt="#">
			            	<?php } else{ ?>
			            		<img src="<?= $this->config->config['admin_url'] ?>uploads/shop/<?= $value['photo'] ?>" class="img-height img-fluid" alt="#">
			            	<?php } ?>
                            <span class="featured-rating-orange">6.5</span>
                            <div class="featured-title-box">
                                <h6><?= $value['shop_name'] ?></h6>
                                <p>Shop </p> <span>• </span>
                                <p>Reviews</p> <span> • </span>
                                <p><span>$$$</span>$$</p>
                                <ul>
                                	<li><span class="icon-key"></span>
                                        <p><?= 'SH000'.$value['id'] ?></p>
                                    </li>
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
				
			<?php } } else { ?>
					<div class="container">
                        <h1 style="color: black;text-align: center;">Result Not Found</h1>
                    </div>
			<?php } ?>
		</div>
	</div>
</section>