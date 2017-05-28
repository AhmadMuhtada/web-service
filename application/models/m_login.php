<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model 
{
	public function login($Username, $Password)
	{
		//$this->db->select('ID_ADMIN, NAMA_ADMIN, PASSWORD');
		//$this->db->from('admin');
		$this->db->where('NAMA_ADMIN', $Username);
		$this->db->where('PASSWORD', $Password);
		return $this->db->get('admin');
		//$query=$this->db->get();
		//if ($query->num_rows()==1)
		//{
		//	return $query->result();
		//}
		//else 
		//{
		//	return false;
		//}
		
	}
}

/* End of file User_Model.php */
/* Location: ./application/models/User_Model.php */
?>