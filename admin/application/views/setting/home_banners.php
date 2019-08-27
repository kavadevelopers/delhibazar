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
            <div class="row">

            	<div class="col-md-6">
                    <div class="card card-secondary"> 
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12" style="text-align: center;">
                                    
                                    <table class="table table-bordered" id="banners">
                                        <tbody>
                                            
                                            <?php if(count(get_home_banners()) > 0){ ?>
                                                <?php foreach (get_home_banners() as $key => $value) { ?>
                                                    <tr>
                                                        <td class="text-center">
                                                           <div class="img-product-div">
                                                                <img src="<?= base_url().'uploads/home_banners/'.$value[0] ?>" class="img-bannner" alt="no images" >
                                                            </div> 

                                                            <div style="margin-top: 10px;">
                                                                <button type="button" class="btn btn-sm btn-danger" onclick="return delete_image('<?= $value[1]; ?>','<?= $key ?>');" title="Delete" id="main_button<?= $key ?>">
                                                                    
                                                                    <i class="fa fa-trash" id="remove_bt<?= $key ?>"></i>
                                                                    <span id="remove_sp<?= $key ?>" style="display: none;">
                                                                        <i class="fa fa-refresh fa-spin"></i>
                                                                        Please Wait
                                                                    </span>
                                                            </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            <?php }else{ ?>
                                                <tr>
                                                    <td class="text-center">Banners Not Found</td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                        <div class="col-md-6 text-center">
                            <div class="fileUpload btn btn--browse">
                                <span><i class="fa fa-image"></i> Add Image</span>
                                <input type="file" name="my_image" class="upload" id="product_image" accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-6 text-center" style="padding: 10px;">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#order_modal">Change Order</button>
                        </div>
                </div>

            </div>
        </div>
    </section>




    <style type="text/css">
        .fileUpload {
            margin-top: 10px;     
            position: relative;
            overflow: hidden;
        }
        .fileUpload input.upload {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .btn--browse{
            border-radius: 5px;
            background-color: #e8d804;
            color: black;
            padding: 5px 14px;
            text-align: center;
        }

        .btn--browse:hover{
            border: solid 1px #000;
        }

        .img-bannner{
            width: 100%;
            border: solid 1px #cccccc;
        }

        .img-bannner-div{
            width: 100%;
            padding: 5px;
            border: solid 1px #cccccc;
        }

        .img-product-div{
            padding: 5px;
            border: solid 1px #cccccc;
            margin: 0 auto;
        }
    </style>

    <div class="modal" id="banner_modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Your Image</h5>
                    <button type="button" class="close" onclick="window.location.reload(true);" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="image_demoa"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="window.location.reload(true);">Cancel</button>
                    <button type="button" class="btn btn-primary" id="upload_banner_button">
                        <span id="upload_banner_text">Upload Image</span>
                        <span id="upload_banner_text_hid" style="display: none;"><i class="fa fa-refresh fa-spin"></i> Uploading... </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="order_modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Drag Images To Change Order</h5>
                    <button type="button" class="close" onclick="window.location.reload(true);" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="tblLocations" cellpadding="0" cellspacing="0" border="1" style="margin:0 auto;">
                        
                            <tr>
                                <th>Banner</th>
                                <th>Order</th>
                            </tr>
                        
                            <?php foreach (get_home_banners() as $key => $value) { ?>
                                <tr>
                                    <td class="td_image" data-id="<?= $value[1] ?>">
                                        <img src="<?= base_url().'uploads/home_banners/'.$value[0] ?>" class="img-bannner" alt="no images" >
                                    </td>
                                    <td class="text-center"><?= $value[2] ?></td>
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
        $(document).ready(function(){
                $image_crop = $('#image_demoa').croppie({
                    enableExif: true,
                    largeMode: true,
                    viewport: {
                        width: 300,
                        height: 160,
                        type: 'squre'
                    },
                    boundary: {
                        width: 350,
                        height: 200
                    }
                });

                var url = "#";
                $('#product_image').on('change', function () { readFile(this);  url = "<?= base_url('setting/save_image') ?>"; });
                

                $('#upload_banner_button').click(function(event){
                    $image_crop.croppie('result', {
                        type: 'canvas',
                        size: {
                            width: 500,
                            height: 270
                        }
                    }).then(function(response){
                        $.ajax({
                            url:url,
                            type: "POST",
                            data:{"image": response},
                            beforeSend: function() {
                                $('#upload_banner_text_hid').show();
                                $('#upload_banner_text').hide();
                                $('#upload_banner_button').attr('disabled',true);
                            },
                            success:function(data)
                            {
                                setTimeout(function(){  
                                    window.location.reload(true);
                                }, 2000);
                            }
                        });
                    })
                });
        });  



        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();          
                reader.onload = function (e) {
                    result = e.target.result;
                    arrTarget = result.split(';');
                    tipo = arrTarget[0];
                    if (tipo == 'data:image/jpeg' || tipo == 'data:image/png' || tipo == 'data:image/jpg') {
                        $image_crop.croppie('bind', {
                            url: e.target.result
                        });
                        $('#banner_modal').modal('show');
                    } else {
                        alert('Accept only .jpg o .png image types');
                    }
                }           
                reader.readAsDataURL(input.files[0]);
            }
        }

        function delete_image(id,i)
        {
            if(confirm('Are You Sure want To Delete This Banner ?')){
                $.ajax({
                    type : "post",
                    url : "<?= base_url() ?>setting/delete_image",
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
                                $('#banners > tbody').append('<tr id="blank_tr"><td colspan="2" class="text-center">No Data Found</td></tr>');
                            }
                        }, 2000);
                    }
                });
            }
        }

    </script>

    <script type="text/javascript">
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
            url : "<?= base_url() ?>setting/change_banner_order",
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
    table th, table td
    {
        width: 100px;
        padding: 5px;
        border: 1px solid #ccc;
        cursor: move;
    }
    .selected
    {
        background-color: #666;
        color: #fff;
    }
</style>