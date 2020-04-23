<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth_model extends CI_Model
{
  public function __construct() {
    $this->table = "user";
    $this->id = "id_user";
  }
  public function rules() {
    return [
      [
        'field' => 'user',
        'label' => 'Username',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Field %s Tidak Boleh Kosong'
        ]
      ],
      [
        'field' => 'pass',
        'label' => 'Password',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Field %s Tidak Boleh Kosong'
        ]
      ]

    ];
  }
  public function login() {
    $user = htmlspecialchars($_POST['user']);
    $pass = htmlspecialchars($_POST['pass']);
    $cek = $this->db->get_where('user', ['username' => $user])->row();
    if ($cek) {
      if ($cek->is_active == 0) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">
                Akun anda belum diaktivasi silahkan hubungi admin
              </div>');
        redirect('auth');
      }
      if (password_verify($pass, $cek->password)) {
        $data = [
          'user' => $cek->username,
          'role' => $cek->id_role,
          'id' => $cek->id_user
        ];
        $this->session->set_userdata($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center" role="alert">
                Selamat datang ' . $cek->username . ' !!!
              </div>');
        redirect('admin');
      }
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">
            Username atau Password salah !!!
          </div>');
      redirect('auth');
    }
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">
        Username atau Password salah !!!
      </div>');
    redirect('auth');
  }
}