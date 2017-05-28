<?php
class m_admin extends CI_Model{
	public function selectAll()
	{
		/*$this->db->from($this->admin)*/
		$this->db->order_by("ID_ADMIN", "asc");
		$query = $this->db->get('admin'); 
		return $query->result();
		/*$this->db->select("ID_ADMIN,NAMA_ADMIN,PASSWORD,FOTO_ADMIN");
			$query = $this->db->get('admin');
			return $query->result();*/
	}

	public function insertAdmin()
		{
			//$ID_ADMIN = $this->input->post('ID_ADMIN');
			//$NAMA_ADMIN = $this->input->post('NAMA_ADMIN');
			//$PASSWORD = $this->input->post('PASSWORD');
			//$password_encrypt=md5($PASSWORD);
			//$FOTO_ADMIN = $this->upload->data('file_name')

			//$query = $this->db->query("INSERT INTO admin VALUES ('$ID_ADMIN', '$NAMA_ADMIN', '$password_encrypt', '$FOTO_ADMIN')");
			$insert_admin = array(
				'ID_ADMIN' => $this->input->post('ID_ADMIN'),
				'NAMA_ADMIN' => $this->input->post('NAMA_ADMIN'),
				'PASSWORD' => $this->input->post('PASSWORD'),
				'FOTO_ADMIN' => $this->upload->data('file_name'),
			
			);

			$this->db->insert('admin', $insert_admin);

		}
		
		public function updateAdmin($ID_ADMIN)
		{
			$data = array(
				'ID_ADMIN' => $this->input->post('ID_ADMIN'),
				'NAMA_ADMIN' => $this->input->post('NAMA_ADMIN'),
				'PASSWORD' => $this->input->post('PASSWORD'),
				'FOTO_ADMIN' => $this->upload->data('file_name'),
			);
			$this->db->where('ID_ADMIN', $ID_ADMIN);
			$this->db->update('admin', $data);
		}
		
		public function updateAdminTanpaFoto($ID_ADMIN)
		{
			$data = array(
				'ID_ADMIN' => $this->input->post('ID_ADMIN'),
				'NAMA_ADMIN' => $this->input->post('NAMA_ADMIN'),
				'PASSWORD' => $this->input->post('PASSWORD'),
			);
			$this->db->where('ID_ADMIN', $ID_ADMIN);
			$this->db->update('admin', $data);
		}

		public function getAdmin ($ID_ADMIN)
		{
			$this->db->where('ID_ADMIN', $ID_ADMIN);	
			$query = $this->db->get('admin',1);
			return $query->result();

		}

		public function getFoto($ID_ADMIN)
		{
			$query=$this->db->query("SELECT FOTO_ADMIN FROM admin WHERE ID_ADMIN='$ID_ADMIN'");
			return $query->result_array();
		}

		public function updateById($ID_ADMIN)
		{
			$data = array('ID_ADMIN' => $this->input->post('ID_ADMIN'),
							'NAMA_ADMIN' => $this->input->post('NAMA_ADMIN'),
							'PASSWORD' => $this->input->post('PASSWORD'),
							'FOTO_ADMIN' => $this->upload->data('file_name')
							 );
			$this->db->where('ID_ADMIN', $ID_ADMIN);
			$this->db->update('admin', $data);
		}
		
		public function deleteById($ID_ADMIN)
		{
			$this->db->where('ID_ADMIN', $ID_ADMIN);
			$this->db->delete('admin');
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