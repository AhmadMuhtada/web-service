   <?php
class form extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mform');
	}
	function index()
	{
		
		$data['form']=$this->mform->getForm();
		$this->load->view('form/vform',$data);
	}


	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('NO_ID', 'NO_ID', 'trim|required|numeric|min_length[2]|max_length[5]');
		$this->form_validation->set_rules('NAMA_LENGKAP', 'NAMA_LENGKAP', 'trim|required|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('JENIS_KELAMIN', 'JENIS_KELAMIN', 'trim|required|min_length[2]|max_length[10]');
		$this->form_validation->set_rules('UMUR', 'UMUR', 'trim|required|numeric|min_length[2]|max_length[3]');
		$this->form_validation->set_rules('AGAMA', 'AGAMA', 'trim|required|min_length[2]|max_length[10]');
		$this->form_validation->set_rules('TANGGAL_LAHIR', 'TANGGAL_LAHIR', 'trim|required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('ALAMAT', 'ALAMAT', 'trim|required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('LULUSAN_TERAKHIR', 'LULUSAN_TERAKHIR', 'trim|required|min_length[2]|max_length[10]');
		$this->form_validation->set_rules('NO_HP', 'NO_HP', 'trim|required|min_length[2]|max_length[13]');
		$this->form_validation->set_rules('EMAIL', 'EMAIL', 'trim|required|min_length[2]|max_length[25]');
		$this->load->model('m_perusahaan');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('form/v_tambah_form');

		}else{
			$config['upload_path']			='./assets/berkas';
			$config['allowed_types']		='pdf|doc|docx';
			$config['max_size']				=10000000000;
			$config['max_width']			=10240;
			$config['max_height']			=7680;
			$this->load->library('upload', $config);
			if( ! $this->upload->do_upload('userfile'))
			{
				$error = array('error' => $this->upload->display_errors());
				echo "<script> alert('Berkas belum diisi'); 
				window.location.href='http://localhost/ova/index.php/form/create';</script>";	
			}
			else
			{
				$this->mform->insertForm();
               	redirect('form');
			}

		}
	}




	public function delete($NO_ID)
	{
		//$where=array('id'=>$id);
		//$this->load->model('pegawai_model');

		//$this->load->model('pegawai_model');
		//$data['pegawai']=$this->pegawai_model->getPegawai($id);
		//$namaFile = $data['pegawai']->foto;
		//unlink('assets/uploads/'.$namaFile);

		//$this->pegawai_model->deleteById($id);
		//redirect('pegawai/datatable','refresh');
		$this->load->model('mform');
		$path= './assets/berkas';
		$where = array('NO_ID' => $NO_ID);
		$rowdel = $this->mform->get_byimage($where,'form');
		@unlink($path.$rowdel->berkas);

		$this->mform->m_delete($where,'form');
		redirect('form');
	}

	
}
?>