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