<?= $css ?>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="preloader">
    <div class="loading">
      <img src="<?= base_url() ?>assets/img/loader.gif" width="300">
      <p class="text-center">Harap Tunggu</p>
    </div>
  </div>


  <div class="wrapper">
    <?= $navbar ?>


    <!-- Main Sidebar Container -->
    <?= $sidebar ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="show_data">
      <?= $view ?>
    </div>
    <!-- /.content-wrapper -->
    <?= $footer ?>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->



  <?= $js ?>
</body>

</html>