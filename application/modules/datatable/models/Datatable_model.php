<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Datatable_model extends CI_Model
{

  private $db2;

  public function __construct()
  {
    parent::__construct();
    $this->table = 'wp_posts a';
    $this->id = 'ID';
    $this->column_order = array(null, 'display_name', 'post_title', 'post_name', 'post_date', 'name', null);
    $this->column_search = array('display_name', 'post_title', 'post_name', 'post_date', 'name');
    $this->order = array('a.post_date' => 'desc');
    $this->db2 = $this->load->database('db2', TRUE);
  }

  public function getRows($postData)
  {
    $this->_get_datatables_query($postData);
    if ($postData['length'] != -1) {
      $this->db2->limit($postData['length'], $postData['start']);
    }
    $query = $this->db2->get();
    return $query->result();
  }

  public function countAll()
  {
    $this->db2->from('wp_posts as a');
    $this->db2->where('a.post_status', 'publish');
    $this->db2->where('a.post_type', 'post');

    return $this->db2->count_all_results();
  }


  public function countPost()
  {
    $this->db2->from('wp_posts a');
    $this->db2->join('wp_users b', 'b.ID=a .post_author');
    $this->db2->join('wp_postmeta c', 'c.post_id=a .ID');
    $this->db2->join('wp_term_relationships d', 'd.object_id=a .ID');
    $this->db2->join('wp_term_taxonomy e', 'e.term_taxonomy_id=d .term_taxonomy_id');
    $this->db2->join('wp_terms f', 'f.term_id=e .term_id');
    $this->db2->where('a.post_status', 'publish');
    $this->db2->where('a.post_type', 'post');
    $this->db2->where('c.meta_key', 'tie_views');
    $this->db2->where('e.taxonomy', 'category');
    // $this->db2->where('DAY(post_date)',  'DAY(CURDATE())', FALSE);
    $this->db2->where('MONTH(post_date)',  'MONTH(CURDATE())', FALSE);
    $this->db2->where('YEAR(post_date)',  'YEAR(CURDATE())', FALSE);

    return $this->db2->count_all_results();
  }

  public function countPost_interval()
  {
    $this->db2->from('wp_posts a');
    $this->db2->join('wp_users b', 'b.ID=a .post_author');
    $this->db2->join('wp_postmeta c', 'c.post_id=a .ID');
    $this->db2->join('wp_term_relationships d', 'd.object_id=a .ID');
    $this->db2->join('wp_term_taxonomy e', 'e.term_taxonomy_id=d .term_taxonomy_id');
    $this->db2->join('wp_terms f', 'f.term_id=e .term_id');
    $this->db2->where('a.post_status', 'publish');
    $this->db2->where('a.post_type', 'post');
    $this->db2->where('c.meta_key', 'tie_views');
    $this->db2->where('e.taxonomy', 'category');
    // $this->db2->where('DAY(post_date)',  'DAY(CURDATE())', FALSE);
    $this->db2->where('MONTH(post_date)',  'MONTH(CURDATE() - INTERVAL 1 MONTH)', FALSE);
    $this->db2->where('YEAR(post_date)',  'YEAR(CURDATE())', FALSE);

    return $this->db2->count_all_results();
  }

  public function countPostRp()
  {
    $auth = array('6', '7', '8', '13', '14', '15');

    $this->db2->from('wp_posts a');
    $this->db2->join('wp_users b', 'b.ID=a .post_author');
    $this->db2->where('a.post_status', 'publish');
    $this->db2->where('a.post_type', 'post');
    $this->db2->where_in('a.post_author', $auth);
    $this->db2->where('MONTH(post_date)',  'MONTH(CURDATE())', FALSE);
    $this->db2->where('YEAR(post_date)',  'YEAR(CURDATE())', FALSE);

    return $this->db2->count_all_results();
  }

  public function countPost_day()
  {
    $this->db2->from('wp_posts a');
    $this->db2->join('wp_users b', 'b.ID=a .post_author');
    $this->db2->join('wp_postmeta c', 'c.post_id=a .ID');
    $this->db2->join('wp_term_relationships d', 'd.object_id=a .ID');
    $this->db2->join('wp_term_taxonomy e', 'e.term_taxonomy_id=d .term_taxonomy_id');
    $this->db2->join('wp_terms f', 'f.term_id=e .term_id');
    $this->db2->where('a.post_status', 'publish');
    $this->db2->where('a.post_type', 'post');
    $this->db2->where('c.meta_key', 'tie_views');
    $this->db2->where('e.taxonomy', 'category');
    $this->db2->where('DAY(post_date)',  'DAY(CURDATE())', FALSE);
    $this->db2->where('MONTH(post_date)',  'MONTH(CURDATE())', FALSE);
    $this->db2->where('YEAR(post_date)',  'YEAR(CURDATE())', FALSE);

    return $this->db2->count_all_results();
  }

  public function countFiltered($postData)
  {
    $this->_get_datatables_query($postData);
    $query = $this->db2->get();
    return $query->num_rows();
  }
  private function _get_datatables_query($postData)
  {


    $this->db2->from('wp_posts a');
    $this->db2->join('wp_users b', 'b.ID=a .post_author');
    $this->db2->join('wp_postmeta c', 'c.post_id=a .ID');
    $this->db2->join('wp_term_relationships d', 'd.object_id=a .ID');
    $this->db2->join('wp_term_taxonomy e', 'e.term_taxonomy_id=d .term_taxonomy_id');
    $this->db2->join('wp_terms f', 'f.term_id=e .term_id');
    $this->db2->where('a.post_status', 'publish');
    $this->db2->where('a.post_type', 'post');
    $this->db2->where('c.meta_key', 'tie_views');
    $this->db2->where('e.taxonomy', 'category');

    if ($this->input->post('display_name')) {
      $this->db2->where('b.display_name', $this->input->post('display_name'));
    }
    if ($this->input->post('post_date')) {
      // $this->db2->like('a.post_date', $this->input->post('post_date'));
      $cari = $this->input->post('post_date');
      $post_date = explode("-", $cari);
      $tanggal_awal = date('Y-m-d', strtotime(str_replace('/', '-', $post_date[0])));
      $tanggal_akhir = date('Y-m-d', strtotime(str_replace('/', '-', $post_date[1])));
      $this->db2->where('a.post_date >=', $tanggal_awal);
      $this->db2->where('a.post_date <=', $tanggal_akhir);
    } else {
      $this->db2->where('MONTH(post_date)',  'MONTH(CURDATE())', FALSE);
      $this->db2->where('YEAR(post_date)',  'YEAR(CURDATE())', FALSE);
    }

    $i = 0;
    foreach ($this->column_search as $item) {
      if ($postData['search']['value']) {
        if ($i === 0) {
          $this->db2->group_start();
          $this->db2->like($item, $postData['search']['value']);
        } else {
          $this->db2->or_like($item, $postData['search']['value']);
        }
        if (count($this->column_search) - 1 == $i) {
          $this->db2->group_end();
        }
      }
      $i++;
    }
    if (isset($postData['order'])) {
      $this->db2->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
    } else if (isset($this->order)) {
      $order = $this->order;
      $this->db2->order_by(key($order), $order[key($order)]);
    }
  }

  public function get_list_author()
  {
    $this->db2->select('display_name');
    $this->db2->from('wp_users');
    $this->db2->order_by('ID', 'asc');
    $query = $this->db2->get();
    $result = $query->result();

    $auhtors = array();
    foreach ($result as $row) {
      $auhtors[] = $row->display_name;
    }
    return $auhtors;
  }
}
