<?php

class Toram_model extends CI_Model{
	
	function count_Guide(){
		return $this->db->get('guide')->num_rows();
	}

	function getExpensesGuide($limit, $start) {
	    $this->db->order_by("id_artikel", "desc");
    	$qry= $this->db->get("guide", $limit, $start);
    	return $qry->result();
	}

	function count_Boss(){
		$id = 'boss';
		return $this->db->get_where('boss', array('type' => $id))->num_rows();
	}

	function getExpensesBoss($limit, $start) {
    	$id = 'boss';
    	$this->db->order_by("boss_id", "desc");
    	$qry= $this->db->get_where("boss", array('type' => $id), $limit, $start);
    	return $qry->result();
	}

	function count_MiniBoss(){
		$id = 'mini-boss';
		return $this->db->get_where('boss', array('type' => $id))->num_rows();
	}

	function count_Komentar($id){
		return $this->db->get_where('komentar', array('url' => $id))->num_rows();
	}

	function getExpensesMiniBoss($limit, $start) {
    	$id = 'mini-boss';
    	$this->db->order_by("boss_id", "desc");
    	$qry= $this->db->get_where("boss", array('type' => $id), $limit, $start);
    	return $qry->result();
	}

	function cari()
	{
		$cari = $_GET['cari'];
		$data = $this->db->query("	SELECT judul, image, url, type from guide where judul like '%$cari%'
									UNION
									SELECT name, boss_picture, name_id, type from boss where name like '%$cari%'
								");
		return $data->result();
	}
	
	function toramHome()
	{
		$data = $this->db->query("	SELECT  id_artikel, judul, image, url, type 
									FROM    (   SELECT  id_artikel, judul, image, url, type 
									            FROM    guide 
									            ORDER BY id_artikel desc
									            LIMIT 4
									        ) as t
									UNION
									SELECT  boss_id, name, boss_picture, name_id, type
									FROM    (   SELECT  boss_id, name, boss_picture, name_id, type 
									            FROM    boss 
									            ORDER BY boss_id desc
									            LIMIT 4
									        ) as t
								");
		return $data->result();
	}
	
	function getID($id){
		$query = $this->db->query("SELECT id_artikel FROM guide WHERE url='$id'");
        return $query->row()->id_artikel;
	}

	function getLatest($id, $limit){
		if ($id+1 != $limit+1) {
			$awal = $id+1;	
		}else{
			$awal = null;
		}
		
		if ($id-1 != 0) {
			$akhir = $id-1;
		}else{
			$akhir = null;
		}
		$query = $this->db->query (" SELECT judul, image, url
									FROM guide
									WHERE id_artikel = '$awal' 
									UNION
									SELECT judul, image, url
									FROM guide
									WHERE id_artikel = '$akhir'
									");
		return $query->result();
	}

	function retrieveGuide(){
		$query = $this->db->get('guide');

		if($query->result()){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->judul,
					$content->image,
					$content->url
				);
			}
			return $data;
		}else{
			return FALSE;
		}
	}

	function retrieveBoss(){
		$this->db->where('type', 'boss');
		$query = $this->db->get('boss');

		if($query->result()){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->name,
					$content->boss_picture,
					$content->name_id
				);
			}
			return $data;
		}else{
			return FALSE;
		}
	}

	function retrieveMiniBoss(){
		$this->db->where('type', 'mini-boss');
		$query = $this->db->get('boss');

		if($query->result()){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->name,
					$content->boss_picture,
					$content->name_id
				);
			}
			return $data;
		}else{
			return FALSE;
		}
	}

	function getGuide($id){
		$this->db->where('url',$id);
		$query = $this->db->get('guide');

		if($query->result()){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->id_artikel,
					$content->date,
					$content->judul,
					$content->isi,
					$content->image,
					$content->url
				);
			}
			return $data;
		}else{
			return FALSE;
		}
	}

	function getBoss($id){
		$this->db->where('name_id',$id);
		$query = $this->db->get('boss');

		if($query->result()){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->boss_id,
					$content->date_boss,
					$content->name,
					$content->location,
					$content->name_id,
					$content->element,
					$content->hp_boss,
					$content->break_boss,
					$content->weakness,
					$content->base_exp,
					$content->boss_picture,
					$content->math_drop,
					$content->eq_drop,
					$content->cr_drop,
					$content->bahasan
				);
			}
			return $data;
		}else{
			return FALSE;
		}
	}

	function getMiniBoss($id){
		$this->db->where('name_id',$id);
		$query = $this->db->get('boss');

		if($query->result()){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->boss_id,
					$content->date_boss,
					$content->name,
					$content->location,
					$content->name_id,
					$content->element,
					$content->weakness,
					$content->base_exp,
					$content->boss_picture,
					$content->math_drop,
					$content->eq_drop,
					$content->cr_drop,
					$content->bahasan
				);
			}
			return $data;
		}else{
			return FALSE;
		}
	}

	function getKomentar($id){
		$this->db->where('url',$id);
		$query = $this->db->get('komentar');

		if($query->result()){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->nama,
					$content->komentar,
					$content->tanggal
				);
			}
			return $data;
		}else{
			return FALSE;
		}
	}

	function add($arg){
		$data = array(
			'nama' => $arg[0],
			'komentar'=> $arg[1],
			'tanggal'=> $arg[2],
			'url'=> $arg[3]
		);
		$this->db->insert('komentar',$data);
	}
}


?>