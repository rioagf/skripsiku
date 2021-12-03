    <footer class="footer-basic">
        <div style="text-align: center; margin-bottom: 15px;">
            <h5>Visitor on This Website</h5>
            <!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
            <!-- Histats.com  START  (aync)-->
            <script type="text/javascript">var _Hasync= _Hasync|| [];
            _Hasync.push(['Histats.start', '1,4600512,4,9,110,60,00011110']);
            _Hasync.push(['Histats.fasi', '1']);
            _Hasync.push(['Histats.track_hits', '']);
            (function() {
                var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
                hs.src = ('//s10.histats.com/js15_as.js');
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
            })();</script>
        <noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4600512&101" alt="best tracker" border="0"></a></noscript>
        <!-- Histats.com  END  -->
        </div>
        <div class="social" style="padding: 7px;">
            <h5>Follow Us on</h5>
        	<a href="#"><i class="icon ion-social-instagram"></i></a>
        	<a href="#"><i class="icon ion-social-twitter"></i></a>
        	<a href="#"><i class="icon ion-social-facebook"></i></a>
        </div>
        <p class="copyright" style="margin: 5px 0px 0px;">Copyright &copy; 2021 - Arif Abdillah. All Right Reserved</p>
    </footer>
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/Simple-Slider.js"></script>

    <script type="text/javascript">

        function removeHighlight(id) {
            $('.demo-table #tutorial-'+id+' li').removeClass('selected');
            $('.demo-table #tutorial-'+id+' li').removeClass('highlight');
        }

        function addRating(obj,id) {
            $('.demo-table #tutorial-'+id+' li').each(function(index) {
                $(this).addClass('selected');
                $('#tutorial-'+id+' #rating').val((index+1));
                if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
                    return false;   
                }
            });
            $.ajax({
                url: "add_rating.php",
                data:'id='+id+'&rating='+$('#tutorial-'+id+' #rating').val(),
                type: "POST"
            });
        }

        function resetRating(id) {
            if($('#tutorial-'+id+' #rating').val() != 0) {
                $('.demo-table #tutorial-'+id+' li').each(function(index) {
                    $(this).addClass('selected');
                    if((index+1) == $('#tutorial-'+id+' #rating').val()) {
                        return false;   
                    }
                });
            }
        } 
    </script>
</body>

</html>