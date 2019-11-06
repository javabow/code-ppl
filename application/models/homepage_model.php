<?php
class homepage_model extends CI_Model
{

	function retrieveBuku(){
		$otherdb = $this->load->database('seller', TRUE);
		$query = $otherdb->get('book');

		if($query->result()){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->judul_buku,
					$content->gambar_buku,
					$content->url_buku,
					$content->harga_buku,
					$content->id_penjual
				);
			}
			return $data;
		}else{
			return FALSE;
		}
	}

}
?>