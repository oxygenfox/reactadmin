<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends MY_Controller
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
			$this->db->where('user_submenu.url', 'role');
			$access = $this->db->get()->result();
			if (!$access) {
				redirect('page');
			}
		}
		parent::__construct();
		$this->load->model('role_model', 'model');
	}

	public function index()
	{
		$data = [
			'title' => 'Role'
		];
		// $this->load->view('_layout/header', $data);
		$this->load->view('core/js', $data);
		$this->load->view('core/modals', $data);
		$this->load->view('index', $data);
	}
	function getLists()
	{
		$data = array();

		// Fetch member's records
		$role = $this->model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($role as $d) {
			if ($this->session->userdata('role') != 1) {
				if ($d->id_role != 1) {
					$i++;
					$btn_edit = '<button type="button" class="btn btn-warning btn-xs edit" data-role="' . $d->role . '" data-id_role="' . $d->id_role . '"><i class="fas fa-fw fa-pen"></i> Edit</button>';
					$btn_hapus = '<button type="button" class="btn btn-danger btn-xs hapus"  data-id_role="' . $d->id_role . '"><i class="fas fa-fw fa-trash"></i> Hapus</button>';
					$data[] = array($i, $d->role, $btn_edit . ' ' . $btn_hapus);
				}
			} else {
				$i++;
				$btn_edit = '<button type="button" class="btn btn-warning btn-xs edit" data-role="' . $d->role . '" data-id_role="' . $d->id_role . '"><i class="fas fa-fw fa-pen"></i> Edit</button>';
				$btn_hapus = '<button type="button" class="btn btn-danger btn-xs hapus"  data-id_role="' . $d->id_role . '"><i class="fas fa-fw fa-trash"></i> Hapus</button>';
				$data[] = array($i, $d->role, $btn_edit . ' ' . $btn_hapus);
			}
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
}
