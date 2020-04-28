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
            <label for="title">Nama Submenu</label>
            <input type="text" name="title" id="title" class="form-control form-control-sm" placeholder="Nama Menu" required>
          </div>
          <div class="form-group">
            <label for="icon">Icon</label>
            <input type="text" name="icon" id="icon" class="icp-auto form-control form-control-sm" placeholder="Icon" required>
          </div>
          <div class="form-group">
            <label for="url">Url</label>
            <input type="text" name="url" id="url" class="form-control form-control-sm" placeholder="Url" required>
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