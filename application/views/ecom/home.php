<style type="text/css">
	#widgets_inner::-webkit-scrollbar {
      width: 10px;
	}
	 
	#widgets_inner::-webkit-scrollbar-track {
	    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	    border-radius: 10px;
	}
	 
	#widgets_inner::-webkit-scrollbar-thumb {
	  background-color: #ffc107;
	  border-radius: 10px;
	  outline: 1px solid slategrey;
	}
</style>

<section class="home_banner_area">
    <div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="row" style="margin-top: 12%;">
				<div class="col-lg-4" style="margin-bottom: 10px">
					<div class="left_sidebar_area">
						<aside class="left_widgets cat_widgets">
							<div class="l_w_title" style="background-color: #222222">
								<h3 style="color: #ffffff;">Browse Categories</h3>
							</div>
							<div class="widgets_inner"  style="overflow-y: scroll;" id="widgets_inner">
								<ul class="list">
									<?php foreach ($this->db->get_where('main_category',['df' => '0','status' => '0'])->result_array() as $key => $value) { ?>
										<a href="<?= base_url('category/index/').$value['id'] ?>" style="color: #222222;">
										<li>
											<div class="row">
												<div class="col-md-3 text-center" style="margin-bottom: 5px;">
													<img src="<?= get_category_image($value['id']) ?>" style="width: 35px;">		
												</div>
												<div class="col-md-9 center_main">
													<?= $value['name'] ?>
												</div>
											</div>
										</li>	
										</a>
									<?php } ?>							
								</ul>
							</div>
						</aside>
					</div>
				</div>

				<div class="col-lg-8" style="margin-bottom: 10px">
					<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
					  	
					  	<ol class="carousel-indicators">
					  		<?php foreach (get_home_banners() as $key => $value) { ?>

						   	 	<li data-target="#carousel-example-1z" data-slide-to="<?= $key ?>" class="<?= ($key == 0)?'active':''; ?>"></li>
						  
						    <?php } ?>
					  	</ol>

					  	<div class="carousel-inner" role="listbox">
					    	
					    <?php foreach (get_home_banners() as $key => $value) { ?>
					    	
					    	<div class="carousel-item <?= ($key == 0)?'active':''; ?>">
						      	<img class="d-block w-100" src="<?= $value ?>"
						        alt="">
						    </div>

					    <?php } ?>
						   
					  	</div>
						
					  	<a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
					    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    	<span class="sr-only">Previous</span>
					  	</a>
					  	<a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
					    	<span class="carousel-control-next-icon" aria-hidden="true"></span>
					    	<span class="sr-only">Next</span>
					  	</a>
					</div>
				</div>
			</div>
		</div>
    </div>
</section>

<!--================Feature Product Area =================-->
        <section class="feature_product_area">
        	<div class="main_box">
				<div class="container">
					<div class="feature_product_inner">
						<div class="main_title">
							<h2>Featured Products</h2>
						</div>
						<div class="feature_p_slider owl-carousel">

							<?php 	
									$this->db->where('status','1');
            						$this->db->where('df','0');
            						$this->db->where('featured','1');
            						foreach($this->db->get('product')->result_array() as $key => $value){
            				?>

								<div class="item">
									<div class="f_p_item">
										<div class="f_p_img">
											<img class="img-fluid" src="<?= _product_banner($value['id']) ?>" alt="">
											<div class="p_icon">
												
											</div>
										</div>
										<a href="<?= base_url() ?>products/product_detail/<?= $value['hash'] ?>">
											<h4><?= $value['name'] ?></h4>
										</a>
										<?php if(!empty($value['list_price'])){ ?>
											<h5 style="text-decoration: line-through; font-size: 12px;">₹<?= $value['list_price'] ?><h5>
										<?php } ?>
										<h5>₹<?= $value['amount'] ?></h5>
									</div>
								</div>

							<?php } ?>
							
						</div>
					</div>
				</div>
        	</div>
        </section>
<!--================End Feature Product Area =================-->

<!--================Deal Timer Area =================-->
        <section class="timer_area">
        	<div class="container">
        		<div class="main_title">
        			
        		</div>
        		<div class="timer_inner">

				</div>
        	</div>
        </section>
<!--================End Deal Timer Area =================-->


<!--================Latest Product Area =================-->
        <section class="feature_product_area latest_product_area">
        	<div class="main_box">
				<div class="container">
					<div class="feature_product_inner">
						<div class="main_title">
							<h2>Latest Products</h2>
						</div>
						<div class="latest_product_inner row">
							
							<?php 	
									$this->db->order_by('id','DESC');
									$this->db->limit(8);
									$this->db->where('status','1');
            						$this->db->where('df','0');
            						foreach($this->db->get('product')->result_array() as $key => $value){
            				?>

								<div class="col-lg-3 col-md-4 col-sm-6">
									<div class="f_p_item">
										<div class="f_p_img">
											<img class="img-fluid" src="<?= _product_banner($value['id']) ?>" alt="">
											<div class="p_icon">
												
											</div>
										</div>
										<a href="<?= base_url() ?>products/product_detail/<?= $value['hash'] ?>">
											<h4><?= $value['name'] ?></h4>
										</a>
										<?php if(!empty($value['list_price'])){ ?>
											<h5 style="text-decoration: line-through; font-size: 12px;">₹<?= $value['list_price'] ?><h5>
										<?php } ?>
										<h5>₹<?= $value['amount'] ?></h5>
									</div>
								</div>

							<?php } ?>

						</div>
					</div>
				</div>
        	</div>
        </section>
<!--================End Latest Product Area =================-->



<script type="text/javascript">
	$(function(){
		$('.carousel').carousel({
		  interval: 3000
		})
	})
</script>

<style type="text/css">
	.home_banner_area {
	    min-height: auto;
	}

	@media (min-width: 1100px){
		.home_banner_area .banner_inner {
		    min-height: 700px;
		}
	}

	.widgets_inner {
	    height: 341px;
	}

	.center_main{
        display: flex;
        align-items: center;
    }

    
</style>