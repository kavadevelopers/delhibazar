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
            <form method="post" action="<?= base_url(); ?>coupon/update" enctype="multipart/form-data">
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
                                            <label>Code <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('code',$coupon['code']); ?>" type="text" name="code" placeholder="Code" >
                                            <?php echo form_error('code'); ?>
                                        </div>
                                    </div>

                                    <?php 
                                        if($coupon['expire_date'] == NULL){
                                            $exp_date = "";
                                        }
                                        else{
                                            $exp_date = date('d-m-Y',strtotime($coupon['expire_date']));
                                        }
                                    ?>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Expire Date</label>
                                            <input class="form-control form-control-sm" type="text" name="expire_date" id="expire_date" placeholder="Expire Date" value="<?= set_value('expire_date',$exp_date);?>" required readonly>
                                            <?php echo form_error('expire_date'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Discount Type <span class="astrick">*</span></label>
                                            <select class="form-control form-control-sm" name="disccount_type">
                                                <option value="">-- Select Discount Type --</option>
                                                <option value="percentage" <?php if(set_value('disccount_type',$coupon['off_type']) == 'percentage') { echo "selected"; }?>>
                                                    Percentage
                                                </option>
                                                <option value="amount" <?php if(set_value('disccount_type',$coupon['off_type']) == 'amount') { echo "selected"; }?>>
                                                    Amount
                                                </option>
                                                <option value="price" <?php if(set_value('disccount_type',$coupon['off_type']) == 'price') { echo "selected"; }?>>     Price
                                                </option>
                                            </select>
                                            <?php echo form_error('disccount_type'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Discount Value <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('value',$coupon['value']); ?>" type="text" name="value" placeholder="Discount Value" >
                                            <?php echo form_error('value'); ?>
                                        </div>
                                    </div>

                                    <input type="hidden" name="main_id" value="<?= $coupon['id'] ?>">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Status <span class="astrick">*</span></label>
                                            <select class="form-control form-control-sm" name="status">
                                                <option value="">-- Select Status --</option>
                                                <option value="0" <?php if(set_value('status',$coupon['status']) == '0') { echo "selected"; }?>>
                                                    Active
                                                </option>
                                                <option value="1" <?php if(set_value('status',$coupon['status']) == '1') { echo "selected"; }?>>
                                                    In Active
                                                </option>
                                            </select>
                                            <?php echo form_error('status'); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                  <a href="<?= base_url(); ?>coupon" class="btn btn-danger">Cancel</a>
                                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Save</button>
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
        $('#expire_date').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight:'TRUE',
            autoclose: true
        });
    })
    </script>