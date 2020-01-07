<style type="text/css">
.color-red{ color : red;font-weight:bold; }

.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    display: none;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

.most_p_list{
    cursor: pointer;
}
</style>
    
    <script src="<?= base_url(); ?>zoom/jquery.exzoom.js"></script>
    <link href="<?= base_url(); ?>zoom/jquery.exzoom.css" rel="stylesheet" type="text/css"/>
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Virtual Card - <?= $product['id'] ?></h2>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->
        
    


<!--================Single Product Area =================-->
<div class="product_image_area" style="padding-bottom: 120px;">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_product_img">
                    <div id="loader_product" style="background: #fff;border:1px solid #cccccc;width: 100%;height: 100%;position: absolute;z-index: 9;padding: 40%;">
                        
                        <object data="<?= base_url() ?>zoom/loader.svg" type="image/svg+xml"></object>
                    </div>
                    <div class="exzoom hidden" id="exzoom">
                        <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>
                                <li><img src="<?= get_card_image($product['id']) ?>"/></li>
                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                        </p>
                    </div>

                    <script type="text/javascript">

                        $(document).ready( function() {
                            $("#exzoom").exzoom({
                                    autoPlay: false,
                            });
                            setTimeout(function(){
                                $("#loader_product").hide();
                            },2000)
                        });

                    </script>

                </div>
            </div>

            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>Virtual Card - <?= $product['id'] ?></h3>
                    
                    <h2>₹<?= $product['price'] ?></h2>
                    <ul class="list">
                        <li>
                            <b>Validity : </b><?= $product['validity'] == '0'?'Unlimited':$product['validity'].' Days'; ?>
                        </li>
                        <li>
                            <b>Usage : </b><?= $product['total_usage'] == '0'?'Unlimited':$product['total_usage'].' Times / Card'; ?>
                        </li>
                        <li style="max-height: 260px;overflow: auto;">
                            <?= $product['desc'] ?>
                        </li>
                    </ul>
                    
                    <form method="post" id="add_to_cart" action="<?= base_url() ?>products/purchase_card" style="margin-top: 20px;">
                        <div class="card_area row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Referral ID(optional)</label>
                                    <input type="text" class="form-control form-control-sm" id="referel_id" name="referel_id" placeholder="Referral ID(optional)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bank/UPI details(optional)</label>
                                    <textarea type="text" class="form-control form-control-sm" id="bank" name="bank" placeholder="Bank/UPI details(optional)"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card_area">
                            <?php if($this->session->userdata('id')) { ?>
                                <button type="submit" class="main_btn btn btn-sm">Buy Now</button>
                            <?php } else { ?>
                                <a href="#myModal" type="submit" class="main_btn btn btn-sm" data-toggle="modal">Buy Now</a>
                            <?php } ?>
                        </div>
                        <input type="hidden" name="user_id" value="<?= $this->session->userdata('id') ?>">
                        <input type="hidden" name="grand_total" value="<?= $product['price'] ?>">
                        <input type="hidden" name="product_id" value="<?= $this->uri->segment('3') ?>">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->




