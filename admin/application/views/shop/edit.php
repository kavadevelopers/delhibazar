    <title><?=$this->config->config["projectTitle"]?> | <?= $page_title; ?></title>


   	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0 text-dark"><?= $page_title; ?></h1>
          		</div>
        	</div>
      	</div>
    </div>



    <section class="content">
      	<div class="container-fluid">
            <form method="post" action="<?= base_url(); ?>shop/update" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-secondary"> 
                            <div class="card-header">
                                <h3 class="card-title">Information</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Username <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('username',$shop[0]['username']); ?>" id="username" type="text" name="username" placeholder="Username" autocomplete="off">
                                            <?php echo form_error('username'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Password <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('password',$shop[0]['password']); ?>" id="password" type="text" name="password" placeholder="Password" autocomplete="off">
                                            <?php echo form_error('password'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Category <span class="astrick">*</span></label>
                                            <select class="form-control form-control-sm" name="_category">
                                                <option value="">-- Select --</option>
                                                <?php foreach ($this->shop_model->categories() as $key => $value) { ?>
                                                    <option value="<?= $value['id'] ?>" <?= set_value('_category',$shop[0]['_category']) == $value['id']?'selected':''; ?>><?= $value['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <?php echo form_error('_category'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Area <span class="astrick">*</span></label>
                                            <select class="form-control form-control-sm" name="_area">
                                                <option value="">-- Select --</option>
                                                <?php foreach ($this->shop_model->area() as $key => $value) { ?>
                                                    <option value="<?= $value['id'] ?>" <?= set_value('_area',$shop[0]['_area']) == $value['id']?'selected':''; ?>><?= $value['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <?php echo form_error('_area'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Shop Name <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?= set_value('shop_name',$shop[0]['shop_name']); ?>" id="shop_name" type="text" name="shop_name" placeholder="Shop Name" autocomplete="off">
                                            <?= form_error('shop_name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Owner Name <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?= set_value('owner_name',$shop[0]['owner_name']); ?>" type="text" name="owner_name" placeholder="Owner Name" >
                                            <?= form_error('owner_name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Employee Name</label>
                                            <input class="form-control form-control-sm" value="<?= set_value('employee_name',$shop[0]['employee_name']); ?>" type="text" name="employee_name" placeholder="Employee Name" autocomplete="off">
                                             <?= form_error('employee_name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input class="form-control form-control-sm" value="<?= set_value('mobile',$shop[0]['mobile']); ?>" type="text" name="mobile" placeholder="Mobile" step="0" min="0" autocomplete="off">
                                            <?= form_error('mobile'); ?>
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
                                            <label>Watsapp No.</label>
                                            <input class="form-control form-control-sm" value="<?= set_value('wp_no',$shop[0]['wp_no']); ?>" type="text" name="wp_no" placeholder="Watsapp No." step="0" min="0" autocomplete="off">
                                            <?= form_error('wp_no'); ?>
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
                                            <?= form_error('address'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Landmark <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?= set_value('landmark',$shop[0]['landmark']); ?>" type="text" name="landmark" placeholder="Landmark" autocomplete="off">
                                            <?= form_error('landmark'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control form-control-sm" value="<?= set_value('email',$shop[0]['email']); ?>" type="email" name="email" placeholder="Email" autocomplete="off">
                                            <?= form_error('email'); ?>
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
                                                
                                                <?php if($shop_package){ ?>
                                                    <option value="">-- Select Plan --</option>
                                                <?php foreach ($shop_package as $key => $value) { ?>
                                                    
                                                    <option value="<?= $value['id'] ?>" <?php if($value['id'] == set_value('shop_plan',$shop[0]['shop_plan'])){ echo "selected"; } ?>><?= $value['plan'] ?></option>

                                                <?php } } else { ?>

                                                    <option value="">Add New Plan</option>
                                                
                                                <?php } ?>
                                            
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

                                    <input type="hidden" name="id" value="<?= $shop[0]['id'] ?>">
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

                        <div class="card card-secondary"> 
                            <div class="card-header">
                                <h3 class="card-title">Information</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <textarea class="ckeditor" cols="80" id="editor1" name="info" rows="10"><?= set_value('info',$shop[0]['info']); ?></textarea>
                                    </div>
                                    <?php echo form_error('info'); ?>

                                </div>
                            </div>
                        </div>

                        

                        <div class="card">
                            <div class="card-footer">
                                <div class="float-right">
                                  <a href="<?= base_url(); ?>shop" class="btn btn-danger">Cancel</a>
                                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Save</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>    
        </div>
    </section>
<script src="<?= base_url(); ?>plugins/ckeditor/ckeditor.js"></script>

