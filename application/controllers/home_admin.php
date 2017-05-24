<?php
class home_admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_admin');
	}
	public function index()
	{
		
		$data["admin"]=$this->m_admin->selectAll();
		$this->load->view('admin/v_homeadmin',$data);
	}
	
	
	
	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('NAMA_ADMIN', 'NAMA_ADMIN', 'trim|required|alpha_numeric|min_length[2]|max_length[20]');
		$this->form_validation->set_rules('PASSWORD', 'PASSWORD', 'trim|required|alpha_numeric|min_length[3]|max_length[15]');
		$this->load->model('m_admin');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('admin/vtambah_admin');

		}else{
			$config['upload_path']			='./assets/foto';
			$config['allowed_types']		='gif|jpg|png|jpeg';
			$config['max_size']				=1000000000;
			$config['max_width']			=10240;
			$config['max_height']			=7680;
			$this->load->library('upload', $config);
			if( ! $this->upload->do_upload('userfile'))
			{
				$error = array('error' => $this->upload->display_errors());
				echo "<script> alert('Gambar belum diisi'); 
				window.location.href='http://localhost/ova/index.php/home_admin/create';</script>";	
			}
			else
			{
				$this->m_admin->insertAdmin();
               	redirect('home_admin');
			}

		}
	}

	

	
}
?>