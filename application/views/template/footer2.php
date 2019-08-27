<!--================ start footer Area  =================-->	
        <footer class="footer-area">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">About Us</h6>
                            <p><?= nl2br(get_setting()['short_about']) ?></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Newsletter</h6>
                            <p>Stay updated with our latest trends</p>      
                            <form action="<?= base_url(); ?>welcome/save_newalatter" id="news_form" method="post" class="subscribe_form relative">
                                <div id="mc_embed_signup">
                                    <div class="input-group d-flex flex-row">
                                        <input name="email" id="news_email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" type="email">
                                        <input type="hidden" name="url" value="<?= base_url(uri_string()); ?>">
                                        <button type="submit" class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>      
                                    </div>       
                                    <p style="margin-left: 10px; color: red; font-weight: bold;" id="err_newslatter"></p>                     
                                </div>
                            </form>
                        </div>
                    </div>
                   
                    <div class="col-lg-4 col-md-6 col-sm-6 text-center">
                        <div class="single-footer-widget f_social_wd">
                            <h6 class="footer_title">Follow Us</h6>
                            <p style="text-align: center;max-width: none;">Let us be social</p>
                            <div class="f_social">
                                
                                <?php foreach (social_icons() as $key => $value) { ?>

                                <a href="<?= $value['link'] ?>" target="_blank"><i class="fa <?= $value['class'] ?>"></i></a>

                                <?php } ?>
                            
                            </div>
                        </div>
                    </div>                      
                </div>


                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-12 footer-text text-center">
                    Copyright &copy 2019 DELHIBAZAR | Powered By : <a href="http://kavadevelopers.com" target="_blank">Kava Developers</a>
                    </p>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->
        
        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">              
                        <h4 class="modal-title">Login</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" role="alert" id="Login_alert" style="display: none;">
                            
                        </div>
                        <form action="#" method="post" id="modal_login_form">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="email" class="form-control" id="modal_login_username" placeholder="Email" required="required">

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" id="modal_login_password" placeholder="Password" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn submit_btn" style="cursor: pointer;" id="modal_login_submit">
                                    <span id="but_main">Login</span>
                                    <span id="load" style="display: none;"><i class='fa fa-circle-o-notch fa-spin'></i> Please Wait</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">Don't have an account? <a href="<?= base_url() ?>register">Register Here</a></div>
                </div>
            </div>
        </div>
            
        <script type="text/javascript">
            $(function(){
                $('#modal_login_form').submit(function(e){
                    e.preventDefault();
                    var user = $('#modal_login_username').val();
                    var pass = $('#modal_login_password').val();

                    $.ajax({
                        type : "post",
                        url : "<?= base_url() ?>login/modal_login",
                        data : "email="+user+"&password="+pass,
                        cache : false,
                        dataType: "json",
                        beforeSend: function() {
                            $('#modal_login_submit').attr('disabled',true);
                            $('#load').show();
                            $('#but_main').hide();
                        },
                        success:function( out ){
                            setTimeout(function(){
                                $('#modal_login_submit').removeAttr('disabled');
                                $('#load').hide();
                                $('#but_main').show();
                                if(out[0] == 'true')
                                {
                                    window.location.reload();
                                }
                                else
                                {
                                    $('#Login_alert').html(out[1]);
                                    $('#Login_alert').show();
                                }

                            }, 1000);
                        }
                    });
                })
            })
        </script>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <link rel="stylesheet" href="<?= base_url() ?>temp_1/css/jquery_validation.css">
        <script src="<?= base_url() ?>temp_1/js/validate.min.js"></script>
        <script src="<?= base_url() ?>temp_1/js/validate-additional-methods.min.js"></script>
        
        


        <script src="<?= base_url() ?>user_login/js/popper.js"></script>
        <script src="<?= base_url() ?>user_login/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>user_login/js/stellar.js"></script>
        <script src="<?= base_url() ?>user_login/vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="<?= base_url() ?>user_login/vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="<?= base_url() ?>user_login/vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="<?= base_url() ?>user_login/vendors/isotope/isotope-min.js"></script>
        <script src="<?= base_url() ?>user_login/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?= base_url() ?>user_login/js/jquery.ajaxchimp.min.js"></script>
        <script src="<?= base_url() ?>user_login/js/mail-script.js"></script>
        <script src="<?= base_url() ?>user_login/vendors/jquery-ui/jquery-ui.js"></script>
        <script src="<?= base_url() ?>user_login/vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="<?= base_url() ?>user_login/vendors/counter-up/jquery.counterup.js"></script>
        <script src="<?= base_url() ?>user_login/js/theme.js"></script>


        <script type="text/javascript">
            $(function() {
                $(document).click(function (event) {
                    $('.navbar-collapse').collapse('hide');
                });
            })
        </script>

        
    </body>
</html>