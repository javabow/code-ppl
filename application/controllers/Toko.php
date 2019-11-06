<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

	public function __construct()
 	{
    parent::__construct();
    $this->load->database();
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('toko_model');
 	}

 	public function index()
 	{
 		if(!$this->session->userdata('id'))
		  {
			$this->load->view('login');
		  }else{
		  	$data['login_status'] = 1;
		  	if ($this->session->userdata('id')) {
		  		$data['checksellerID'] = $this->toko_model->getID($this->session->userdata('id'),1);
				$sellerID = $data['checksellerID']['id_penjual'];
	    		$data['data_user'] = $this->toko_model->retrieveDataSeller($this->session->userdata('id'));
	    		$data['data_book'] = $this->toko_model->retrieveDataBook($sellerID,0);
		    }else{
		      	$data['data_user'] = null;
		      	$data['data_book'] = null;       
		    }
		  	$this->load->view('header', $data);
		  	$this->load->view('seller_index', $data);
		  	$this->load->view('footer', $data);
		  }
 	}

 	function validation() {
 		if(!$this->session->userdata('id'))
		  {
		   $this->load->view('login');
		  }else{
	  	$this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required');
	  	$this->form_validation->set_rules('alamat_toko', 'Jenis Kelamin', 'required');
	  	$data['login_status'] = 1;
	  	if($this->form_validation->run()) {
	     	$data = array(
	      		'nama_toko'  => $this->input->post('nama_toko'),
	      		'alamat_toko'  => $this->input->post('alamat_toko'),
	      		'user_id'  => $this->session->userdata('id')
	     	);
	     	$checkID = $this->toko_model->id_check($this->session->userdata('id'),1);
	     	if ($checkID) {
	     		$id = $this->toko_model->update($data,$this->session->userdata('id'),1);
	     	}else{
	     		$id = $this->toko_model->insert($data,1);
	     	}
	     	if ($id) {
	       		$data['success'] = 'Sukses';
	     	}
	     	$pointer = $this->session->userdata('id');
	     	$msg = "Sukses Update Profile";
            $this->session->set_flashdata('test', $msg);
	     	redirect('toko/');
	 	}else{
	 		$msg = "Please fill out proper data";
	 		$pointer = $this->session->userdata('id');
            $this->session->set_flashdata('test', $msg);
	 		redirect('toko/edit/'.$pointer);
	 	}
	 }
	 	
	}

	function validationitem() {
 		if(!$this->session->userdata('id'))
		  {
		   $this->load->view('login');
		  }else{
	  	$this->form_validation->set_rules('judul_buku', 'judul_buku', 'required');
	  	$this->form_validation->set_rules('harga_buku', 'harga_buku', 'required|numeric');
	  	$this->form_validation->set_rules('informasi_buku', 'informasi_buku', 'required');
	  	if (empty($_FILES['userfile']['name']))
		{
		    $this->form_validation->set_rules('gambar_buku', 'gambar_buku', '');
		}
	  	$this->form_validation->set_rules('stok', 'stok', 'required|numeric');
	  	$this->form_validation->set_rules('kategori_buku', 'kategori_buku', 'required');
	  	$data['login_status'] = 1;
	  	$url = url_title($this->input->post('judul_buku'));
	  	$urlBuku = strtolower($url); 
	  	$data['checksellerID'] = $this->toko_model->getID($this->session->userdata('id'),1);
		$sellerID = $data['checksellerID']['id_penjual'];
	  	if($this->form_validation->run()) {
	  		$id = $this->session->userdata('id');
	        $upPath="img/";
	        // if(!file_exists($upPath)) 
	        // {
	        //            mkdir($upPath, 0777, true);
	        // }
	        $config = array(
	        'upload_path' => $upPath,
	        'allowed_types' => "jpg|png|jpeg",
	        'overwrite' => TRUE,
	        'max_size' => "20480000", 
	        'max_height' => "768",
	        'max_width' => "1024"
	        );
	        $this->load->library('upload', $config);
	        if(!$this->upload->do_upload('gambar_buku'))
	        { 
	            $data['imageError'] =  $this->upload->display_errors();
	            $image =  $data['imageError'];
	            $changer = 0;
	        }
	        else
	        {
	            $imageDetailArray = $this->upload->data();
	            $image =  $imageDetailArray['file_name'];
	            $changer = 1;
	        }
	        if ($changer == 1) {
	        $data = array(
			    'judul_buku'  => $this->input->post('judul_buku'),
			    'harga_buku'  => $this->input->post('harga_buku'),
			    'informasi_buku'  => $this->input->post('informasi_buku'),
			    'url_buku'  => $urlBuku,
			    'gambar_buku'  => $image,
			    'id_penjual'  => $sellerID,
			    'stok'  => $this->input->post('stok'),
			    'id_kategori'  => $this->input->post('kategori_buku')
			);
	    	}else{
	    	$data = array(
			    'judul_buku'  => $this->input->post('judul_buku'),
			    'harga_buku'  => $this->input->post('harga_buku'),
			    'informasi_buku'  => $this->input->post('informasi_buku'),
			    'url_buku'  => $urlBuku,
			    'id_penjual'  => $sellerID,
			    'stok'  => $this->input->post('stok'),
			    'id_kategori'  => $this->input->post('kategori_buku')
			);	
	    	}
	     		     	if ($this->uri->rsegment(3) != null && $this->uri->rsegment(4) != null) {
	     		$checkID = $this->toko_model->id_check($this->uri->rsegment(4),0);
	     	}else{
	     		$checkID = null;
	     	}
	     	if ($checkID) {
	     		$dataiditem = $this->toko_model->getID($this->uri->rsegment(3),0);
      			$id_penjual = $dataiditem['id_penjual'];
	     		if ($this->uri->rsegment(3) != null && $this->uri->rsegment(4) == $id_penjual) {
	     			$id = $this->toko_model->update($data,$this->uri->rsegment(3),0);
	     		}
	     		$pointer = $this->session->userdata('id');
		     	$msg = "Sukses Update Item";
	            $this->session->set_flashdata('test', $msg);
		     	redirect('toko/');
	     	}else{
	     		$id = $this->toko_model->insert($data,0);
	     		$msg = "Sukses Menambahkan Item";
	            $this->session->set_flashdata('test', $msg);
		     	redirect('toko/');
	     	}	     	
	 	}else{
	 		$msg = "Please fill out proper data";
	 		$pointer = $this->session->userdata('id');
            $this->session->set_flashdata('gagal', $msg);
	 		redirect('toko/');
	 	}
	 }
	 	
	}

	function delete() {
	  if(!$this->session->userdata('id')) {
	       redirect('login');
	      }else{
	       $data['login_status'] = 1;
	       $data['checksellerID'] = $this->toko_model->getID($this->session->userdata('id'),1);
		   $sellerID = $data['checksellerID']['id_penjual'];
		   $data['dataiditem'] = $this->toko_model->getID($this->uri->rsegment(3),0);
	       $id_penjual_buku = $data['dataiditem']['id_penjual'];
	       if ($sellerID == $id_penjual_buku) {
		       	$data['hapus'] = $this->toko_model->deleteItem($this->uri->rsegment(3));
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
	       }else{
	       			$data['success'] = 'error';
		            $msg = "Terjadi kesalahan";
		            $this->session->set_flashdata('gagal', $msg);
		            redirect($_SERVER['HTTP_REFERER']);
	       }
	       
	    }
	 }

	public function edititem()
	{
		if(!$this->session->userdata('id'))
		  {
		   $this->load->view('login');
		  }
		if (($this->uri->rsegment(3) != null) && ($this->uri->rsegment(4) != null)) {
			$data['dataiditem'] = $this->toko_model->getID($this->uri->rsegment(3),0);
	      	$id_penjual = $data['dataiditem']['id_penjual'];
	      	$data['login_status'] = 1;
			$data['data_user'] = 'aaa';
			$data['coba'] = $id_penjual;
			$data['url1'] =  $this->uri->rsegment(3);
			$data['url2'] =  $this->uri->rsegment(4);
			if ($this->uri->rsegment(4) != $id_penjual) {
				$msg = "Terjadi Kesalahan";
	            $this->session->set_flashdata('salah', $msg);
				redirect('toko/');
			}else{
			   	$data['login_status'] = 1;
			  	if (($this->toko_model->retrieveDataBook($this->uri->rsegment(3),1) != null)) {
		    		$data['data_user'] = $this->toko_model->retrieveDataBook($this->uri->rsegment(3),1);
		    		$data['kategori'] = $this->toko_model->getKategori();
			    }else{
			      	$data['data_user'] = 'aaa';      
			    }
			}
		}else{
			$data['login_status'] = 1;
			$data['data_user'] = null;
		}
		
		
		$this->load->view('header', $data);
		$this->load->view('edititem', $data);
		$this->load->view('footer', $data);
	}

	public function additem()
	{
		if(!$this->session->userdata('id'))
		{
		   	$this->load->view('login');
		}else{
		   	$data['login_status'] = 1;
		   	$data['kategori'] = $this->toko_model->getKategori();
		 }
		  
		$this->load->view('header', $data);
		$this->load->view('additem', $data);
		$this->load->view('footer', $data);
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
			redirect('toko/');
		}else{
		   	$data['login_status'] = 1;
		  	if ($data['data_user'] = $this->toko_model->retrieveDataSeller($this->uri->rsegment(3)) != null && $this->uri->rsegment(3) == $this->session->userdata('id')) {
	    		$data['data_user'] = $this->toko_model->retrieveDataSeller($this->uri->rsegment(3));
		    }else{
		      	$data['data_user'] = null;      
		    }
		  }
		
		$this->load->view('header', $data);
		$this->load->view('seller_edit', $data);
		$this->load->view('footer', $data);
	}
}