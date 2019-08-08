    <title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>

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
            <form method="post" action="<?= base_url(); ?>setting/save" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-secondary"> 
                            <div class="card-header">
                                <h3 class="card-title">Site Setting</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ad Mobile <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('ad_number',$setting['ad_number']); ?>" type="text" name="ad_number" placeholder="Ad Mobile" >
                                            <?php echo form_error('ad_number'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Smtp Host <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('smtp_host',$setting['smtp_host']); ?>" type="text" name="smtp_host" placeholder="Smtp Host" >
                                            <?php echo form_error('smtp_host'); ?>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Smtp Port <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('smtp_port',$setting['smtp_port']); ?>" type="text" name="smtp_port" placeholder="Smtp Port" >
                                            <?php echo form_error('smtp_port'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Smtp User <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('smtp_user',$setting['smtp_user']); ?>" type="text" name="smtp_user" placeholder="Smtp User" >
                                            <?php echo form_error('smtp_user'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Smtp Password <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('smtp_pass',$setting['smtp_pass']); ?>" type="text" name="smtp_pass" placeholder="Smtp Password" >
                                            <?php echo form_error('smtp_pass'); ?>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('email',$setting['email']); ?>" type="text" name="email" placeholder="Email" >
                                            <?php echo form_error('email'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Support Email <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('support_email',$setting['support_email']); ?>" type="text" name="support_email" placeholder="Support Email" >
                                            <?php echo form_error('support_email'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Contact Form Email <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('contact_email',$setting['contact_email']); ?>" type="text" name="contact_email" placeholder="Contact Form Email" >
                                            <?php echo form_error('contact_email'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Newsletter Email <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('newsletter_email',$setting['newsletter_email']); ?>" type="text" name="newsletter_email" placeholder="Newsletter Email" >
                                            <?php echo form_error('newsletter_email'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mobile <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('mobile',$setting['mobile']); ?>" type="text" name="mobile" placeholder="Mobile" >
                                            <?php echo form_error('mobile'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>City <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('city',$setting['city']); ?>" type="text" name="city" placeholder="City" >
                                            <?php echo form_error('city'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Address <span class="astrick">*</span></label>
                                            <textarea class="form-control form-control-sm" value="" type="text" name="address" placeholder="Address" ><?php echo set_value('address',$setting['address']); ?></textarea>
                                            <?php echo form_error('address'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Opening Hours <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('opening_hours',$setting['opening_hours']); ?>" type="text" name="opening_hours" placeholder="Opening Hours" >
                                            <?php echo form_error('opening_hours'); ?>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Short About <span class="astrick">*</span></label>
                                            <textarea class="form-control form-control-sm" value="" type="text" name="short_about" placeholder="Short About" ><?php echo set_value('short_about',$setting['short_about']); ?></textarea>
                                            <?php echo form_error('short_about'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Meta Keywords <span class="astrick">*</span></label>
                                            <textarea class="form-control form-control-sm" value="" type="text" name="meta_keywords" placeholder="Meta Keywords" ><?php echo set_value('meta_keywords',$setting['meta_keywords']); ?></textarea>
                                            <?php echo form_error('meta_keywords'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Meta Description <span class="astrick">*</span></label>
                                            <textarea class="form-control form-control-sm" value="" type="text" name="meta_description" placeholder="Meta Description" ><?php echo set_value('meta_description',$setting['meta_description']); ?></textarea>
                                            <?php echo form_error('meta_description'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Payumoney Merchent Key <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('merchent_key',$setting['merchent_key']); ?>" type="text" name="merchent_key" placeholder="Payumoney Merchent Key" >
                                            <?php echo form_error('merchent_key'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Payumoney SALT <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('salt',$setting['salt']); ?>" type="text" name="salt" placeholder="Payumoney SALT" >
                                            <?php echo form_error('salt'); ?>
                                        </div>
                                    </div>

                                    
                                   
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Save</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>    
        </div>
    </section>


