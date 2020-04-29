<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<script src="assets/dist/vconsole.min.js"></script>

<script>
  $(document).ready(function() {

    window.vConsole = new window.VConsole({
      defaultPlugins: ['system',
        'network',
        'element',
        'storage'
      ],
      // 可以在此设定要默认加载的面板
      maxLogNumber: 1000,
      // disableLogScrolling: true,
      onReady: function() {
        console.log('vConsole is ready.');
      },
      onClearLog: function() {
        console.log('on clearLog');
      }
    });
  });
</script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- daterangepicker -->
<script src="<?= PATH_ASSETS ?>plugins/moment/moment.min.js"></script>
<script src="<?= PATH_ASSETS ?>plugins/daterangepicker/daterangepicker.js"></script>