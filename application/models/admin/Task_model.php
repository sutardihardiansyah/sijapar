<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task_model extends CI_Model
{
	public $table = 'booking';
	public $column_order = ['b.nomor_po', 'c.nm_customer'];
	public $column_search = ['b.nomor_po', 'c.nm_customer'];
	public $order = ['b.id_booking' => 'asc'];

	private function _getdata()
	{
		$this->db->select('b.*, e.nm_engineer, c.nm_customer, c.tlp_customer, c.email');
		$this->db->from($this->table . ' b');
		$this->db->join('engineer e', 'e.id_engineer = b.id_engineer');
		$this->db->join('customer c', 'c.id_customer = b.id_customer');
		$this->db->where('b.id_engineer', $this->session->userdata('id'));
		$i = 0;

		foreach ($this->column_search as $item) // loop column 
		{
			if ($_POST['search']['value']) // cek kalo ada search data
			{
				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open group like or like
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close group like or like
			}
			$i++;
		}
		if (isset($_POST['order'])) // cek kalo click order
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_data()
	{
		$this->_getdata();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_filtered()
	{
		$this->_getdata();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
}
