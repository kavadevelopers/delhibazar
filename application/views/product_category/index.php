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

<section class="cat_product_area p_120" style="padding-bottom: 50px; padding-top: 50px;">
	<div class="container">
		<div class="col-md-12">
			<marquee style="background: #ffc107; border-radius: 3px; color: #222222; cursor: pointer;" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="3">
				<?= $this->product_model->category_where($_cate_id)[0]['description']; ?>
			</marquee>
		</div>
	</div>
</section>

<!--================Category Product Area =================-->
<section class="cat_product_area p_120" style="padding-top: 0px; ">
	<div class="container">
		<div class="row flex-row-reverse">
			<div class="col-lg-9">
				<div class="product_top_bar">
					<div class="left_dorp">
						
					</div>
					<div class="right_page ml-auto">
						<nav class="cat_page" aria-label="Page navigation example">
							<ul class="pagination">
								<?php if(!empty($this->pagination->create_links())){ ?>
									<?= $this->pagination->create_links(); ?>
								<?php }else{ ?>
									<li style="padding: 20px;"></li>
								<?php } ?>
							</ul>
						</nav>
					</div>
				</div>

				<div class="latest_product_inner row">
					<?php if(!empty($products)) { ?>
						<?php foreach ($products as $key => $value) { 

						?>
							

							<div class="col-lg-4 col-md-4 col-sm-6">
								<a href="<?= base_url() ?>products/product_detail/<?= $value['hash'] ?>">
									<div class="f_p_item">
										<div class="f_p_img">
											

												
											<img class="img-fluid" src="<?= _product_banner($value['id']) ?>" alt="Product Image">
												
											
											<!-- <div class="p_icon">
												<?php if($this->session->userdata('id')){ ?>
													<a href="<?= base_url().'products/add_to_cart/?hash='.$value['hash'].'&uri='.base_url(uri_string()) ?>">
														<i class="lnr lnr-cart"></i>
													</a>
												<?php }else{ ?>
													<a href="#" onclick="return guest_click()"><i class="lnr lnr-cart"></i></a>
												<?php } ?>
											</div> -->
										</div>
										<a href="javascript:;"><h4><?= $value['name'] ?></h4></a>
										<?php if(!empty($value['list_price'])){ ?>
											<h5 style="text-decoration: line-through; font-size: 12px;">₹<?= $value['list_price'] ?><h5>
										<?php } ?>
										<h5>₹<?= $value['amount'] ?></h5>
									</div>
								</a>
							</div>

						<?php } } else { ?>
							
							<div class="col-md-12 text-center">
								<div class="f_p_item" style="background-color: #e8f0f2;padding: 25px;font-style: oblique;box-shadow: 3px 2px;">
									<h5>Product not available</h5>
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
                        <div class="l_w_title">
                            <h3>Product Filters</h3>
                        </div>
                        <div class="widgets_inner">
                            <h4>Order By</h4>
                            <div class="switch-wrap d-flex justify-content-between">
                                <label class="radio_pro">
                                    <input type="radio" name="order" value="id_desc">
                                    Newest
                                </label>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <label class="radio_pro">
                                    <input type="radio" name="order" value="id_asc">
                                    Oldest
                                </label>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <label class="radio_pro">
                                    <input type="radio" name="order" value="price_low">
                                    Low Price
                                </label>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between" >
                                <label class="radio_pro">
                                    <input type="radio" name="order" value="price_high">
                                    High Price
                                </label>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between" >
                                <label class="radio_pro">
                                    <input type="radio" name="order" value="rating">
                                    Rating
                                </label>
                            </div>
                        </div>
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
    .primary-radio input:checked + label {
        background: url(<?= base_url() ?>temp_1/img/primary-radio.png) no-repeat center center/cover;
        border: none;
    }
	.pagination li a
	{
		position: relative;
    	display: block;
    	border: 1px solid #ddd;
	}
    .radio_pro{
        cursor: pointer;
    }
    .f_p_item{
    	cursor: pointer;	
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
                data : "min="+$('#min').val()+"&max="+$('#max').val()+"&order="+$('input[name=order]:checked').val(),
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




        <?php if($this->session->userdata('order')){ ?>
            $("input[name=order][value='<?= $this->session->userdata("order") ?>']").prop("checked",true);
            alert(<?= $this->session->userdata("order") ?>);
        <?php }else{ ?>
            $("input[name=order][value='id_desc']").prop("checked",true);
        <?php } ?>
	})
</script>