<section class="content-header">
  <h1>
    <?= $title ?>
  </h1>
</section>

<section class="content">

  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile" id="pro">

        </div>
      </div>
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="card card-primary card-outline">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Medsos</a></li>
            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
          </ul>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <form class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-2">Nama App</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4">Nomor Telepon</label>
                  <div class="col-sm-10">
                    <input type="text" name="no" class="form-control" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2">Alamat</label>
                  <div class="col-sm-10">
                    <textarea name="alamat" cols="30" rows="3" class="form-control" disabled></textarea>
                  </div>
                </div>
              </form>
            </div>

            <div class="tab-pane" id="timeline">
              <!-- The timeline -->
              <div class=" ">
                <button type="button" id="tambah" class="btn btn-primary">Tambah</button>
                <hr>
                <div class="table-responsive">
                  <table class="table table-bordered table-sm" id="myData" width="100%">
                    <thead class="thead-dark">
                      <tr>
                        <th>No</th>
                        <th>Url</th>
                        <th>Icon</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="data">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="settings">
              <form id="profil" action="#" method="post" class="form-horizontal">
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama App</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="gambarLama">
                    <input type="text" name="nama" id="nama" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="no" class="col-sm-4 control-label">Nomor Telepon</label>
                  <div class="col-sm-10">
                    <input type="number" name="no" id="no" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="3" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="gambar" class="col-sm-2">Logo</label>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <label for="gambar" class="col-sm-4" id="reset"><img class="img-fluid" src="<?= base_url() ?>assets/img/noimage.png" id="output" width="200px" height="200px"></label>
                      <div class="col-sm-8">
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)" id="gambar" name="gambar">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" id="save" class="btn btn-success"><i class="fa fa-fw fa-save"></i> Simpan</button>
                <button type="button" id="btn-reset" class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i> Reset</button>
              </form>

            </div>
            <!-- /.tab-content -->
          </div>


        </section>