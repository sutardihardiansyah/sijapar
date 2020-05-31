<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model', 'auth');
	}

	public function login()
	{
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) {
			$return = [
				'status' => 'error',
				'message' => validation_errors()
			];
		} else {
			$user = $this->auth->get_where(['username' => $username]);

			// cek user di database
			// jika berhasil
			if ($user) {
				// cek password
				// password berhasil
				if (password_verify($password, $user['password'])) {
					$data = [
						'id_customer' => $user['id_customer'],
						'nama' => $user['nm_customer'],
					];
					$this->session->set_userdata($data);
					$return = [
						'status' => 'success'
					];
				}
				// password gagal
				else {
					$return = [
						'status' => 'error',
						'message' => 'Password Salah'
					];
				}
			}
			// jika gagal
			else {
				$return = [
					'status' => 'error',
					'message' => 'Username tidak terdaftar!!'
				];
			}
		}

		echo json_encode($return);
	}

	public function register()
	{
		$data = [
			'nm_customer' => $this->input->post('nm_customer', true),
			'username' => $this->input->post('username', true),
			'email' => $this->input->post('email', true),
			'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
		];

		$this->form_validation->set_rules('nm_customer', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[customer.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if ($this->form_validation->run() == false) {
			$return = [
				'status' => 'error',
				'message' => validation_errors()
			];
		} else {

			$save = $this->auth->insert($data);
			if ($save) {
				$return = [
					'status' => 'success',
					'message' => 'Data berhasil disimpan'
				];
			} else {
				$return = [
					'status' => 'error',
					'message' => 'Data gagal disimpan'
				];
			}
		}
		echo json_encode($return);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
