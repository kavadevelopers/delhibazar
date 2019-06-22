 <!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2><?= $category[0]['name'] ?></h2>
			</div>
		</div>
    </div>
</section>
<!--================End Home Banner Area =================-->


<!--================Category Product Area =================-->
<section class="cat_product_area p_120">
	<div class="container">
		<div class="row flex-row-reverse">
			<div class="col-lg-9">
				<div class="product_top_bar">
					<div class="left_dorp">
						
					</div>
					<div class="right_page ml-auto">
						<nav class="cat_page" aria-label="Page navigation example">
							<ul class="pagination">
								<?= $this->pagination->create_links(); ?>
								
							</ul>
						</nav>
					</div>
				</div>
				<div class="latest_product_inner row">
					<?php if(!empty($products)) { ?>
						<?php foreach ($products as $key => $value) { 

						$product_image = $this->product_model->product_image_where($value['id']);
						?>
							

							<div class="col-lg-4 col-md-4 col-sm-6">
								<div class="f_p_item">
									<div class="f_p_img">
										
										<?php if(!empty($product_image)) { ?> 

											
												<img class="img-fluid" src="<?= base_url() ?>admin/uploads/product/<?= $this->product_model->product_image_where($value['id'])[0]['image'] ?>" alt="Product Image">
											
										<?php } else { ?>

											<img class="img-fluid" src="<?= base_url() ?>admin/uploads/product/no-image.png" alt="Product Image">

										<?php } ?>

										<div class="p_icon">
											<?php if($this->session->userdata('id')){ ?>
												<a href="<?= base_url().'products/add_to_cart/?hash='.$value['hash'].'&uri='.base_url(uri_string()) ?>">
													<i class="lnr lnr-cart"></i>
												</a>
											<?php }else{ ?>
												<a href="#" onclick="return guest_click()"><i class="lnr lnr-cart"></i></a>
											<?php } ?>
										</div>
									</div>
									<a href="<?= base_url() ?>products/product_detail/<?= $value['hash'] ?>"><h4><?= $value['name'] ?></h4></a>
									<h5><?= $value['amount'] ?></h5>
								</div>
							</div>

						<?php } } else { ?>
							
							<div class="col-md-12 text-center">
								<div class="f_p_item" style="background-color: #e8f0f2;padding: 25px;font-style: oblique;box-shadow: 3px 2px;">
									<h5>Product not available visit few hour again </h5>
								</div>
							</div>

						<?php } ?>

				</div>
			</div>
			<div class="col-lg-3">
				<div class="left_sidebar_area">
					<aside class="left_widgets cat_widgets">
						<div class="l_w_title">
							<h3>Browse Categories</h3>
						</div>
						<div class="widgets_inner">
							<ul class="list">
								<?php foreach ($dynamic_category as $key => $value) { ?>
									
								<li><a href="<?= base_url() ?>products/list/<?= $value['id'] ?>"><?= $value['name'] ?></a></li>

								<?php } ?>
								
								
							</ul>
						</div>
					</aside>
					<aside class="left_widgets p_filter_widgets">
						<div class="widgets_inner">
							<h4>Price</h4>
							<div class="range_item">
								<div id="slider-range"></div>
								<div class="row m0">
									<label for="amount">Price : </label>
										<input type="text" id="amount" readonly style="width: 150px;">
										<input type="hidden" id="min" name="min" value="">
										<input type="hidden" id="max" name="max" value="">
								</div>
								<div class="col-md-12 text-center" style="margin-top: 20px;">
									<button type="button" id="filter" class="btn submit_btn">Filter</button>
								</div>
							</div>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Category Product Area =================-->

<style type="text/css">
	.pagination li a
	{
		position: relative;
    	display: block;
    	border: 1px solid #ddd;
	}

</style>

<script type="text/javascript">
	function guest_click()
	{
	    swal("Cancelled", "Please Login First", "error");
	    return false;
	}
	$(function(){
		$('#filter').click(function(){
			$.ajax({
                type : "post",
                url : "<?= base_url() ?>products/set_filter",
                data : "min="+$('#min').val()+"&max="+$('#max').val(),
                cache : false,
                success:function( out ){
                	window.location = '<?= base_url(uri_string()); ?>';
                }
            });

		})

		<?php if($this->session->userdata('filter')){ ?>
			var min = <?= $this->session->userdata('filter')['min'] ?>;
			var max = <?= $this->session->userdata('filter')['max'] ?>;
		<?php }else{ ?>
			var min = 10;
			var max = 50000;
		<?php } ?>
		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 50000,
	      	values: [ min, max ],
	      	slide: function( event, ui ) {
	        	$( "#amount" ).val( "₹" + ui.values[ 0 ] + " ₹" + ui.values[ 1 ] );
	            $('#min').val(ui.values[ 0 ]);
	            $('#max').val(ui.values[ 1 ]);
	      	}
	    });

		$( "#amount" ).val( "₹" + $( "#slider-range" ).slider( "values", 0 )+
      "   ₹" + $( "#slider-range" ).slider( "values", 1 ) );

	    $('#min').val($( "#slider-range" ).slider( "values", 0 ));
	    $('#max').val($( "#slider-range" ).slider( "values", 1 ));
	})
</script>