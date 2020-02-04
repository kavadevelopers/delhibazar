
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h2>Card Usage - #CUSTOMER<?= $this->session->userdata('id') ?></h2>
						<div class="page_link">
							<a href="<?= base_url(); ?>">Home</a>
							<a href="#">Card Usage</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Contact Area =================-->
        <section class="sample-text-area">
                <div class="container">
                    <table class="table table-bordered" id="dtTable">
                        <thead>
                            <tr>
                                <th>Shop Name</th>
                                <th>Card Id</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $key => $value) { ?>
                                <?php $shop = $this->db->get_where('shop',['id' => $value['vendor']])->row_array(); ?>
                                <tr>
                                    <td><?= $shop['shop_name'] ?></td>
                                    <td><?= $value['card'] ?></td>
                                    <td><?= $value['amount'] ?></td>
                                    <td><?= $value['description'] ?></td>
                                    <td><?= _vdatetime($value['created_at']) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
        </section>
        <!--================Contact Area =================-->
