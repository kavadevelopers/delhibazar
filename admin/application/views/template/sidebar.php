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
    $user = $CI->user_model->ses_user()[0];
?> 

    <style type="text/css">
        .nav-treeview .nav-item a{
            font-style: italic;
            font-size: 14px;
        }
    </style>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
        <a href="<?php echo base_url('dashboard'); ?>" class="brand-link">
          
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
                    
                    <?php if($this->session->userdata('id') == '1'){ ?>

                        <li class="nav-item has-treeview <?php menu($this->uri->segment(1),array("category"))[1]; ?>">
                
                            <a href="#" class="nav-link <?php menu($this->uri->segment(1),array("category"))[0]; ?>">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>Setting
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                           
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('category'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("category"))[0]; ?>">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Product Category</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('social_icon'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("social_icon"))[0]; ?>">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Social Icon</p>
                                    </a>
                                </li>

                            </ul>

                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url('agent'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("agent"))[0]; ?>">
                                <i class="nav-icon fa fa-users"></i>
                                <p>Agent</p>
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

                            </ul>

                        </li>

                    <?php } ?>

                    <li class="nav-item">
                        <a href="<?php echo base_url('product'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("product"))[0]; ?>">
                            <i class="nav-icon fa fa-product-hunt"></i>
                            <p>Products</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('shop'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("shop"))[0]; ?>">
                            <i class="nav-icon fa fa-shopping-basket"></i>
                            <p>Shops</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('social_user'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("social_user"))[0]; ?>">
                            <i class="nav-icon fa fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('advertising'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("advertising"))[0]; ?>">
                            <i class="nav-icon fa fa-audio-description"></i>
                            <p>Advertising</p>
                        </a>
                    </li>

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
