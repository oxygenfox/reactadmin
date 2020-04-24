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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            User Management
                        </h3>
                        <br>
                        <hr>
                        <button type="button" class="btn btn-success btn-sm" id="tambah"><i class="fas fa-plus"></i> Tambah</button>
                    </div>
                    <div class="card-body pad table-responsive">
                        <table class="table table-bordered table-sm" id="myData" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th width="10%">Aktif</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>