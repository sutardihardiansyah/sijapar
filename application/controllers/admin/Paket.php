<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/paket_model', 'paket');
		is_access($this->uri->segment(1), $this->session->userdata('level'));
	}

	public function index()
	{
		$data = [
			'title' => 'Paket',
			'items' => $this->paket->get(),
		];

		$this->load->view('layouts/backend/header', $data);
		$this->load->view('pages/admin/paket/index', $data);
		$this->load->view('layouts/backend/footer');
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Paket'
		];
		$this->load->view('layouts/backend/header', $data);
		$this->load->view('pages/admin/paket/create', $data);
		$this->load->view('layouts/backend/footer');
	}

	public function save()
	{
		$this->form_validation->set_rules('nm_paket', 'Nama Paket', 'required');

		if ($this->form_validation->run() == false) {
			$this->create();
		} else {
			$data = $this->input->post(null, true);
			$save = $this->paket->insert($data);

			if ($save) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil disimpan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('paket');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal disimpan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('paket');
			}
		}
	}

	public function edit($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$paket = $this->paket->get_where(['id_paket' => $id]);

		$data = [
			'title' => 'Edit Paket',
			'paket' => $paket
		];
		$this->load->view('layouts/backend/header', $data);
		$this->load->view('pages/admin/paket/edit', $data);
		$this->load->view('layouts/backend/footer');
	}

	public function update()
	{
		$this->form_validation->set_rules('nm_paket', 'Nama Paket', 'required');

		if ($this->form_validation->run() == false) {
			$this->edit(encode($this->input->post('id_paket')));
		} else {
			$data = $this->input->post(null, true);
			$id_paket = $data['id_paket'];
			unset($data['id_paket']);
			$update = $this->paket->update($data, ['id_paket' => $id_paket]);

			if ($update) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('paket');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('paket');
			}
		}
	}

	public function delete($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$paket = $this->paket->get_where(['id_paket' => $id]);

		if ($paket) {
			$this->paket->delete(['id_paket' => $id]);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil dihapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			redirect('paket');
		} else {
			show_404();
		}
	}
}
