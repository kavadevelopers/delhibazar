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
            <form method="post" action="<?= base_url(); ?>product/save" enctype="multipart/form-data">
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
                                            <label>Product Name <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('name'); ?>" type="text" name="name" placeholder="Product Name" >
                                            <?php echo form_error('name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Price <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('price'); ?>" type="text" name="price" placeholder="Price" >
                                            <?php echo form_error('price'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Category <span class="astrick">*</span></label>
                                            <select name="category" class="form-control form-control-sm select2" >
                                                <option value="">-- Select Category --</option>

                                                <?php foreach ($categories as $key => $category) { ?>
                                                        
                                                        <option value="<?= $category['id'];?>" <?php if($category['id'] == set_value('category')) { echo "selected"; } ?>>
                                                        <?= $category['name'];?>
                                                        </option>
                                                  
                                                <?php } ?>

                                            </select>
                                            <?php echo form_error('category'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Short Description <span class="astrick">*</span></label>
                                            <textarea class="form-control form-control-sm" value="" type="text" name="short_desc" placeholder="Short Description" ><?php echo set_value('short_desc'); ?></textarea>
                                            <?php echo form_error('short_desc'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image(Select mutiple image)<span class="astrick">*</span></label>
                                            <br>
                                            <span><i><span class="astrick">Note</span> : Max size & Max Resoluion(2MB, 720 X 1080) </i></span>
                                            <input type="file" class="form-control form-control-sm" name="image[]" placeholder="Image" multiple="multiple">
                                        </div>
                                    </div>
                                    
                                   
                                </div>
                            </div>
                            
                        </div>

                        <div class="card card-secondary"> 
                            <div class="card-header">
                                <h3 class="card-title">Detail Description</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10"><?php echo set_value('editor1'); ?></textarea>
                                    </div>
                                    <?php echo form_error('editor1'); ?>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                             <div class="card-footer">
                                <div class="float-right">
                                  <a href="<?= base_url(); ?>product" class="btn btn-danger">Cancel</a>
                                  <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>    
        </div>
    </section>


   

    

    <script src="<?= base_url(); ?>plugins/ckeditor/ckeditor.js"></script>