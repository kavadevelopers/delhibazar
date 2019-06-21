<!--============================= CATEGORIES =============================-->
<section class="main-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="styled-heading">
                    <h3>Browse Categories</h3>
                </div>
            </div>
        </div>
        <div class="row">
   
            <?php  foreach ($category as $key => $value) { ?>
                <div onclick="window.location.href='<?= base_url('products/list/').$value['id'] ?>'" class="col-md-3 category-responsive" style="cursor:pointer">
                    
                        <div class="category-block cat_div" style="padding: 30px !important;">
                            
                                <?= $value['name'] ?>
                        
                        </div>
                    
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!--//END CATEGORIES -->
<style type="text/css">
    .cat_div{
        color: black;
        padding: 0px;
        background: #fff;
    }
    .cat_div:hover {
        border: solid 1px #CCC;
        -moz-box-shadow: 1px 1px 5px #999;
        -webkit-box-shadow: 1px 1px 5px #999;
        box-shadow: 1px 1px 5px #999;
    }
</style>