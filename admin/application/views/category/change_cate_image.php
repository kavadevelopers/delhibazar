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
                                            <img src="<?= base_url().'uploads/category/'.get_category_image($id); ?>" class="img-bannner" alt="no images" >
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
                        <span id="upload_banner_text">Upload Banner</span>
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

                $('#upload_image').on('change', function () { readFile(this);  url = "<?= base_url('category/cate_save_banner') ?>"; });

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







