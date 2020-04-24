<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('element')) {
  function auth($template, $data = null)
  {
    $ci = &get_instance();
    $data['view'] = $ci->load->view($template, $data, true);
    $ci->load->view('_layout/auth/index.php', $data);
  }


  function admin($template, $data = null)
  {
    $ci = &get_instance();
    $data['css'] = $ci->load->view('_layout/admin/_css.php', $data, TRUE);
    $data['navbar'] = $ci->load->view('_layout/admin/navbar.php', $data, TRUE);
    $data['sidebar'] = $ci->load->view('_layout/admin/sidebar.php', $data, TRUE);
    $data['footer'] = $ci->load->view('_layout/admin/footer.php', $data, TRUE);
    $data['js'] = $ci->load->view('_layout/admin/_js.php', $data, TRUE);
    $data['view'] = $ci->load->view($template, $data, true);
    $ci->load->view('_layout/admin/index.php', $data);
  }
}
