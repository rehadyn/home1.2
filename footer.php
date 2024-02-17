<footer id="footer" class="wrapper style1-alt">
    <div class="inner">
        <ul class="menu">
            <li>&copy; Reza Hadiwijaya Dynasti. All rights reserved.</li>
            <li>Thanks: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </div>
</footer>
<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/toastr/toastr.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        echo "<script>toastr.success('Pesan berhasil terkirim.')</script>";
    } else if ($_GET['status'] == 'error') {
        echo "<script>toastr.error('Pesan gagal terkirim.')</script>";
    } else if ($_GET['status'] == 'error2') {
        echo "<script>toastr.error('Format email tidak valid.')</script>";
    } else if ($_GET['status'] == 'error3') {
        echo "<script>toastr.error('Formulir tidak boleh kosong.')</script>";
    }
}
?>