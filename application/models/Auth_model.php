<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

	public $table = 'customer';

	public function get_where($where)
	{
		$admin = $this->db->get_where($this->table, $where)->row_array();

		if ($admin) {
			return $admin;
		} else {
			return false;
		}
	}

	public function insert($data)
	{
		$save = $this->db->insert($this->table, $data);
		return $save ? $this->db->insert_id() : false;
	}
}
