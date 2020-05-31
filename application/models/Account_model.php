<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account_model extends CI_Model
{

	// protected $table = 'booking';

	public function get()
	{
		return $this->db->get($this->table);
	}

	public function insert($data)
	{
		$save = $this->db->insert($this->table, $data);
		return $save ? $this->db->insert_id() : false;
	}

	public function get_where($table, $where)
	{
		return $this->db->get_where($table, $where)->result_array();
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
