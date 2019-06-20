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
            <div class="col-md-3 category-responsive">
                <a href="#" class="category-wrap">
                    <div class="category-block">
                        
                        <?php  foreach ($CI->product_model->get_category() as $key => $value) { ?>
                                            
                            <a class="dropdown-item" href="<?= base_url('products/list/').$value['id'] ?>"><?= $value['name'] ?></a>
                    
                        <?php } ?>
                        
                        <h6>Automotive</h6>

                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!--//END CATEGORIES -->