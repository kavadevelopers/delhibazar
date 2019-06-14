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
            <form method="post" action="<?= base_url(); ?>advertising/save" enctype="multipart/form-data">
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
                                            <label>Business Name <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('business_name'); ?>" id="business_name" type="text" name="business_name" placeholder="Business Name" autocomplete="off">
                                            <?php echo form_error('business_name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Intro <span class="astrick">*</span></label>
                                            <textarea class="form-control form-control-sm" type="text" name="intro" placeholder="Intro" autocomplete="off"><?= set_value('intro'); ?></textarea>
                                            <?= form_error('intro'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mobile <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('mobile'); ?>" type="text" name="mobile" placeholder="Mobile" autocomplete="off">
                                            <?php echo form_error('mobile'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Address <span class="astrick">*</span></label>
                                            <textarea class="form-control form-control-sm" type="text" name="address" placeholder="Address" autocomplete="off"><?= set_value('address'); ?></textarea>
                                            <?php echo form_error('address'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Website Link <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('web_link'); ?>" type="text" name="web_link" placeholder="Website Link" autocomplete="off">
                                            <?php echo form_error('web_link'); ?>
                                            <small><b>Note : </b>If You Put This Blank Please Add (#)</small>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Plan<span class="astrick">*</span></label>
                                            <select class="form-control form-control-sm select2" name="plan_name">
                                                
                                                <?php if($ad_package){ ?>
                                                    <option value="">-- Select Plan --</option>
                                                <?php foreach ($ad_package as $key => $value) { ?>

                                                    <option value="<?= $value['id'] ?>" <?php if($value['id'] == set_value('plan_name')){ echo "selected"; } ?>><?= $value['plan'] ?></option>

                                                <?php } } else { ?>

                                                    <option value="">No Plan Found</option>
                                                
                                                <?php } ?>
                                            
                                            </select>
                                            <?= form_error('plan_name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Page<span class="astrick">*</span></label>
                                            <select class="form-control form-control-sm select2" name="page" id="page">
                                                
                                                <option value="">-- Select Page --</option>
                                                <option value="Home" <?php if('Home' == set_value('page')){ echo "selected"; } ?>>Home</option>
                                                <option value="Listing" <?php if('Listing' == set_value('page')){ echo "selected"; } ?>>Listing</option>
                                                <option value="Business Detail" <?php if('Business Detail' == set_value('page')){ echo "selected"; } ?>>Business Detail</option>
                                            </select>
                                            <?= form_error('page'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Position<span class="astrick">*</span></label>
                                            <select class="form-control form-control-sm" name="position" id="positions">
                                                
                                                <?php if(set_value('page') == 'Home'){ ?>
                                                    <option value="">-- Select Position --</option>
                                                    <?php for($i = 1;$i <= 10;$i++){ ?>

                                                        <option value="<?= $i ?>" <?php if($i == set_value('position')){ echo "selected"; } ?>>#<?= $i ?></option>

                                                    <?php } ?>

                                                <?php }else if(set_value('page') == 'Listing'){ ?>
                                                    <option value="">-- Select Position --</option>
                                                    <?php for($i = 1;$i <= 10;$i++){ ?>

                                                        <option value="<?= $i ?>" <?php if($i == set_value('position')){ echo "selected"; } ?>>#<?= $i ?></option>

                                                    <?php } ?>

                                                <?php }else if(set_value('page') == 'Business Detail'){ ?>
                                                    <option value="">-- Select Position --</option>
                                                    <?php for($i = 1;$i <= 10;$i++){ ?>

                                                        <option value="<?= $i ?>" <?php if($i == set_value('position')){ echo "selected"; } ?>>#<?= $i ?></option>

                                                    <?php } ?>

                                                <?php }else{ ?>

                                                        <option value="">-- Select Position --</option>

                                                <?php }?>

                                            </select>
                                            <?= form_error('position'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Photo</label><br>
                                            <span><i><span class="astrick">Note</span> : Max size & Max Resoluion(2MB, 720 X 1080) </i></span>
                                            <input class="form-control form-control-sm" value="<?= set_value('photo'); ?>" type="file" name="photo" placeholder="Photo" autocomplete="off">
                                            <?= form_error('photo'); ?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                  <a href="<?= base_url(); ?>shop" class="btn btn-danger">Cancel</a>
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
        $(function(){
            $('#page').change(function(){
                if($(this).val()  == 'Home'){
                    $('#positions').html('');
                    var str = '<option value="">-- Select Position --</option>';
                    for(var i = 1;i <= 10;i++){
                        str += '<option value="'+i+'">#'+i+'</option>';
                    }
                    $('#positions').html(str);
                }
                else if($(this).val()  == 'Listing'){
                    $('#positions').html('');
                    var str = '<option value="">-- Select Position --</option>';
                    for(var i = 1;i <= 10;i++){
                        str += '<option value="'+i+'">#'+i+'</option>';
                    }
                    $('#positions').html(str);
                }
                else if($(this).val()  == 'Business Detail'){
                    $('#positions').html('');
                    var str = '<option value="">-- Select Position --</option>';
                    for(var i = 1;i <= 10;i++){
                        str += '<option value="'+i+'">#'+i+'</option>';
                    }
                    $('#positions').html(str);
                }
                else{
                    $('#positions').html('<option value="">-- Select Position --</option>');
                }
            })
        })
    </script>