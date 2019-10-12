<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>Login</h2>
				<div class="page_link">
					<a href="<?= base_url() ?>">Home</a>
					<a href="<?= base_url() ?>login">Login</a>
				</div>
			</div>
		</div>
    </div>
</section>
<!--================End Home Banner Area =================-->



<!--================Login Box Area =================-->
<section class="login_box_area p_120">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 hidden-sm hidden-xs">
				<div class="login_box_img">
					<img class="img-fluid" src="<?= base_url() ?>user_login/img/login.jpg" alt="">
					<div class="hover">
						<a class="main_btn" href="<?= base_url() ?>register">Create an Account</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Log in to enter</h3>
					
					<form class="row login_form" action="<?= base_url() ?>login/check_login" method="post" id="contactForm" novalidate="novalidate">
						
						<div class="col-md-12 form-group">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
						</div>
						
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
						</div>
						
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="btn submit_btn">Log In</button>
							<a href="#">Forgot Password?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Login Box Area =================-->
