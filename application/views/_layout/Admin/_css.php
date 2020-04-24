  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= PATH_ASSETS ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= PATH_ASSETS ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= PATH_ASSETS ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= PATH_ASSETS ?>plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="<?= PATH_ASSETS ?>plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= PATH_ASSETS ?>dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= PATH_ASSETS ?>dist/css/style.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= PATH_ASSETS ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= PATH_ASSETS ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= PATH_ASSETS ?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- jQuery -->
  <script src="<?= PATH_ASSETS ?>plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= PATH_ASSETS ?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- 引入vConsole的JS库 -->
  <script src="<?= PATH_ASSETS ?>dist/vconsole.min.js"></script>

  <script>
      $(document).ready(function() {
          setTimeout(function() {
              $(".preloader").fadeOut();
          }, 1000);
          var page = window.location.hash.substr(1);
          if (page == "") page = "admin/dashboard";
          $('#show_data').load('<?= site_url() ?>' + '/' + page);
      });

      window.vConsole = new window.VConsole({
          defaultPlugins: ['system', 'network', 'element', 'storage'], // 可以在此设定要默认加载的面板
          maxLogNumber: 1000,
          // disableLogScrolling: true,
          onReady: function() {
              console.log('vConsole is ready.');
          },
          onClearLog: function() {
              console.log('on clearLog');
          }
      });
  </script>