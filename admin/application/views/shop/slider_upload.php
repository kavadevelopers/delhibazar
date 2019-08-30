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
            <form method="post" action="<?=  base_url() ?>shop/slider_upload" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">

                        <div class="card card-secondary"> 
                            <div class="card-header">
                                <h3 class="card-title">Add Image</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div id="fine-uploader-validation"></div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Image <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" id="image" type="file" name="image" placeholder="Image" value="<?= set_value('image'); ?>" accept="image/*" data-type='image' required>
                                            <?= form_error('image'); ?>
                                            <p id="error1" style="display:none; color:#FF0000;">
                                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                            </p>
                                            <p id="error2" style="display:none; color:#FF0000;">
                                            Maximum File Size Limit is 2MB.
                                            </p>
                                        </div>
                                        
                                        <span style="font-style: italic"><b class="text-danger">Note </b>: Please Upload (672 x 414) image for better experiance</span>
                                    </div>
                                </div>
                            </div>
                            
                            <input type="hidden" name="shop_id" value="<?= $this->uri->segment('3') ?>">

                            <div class="card-footer">
                                <div class="float-right">
                                  <a href="<?= base_url(); ?>shop" class="btn btn-danger">Cancel</a>
                                  <button type="submit" id="submit" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="card card-secondary"> 
                            <div class="card-header">
                                <h3 class="card-title">Featured Image</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12" style="text-align: center;">
                                        
                                        <div class="img-bannner-div">
                                            <img src="<?= base_url().'uploads/shop/'._s_banner_img($id); ?>" class="img-bannner" alt="no images">
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
                </div>
            </form>    
        </div>
    </section>


    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th id="action" style="min-width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($shop_slider_image as $key => $value) { ?>

                                        <tr class="text-center">
                                            <td><img src="<?= base_url().'uploads/slider/'.$value['image'] ?>" width="100px;" max-height="100px;" /></td>
                                            <td><?= date('d-m-Y H:i:A',strtotime($value['created_at'])) ?></td>
                                            
                                            <td>
                                                
                                                <a class="btn btn-sm btn-danger" href="<?= base_url() ?>shop/slider_delete/<?= $value['id'] ?>" onclick="return confirm('Are you Sure You Want to Delete this Shop Slider .?');" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>

                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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


<script type="text/javascript">

$('button[type="submit"]').prop("disabled", true);
var a=0;
//binds to onchange event of your input field

$('#image').bind('change', function() {
if ($('button:submit').attr('disabled',false)){
    $('button:submit').attr('disabled',true);
    }
var ext = $('#image').val().split('.').pop().toLowerCase();
if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
    $('#error1').slideDown("slow");
    $('#error2').slideUp("slow");
    a=0;
    }else{
    var picsize = (this.files[0].size);
    if (picsize > 2000000){
    $('#error2').slideDown("slow");
    a=0;
    }else{
    a=1;
    $('#error2').slideUp("slow");
    }
    $('#error1').slideUp("slow");
    if (a==1){
        $('button:submit').attr('disabled',false);
        }
}
});
</script>

<script type="text/javascript">
    
    $(function(){
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

        $('#upload_image').on('change', function () { readFile(this);  url = "<?= base_url('shop/save_banner') ?>"; });

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
                    data:{"image": response,"id" : "<?= $id ?>"},
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
</script>


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