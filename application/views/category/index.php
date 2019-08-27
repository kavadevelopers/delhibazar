<!--============================= CATEGORIES =============================-->
<section class="main-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="row  _main_div">
                    <div class="col-md-5">
                        <img src="<?= get_category_image($id) ?>" style="width: 100%;">
                    </div>
                    <div class="col-md-7 text-center center_main">
                        <p><?= $cate[0]['name'] ?></p>
                    </div>
                </div>    
            </div>
        </div>
        <br><br>
        <div class="row justify-content-center">
                        
            <?php  foreach ($this->product_model->get_sub_category($id) as $_key => $_value) { ?>

                <div class="col-md-3" style="margin-bottom: 2%;">
                    <div class="col-md-12 _main_div" onclick="window.location.href='<?= base_url('products/list/').$_value['id'] ?>'">
                        
                        <div class="row">
                            <div class="col-md-5">
                                <img src="<?= get_subcategory_image($_value['id']) ?>" style="width: 100%;">
                            </div>
                            <div class="col-md-7 text-center center_main">
                                <p><?= $_value['name'] ?></p>
                            </div>
                        </div>

                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</section>
<!--//END CATEGORIES -->
<style type="text/css">
    
    ._main_div:hover {
        border: solid 1px #CCC;
        -moz-box-shadow: 1px 1px 5px #999;
        -webkit-box-shadow: 1px 1px 5px #999;
        box-shadow: 1px 1px 5px #999;
    }

    .center_main{
        display: flex;
        align-items: center;
    }

    .center_main p{
        width: 100%;
    }

    ._main_div{
        padding: 5px;
        margin-top:5px; 
        cursor: pointer;
        border: 1px solid #cccccc;
    }

    .main-block {
        padding: 27px 0 !important;
    }
</style>