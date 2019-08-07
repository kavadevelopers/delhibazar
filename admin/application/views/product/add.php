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
            <form method="post" action="<?= base_url(); ?>product/save" enctype="multipart/form-data">
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
                                            <label>Product Name <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('name'); ?>" type="text" name="name" placeholder="Product Name" >
                                            <?php echo form_error('name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>List Price </label>
                                            <input class="form-control form-control-sm" value="<?php echo set_value('list_price'); ?>" type="text" name="list_price" placeholder="List Price" >
                                            <?php echo form_error('list_price'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Tax <small>Note : (In %)</small><span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" onkeyup="total_amt();" value="<?php echo set_value('tax'); ?>" type="text" name="tax" id="tax" placeholder="Tax" >
                                            <?php echo form_error('tax'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Amount without tax <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" onkeyup="total_amt();" value="<?php echo set_value('amount_without_tax'); ?>" type="text" id="amount_without_tax" name="amount_without_tax" placeholder="Amount without tax" >
                                            <?php echo form_error('amount_without_tax'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Price <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" id="amount" value="<?php echo set_value('price'); ?>" type="text" name="price" placeholder="Price" readonly>
                                            <?php echo form_error('price'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Category <span class="astrick">*</span></label>
                                            <select id="multiselect" name="category[]" multiple="multiple" class="form-control" style="display: none;">

                                                <?php foreach ($categories as $key => $category) { ?>
                                                        
                                                        <option value="<?= $category['id'];?>" 
                                                            <?php if(set_value('category')){ foreach (set_value('category') as $c_key => $set_val) {
                                                                if($set_val == $category['id']){
                                                                    echo "selected";
                                                                }
                                                        } }?>>
                                                            <?= $category['name'];?>
                                                        </option>
                                                  
                                                <?php } ?>

                                            </select>
                                            <?php echo form_error('category[]'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Cash On Delivery <span class="astrick">*</span></label>
                                            <select name="cash_on_delivery" class="form-control form-control-sm" >
                                                <option value="0" <?php if(0 == set_value('cash_on_delivery')) { echo "selected"; } ?>>Avalible</option>
                                                <option value="1" <?php if(1 == set_value('cash_on_delivery')) { echo "selected"; } ?>>Not Avalible</option>
                                            </select>
                                            <?php echo form_error('cash_on_delivery'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Short Description <span class="astrick">*</span></label>
                                            <textarea class="form-control form-control-sm" value="" type="text" name="short_desc" placeholder="Short Description" ><?php echo set_value('short_desc'); ?></textarea>
                                            <?php echo form_error('short_desc'); ?>
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
                                        <textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10"><?php echo set_value('editor1'); ?></textarea>
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
                                            <textarea class="form-control form-control-sm" value="" type="text" name="keywords" placeholder="Keywords" ><?php echo set_value('keywords'); ?></textarea>
                                            <?php echo form_error('keywords'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Description </label>
                                            <textarea class="form-control form-control-sm" value="" type="text" name="description" placeholder="Description" ><?php echo set_value('description'); ?></textarea>
                                            <?php echo form_error('description'); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                             <div class="card-footer">
                                <div class="float-right">
                                  <a href="<?= base_url(); ?>product" class="btn btn-danger">Cancel</a>
                                  <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add</button>
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
        function total_amt(){
            tax = $('#tax').val();
            amount = $('#amount_without_tax').val();

            if(tax != '' && amount != '')
            {
                var total = tax * amount / 100;
                total = total + parseFloat(amount);
                $('#amount').val(parseFloat(total).toFixed(2));
            }
        }

        $(document).ready(function(){
            total_amt();
        })

        $(document).ready(function() {
            $('#multiselect').multiselect({
                buttonWidth : '160px',
                includeSelectAllOption : true,
                nonSelectedText: 'Select Category'
            });
        });
    </script>


    <style type="text/css">
        .multiselect-container li{
            padding-left: 5px;
        }

        .btn-group{
            width: 100% !important;
        }
    </style>