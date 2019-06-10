<style type="text/css">
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
									<h6>(0<?= count($product_review) ?> Reviews)</h6>
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

							<?php foreach ($product_review as $key => $value) { 
								$user = $this->rating_model->user_where($value['user_id'])[0];
							?>
								
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="<?= base_url() ?>image/social_user_uploads/<?= $user['image'] ?>" alt="" style="height: 50px;width: 50px;border-radius: 25px;">
										</div>
										<div class="media-body">
											<h4><?= $user['first_name'].' '.$user['last_name'] ?></h4>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
									<p><?= nl2br($value['review']) ?></p>
								</div>

							<?php } ?>
						</div>
							
					</div>
					<div class="col-lg-6">
						<div class="review_box">
							
							<h4>Add a Review</h4>
							<p>Your Rating:</p>
							<p>Outstanding</p>

							

							<form class="row contact_form" action="<?= base_url() ?>products/review" method="post" id="ReviewForm" novalidate="novalidate">
								
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
								</div>
								<div class="col-md-12">
		                    		<p class="color-red" id="rating_span"></p>
		                    	</div>

								<div class="col-md-12" style="padding-top: 15px;">
									<div class="form-group">
										<textarea class="form-control" name="review" id="product_review" rows="1" placeholder="Review"></textarea>
										<span class="color-red" id="review_span"></span>
									</div>
								</div>

								<?php if($this->session->userdata('id')) { ?>
									
									<?php if($this->rating_model->product_rating_where($this->uri->segment('3'),$this->session->userdata('id'))) { ?>

										<div class="col-md-12 text-right">
											<button type="submit" value="submit" id="submit" onclick="return allready_click()" class="btn submit_btn">Submit Now</button>
										</div>

									<?php } else { ?>
										
										<div class="col-md-12 text-right">
											<button type="submit" value="submit" id="submit" class="btn submit_btn">Submit Now</button>
										</div>

									<?php } ?>

																	
								<?php } else { ?> 

									<div class="col-md-12 text-right">
										<button type="submit" value="submit" id="submit" onclick="return guest_click()" class="btn submit_btn">Submit Now</button>
									</div>

								<?php } ?>

								<input type="hidden" name="product_hash" value="<?= $this->uri->segment('3') ?>">


								<input type="hidden" name="product_id" value="<?= $this->product_model->product_where($this->uri->segment('3'))[0]['id'] ?>">
								<input type="hidden" name="user_id" value="<?= $this->session->userdata('id') ?>">

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
    return false;
}

function allready_click()
{
    swal("Cancelled", "Your rating is already submited", "error");   
    return false;
}

$(document).ready(function(){
    $("#ReviewForm").submit(function(){
    	var review    = $('#product_review').val();
        var rating    = $("input[name='rating']:checked").val();
        var blank     = 0;
        
        // Review Validation
        if(review == ''){
            $('#review_span').html("Review is required");
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
});


</script>