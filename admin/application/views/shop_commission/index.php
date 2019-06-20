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
            <form method="post" action="<?= base_url(); ?>setting/shop_commission_save" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-secondary"> 
                            <div class="card-header">
                                <h3 class="card-title">Commission</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Per Shop Commission(₹) <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?= set_value('shop_commission',$commission['shop_commission']); ?>" id="shop_commission" type="text" name="shop_commission" placeholder="Per Shop Commission(₹)" autocomplete="off">
                                            <?= form_error('shop_commission'); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-footer">
                                <div class="float-right">
                                  <a href="<?= base_url(); ?>setting/shop_commission" class="btn btn-danger">Cancel</a>
                                  <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Save</button>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="<?= $commission['id'] ?>">

                    </div>
                </div>
            </form>    
        </div>
    </section>

    <script src="<?= base_url(); ?>plugins/ckeditor/ckeditor.js"></script>
