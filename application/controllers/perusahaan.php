<?php

class perusahaan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_perusahaan');
	}

	public function index()
	{
		
		$data["perusahaan"]=$this->m_perusahaan->getDataPerusahaan();
		$this->load->view('perusahaan/v_perusahaan',$data);
	}

	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ID_PERUSAHAAN', 'ID_PERUSAHAAN', 'trim|required|min_length[2]|max_length[5]');
		$this->form_validation->set_rules('NAMA_PERUSAHAAN', 'NAMA_PERUSAHAAN', 'trim|required|min_length[2]|max_length[25]');
		$this->form_validation->set_rules('ALAMAT_PERUSAHAAN', 'ALAMAT_PERUSAHAAN', 'trim|required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('INFO_PERUSAHAAN', 'INFO_PERUSAHAAN', 'trim|required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('EMAIL_PERUSAHAAN', 'EMAIL_PERUSAHAAN', 'trim|required|min_length[2]|max_length[25]');
		$this->form_validation->set_rules('PASSWORD_PERUSAHAAN', 'PASSWORD_PERUSAHAAN', 'trim|required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('NO_TELP_PERUSAHAAN', 'NO_TELP_PERUSAHAAN', 'trim|required|numeric|min_length[2]|max_length[13]');
		$this->load->model('m_perusahaan');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('perusahaan/vtambah_perusahaan');

		}else{
			$config['upload_path']			='./assets/foto/perusahaan';
			$config['allowed_types']		='gif|jpg|png|jpeg';
			$config['max_size']				=1000000000;
			$config['max_width']			=10240;
			$config['max_height']			=7680;
			$this->load->library('upload', $config);
			if( ! $this->upload->do_upload('userfile'))
			{
				$error = array('error' => $this->upload->display_errors());
				echo "<script> alert('Gambar belum diisi'); 
				window.location.href='http://localhost/ova/index.php/perusahaan/create';</script>";	
			}
			else
			{
				$this->m_perusahaan->insertPerusahaan();
               	redirect('perusahaan');
			}

		}
	}

	public function update($ID_PERUSAHAAN)
	{
		$this->load->helper('url','form', 'file');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('NAMA_PERUSAHAAN', 'NAMA_PERUSAHAAN', 'trim|required');

		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('m_perusahaan');
		$data['perusahaan']=$this->m_perusahaan->getPerusahaan($ID_PERUSAHAAN);
		if($this->form_validation->run()==FALSE){
			$this->load->view('perusahaan/v_edit_perusahaan',$data);
		}
		else
		{
			    $config['upload_path']          = './assets/foto/perusahaan';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000000000;
                $config['max_width']            = 10240;
                $config['max_height']           = 7680;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);


               	if ( ! $this->upload->do_upload('userfile')){
				
					$this->m_perusahaan->updatePerusahaanTanpaFoto($ID_PERUSAHAAN);
					$data["perusahaan"] = $this->m_perusahaan->getDataPerusahaan();	
					$this->load->view('perusahaan/v_perusahaan', $data);
				
				}
				else{
					$this->m_perusahaan->updatePerusahaan($ID_PERUSAHAAN);
					$data["perusahaan"] = $this->m_perusahaan->getDataPerusahaan();	
					$this->load->view('perusahaan/v_perusahaan', $data);
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

	public function delete($ID_PERUSAHAAN)
	{
		//$where=array('id'=>$id);
		//$this->load->model('pegawai_model');

		//$this->load->model('pegawai_model');
		//$data['pegawai']=$this->pegawai_model->getPegawai($id);
		//$namaFile = $data['pegawai']->foto;
		//unlink('assets/uploads/'.$namaFile);

		//$this->pegawai_model->deleteById($id);
		//redirect('pegawai/datatable','refresh');
		$this->load->model('m_perusahaan');
		$path= './assets/foto/perusahaan';
		$where = array('ID_PERUSAHAAN' => $ID_PERUSAHAAN);
		$rowdel = $this->m_perusahaan->get_byimage($where,'perusahaan');
		@unlink($path.$rowdel->foto);

		$this->m_perusahaan->m_delete($where,'perusahaan');
		redirect('perusahaan');
	}
}
?>