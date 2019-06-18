    <title><?=$this->config->config["projectTitle"]?> | <?= $page_title; ?></title>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $page_title; ?></h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
      	<div class="container-fluid">
            <form method="post" action="<?= base_url(); ?>setting/update_password" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-secondary"> 
                            <div class="card-header">
                                <h3 class="card-title">Site Setting</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Password <span class="astrick">*</span></label>
                                            <div class="input-group">
                                                <input class="form-control form-control-sm" value="<?= set_value('pass'); ?>" type="password" name="pass" id="pass" placeholder="Password" autocomplete="off">
                                                <div class="input-group-append" style="cursor: pointer;">
                                                    <span class="input-group-text _cpnt" id="eyepass"><i class="fa fa-eye"></i></span>
                                                </div>
                                            </div>
                                            <?= form_error('pass'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Confirm Password <span class="astrick">*</span></label>
                                            <div class="input-group">
                                                <input class="form-control form-control-sm" value="<?= set_value('con_pass'); ?>" type="password" name="con_pass" placeholder="Confirm Password" id="conpass" autocomplete="off">
                                                <div class="input-group-append" style="cursor: pointer;">
                                                    <span class="input-group-text _cpnt" id="eyecpass"><i class="fa fa-eye"></i></span>
                                                </div>
                                            </div>
                                            <?= form_error('con_pass'); ?>
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

                        <input type="hidden" name="id" value="<?= $change_pass['id'] ?>">

                    </div>
                </div>
            </form>    
        </div>
    </section>


