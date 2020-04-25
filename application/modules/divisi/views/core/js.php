<!-- css -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>


<!-- js -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">



<!-- Control -->
<script type="text/javascript">
  var save_label;
  var table;

  $(document).ready(function() {
    //DataTable
    table = $('#myData').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
        "url": "<?= site_url('divisi/list') ?>",
        "type": "POST"
      },
      "columnDefs": [{
        "targets": [-1],
        "orderable": false,
      }],
    });

    $('#modal_form').on('hidden.bs.modal', function(e) {
      var inputs = $('#form input, #form textarea, #form select');
      inputs.removeClass('is-valid is-invalid');
    });
  });

  function swalert(method) {
    Swal.fire({
      title: 'Success',
      text: 'Data has been ' + method,
      type: 'success'
    });
  };

  function new_data() {
    save_label = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('New Form'); // Set Title to Bootstrap modal title
  }

  function edit_data(id) {
    save_label = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
      url: "<?= site_url('divisi/edit/') ?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        $('[name="id"]').val(data.id_pekerjaan);
        $('[name="jabatan"]').val(data.jabatan);
        $('[name="gapok"]').val(data.gapok);
        $('[name="tukes"]').val(data.tukes);
        $('[name="tutra"]').val(data.tutra);
        $('[name="honor_1"]').val(data.honor_1);
        $('[name="honor_2"]').val(data.honor_2);
        $('[name="pph"]').val(data.pph);
        $('[name="bpjs"]').val(data.bpjs);
        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Edit Form'); // Set title to Bootstrap modal title
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error get data from ajax');
      }
    });
  }

  function reload() {
    table.ajax.reload(null, false); //reload datatable ajax
  }

  function save() {
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled', true); //set button disable
    var url,
    method;

    if (save_label == 'add') {
      url = "<?= site_url('divisi/add') ?>";
      method = 'saved';
    } else {
      url = "<?= site_url('divisi/update') ?>";
      method = 'updated'
    }

    // ajax adding data to database
    $.ajax({
      url: url,
      type: "POST",
      data: $('#form').serialize(),
      dataType: "json",
      success: function(data) {
        //console.log(data);
        if (data.status) //if success close modal and reload ajax table
        {
          $('#modal_form').modal('hide');
          reload();
          swalert(method);
        } else {
          $.each(data.errors, function(key, value) {
            $('[name="' + key + '"]').addClass('is-invalid'); //select parent twice to select div form-group class and add has-error class
            $('[name="' + key + '"]').next().text(value); //select span help-block class set text error string
            if (value == "") {
              $('[name="' + key + '"]').removeClass('is-invalid');
              $('[name="' + key + '"]').addClass('is-valid');
            }
          });
        }
        $('#btnSave').text('save'); //change button text
        $('#btnSave').attr('disabled',
          false); //set button enable
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error adding / update data');
        $('#btnSave').text('save'); //change button text
        $('#btnSave').attr('disabled',
          false); //set button enable
      }
    });

    $('#form input, #form textarea').on('keyup', function() {
      $(this).removeClass('is-valid is-invalid');
    });
    $('#form select').on('change', function() {
      $(this).removeClass('is-valid is-invalid');
    });
  }

  function delete_data(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        // ajax delete data to database
        $.ajax({
          url: "<?= site_url('divisi/delete') ?>/" + id,
          type: "POST",
          dataType: "JSON",
          success: function(data) {
            reload();
            swalert('deleted');
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert('Error deleting data');
          }
        });
      }
    });
  }
</script>