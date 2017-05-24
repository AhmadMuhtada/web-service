<?php
class pelamar extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_pelamar');
	}
	public function index()
	{
		
		$data["user"]=$this->m_pelamar->getPelamar();
		$this->load->view('pelamar/v_pelamar',$data);
	}


	public function create()
	{
        $this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ID_USER', 'ID_USER', 'trim|required|min_length[2]|max_length[5]');
		$this->form_validation->set_rules('NAMA_USER', 'NAMA_USER', 'trim|required|min_length[2]|max_length[25]');
		$this->form_validation->set_rules('NO_TELP', 'NO_TELP', 'trim|required|numeric|min_length[2]|max_length[13]');
		$this->form_validation->set_rules('EMAIL_USER', 'EMAIL_USER', 'trim|required|min_length[2]|max_length[25]');
		$this->form_validation->set_rules('PASSWORD_USER', 'PASSWORD_USER', 'trim|required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('JENIS_KELAMIN_USER', 'JENIS_KELAMIN_USER', 'trim|required|min_length[3]|max_length[20]');
		$this->load->model('m_pelamar');	
		if($this->form_validation->run()==FALSE){

			//$this->load->view('admin/vtambah_admin');

		}else{
			$config['upload_path']			='./assets/foto/pelamar';
			$config['allowed_types']		='gif|jpg|png|jpeg';
			$config['max_size']				=1000000000;
			$config['max_width']			=10240;
			$config['max_height']			=7680;
			$this->load->library('upload', $config);
			
		if( ! $this->upload->do_upload('userfile'))
			{
				$error = array('error' => $this->upload->display_errors());
				echo "<script> alert('Gambar belum diisi'); 
				window.location.href='http://localhost/ova/index.php/pelamar/create';</script>";	
			}
			else
			{
				$this->m_pelamar->insertPelamar();
               	redirect('pelamar');
			}
		}
	}

	

	
}
?>