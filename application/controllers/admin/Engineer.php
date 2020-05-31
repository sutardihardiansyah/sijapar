<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Engineer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/engineer_model', 'engineer');
		is_access($this->uri->segment(1), $this->session->userdata('level'));
	}

	public function index()
	{
		$data = [
			'title' => 'Engineer',
			'engineers' => $this->engineer->get(),
		];

		$this->load->view('layouts/backend/header', $data);
		$this->load->view('pages/admin/engineer/index', $data);
		$this->load->view('layouts/backend/footer');
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Engineer'
		];
		$this->load->view('layouts/backend/header', $data);
		$this->load->view('pages/admin/engineer/create', $data);
		$this->load->view('layouts/backend/footer');
	}

	public function save()
	{
		$this->form_validation->set_rules('nm_engineer', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('tlp_engineer', 'Nomor Hp', 'required|is_numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[engineer.email]');
		$this->form_validation->set_rules('jk_engineer', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('almt_engineer', 'Alamat', 'required');

		if ($this->form_validation->run() == false) {
			$this->create();
		} else {
			$data = $this->input->post(null, true);
			$save = $this->engineer->insert($data);

			if ($save) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil disimpan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('engineer');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal disimpan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('engineer');
			}
		}
	}

	public function edit($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$engineer = $this->engineer->get_where(['id_engineer' => $id]);

		$data = [
			'title' => 'Edit Engineer',
			'engineer' => $engineer
		];
		$this->load->view('layouts/backend/header', $data);
		$this->load->view('pages/admin/engineer/edit', $data);
		$this->load->view('layouts/backend/footer');
	}

	public function update()
	{
		$cekEmail = $this->engineer->get_where(['id_engineer' => $this->input->post('id_engineer'), 'email' => $this->input->post('email')]);
		if (!$cekEmail) {
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[engineer.email]');
		}
		$this->form_validation->set_rules('nm_engineer', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('tlp_engineer', 'Nomor Hp', 'required|is_numeric');
		$this->form_validation->set_rules('jk_engineer', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('almt_engineer', 'Alamat', 'required');

		if ($this->form_validation->run() == false) {
			$this->edit(encode($this->input->post('id_engineer')));
		} else {
			$data = $this->input->post(null, true);
			$id_engineer = $data['id_engineer'];
			unset($data['id_engineer']);
			$update = $this->engineer->update($data, ['id_engineer' => $id_engineer]);

			if ($update) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('engineer');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('engineer');
			}
		}
	}

	public function delete($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$engineer = $this->engineer->get_where(['id_engineer' => $id]);

		if ($engineer) {
			$this->engineer->delete(['id_engineer' => $id]);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil dihapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			redirect('engineer');
		} else {
			show_404();
		}
	}
}
