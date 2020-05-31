<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/booking_model', 'booking');
		is_access($this->uri->segment(1), $this->session->userdata('level'));
	}

	public function index()
	{
		$data = [
			'title' => 'Booking',
			'bookings' => $this->booking->get_join(),
		];

		$this->load->view('layouts/backend/header', $data);
		$this->load->view('pages/admin/booking/index', $data);
		$this->load->view('layouts/backend/footer');
	}

	public function detail($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$booking = $this->booking->get_join($id);
		$data = [
			'title' => 'Booking ' . $booking['nomor_po'],
			'booking' => $booking
		];
		if ($booking) {
			$this->load->view('layouts/backend/header', $data);
			$this->load->view('pages/admin/booking/detail', $data);
			$this->load->view('layouts/backend/footer');
		} else {
			show_404();
		}
	}

	public function edit($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$booking = $this->booking->get_where(['id_booking' => $id]);

		$data = [
			'title' => 'Edit ' . $booking['nomor_po'],
			'booking' => $booking
		];
		$this->load->view('layouts/backend/header', $data);
		$this->load->view('pages/admin/booking/edit', $data);
		$this->load->view('layouts/backend/footer');
	}

	public function update()
	{
		$this->form_validation->set_rules('total', 'Total', 'required|is_numeric');

		if ($this->form_validation->run() == false) {
			$this->edit(encode($this->input->post('id_booking')));
		} else {
			$data = $this->input->post(null, true);
			$id_booking = $data['id_booking'];
			unset($data['id_booking']);
			$update = $this->booking->update($data, ['id_booking' => $id_booking]);

			if ($update) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('booking');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('booking');
			}
		}
	}

	public function delete($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$booking = $this->booking->get_where(['id_booking' => $id]);

		if ($booking) {
			$this->booking->delete(['id_booking' => $id]);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil dihapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			redirect('booking');
		} else {
			show_404();
		}
	}
}
