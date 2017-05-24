<?php

class m_perusahaan extends CI_Model{
	public function getDataPerusahaan()
	{
		$this->db->select("ID_PERUSAHAAN,NAMA_PERUSAHAAN,ALAMAT_PERUSAHAAN,INFO_PERUSAHAAN,EMAIL_PERUSAHAAN,PASSWORD_PERUSAHAAN,NO_TELP_PERUSAHAAN,FOTO_PERUSAHAAN");
			$query = $this->db->get('perusahaan');
			return $query->result();
	}


	public function insertPerusahaan()
		{
			//$ID_ADMIN = $this->input->post('ID_ADMIN');
			//$NAMA_ADMIN = $this->input->post('NAMA_ADMIN');
			//$PASSWORD = $this->input->post('PASSWORD');
			//$password_encrypt=md5($PASSWORD);
			//$FOTO_ADMIN = $this->upload->data('file_name')

			//$query = $this->db->query("INSERT INTO admin VALUES ('$ID_ADMIN', '$NAMA_ADMIN', '$password_encrypt', '$FOTO_ADMIN')");
			$insert_perusahaan = array(
				'ID_PERUSAHAAN' => $this->input->post('ID_PERUSAHAAN'),
				'NAMA_PERUSAHAAN' => $this->input->post('NAMA_PERUSAHAAN'),
				'ALAMAT_PERUSAHAAN' => $this->input->post('ALAMAT_PERUSAHAAN'),
				'INFO_PERUSAHAAN' => $this->input->post('INFO_PERUSAHAAN'),
				'EMAIL_PERUSAHAAN' => $this->input->post('EMAIL_PERUSAHAAN'),
				'PASSWORD_PERUSAHAAN' => $this->input->post('PASSWORD_PERUSAHAAN'),
				'NO_TELP_PERUSAHAAN' => $this->input->post('NO_TELP_PERUSAHAAN'),
				'FOTO_PERUSAHAAN' => $this->upload->data('file_name'),
			
			);

			$this->db->insert('perusahaan', $insert_perusahaan);

		}
		
		public function updatePerusahaan($ID_PERUSAHAAN)
		{
			$data = array(
				'ID_PERUSAHAAN' => $this->input->post('ID_PERUSAHAAN'), 
				'NAMA_PERUSAHAAN' => $this->input->post('NAMA_PERUSAHAAN'), 
				'ALAMAT_PERUSAHAAN' => $this->input->post('ALAMAT_PERUSAHAAN'), 
				'INFO_PERUSAHAAN' => $this->input->post('INFO_PERUSAHAAN'), 
				'EMAIL_PERUSAHAAN' => $this->input->post('EMAIL_PERUSAHAAN'), 
				'PASSWORD_PERUSAHAAN' => $this->input->post('PASSWORD_PERUSAHAAN'), 
				'NO_TELP_PERUSAHAAN' => $this->input->post('NO_TELP_PERUSAHAAN'), 
				'FOTO_PERUSAHAAN' => $this->upload->data('file_name')
			);
			$this->db->where('ID_PERUSAHAAN', $ID_PERUSAHAAN);
			$this->db->update('perusahaan', $data);
		}
		public function updatePerusahaanTanpaFoto($ID_PERUSAHAAN)
		{
			$data = array(
				'ID_PERUSAHAAN' => $this->input->post('ID_PERUSAHAAN'), 
				'NAMA_PERUSAHAAN' => $this->input->post('NAMA_PERUSAHAAN'), 
				'ALAMAT_PERUSAHAAN' => $this->input->post('ALAMAT_PERUSAHAAN'), 
				'INFO_PERUSAHAAN' => $this->input->post('INFO_PERUSAHAAN'), 
				'EMAIL_PERUSAHAAN' => $this->input->post('EMAIL_PERUSAHAAN'), 
				'PASSWORD_PERUSAHAAN' => $this->input->post('PASSWORD_PERUSAHAAN'), 
				'NO_TELP_PERUSAHAAN' => $this->input->post('NO_TELP_PERUSAHAAN'), 
			);
			$this->db->where('ID_PERUSAHAAN', $ID_PERUSAHAAN);
			$this->db->update('perusahaan', $data);
		}

		public function getPerusahaan ($ID_PERUSAHAAN)
		{
			$this->db->where('ID_PERUSAHAAN', $ID_PERUSAHAAN);	
			$query = $this->db->get('perusahaan',1);
			return $query->result();

		}

		public function getFoto($ID_PERUSAHAAN)
		{
			$query=$this->db->query("SELECT FOTO_PERUSAHAAN FROM perusahaan WHERE ID_PERUSAHAAN='$ID_PERUSAHAAN'");
			return $query->result_array();
		}

		public function updateById($ID_PERUSAHAAN)
		{
			$data = array('ID_PERUSAHAAN' => $this->input->post('ID_PERUSAHAAN'),
							'NAMA_PERUSAHAAN' => $this->input->post('NAMA_PERUSAHAAN'),
							'ALAMAT_PERUSAHAAN' => $this->input->post('ALAMAT_PERUSAHAAN'),
							'INFO_PERUSAHAAN' => $this->input->post('INFO_PERUSAHAAN'),
							'EMAIL_PERUSAHAAN' => $this->input->post('EMAIL_PERUSAHAAN'),
							'PASSWORD_PERUSAHAAN' => $this->input->post('PASSWORD_PERUSAHAAN'), 
							'FOTO_PERUSAHAAN' => $this->upload->data('file_name')
							 );
			$this->db->where('ID_PERUSAHAAN', $ID_PERUSAHAAN);
			$this->db->update('perusahaan', $data);
		}
		public function deleteById($ID_PERUSAHAAN)
		{
			$this->db->where('ID_PERUSAHAAN', $ID_PERUSAHAAN);
			$this->db->delete('perusahaan');
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