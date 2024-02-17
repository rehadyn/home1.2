<!DOCTYPE html>
<!--
  Hyperspace by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<?php include 'head.php'; ?>
<!-- Body -->

<body class="is-preload">
    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Intro -->
        <?php include 'intro.php'; ?>
        <!-- One -->
        <?php include 'one.php'; ?>
        <!-- Two -->
        <?php include 'two.php'; ?>
        <!-- Three -->
        <?php include 'three.php'; ?>
        <!-- Four -->
        <?php include 'four.php'; ?>
    </div>
    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Script -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- /script -->
    <!-- script toastr -->
    <script src="assets/toastr/toastr.min.js"></script>
  	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
   
</body>

<!--  -->
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

</html>