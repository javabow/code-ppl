<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
 	{
    parent::__construct();
    $this->load->database();
    $this->load->helper('url');
    $this->load->model('homepage_model');
 	}


	public function index()
	{
		if(!$this->session->userdata('id'))
		  {
		   $data['login_status'] = 0;
		  }else{
		   $data['login_status'] = 1;
		  }
		$data['info_buku'] = $this->homepage_model->retrieveBuku();
		$this->load->view('header', $data);
		$this->load->view('homepage', $data);
		$this->load->view('footer', $data);
	}
}
