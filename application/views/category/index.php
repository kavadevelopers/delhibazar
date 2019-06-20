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
                <div onclick="location.href='<?= base_url('products/list/').$value['id'] ?>'" class="col-md-3 category-responsive" style="cursor:pointer">
                    <a href="<?= base_url('products/list/').$value['id'] ?>" class="category-wrap">
                        <div class="category-block add_div" style="padding: 30px !important;">
                            
                                <a href="<?= base_url('products/list/').$value['id'] ?>"><?= $value['name'] ?></a>
                        
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!--//END CATEGORIES -->
<script type="text/javascript">
    $("div").click(function(){
       window.location=$(this).find("a").attr("href"); return false;
    });
</script>