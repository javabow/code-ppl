<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
 public function __construct()
 {
    parent::__construct();
    $this->load->database();
    $this->load->helper('url');
    $this->load->model('cart_model');
 }

 function index()
 {
  
  if(!$this->session->userdata('id'))
      {
       redirect('login');
      }else{
       $data['login_status'] = 1;
       $data['dataidcart'] = $this->cart_model->getID($this->session->userdata('id'));
       $cart_id = $data['dataidcart']['cart_id'];
       if ($cart_id) {
         $data['datacart'] = $this->cart_model->retrieveDataCart($cart_id);
         $data['jumlahItem'] = $this->cart_model->countCartItem($cart_id);
         $data['databuku'] = array();
         for ($i=0; $i < $data['jumlahItem']; $i++) { 
           $data['databuku'][$i] = $this->cart_model->getDataBuku($data['datacart'][$i][1]);
         }
         $sarray = array();
         $data['array2'] = array();
         foreach($data['databuku'] as $key => $value){
           $mem_info= array(
                        array(
                            '0' => $value[0][0],
                            '1' => $value[0][1], 
                            '2' => $value[0][2],
                            '3' => $value[0][3],
                            '4' => $value[0][4]
                        )
                    );

            array_push($data['array2'], $mem_info[0]);
          }
          $data['allArray'] = array_merge_recursive($data['datacart'],$data['array2']);
       }else{
         $data['datacart'] = null;
       }
       $this->load->view('header', $data);
       $this->load->view('cart_view', $data);
       $this->load->view('footer', $data);
      }
 }

  function checkout() {
    if(!$this->session->userdata('id')) {
       redirect('login');
      }else{
       $data['login_status'] = 1;
       $data['data_user'] = $this->cart_model->getDataUser($this->session->userdata('id'));
       $data['dataidcart'] = $this->cart_model->getID($this->session->userdata('id'));
       $cart_id = $data['dataidcart']['cart_id'];
       if ($cart_id) {
         $data['datacart'] = $this->cart_model->retrieveDataCart($cart_id);
         $data['jumlahItem'] = $this->cart_model->countCartItem($cart_id);
         $data['databuku'] = array();
         for ($i=0; $i < $data['jumlahItem']; $i++) { 
           $data['databuku'][$i] = $this->cart_model->getDataBuku($data['datacart'][$i][1]);
         }
         $idPenjualArray = array();
         $jumlahData = count($data['databuku']);
         for ($i=0; $i < $jumlahData; $i++) { 
           $idPenjualArray[$i] = $data['datacart'][$i][2];
         }
         $data['array2'] = array();
         foreach($data['databuku'] as $key => $value){
           $mem_info= array(
                        array(
                            '0' => $value[0][0],
                            '1' => $value[0][1], 
                            '2' => $value[0][2],
                            '3' => $value[0][3],
                            '4' => $value[0][4]
                        )
                    );

            array_push($data['array2'], $mem_info[0]);
          }
          $data['dataseller'] = $this->cart_model->getDataSeller($idPenjualArray);
          print_r($data['dataseller']);
          
       }else{
         $data['datacart'] = null;
       }
      }
    $this->load->view('header', $data);
    $this->load->view('checkout_view', $data);
    $this->load->view('footer', $data);
  }

 function add() {
  if(!$this->session->userdata('id')) {
       redirect('login');
      }else{
       $data['login_status'] = 1;
       $data1 = array(
            'id_user'  => $this->session->userdata('id')
        );
       $checkID = $this->cart_model->id_check($this->session->userdata('id'));
       if ($checkID) {
          $id = null;
        }else{
          $id = $this->cart_model->insertCart($data1);
        }
        $data['dataid'] = $this->cart_model->getID($this->session->userdata('id'));
        $cart_id = $data['dataid']['cart_id'];
        if ($cart_id) {
          $data['ada'] = 'idcart ada';
          $data['id'] = $cart_id;
        }else{
          $data['ada'] = 'gak ada';
          $data['id'] = null;
        }
        $quantity = $this->input->post('qty');
        $harga = $this->input->post('harga');
        $total = $quantity*$harga;
        $data2 = array(
            'cart_id'  => $cart_id,
            'id_buku'  => $this->input->post('buku_id'),
            'id_penjual'  => $this->input->post('penjual_id'),
            'qty'  => $this->input->post('qty'),
            'total_harga'  => $total
        );
        if ($cart_id) {
          $id = $this->cart_model->insertCartDetail($data2);
        }else{
          $id = null;
        }
        
        if ($id) {
            $data['success'] = 'Sukses';
            $msg = "Sukses menambah barang";
            $this->session->set_flashdata('sukses', $msg);
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $data['success'] = 'error';
            $msg = "Gagal menambah barang";
            $this->session->set_flashdata('gagal', $msg);
            redirect($_SERVER['HTTP_REFERER']);
        }
         
    }
 }

 function plus(){
  if(!$this->session->userdata('id')) {
       redirect('login');
      }else{
       $data['login_status'] = 1;
       $id = $this->cart_model->updateQtyPlus($this->uri->rsegment(3),$this->uri->rsegment(4));
       $data['cek'] = $this->uri->rsegment(4);
       if ($id) {
        $msg = "Sukses Update";
            $this->session->set_flashdata('test', $msg);
        redirect($_SERVER['HTTP_REFERER']);
        }else{
          $msg = "gagal";
                $this->session->set_flashdata('test', $msg);
        redirect($_SERVER['HTTP_REFERER']);
        }
      }
     }

  function minus(){
  if(!$this->session->userdata('id')) {
       redirect('login');
      }else{
       $data['login_status'] = 1;
       $id = $this->cart_model->updateQtyMinus($this->uri->rsegment(3),$this->uri->rsegment(4));
       $data['cek'] = $this->uri->rsegment(4);
       if ($id) {
        $msg = "Sukses Update";
            $this->session->set_flashdata('test', $msg);
        redirect($_SERVER['HTTP_REFERER']);
        }else{
          $msg = "gagal";
                $this->session->set_flashdata('test', $msg);
        redirect($_SERVER['HTTP_REFERER']);
        }
      }
     }

 function delete() {
  if(!$this->session->userdata('id')) {
       redirect('login');
      }else{
       $data['login_status'] = 1;
       $data['hapus'] = $this->cart_model->deleteCartDetail($this->uri->rsegment(3));
       if ($data['hapus']) {
            $data['success'] = 'Sukses';
            $msg = "Sukses menghapus barang";
            $this->session->set_flashdata('sukses', $msg);
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $data['success'] = 'error';
            $msg = "Gagal menghapus barang";
            $this->session->set_flashdata('gagal', $msg);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
 }

}

?>