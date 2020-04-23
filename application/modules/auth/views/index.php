<div class="login-box">
  <div class="login-logo">
    <h1>React<b>more</b></h1>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">
        Silahkan Login
      </p>
      <?= $this->session->flashdata('pesan') ?>
      <form action="<?= site_url('auth') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="user" id="user" value="<?= set_value('user') ?>" placeholder="Username">
          <div class="input-group-append" id="tes">
            <div class="input-group-text">
              <span class="fas fa-fw fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
          <div class="input-group-append" id="tes2">
            <div class="input-group-text">
              <span data-toggle="tooltip" data-placement="right" title="Lihat Password" id="eye" class="fas fa-eye"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success w-100">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
if (form_error('user')) : ?>
<script>
  $('#user').css('background-color', '#FFEFF0');
  $('#tes').css('background-color', '#FFEFF0');
</script>
<?php endif; ?>
<?php
if (form_error('pass')) : ?>
<script>
  $('#pass').css('background-color', '#FFEFF0');
  $('#tes2').css('background-color', '#FFEFF0');
</script>
<?php endif; ?>
<script>
  $(document).ready(function() {
    var user = $('#user').val();
    var pass = $('#pass').val();
    if (!user) {
      $('#user').attr('data-toggle', 'tooltip');
      $('#user').attr('data-placement', 'left');
      $('#user').attr('title', 'Masukkan Username');
    }
    if (!pass) {
      $('#pass').attr('data-toggle', 'tooltip');
      $('#pass').attr('data-placement', 'left');
      $('#pass').attr('title', 'Masukkan Password');
    }
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })
    $('#eye').click(function() {
      if ($('#pass').is(':password')) {
        $('#pass').attr('type', 'text');
        $('#eye').removeClass('fa-eye');
        $('#eye').addClass('fa-eye-slash');
      } else {
        $('#pass').attr('type', 'password');
        $('#eye').addClass('fa-eye');
        $('#eye').removeClass('fa-eye-slash');
      }
    });
  });
</script>