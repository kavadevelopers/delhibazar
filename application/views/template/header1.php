<?php 
    $CI=&get_instance();
    $CI->load->model('product_model');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style type="text/css">
        body::-webkit-scrollbar {
            width: 10px;
        }
     
        body::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            border-radius: 10px;
        }
         
        body::-webkit-scrollbar-thumb {
          background-color: #ffc107;
          border-radius: 10px;
          outline: 1px solid slategrey;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="<?= get_setting()['meta_keywords'] ?>">
    <meta name="description" content="<?= get_setting()['meta_description'] ?>">
    <link rel="shortcut icon" href="<?= base_url() ?>image/favicon.png">
    <title>DELHIBAZAR</title>
    <link rel="stylesheet" href="<?= base_url() ?>temp_1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>temp_1/css/simple-line-icons.css">

    <!-- Fa Fa Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>home_file/css/font-awesome/css/font-awesome.min.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>temp_1/css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="<?= base_url() ?>temp_1/css/set1.css">
    <!-- Swipper Slider -->
    <link rel="stylesheet" href="<?= base_url() ?>temp_1/css/swiper.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>temp_1/css/magnific-popup.css">
    <!-- Main CSS -->

    <link rel="stylesheet" href="<?= base_url() ?>user_login/alert/sweetalert.css">
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    
    <link rel="stylesheet" href="<?= base_url() ?>temp_1/css/style.css">
    <script src="<?= base_url() ?>temp_1/js/jquery-3.2.1.min.js"></script>

    <script src="<?= base_url() ?>user_login/alert/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>home_file/kava.js"></script>
    <script async src="<?= base_url() ?>temp_1/js/sharethis.js"></script>
    <script async src="https://platform-api.sharethis.com/js/sharethis.js#property=5cfd1d9d4351e9001264fde8&product=sticky-share-buttons"></script>

    <style type="text/css">
        body {
            font-family: 'Nunito', sans-serif !important;
        }
        .add_image{
            border-radius: 8px 8px 0px 0px;
        }
        .add_div{
            border: 1px solid black;
            border-radius: 10px;
            /*box-shadow: 0px 0px 0px 1px;*/
            color: black;
            padding: 0px;
            background: #fff;
            }
            .add_div:hover {
                border: solid 1px #CCC;
                -moz-box-shadow: 1px 1px 5px #999;
                -webkit-box-shadow: 1px 1px 5px #999;
                box-shadow: 1px 1px 5px #999;
            }
            @media (min-width:768px) and (max-width:991px){
                .hidden-sm{
                    display:none!important
                }
            }
            @media (max-width:767px){.hidden-xs{display:none!important}}
            @media (min-width:992px) and (max-width:1199px){.hidden-md{display:none!important}}
            @media (min-width:1200px){.hidden-lg{display:none!important}}
    </style>

</head>

<body>

<script type="text/javascript">
<?php if(!empty($this->session->flashdata('error'))){ ?>
JSalert();
function JSalert()
{
    swal("Cancelled", "<?= $this->session->flashdata('error'); ?>", "error");
}
  

<?php $this->session->set_flashdata('error',''); } ?>

<?php if(!empty($this->session->flashdata('msg'))){ ?>
JSalert();
function JSalert(){
    swal("Congrats!","<?= $this->session->flashdata('msg'); ?>", "success");
}
<?php $this->session->set_flashdata('msg',''); } ?>

<?php if(!empty($this->session->flashdata('ok'))){ ?>
JSalert();
function JSalert(){
    swal("Congrats!","<?= $this->session->flashdata('ok'); ?>", "success");
}
<?php $this->session->set_flashdata('ok',''); } ?>

</script>


    <!--============================= HEADER =============================-->
    <div class="dark-bg sticky-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="<?= base_url(); ?>" style="width: 300px;" ><img src="<?= base_url(); ?>image/logo.png" style="width: 100%;"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon-menu"></span>
            </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url(); ?>home">Home</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url(); ?>pages/about">About</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url(); ?>">Listing</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url(); ?>pages/terms">Terms</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url(); ?>pages/privacy">Privacy</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url(); ?>pages/faq">Faq's</a>
                                </li>

                                <?php if($this->session->userdata('id')) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url() ?>welcome/logout">Logout</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-toggle="modal" data-target="#user_detail">Profile</a>
                                    </li>
                                <?php }else{ ?> 
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url() ?>login">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url() ?>register">Register</a>
                                    </li>
                                <?php } ?>

                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User
                                    <span class="icon-arrow-down"></span>
                                    </a>
                                    
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">


                                    </div>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url(); ?>pages/contact">Contact</a>
                                </li>


                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--//END HEADER -->

    <?php if($this->session->userdata('id')) { ?>
        <?php $Suser = $this->db->get_where('social_user',['id' => $this->session->userdata('id')])->row() ?>
        <div class="modal fade" id="user_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-right">ID</th>
                            <td><?= $this->session->userdata('id') ?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Name</th>
                            <td><?= $Suser->first_name.' '.$Suser->last_name ?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Email</th>
                            <td><?= $Suser->email ?></td>
                        </tr>
                    </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>