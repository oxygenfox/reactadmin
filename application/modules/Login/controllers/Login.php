<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

  public function index() {
    $this->load->view('login');
  }

  public function logout() {
    $this->session->sess_destroy();
    redirect('login');
  }
}