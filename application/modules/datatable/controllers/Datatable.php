<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datatable extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('datatable_model', 'model');
    $this->db2 = $this->load->database('db2', TRUE);
  }

  public function index()
  {
    $authors = $this->model->get_list_author();

    $opt = array('' => 'All Authors');
    foreach ($authors as $author) {
      $opt[$author] = $author;
    }

    $data = [
      'tipage' => 'Reactmore',
      'form_author' => form_dropdown('', $opt, '', 'id="display_name" class="form-control"'),
      'records' => $this->model->countPost(),
      'records_day' => $this->model->countPost_day(),
      'records_interval' => $this->model->countPost_interval(),
    ];


    $this->load->view('_layout/front/index.php', $data);
  }

  function getLists()
  {
    $data = array();
    $ceklissatu = $this->model->getRows($_POST);

    $i = $_POST['start'];
    foreach ($ceklissatu as $d) {
      $i++;
      $link = '<a class="btn btn-success btn-sm" href="https://ceklissatu.com/' . strtolower($d->name) . '/' . $d->post_name . '"> <span>Open Link</span></a>';
      $kat = $d->name;
      $views = $d->meta_value;
      $data[] = array(
        $i,
        $d->display_name,
        $d->post_title,
        $link,
        $kat,
        date('yy-m-d', strtotime($d->post_date)),
        $views
      );
    }


    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->model->countAll(),
      "recordsFiltered" => $this->model->countFiltered($_POST),
      "data" => $data,
    );

    //print_r($output);

    echo json_encode($output);
  }
}
