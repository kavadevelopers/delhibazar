<style type="text/css">
.color-red{ color : red;font-weight:bold; }

.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    display: none;
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
<link rel="stylesheet" href="<?= base_url() ?>zoom/css/foundation.css" />
<link rel="stylesheet" href="<?= base_url() ?>zoom/css/normalize.css" />
<script src="<?= base_url() ?>zoom/js/vendor/modernizr.js"></script>
<script src="<?= base_url() ?>zoom/js/vendor/jquery.js"></script>
<!-- xzoom plugin here -->
<script type="text/javascript" src="<?= base_url() ?>zoom/xzoom.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>zoom/css/xzoom.css" media="all" /> 
<script type="text/javascript" src="<?= base_url() ?>zoom/hammer.js/1.0.5/jquery.hammer.min.js"></script>  
<link type="text/css" rel="stylesheet" media="all" href="<?= base_url() ?>zoom/fancybox/source/jquery.fancybox.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?= base_url() ?>zoom/magnific-popup/css/magnific-popup.css" />
<script type="text/javascript" src="<?= base_url() ?>zoom/fancybox/source/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?= base_url() ?>zoom/magnific-popup/js/magnific-popup.js"></script>  

<script src="<?= base_url() ?>zoom/js/foundation.min.js"></script>
<script src="<?= base_url() ?>zoom/js/setup.js"></script>
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

								<!-- <div class="carousel-item active">
									<img class="d-block w-100" src="<?= base_url() ?>admin/uploads/product/<?= $product_image[0]['image'] ?>" alt="First slide">
								</div> -->

								<div class="xzoom-container">
						          <img class="xzoom5" id="xzoom-magnific" src="<?= base_url() ?>admin/uploads/product/no-image.png" xoriginal="<?= base_url() ?>admin/uploads/product/no-image.png" />
						          <div class="xzoom-thumbs">
						            <a href="<?= base_url() ?>admin/uploads/product/no-image.png">
						            	<img class="xzoom-gallery5" width="80" src="<?= base_url() ?>admin/uploads/product/no-image.png"  xpreview="<?= base_url() ?>admin/uploads/product/no-image.png" title="">
						            </a>
						          </div>
						        </div>

							<?php } else { ?>

								

								<div class="xzoom-container">
						          <img class="xzoom5" id="xzoom-magnific" src="<?= base_url() ?>admin/uploads/product/no-image.png" xoriginal="<?= base_url() ?>admin/uploads/product/no-image.png" />
						          <div class="xzoom-thumbs">
						            <a href="<?= base_url() ?>admin/uploads/product/no-image.png">
						            	<img class="xzoom-gallery5" width="80" src="<?= base_url() ?>admin/uploads/product/no-image.png"  xpreview="<?= base_url() ?>admin/uploads/product/no-image.png" title="">
						            </a>
						          </div>
						        </div>

							<?php } ?>

							<div class="xzoom-container">
					          <img class="xzoom5" id="xzoom-magnific" src="images/gallery/preview/01_b_car.jpg" xoriginal="images/gallery/original/01_b_car.jpg" />
					          <div class="xzoom-thumbs">
					            <a href="images/gallery/original/01_b_car.jpg">
					            	<img class="xzoom-gallery5" width="80" src="images/gallery/thumbs/01_b_car.jpg"  xpreview="images/gallery/preview/01_b_car.jpg" title="">
					            </a>
					          </div>
					        </div> 

							
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
					
					<form method="post" id="add_to_cart" action="<?= base_url() ?>cart/add_to_cart">
						<div class="product_count" style="margin: 5px;">
							<label for="qty">Quantity:</label>
							<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty" readonly>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
						</div><br>
						<span class="color-red" id="qty_span"></span>
						<div class="card_area">
							<?php if($this->session->userdata('id')) { ?>
								<button type="submit" class="main_btn btn btn-sm">Add to Cart</button>
							<?php } else { ?>
								<button type="submit" class="main_btn btn btn-sm" onclick="return guest_click()">Add to Cart</button>
							<?php } ?>
						</div>
						<input type="hidden" name="user_id" value="<?= $this->session->userdata('id') ?>">
						<input type="hidden" name="product_hash" value="<?= $this->uri->segment('3') ?>">

					</form>
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
			<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
			</li>
			
			<li class="nav-item">
			<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				<p><?= nl2br($product[0]['desc']) ?></p>
			</div>
			
			<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
				<div class="row">
					<div class="col-lg-6">
						<div class="row total_rate">
							<div class="col-6">
								<div class="box_total">
									<h5>Overall</h5>
									<h4><?= round($avarage_rating[0]['average'],1) ?></h4>
									<h6>(<?php if(count($product_review) <= 9) { echo '0'.count($product_review); } else { echo count($product_review); } ?> Reviews)</h6>
								</div>
							</div>
							<div class="col-6">
								<div class="rating_list">
									<h3>Based on <?php if(count($product_review) <= 9) { echo '0'.count($product_review); } else { echo count($product_review); } ?> Reviews</h3>
									<ul class="list">
										<li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <?= $star_5; ?></a></li>
										<li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i> <?= $star_4; ?></a></li>
										<li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> <?= $star_3; ?></a></li>
										<li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> <?= $star_2; ?></a></li>
										<li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> <?= $star_1; ?></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="review_list">

							<?php if($product_review) {  ?>
								
								<?php foreach ($this->rating_model->product_review_list_with_limit($product_review[0]['hash'],5,0) as $key => $value) { 
									$user = $this->rating_model->user_where($value['user_id'])[0];
								?>
									
									<div class="review_item">
										<div class="media">
											<div class="d-flex">
												<img src="<?= base_url() ?>image/social_user_uploads/<?= $user['image'] ?>" alt="" style="height: 50px;width: 50px;border-radius: 25px;">
											</div>
											<div class="media-body">
												<h4><?= $user['first_name'].' '.$user['last_name']; ?>

													<?php if($this->session->userdata('id')){ ?>
	                                					<?php if($this->session->userdata('id') == $value['user_id']){ ?>
													
														<a class="pull-right" id="edit_button" href="javascript:;" data-review="<?= $value['review'] ?>" data-rating="<?= $value['rating'] ?>" data-hash="<?= $value['hash'] ?>" data-id="<?= $value['id'] ?>"><i class="fa fa-pencil text-dark"></i></a>

													<?php } } ?>

												</h4>
												<?= product_rating_star($value['rating']) ?>
											</div>
										</div>
										<p><?= nl2br($value['review']) ?></p>
									</div>

								<?php } ?>
							<?php } else { ?>
								<div class="review-item" style="border-radius: 8px;border: 1px solid #e8f0f2;box-shadow: 5px 10px #e8f0f2;">
									<h5 class="text-center" style="padding: 20px;">No Review</h5>
								</div>
							<?php } ?>

							<div id="other"></div>
		                    <div class="customer-review_wrap text-center">
		                        <?php if(count($product_review) > 5){ ?>
		                            <button type="button" class="btn btn-sm btn-default" id="load_more" style="cursor: pointer;"><span id="but_main">Load more</span> <span id="load" style="display: none;"><i class='fa fa-circle-o-notch fa-spin'></i> Loding</span></button>
		                        <?php } ?>
		                    </div>

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

