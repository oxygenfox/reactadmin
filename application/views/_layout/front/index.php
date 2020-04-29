<!DOCTYPE html>
<html>

<head>
  <?= $this->load->view('_layout/front/_css.php'); ?>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <?= $this->load->view('_layout/front/navbar.php'); ?>

    <!-- Main Sidebar Container -->
    <?= $this->load->view('_layout/front/sidebar.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Blank Page</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Blank Page</li>
              </ol>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Title</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?= $records_interval ?></h3>

                    <p>
                      Post Last Month
                    </p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3><?= $records ?></h3>

                    <p>
                      Post This Month
                    </p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?= $records_day ?></h3>

                    <p>
                      Post Today
                    </p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                  <div class="inner">
                    <?php
                    $rtotal = $records * 10000;

                    ?>
                    <h3>Rp.<?= number_format($rtotal) ?></h3>

                    <p>
                      Salary estimation
                    </p>
                  </div>
                  <div class="icon">
                    <!-- <i class="ion ion-pie-graph"></i> -->
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <div class="form-group">
                  <input type="text" name="post_date" value="" class="form-control reservation" id="post_date" placeholder="Start date">
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <input type="text" name="post_end_date" value="" class="form-control getDatePicker" id="post_end_date" placeholder="End date">
                </div>
              </div>
              <div class="col-lg-2">
                <div class="form-group row">
                  <button name="filter_order_filter" type="button" class="btn btn-primary btn-block" id="btn-filter" value="filter"><i class="fa fa-search fa-fw"></i></button>
                  <button name="filter_order_filter" type="button" class="btn btn-primary btn-block" id="btn-reset" value="filter">Reset</button>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <table class="table table-bordered table-sm dt-responsive nowrap" id="myData" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Penulis</th>
                      <th>Judul</th>
                      <th>Url</th>
                      <th>Kategori</th>
                      <th>Date</th>
                      <th>Views</th>
                    </tr>
                  </thead>
                  <tbody id="data">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Footer
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <?= $this->load->view('_layout/front/footer.php'); ?>


  </div>
  <!-- ./wrapper -->

  <?= $this->load->view('_layout/front/_js.php'); ?>
  <script>
    var table;

    $(document).ready(function() {
      table = $('#myData').DataTable({
        dom: 'Bfrtlip',
        buttons: [
          'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5'
        ],
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?= site_url('datatable/getLists'); ?>",
          "type": "POST",
          "data": function(data) {
            data.display_name = $('#display_name').val();
            data.post_date = $('#post_date').val();
          },


        },
        "columnDefs": [{
          "targets": [0],
          "orderable": false
        }],
        lengthMenu: [
          [10, 100, -1],
          [10, 100, "All"]
        ],
        pageLength: 10,
      });


      // $('.input-daterange').datepicker({
      //   format: "yyyy-mm",
      //   todayBtn: 'linked',
      //   showOn: "button",
      //   buttonText: "day",
      //   showButtonPanel: true,
      //   autoclose: true
      // });

      $('#btn-filter').click(function() {
        //button filter event click
        table.ajax.reload(); //just reload table
      });
      $('#btn-reset').click(function() {
        //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload(); //just reload table
      });
    })
  </script>

  <script>
    $(function() {
      //Date range picker
      $('#post_date').daterangepicker({
        locale: {
          format: 'YYYY-MM-DD'
        }
      });
    })
  </script>

</body>

</html>