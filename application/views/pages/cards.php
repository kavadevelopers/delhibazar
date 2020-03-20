<!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h2>Virtual Cards</h2>
						<div class="page_link">
							<a href="<?= base_url(); ?>">Home</a>
							<a href="#">Virtual Cards</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        <?php  $this->db->order_by('id','desc'); 
        $cards = $this->db->get_where('card_purchase',['user' => $this->session->userdata('id')])->result_array(); ?>
        <!--================Contact Area =================-->
        <section class="sample-text-area">
            <div class="container">
                <?php if($cards){ ?>

                    <div class="col-md-12 row">
                            
                            <?php foreach ($cards as $key => $value) { ?>
                                <div class="col-md-4 text-center">
                                    <div style="width: 330px; height: 180px; background: #000000; margin: 0 auto;display: table;border-radius: 10px;">
                                        <div style="vertical-align: middle; width: 50%; display: table-cell; text-align: center;">
                                            <img src="<?= base_url() ?>image/logo.png" style="width: 100%;">
                                            <p style="padding: 0px; text-align: center; color: #ffc107; font-size: 14px; margin: 0;">
                                                <?= get_setting()['card_text'] ?>
                                            </p>
                                            <p style="padding: 0px; text-align: center; color: #ffffff; font-size: 14px; margin: 0;">
                                                <?= get_setting()['card_email'] ?>
                                            </p>
                                        </div>
                                        <div style="vertical-align: middle; width: 50%; display: table-cell; text-align: center;">
                                            <img src="<?= base_url('uploads/qr/').qr($value['id']); ?>" style="width: 70%;">
                                            <p style="padding: 0px; text-align: center; color: #ffffff; font-size: 12px; margin: 5px 0 0 0; line-height: 1;">
                                                <?= get_setting()['card_web'] ?>
                                            </p>
                                        </div>
                                    </div>

                                    <p style="margin-bottom: 0px;"><b>Validity : </b> <?= $value['validity'] == '0'?'Unlimited':get_validity($value['p_date'],$value['validity']); ?> </p>

                                    <p style="margin-bottom: 0px;"><b>Count Usage : </b> <?= $value['usage'] == '0'?'Unlimited':get_usage($value['id'],$value['usage']); ?> </p>

                                    <p><b>Expired On : </b> <?= $value['validity'] == '0'?'Unlimited':date('d-m-Y', strtotime($value['p_date'] . '+'.$value['validity'].' day')); ?> </p>

                                </div>

                            <?php } ?>
                    </div>

                <?php }else{ ?>

                    <h3 style="text-align: center;">No Data Found <?= $this->session->userdata('id') ?></h3>

                <?php } ?>
            </div>
        </section>