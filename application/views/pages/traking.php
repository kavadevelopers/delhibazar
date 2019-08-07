
<!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h2>Track Your Order</h2>
						<div class="page_link">
							<a href="<?= base_url(); ?>">Home</a>
							<a href="javascript:;">Order Tracking</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Contact Area =================-->
        <section class="sample-text-area">
            <div class="container">
                <div class="tracking_box_inner">
                    <?php if($this->input->get('error') && $this->input->get('error') == '1'){ ?>
                        <div class="alert alert-danger">
                            Invalid Details Please try again.
                        </div>
                    <?php } ?>
                    <p>To track your order please enter your Order ID in the box below and press the "Track Order" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                    <form class="row tracking_form" action="<?= base_url() ?>pages/traking_check" method="post" novalidate="novalidate">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="order" name="order_id" placeholder="Order ID">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control" id="email" name="email_id" placeholder="Billing Email Address">
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="btn submit_btn">Track Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--================Contact Area =================-->
