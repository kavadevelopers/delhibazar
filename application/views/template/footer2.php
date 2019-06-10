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
                            <div id="mc_embed_signup">
                                <form action="<?= base_url(); ?>welcome/save_newalatter" method="post" class="subscribe_form relative">
                                    <div class="input-group d-flex flex-row">
                                        <input name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                        <input type="hidden" name="url" value="<?= base_url(uri_string()); ?>">
                                        <button type="submit" class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>      
                                    </div>                                  
                                    <div class="mt-10 info"></div>
                                </form>
                            </div>
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
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
        
        


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
    </body>
</html>