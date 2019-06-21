<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>Product Checkout</h2>
			</div>
		</div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Checkout Area =================-->
<section class="checkout_area p_120">
	<div class="container">
		<!-- <div class="cupon_area">
			<div class="check_title">
				<h2>Have a coupon? <a href="#">Click here to enter your code</a></h2>
			</div>
			<input type="text" placeholder="Enter coupon code">
			<a class="tp_btn" href="#">Apply Coupon</a>
		</div> -->

		<form class="contact_form" id="checkout_form" action="<?= base_url() ?>pay" method="post">

			<div class="billing_details">
				<div class="row">
					<div class="col-lg-8">
						<h3>Billing Details</h3>
						<div class="row">	
							<div class="col-md-5 form-group p_star">
								<label>First Name</label>
								<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
							</div>
							<div class="col-md-5 form-group p_star">
								<label>Last Name</label>
								<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
							</div>
							<div class="col-md-5 form-group p_star">
								<label>Mobile</label>
								<input type="text" class="form-control" id="number" name="number" placeholder="Mobile">
							</div>
							<div class="col-md-5 form-group p_star">
								<label>Email</label>
								<input type="text" class="form-control" id="email" name="email" placeholder="Email">
							</div>
							
							<div class="col-md-5 form-group p_star">
								<label>Country</label>
								<input type="text" class="form-control" id="country" name="country" placeholder="Country">
							</div>
							<div class="col-md-5 form-group p_star">
								<label>City</label>
								<input type="text" class="form-control" id="city" name="city" placeholder="City">
							</div>
							<div class="col-md-5 form-group p_star">
								<label>District</label>
								<input type="text" class="form-control" id="district" name="district" placeholder="District">
							</div>
							<div class="col-md-5 form-group p_star">
								<label>Postcode/ZIP</label>
								<input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP">
							</div>
							<div class="col-md-12 form-group p_star">
								<label>Address1</label>
								<input type="text" class="form-control" id="add1" name="add1" placeholder="Address1">
							</div>
							<div class="col-md-12 form-group p_star">
								<label>Address2</label>
								<input type="text" class="form-control" id="add2" name="add2" placeholder="Address2">
							</div>
							<!-- <div class="col-md-12 form-group">
								<div class="creat_account">
									<h3>Shipping Details</h3>
									<input type="checkbox" id="f-option3" name="selector">
									<label for="f-option3">Ship to a different address?</label>
								</div>
								<textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
							</div> -->
						</div>
						
					</div>
					<div class="col-lg-4">
						<div class="order_box">
							<h2>Your Order</h2>
							<ul class="list">
								<li><a href="#">Product <span>Total</span></a></li>
								<?php $val = 0; foreach ($user_product as $key => $value) { 
									$val++;
									$product  = $this->product_model->product_id_where($value['product_id'])[0];
								?>
									<li><a href="#"><?= $product['name'] ?> <span class="middle">x <?= $value['qty'] ?></span><span class="last"><?= ($product['amount'] * $value['qty']) ?></span></a></li>
									
									<input type="hidden" name="product_id[]" value="<?= $product['id']  ?>">
									<input type="hidden" name="product_name[]" value="<?= $product['name']  ?>">
									<input class="quantity" type="hidden" id="qty<?= $val ?>" name="qty[]" value="<?= $value['qty']  ?>">
									<input type="hidden" id="amount<?= $val ?>" value="<?= $product['amount'] ?>">
									<input type="hidden" name="cart_tbl_id[]" value="<?= $value['id'] ?>">
								<?php } ?>
							</ul>
							<ul class="list list_2">
								<li><a href="#">Subtotal <span class="pull-right sub_total_text"></span></a></li>
								<!-- <li><a href="#">Shipping <span>Flat rate: ₹50.00</span></a></li> -->
								<li><a href="#">Total <span class="grand_total_text"></span></a></li>
							</ul>
							
							<div class="form-group">
								<input type="checkbox" id="f-option4" name="selector" required>
								<label for="f-option4" style="padding-right: 5px;">I’ve read and accept the </label>
								<a href="#">terms & conditions*</a>
							</div>
							<div class="text-center">
								<button class="main_btn" type="submit" style="display: inline;">Proceed to Pay</button>
							</div>
						</div>
						<input type="hidden" name="user_id" value="<?= $this->session->userdata('id') ?>">
						<input class="sub_total_hidd" type="hidden" name="subtotal">
						<input type="hidden" id="grand_total" name="grand_total" >
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
<!--================End Checkout Area =================-->
<style type="text/css">
	.error{ color: red;  }
	.p_star > label{ font-weight: bold; }
	.contact_form .form-group .form-control{padding-left:  3px; }
	.border-unset
	{
		background-color: #e5ecee;
		border: none  !important;
		outline: none !important;
	}
</style>
<script type="text/javascript">

update_amounts();

function update_amounts()
{
    var sum 	= 0.0;
    var count 	= $('.quantity').length;

    for(var i = 1; i <= count; i++)
    {
    	var qty 	= parseFloat($('#qty'+i).val());
        var price 	= parseFloat($('#amount'+i).val());
        var amount 	= (qty*price);
        
        sum += parseFloat(amount);
    }
    $('#sub_total_hidd').val(amount.toFixed(2));
    $('#grand_total').val((sum).toFixed(2));
    $('.sub_total_text').html(amount.toFixed(2));
    $('.grand_total_text').html((sum).toFixed(2));
}

$(document).ready(function(){
	
	$('#checkout_form').validate(
	{
		rules: {
		    	
		    first_name: {
		    	lettersonly: true,
		      	minlength: 2,
		      	required: true
		    },
		    last_name: {
		    	lettersonly: true,
		    	minlength: 2,
		      	required: true
		    },
		    email: {
		      	required: true,
		      	email: true
		    },
		    number: {
		      	minlength: 10,
		      	digits: true,
		      	maxlength: 12,
		      	required: true
		    },
		    country: {
		    	lettersonly: true,
		    	minlength: 4,
		      	maxlength: 20,
		      	required: true
		    },
		    add1: {
		      	minlength: 5,
		      	maxlength: 200,
		      	required: true,
		    },
			city: {
		    	lettersonly: true,
				minlength: 3,
		      	maxlength: 30,
		      	required: true,
		    },
		    district: {
		    	lettersonly: true,
		      	minlength: 3,
		      	maxlength: 30,
		      	required: true,
		    }
			
	  }
		  
	});
}); 
</script>