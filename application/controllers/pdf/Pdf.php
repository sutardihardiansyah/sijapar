<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class Pdf extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/booking_model', 'booking');
	}
	public function booking($id = '', $download = 0)
	{
		$mpdf = new \Mpdf\Mpdf();

		$id = decode($id);
		$data['booking'] = $this->booking->get_join($id);
		$htlm = $this->load->view('pdf/booking/booking_default', $data, true);

		$mpdf->WriteHTML($htlm);
		if ($download == 1) {
			$mpdf->Output('booking.pdf', \Mpdf\Output\Destination::DOWNLOAD);
		} else {
			$mpdf->Output();
		}
	}
}
