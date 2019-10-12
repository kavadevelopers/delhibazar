<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>Shopping Cart</h2>
			</div>
		</div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Cart Area =================-->
<section class="cart_area">
	<div class="container">
		<div class="cart_inner">

			<?php if($user_product) {?>
			<div class="table-responsive">
				<form method="post" id="cart_form" action="<?= base_url() ?>cart/update_cart">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php $val = 0; foreach ($user_product as $key => $value) { $val++;
								$product 	 = $this->product_model->product_id_where($value['product_id'])[0];
								$product_img = $this->product_model->product_image_where($value['product_id'])[0];
							?>
								
								<tr>
									<td>
										<div class="media">
											<div class="d-flex">
												<img src="<?= _product_banner($product['id']) ?>" alt="" height="70px">
											</div>
											<div class="media-body">
												<p><?= $product['name'] ?><?php if(!empty($value['size'])){ echo ' - '.$value['size']; } ?></p>
											</div>
										</div>
									</td>
									<td>
										<input class="border-unset amount" type="text" id="amount<?= $val ?>" name="amount[]" value="<?= $product['amount'] ?>" readonly>
									</td>
									<td>
										<div class="product_count">
											<input type="text" class="qty" name="qty[]" id="sst<?= $val ?>" maxlength="12" value="<?= $value['qty'] ?>" title="Quantity:" class="input-text qty" readonly>
											<button onclick="var result = document.getElementById('sst<?= $val ?>'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="_btn increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
											<button onclick="var result = document.getElementById('sst<?= $val ?>'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="_btn reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
										</div>
									</td>
									<td>
										<input class="border-unset total" type="text" id="total<?= $val ?>" name="total" value="<?= floatval($product['amount'] * $value['qty']) ?>" readonly>
									</td>
									<td>
										<a class="genric-btn danger small" href="<?= base_url() ?>cart/delete_product/<?= $value['id'] ?>" onclick="return confirm('Are you Sure You Want to Delete this Product .?');">Delete</a>
									</td>
									<input type="hidden" name="product_id[]" value="<?= $product['id'] ?>">

								</tr>	

							<?php } ?>
							
							
							<tr class="bottom_button">
								<td>
									<button class="btn gray_btn" type="submit" style="cursor: pointer;">Update Cart</button>
								</td>
								<td>
									
								</td>
								<td>
									
								</td>
								<td>
									<!-- <div class="cupon_text">
										<input type="text" placeholder="Coupon Code">
										<a class="main_btn" href="#">Apply</a>
										<a class="gray_btn" href="#">Close Coupon</a>
									</div> -->
								</td>
							</tr>
							<tr>
								<td>
									
								</td>
								<td>
									
								</td>
								<td>
									<h5>Subtotal</h5>
								</td>
								<td>
									<input type="text" id="grand_total" class="border-unset form-control form-control-sm" name="grand_total" value="" readonly>
								</td>
							</tr>
							<tr class="out_button_area">
								<td>
									
								</td>
								<td>
									
								</td>
								<td>
									
								</td>
								<td>
									<div class="checkout_btn_inner">
										<a class="gray_btn" href="<?= base_url() ?>">Continue Shopping</a><br><br>
										<a class="main_btn" href="<?= base_url() ?>cart/checkout">Proceed to checkout</a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>

					<input type="hidden" name="user_id" value="<?= $this->session->userdata('id') ?>">

				</form>
			</div>
			<?php } else { ?>
				<div class="col-md-12 text-center">
					<div class="f_p_item" style="background-color: #e8f0f2;padding: 25px;font-style: oblique;box-shadow: 3px 2px;">
						<h5>Your Cart is Empty</h5>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<style type="text/css">
	.border-unset
	{
		border: none  !important;
		outline: none !important;
	}
	.cart_inner .table tbody tr td .product_count .reduced {
    	bottom: 0;
	}
</style>
<!--================End Cart Area =================-->

<script type="text/javascript">



	// Total 
	update_amounts();
	
	$('._btn').click(function(){
		update_amounts();
	})

	function update_amounts()
	{
	    var sum 	= 0.0;
	    var count 	= $('.qty').length;

	    for(var i = 1; i <= count; i++)
	    {
	    	var qty 	= parseFloat($('#sst'+i).val());
	        var price 	= parseFloat($('#amount'+i).val());
	        var amount 	= (qty*price);
	        
	        sum += parseFloat(amount);
	        
	        $('#total'+i).val(amount.toFixed(2));
	    }
	    $('#grand_total').val(sum.toFixed(2));
	}
</script>