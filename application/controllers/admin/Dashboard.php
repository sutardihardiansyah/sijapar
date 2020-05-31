<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_access($this->uri->segment(1), $this->session->userdata('level'));
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard'
		];

		$this->load->view('layouts/backend/header', $data);
		$this->load->view('pages/admin/dashboard/index', $data);
		$this->load->view('layouts/backend/footer');
	}
}
