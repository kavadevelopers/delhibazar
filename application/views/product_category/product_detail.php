<style type="text/css">
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
</style>

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2><?= $product[0]['name'] ?></h2>
			</div>
		</div>
    </div>
</section>
<!--================End Home Banner Area =================-->
        
<!--================Single Product Area =================-->
<div class="product_image_area">
	<div class="container">
		<div class="row s_product_inner">
			<div class="col-lg-6">
				<div class="s_product_img">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						
						<div class="carousel-inner">

							<?php 
								$product_image = $this->product_model->product_image_where($product[0]['id']);
								if($product_image) { ?> 

								<div class="carousel-item active">
									<img class="d-block w-100" src="<?= base_url() ?>admin/uploads/product/<?= $product_image[0]['image'] ?>" alt="First slide">
								</div>

							<?php } else { ?>

								<div class="carousel-item">
									<img class="d-block w-100" src="<?= base_url() ?>admin/uploads/product/no-image.png" alt="Second slide">
								</div>

							<?php } ?>

							
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-5 offset-lg-1">
				<div class="s_product_text">
					<h3><?= $product[0]['name'] ?></h3>
					<h2>₹<?= $product[0]['amount'] ?></h2>
					<ul class="list">
						<li><a class="active" href="#"><span>Category</span> : <?= $this->product_model->category_where($product[0]['category'])[0]['name'] ?></a></li>
						<li><a href="#"><span>Availibility</span> : In Stock</a></li>
					</ul>
					<p><?=  nl2br($product[0]['short_desc']) ?></p>
					<div class="product_count">
						<label for="qty">Quantity:</label>
						<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty" readonly>
						<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
						<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
					</div>
					<div class="card_area">
						<a class="main_btn" href="#">Add to Cart</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--================End Single Product Area =================-->


<!--================Product Description Area =================-->
<section class="product_description_area">
	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
			<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
			</li>
			
			<li class="nav-item">
			<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
				<p><?= nl2br($product[0]['desc']) ?></p>
			</div>
			
			<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
				<div class="row">
					<div class="col-lg-6">
						<div class="row total_rate">
							<div class="col-6">
								<div class="box_total">
									<h5>Overall</h5>
									<h4>4.0</h4>
									<h6>(03 Reviews)</h6>
								</div>
							</div>
							<div class="col-6">
								<div class="rating_list">
									<h3>Based on 3 Reviews</h3>
									<ul class="list">
										<li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="review_list">
							<div class="review_item">
								<div class="media">
									<div class="d-flex">
										<img src="img/product/single-product/review-1.png" alt="">
									</div>
									<div class="media-body">
										<h4>Blake Ruiz</h4>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
							</div>
							<div class="review_item">
								<div class="media">
									<div class="d-flex">
										<img src="img/product/single-product/review-2.png" alt="">
									</div>
									<div class="media-body">
										<h4>Blake Ruiz</h4>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
							</div>
							<div class="review_item">
								<div class="media">
									<div class="d-flex">
										<img src="img/product/single-product/review-3.png" alt="">
									</div>
									<div class="media-body">
										<h4>Blake Ruiz</h4>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="review_box">
							
							<h4>Add a Review</h4>
							
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

							<p>Your Rating:</p>
							<p>Outstanding</p>

							

							<form class="row contact_form" action="<?= base_url() ?>product/review" method="post" id="contactForm" novalidate="novalidate">
								
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" name="review" id="message" rows="1" placeholder="Review"></textarea>
									</div>
								</div>

								<?php if($this->session->userdata('id')) { ?>
									
									<?php if($this->rating_model->product_rating_where($this->uri->segment('3'),$this->session->userdata('id'))) { ?>
										
										<div class="col-md-12 text-right">
											<button type="submit" value="submit" id="submit" onclick="allready_click()" class="btn submit_btn">Submit Now</button>
										</div>

									<?php } else { ?>
										
										<div class="col-md-12 text-right">
											<button type="submit" value="submit" id="submit" onclick="allready_click()" class="btn submit_btn">Submit Now</button>
										</div>

									<?php } ?>

																	
								<?php } else { ?> 

									<div class="col-md-12 text-right">
										<button type="submit" value="submit" id="submit" onclick="guest_click()" class="btn submit_btn">Submit Now</button>
									</div>

								<?php } ?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Product Description Area =================-->

<script type="text/javascript">

function guest_click()
{
    swal("Cancelled", "Please Login First", "error");
}

function allready_click()
{
    swal("Cancelled", "Your rating is already submited", "error");   
}
</script>