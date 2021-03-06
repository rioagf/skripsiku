        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; 2021 - Arif Abdillah. All Right Reserved</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout')?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('sb')?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('sb')?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('sb')?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('sb')?>/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('sb')?>/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('sb')?>/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('sb')?>/js/demo/chart-pie-demo.js"></script>


<!-- Page level plugins -->
<script src="<?= base_url('sb')?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('sb')?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('sb')?>/js/demo/datatables-demo.js"></script>
<script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('ckeditor');
    CKEDITOR.replace('desk_layanan');
    CKEDITOR.replace('desk_testimoni');
    CKEDITOR.replace('desk_profile');
    CKEDITOR.replace('visi');
    CKEDITOR.replace('misi');
    CKEDITOR.replace('desk_laporankeuangan');
    CKEDITOR.replace('desk_karir');
    CKEDITOR.replace('desk_artikel');
</script>

<script>
  function changeHandler(val)
  {
    if (Number(val.value) > 100)
    {
        val.value = 100
    } else if (Number(val.value) < 0) {
        val.value = 0
    }
  }
</script>

<script>
    document.getElementById("progress").onkeyup=function(){
        var input=parseInt(this.value);
        if(input<0 || input>100)
        alert("Value should be between 0 - 100");
    }    
</script>

</body>

</html>