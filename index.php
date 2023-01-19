<?php
require "ceklogin.php";
require "config.php";
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<?php include "header.php" ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php include "navbar.php" ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/Admin.png" alt="Bengkel Andalan" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Andalan Bengkel</span>
    </a>

   <?php include "sidebar.php" ?>
  </aside>

  <?php 
    if(isset($_GET['p'])){
      $page = $_GET['p'];
      include "hal/".$page.".php";
    } else {
      include "hal/dashboard.php";
    }
    ?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
<?php include "footer.php" ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
