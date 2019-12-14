    <title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


   	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0 text-dark"><?= $page_title ?></h1>
          		</div>
        	</div>
      	</div>
    </div>



    <section class="content">
      	<div class="container-fluid">
            <form method="post" action="<?= base_url(); ?>app_setting/save" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-secondary"> 

                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Dashboard Image <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="" id="username" type="file" name="home_image" placeholder="Username" autocomplete="off" accept="image/x-png,image/gif,image/jpeg">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <img src="<?= get_app_image($data['home']) ?>" style="width: 100%;">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="margin-top: 38px;"><input class="" value="1" type="checkbox" name="home_d" <?= $data['home_d'] == '1'?'checked':''; ?>> Display In App </label>
                                            
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Sidebar Image <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="" id="username" type="file" name="sidebar_image" placeholder="Username" autocomplete="off" accept="image/x-png,image/gif,image/jpeg">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <img src="<?= get_app_image($data['sidebar']) ?>" style="width: 100%;">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="margin-top: 38px;"><input class="" value="1" type="checkbox" name="sidebar_d" <?= $data['sidebar_d'] == '1'?'checked':''; ?>> Display In App </label>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
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
