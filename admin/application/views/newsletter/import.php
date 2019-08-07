    <title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


   	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0 text-dark">Import Newsletter</h1>
          		</div>
        	</div>
      	</div>
    </div>



    <section class="content">
      	<div class="container-fluid">
            <form method="post" action="<?= base_url(); ?>newsletter/import_file" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-secondary"> 
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>File(.csv) <small><b>Note : </b>Please Upload CSV file</small> <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="file" name="file" onchange="return _readURL(this)" accept=".csv" required>                                            
                                            <?php echo form_error('file'); ?>
                                            <p>
                                                <small>
                                                    <a target="_blank" href="<?= base_url() ?>files/sample_file.csv" download>Sample file</a>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                  <a href="<?= base_url(); ?>newsletter" class="btn btn-danger">Cancel</a>
                                  <button type="submit" class="btn btn-success"><i class="fa fa-upload"></i>&nbsp;&nbsp;Import</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>    
        </div>
    </section>

    <script type="text/javascript">
        function _readURL(input) {
            if (input.files && input.files[0]) {
                
                var FileSize = input.files[0].size / 1024 / 1024; // in MB
                var extension = input.files[0].name.substring(input.files[0].name.lastIndexOf('.')+1);
                
                if (FileSize > 2) {
                    alert("Maxiumum Image Size Is 2 Mb.");
                    input.value = '';
                    return false;
                }
                else{
                    if (extension == 'csv') {
                        
                    }
                    else
                    {
                        alert("Only Allowed '.csv' Extension ");
                        input.value = '';
                        return false;
                    }
                }
            }
        }
    </script>