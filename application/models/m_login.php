<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model 
{
	public function login($Username, $Password)
	{
		$this->db->select('ID_ADMIN, NAMA_ADMIN, PASSWORD');
		$this->db->from('admin');
		$this->db->where('NAMA_ADMIN', $Username);
		$this->db->where('PASSWORD', MD5($Password));
		$query=$this->db->get();
		if ($query->num_rows()==1)
		{
			return $query->result();
		}
		else 
		{
			return false;
		}
		
	}
}

	/*public function insertUser()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password_encrypt=md5($password);

		$query = $this->db->query("INSERT INTO user VALUES ('', '$username', '$password_encrypt')");
	}

	function isUsernameExist($username) {
	    $this->db->select('id');
	    $this->db->from('user');
	    $this->db->where('username', $username);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
}

/* End of file User_Model.php */
/* Location: ./application/models/User_Model.php */
?>