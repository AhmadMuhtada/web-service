  <?php
class mform extends CI_Model{
	function getForm()
	{
		$this->db->order_by("NO_ID","asc");
		return $this->db->get('form')->result();
	}


	public function insertForm()
		{
			//$ID_ADMIN = $this->input->post('ID_ADMIN');
			//$NAMA_ADMIN = $this->input->post('NAMA_ADMIN');
			//$PASSWORD = $this->input->post('PASSWORD');
			//$password_encrypt=md5($PASSWORD);
			//$FOTO_ADMIN = $this->upload->data('file_name')

			//$query = $this->db->query("INSERT INTO admin VALUES ('$ID_ADMIN', '$NAMA_ADMIN', '$password_encrypt', '$FOTO_ADMIN')");
			$insert_form = array(
				'NO_ID' => $this->input->post('NO_ID'),
				'NAMA_LENGKAP' => $this->input->post('NAMA_LENGKAP'),
				'JENIS_KELAMIN' => $this->input->post('JENIS_KELAMIN'),
				'UMUR' => $this->input->post('UMUR'),
				'AGAMA' => $this->input->post('AGAMA'),
				'TANGGAL_LAHIR' => $this->input->post('TANGGAL_LAHIR'),
				'ALAMAT' => $this->input->post('ALAMAT'),
				'LULUSAN_TERAKHIR' => $this->input->post('LULUSAN_TERAKHIR'),
				'NO_HP' => $this->input->post('NO_HP'),
				'EMAIL' => $this->input->post('EMAIL'),
				'BERKAS' => $this->upload->data('file_name'),
			
			);

			$this->db->insert('form', $insert_form);

		}



	public function deleteById($NO_ID)
		{
			$this->db->where('NO_ID', $NO_ID);
			$this->db->delete('form');
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