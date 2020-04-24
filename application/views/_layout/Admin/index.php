<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= PATH_ASSETS ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cde.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="preloader">
    <div class="loading">
      <img src="<?= base_url() ?>assets/img/loader.gif" width="300">
      <p class="text-center">
        Harap Tunggu
      </p>
    </div>
  </div>


  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url() ?>home" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url() ?>home#page8" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-6">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>

            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-fw fa-user"></i>
            <?= $this->session->userdata('user') ?>
          </a>
          <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
            <a href="<?= site_url('admin/logout') ?>" class="dropdown-item">
              <i class="fas fa-fw fa-sign-out-alt mr-2"></i> Logout
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="<?= PATH_ASSETS ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="menu">
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="show_data">
      <?= $view ?>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; <?= date('Y') ?><a href="http://adminlte.io"> Reactadmin</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.2
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $(document).ready(function() {
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      $.ajax({
        url: '<?= site_url('admin/menu') ?>',
        type: 'post',
        dataType: 'json',
        success: function(data) {
          var menu = ''
          for (var i = 0; i < data.length; i++) {
            var sub = '';
            for (var j = 0; j < data[i].submenu.length; j++) {
              submenu = '<li class="nav-item" data-url="' + data[i].submenu[j].url + '">' +
                '<a href="#' + data[i].submenu[j].url + '" class="nav-link">' +
                '<i class="' + data[i].submenu[j].icon + ' nav-icon"></i>' +
                '<p>' + data[i].submenu[j].title + '</p>' +
                '</a>' +
                '</li>';
              sub += submenu;
            }
            menu += '<li class="nav-item has-treeview">' +
              '<a href="#" class="nav-link">' +
              '<i class="nav-icon ' + data[i].icon + '"></i>' +
              '<p>' +
              data[i].title +
              '<i class="right fas fa-angle-left"></i>' +
              '</p>' +
              '</a>' +
              '<ul class="nav nav-treeview submenu" >' + sub + '</ul>' +
              '</li>';
          }
          $('#menu').html(menu);
          $('.nav-link').click(function() {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
          });
          // $('.submenu').on('click', '.nav-item', function() {
          //   url = $(this).data('url');
          //   $('#show_data').load('<?= site_url() ?>' + '/' + url);
          // });
          $('.submenu').on('click', 'li', function() {
            link = $(this).data('url');
            $.ajax({
              url: '<?= site_url() ?>' + link,
              type: 'get',
              success: function(data) {
                $('#show_data').html(data);
              },
              error: function(status) {
                let html = '<section class="content">' +
                  '<div class="d-flex justify-content-center align-items-center mt-20" id="mnsn">' +
                  '<h1 class="mr-3 pr-3 mt-20 align-top border-right inline-block align-content-center">' + status.status + '</h1>' +
                  '<div class="inline-block align-middle">' +
                  '<h2 class="font-weight-normal lead" id="desc">' + status.statusText + '</h2>' +
                  '</div>' +
                  '</div>' +
                  '</section>';
                // console.log(status.status);
                $('#show_data').html(html);
              }
            })
          });
        }
      });
      // $('#profile').click(function() {
      //     $('#show_data').load('<?= site_url('profile') ?>');
      // })

    });
  </script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

  <!-- Bootstrap 4 -->
  <script src="<?= PATH_ASSETS ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= PATH_ASSETS ?>plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= PATH_ASSETS ?>plugins/toastr/toastr.min.js"></script>
  <!-- JQVMap -->
  <script src="<?= PATH_ASSETS ?>plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= PATH_ASSETS ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= PATH_ASSETS ?>plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= PATH_ASSETS ?>plugins/moment/moment.min.js"></script>
  <script src="<?= PATH_ASSETS ?>plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= PATH_ASSETS ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?= PATH_ASSETS ?>plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= PATH_ASSETS ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= PATH_ASSETS ?>dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?= PATH_ASSETS ?>dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= PATH_ASSETS ?>dist/js/demo.js"></script>
</body>

</html>