<form class="row contact_form" action="<?= base_url() ?>products/edit_review" method="post" id="edit_ReviewForm" novalidate="novalidate">
	<div class="modal fade" id="edit_review" data-keyboard="false" data-backdrop="static" role="dialog">
        <div class="modal-dialog">
          	<div class="modal-content">
          		<!-- Modal Header -->
	            <div class="modal-header">
		            <h2 class="text-dark">Edit a Review</h2>
		            <button type="button" class="close" data-dismiss="modal" style="cursor: pointer;">&times;</button>
	            </div>

	            <!-- Modal body -->
	            <div class="container text-dark">
                	<p class="font-weight-bold" style="margin:5px;">Rating</p>
					<div class="rate">
						<input type="radio" id="edit_star5" name="edit_rating" value="5" />
				        <label for="edit_star5" title="rating">5 stars</label>
				        <input type="radio" id="edit_star4" name="edit_rating" value="4" />
				        <label for="edit_star4" title="rating">4 stars</label>
				        <input type="radio" id="edit_star3" name="edit_rating" value="3" />
				        <label for="edit_star3" title="rating">3 stars</label>
				        <input type="radio" id="edit_star2" name="edit_rating" value="2" />
				        <label for="edit_star2" title="rating">2 stars</label>
				        <input type="radio" id="edit_star1" name="edit_rating" value="1" />
				        <label for="edit_star1" title="rating">1 star</label>
					</div>
				</div><br>
                <p class="color-red" id="edit_rating_span"></p>

                <div class="modal-body">
	                <div class="form-group">
	                    <label class="font-weight-bold text-dark">Review</label>
	                    <textarea class="form-control" type="text" name="edit_review" id="edit_product_review" placeholder="Review" style="height: unset;resize: vertical !important;"></textarea>
						<span class="color-red" id="edit_review_span"></span>
	                </div>
	            </div>

	            <!-- Modal footer -->
	            <div class="modal-footer">
	            	<button type="submit" class="btn btn-success" style="cursor: pointer;">Save</button>
	            </div>
			</div>
		</div>
	</div>
	<input type="hidden" id="edit_hash" name="edit_hash">
	<input type="hidden" id="edit_id" name="edit_id">
	
