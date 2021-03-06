    <title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


   	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
          		</div>
        	</div>
      	</div>
    </div>



    <section class="content">
      	<div class="container-fluid">
            <form method="post" action="<?= base_url(); ?>shop/save" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-secondary"> 
                            <div class="card-header">
                                <h3 class="card-title">Information</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Shop Name <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('shop_name',$shop[0]['shop_name']); ?>" id="shop_name" type="text" name="shop_name" placeholder="Shop Name" autocomplete="off">
                                            <?php echo form_error('shop_name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Owner Name <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('owner_name',$shop[0]['owner_name']); ?>" type="text" name="owner_name" placeholder="Owner Name" >
                                            <?php echo form_error('owner_name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Employee Name <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('employee_name',$shop[0]['employee_name']); ?>" type="text" name="employee_name" placeholder="Employee Name" autocomplete="off">
                                             <?php echo form_error('employee_name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mobile <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('mobile',$shop[0]['mobile']); ?>" type="text" name="mobile" placeholder="Mobile" autocomplete="off">
                                            <?php echo form_error('mobile'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Display Mobile No. in Website</label>
                                            <select class="form-control form-control-sm" name="mobile_in_website">
                                                
                                                <option value="0" <?php if(0 == set_value('mobile_in_website',$shop[0]['mobile_in_website'])){ echo "selected"; } ?>>Public</option>
                                                <option value="1" <?php if(1 == set_value('mobile_in_website',$shop[0]['mobile_in_website'])){ echo "selected"; } ?>>Private</option>
                                            </select>
                                            <?= form_error('mobile_in_website'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Watsapp No. <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('wp_no',$shop[0]['wp_no']); ?>" type="text" name="wp_no" placeholder="Watsapp No." autocomplete="off">
                                            <?php echo form_error('wp_no'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Display Whastapp No. in Website</label>
                                            <select class="form-control form-control-sm" name="whats_in_website">
                                                
                                                <option value="0" <?php if(0 == set_value('whats_in_website',$shop[0]['whats_in_website'])){ echo "selected"; } ?>>Public</option>
                                                <option value="1" <?php if(1 == set_value('whats_in_website',$shop[0]['whats_in_website'])){ echo "selected"; } ?>>Private</option>
                                            </select>
                                            <?= form_error('whats_in_website'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Address <span class="astrick">*</span></label>
                                            <textarea class="form-control form-control-sm" type="text" name="address" placeholder="Address" autocomplete="off"><?= set_value('address',$shop[0]['address']); ?></textarea>
                                            <?php echo form_error('address'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Landmark <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('landmark',$shop[0]['landmark']); ?>" type="text" name="landmark" placeholder="Landmark" autocomplete="off">
                                            <?php echo form_error('landmark'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('email',$shop[0]['email']); ?>" type="email" name="email" placeholder="Email" autocomplete="off">
                                            <?php echo form_error('email'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Hours of Operation <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?= set_value('hour_operation',$shop[0]['hour_operation']); ?>" type="text" name="hour_operation" placeholder="Hours of Operation" autocomplete="off">
                                            <?= form_error('hour_operation'); ?>
                                        </div>
                                    </div>                                    
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Products/Services <span class="astrick">*</span></label>
                                            <textarea class="form-control form-control-sm" type="text" name="pro_or_servi" placeholder="Products/Services" autocomplete="off"><?= set_value('pro_or_servi',$shop[0]['pro_or_servi']); ?></textarea>
                                            <?= form_error('pro_or_servi'); ?>
                                        </div>
                                    </div>                                    

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mode of Payment <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?= set_value('payment_mode',$shop[0]['payment_mode']); ?>" type="text" name="payment_mode" placeholder="Mode of Payment" autocomplete="off">
                                            <?= form_error('payment_mode'); ?>
                                        </div>
                                    </div> 


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Information</label>
                                            <textarea class="form-control form-control-sm" type="text" name="info" placeholder="Information" autocomplete="off"><?= set_value('info',$shop[0]['info']); ?></textarea>
                                            <?= form_error('info'); ?>
                                        </div>
                                    </div> 

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Detail Description Section</label>
                                            <textarea class="form-control form-control-sm" type="text" name="detail_desc" placeholder="Detail Description Section" autocomplete="off"><?= set_value('detail_desc',$shop[0]['detail_desc']); ?></textarea>
                                            <?= form_error('detail_desc'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Category<span class="astrick">*</span></label>
                                            <textarea class="form-control form-control-sm" type="text" name="category" placeholder="Category" autocomplete="off"><?= set_value('category',$shop[0]['category']); ?></textarea>
                                            <?= form_error('category'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Plan<span class="astrick">*</span></label>
                                            <select class="form-control form-control-sm select2" name="shop_plan">
                                                
                                                <option value="<?= $shop[0]['shop_plan'] ?>"><?= $this->package_model->shop_where($shop[0]['shop_plan'])[0]['plan'] ?></option>

                                            </select>
                                            <?= form_error('shop_plan'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Display in Listing <span class="astrick">*</span></label>
                                            <select class="form-control form-control-sm" name="dis_in_listing">
                                                
                                                <option value="0" <?php if(0 == set_value('dis_in_listing',$shop[0]['dis_in_listing'])){ echo "selected"; } ?>>Yes</option>
                                                <option value="1" <?php if(1 == set_value('dis_in_listing',$shop[0]['dis_in_listing'])){ echo "selected"; } ?>>No</option>
                                            </select>
                                            <?= form_error('dis_in_listing'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row"><label>Photo</label></div>
                                            <img src="<?= base_url() ?>uploads/shop/<?= $shop[0]['photo'] ?>" height="150px" width="150px"/>
                                            <!-- <input class="form-control form-control-sm" value="<?= set_value('photo',$shop[0]['photo']); ?>" type="file" name="photo" placeholder="Photo" autocomplete="off"> -->
                                            <?= form_error('photo'); ?>
                                        </div>
                                    </div> 

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Search Keywords <small>(Note : Please enter comma-separated values)</small></label>
                                            <textarea class="form-control form-control-sm" type="text" name="keywords" placeholder="Search Keywords" autocomplete="off"><?= set_value('keywords',$shop[0]['keywords']); ?></textarea>
                                            <?= form_error('keywords'); ?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>    
        </div>
    </section>

<script type="text/javascript">
    $(function(){
        $('input,textarea,option').attr('readonly', 'TRUE');
        $('select').attr('disabled', 'TRUE');
    })
</script>