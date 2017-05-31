<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Login extends CI_Controller {
 
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->helper('url','form');	
 		$this->load->library('form_validation', 'session');
 	}
 	public function index()
 	{
 		
 		$this->load->view('v_login');	
 	}

 	public function cekLogin()
 	{
		$Username = $this->input->post('NAMA_ADMIN');
		$Password = $this->input->post('PASSWORD');

		$login = $this->m_login->login($Username, $Password);
		if($login->num_rows() == 1)
		{
			foreach($login->result() as $d){
				$sess_data['ID_ADMIN'] = $d->ID_ADMIN;
				$sess_data['NAMA_ADMIN'] = $d->NAMA_ADMIN;
				$this->session->set_userdata($sess_data);
			} 
			redirect('home_admin');
			
		}
		else
		{
		$this->session->set_flashdata('pesan', 'Maaf, Kombinasi Username dengan Password salah.');
			redirect('Login');
		}
 	}
	
	//public function cekDB($Password)
 	//{
 	//	$this->load->model('m_login');
	//	$Username = $this->input->post('NAMA_ADMIN');
	//	$result = $this->m_login->login($Username, $Password);
	//	if($result)
	//	{
	//		$sess_array = array();
	//		foreach ($result as $row) 
	//		{
	//			$sess_array = array
	//			(
	//				'ID_ADMIN'=>$row->ID_ADMIN,
	//				'NAMA_ADMIN'=> $row->NAMA_ADMIN
	//			);
	//			$this->session->set_userdata('logged_in', $sess_array);	
				
	//		}
	//		return true;
	//	}
	//	else
	//	{
	//		$this->form_validation->set_message('cekDB',"Login Gagal Username dan Password tidak valid");
	//		return false;
	//	}
 		
 	//} 

 	public function logout()
 	{
 		//$this->session->unset_userdata('logged_in');
 		$this->session->sess_destroy();
 		redirect('login','refresh');
 	}
 }
 
 ?>