<footer class="main-block dark-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    
                    <p>Copyright &copy; 2019 DELHIBAZAR | Powered By : <a href="http://kavadevelopers.com" target="_blank">Kava Developers</a></p>
                    
                    
                </div>
            </div>
        </div>
    </div>
</footer>
<!--//END FOOTER -->
    
    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="<?= base_url() ?>temp_1/js/popper.min.js"></script>
    <script src="<?= base_url() ?>temp_1/js/bootstrap.min.js"></script>
    <!-- Magnific popup JS -->
    <script src="<?= base_url() ?>temp_1/js/jquery.magnific-popup.js"></script>
    <!-- Swipper Slider JS -->
    <script src="<?= base_url() ?>temp_1/js/swiper.min.js"></script>
    
    <script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
<script>
if ($('.image-link').length) {
    $('.image-link').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });
}
if ($('.image-link2').length) {
    $('.image-link2').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });
}
</script>
</body>

</html>