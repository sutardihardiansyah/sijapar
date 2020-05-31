<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/task_model', 'task');
		is_access($this->uri->segment(1), $this->session->userdata('level'));
	}

	public function index()
	{
		$data = [
			'title' => 'Task',
			'addon_script' => ['js/pages/task/index.js']
		];

		$this->load->view('layouts/backend/header', $data);
		$this->load->view('pages/admin/task/index', $data);
		$this->load->view('layouts/backend/footer');
	}

	public function get_data()
	{
		$items = $this->task->get_data();
		$record = [];

		$no = $_POST['start'];
		$key = 1;

		foreach ($items as $item) {
			$no++;

			// tombol action
			$action = '<a href="javascript:;" ><span class="badge badge-primary btn-edit" data-jenis_action="edit" data-id="' . $item['id_booking'] . '">Edit</span></a>' . ' ' .
				'<a href="javascript:;" ><span class="badge badge-danger btn-delete" data-jenis_action="hapus" data-id="' . $item['id_booking'] . '">Hapus</span></a>';

			$status = $item['status'] . ' ' . '<select class="form-control status">
									<option id-booking = ' . $item['id_booking'] . ' data-id=' . $item['id_booking'] . ' value="' . $item['id_booking'] . ' 20">20</option>
									<option id-booking = ' . $item['id_booking'] . ' data-id=' . $item['id_booking'] . ' value="' . $item['id_booking'] . ' 40">40</option>
									<option id-booking = ' . $item['id_booking'] . ' data-id=' . $item['id_booking'] . ' value="' . $item['id_booking'] . ' 60">60</option>
									<option id-booking = ' . $item['id_booking'] . ' data-id=' . $item['id_booking'] . ' value="' . $item['id_booking'] . ' 80">80</option>
									<option id-booking = ' . $item['id_booking'] . ' data-id=' . $item['id_booking'] . ' value="' . $item['id_booking'] . ' 100">100</option>
								</select>';
			$id = '<p class="d-none id_booking">' . $item['id_booking'] . '</p>';

			// column buat data tables --
			$row = [
				'no' => $id . ' ' . $key++,
				'nomor_po' => $item['nomor_po'],
				'nm_engineer' => $item['nm_engineer'],
				'nm_customer' => $item['nm_customer'],
				'tgl_booking' => $item['tgl_booking'],
				'total' => format_rupiah($item['total']),
				'status' => $status,
				'action' => $action
			];
			$record[] = $row;
		}

		$output = array(
			"draw" => $this->input->post('draw'),
			"recordsTotal" => $this->task->count_all(),
			"recordsFiltered" => $this->task->count_filtered(),
			"data" => $record,
		);
		//output to json format
		echo json_encode($output);
	}

	public function update_ajax()
	{
		$data = $this->input->post('data');

		$str = explode(' ', $data);
		$id_booking = $str[0];
		$status = $str[1];

		$update = $this->db->update('booking', ['status' => $status], ['id_booking' => $id_booking]);

		if ($update) {
			$output = [
				'status' => 'success'
			];
		} else {
			$output = [
				'status' => 'error'
			];
		}

		echo json_encode($output);
	}
}
