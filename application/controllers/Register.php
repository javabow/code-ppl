<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  if($this->session->userdata('id'))
  {
   redirect('homepage', 'refresh');
  }
  $this->load->library('form_validation');
  $this->load->library('encrypt');
  $this->load->model('register_model');
 }

 function index()
 {
  $data['success'] = null;
  $data['error'] = null;
  $this->load->view('register', $data);
 }

 function validation() {
  $this->form_validation->set_rules('user_name', 'Name', 'required|trim');
  $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email|is_unique[codeigniter_register.email]');
  $this->form_validation->set_rules('user_password', 'Password', 'required');
  if($this->form_validation->run()) {
     $verification_key = md5(rand());
     $encrypted_password = $this->encrypt->encode($this->input->post('user_password'));
     $data = array(
      'name'  => $this->input->post('user_name'),
      'email'  => $this->input->post('user_email'),
      'password' => $encrypted_password,
      'verification_key' => $verification_key
     );
     $id = $this->register_model->insert($data);
     if ($id) {
       $data['success'] = 'Congratz, you can login now !!!';
       $data['error'] = null;
     }
     $this->load->view('register', $data);
  }
  else
  {
    $data['error'] = 'Wrong Information';
    $data['success'] = null;
   $this->load->view('register', $data);
  }
 }

 function verify_email()
 {
  if($this->uri->segment(3))
  {
   $verification_key = $this->uri->segment(3);
   if($this->register_model->verify_email($verification_key))
   {
    $data['message'] = '<h1 align="center">Your Email has been successfully verified, now you can login from <a href="'.base_url().'login">here</a></h1>';
   }
   else
   {
    $data['message'] = '<h1 align="center">Invalid Link</h1>';
   }
   $this->load->view('email-verification', $data);
  }
 }

}

?>