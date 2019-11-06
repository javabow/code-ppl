<?php
class buku_model extends CI_Model
{

	function getDataBuku($id){
		$otherdb = $this->load->database('seller', TRUE);
		$otherdb->where('url_buku',$id);
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

	function cari()
	{
		$cari = $_GET['cari'];
		$otherdb = $this->load->database('seller', TRUE);
		$data = $otherdb->query("	SELECT judul_buku, harga_buku, id_buku, url_buku, gambar_buku from book where judul_buku like '%$cari%'
								");
		return $data->result();
	}

	function getNamaKategori($id)
	{
		$otherdb = $this->load->database('seller', TRUE);
		$data = $otherdb->query("	SELECT nama_kategori from kategori where id_kategori=$id
								");
		return $data->result();
	}

}
?>