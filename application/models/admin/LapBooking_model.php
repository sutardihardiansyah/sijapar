<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LapBooking_model extends CI_Model
{

	public function get_all($start = 0, $length, $filter = [], $order = [])
	{
		$this->filter($filter);
		if ($order) {
			$columns = ['id_booking', 'tgl_booking', 'total'];
			$this->db->order_by($columns[$order['column']], $order['dir']);
		}
		$this->db->limit($length, $start);

		return $this->db->get('booking');
	}

	function count_all($filter = array())
	{
		$this->filter($filter);
		return $this->db->count_all_results('booking');
	}

	function filter($filter = [])
	{

		if ($filter) {
			$this->db->where("tgl_booking BETWEEN '$filter[from]' AND '$filter[to]'");
		}
	}
}
