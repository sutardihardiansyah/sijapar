<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'items' => $this->db->get('paket'),
			'title' => 'Booking',
			'addon_script' => ['../frontend/scripts/pages/auth.js'],
			// 'bookings' => $this->booking->get(),
		];

		$this->load->view('layouts/frontend/header', $data);
		$this->load->view('pages/frontend/home/index', $data);
		$this->load->view('layouts/frontend/footer');
	}
}
