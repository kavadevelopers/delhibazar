<?php 
    $CI=&get_instance();
    $CI->load->model('product_model');
?>


<!DOCTYPE html>
<html>
    <head>
        <link href="<?= base_url() ?>home_file/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>home_file/css/home_style.css">
        <link rel="shortcut icon" href="<?= base_url() ?>image/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>DELHIBAZAR</title>
        <link rel="stylesheet" href="<?= base_url() ?>home_file/jQueryUI/jquery-ui.css">

        <link rel="stylesheet" href="<?= base_url() ?>home_file/css/font-awesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="<?= base_url() ?>user_login/alert/sweetalert.css">

        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="<?= base_url() ?>home_file/jQueryUI/jquery-ui.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>home_file/js/main.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>home_file/kava.js"></script>
        <link rel="stylesheet" href="<?= base_url() ?>home_file/kava.css">

        <script src="<?= base_url() ?>user_login/alert/sweetalert.min.js"></script>
        <script async src="https://platform-api.sharethis.com/js/sharethis.js#property=5cfd1d9d4351e9001264fde8&product=sticky-share-buttons"></script>
        <script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>

    

    </head>
    <body>

        <!-- <div class="overlay-2">
          <div class="videoBox" id="videobox">
            <a class="close"><i class="fa fa-close a-iii"></i></a>
            <video autoplay controls src="<?= base_url() ?>SampleVideo.mp4"></video>
          </div>
        </div> -->

        <div id="wrapper">
            <div class="overlay"></div>
            <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
                <ul class="nav sidebar-nav">
                    <li class="sidebar-brand">
                        <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                            <span class="hamb-top"></span>
                            <span class="hamb-middle"></span>
                            <span class="hamb-bottom"></span>
                        </button>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>">Home</a>
                    </li>

                    <li>
                        <a href="<?= base_url(); ?>#">Shopping</a>
                    </li>
                    
                    <li>
                        <a href="<?= base_url(); ?>#">Blog</a>
                    </li>
                    
                    <?php if($this->session->userdata('id')) { ?>
                        <li>
                            <a href="<?= base_url(); ?>welcome/logout">Logout</a>
                        </li>
                    <?php } else{ ?> 

                        <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>login">Login</a>
                        
                    <?php } ?>


                </ul>
            </nav>

            <div class="container" style="margin-top: 5px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2 col-lg-2 col-xs-12 col-sm-12">
                            <!-- clock widget start -->
                                <script type="text/javascript"> var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href","//s.bookcdn.com//css/cl/bw-cl-120x45.css"); document.getElementsByTagName("head")[0].appendChild(css_file); </script> <div id="tw_5_2056819673"><div style="width:130px; height:45px; margin: 0 auto;"><a href="https://booked.net/time/new-delhi-18038">New Delhi</a><br/></div></div> <script type="text/javascript"> function setWidgetData_2056819673(data){ if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = ''; var params = data.results[i]; objMainBlock = document.getElementById('tw_'+params.widget_type+'_'+params.widget_id); if(objMainBlock !== null) objMainBlock.innerHTML = params.html_code; } } } var clock_timer_2056819673 = -1; </script> <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/time/info?ver=2&domid=209&type=5&id=2056819673&scode=2&city_id=18038&wlangid=1&mode=1&details=0&background=35475e&color=ffffff&add_background=a0a1a1&add_color=ffffff&head_color=ffffff&border=2&transparent=0"></script>
