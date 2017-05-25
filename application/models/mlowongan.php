 <?php

class mlowongan extends CI_Model{
	public function getDatalowongan()
	{
		$this->db->select("ID_PERUSAHAAN,BIDANG_PEKERJAAN,FASILITAS,GAJI,JUMLAH_LOWONGAN,DEADLINE") ;
			$query = $this->db->get('post_lowongan') ;
			return $query->result() ;
	}


	public function insertlowongan()
		{
			//$ID_ADMIN = $this->input->post('ID_ADMIN');
			//$NAMA_ADMIN = $this->input->post('NAMA_ADMIN');
			//$PASSWORD = $this->input->post('PASSWORD');
			//$password_encrypt=md5($PASSWORD);
			//$FOTO_ADMIN = $this->upload->data('file_name')

			//$query = $this->db->query("INSERT INTO admin VALUES ('$ID_ADMIN', '$NAMA_ADMIN', '$password_encrypt', '$FOTO_ADMIN')");
			$insert_lowongan = array(
				'ID_PERUSAHAAN' => $this->input->post('ID_PERUSAHAAN'),
				'BIDANG_PEKERJAAN' => $this->input->post('BIDANG_PEKERJAAN'),
				'FASILITAS' => $this->input->post('FASILITAS'),
				'GAJI' => $this->input->post('GAJI'),
				'JUMLAH_LOWONGAN' => $this->input->post('JUMLAH_LOWONGAN'),
				'DEADLINE' => $this->input->post('DEADLINE'),
				
			
			);

			$this->db->insert('post_lowongan', $insert_lowongan);

		}
		
		public function updatelowongan($ID_PERUSAHAAN)
		{
			$data = array(
				'ID_PERUSAHAAN' => $this->input->post('ID_PERUSAHAAN'), 
				'BIDANG_PEKERJAAN' => $this->input->post('BIDANG_PEKERJAAN'), 
				'FASILITAS' => $this->input->post('FASILITAS'), 
				'GAJI' => $this->input->post('GAJI'), 
				'JUMLAH_LOWONGAN' => $this->input->post('JUMLAH_LOWONGAN'), 
				'DEADLINE' => $this->input->post('DEADLINE'), 
			);
			$this->db->where('ID_PERUSAHAAN', $ID_PERUSAHAAN);
			$this->db->update('post_lowongan', $data);
		}
		public function updatelowonganTanpaFoto($ID_PERUSAHAAN)
		{
			$data = array(
				'ID_PERUSAHAAN' => $this->input->post('ID_PERUSAHAAN'), 
				'BIDANG_PEKERJAAN' => $this->input->post('BIDANG_PEKERJAAN'), 
				'FASILITAS' => $this->input->post('FASILITAS'), 
				'GAJI' => $this->input->post('GAJI'), 
				'JUMLAH_LOWONGAN' => $this->input->post('JUMLAH_LOWONGAN'), 
				'DEADLINE' => $this->input->post('DEADLINE'), 
				);
			$this->db->where('ID_PERUSAHAAN', $ID_PERUSAHAAN);
			$this->db->update('post_lowongan', $data);
		}

		public function getlowongan ($ID_PERUSAHAAN)
		{
			$this->db->where('ID_PERUSAHAAN', $ID_PERUSAHAAN);	
			$query = $this->db->get('post_lowongan',1);
			return $query->result();

		}

		
		public function updateById($ID_PERUSAHAAN)
		{
			$data = array('ID_PERUSAHAAN' => $this->input->post('ID_PERUSAHAAN'),
							'BIDANG_PEKERJAAN' => $this->input->post('BIDANG_PEKERJAAN'),
							'FASILITAS' => $this->input->post('FASILITAS'),
							'GAJI' => $this->input->post('GAJI'),
							'JUMLAH_LOWONGAN' => $this->input->post('JUMLAH_LOWONGAN'),
							'DEADLINE' => $this->input->post('DEADLINE'), 
							
							 );
			$this->db->where('ID_PERUSAHAAN', $ID_PERUSAHAAN);
			$this->db->update('post_lowongan', $data);
		}
		public function deleteById($ID_PERUSAHAAN)
		{
			$this->db->where('ID_PERUSAHAAN', $ID_PERUSAHAAN);
			$this->db->delete('post_lowongan');
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