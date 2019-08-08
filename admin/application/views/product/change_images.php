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
                    <div class="col-md-3">
                        <div class="card card-secondary"> 
                            <div class="card-header">
                                <h3 class="card-title">Featured Image</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12" style="text-align: center;">
                                        
                                        <div class="img-bannner-div">
                                            <img src="<?= base_url().'uploads/product/banner/'._p_banner_img($product['id']); ?>" class="img-bannner" alt="no images" >
                                        </div>

                                        <div class="fileUpload btn btn--browse">
                                            <span>Change Image</span>
                                            <input type="file" name="my_image" class="upload" id="upload_image" accept="image/*">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-secondary"> 
                            <div class="card-header">
                                <h3 class="card-title">Product Images </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12" style="text-align: center;">
                                        
                                        <table class="table table-bordered">
                                            <tbody>
                                                
                                                <?php if(!empty(get_product_images($product['id']))){ ?>
                                                    <?php foreach (get_product_images($product['id']) as $key => $value) { ?>
                                                        <tr>
                                                            <td class="text-center">
                                                               <div class="img-product-div">
                                                                    <img src="<?= base_url().'uploads/product/'.$value[0] ?>" class="img-bannner" alt="no images" >
                                                                </div> 

                                                                <div style="margin-top: 10px;">
                                                                    <button type="button" class="btn btn-sm btn-danger" onclick="return delete_image('<?= $value[1]; ?>','<?= $key ?>');" title="Delete">
                                                                        
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
                                                        <td class="text-center">Images Not Found</td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>
                                                        <div class="fileUpload btn btn--browse">
                                                            <span><i class="fa fa-image"></i> Add Image</span>
                                                            <input type="file" name="my_image" class="upload" id="product_image" accept="image/*">
                                                        </div>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-secondary"> 
                            <div class="card-header">
                                <h3 class="card-title">Size Chart</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12" style="text-align: center;">
                                        
                                        <?php if(SizeChart($product['id']) != ""){ ?>
                                            <div class="img-bannner-div">
                                                <img src="<?= base_url().'uploads/product/sizechart/'.SizeChart($product['id']); ?>" class="img-bannner" alt="no images" >
                                            </div>

                                            <div class="row text-center">
                                                <a class="btn btn-sm btn-danger" href="<?= base_url();?>product/deleteChart_Image/<?= $product['id'];?>" onclick="return confirm('Are you Sure You Want to Delete this Size Chart ?');" title="Delete" style="margin: 5px auto;">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>

                                        <?php }else{ ?>

                                            <p class="text-center">No Image Found</p>

                                        <?php } ?>

                                        <div class="fileUpload btn btn--browse">
                                            <span>
                                                <?php if(SizeChart($product['id']) == ''){ ?>
                                                    Add Image
                                                <?php }else{ ?>
                                                    Change Image
                                                <?php } ?>
                                            </span>
                                            <input type="file" name="my_image" class="upload" id="size_chart" accept="image/*">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
        </div>
    </section>


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
            width: 100px;
            padding: 5px;
            border: solid 1px #cccccc;
            margin: 0 auto;
        }
    </style>


    <script type="text/javascript">
        $(document).ready(function(){
                $image_crop = $('#image_demoa').croppie({
                    enableExif: true,
                    viewport: {
                        width: 175,
                        height: 175,
                        type: 'squre'
                    },
                    boundary: {
                        width: 200,
                        height: 200
                    }
                });

                var url = "#";

                $('#upload_image').on('change', function () { readFile(this);  url = "<?= base_url('product/save_banner') ?>"; });
                $('#product_image').on('change', function () { readFile(this);  url = "<?= base_url('product/save_image') ?>"; });
                $('#size_chart').on('change', function () { readFile(this);  url = "<?= base_url('product/save_Chart') ?>"; });

                $('#upload_banner_button').click(function(event){
                    $image_crop.croppie('result', {
                        type: 'canvas',
                        size: {
                            width: 500,
                            height: 500
                        }
                    }).then(function(response){
                        $.ajax({
                            url:url,
                            type: "POST",
                            data:{"image": response,"product_id" : "<?= $product['id'] ?>"},
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
            if(confirm('Are You Sure want To Delete This Image ?')){
                $.ajax({
                    type : "post",
                    url : "<?= base_url() ?>product/delete_image",
                    data : "id="+id,
                    cache : false,
                    beforeSend: function() {
                        $('#remove_sp'+i).show();
                        $('#remove_bt'+i).hide();
                    },
                    success:function( out ){
                        setTimeout(function(){  
                            $('#remove_sp'+i).closest('tr').remove();
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







