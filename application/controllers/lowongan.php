<?php

class lowongan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('mlowongan');
	}

	public function index()
	{
		
		$data["lowongan"]=$this->mlowongan->getDatalowongan();
		$this->load->view('perusahaan/vlowongan',$data);
	}

	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ID_PERUSAHAAN', 'ID_PERUSAHAAN', 'trim|required|min_length[2]|max_length[5]');
		$this->form_validation->set_rules('BIDANG_PEKERJAAN', 'BIDANG_PEKERJAAN', 'trim|required|min_length[2]|max_length[25]');
		$this->form_validation->set_rules('FASILITAS', 'FASILITAS', 'trim|required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('GAJI', 'GAJI', 'trim|required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('JUMLAH_LOWONGAN', 'JUMLAH_LOWONGAN', 'trim|required|min_length[2]|max_length[25]');
		$this->form_validation->set_rules('DEADLINE', 'DEADLINE', 'trim|required|min_length[3]|max_length[20]');
		$this->load->model('mlowongan');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('lowongan/vtambah_lowongan');

		}else{
			
				$this->mlowongan->insertlowongan();
               	redirect('lowongan');
			}

		}
 
	public function update($ID_PERUSAHAAN)
	{
		$this->load->helper('url','form', 'file');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('BIDANG_PEKERJAAN', 'BIDANG_PEKERJAAN', 'trim|required');

		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('mlowongan');
		$data['lowongan']=$this->mlowongan->getlowongan($ID_PERUSAHAAN);
		if($this->form_validation->run()==FALSE){
			$this->load->view('lowongan/v_edit_lowongan',$data);
		}
		else
		{
			    $config['upload_path']          = './assets/foto/lowongan';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000000000;
                $config['max_width']            = 10240;
                $config['max_height']           = 7680;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);


               	if ( ! $this->upload->do_upload('userfile')){
				
					$this->mlowongan->updatelowonganTanpaFoto($ID_PERUSAHAAN);
					$data["lowongan"] = $this->mlowongan->getDatalowongan();	
					$this->load->view('lowongan/vlowongan', $data);
				
				}
				else{
					$this->mlowongan->updatelowongan($ID_PERUSAHAAN);
					$data["lowongan"] = $this->mlowongan->getDatalowongan();	
					$this->load->view('lowongan/vlowongan', $data);
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
		$this->load->model('mlowongan');
		$path= './assets/foto/lowongan';
		$where = array('ID_PERUSAHAAN' => $ID_PERUSAHAAN);
		$rowdel = $this->mlowongan->get_byimage($where,'post_lowongan');
		@unlink($path.$rowdel->foto);

		$this->mlowongan->m_delete($where,'post_lowongan');
		redirect('lowongan');
	}
}
?>