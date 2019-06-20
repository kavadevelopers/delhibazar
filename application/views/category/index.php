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
                <div class="col-md-3 category-responsive">
                    <a href="#" class="category-wrap">
                        <div class="category-block">
                            
                                <a href="<?= base_url('products/list/').$value['id'] ?>"><?= $value['name'] ?></a>
                        
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!--//END CATEGORIES -->