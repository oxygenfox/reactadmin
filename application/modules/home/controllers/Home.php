<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

  public function index() {
    $data = [
      'tipage' => 'Reactmore',
    ];


    $this->load->view('index', $data);
  }

  public function logout() {
    $this->session->unset_userdata('user');
    $this->session->unset_userdata('role');
    $this->session->unset_userdata('id');
    $this->session->sess_destroy();
    redirect('home');
  }

}