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
            <form method="post" action="<?= base_url(); ?>pages/about_save" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">


                        <div class="card card-secondary"> 

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10"><?php echo set_value('editor1',$content[0]['content']); ?></textarea>
                                    </div>
                                    <?php echo form_error('editor1'); ?>

                                </div>
                            </div>
                        </div>

                        <div class="card card-secondary"> 
                            <div class="card-header">
                                <h3 class="card-title">Meta Description</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Keywords </label>
                                            <textarea class="form-control form-control-sm" value="" type="text" name="keywords" placeholder="Keywords" ><?php echo set_value('keywords',$content[0]['keyword']); ?></textarea>
                                            <?php echo form_error('keywords'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Description </label>
                                            <textarea class="form-control form-control-sm" value="" type="text" name="description" placeholder="Description" ><?php echo set_value('description',$content[0]['description']); ?></textarea>
                                            <?php echo form_error('description'); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
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


   

    

    <script src="<?= base_url(); ?>plugins/ckeditor/ckeditor.js"></script>