</form>

<input type="hidden" id="load_more_record" value="5">
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

	// Put value in edit rating modal
    $(document).delegate('#edit_button','click',function(){
		$('#edit_review').modal('show');
        $('#edit_product_review').val($(this).data('review'));
        $("input[name=edit_rating][value=" + $(this).data('rating') + "]").prop('checked', true);
        $('#edit_hash').val($(this).data('hash'));
        $('#edit_id').val($(this).data('id'));
    });

    // ADD TO CART PRODUCT VALIDATION
    
	$("#add_to_cart").submit(function(){
		var qty    	  = $('#sst').val();
	
		if(qty == '' || qty == 0){
			$('#qty_span').html("Quantity is required");
        	$('#qty_span').fadeIn();
        	return false;
        }
        else{
            $('#qty_span').fadeOut();
        }
    });

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


	$("#edit_ReviewForm").submit(function(){
    	var review    = $('#edit_product_review').val();
        var rating    = $("input[name='edit_rating']:checked").val();
        var blank     = 0;
        
        // Review Validation
        if(review == ''){
            $('#edit_review_span').html("Review is required");
            blank = 1;
            $('#edit_review_span').fadeIn();
        }
        else{
            $('#edit_review_span').fadeOut();
        }

        // Rating Validation
        if(!rating){
            $('#edit_rating_span').html("Rating is required");
            blank = 1;
            $('#edit_rating_span').fadeIn();
        }
        else{
            $('#edit_rating_span').fadeOut();
        }

        if(blank == 1){
            return false;
        }
    });

    
});


// Load More Button 
$('#load_more').click(function(e){
    e.preventDefault();
    var record  	=    $('#load_more_record').val();
    var product_id  =    '<?= $product[0]['id'] ?>';
    
        $.ajax({
            type : "post",
            url : "<?= base_url() ?>products/load_more",
            data : "record="+record+"&product_id="+product_id,
            cache : false,
            dataType: "json",
            beforeSend: function() {
                $('#load').show();
                $('#but_main').hide();
            },
            success:function( out ){
                setTimeout(function(){
                    $('#other').append(out[1]);
                    $('#load_more_record').val(parseFloat($('#load_more_record').val()) + parseFloat(out[0]));
                    
                    if($('#load_more_record').val() == out[2])
                    {
                        $('#load_more').fadeOut();
                    }

                    $('#load').hide();
                    $('#but_main').show();

                }, 2000);
            }
        });
});

</script>