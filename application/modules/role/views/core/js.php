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
                "url": "<?= site_url('role/getLists'); ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }]
        });
        $('#tambah').click(function() {
            $('.modal-body').html(form);
            aksi = '<input type="hidden" name="aksi" id="aksi">';
            $('#add').html(aksi);
            $('#modal').find('h5').html('Tambah')
            $('#modal').find('#btn').html('Tambah')
            $('#aksi').val('tambah');
            $('#modal').modal('show');
        });
        $('#data').on('click', '.edit', function() {
            $('.modal-body').html(form);
            aksi = '<input type="hidden" name="aksi" id="aksi">' +
                '<input type="hidden" name="id" id="id">';
            $('#add').html(aksi);
            $('#modal').find('h5').html('Edit')
            $('#modal').find('#btn').html('Edit')
            id = $(this).data('id_role');
            role = $(this).data('role');
            $('#aksi').val('edit');
            $('#id').val(id);
            $('#role').val(role);
            $('#modal').modal('show');
        });
        $('#data').on('click', '.hapus', function() {
            $('.modal-body').html(form);
            aksi = '<input type="hidden" name="aksi" id="aksi">' +
                '<input type="hidden" name="id" id="id">' +
                '<h3>Apakah Anda Yakin ?</h3>';
            $('.modal-body').html(aksi);
            $('#modal').find('h5').html('Hapus')
            $('#modal').find('#btn').html('Hapus')
            id = $(this).data('id_role');
            $('#aksi').val('hapus');
            $('#id').val(id);
            $('#modal').modal('show');
        });
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= site_url('role/aksi') ?>',
                type: 'post',
                data: new FormData(this),
                processData: false,
                contentType: false,
                async: false,
                success: function(data) {
                    var pesan = data;
                    $(document).Toasts('create', {
                        title: 'Success',
                        body: pesan,
                        class: 'bg-success mt-4 mr-4'
                    });
                    $('#myData').DataTable().ajax.reload();
                    $('#modal').modal('hide');
                }
            })
        })
    });
</script>