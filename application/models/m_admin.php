<?php
class m_admin extends CI_Model{
	public function selectAll()
	{
		$this -> db -> order_by("ID_ADMIN", "asc");
		$this->db->select("ID_ADMIN,NAMA_ADMIN,PASSWORD,FOTO_ADMIN");
			$query = $this->db->get('admin');
			return $query->result();
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
}
?>