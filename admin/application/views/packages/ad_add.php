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
        <form method="post" action="<?= base_url(); ?>packages/save_ad" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-secondary"> 
                        <div class="card-header">
                            <h3 class="card-title">Package</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Plan Name <span class="astrick">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="plan" placeholder="Plan Name" value="<?= set_value('plan'); ?>">
                                        <?= form_error('plan'); ?>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Price <span class="astrick">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="price" placeholder="Price" value="<?= set_value('price'); ?>">
                                        <?= form_error('price'); ?>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Duration(Days) <span class="astrick">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="duration" placeholder="Duration" value="<?= set_value('duration'); ?>">
                                        <?= form_error('duration'); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                    </div>

                    
                    <div class="card">
                         <div class="card-footer">
                            <div class="float-right">
                              <a href="<?= base_url(); ?>packages/ad_index" class="btn btn-danger">Cancel</a>
                              <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>    
    </div>
</section>

