<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lap_booking extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/lapbooking_model', 'booking');
		is_access($this->uri->segment(1), $this->session->userdata('level'));
	}

	public function index()
	{
		$data = [
			'title' => 'Laporan Booking',
			'addon_script' => ['js/pages/laporan/booking/booking.js', 'js/pages/laporan/booking/booking_list.js', 'js/pages/laporan/booking/report_booking_list.js']
		];
		$this->load->view('layouts/backend/header', $data);
		$this->load->view('pages/admin/laporan/booking/index', $data);
		$this->load->view('layouts/backend/footer');
	}

	public function get_list()
	{
		$start = $this->input->post('start');
		$length = $this->input->post('length') - 1; //dikurang 1 untuk list terakhir adalah total
		$order = $this->input->post('order')[0];

		$draw = intval($this->input->post('draw'));
		$filter = $this->input->post('filter');
		$filter['period'] = explode(' - ', $filter['period']);
		$filter['from'] = $filter['period'][0];
		$filter['to'] = $filter['period'][1];
		unset($filter['period']);
		$output['data'] = [];
		$output['total'] = 0;
		$datas = $this->booking->get_all($start, $length, $filter, $order);

		if ($datas->num_rows()) {
			$total = 0;
			$no = 1;
			$data = (object) [];
			foreach ($datas->result() as $key => $data) {
				$no = $key += 1;
				$output['data'][] = array(
					$no,
					$data->tgl_booking,
					format_rupiah($data->total),
				);
				$total += $data->total;
			}
			$output['total'] = format_rupiah($total);
		}

		$output['draw'] = $draw++;
		$output['recordsFiltered'] = $this->booking->count_all($filter);
		$output['recordsTotal'] = $output['recordsFiltered'];
		echo json_encode($output);
	}
}
