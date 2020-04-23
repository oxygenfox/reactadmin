<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

  public function __construct() {
    if ($this->session->userdata('role')) {
      redirect('home');
    }
    parent::__construct();
    $this->load->model('auth_model', 'model');
    $this->load->library('form_validation');
  }

  public function index() {

    $this->form_validation->set_rules($this->model->rules());

    if ($this->form_validation->run()) {
      $this->model->login();
    } else {
      auth('index');
    }
  }
}