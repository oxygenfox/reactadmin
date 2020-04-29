<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datatable extends MY_Controller
{
  public function __construct() {
    parent::__construct();
    $this->load->model('datatable_model', 'site');
  }

  public function index() {
    $data = [
      'tipage' => 'Reactmore',
    ];


    $this->load->view('_layout/front/index.php', $data);

  }

  public function getOrderList() {
    $orderID = $this->input->post('order_id');
    $name = $this->input->post('name');
    $startDate = $this->input->post('start_date');
    $endDate = $this->input->post('end_date');
    if (!empty($orderID)) {
      $this->site->setOrderID($orderID);
    }
    if (!empty($name)) {
      $this->site->setName($name);
    }
    if (!empty($startDate) && !empty($endDate)) {
      $this->site->setStartDate(date('Y-m-d', strtotime($startDate)));
      $this->site->setEndDate(date('Y-m-d', strtotime($endDate)));
    }
    $getOrderInfo = $this->site->getOrders();
    $dataArray = array();
    foreach ($getOrderInfo as $element) {
      $dataArray[] = array(
        $element['order_id'],
        date(DATE_FORMAT_SIMPLE, $element['order_date']),
        $element['name'],
        $element['city'],
        $element['amount'],
        $element['status'],
      );
    }
    echo json_encode(array("data" => $dataArray));
  }

}