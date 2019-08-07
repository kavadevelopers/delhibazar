    <title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


   	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0 text-dark">Edit Category</h1>
          		</div>
        	</div>
      	</div>
    </div>



    <section class="content">
      	<div class="container-fluid">
            <form method="post" action="<?= base_url(); ?>category/update" enctype="multipart/form-data">
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
                                            <label>Category Name <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('name',$category['name']); ?>" type="text" name="name" placeholder="Category Name" >
                                            <?php echo form_error('name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control form-control-sm" name="status">
                                                <option value="0" <?php if(set_value('status',$category['status']) == '0'){ echo "selected"; } ?>>Active</option>
                                                <option value="1" <?php if(set_value('status',$category['status']) == '1'){ echo "selected"; } ?>>In Active</option>
                                            </select>
                                            <?php echo form_error('status'); ?>
                                        </div>
                                    </div>

                                    <input type="hidden" name="main_id" value="<?= set_value('main_id',$category['id']); ?>">
                                    
                                   
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                  <a href="<?= base_url(); ?>category" class="btn btn-danger">Cancel</a>
                                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Save</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>    
        </div>
    </section>


