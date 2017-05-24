<?php
class mlist_admin extends CI_Model{
	function selectAll()
	{
		$this->db->order_by("NAMA_ADMIN","asc");
		return $this->db->get('admin')->result();
	}
}
?>