</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>
                <img src="<?= base_url('assets/images/logo-panjang-hitam.png'); ?>" alt="" width="200">
            </span>
        </div>
    </div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="<?= base_url('assets/cms/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/cms/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/cms/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/cms/'); ?>js/ruang-admin.min.js"></script>
<script src="<?= base_url('assets/cms/'); ?>vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/cms/'); ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/cms/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/cms/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable(); // ID From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>
<script>
    var html5QrCodeScanner = new Html5QrcodeScanner("reader", {
        fps: 10,
        qrbox: 250
    });

    document.getElementById("scan").addEventListener("click", function() {
        html5QrCodeScanner.render(onScanSuccess, onScanError);
    });

    function onScanSuccess(qrCodeMessage) {
        window.location.href = qrCodeMessage;
    }

    function onScanError(errorMessage) {
        console.error(errorMessage);
    }
</script>
</body>

</html>