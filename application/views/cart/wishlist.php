<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>Wish List</h2>
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
												<p><?= $product['name'] ?></p>
											</div>
										</div>
									</td>
									<td>
										<input class="border-unset amount" type="text" id="amount<?= $val ?>" name="amount[]" value="<?= $product['amount'] ?>" readonly>
									</td>
									<td>
										<a class="genric-btn danger small" href="<?= base_url() ?>cart/delete_product_wishlist/<?= $value['id'] ?>" onclick="return confirm('Are you Sure You Want to Delete this Product .?');">
											Delete
										</a>

										<a class="genric-btn danger small" href="<?= base_url() ?>cart/transferToCart/<?= $value['id'] ?>">		Add To Cart
										</a>
									</td>

								</tr>	

							<?php } ?>
							
							<tr class="out_button_area">
								<td>
									
								</td>
								<td>
									
								</td>
								<td>
									
								</td>
								<td>
									<div class="checkout_btn_inner">
										<a class="main_btn" href="<?= base_url() ?>cart/clear_wishlist" onclick="return confirm('Are you Sure You Want to Clear Wishlist .?');">Clear Wishlist</a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
			</div>
			<?php } else { ?>
				<div class="col-md-12 text-center">
					<div class="f_p_item" style="background-color: #e8f0f2;padding: 25px;font-style: oblique;box-shadow: 3px 2px;">
						<h5>Your Wish list is Empty</h5>
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