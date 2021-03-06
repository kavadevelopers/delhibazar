<?php 
    function menu($path,$array)
    {
      
        foreach($array as $a)
        {
            if($path === $a)
            {
                print_r(array("active","menu-open",));
                break;  
            }
        }
    }
    $CI =& get_instance();
    $CI->load->model('user_model');
    $id   = $this->session->userdata('id');
    $user = $CI->user_model->ses_user($id)[0];
?> 

    <style type="text/css">
        .nav-treeview .nav-item a{
            font-style: italic;
            font-size: 14px;
        }
    </style>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
        <a href="<?php echo base_url('dashboard'); ?>" class="brand-link" style="padding:0;">
          
          <span class="brand-text font-weight-light"><img src="<?php echo base_url(); ?><?=$this->config->config["logoFile"]?>" alt="<?=$this->config->config["projectName"]?> logo" class=""
               style="width: 100%;"></span>
         
        </a>


        <div class="sidebar">
      
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo base_url(); ?>uploads/user.png" style="width: 40px; height:40px;" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= $user['name'] ?></a>
                    <span style="color: #c2c7d0;">
                        <small></small>
                    </span>
                </div>
            </div>

      
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          
                    <li class="nav-item">
                        <a href="<?php echo base_url('dashboard'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("dashboard"))[0]; ?>">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    
                     <li class="nav-item">
                        <a href="<?php echo base_url('agent'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("agent"))[0]; ?>">
                            <i class="nav-icon fa fa-user-secret"></i>
                            <p>Agent</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('social_user'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("social_user"))[0]; ?>">
                            <i class="nav-icon fa fa-users"></i>
                            <p>Customers</p>
                        </a>
                    </li>

                    

                    <li class="nav-item has-treeview <?php menu($this->uri->segment(1),array("packages"))[1]; ?>">
                
                        <a href="#" class="nav-link <?php menu($this->uri->segment(1),array("packages"))[0]; ?>">
                            <i class="nav-icon fa fa-th-large"></i>
                            <p>Package
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                       
                        <ul class="nav nav-treeview">
                            
                            <li class="nav-item">
                                <a href="<?= base_url('packages/ad_index'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("ad_index","ad"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Ads Packages</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('packages/shop_index'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("shop_index","shop"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Listing Packages</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview <?php menu($this->uri->segment(1),array("shop","shop_offer"))[1]; ?>">
                
                        <a href="#" class="nav-link <?php menu($this->uri->segment(1),array("shop","shop_offer"))[0]; ?>">
                            <i class="nav-icon fa fa-shopping-basket"></i>
                            <p>Listings
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                       
                        <ul class="nav nav-treeview">
                            
                            <li class="nav-item">
                                <a href="<?= base_url('shop/index'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("index"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Listings</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('shop/categories'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("categories"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Categories</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('shop/area'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("area"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Area</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('shop_offer'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("shop_offer"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Offers</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('advertising'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("advertising"))[0]; ?>">
                            <i class="nav-icon fa fa-audio-description"></i>
                            <p>Advertising</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('product'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("product"))[0]; ?>">
                            <i class="nav-icon fa fa-product-hunt"></i>
                            <p>Products</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview <?php menu($this->uri->segment(1),array("card"))[1]; ?>">
                
                        <a href="#" class="nav-link <?php menu($this->uri->segment(1),array("card"))[0]; ?>">
                            <i class="nav-icon fa fa-id-card"></i>
                            <p>Virtual Cards
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                       
                        <ul class="nav nav-treeview">
                            
                            <li class="nav-item">
                                <a href="<?= base_url('card'); ?>" class="nav-link <?php if($this->uri->segment(2) != 'usage' && $this->uri->segment(2) !=  'search' && $this->uri->segment(2) !=  'purchased'){ menu($this->uri->segment(1),array("card"))[0]; } ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Cards</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('card/usage'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("usage"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Usage</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('card/purchased'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("purchased"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Purchased Cards</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('app_setting'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("app_setting"))[0]; ?>">
                            <i class="nav-icon fa fa-android"></i>
                            <p>Vendor App Settings</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview <?php menu($this->uri->segment(1),array("order"))[1]; ?>">
                
                        <a href="#" class="nav-link <?php menu($this->uri->segment(1),array("order"))[0]; ?>">
                            <i class="nav-icon fa fa-file-o"></i>
                            <p>Order
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                       
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('order/pending_order'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("pending_order"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Pending Order</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('order/shipped_order'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("shipped_order"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Shipped Order</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('order/delivered_order'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("delivered_order"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Delivered Order</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('order/deleted_order'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("deleted_order"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Deleted Order</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('coupon'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("coupon"))[0]; ?>">
                            <i class="nav-icon fa fa-percent"></i>
                            <p>Coupon Management</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview <?php menu($this->uri->segment(1),array("pages"))[1]; ?>">
                
                        <a href="#" class="nav-link <?php menu($this->uri->segment(1),array("pages"))[0]; ?>">
                            <i class="nav-icon fa fa-window-restore"></i>
                            <p>Pages
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                       
                        <ul class="nav nav-treeview">
                            
                            <li class="nav-item">
                                <a href="<?= base_url('pages/home'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("home","home_add_save"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Home</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('pages/about'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("about"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>About</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('pages/terms'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("terms"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Terms</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('pages/privacy'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("privacy"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Privacy</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('pages/return_policy'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("return_policy"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Return Policy</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('pages/faq'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("faq","faq_add","edit_faq"))[0]; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>FAQ's</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <?php if($this->session->userdata('id') == '1'){ ?>

                        <li class="nav-item has-treeview <?php menu($this->uri->segment(1),array("category","social_icon","setting"))[1]; ?>">
                
                            <a href="#" class="nav-link <?php menu($this->uri->segment(1),array("category","social_icon","setting"))[0]; ?>">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>Setting
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                           
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('setting/site_setting'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("site_setting"))[0]; ?>">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Site Setting</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('setting/home_banner'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("home_banner"))[0]; ?>">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Home Banners</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('category'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("category"))[0]; ?>">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Product Category</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('category/sub_category'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("sub_category","sub_category_add","sub_edit"))[0]; ?>">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Product Sub Category</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('setting/shop_commission'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("shop_commission"))[0]; ?>">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Shop Commission</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('social_icon'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("social_icon"))[0]; ?>">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Social Icon</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('setting/change_password'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("change_password"))[0]; ?>">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Change Admin Password</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item has-treeview <?php menu($this->uri->segment(1),array("review"))[1]; ?>">
                
                            <a href="#" class="nav-link <?php menu($this->uri->segment(1),array("review"))[0]; ?>">
                                <i class="nav-icon fa fa-pencil-square-o"></i>
                                <p>Review
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                           
                            <ul class="nav nav-treeview">
                                
                                <li class="nav-item">
                                    <a href="<?= base_url('review/product_review'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("product_review","product_review_subindex"))[0]; ?>">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Product Review</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('review/listing_review'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("listing_review","listing_review_subindex"))[0]; ?>">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Listing Review</p>
                                    </a>
                                </li>
                                                            
                            </ul>
                        </li>




                        <li class="nav-item">
                            <a href="<?php echo base_url('newsletter'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("newsletter"))[0]; ?>">
                                <i class="nav-icon fa fa-envelope-o"></i>
                                <p>Newsletter</p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview <?php menu($this->uri->segment(1),array("other"))[1]; ?>">
                
                            <a href="#" class="nav-link <?php menu($this->uri->segment(1),array("other"))[0]; ?>">
                                <i class="nav-icon fa fa-superpowers"></i>
                                <p>Others
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                           
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="<?= base_url('other/search_keywords'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("search_keywords"))[0]; ?>">
                                        <i class="fa fa-search nav-icon"></i>
                                        <p>Search Keywords</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('other/customer_email'); ?>" class="nav-link <?php menu($this->uri->segment(2),array("customer_email"))[0]; ?>">
                                        <i class="fa fa-envelope nav-icon"></i>
                                        <p>Customer Email</p>
                                    </a>
                                </li>
                                                            
                            </ul>
                        </li>



                    <?php } ?>

                    <li class="nav-item">
                        <a href="<?php echo base_url('dashboard/logout'); ?>" class="nav-link">
                            <i class="nav-icon fa fa-sign-out"></i>
                            <p>Sign Out</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
