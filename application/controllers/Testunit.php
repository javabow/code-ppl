<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testunit extends CI_Controller {
 public function __construct()
 {
    parent::__construct();
    $this->load->library('encrypt');
    $this->load->library("unit_test");
    $this->load->model('login_model');
    $this->load->model('register_model');

 }

 private function login($a,$b){
 	$try = $this->login_model->can_login($a,$b);
 	return $try;
 }

 private function register($data){
 	$try = $this->register_model->insert($data);
 	return $try;
 }


 public function index(){
 	
 	$length = 5;
 	$name = substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
 	$email = substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
 	$password = substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
 	$verification_key = substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
 	$encrypted_password = $this->encrypt->encode($password);

 	$data = array(
      'name'  => $name,
      'email'  => $email,
      'password' => $encrypted_password,
      'verification_key' => $verification_key
     );

 	echo "Register Test";
 	$test = $this->register($data);
 	$expected_result = 1;
 	$test_name = "Register Test Function";
 	echo $this->unit->run($test,$expected_result,$test_name);


 	echo "Login Test";
 	$test = $this->login($email,$password);
 	$expected_result = 'berhasil';
 	$test_name = "Login Test Function";
 	echo $this->unit->run($test,$expected_result,$test_name);
 }
}

?>