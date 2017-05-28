<?php
class m_pelamar extends CI_Model{
	public function getDataPelamar()
	{
		$this->db->select("ID_USER,NAMA_USER,NO_TELP,EMAIL_USER,PASSWORD_USER,JENIS_KELAMIN_USER,FOTO_USER");
			$query = $this->db->get('user');
			return $query->result();
	}

	public function insertPelamar()
		{
			//$ID_ADMIN = $this->input->post('ID_ADMIN');
			//$NAMA_ADMIN = $this->input->post('NAMA_ADMIN');
			//$PASSWORD = $this->input->post('PASSWORD');
			//$password_encrypt=md5($PASSWORD);
			//$FOTO_ADMIN = $this->upload->data('file_name')

			//$query = $this->db->query("INSERT INTO admin VALUES ('$ID_ADMIN', '$NAMA_ADMIN', '$password_encrypt', '$FOTO_ADMIN')");
			$insert_pelamar = array(
				'ID_USER' => $this->input->post('ID_USER'),
				'NAMA_USER' => $this->input->post('NAMA_USER'),
				'NO_TELP' => $this->input->post('NO_TELP'),
				'EMAIL_USER' => $this->input->post('EMAIL_USER'),
				'PASSWORD_USER' => $this->input->post('PASSWORD_USER'),
				'JENIS_KELAMIN_USER' => $this->input->post('JENIS_KELAMIN_USER'),
				'FOTO_USER' => $this->input->post('file_name'),
			
			); 

			$this->db->insert('pelamar', $insert_pelamar);

		}

		public function updatePelamar($ID_USER)
		{
			$data = array(
				'ID_USER' => $this->input->post('ID_USER'),
				'NAMA_USER' => $this->input->post('NAMA_USER'),
				'NO_TELP' => $this->input->post('NO_TELP'),
				'EMAIL_USER' => $this->input->post('EMAIL_USER'),
				'PASSWORD_USER' => $this->input->post('PASSWORD_USER'),
				'JENIS_KELAMIN_USER' => $this->input->post('JENIS_KELAMIN_USER'),
				'FOTO_USER' => $this->input->post('file_name'),
			);
			$this->db->where('ID_USER', $ID_USER);
			$this->db->update('user', $data);
		}
		public function updatePelamarTanpaFoto($ID_USER)
		{
			$data = array(
				'ID_USER' => $this->input->post('ID_USER'),
				'NAMA_USER' => $this->input->post('NAMA_USER'),
				'NO_TELP' => $this->input->post('NO_TELP'),
				'EMAIL_USER' => $this->input->post('EMAIL_USER'),
				'PASSWORD_USER' => $this->input->post('PASSWORD_USER'),
				'JENIS_KELAMIN_USER' => $this->input->post('JENIS_KELAMIN_USER'),
			);
			$this->db->where('ID_USER', $ID_USER);
			$this->db->update('user', $data);
		}

		public function getPelamar ($ID_USER)
		{
			$this->db->where('ID_USER', $ID_USER);	
			$query = $this->db->get('user',1);
			return $query->result();

		}

		public function getFoto($ID_USER)
		{
			$query=$this->db->query("SELECT FOTO_USER FROM user WHERE ID_USER = '$ID_USER'");
			return $query->result_array();
		}

		public function updateById($ID_USER)
		{
			$data = array(
				'ID_USER' => $this->input->post('ID_USER'),
				'NAMA_USER' => $this->input->post('NAMA_USER'),
				'NO_TELP' => $this->input->post('NO_TELP'),
				'EMAIL_USER' => $this->input->post('EMAIL_USER'),
				'PASSWORD_USER' => $this->input->post('PASSWORD_USER'),
				'JENIS_KELAMIN_USER' => $this->input->post('JENIS_KELAMIN_USER'),
				'FOTO_USER' => $this->input->post('file_name'),
							 );
			$this->db->where('ID_USER', $ID_USER);
			$this->db->update('user', $data);
		}
		public function deleteById($ID_USER)
		{
			$this->db->where('ID_USER', $ID_USER);
			$this->db->delete('user');
		}

		public function m_delete($where,$table)
    	{
	        $this->db->where($where);
			$this->db->delete($table);
	    }

		function get_byimage($where,$table) {
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
 
	        if ($query->num_rows() == 1) {
	            return $query->row();
	        }
    	}
}
?>