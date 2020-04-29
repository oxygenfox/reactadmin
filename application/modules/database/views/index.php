<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?= $title ?></h1>
      </div>
    </div>
  </div>
</div>
<section class="content">
  <div class="card">
    <div class="card-body">
      <h3>Database Backup</h3><br>
      <!-- <a href="https://codeglamour.com/php/adminlite/admin/export/dbexport" class="btn btn-success"><i class="fa fa-download"></i> &nbsp; Download & Create Backup</a> -->
      <form action="<?= base_url(); ?>database/backup" method="post">
        <div class="form-row align-items-center">
          <div class="col-auto">
            <label class="sr-only" for="inlineFormInput">Name</label>
            <select class="custom-select my-1 mr-sm-2" name="tabel">
              <option selected>Choose...</option>
              <?php
              foreach ($tabel as $baris) {
                ?>
                <option value="<?php echo $baris->Tables_in_db_cs; ?>"><?php echo $baris->Tables_in_db_cs; ?></option>
                <?php
              } ?>
            </select>
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary"><i class="fa fa-download"></i> &nbsp;Backup Table</button>
            <a href="<?= base_url() ?>database/backup_all" class="btn btn-success"><i class="fa fa-download"></i> &nbsp; Backup All Database</a>
          </div>
        </div>
      </form>
      <br>
      <hr>
      <h3>Database Restore</h3><br>
      <?php echo form_open_multipart('database/restore'); ?>
      <!--<input type="file" name="datafile" id="datafile" />-->
      <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="datafile" id="datafile">
            <label class="custom-file-label" for="datafile">Choose file</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text" id="">Upload</span>
          </div>
        </div>
      </div>
      <!--<button type="submit" class="btn btn-primary">Upload Database</button>-->
    </form>
  </div>
</div>
</section>

<script>
$(document).ready(function() {
var spanSubmit = $('.input-group-text');

spanSubmit.on('click', function() {
$(this).closest('form').submit();
// Will also work, but might fail if nesting is changed:
// $(this).parent().submit();
});

$('#datafile').on('change', function() {
//get the file name
var fileName = $(this).val();
//replace the "Choose a file" label
$(this).next('.custom-file-label').html(fileName);
})

});
</script>