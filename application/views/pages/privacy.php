
<!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h2>Privacy</h2>
						<div class="page_link">
							<a href="<?= base_url(); ?>">Home</a>
							<a href="#">Privacy</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Contact Area =================-->
        <section class="sample-text-area">
                <div class="container">
                    <div><?= $this->db->get_where('pages',['id' => '3'])->result_array()[0]['content']; ?></div>
                </div>
        </section>
        <!--================Contact Area =================-->