<!-- clock widget end -->

                        </div>
                        <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12" style="margin-top: 5px;">
                            <div class="tradingview-widget-container" style="height: auto !important;">
                              <div class="tradingview-widget-container__widget"></div>
                              <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
                              <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                              {
                              "symbols": [
                                {
                                  "description": "USD/INR",
                                  "proName": "OANDA:USDINR"
                                },
                                {
                                  "description": "EUR/INR",
                                  "proName": "FX_IDC:EURINR"
                                },
                                {
                                  "description": "GOLD/INR",
                                  "proName": "FX_IDC:XAUINR"
                                },
                                {
                                  "description": "BSE",
                                  "proName": "NSE:BSE"
                                },
                                {
                                  "description": "NIFTY",
                                  "proName": "NSE:NIFTY"
                                },
                                {
                                  "description": "RELIANCE",
                                  "proName": "NSE:RELIANCE"
                                }
                              ],
                              "colorTheme": "dark",
                              "isTransparent": false,
                              "displayMode": "adaptive",
                              "locale": "in"
                            }
                              </script>
                            </div>
                        </div>

                        <div class="col-md-2 col-lg-2 text-center col-xs-12 col-sm-12">
                        <!-- weather widget start -->
                        <a target="_blank" href="https://www.booked.net/weather/new-delhi-18038"><img src="https://w.bookcdn.com/weather/picture/26_18038_1_1_34495e_250_2c3e50_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=2&domid=w209&anc_id=65336"  alt="booked.net"/></a>
                        <!-- weather widget end -->
                        </div>

                    </div>
                </div>
            </div>
            <div style="width: 100%; padding:10px;"></div>
            <div class="container">
                <div class="row justify-content-md-center">
                        <div class="col-md-10 text-center center-fource justify-content-md-center">
                            <div class="col-md-1"></div>
                                <?php foreach ($top_add as $key => $value) { ?>
                                    <div class="col-md-2">
                                        <a href="<?= $value['link'] ?>" target="_blank">
                                            <div class="col-md-12 add_div">
                                                <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $value['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                                <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                    <?= cut_string($value['business_name'],16,'...') ?>        
                                                </h5>
                                                <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                    <i class="fa fa-phone"></i> <?= $value['mobile'] ?>
                                                </p>
                                                <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                    <i class="fa fa-info-circle"></i> 
                                                    <?= cut_string($value['intro'],22,'...') ?>  
                                                </p>
                                                <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                    <i class="fa fa-map-marker"></i> 
                                                    <?= cut_string($value['address'],22,'...') ?>  
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                              <?php  } ?>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-12 col-xs-12 col-lg-12 col-md-6 col-sm-12" style="margin-bottom: 20px; margin-top: 15px;">
                                <img class="center-block" src="<?= base_url() ?>image/logo.png" width="270" alt="DELHIBAZAR" id="logo">
                                <form method="post" action="<?= base_url() ?>welcome/list">
                                    <div class="row text-center center_new_f">
                                        <div class="col-12 col-xs-12 col-lg-6 col-md-6 col-sm-12">
                                            <div class="input-group">
                                                    <input type="text" id="search" class="form-control" placeholder="what are you looking for?" name="search" style="border-radius: 50px 0px 0px 50px; padding: 20px;">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary" type="submit" style="border-radius: 0px 50px 50px 0px; padding: 10px 16px;"><i class="fa fa-search"></i></button>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </form>
                            </div>
                        </div>
                    <div class="row"> 
                        <div class="col-md-10 text-center center-fource justify-content-md-center">
                            <div class="col-md-1"></div>
                                <?php foreach ($bottom_add as $key => $value) { ?>
                                    <div class="col-md-2 block_cen">
                                        <a href="<?= $value['link'] ?>" target="_blank">
                                            <div class="col-md-12 add_div">
                                                <img src="<?= $this->config->config['admin_url'] ?>uploads/add/<?= $value['photo'] ?>" class="add_image" style="margin-bottom: 2px;">
                                                <h5 style="text-align: left; margin: 0 2px; font-weight: bold; margin-bottom: 2px;">
                                                    <?= cut_string($value['business_name'],16,'...') ?>        
                                                </h5>
                                                <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                    <i class="fa fa-phone"></i> <?= $value['mobile'] ?>
                                                </p>
                                                <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                    <i class="fa fa-info-circle"></i> 
                                                    <?= cut_string($value['intro'],22,'...') ?>  
                                                </p>
                                                <p style="text-align: left; margin: 0 2px; font-size: 10px;">
                                                    <i class="fa fa-map-marker"></i> 
                                                    <?= cut_string($value['address'],22,'...') ?>  
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                <?php  } ?>
                            <div class="col-md-1"></div>
                        </div>
                </div>
            </div>
                

                <div id="footer" style="margin-top: 20px;">
                    <div class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">

                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <div class="col-md-4 col-xs-12 col-sm-12" style="display: flex; justify-content: center; margin:5px 0">

                                    
                                    <a href="<?= base_url(); ?>pages/about" class="a_footer">About</a>
                                    <a href="<?= base_url(); ?>pages/contact" class="a_footer">Contact</a>
                                    

                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12" style="display: flex; justify-content: center; margin:5px 0">
                                     
                                        <?php foreach (social_icons() as $key => $value) { ?>
                                             
                                            
                                            <a href="<?= $value['link'] ?>" target="_blank" class="a_footer"> 
                                                <i class="fa <?= $value['class'] ?>"></i>
                                            </a>
                                            
                                            
                                        <?php } ?>
                                    
                                </div>
                                <div class="col-md-4  col-xs-12 col-sm-12" style="display: flex; justify-content: center; margin:5px 0">
                                    
                                    
                                      <a href="<?= base_url(); ?>pages/terms" class="a_footer"> 
                                        Terms
                                      </a>
                                  
                                      <a href="<?= base_url(); ?>pages/privacy" class="a_footer"> 
                                        Privacy
                                      </a>

                                    </ul>

                                </div>
                            </div>

                        </div>
                        <div class="container-fluid copyrights_div">
                            
                            <p>Copyright &copy; 2019 DELHIBAZAR | <span>Powered By : <a style="color: #c5322d;" target="_blank" href="https://kavadevelopers.com">Kava Developers</a></span></p>
                            
                        </div>
                    </div>
                </div>
            

        </div>

            <!--  HEADER 2 SESSION MESSAGE -->
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
            </script>
            <!-- //  HEADER 2 SESSION MESSAGE -->
            <script type="text/javascript">
              $(function() {
                  $(document).on('keyup',function(e) {
                    if (e.keyCode == 27) {
                        $('.overlay-2').remove();
                    }
                  });
                            
                  $('body').on('click','.overlay-2, .close', function() {
                    $('.overlay-2').remove();
                  });
                            
                  $('body').on('click','.videoBox', function(e) {
                      e.stopPropagation();
                  });
              });




              startTime();
              $(function(){
                  $('form').submit(function(){
                      if($.trim($('#search').val()) == '')
                      {
                          return false;
                      }

                  });

                  $( "#search").autocomplete({
                      source: "<?= base_url('welcome/shop_autocomplete/?');?>",
                      select: function (event, ui) {
                          $("#search").val(ui.item.label);
                        }
                  });

                   $( "#search").addClass('search');

                  $('iframe').load( function() {
                      $('iframe').contents().find("head")
                        .append($("<style type='text/css'>  #weatherWidget{ font-size: 12px !important; }  </style>"));
                  });
              });
            </script>
           
    </body>
</html>

