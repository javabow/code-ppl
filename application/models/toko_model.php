<?php
class toko_model extends CI_Model
{

	function insert($data,$changer)
	 {
	 	if ($changer == 1) {
	 		$otherdb = $this->load->database('seller', TRUE);
			$otherdb->insert('penjual', $data);
			return $otherdb->insert_id();
	 	}else{
	 		$otherdb = $this->load->database('seller', TRUE);
			$otherdb->insert('book', $data);
			return $otherdb->insert_id();
	 	}
		
	 }

	function update($data,$key,$changer)
	 {
	 	if ($changer == 1) {
	 		$otherdb = $this->load->database('seller', TRUE);
			$otherdb->where('user_id', $key);
			$test = $otherdb->update('penjual', $data);
			if ($test) {
				return true;
			}else{
			  	return false;
			}
	 	}else{
	 		$otherdb = $this->load->database('seller', TRUE);
			$otherdb->where('id_buku', $key);
			$test = $otherdb->update('book', $data);
			if ($test) {
				return true;
			}else{
			  	return false;
			}
	 	}
		
	}

	function deleteItem($id)
	 {
	  $otherdb = $this->load->database('seller', TRUE);
	  $hapus = $otherdb->query("DELETE from book WHERE id_buku='$id'");
	  if ($hapus) {
	  	return true;
	  }else{
	  	return false;
	  }
	  
	 }

	 function id_check($key,$changer)
	{
		if ($changer == 1) {
			$otherdb = $this->load->database('seller', TRUE);
		    $otherdb->where('user_id',$key);
		    $query = $otherdb->get('penjual');
		    if ($query->num_rows() > 0){
		        return true;
		    }
		    else{
		        return false;
		    }
		}else{
			$otherdb = $this->load->database('seller', TRUE);
		    $otherdb->where('id_penjual',$key);
		    $query = $otherdb->get('book');
		    if ($query->num_rows() > 0){
		        return true;
		    }
		    else{
		        return false;
		    }
		}
		
	}

	function getKategori(){
		$otherdb = $this->load->database('seller', TRUE);
		$query = $otherdb->get('kategori');

		if($query->result()){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->id_kategori,
					$content->nama_kategori
				);
			}
			return $data;
		}else{
			return FALSE;
		}
	}

	function getID($id,$changer){
		if ($changer == 1) {
			$otherdb = $this->load->database('seller', TRUE);
			$query = $otherdb->query("SELECT id_penjual from penjual WHERE user_id=$id");
	   		return $query->row_array();
		}else{
			$otherdb = $this->load->database('seller', TRUE);
			$query = $otherdb->query("SELECT id_penjual from book WHERE id_buku=$id");
	   		return $query->row_array();
		}
		
	}

	function retrieveDataSeller($id){
		$otherdb = $this->load->database('seller', TRUE);
		$otherdb->where('user_id',$id);
		$query = $otherdb->get('penjual');

		if($query->result()){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->id_penjual,
					$content->nama_toko,
					$content->alamat_toko,
					$content->user_id
				);
			}
			return $data;
		}else{
			return FALSE;
		}
	}

	function retrieveDataBook($id,$changer){
		$otherdb = $this->load->database('seller', TRUE);
		if ($changer == 1) {
			$otherdb->where('id_buku',$id);
		}else{
			$otherdb->where('id_penjual',$id);
		}
		$query = $otherdb->get('book');

		if($query->result()){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->id_buku,
					$content->judul_buku,
					$content->harga_buku,
					$content->informasi_buku,
					$content->url_buku,
					$content->gambar_buku,
					$content->id_penjual,
					$content->stok,
					$content->id_kategori
				);
			}
			return $data;
		}else{
			return FALSE;
		}
	}

}
?>