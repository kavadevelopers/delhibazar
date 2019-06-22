    <title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


   	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0 text-dark">Newsletter</h1>
          		</div>
        	</div>
      	</div>
    </div>



    <section class="content">
      	<div class="container-fluid">
            <form method="post" action="<?= base_url(); ?>newsletter/send" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-secondary"> 
                            <div class="card-header">
                                <h3 class="card-title">Send Mail</h3>
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
                                </div>
                            </div>
                        </div>
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Message</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="ckeditor" type="text" id="editor1" name="msg" required></textarea>
                                            <?php echo form_error('msg'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-footer">
                                <div class="float-right">
                                  <a href="<?= base_url(); ?>newsletter" class="btn btn-danger">Cancel</a>
                                  <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>    
        </div>
    </section>


    <script src="<?= base_url(); ?>plugins/ckeditor/ckeditor.js"></script>