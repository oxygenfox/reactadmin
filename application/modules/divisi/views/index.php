<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section class="content-header">
  <h1>
    <?= $title ?>
  </h1>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">

            <button class="btn btn-sm btn-primary" onclick="new_data()"><i class="fa fa-plus"></i> Create</button>
            <button class="btn btn-sm btn-secondary" onclick="reload()"><i class="fa fa-refresh"></i> Reload</button>
          </div>
          <div class="card-body pad table-responsive">
            <table class="table table-bordered table-sm dt-responsive nowrap" id="myData" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jabatan</th>
                  <th>Gaji Pokok</th>
                  <th>Tj. Kesehatan</th>
                  <th>Tj. Transport</th>
                  <th>Honor Berita</th>
                  <th>Honor Video</th>
                  <th>PPH21</th>
                  <th>BPJS</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>