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
            <form method="post" action="<?= base_url(); ?>order/<?= $link[0] ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-secondary"> 
                            <div class="card-header">
                                <h3 class="card-title">Tracking Information</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        
                                        <table class="table table-bordered" id="table_traking">
                                            <thead>
                                                <tr>
                                                    <th>Details</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php if(!$this->order_model->get_traking($order['id'])){ ?>

                                                    <tr id="blank_tr">
                                                        <td colspan="2" class="text-center">No Data Found</td>
                                                    </tr>

                                                <?php }else{ ?>

                                                    <?php $II = 0; foreach ($this->order_model->get_traking($order['id']) as $key => $value) { $II++; ?>
                                                        
                                                        <tr data-id="<?= $II ?>">
                                                            <td>
                                                                <?= $value['detail'] ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-sm btn-danger" onclick="return remove_row(this.id,'<?= $II; ?>','<?= $value['id']; ?>');" title="Remove" id="remove<?= $II ?>">
                                                                    <i class="fa fa-close" id="remove_bt<?= $II ?>"></i>
                                                                    <span id="remove_sp<?= $II ?>" style="display: none;">
                                                                        <i class="fa fa-refresh fa-spin"></i>
                                                                        Please Wait
                                                                    </span>
                                                                </button>
                                                            </td>
                                                        </tr>

                                                    <?php } ?>

                                                <?php } ?>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th class="text-center">
                                                        <button type="button" id="add_row" class="btn btn-warning btn-sm" title="Add New Traking Detail"><i class="fa fa-plus"></i> Add Row</button>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <label class="container" title="Please Check If Order Is delivered.">
                                            Shipped
                                            <input type="checkbox" class="chk_box" name="shipped" value="1" <?php if($order['delivered'] == '2'){ echo "checked"; } ?>>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container" title="Please Check If Order Is delivered.">
                                            Delivered
                                            <input type="checkbox" class="chk_box" name="delivered" value="1">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                    <input type="hidden" name="Ord_Id" value="<?= $order['id'] ?>">
                                    <a href="<?= base_url(); ?>order/<?= $link[1] ?>" class="btn btn-danger">Cancel</a>
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
            $('#add_row').click(function(){
                if($('#blank_tr').length > 0)
                {
                    $('#blank_tr').remove();
                }

                if($('#table_traking > tbody').find('tr').length == 0){
                    var i = 1;
                }
                else{
                    var i = $("#table_traking > tbody > tr:last-child").data("id") + 1;
                }

                $('#table_traking > tbody').append('<tr data-id="'+i+'"><td><input type="text" name="traking[]" class="form-control" placeholder="Add Details" required></td><td class="text-center"><button type="button" onclick="return remove_dynamic(this.id)" class="btn btn-sm btn-danger" title="Remove" id="remove'+i+'"><i class="fa fa-close" id="remove_bt'+i+'"></i></button></td></tr>');
            });
        });

        function remove_dynamic(id)
        {
            if(confirm('Are You Sure want To Remove This Row?')){
                $('#'+id).closest('tr').remove();
            }
        }

        function remove_row(id,i,traking_id)
        {
            if(confirm('Are You Sure want To Delete This Detail?')){
                $.ajax({
                    type : "post",
                    url : "<?= base_url() ?>order/delete_traking",
                    data : "id="+traking_id,
                    cache : false,
                    beforeSend: function() {
                        $('#remove_sp'+i).show();
                        $('#remove_bt'+i).hide();
                    },
                    success:function( out ){
                        setTimeout(function(){  
                            $('#'+id).closest('tr').remove();
                            if($('#table_traking > tbody').find('tr').length == 0)
                            {
                                $('#table_traking > tbody').append('<tr id="blank_tr"><td colspan="2" class="text-center">No Data Found</td></tr>');
                            }
                        }, 2000);
                    }
                });
            }
        }
    </script>