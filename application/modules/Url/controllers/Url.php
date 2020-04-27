<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Url extends MY_Controller
{



  public function __construct()
  {
    if (!$this->session->userdata('role')) {
      redirect('auth');
    }
    if ($this->session->userdata('role')) {
      $this->db->select('*');
      $this->db->from('user_access');
      $this->db->join('user_submenu', 'user_access.id_menu=user_submenu.id_menu', 'inner');
      $this->db->where('user_access.id_role', $this->session->userdata('role'));
      $this->db->where('user_submenu.url', 'url');
      $access = $this->db->get()->result();
      if (!$access) {
        redirect('page/error');
      }
    }
    parent::__construct();
    $this->load->model('Url_model');
    // $this->load->model('Statistic_model');
  }

  public function index()
  {

    $data = array(
      'error' => false,
      'show_details' => false,
    );
    $post = $this->input->post(NULL, TRUE);

    // check if request method was 'post' - if yes, then try to create short url
    if ($post) {
      $url = $post['url'];

      // validate url
      if (filter_var($url, FILTER_VALIDATE_URL)) {

        $id = $this->Url_model->add_url($url);

        $url_data = $this->Url_model->get_url_by_id($id);

        $data['show_details'] = true;
        $data['url_data'] = $url_data;
      } else {
        $data['error'] = "Invalid URL!";
      }
    }

    // load view and assign data array
    // $this->load->view('_layout/admin/head', ['title' => 'Shortener']);
    $this->load->view('index', $data);



    // views
    // $this->load->view('core/modals', $data);
    // $this->load->view('index', $data);
    // $this->load->view('core/js', $data);
  }

  public function redirect($alias)
  {
    $url_data = $this->Url_model->get_url($alias);

    // check if there's an url with this alias
    if (!$url_data) {

      header("HTTP/1.0 404 Not Found");
      $this->load->view('not_found');
    } else {

      $this->Url_model->add_log($url_data->id);

      header('Location: ' . $url_data->url, true, 302);
      exit();
    }
  }


  public function stats($alias)
  {
    $url_data = $this->Url_model->get_url($alias);

    // check if there's an url with this alias
    if (!$url_data) {

      header("HTTP/1.0 404 Not Found");
      $this->load->view('not_found');
    } else {

      $logs = $this->Url_model->get_logs($url_data->id);

      $data = array(
        'url_data'  => $url_data,
        'logs'      => $logs,
      );

      $this->load->view('stats', $data);
    }
  }
}
