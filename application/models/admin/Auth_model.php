<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	protected $table = 'customer';

	public function get_where($where)
	{
		$admin = $this->db->get_where('admin', $where)->row_array();
		$engineer = $this->db->get_where('engineer', $where)->row_array();

		if ($admin) {
			return [
				$admin,
				'id' => $admin['id_admin'],
				'nama' => $admin['nm_admin'],
				'level' => 'admin'
			];
		} else if ($engineer) {
			return [
				$engineer,
				'id' => $engineer['id_engineer'],
				'nama' => $engineer['nm_engineer'],
				'level' => 'engineer'
			];
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
