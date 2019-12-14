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
            <form method="post" action="<?= base_url(); ?>card/save" enctype="multipart/form-data">
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
                                            <label>Amount <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('amount'); ?>" id="amount" type="text" name="amount" placeholder="Amount" autocomplete="off">
                                            <?php echo form_error('amount'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Validity <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('validity',0); ?>" id="validity" type="text" name="validity" placeholder="Validity in days(0 if unlimited)" autocomplete="off">
                                            <?php echo form_error('validity'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Total Usage <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('total_usage',0); ?>" id="total_usage" type="text" name="total_usage" placeholder="Total Usage(0 if unlimited)" autocomplete="off">
                                            <?php echo form_error('total_usage'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Image <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="file" name="image" accept="image/*" onchange="readFile(this)" required="">
                                        </div>
                                    </div>


                                   
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                  <a href="<?= base_url(); ?>card" class="btn btn-danger">Cancel</a>
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
        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();          
                reader.onload = function (e) {
                    result = e.target.result;
                    arrTarget = result.split(';');
                    tipo = arrTarget[0];
                    if (tipo == 'data:image/jpeg' || tipo == 'data:image/png' || tipo == 'data:image/jpg') {
                        // $image_crop.croppie('bind', {
                        //     url: e.target.result
                        // });
                        //$('#banner_modal').modal('show');
                    } else {
                        alert('Accept only .jpg or .png image types');
                    }
                }           
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

