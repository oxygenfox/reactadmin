<div class="modal fade" id="modal_form" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title">Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id" />
          <div class="form-body">

            <div class="form-group">
              <div class="form-row">
                <div class="col">
                  <label for="control-label" class="col-form-label"><b>Name </b><span class="symbol required"> </span></label>
                  <input type="text" class="form-control" name="jabatan" placeholder="Nama Jabatan">
                  <span class="invalid-feedback"></span>
                </div>
                <div class="col">
                  <label for="control-label" class="col-form-label"><b></b>Gaji Pokok </b><span class="symbol required"> </span></label>
                <input type="text" class="form-control" name="gapok" placeholder="Jumlah Gaji Pokok">
                <span class="invalid-feedback"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col">
                <label class="control-label">Tunjangan Kesehatan <span class="symbol required"> </span></label>
                <input type="text" class="form-control" name="tukes" placeholder="Jumlah Tunjangan Kesehatan">
                <span class="invalid-feedback"></span>
              </div>
              <div class="col">
                <label class="control-label">Tunjangan Transport <span class="symbol required"> </span></label>
                <input name="tutra" placeholder="Jumlah Tunjangan Transport" class="form-control" type="text">
                <span class="invalid-feedback"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col">
                <label class="control-label">Honor Berita <span class="symbol required"> </span></label>
                <input name="honor_1" placeholder="Jumlah Honor Berita" class="form-control" type="text">
                <span class="invalid-feedback"></span>
              </div>
              <div class="col">
                <label class="control-label">Honor Video <span class="symbol required"> </span></label>
                <input name="honor_2" placeholder="Jumlah Honor Video" class="form-control" type="text">
                <span class="invalid-feedback"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col">
                <label class="control-label">PPH <span class="symbol required"> </span></label>
                <input name="pph" placeholder="Potongan PPH" class="form-control" type="text">
                <span class="invalid-feedback"></span>
              </div>
              <div class="col">
                <label class="control-label">BPJS <span class="symbol required"> </span></label>
                <input name="bpjs" placeholder="Potongan BPJS" class="form-control" type="text">
                <span class="invalid-feedback"></span>
              </div>
            </div>
          </div>

        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>