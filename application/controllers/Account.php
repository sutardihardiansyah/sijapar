<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('account_model', 'account');
		if (!$this->session->userdata('id_customer')) {
			$data = [
				'addon_style' => ['../frontend/styles/custom.css'],
				'addon_script' => ['../frontend/scripts/custom.js']
			];
			// redirect(base_url());
			// $this->load->view('layouts/frontend/modal_auth', $data);
			echo '<script>alert("Silahkan Login!!");</script>';
			redirect(base_url());
		}
	}

	public function index()
	{
		$data = [
			'title' => 'Akun',
			'bookings' => $this->account->get_where('booking', ['id_customer' => $this->session->userdata('id_customer')])
		];

		$this->load->view('layouts/frontend/booking-header', $data);
		$this->load->view('pages/frontend/account/index', $data);
		$this->load->view('layouts/frontend/footer');
	}
}
