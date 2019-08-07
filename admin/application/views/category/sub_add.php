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
            <form method="post" action="<?= base_url(); ?>category/sub_save" enctype="multipart/form-data">
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
                                            <label>Sub Category Name <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('name'); ?>" type="text" name="name" placeholder="Sub Category Name" >
                                            <?php echo form_error('name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Category<span class="astrick">*</span></label>
                                            <select name="category" class="form-control form-control-sm select2" > 
                                                <option value="">-- Select Category --</option>
                                                <?php foreach ($this->db->get_where('main_category',['df' => '0'])->result_array() as $key => $value) { ?>
                                                    
                                                    <option value="<?= $value['id'] ?>" <?php if(set_value('category') == $value['id']){ echo "selected"; } ?>><?= $value['name'] ?></option>

                                                <?php } ?>    
                                            </select>
                                            <?php echo form_error('category'); ?>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                  <a href="<?= base_url(); ?>category/sub_category" class="btn btn-danger">Cancel</a>
                                  <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>    
        </div>
    </section>


