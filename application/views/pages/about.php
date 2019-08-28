
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h2>About Us</h2>
						<div class="page_link">
							<a href="<?= base_url(); ?>">Home</a>
							<a href="#">About Us</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Contact Area =================-->
        <section class="sample-text-area">
                <div class="container">
                    <div><?= $this->db->get_where('pages',['id' => '1'])->result_array()[0]['content']; ?></div>
                </div>
        </section>
        <!--================Contact Area =================-->

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="<?= base_url() ?>/user_login/js/gmaps.min.js"></script>