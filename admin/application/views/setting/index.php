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


