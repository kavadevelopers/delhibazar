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
                                            <label>Employee Name <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?= set_value('employee_name',$shop[0]['employee_name']); ?>" type="text" name="employee_name" placeholder="Employee Name" autocomplete="off">
                                             <?= form_error('employee_name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mobile <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?= set_value('mobile',$shop[0]['mobile']); ?>" type="text" name="mobile" placeholder="Mobile" autocomplete="off">
                                            <?= form_error('mobile'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Watsapp No. <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?= set_value('wp_no',$shop[0]['wp_no']); ?>" type="text" name="wp_no" placeholder="Watsapp No." autocomplete="off">
                                            <?= form_error('wp_no'); ?>
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
                                            <label>Email <span class="astrick">*</span></label>
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
                                            <div class="row"><label>Photo</label></div>
                                            <?php if($shop[0]['photo'] == ''){ ?>
                                                <img src="<?= base_url() ?>uploads/product/no-image.png" class="img-height img-fluid" alt="No Image" height="150px" width="150px" style="margin-bottom: 5px;">
                                            <?php } else{ ?>
                                                <img src="<?= base_url() ?>uploads/shop/<?= $shop[0]['photo'] ?>" height="150px" width="150px" style="margin-bottom: 5px;"/>
                                            <?php } ?>

                                            <input class="form-control form-control-sm" value="<?= set_value('photo',$shop[0]['photo']); ?>" type="file" name="photo" placeholder="Photo" autocomplete="off" required>
                                            <?= form_error('photo'); ?>
                                        </div>
                                    </div> 
                                    
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Video</label>
                                            <input class="form-control form-control-sm" value="<?= set_value('video'); ?>" type="file" name="video" placeholder="Video" autocomplete="off">
                                            <?= form_error('video'); ?>
                                        </div>
                                    </div>  -->

                                    <input type="hidden" name="id" value="<?= $shop[0]['id'] ?>">
                                    
                                </div>
                            </div>
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