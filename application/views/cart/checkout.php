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
	
	<?php 
	$cod = 0;
	foreach ($user_product as $key => $value) {

		$product  = $this->product_model->product_id_where($value['product_id'])[0];
		if($product['cod'] == '1'){
			$cod = 1;
		}
	}


	if($cod == 1){
		$url = base_url().'pay';
	}
	else{
		$url = '#'; ?>

		<script type="text/javascript">
			$(function(){
				$('#checkout_form').submit(function(){
					if($('#dropdown_payment_type').val() == '')
					{
						$('#error_required_deop').show();
						return false;
					}
					else{
						$('#error_required_deop').hide();
					}
				});
			})
		</script>

<?php } ?>

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

		<form class="contact_form" id="checkout_form" action="<?= $url ?>" method="post">

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
							

							<div class="col-md-12 form-group p_star">
								<label>Address1</label>
								<input type="text" class="form-control" id="add1" name="add1" placeholder="Address1">
							</div>
							<div class="col-md-12 form-group p_star">
								<label>Address2</label>
								<input type="text" class="form-control" id="add2" name="add2" placeholder="Address2">
							</div>

							<div class="col-md-5 form-group p_star">
								<label>City</label>
								<input type="text" class="form-control" id="city" name="city" placeholder="City">
							</div>
							<div class="col-md-5 form-group p_star">
								<label>Postcode/ZIP</label>
								<input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP">
							</div>
                            
							<div class="col-md-5 form-group p_star">
								<label>State</label>
								<input type="text" class="form-control" id="district" name="district" placeholder="State">
							</div>
							<div class="col-md-5 form-group p_star">
								<label>Country</label>
								<input type="text" class="form-control" id="country" name="country" placeholder="Country">
							</div>
							<div class="col-md-12 form-group">
								
								<label>Order Notes</label>
								
								<textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
							</div>
						</div>
						
					</div>
					<div class="col-lg-4">
						<div class="order_box">
							<h2>Your Order</h2>
							<ul class="list">
								<li><a href="#">Description <span>Amount</span></a></li>
								<?php $val = 0; foreach ($user_product as $key => $value) { 
									$val++;
									$product  = $this->product_model->product_id_where($value['product_id'])[0];
								?>
									<li><a href="#"><?= $product['name'] ?> <span class="middle">x <?= $value['qty'] ?></span><span class="last"><?= ($product['amount'] * $value['qty']) ?></span></a></li>
									
									<input type="hidden" name="product_id[]" value="<?= $product['id']  ?>">
									<input type="hidden" name="size[]" value="<?= $value['size']  ?>">
									<input type="hidden" name="product_name[]" value="<?= $product['name']  ?>">
									<input class="quantity" type="hidden" id="qty<?= $val ?>" name="qty[]" value="<?= $value['qty']  ?>">
									<input type="hidden" id="amount<?= $val ?>" value="<?= $product['amount'] ?>">
									<input type="hidden" name="cart_tbl_id[]" value="<?= $value['id'] ?>">
									<input type="hidden" name="product_amount[]" value="<?= $product['amount'] ?>">
								<?php } ?>
							</ul>

							<ul class="list list_2">
								<li><a href="#">Subtotal <span class="pull-right sub_total_text"></span></a></li>

								<li id="coupon_li" style="display: none;">
									<a href="#">Coupon <span class="pull-right" id="coupon_text_applying"></span></a>
								</li>

								<li><a href="#">Total <span class="grand_total_text"></span></a></li>
							</ul>


							<?php if($cod == 0){ ?>
							<div class="row">
								<div class="col-md-12">
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-rupee" aria-hidden="true"></i></div>
										<div class="form-select" id="default-select">
											<select style="display: none;" onchange="payment_type(this.value);" name="dropdown_payment_type" id="dropdown_payment_type">
												<option value="">-- Select Payment Option --</option>
												<option value="1">Online Payment</option>
												<option value="0">Cash On Delivery</option>
											</select>
											<div class="nice-select" tabindex="0">
												<span class="current">-- Select Payment Option --</span>
												<ul class="list">
													<li data-value="" class="option selected focus">-- Select Payment Option --</li>
													<li data-value="1" class="option">Online Payment</li>
													<li data-value="0" class="option">Cash On Delivery</li>
												</ul>
											</div>
										</div>
										<p style="color: red; display: none;" id="error_required_deop">Please Select Payment Option</p>
									</div>
								</div>
							</div>
							<?php } ?>


							<div class="row">
								<div class="col-md-7">
									<div class="input-group-icon mt-10">
										<input type="text" class="form-control" id="coupon" name="coupon" placeholder="Coupon">
									</div>
								</div>
								<div class="col-md-5" style="display: flex; align-items: center;">
									<button class="genric-btn danger small" type="button" style="padding: 0 5px;" id="apply_coupon">
										<span id="apply_btn_text">Apply</span>
										<span id="apply_btn_spin" style="display: none;">
											<i class='fa fa-circle-o-notch fa-spin'></i>  Please Wait
										</span>
									</button>
								</div>
								<div class="col-md-12">
									<p style="color: red;font-weight: bold;display: none;" id="coupon_error">Please Enter Valid Coupon</p>
								</div>
							</div>

							<hr>
							
							<div class="form-group">
								<label for="f-option4" style="padding-right: 5px;">
									<input type="checkbox" id="f-option4" name="selector" required>
									I’ve read and accept the 
								</label>
								<a href="<?= base_url() ?>pages/terms" target="_blank">terms & conditions</a>
							</div>
							<div class="text-center"  style="margin-top: 65px;">
								<button class="main_btn" type="submit" id="place_order_button" style="display: inline;">Place Order</button>
							</div>
						</div>
						<input type="hidden" name="user_id" value="<?= $this->session->userdata('id') ?>">
						<input class="sub_total_hidd" type="hidden" name="subtotal">
						<input type="hidden" id="grand_total" name="grand_total" >
					</div>
				</div>
			</div>


			<input type="hidden" name="coupon_id" id="coupon_id">
			<input type="hidden" name="discount_amount" id="discount_amount">
			<input type="hidden" name="distype" id="distype">

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

    $('.sub_total_text').html(sum.toFixed(2));
    $('#sub_total_hidd').val(sum.toFixed(2));

    if($('#distype').val() != ''){
    	if($('#distype').val() == 'percentage'){

    		_amount_off = $('#discount_amount').val();

    		sum -= (sum * _amount_off / 100);
    	}
    	if($('#distype').val() == 'amount'){

    		_amount_off = $('#discount_amount').val();

    		sum -= _amount_off;
    	}

    	if($('#distype').val() == 'price'){

    		_amount_off = $('#discount_amount').val();

    		sum = _amount_off;
    	}
    }

    
    $('#grand_total').val((sum).toFixed(2));
    
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
				minlength: 3,
		      	maxlength: 30,
		      	required: true,
		    },
		    district: {
		      	minlength: 3,
		      	maxlength: 30,
		      	required: true,
		    }
			
	  }
		  
	});
}); 


