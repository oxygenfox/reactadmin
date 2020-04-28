<!-- modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form">
        <div class="modal-body">
          <div class="form-group">
            <label for="title">Nama Menu</label>
            <input type="text" name="title" id="title" class="form-control form-control-sm" placeholder="Nama Menu" required>
          </div>
          <div class="form-group">
            <label for="icon">Icon</label>
            <div class="input-group">
              <input type="text" name="icon" id="icon" class="icp form-control form-control-sm" data-target="#icp" required>
              <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                <div class="input-group-text">
                  <i class="far fa-clock"></i>
                </div>
              </div>
              <script>
                $(function () {
                  $('#timepicker').datetimepicker({
                    format: 'LT'
                  })
                })
              </script>
            </div>
            <span class="h6 small text-primary">Support Icon Picker</span>
          </div>
          <div id="add">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary" id="btn">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<style>
  select {
    font-family: 'FontAwesome', 'sans-serif';
  }
</style>