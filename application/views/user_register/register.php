<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>Register</h2>
				<div class="page_link">
					<a href="<?= base_url() ?>">Home</a>
					<a href="<?= base_url() ?>register">Register</a>
				</div>
			</div>
		</div>
    </div>
</section>
<!--================End Home Banner Area =================-->



<section class="login_box_area p_120">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<img class="img-fluid" src="<?= base_url() ?>user_login/img/register.png" alt="">
					<div class="hover">
						<a class="main_btn" href="<?= base_url() ?>login">Login Here</a>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="login_form_inner reg_form" style="padding-top:40px;">
					<h3 style="margin-bottom: 25px !important;">Create an Account</h3>

					<form class="row login_form" action="<?= base_url() ?>register/register" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
						</div>
						<div class="col-md-12 form-group">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password">
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="c_pass" name="c_pass" placeholder="Confirm password">
						</div>
						<div class="col-md-12 form-group">
							<input type="file" class="form-control" id="image" name="image">
							<span><i><span class="astrick">Note</span> : Max size & Max Resoluion(2MB, 720 X 1080) </i></span>
						</div>
						<div class="col-md-12 form-group">
							<div class="creat_account">
								<input type="checkbox" id="f-option2" name="newsletter" value="1" style="height: auto !important; float: left; margin: 5px;">
								<label for="f-option2">Subscribe Newsletter</label>
							</div><br>
							<div class="creat_account">
								<input type="checkbox" id="f-option23" name="" value="1" style="height: auto !important; float: left; margin: 5px;" required>
								<label for="f-option23">I accept <a href="<?= base_url('pages/terms') ?>" target="_blank" style="display: inline;">terms and conditions</a></label>
							</div>
						</div>

						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="btn submit_btn">Register</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<style type="text/css">
	.astrick{ color: red; }
	input{ 
		height: 33px !important; 
	}
	.form-group {
	    margin-bottom: 9px;
	}
</style>

<script type="text/javascript">
$(document).ready(function(){

	$('#contactForm').validate(
	{
	  	rules: {
	    	first_name: {
	      	minlength: 2,
	      	required: true
	    },
	    email: {
	      	required: true,
	      	email: true
	    },
	    last_name: {
	      	minlength: 2,
	      	required: true
	    },
	    mobile: {
	      	minlength: 10,
	      	digits: true,
	      	maxlength: 12,
	      	required: true
	    },
	    password: {
	      	minlength: 8,
	      	maxlength: 20,
	      	required: true
	    },
	    c_pass: {
	      	minlength: 8,
	      	maxlength: 20,
	      	required: true,
	      	equalTo: "#password"
	    },
	    image:{
		  	extension: "png|jpg|jpeg",
	      	required: true,
	    }
	  }
		  
	});
}); 
</script>