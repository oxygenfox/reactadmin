<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <!-- <a href="assets/index3.html" class="brand-link">
    <img src="assets/dist/img/AdminLTELogo.png"
    alt="AdminLTE Logo"
    class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a> -->

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">MISCELLANEOUS</li>
        <li class="nav-item">
          <?php if ($this->session->userdata('user') == null) : ?>
            <a href="<?= base_url('admin'); ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Login Panel
              </p>
            </a>
          <?php else : ?>
            <a href="<? base_url('admin'); ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Halo <?= $this->session->userdata('user'); ?>
              </p>
            </a>
          <?php endif; ?>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>