<!-- css -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>


<!-- js -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">



<!-- Control -->
<script>
  $(document).ready(function() {
    const form = $('.modal-body').html();
    $('#myData').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
        "url": "<?= site_url('user/getLists'); ?>",
        "type": "POST"
      },
      "columnDefs": [{
        "targets": [0],
        "orderable": false
      }]
    });
    $('#tambah').click(function() {
      $('.modal-body').html(form);
      tambah =
      '<input type="hidden" name="aksi" id="aksi">' +
      '<div class="form-group">' +
      '<label for="pass">Password</label>' +
      '<div class="input-group">' +
      '<input type="password" name="pass" id="pass" class="form-control" placeholder="Masukkan Password" required>' +

      '<span class="input-group-text"><i class="fa fa-fw fa-eye"></i></span>' +

      '</div>' +
      '</div>';
      $('#modal').find('h5').html('Tambah');
      $('#modal').find('#tes').html(tambah);
      $('#modal').find('#btn').html('Tambah');
      $('#aksi').val('tambah');
      $('#modal').modal('show');
      $('.input-group-text').click(function() {
        if ($('#pass').is(':password')) {
          $('#pass').attr('type', 'text');
          $(this).find('i').addClass('fa-eye-slash');
          $(this).find('i').removeClass('fa-eye');
        } else {
          $('#pass').attr('type', 'password');
          $(this).find('i').removeClass('fa-eye-slash');
          $(this).find('i').addClass('fa-eye');
        }
      });
    });
    $('#data').on('click', '#active', function() {
      id_user = $(this).data('id_user');
      active = $(this).data('active');
      $.ajax({
        url: '<?= site_url('user/active') ?>',
        type: 'post',
        data: {
          id: id_user,
          active: active
        },
        dataType: 'json',
        success: function(result) {
          $('#myData').DataTable().ajax.reload();
          if (result == true) {
            toastr["success"]("User Aktif");
          } else {
            toastr["error"]("User Nonaktif");
          }
        }
      })
    })
    $('#data').on('click', '.edit', function() {
      $('.modal-body').html(form);
      edit = '<input type="hidden" name="id" id="id">' +
      '<input type="hidden" name="aksi" id="aksi">';
      $('#modal').find('h5').html('Edit');
      $('#modal').find('#tes').html(edit);
      $('#modal').find('#btn').html('Edit');
      user = $(this).data('user');
      id = $(this).data('id');
      id_role = $(this).data('id_role');
      $('#user').val(user);
      $('#role').val(id_role);
      $('#id').val(id);
      $('#aksi').val('edit');
      $('#modal').modal('show');
    });
    $('#data').on('click', '.reset', function() {
      $('.modal-body').html(form);
      reset = '<input type="hidden" name="id" id="id">' +
      '<input type="hidden" name="aksi" id="aksi">' +
      '<div class="form-group">' +
      '<label for="pass">New Password</label>' +
      '<div class="input-group mb-3">' +
      '<input type="password" name="pass" id="pass" placeholder="Password" class="form-control form-control-sm" required>' +
      '<div class="input-group-append">' +
      '<span class="input-group-text"><i class="fas fa-fw fa-eye"></i></span>' +
      '</div>' +
      '</div>';
      $('#modal').find('h5').html('Reset');
      $('#modal').find('.modal-body').html(reset);
      $('#modal').find('#btn').html('Reset');
      id = $(this).data('id_reset');
      $('#id').val(id);
      $('#aksi').val('reset');
      $('#modal').modal('show');
      $('.input-group-text').click(function() {
        if ($('#pass').is(':password')) {
          $('#pass').attr('type', 'text');
          $(this).find('i').addClass('fa-eye-slash');
          $(this).find('i').removeClass('fa-eye');
        } else {
          $('#pass').attr('type', 'password');
          $(this).find('i').removeClass('fa-eye-slash');
          $(this).find('i').addClass('fa-eye');
        }
      });
    });
    $('#data').on('click', '.hapus', function() {
      $('.modal-body').html(form);
      hapus = '<input type="hidden" name="id" id="id">' +
      '<input type="hidden" name="aksi" id="aksi">' +
      '<h3>Apakah Anda Yakin ?</h3>';
      $('#modal').find('h5').html('Hapus');
      $('#modal').find('.modal-body').html(hapus);
      $('#modal').find('#btn').html('Hapus');
      id = $(this).data('id_hapus');
      $('#id').val(id);
      $('#aksi').val('hapus');
      $('#modal').modal('show');
    });
    $('#form').submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: '<?= site_url('user/aksi') ?>',
        type: 'post',
        data: new FormData(this),
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function(result) {
          if (result.status == true) {
            toastr["success"](result.pesan);
          } else {
            toastr["error"](result.pesan);
          }
          $('#myData').DataTable().ajax.reload();
          $('#modal').modal('hide');
        }
      })
    })
  });
</script>