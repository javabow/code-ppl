<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
 	{
    parent::__construct();
    $this->load->database();
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('profile_model');
 	}

 	public function index()
 	{
 		if(!$this->session->userdata('id'))
		  {
			$this->load->view('login');
		  }else{
		  	$data['login_status'] = 1;
		  	if ($this->session->userdata('id')) {
	    		$data['data_user'] = $this->profile_model->retrieveDataUser($this->session->userdata('id'));
		    }else{
		      	$data['data_user'] = null;      
		    }
		  	$this->load->view('header', $data);
		  	$this->load->view('profile_index', $data);
		  	$this->load->view('footer', $data);
		  }
 	}

 	function validation() {
 		if(!$this->session->userdata('id'))
		  {
		   $this->load->view('login');
		  }else{
	  	$this->form_validation->set_rules('user_ttl', 'Tanggal Lahir', 'required');
	  	$this->form_validation->set_rules('user_jk', 'Jenis Kelamin', 'required');
	  	$this->form_validation->set_rules('user_hp', 'Nomor Hp', 'required');
	  	$this->form_validation->set_rules('user_alamat', 'Alamat', 'required');
	  	$this->form_validation->set_rules('user_kp', 'Kode Pos', 'required');
	  	$data['login_status'] = 1;
	  	if($this->form_validation->run()) {
	     	$data = array(
	      		'alamat_user'  => $this->input->post('user_alamat'),
	      		'kodepos_user'  => $this->input->post('user_kp'),
	      		'nomorhp_user'  => $this->input->post('user_hp'),
	      		'jk_user'  => $this->input->post('user_jk'),
	      		'user_tl'  => $this->input->post('user_ttl'),
	      		'user_id'  => $this->session->userdata('id')
	     	);
	     	$checkID = $this->profile_model->id_check($this->session->userdata('id'));
	     	if ($checkID) {
	     		$id = $this->profile_model->update($data,$this->session->userdata('id'));
	     	}else{
	     		$id = $this->profile_model->insert($data);
	     	}
	     	if ($id) {
	       		$data['success'] = 'Sukses';
	     	}
	     	$pointer = $this->session->userdata('id');
	     	$msg = "Sukses Update Profile";
            $this->session->set_flashdata('test', $msg);
	     	redirect('profile/');
	 	}else{
	 		$msg = "Please fill out proper data";
            $this->session->set_flashdata('test', $msg);
	 		redirect('profile/edit/'.$pointer);
	 	}
	 }
	 	
	}

	public function edit()
	{
		if(!$this->session->userdata('id'))
		  {
		   $this->load->view('login');
		  }
		if ($this->uri->rsegment(3) != $this->session->userdata('id')) {
			$msg = "Terjadi Kesalahan";
            $this->session->set_flashdata('salah', $msg);
			redirect('profile/');
		}else{
		   	$data['login_status'] = 1;
		  	if ($data['data_user'] = $this->profile_model->retrieveDataUser($this->uri->rsegment(3)) != null && $this->uri->rsegment(3) == $this->session->userdata('id')) {
	    		$data['data_user'] = $this->profile_model->retrieveDataUser($this->uri->rsegment(3));
		    }else{
		      	$data['data_user'] = null;      
		    }
		  }
		
		$this->load->view('header', $data);
		$this->load->view('profile_user', $data);
		$this->load->view('footer', $data);
	}
}