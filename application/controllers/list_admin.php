<?php
class list_admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mlist_admin');
	}
	function index()
	{
		$data['title']='List Admin';
		$data['admin']=$this->mlist_admin->selectAll();
		$this->load->view('vlist_admin',$data);
	}

	
}
?>