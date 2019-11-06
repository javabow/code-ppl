<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Auth extends CI_Controller {
  
     public function __construct()
        {
         parent::__construct();
         $this->load->model('Form_model');
             $this->load->library(array('form_validation','session'));
                 $this->load->helper(array('url','html','form'));
                 $this->user_id = $this->session->userdata('user_id');
        }
  
  
    public function index()
    {
     $this->load->view('login');
    }
    public function post_login()
        {
 
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('login');
        }
        else
        {   
            $data = array(
               'email' => $this->input->post('email'),
               'password' => md5($this->input->post('password')),
 
             );
   
            $check = $this->Form_model->auth_check($data);
            
            if($check != false){
 
                 $user = array(
                 'user_id' => $check->id,
                 'email' => $check->email,
                 'first_name' => $check->first_name,
                 'last_name' => $check->last_name
                );
  
            $this->session->set_userdata($user);
 
             redirect( base_url('dashboard') ); 
            }
 
           $this->load->view('login');
        }
         
    }   
    public function post_register()
    {
 
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('contact_no', 'Contact No', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('register');
        }
        else
        {   
            $data = array(
               'first_name' => $this->input->post('first_name'),
               'last_name' => $this->input->post('last_name'),
               'mobile_number' => $this->input->post('contact_no'),
               'email' => $this->input->post('email'),
               'password' => md5($this->input->post('password')),
 
             );
   
            $check = $this->Form_model->insert_user($data);
 
            if($check != false){
 
                $user = array(
                 'user_id' => $check,
                 'email' => $this->input->post('email'),
                 'first_name' => $this->input->post('first_name'),
                 'last_name' => $this->input->post('last_name'),
                );
             }
  
             $this->session->set_userdata($user);
 
             redirect( 'localhost/auth/dashboard' ); 
            }
 
         
    }
    public function logout(){
    $this->session->sess_destroy();
    redirect(base_url('auth'));
   }    
   public function dashboard(){
       if(empty($this->user_id)){
        redirect(base_url('auth'));
      }
       $this->load->view('dashboard');
    }
}