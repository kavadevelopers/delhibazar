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
            <form method="post" action="<?= base_url(); ?>other/customer_mail_Send" enctype="multipart/form-data">
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
                                            <label>Subject <span class="astrick">*</span></label>
                                            <textarea class="form-control form-control-sm" type="text" name="subject" placeholder="Subject" rows="3" autocomplete="off" required></textarea>
                                            <?php echo form_error('subject'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image" class="form-control" onchange="image_validation(this);">
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
                                        <textarea class="ckeditor" cols="80" id="editor1" name="msg" rows="10"><?php echo set_value('editor1'); ?></textarea>
                                    </div>
                                    <?php echo form_error('editor1'); ?>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                             <div class="card-footer">
                                <div class="float-right">
                                  <a href="<?= base_url(); ?>product" class="btn btn-danger">Cancel</a>
                                  <button type="submit" class="btn btn-success"><i class="fa fa-send"></i>&nbsp;Send</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>    
        </div>
    </section>


   

    

    <script src="<?= base_url(); ?>plugins/ckeditor/ckeditor.js"></script>

    <script type="text/javascript">
        function image_validation(input) {
            if (input.files && input.files[0]) {
                
                var FileSize = input.files[0].size / 1024 / 1024; // in MB
                var extension = input.files[0].name.substring(input.files[0].name.lastIndexOf('.')+1);
                
                if (FileSize > 2) {
                    alert("Maxiumum Image Size Is 1 Mb.");
                    input.value = '';
                    return false;
                }
                else{
                    if (extension == 'jpg' || extension == 'png' || extension == 'jpeg') {
                        // var reader = new FileReader();

                        // reader.onload = function (e) {
                        //     $("#imgProfile").attr('src', e.target.result);
                        // }

                        // reader.readAsDataURL(input.files[0]);
                    }
                    else
                    {
                        alert("Only Allowed '.jpg' OR '.png' OR '.jpeg' Extension ");
                        input.value = '';
                        return false;
                    }
                }
            }
        }
    </script>