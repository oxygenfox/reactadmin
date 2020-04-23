<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends MY_Controller
{

	public function index()
	{
		// $this->load->view('_layout/header', ['title' => 'Opps']);
		$this->load->view('index');
	}
	public function error()
	{
		// $this->load->view('_layout/header', ['title' => 'Opps']);
		$this->load->view('error');
	}
}
