<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi extends MY_Controller
{

  public $validation_for = '';

  public function __construct() {
    if (!$this->session->userdata('role')) {
      redirect('auth');
    }
    if ($this->session->userdata('role')) {
      $this->db->select('*');
      $this->db->from('user_access');
      $this->db->join('user_submenu', 'user_access.id_menu=user_submenu.id_menu', 'inner');
      $this->db->where('user_access.id_role', $this->session->userdata('role'));
      $this->db->where('user_submenu.url', 'divisi');
      $access = $this->db->get()->result();
      if (!$access) {
        redirect('page/error');
      }
    }
    parent::__construct();
    $this->load->model('divisi_model', 'model');
  }

  public function index() {


    $data = [
      'title' => 'Data Divisi',

    ];
    // views
    $this->load->view('_layout/admin/head', $data);
    $this->load->view('core/js', $data);
    $this->load->view('core/modals', $data);
    $this->load->view('index', $data);
  }

  public function list() {
    $list = $this->model->get_datatables();
    $data = array();
    $i = 1;
    foreach ($list as $d) {
      $row = array();
      $row[] = $i++; // Auto Number
      $row[] = $d->jabatan; // Database Row Name ++
      $row[] = 'Rp. ' . number_format($d->gapok, 0, ',', '.');
      $row[] = 'Rp. ' . number_format($d->tukes, 0, ',', '.');
      $row[] = 'Rp. ' . number_format($d->tutra, 0, ',', '.');
      $row[] = 'Rp. ' . number_format($d->honor_1, 0, ',', '.');
      $row[] = 'Rp. ' . number_format($d->honor_2, 0, ',', '.');
      $row[] = 'Rp. ' . number_format($d->pph, 0, ',', '.');
      $row[] = 'Rp. ' . number_format($d->bpjs, 0, ',', '.');


      //add html for action
      $row[] = "<a class='btn btn-sm btn-primary' href='javascript:void(0)' title='Edit' onclick=\"edit_data('{$d->id_pekerjaan}')\"><i class='fa fa-edit'></i> Edit</a>"
      . " <a class='btn btn-sm btn-danger' href='javascript:void(0)' title='Hapus' onclick=\"delete_data('{$d->id_pekerjaan}')\"><i class='fa fa-trash'></i> Delete</a>";

      $data[] = $row; // Input Row To data array
    }

    $output = array(
      "draw" => @$_POST['draw'],
      "recordsTotal" => $this->model->count_all(),
      "recordsFiltered" => $this->model->count_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  }


  // Fungsi Edit

  public function edit($id) {
    $data = $this->model->get_by_id($id);
    echo json_encode($data);
  }

  // Fungsi Tambah

  public function add() {
    $this->validation_for = 'add';
    $data = array();
    $data['status'] = TRUE;

    // Validasi Sebelum Tambah

    $this->_validate();

    // Jika Validasi Salah Akan dikirim Error

    if ($this->form_validation->run() == FALSE) {
      $errors = array(
        'jabatan' => form_error('jabatan'),
        'gapok' => form_error('gapok'),
        'tukes' => form_error('tukes'),
        'tutra' => form_error('tutra'),
        'honor_1' => form_error('honor_1'),
        'honor_2' => form_error('honor_2'),
        'pph' => form_error('pph'),
        'bpjs' => form_error('bpjs'),

      );
      $data = array(
        'status' => FALSE,
        'errors' => $errors
      );
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
    } else {

      // Jika Benar input Post

      $insert = array(
        'jabatan' => $this->input->post('jabatan'),
        'gapok' => $this->input->post('gapok'),
        'tukes' => $this->input->post('tukes'),
        'tutra' => $this->input->post('tutra'),
        'honor_1' => $this->input->post('honor_1'),
        'honor_2' => $this->input->post('honor_2'),
        'pph' => $this->input->post('pph'),
        'bpjs' => $this->input->post('bpjs'),

      );
      $insert = $this->model->save($insert);
      $data['status'] = TRUE;
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
  }

  // Fungsi Update data

  public function update() {
    $this->validation_for = 'update';
    $data = array();
    $data['status'] = TRUE;

    $this->_validate();

    if ($this->form_validation->run() == FALSE) {
      $errors = array(
        'jabatan' => form_error('jabatan'),
        'gapok' => form_error('gapok'),
        'tukes' => form_error('tukes'),
        'tutra' => form_error('tutra'),
        'honor_1' => form_error('honor_1'),
        'honor_2' => form_error('honor_2'),
        'pph' => form_error('pph'),
        'bpjs' => form_error('bpjs'),
      );
      $data = array(
        'status' => FALSE,
        'errors' => $errors
      );
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
    } else {
      $update = array(
        'jabatan' => $this->input->post('jabatan'),
        'gapok' => $this->input->post('gapok'),
        'tukes' => $this->input->post('tukes'),
        'tutra' => $this->input->post('tutra'),
        'honor_1' => $this->input->post('honor_1'),
        'honor_2' => $this->input->post('honor_2'),
        'pph' => $this->input->post('pph'),
        'bpjs' => $this->input->post('bpjs'),
      );
      $this->model->update(array('id_pekerjaan' => $this->input->post('id')), $update);
      $data['status'] = TRUE;
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
  }

  // Fungsi Delete

  public function delete($id) {
    $this->model->delete_by_id($id);
    $data['status'] = TRUE;
    $this->output->set_content_type('application/json')->set_output(json_encode($data));
  }

  // Privat fungsi Validasi

  private function _validate() {
    $this->form_validation->set_error_delimiters('', '');
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required|min_length[2]|max_length[30]');
    $this->form_validation->set_rules('gapok', 'Gender', 'trim|required|numeric');
    $this->form_validation->set_rules('tukes', 'Tunjangan Kesehatan', 'trim|required|numeric');
    $this->form_validation->set_rules('tutra', 'Tunjangan Transportasi', 'trim|required|numeric');
    $this->form_validation->set_rules('honor_1', 'Honor Berita', 'trim|required|numeric');
    $this->form_validation->set_rules('honor_2', 'Honor Video', 'trim|required|numeric');
    $this->form_validation->set_rules('pph', 'PPH 21', 'trim|required|numeric');
    $this->form_validation->set_rules('bpjs', 'BPJS', 'trim|required|numeric');
  }
}