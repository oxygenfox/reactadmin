<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends MY_Controller
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
			$this->db->where('user_submenu.url', 'menu');
			$access = $this->db->get()->result();
			if (!$access) {
				redirect('page');
			}
		}
		parent::__construct();
		$this->load->model('menu_model', 'model');
	}

	public function index()
	{
		$sicon = $this->model->get_icon();
		$data = [
			'title' => 'Menu',
			'icons' => $sicon
		];

		$this->load->view('_layout/admin/head', $data);
		$this->load->view('core/js', $data);
		$this->load->view('core/modals', $data);
		$this->load->view('index', $data);
	}
	function getLists()
	{
		$data = array();
		$menu = $this->model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($menu as $d) {
			$i++;
			$disabled = '';
			if ($d->id_menu == '1') {
				$disabled = 'disabled';
			}
			if ($d->is_active == 1) {
				$active = '<input type="checkbox" name="active" ' . $disabled . '  class="form-control-sm" data-id_menu="' . $d->id_menu . '" data-active="' . $d->is_active . '" form-control-sm" id="active" checked>';
			} else {
				$active = '<input type="checkbox" name="active" ' . $disabled . ' class="form-control-sm" data-id_menu="' . $d->id_menu . '" data-active="' . $d->is_active . '" form-control-sm" id="active" >';
			}
			$order = '<button data-order="' . $d->no_order . '" data-id_menu="' . $d->id_menu . '" class="btn btn-danger btn-xs down"><i class="fas fa-fw fa-arrow-down"></i></button> <button data-order="' . $d->no_order . '" data-id_menu="' . $d->id_menu . '" class="btn btn-success btn-xs up"><i class="fas fa-fw fa-arrow-up"></i></button>';
			$submenu = '<button type="button" class="btn btn-success btn-xs sub" data-id_menu="' . $d->id_menu . '"><i class="fas fa-fw fa-eye"></i> Submenu</button>';
			$icon = '<i class="' . $d->icon . '"></i>';
			$btn_edit = '<button type="button" class="btn btn-success btn-xs edit" data-icon="' . $d->icon . '" data-title="' . $d->title . '" data-id_menu="' . $d->id_menu . '"><i class="fas fa-fw fa-pen"></i> Edit</button>';
			$btn_hapus = '<button ' . $disabled . ' type="button" class="btn btn-danger btn-xs hapus"  data-id_menu="' . $d->id_menu . '"><i class="fas fa-fw fa-trash"></i> Hapus</button>';
			$data[] = array($i, $d->title, $icon, $order, $active, $submenu, $btn_edit . ' ' . $btn_hapus);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->model->countAll(),
			"recordsFiltered" => $this->model->countFiltered($_POST),
			"data" => $data,
		);
		echo json_encode($output);
	}
	public function aksi()
	{
		if ($_POST['aksi'] == 'tambah') {
			$data = $this->model->tambah();
			echo json_encode($data);
		} else if ($_POST['aksi'] == 'edit') {
			$data = $this->model->edit();
			echo json_encode($data);
		} else if ($_POST['aksi'] == 'hapus') {
			$data = $this->model->hapus();
			echo json_encode($data);
		}
	}
	public function active()
	{
		$data = $this->model->active();
		echo json_encode($data);
	}
	public function submenu($id)
	{
		$data = [
			'judul' => 'Submenu'
		];
		$this->load->view('submenu', $data);
	}
	public function down()
	{
		$data = $this->model->down();
		echo json_encode($data);
	}
	public function up()
	{
		$data = $this->model->up();
		echo json_encode($data);
	}
}
