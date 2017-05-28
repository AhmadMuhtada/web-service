<?php
class home_admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		
		
		if(!$this->session->userdata('NAMA_ADMIN'))
		{
			redirect('Login');
		}
		$this->load->model('m_admin');
	}

	public function index()
	{
		$this->session->userdata('NAMA_ADMIN');
		$data["admin"]=$this->m_admin->selectAll();
		$this->load->view('admin/v_homeadmin',$data);
		
		
	}

	
	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ID_ADMIN', 'ID_ADMIN', 'trim|required|min_length[2]|max_length[5]');
		$this->form_validation->set_rules('NAMA_ADMIN', 'NAMA_ADMIN', 'trim|required|min_length[2]|max_length[25]');
		$this->form_validation->set_rules('PASSWORD', 'PASSWORD', 'trim|required|min_length[2]|max_length[50]');
		$this->load->model('m_admin');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('admin/vtambah_admin');

		}else{
			$config['upload_path']			='./assets/foto/admin';
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

	public function update($ID_ADMIN)
	{
		$this->load->helper('url','form', 'file');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('NAMA_ADMIN', 'NAMA_ADMIN', 'trim|required');

		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('m_admin');
		$data['admin']=$this->m_admin->getAdmin($ID_ADMIN);
		if($this->form_validation->run()==FALSE){
			$this->load->view('admin/v_edit_admin',$data);
		}
		else
		{
			    $config['upload_path']          = './assets/foto/admin';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000000000;
                $config['max_width']            = 10240;
                $config['max_height']           = 7680;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);


               	if ( ! $this->upload->do_upload('userfile')){
				
					$this->m_admin->updateAdminTanpaFoto($ID_ADMIN);
					$data["admin"] = $this->m_admin->selectAll();	
					$this->load->view('admin/v_homeadmin', $data);
				
				}
				else{
					$this->m_admin->updateAdmin($ID_ADMIN);
					$data["admin"] = $this->m_admin->selectAll();	
					$this->load->view('admin/v_homeadmin', $data);
				}

      //           if ( ! $this->upload->do_upload('userfile'))
      //           {
      //                   $error = array('error' => $this->upload->display_errors());
						// echo "<script> alert('Gambar belum diisi'); 
						// window.location.href='http://localhost:8181/codeigniter_alpha/index.php/pegawai/create';</script>";
      //           }
      //           else
      //           {
      //           		//echo "<pre>";	
      //           		//var_dump($this->upload->data());
      //           		//die();

						// $this->Pegawai_Model->updateById($id);
						// unlink('assets/uploads/'.$namaFile);
						// redirect('pegawai/datatable');
      //           }
		}
	}
	
	public function delete($ID_ADMIN)
	{
		//$where=array('id'=>$id);
		//$this->load->model('pegawai_model');

		//$this->load->model('pegawai_model');
		//$data['pegawai']=$this->pegawai_model->getPegawai($id);
		//$namaFile = $data['pegawai']->foto;
		//unlink('assets/uploads/'.$namaFile);

		//$this->pegawai_model->deleteById($id);
		//redirect('pegawai/datatable','refresh');
		$this->load->model('m_admin');
		$path= './assets/foto/admin';
		$where = array('ID_ADMIN' => $ID_ADMIN);
		$rowdel = $this->m_admin->get_byimage($where,'admin');
		@unlink($path.$rowdel->foto);

		$this->m_admin->m_delete($where,'admin');
		redirect('home_admin');
	}
}

?>