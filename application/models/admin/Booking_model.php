<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_model extends CI_Model
{

	protected $table = 'booking';

	public function get()
	{
		return $this->db->get($this->table);
	}

	public function get_join($id = '')
	{
		$this->db->select('b.*, e.nm_engineer, c.nm_customer, c.tlp_customer, c.email');
		$this->db->from($this->table . ' b');
		$this->db->join('engineer e', 'e.id_engineer = b.id_engineer');
		$this->db->join('customer c', 'c.id_customer = b.id_customer');
		if ($id !== '') {
			$this->db->where('b.id_booking', $id);
			return $this->db->get()->row_array();
		} else {
			return $this->db->get();
		}
	}

	public function get_where($where)
	{
		return $this->db->get_where($this->table, $where)->row_array();
	}

	public function update($data, $where)
	{
		$update = $this->db->update($this->table, $data, $where);
		if ($update) {
			return true;
		}
	}

	public function delete($where)
	{
		$this->db->delete($this->table, $where);
	}
}
