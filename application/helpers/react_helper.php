<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('element')) {
  function auth($template, $data = null) {
    $ci = &get_instance();
    $data['view'] = $ci->load->view($template, $data, true);
    $ci->load->view('_layout/auth/index.php', $data);
  }


  function admin($template, $data = null) {
    $ci = &get_instance();
    $data['view'] = $ci->load->view($template, $data, true);
    $ci->load->view('_layout/admin/index.php', $data);
  }
}