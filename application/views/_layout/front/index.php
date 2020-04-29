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
              <div class="col-lg-2">
                <div class="form-group">
                  <input type="text" name="order_id" value="" class="form-control" id="filter-order-no" placeholder="Order No">
                </div>
              </div>
              <div class="col-lg-2">
                <div class="form-group">
                  <input type="text" name="name" value="" class="form-control" id="filter-name" placeholder="Name">
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <input type="text" name="order_start_date" value="" class="form-control getDatePicker" id="order-start-date" placeholder="Start date">
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <input type="text" name="order_end_date" value="" class="form-control getDatePicker" id="order-end-date" placeholder="End date">
                </div>
              </div>
              <div class="col-lg-2">
                <div class="form-group">
                  <button name="filter_order_filter" type="button" class="btn btn-primary btn-block" id="filter-order-filter" value="filter"><i class="fa fa-search fa-fw"></i></button>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div id="render-list-of-order">
                </div>
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

</body>
</html>