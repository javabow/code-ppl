<?php
class cart_model extends CI_Model
{

	function id_check($key)
	{
	    $this->db->where('id_user',$key);
	    $query = $this->db->get('cart');
	    if ($query->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	}

	function insertCart($data)
	 {
	  $this->db->insert('cart', $data);
	  return $this->db->insert_id();
	 }

	function insertCartDetail($data)
	 {
	  $this->db->insert('cart_detail', $data);
	  return $this->db->insert_id();
	 }

	 function deleteCartDetail($data)
	 {
	  $this->db->where("cart_detail_id",$data);
	  $hapus = $this->db->delete("cart_detail");
	  if ($hapus) {
	  	return true;
	  }else{
	  	return false;
	  }
	  
	 }

	function getID($id){
		$query = $this->db->query("SELECT * from cart WHERE id_user=$id");
   		return $query->row_array();
	}

	 function update($data)
	 {
	  $this->db->update('detail_user', $data);
	  return true;
	 }

	 function updateQtyPlus($id,$price)
	 {
	  $this->db->where('cart_detail_id', $id);
	  $this->db->set('qty', 'qty+1', FALSE);
	  $this->db->set('total_harga', 'total_harga + ' . (int) $price, FALSE);
	  $this->db->update('cart_detail');
	  return true;
	 }

	 function countCartItem($id){
		return $this->db->get_where('cart_detail', array('cart_id' => $id))->num_rows();
	}

	function updateQtyMinus($id,$price)
	 {
	  $this->db->where('cart_detail_id', $id);
	  $this->db->set('qty', 'qty-1', FALSE);
	  $this->db->set('total_harga', 'total_harga - ' . (int) $price, FALSE);
	  $this->db->update('cart_detail');
	  return true;
	 }

	 function retrieveDataCart($id){
		$this->db->where('cart_id',$id);
		$this->db->order_by('id_penjual', 'ASC');
		$query = $this->db->get('cart_detail');

		if($query->result()){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->cart_id,
					$content->id_buku,
					$content->id_penjual,
					$content->qty,
					$content->total_harga,
					$content->cart_detail_id
				);
			}
			return $data;
		}else{
			return FALSE;
		}
	}

	function getDataBuku($id){
		$otherdb = $this->load->database('seller', TRUE);
		$otherdb->where('id_buku',$id);
		$query = $otherdb->get('book');

		if($query->result()){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->id_buku,
					$content->judul_buku,
					$content->harga_buku,
					$content->url_buku,
					$content->gambar_buku
				);
			}
			return $data;
		}else{
			return FALSE;
		}
	}

	function getDataSeller($data){
		$otherdb = $this->load->database('seller', TRUE);
		$data = $otherdb->query("	SELECT nama_toko, alamat_toko FROM `penjual` WHERE `id_penjual` IN (".implode(',',$data).")
								");
		return $data->result();
	}

	function getDataUser($id){
		$this->db->where('user_id',$id);
		$query = $this->db->get('detail_user');

		if($query->result()){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->alamat_user,
					$content->nomorhp_user,
					$content->kodepos_user
				);
			}
			return $data;
		}else{
			return FALSE;
		}
	}

}
?>