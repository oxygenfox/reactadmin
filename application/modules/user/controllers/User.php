<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
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
			$this->db->where('user_submenu.url', 'user');
			$access = $this->db->get()->result();
			if (!$access) {
				redirect('page');
			}
		}
		parent::__construct();
		$this->load->model('user_model', 'model');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data = [
			'title' => 'User',

			'role' => $this->db->get('user_role')->result()
		];

		$this->load->view('_layout/admin/head', $data);
		$this->load->view('core/js', $data);
		$this->load->view('core/modals', $data);
		$this->load->view('index', $data);
	}
	function getLists()
	{
		$data = array();

		// Fetch member's records
		$user = $this->model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($user as $d) {
			if ($this->session->userdata('role') != 1) {
				if ($d->id_user != 1) {
					$i++;
					$disabled = '';
					if ($d->id_role == 1) {
						$disabled = 'disabled';
					}
					if ($d->is_active == 1) {
						$active = '<input type="radio" ' . $disabled . ' name="active" class="form-control-sm"  data-id_user="' . $d->id_user . '" data-active="' . $d->is_active . '" form-control-sm" id="active" checked>';
					} else {
						$active = '<input type="radio" ' . $disabled . ' name="active" class="form-control-sm"  data-id_user="' . $d->id_user . '" data-active="' . $d->is_active . '" form-control-sm" id="active" >';
					}
					$btn_reset = '<button type="button" class="btn btn-info btn-xs reset" data-id_reset="' . $d->id_user . '"><i class="fas fa-fw fa-cog"></i> Reset Password</button>';
					$btn_edit = '<button type="button" class="btn btn-warning btn-xs edit"  data-user="' . $d->username . '" data-id_role="' . $d->id_role . '" data-id="' . $d->id_user . '"><i class="fas fa-fw fa-pen"></i> Edit</button>';
					$data[] = array($i, $d->username, $d->role, $active, $btn_reset . ' ' . $btn_edit);
				}
			} else {
				$i++;
				$disabled = '';
				if ($d->id_role == 1) {
					$disabled = 'disabled';
				}
				if ($d->is_active == 1) {
					$active = '<input type="checkbox" ' . $disabled . ' name="active" class="form-control-sm" data-id_user="' . $d->id_user . '" data-active="' . $d->is_active . '" form-control-sm" id="active" checked>';
				} else {
					$active = '<input type="checkbox" ' . $disabled . ' name="active" class="form-control-sm" data-id_user="' . $d->id_user . '" data-active="' . $d->is_active . '" form-control-sm" id="active" >';
				}
				$btn_reset = '<button type="button" class="btn btn-info btn-xs reset" data-id_reset="' . $d->id_user . '"><i class="fas fa-fw fa-cog"></i> Reset Password</button>';
				$btn_edit = '<button type="button" class="btn btn-warning btn-xs edit"  data-user="' . $d->username . '" data-id_role="' . $d->id_role . '" data-id="' . $d->id_user . '"><i class="fas fa-fw fa-pen"></i> Edit</button>';
				$btn_hapus = '<button type="button" class="btn btn-danger btn-xs hapus"  data-id_hapus="' . $d->id_user . '"><i class="fas fa-fw fa-trash"></i> Hapus</button>';
				$data[] = array($i, $d->username, $d->role, $active, $btn_reset . ' ' . $btn_edit . ' ' . $btn_hapus);
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
		} else if ($_POST['aksi'] == 'reset') {
			$data = $this->model->reset();
			echo json_encode($data);
		}
	}
	public function active()
	{
		$data = $this->model->active();
		echo json_encode($data);
	}
}
