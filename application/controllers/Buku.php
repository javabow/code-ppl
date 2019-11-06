<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
 public function __construct()
 {
    parent::__construct();
    $this->load->database();
    $this->load->helper('url');
    $this->load->model('buku_model');
 }

 function index()
 {
  
  if(!$this->session->userdata('id'))
      {
       $data['login_status'] = 0;
      }else{
       $data['login_status'] = 1;
      }
  $this->load->view('item', $data);
 }

  public function search(){
    if(!$this->session->userdata('id'))
      {
       $data['login_status'] = 0;
      }else{
       $data['login_status'] = 1;
      }
    $data['cari'] = $this->buku_model->cari();
    parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
    $this->load->view('header', $data);
    $this->load->view('pencarian', $data);
    $this->load->view('footer');
  }

 function view() {
  if(!$this->session->userdata('id'))
      {
       $data['login_status'] = 0;
      }else{
       $data['login_status'] = 1;
      }
  if ($data['data_buku'] = $this->buku_model->getDataBuku($this->uri->rsegment(3)) != null) {
      $data['data_buku'] = $this->buku_model->getDataBuku($this->uri->rsegment(3));
      $idkategori = $data['data_buku'][0][8];
      $data['nama_kategori'] =  $this->buku_model->getNamaKategori($idkategori);
      // $data['id'] = $this->Toram_model->getID($this->uri->rsegment(2));
      // $data['komentar'] = $this->Toram_model->getKomentar($this->uri->rsegment(2));
      // $data['jumlahKomentar'] = $this->Toram_model->count_Komentar($this->uri->rsegment(2));
    }else{
      $data['error'] = 'Page Not Found';      
    }

    $this->load->view('header', $data);
    $this->load->view('item', $data);
    $this->load->view('footer', $data);
  
 }

}

?>