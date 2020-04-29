<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<script src="assets/front/js/common.js"></script>
<script src="<?= PATH_ASSETS ?>dist/vconsole.min.js"></script>

<script>
  $(document).ready(function() {

    window.vConsole = new window.VConsole({
      defaultPlugins: ['system',
        'network',
        'element',
        'storage'],
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