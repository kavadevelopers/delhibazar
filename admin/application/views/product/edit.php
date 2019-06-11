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
            <form method="post" action="<?= base_url(); ?>product/update" enctype="multipart/form-data">
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
                                            <input class="form-control form-control-sm" value="<?php echo set_value('name',$product['name']); ?>" type="text" name="name" placeholder="Product Name" >
                                            <?php echo form_error('name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Price <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('price',$product['amount']); ?>" type="text" name="price" placeholder="Price" >
                                            <?php echo form_error('price'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Category <span class="astrick">*</span></label>
                                            <select name="category" class="form-control form-control-sm select2" >
                                                <option value="">-- Select Category --</option>

                                                <?php foreach ($categories as $key => $category) { ?>
                                                        
                                                        <option value="<?= $category['id'];?>" <?php if($category['id'] == set_value('category',$product['category'])) { echo "selected"; } ?>>
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
                                            <textarea class="form-control form-control-sm" value="" type="text" name="short_desc" placeholder="Short Description" ><?php echo set_value('short_desc',$product['short_desc']); ?></textarea>
                                            <?php echo form_error('short_desc'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image <span class="astrick">*</span></label>
                                            <input type="file" class="form-control form-control-sm" name="image" placeholder="Image" value="" >
                                            <img src="<?= base_url() ?>uploads/product/<?= $this->product_model->product_image_where($product['id'])[0]['image'] ?>" alt="Product Image" style="max-width:150px;padding-top: 10px;">
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
                                        <textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10"><?php echo set_value('editor1',$product['desc']); ?></textarea>
                                    </div>
                                    <?php echo form_error('editor1'); ?>

                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="product_id" value="<?= set_value('product_id',$product['id']); ?>">

                        <div class="card">
                             <div class="card-footer">
                                <div class="float-right">
                                  <a href="<?= base_url(); ?>product" class="btn btn-danger">Cancel</a>
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