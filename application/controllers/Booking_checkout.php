<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_checkout extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('booking_model', 'booking');
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
			'title' => 'Booking',
			'engineers' => $this->get_engineer(),
		];

		$this->load->view('layouts/frontend/booking-header', $data);
		$this->load->view('pages/frontend/booking/booking-checkout', $data);
		$this->load->view('layouts/frontend/footer');
	}

	public function save()
	{
		$data = $this->input->post(null, true);

		$this->form_validation->set_rules('id_engineer', 'Engineer', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis Jasa', 'required');
		$this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('tgl_booking', 'Tanggal', 'required');
		$this->form_validation->set_rules('keluhan', 'Tanggal', 'required');

		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$data['id_customer'] = $this->session->userdata('id_customer');
			$data['nomor_po'] = create_code();
			$data['status'] = 0;
			$save = $this->booking->insert($data);

			if ($save) {
				$customer = [
					'almt_customer' => $data['alamat'],
					'perusahaan' => $data['perusahaan'],
				];
				$this->db->update('customer', $customer, ['id_customer' => $this->session->userdata('id_customer')]);
				redirect('booking-checkout/success');
			}
		}
	}

	public function success()
	{
		$data = [
			'title' => 'Success',
		];
		$this->load->view('layouts/frontend/booking-header', $data);
		$this->load->view('pages/frontend/booking/success', $data);
		$this->load->view('layouts/frontend/footer');
	}

	protected function get_engineer()
	{
		$engineers = $this->db->get('engineer');
		return $engineers;
	}

	public function maintenance($id = '')
	{
		$data = [
			'title' => 'Booking',
			'item' => $this->db->get_where('paket', ['id_paket' => $id])->row_array(),
			'engineers' => $this->get_engineer(),
		];

		$this->load->view('layouts/frontend/booking-header', $data);
		$this->load->view('pages/frontend/booking/booking-maintenance', $data);
		$this->load->view('layouts/frontend/footer');
	}

	public function save_maintenance()
	{
		$data = $this->input->post(null, true);

		$this->form_validation->set_rules('id_engineer', 'Engineer', 'required');
		$this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('tgl_booking', 'Tanggal', 'required');
		$this->form_validation->set_rules('keluhan', 'Tanggal', 'required');

		if ($this->form_validation->run() == false) {
			$this->maintenance($this->input->post('id_paket'));
		} else {
			$data['id_customer'] = $this->session->userdata('id_customer');
			$data['nomor_po'] = create_code();
			$data['status'] = 0;
			$data['tipe'] = 'paket';
			$data['jenis'] = 'maintenance';
			$save = $this->booking->insert($data);

			if ($save) {
				$customer = [
					'almt_customer' => $data['alamat'],
					'perusahaan' => $data['perusahaan'],
				];
				$this->db->update('customer', $customer, ['id_customer' => $this->session->userdata('id_customer')]);
				redirect('booking-checkout/success');
			}
		}
	}
}