function payment_type(val){
	var cod = '<?= base_url() ?>pay/cod';
	var pay = '<?= base_url() ?>pay';

	if(val == '0')
	{
		$('#checkout_form').attr('action',cod);
	}
	else if(val == '1'){
		$('#checkout_form').attr('action',pay);	
	}
	else{
		$('#checkout_form').attr('action','#');	
	}
}

	$(function(){
		$('#apply_coupon').click(function(){
			if($('#coupon').val() != '')
			{
				$.ajax({
		            type : "post",
		            url : "<?= base_url() ?>cart/apply_coupon",
		            data : "coupon_code="+$('#coupon').val(),
		            dataType: "json",
		            cache : false,
		            beforeSend: function() {
		                $('#apply_btn_spin').show();
		                $('#apply_btn_text').hide();
		                $('#place_order_button').attr('disabled',true);
		                $('#apply_coupon').attr('disabled',true);
		            },
		            success:function( out ){
		                setTimeout(function(){
		                    
		                    if(out[0] == 'true'){


		                    	if(out[1]['off_type'] == 'percentage'){
		                    		off = '% '+out[1]['value'];
		                    	}
		                    	else{
		                    		off = out[1]['value'];	
		                    	}

		                    	$('#apply_btn_spin').hide();
		                		$('#apply_btn_text').show();
		                    	$('#place_order_button').removeAttr('disabled');
		                		$('#apply_coupon').removeAttr('disabled');
		                		$('#coupon_error').hide();
		                		$('#coupon_text_applying').html(out[1]['code']+' - '+off);
		                		$('#coupon_li').show();

		                		$('#coupon_id').val(out[1]['id']);
		                    	$('#discount_amount').val(out[1]['value']);
		                    	$('#distype').val(out[1]['off_type']);
		                    }
		                    else{

		                    	$('#coupon_id').val('');
		                    	$('#discount_amount').val('');
		                    	$('#distype').val('');

		                    	$('#apply_btn_spin').hide();
		                		$('#apply_btn_text').show();
		                    	$('#coupon_error').show();
		                    	$('#place_order_button').removeAttr('disabled');
		                		$('#apply_coupon').removeAttr('disabled');
		                		$('#coupon_li').hide();
		                    }

		                    update_amounts();

		                }, 2000);
		            }
		        });
			}
		})
	})

</script>

<style type="text/css">
	label.error{
		width: 100% !important;
	}
</style>

