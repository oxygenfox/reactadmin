<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access extends MY_Controller
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
			$this->db->where('user_submenu.url', 'access');
			$access = $this->db->get()->result();
			if (!$access) {
				redirect('page');
			}
		}
		parent::__construct();
		$this->load->model('access_model', 'model');
	}

	public function index()
	{
		if ($this->session->userdata('role') != 1) {
			$role = $this->db->query('SELECT * FROM user_role WHERE id_role != 1')->result();
			$menu = $this->db->query('SELECT * FROM user_menu WHERE id_menu != 1 ORDER BY no_order ASC')->result();
		} else {
			$role = $this->db->get('user_role')->result();
			$menu = $this->db->get('user_menu')->result();
		}
		$data = [
			'title' => 'Access Page',
			'role' => $role,
			'menu' => $menu
		];
		$this->load->view('_layout/admin/head', $data);
		$this->load->view('core/js', $data);
		$this->load->view('index', $data);
	}
	public function aksi()
	{
		$data = $this->model->aksi();
		echo json_encode($data);
	}
}
