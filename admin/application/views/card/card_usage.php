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
            <form method="post" action="<?= base_url(); ?>card/search" enctype="multipart/form-data">
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
                                            <label>Vendor<span class="astrick">*</span></label>
                                            <select class="form-control form-control-sm select2" name="vendor" required>
                                                <option value="">-- Select --</option>
                                                <?php foreach ($this->db->get('shop')->result_array() as $key => $value) { ?>
                                                    
                                                    <option value="<?= $value['id'] ?>" ><?= $value['shop_name'] ?> - <?= $value['owner_name'] ?></option>

                                                <?php } ?>
                                            
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>From </label>
                                            <input class="form-control form-control-sm datepicker" type="text" name="from" placeholder="From Date" autocomplete="off" readonly="">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>To </label>
                                            <input class="form-control form-control-sm datepicker" type="text" name="to" placeholder="To Date" autocomplete="off" readonly="">
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>&nbsp;Search</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>    
        </div>
    </section>

