<?php

if (!function_exists('public_url')) {
	function public_url($url = '')
	{
		if ($url) {
			$url = base_url() . 'public/backend/' . $url;
		} else {
			$url = base_url() . 'public/backend/';
		}
		return $url;
	}
}

if (!function_exists('public_urll')) {
	function public_urll($url = '')
	{
		if ($url) {
			$url = base_url() . 'public/backend2/' . $url;
		} else {
			$url = base_url() . 'public/backend2/';
		}
		return $url;
	}
}

if (!function_exists('is_logged_in')) {
	function is_logged_in()
	{
		$ci = get_instance();
		if (!$ci->session->userdata('id_admin')) {
			redirect('auth');
		}
	}
}

if (!function_exists('is_access')) {
	function is_access($menu, $level)
	{
		$ci = get_instance();

		if ($level == 'admin') {
			if ($menu === 'dashboard' || $menu === 'admin' || $menu === 'engineer' || $menu === 'customer' || $menu === 'booking' || $menu === 'paket' || $menu === 'lap-booking') {
			} else {
				show_403();
			}
		} elseif ($level == 'engineer') {
			if ($menu === 'dashboard' || $menu === 'task') {
			} else {
				show_403();
			}
		} else {
			redirect('auth');
		}
	}
}

if (!function_exists('hash_password')) {
	function hash_password($password = 123456)
	{
		return password_hash($password, PASSWORD_DEFAULT);
	}
}

if (!function_exists('encode')) {

	function encode($string)
	{
		$key = 'd8578edf8458ce06fbc5bb76a58c5ca4';
		return urlencode(base64_encode($string . ' ' . $key));
	}
}

if (!function_exists('decode')) {

	function decode($string)
	{
		$decode = base64_decode(urldecode($string));
		$e = explode(' ', $decode);
		return $e[0];
	}
}

if (!function_exists('addon_script')) {
	function addon_script($script)
	{
		foreach ($script as $tag_script) {
			echo '<script src="' . public_url($tag_script) . '"></script>';
		}
	}
}

if (!function_exists('addon_style')) {
	function addon_style($style)
	{
		foreach ($style as $tag_link) {
			echo '<link href="' . public_url($tag_link) . '">';
		}
	}
}

if (!function_exists('format_rupiah')) {
	function format_rupiah($str)
	{
		return '<span>Rp.</span> ' . number_format($str, 0, '.', '.');
	}
}

if (!function_exists('show_403')) {
	function show_403()
	{
		$ci = get_instance();
		redirect('auth/show_403');
	}
}

if (!function_exists('create_code')) {
	function create_code()
	{
		$ci = get_instance();
		$sql = "SELECT MAX(MID(nomor_po,10,4)) AS invoice FROM booking WHERE MID(nomor_po,4,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";

		$query = $ci->db->query($sql);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$n = ((int) $row->invoice) + 1;
			$no = sprintf("%'.04d", $n);
		} else {
			$no = "0001";
		}
		$invoice = "CBA" . date('ymd') . $no;
		return $invoice;
	}
}
