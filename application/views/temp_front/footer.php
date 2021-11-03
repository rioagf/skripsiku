    <footer class="footer-basic">
        <div class="social" style="padding: 7px;">
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
        function highlightStar(obj,id) {
            removeHighlight(id);        
            $('.demo-table #tutorial-'+id+' li').each(function(index) {
                $(this).addClass('highlight');
                if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
                    return false;   
                }
            });
        }

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