<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/customer_model', 'customer');
		is_access($this->uri->segment(1), $this->session->userdata('level'));
	}

	public function index()
	{
		$data = [
			'title' => 'Customer',
			'customers' => $this->customer->get(),
		];

		$this->load->view('layouts/backend/header', $data);
		$this->load->view('pages/admin/customer/index', $data);
		$this->load->view('layouts/backend/footer');
	}

	public function edit($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$customer = $this->customer->get_where(['id_customer' => $id]);

		$data = [
			'title' => 'Edit Customer',
			'customer' => $customer
		];
		$this->load->view('layouts/backend/header', $data);
		$this->load->view('pages/admin/customer/edit', $data);
		$this->load->view('layouts/backend/footer');
	}

	public function update()
	{
		$cekEmail = $this->customer->get_where(['id_customer' => $this->input->post('id_customer'), 'email' => $this->input->post('email')]);
		if (!$cekEmail) {
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[customer.email]');
		}
		$this->form_validation->set_rules('nm_customer', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('tlp_customer', 'Nomor Hp', 'required|is_numeric');
		$this->form_validation->set_rules('almt_customer', 'Alamat', 'required');
		$this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
		if ($this->form_validation->run() == false) {
			$this->edit(encode($this->input->post('id_customer')));
		} else {
			$data = $this->input->post(null, true);
			$id_customer = $data['id_customer'];
			unset($data['id_customer']);
			$update = $this->customer->update($data, ['id_customer' => $id_customer]);

			if ($update) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('customer');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('customer');
			}
		}
	}

	public function delete($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$customer = $this->customer->get_where(['id_customer' => $id]);

		if ($customer) {
			$this->customer->delete(['id_customer' => $id]);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil dihapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			redirect('customer');
		} else {
			show_404();
		}
	}
}
