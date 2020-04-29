<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Datatable_model extends CI_Model {

  private $_order_id;
  private $_name;
  private $_city;
  private $_startDate;
  private $_endDate;

  public function setOrderID($order_id) {
    $this->_order_id = $order_id;
  }
  public function setName($name) {
    $this->_name = $name;
  }
  public function setStartDate($startDate) {
    $this->_startDate = $startDate;
  }
  public function setEndDate($endDate) {
    $this->_endDate = $endDate;
  }
  // get Orders List
  public function getOrders() {
    $this->db->select(array('o.order_id', 'o.name', 'o.city', 'o.amount', 'o.order_date', 'o.status', 'o.amount'));
    $this->db->from('order_details o');
    if (!empty($this->_startDate) && !empty($this->_endDate)) {
      $this->db->where('DATE_FORMAT(FROM_UNIXTIME(`o`.`order_date`),"%Y-%m-%d") BETWEEN\'' . $this->_startDate . '\' AND \'' . $this->_endDate . '\'');
    }
    if (!empty($this->_order_id)) {
      $this->db->where('o.order_id', $this->_order_id);
    }
    if (!empty($this->_name)) {
      $this->db->like('o.name', $this->_name, 'both');
    }
    $this->db->order_by('o.order_date', 'DESC');
    $query = $this->db->get();
    return $query->result_array();
  }

}