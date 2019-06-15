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
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Product</th>
							<th scope="col">Price</th>
							<th scope="col">Quantity</th>
							<th scope="col">Total</th>
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
											<img src="<?= $this->config->config['admin_url'] ?>uploads/product/<?= $product_img['image'] ?>" alt="" height="70px">
										</div>
										<div class="media-body">
											<p><?= $product['name'] ?></p>
										</div>
									</div>
								</td>
								<td>
									<input class="border-unset amount" type="text" id="amount<?= $val ?>" name="amount" value="<?= $product['amount'] ?>" readonly>
								</td>
								<td>
									<div class="product_count">
										<input type="text" name="qty" id="sst<?= $val ?>" maxlength="12" value="<?= $value['qty'] ?>" title="Quantity:" class="input-text qty" readonly>
										<button onclick="var result = document.getElementById('sst<?= $val ?>'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="qty increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
										<button onclick="var result = document.getElementById('sst<?= $val ?>'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="qty reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
									</div>
								</td>
								<td>
									<input class="border-unset total" type="text" id="total<?= $val ?>" name="total" value="<?= floatval($product['amount'] * $value['qty']) ?>" readonly>
								</td>
							</tr>	

						<?php } ?>
						
						
						<tr class="bottom_button">
							<td>
								<a class="gray_btn" href="<?= base_url() ?>cart/update_cart">Update Cart</a>
							</td>
							<td>
								
							</td>
							<td>
								
							</td>
							<td>
								<div class="cupon_text">
									<input type="text" placeholder="Coupon Code">
									<a class="main_btn" href="#">Apply</a>
									<a class="gray_btn" href="#">Close Coupon</a>
								</div>
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
								<input type="text" class="subtotal border-unset form-control form-control-sm" name="subtotal" value="" readonly>
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
									<a class="gray_btn" href="#">Continue Shopping</a>
									<a class="main_btn" href="#">Proceed to checkout</a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<style type="text/css">
	.border-unset
	{
		border: unset;
	}
</style>
<!--================End Cart Area =================-->

<script type="text/javascript">
	$( document ).ready(function() {
		update_amounts();
	});

	$('.qty').click(function(){
		update_amounts();
	})

	function update_amounts()
	{
	    var sum = 0.0;
	    $('.table > tbody  > tr').each(function() {
	        var qty 	= parseFloat($(this).find('.qty').val());
	        var price 	= parseFloat($(this).find('.amount').val());
	        var amount 	= (qty*price);
	        sum+=amount;
	        $(this).find('.total').val(''+amount);
	        $('.subtotal').val(sum);
	    });
	    
	}
</script>