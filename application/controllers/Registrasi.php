<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Registrasi extends CI_Controller {
 
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

 	public function create()
 	{
 		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|is_unique|callback_isUsernameExist');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|min_length[6]|matches[password]');

		$this->load->model('m_login');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('v_login');
		} else {
		
			redirect('login','refresh');
		}
	}

	public function isUsernameExist($username) {
	    $this->load->library('form_validation');
	    $this->load->model('m_login');
	    $is_exist = $this->m_login->isUsernameExist($username);

	    if ($is_exist) {
	        $this->form_validation->set_message('isUsernameExist', 'Maaf, username sudah ada.');    
	        return false;
	    } else {
	    	$this->m_login->insertAdmin();
	    	redirect('login','refresh');
	        return true;
	    }
	}

 }
 
 /* End of file Registrasi.php */
 /* Location: ./application/controllers/Registrasi.php */ ?>