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
            <form method="post" action="<?= base_url(); ?>shop_offer/save" enctype="multipart/form-data">
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
                                            <label>Discount Type <span class="astrick">*</span></label>
                                            <select class="form-control form-control-sm" name="type">
                                                <option value="">-- Select --</option>
                                                <option value="Percentage" <?= set_value('type') == "Percentage"?'selected':''; ?>>Percentage</option>
                                                <option value="Amount" <?= set_value('type') == "Amount"?'selected':''; ?>>Amount</option>
                                            </select>
                                            <?php echo form_error('type'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Amount <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('amount'); ?>" id="amount" type="text" name="amount" placeholder="Amount" autocomplete="off">
                                            <?php echo form_error('amount'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Description <span class="astrick">*</span></label>
                                            <textarea class="form-control form-control-sm" value="" id="description" type="text" name="description" placeholder="Description" autocomplete="off"><?= set_value('description'); ?></textarea>
                                            <?php echo form_error('description'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Shop<span class="astrick">*</span></label>
                                            <select class="form-control form-control-sm select2" name="shop">
                                                
                                                
                                                    <option value="">-- Select --</option>
                                                <?php foreach ($this->shop_model->shops() as $key => $value) { ?>
                                                    
                                                    <option value="<?= $value['id'] ?>" <?php if($value['id'] == set_value('shop')){ echo "selected"; } ?>><?= $value['shop_name'] ?></option>
                                                
                                                <?php } ?>
                                            
                                            </select>
                                            <?= form_error('shop'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>From <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm datepicker" value="<?php echo set_value('from'); ?>" id="from" type="text" name="from" placeholder="From" autocomplete="off" readonly>
                                            <?php echo form_error('from'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>To <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm datepicker" value="<?php echo set_value('to'); ?>" id="to" type="text" name="to" placeholder="To" autocomplete="off" readonly>
                                            <?php echo form_error('to'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Image <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="" id="to" type="file" name="image" placeholder="To" autocomplete="off" accept="image/*">
                                            <?php echo form_error('image'); ?>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                  <a href="<?= base_url(); ?>shop_offer" class="btn btn-danger">Cancel</a>
                                  <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>    
        </div>
    </section>


    <script type="text/javascript">
        $('.datepicker').datepicker();
    </script>