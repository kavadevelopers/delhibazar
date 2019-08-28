<title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


   	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-md-6">
            		<h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
          		</div>
          		<div class="col-md-6 text-right" style="padding: 10px;">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#order_modal">Change Order</button>
                </div>
        	</div>
      	</div>
    </div>



    <section class="content">
      	<div class="container-fluid">
            
                <div class="row">
                    <div class="col-md-12">

                    	<div class="row">
                    		
                    		<div class="col-md-5">
                    			<form method="post" action="<?= base_url(); ?>pages/home_add_save" enctype="multipart/form-data">
		                        <div class="card card-secondary"> 
		                        	<div class="card-header">
		                                <h3 class="card-title">Add Category</h3>
		                            </div>
		                            <div class="card-body">
		                                <div class="row">

		                                    <div class="col-md-12">
		                                        <div class="form-group">
		                                            <label>Category<span class="astrick">*</span></label>
		                                            <select name="category" class="form-control form-control-sm select2" > 
		                                                <option value="">-- Select Category --</option>
		                                                <?php foreach ($this->db->get_where('category',['df' => '0'])->result_array() as $key => $value) { ?>
		                                                    
		                                                    <option value="<?= $value['id'] ?>" <?php if(set_value('category') == $value['id']){ echo "selected"; } ?>><?= $value['name'] ?></option>

		                                                <?php } ?>    
		                                            </select>
		                                            <?php echo form_error('category'); ?>
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
		                		</form>
		                    </div>

		                    <div class="col-md-7">
		                        <div class="card card-secondary"> 

		                            <div class="card-body">
		                                <div class="row">

		                                    <div class="col-md-12" style="text-align: center;">

		                                    <table class="table table-bordered" id="banners">
                                        		<tbody>
		                                    	<?php $this->db->order_by('order','ASC'); ?>
		                                    	<?php $Categories = $this->db->get('home_categories')->result_array(); ?>
		                                    	<?php if($Categories){ ?>
	                                                <?php foreach ($Categories as $key => $value) { ?>
	                                                    <tr>
	                                                        <td style="width: 300px;">
	                                                        	<?= $this->general_model->category_byid($value['cate_id']); ?>
	                                                        </td>
	                                                        <td>
	                                                        	<button type="button" class="btn btn-sm btn-danger" onclick="return delete_image('<?= $value['id']; ?>','<?= $key ?>');" title="Delete" id="main_button<?= $key ?>">
	                                                                    
                                                                    <i class="fa fa-trash" id="remove_bt<?= $key ?>"></i>
                                                                    <span id="remove_sp<?= $key ?>" style="display: none;">
                                                                        <i class="fa fa-refresh fa-spin"></i>
                                                                        Please Wait
                                                                    </span>
                                                            	</button>
	                                                        </td>
	                                                    </tr>
	                                                <?php } ?>

	                                            <?php }else{ ?>
	                                                <tr>
	                                                    <td class="text-center">No Categories Found</td>
	                                                </tr>
	                                            <?php } ?>
	                                        	</tbody>
	                                        </table>
		                                    </div>

		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <div class="col-md-5">
                        <form method="post" action="<?= base_url(); ?>pages/home_meta_save" enctype="multipart/form-data">
	                        <div class="card card-secondary"> 
	                            <div class="card-header">
	                                <h3 class="card-title">Meta Description</h3>
	                            </div>
	                            <div class="card-body">
	                                <div class="row">

	                                    <div class="col-md-12">
	                                        <div class="form-group">
	                                            <label>Keywords </label>
	                                            <textarea class="form-control form-control-sm" value="" type="text" name="keywords" placeholder="Keywords" ><?php echo set_value('keywords',$content[0]['keyword']); ?></textarea>
	                                            <?php echo form_error('keywords'); ?>
	                                        </div>
	                                    </div>

	                                    <div class="col-md-12">
	                                        <div class="form-group">
	                                            <label>Description </label>
	                                            <textarea class="form-control form-control-sm" value="" type="text" name="description" placeholder="Description" ><?php echo set_value('description',$content[0]['description']); ?></textarea>
	                                            <?php echo form_error('description'); ?>
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
                    	</form>
                    </div>
                </div>
              
        </div>
    </section>

    <div class="modal" id="order_modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Drag Category Name To Change Order</h5>
                    <button type="button" class="close" onclick="window.location.reload(true);" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="tblLocations" border="1" style="margin:0 auto; cursor: move;" class="table">
                        
                            <tr>
                                <th>Name</th>
                                <th>Order</th>
                            </tr>
                        	<?php $this->db->order_by('order','ASC'); ?>
		                    <?php $Categories = $this->db->get('home_categories')->result_array(); ?>
                            <?php foreach ($Categories as $key => $value) { ?>
                                <tr>
                                    <td class="td_image" data-id="<?= $value['id'] ?>">
                                        <?= $this->general_model->category_byid($value['cate_id']); ?>
                                    </td>
                                    <td class="text-center"><?= $value['order'] ?></td>
                                </tr>
                            <?php } ?>
                        
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="window.location.reload(true);">Cancel</button>
                    <button type="button" class="btn btn-primary" id="save_button">
                        <span id="save_button_text">Save</span>
                        <span id="save_button_text_hid" style="display: none;"><i class="fa fa-refresh fa-spin"></i> Please Wait... </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    	function delete_image(id,i)
        {
            if(confirm('Are You Sure want To Delete This Category ?')){
                $.ajax({
                    type : "post",
                    url : "<?= base_url() ?>pages/delete_category",
                    data : "id="+id,
                    cache : false,
                    beforeSend: function() {
                        $('#remove_sp'+i).show();
                        $('#remove_bt'+i).hide();
                        $('#main_button'+i).attr('disabled',true);
                    },
                    success:function( out ){
                        setTimeout(function(){  
                            $('#remove_sp'+i).closest('tr').remove();
                            if($('#banners > tbody').find('tr').length == 0)
                            {
                                $('#banners > tbody').append('<tr id="blank_tr"><td colspan="2" class="text-center">No Categories Found</td></tr>');
                            }
                        }, 2000);
                    }
                });
            }
        }


        $(function () {
		    $("#tblLocations").sortable({
		        items: 'tr:not(tr:first-child)',
		        cursor: 'move',
		        axis: 'y',
		        dropOnEmpty: false,
		        start: function (e, ui) {
		            ui.item.addClass("selected");
		        },
		        stop: function (e, ui) {
		            ui.item.removeClass("selected");
		            $(this).find("tr").each(function (index) {
		                if (index > 0) {
		                    $(this).find("td").eq(2).html(index);
		                }
		            });
		        }
		    });

		    $('#save_button').click(function(){
		        var orders = [];
		        $('#tblLocations .td_image').each(function() {
		            orders.push($(this).data('id'));
		        });
		        $.ajax({
		            type : "post",
		            url : "<?= base_url() ?>pages/change_order",
		            data : "data="+JSON.stringify(orders),
		            cache : false,
		            beforeSend: function() {
		                $('#save_button_text_hid').show();
		                $('#save_button_text').hide();
		                $('#save_button_button').attr('disabled',true);
		            },
		            success:function( out ){
		                setTimeout(function(){  
		                    window.location.reload(true);
		                }, 2000);
		            }
		        });
		    });
		});


    </script>

    <style type="text/css">
	    .selected
	    {
	        background-color: #666;
	        color: #fff;
	    }
	</style>