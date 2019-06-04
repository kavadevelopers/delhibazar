<!DOCTYPE html>
<html>
    <head>
        <link href="<?= base_url() ?>home_file/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>home_file/css/home_style.css">
        <link rel="shortcut icon" href="<?= base_url() ?>image/favicon.png">
        <title>DELHIBAZAR</title>
        <link rel="stylesheet" href="<?= base_url() ?>home_file/jQueryUI/jquery-ui.css">

        <link rel="stylesheet" href="<?= base_url() ?>home_file/css/font-awesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="<?= base_url() ?>user_login/alert/sweetalert.css">

        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="<?= base_url() ?>home_file/jQueryUI/jquery-ui.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>home_file/js/main.js"></script>

        <script src="<?= base_url() ?>user_login/alert/sweetalert.min.js"></script>
        
        <script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
    </head>
    <body>
        <div class="sticky-container">
            <ul class="sticky">
                <li>
                    <img width="32" height="32" title="" alt="" src="<?= base_url() ?>image/fb1.png" />
                    <p>Facebook</p>
                </li>
                <li>
                    <img width="32" height="32" title="" alt="" src="<?= base_url() ?>image/tw1.png" />
                    <p>Twitter</p>
                </li>
                <li>
                    <img width="32" height="32" title="" alt="" src="<?= base_url() ?>image/pin1.png" />
                    <p>Pinterest</p>
                </li>
                <li>
                    <img width="32" height="32" title="" alt="" src="<?= base_url() ?>image/li1.png" />
                    <p>Linkedin</p>
                </li>
                
            </ul>
        </div>
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
                        <a href="#">Contact</a>
                    </li>
                    

                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Works <span class="caret"></span></a>
                        <ul class="dropdown-menu my-dropdown" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li> -->
                    <?php if($this->session->userdata('id')) { ?>
                        <li>
                            <a href="<?= base_url(); ?>welcome/logout">Logout</a>
                        </li>
                    <?php } else{ ?> 

                        <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>login">Login</a>
                        
                    <?php } ?>
                </ul>
            </nav>

            <div class="container-fluid" style="margin-top: 5px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2 col-lg-2">
                            <p class="date_top_p">
                                <span id="MydateDisplay"></span>
                            </p>
                        </div>
                        <div class="col-md-8 col-lg-8">
                            <div class="tradingview-widget-container">
                              <div class="tradingview-widget-container__widget"></div>
                              <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
                              <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
                              {
                              "symbols": [
                                {
                                  "title": "S&P 500",
                                  "proName": "OANDA:SPX500USD"
                                },
                                {
                                  "title": "Shanghai Composite",
                                  "proName": "INDEX:XLY0"
                                },
                                {
                                  "title": "EUR/USD",
                                  "proName": "FX_IDC:EURUSD"
                                },
                                {
                                  "title": "BTC/USD",
                                  "proName": "BITSTAMP:BTCUSD"
                                },
                                {
                                  "title": "ETH/USD",
                                  "proName": "BITSTAMP:ETHUSD"
                                }
                              ],
                              "locale": "en"
                            }
                              </script>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 text-center">
                            <a target="_blank" href="https://www.booked.net/weather/new-delhi-18038"><img src="https://w.bookcdn.com/weather/picture/26_18038_1_1_f1c411_250_f39c13_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=124&domid=w209&anc_id=61221"  alt="booked.net"/></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                        <span class="hamb-top"></span>
                        <span class="hamb-middle"></span>
                        <span class="hamb-bottom"></span>
                    </button>
                </div>
            </div>

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
                        <div class="col-md-12" style="margin-bottom: 20px; margin-top: 15px;">
                            <img class="center-block" src="<?= base_url() ?>image/logo.png" width="270" alt="DELHIBAZAR" id="logo">
                            <form method="post" action="<?= base_url() ?>welcome/list">
                                <div class="row text-center">
                                    <div class="col-12 col-xs-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="input-group">
                                                <input type="text" id="search" class="form-control" name="search" style="border-radius: 50px 0px 0px 50px; padding: 20px;">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="submit" style="border-radius: 0px 50px 50px 0px; padding: 10px 16px;"><i class="fa fa-search"></i></button>
                                                </span>
                                        </div>
                                    </div>
                                </div>

                                
                            </form>
                        </div>
                        
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

                

                <div id="footer">
                    <div class="navbar navbar-default navbar-fixed-bottom" role="navigation">
                        <div class="container">

                            <ul class="nav navbar-nav navbar-left">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">

                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Terms</a></li>

                            </ul>
                        </div>
                        <div class="container-fluid copyrights_div">
                            
                            <p>Copyright &copy; 2019 DELHIBAZAR | <span>Powered By : <a style="color: #c5322d;" target="_blank" href="https://kavadevelopers.com">Kava Developers</a></span></p>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>

            <script type="text/javascript">
                startTime();
                $(function(){
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

           
    </body>
</html>

