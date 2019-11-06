<?php
class profile_model extends CI_Model
{

	function insert($data)
	 {
	  $this->db->insert('detail_user', $data);
	  return $this->db->insert_id();
	 }

	 function update($data,$key)
	 {
	  $this->db->where('user_id', $key);
	  $test = $this->db->update('detail_user', $data);
	  if ($test) {
	  	return true;
	  }else{
	  	return false;
	  }
	 }

	 function id_check($key)
	{
	    $this->db->where('user_id',$key);
	    $query = $this->db->get('detail_user');
	    if ($query->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	}

	function retrieveDataUser($id){
		$this->db->where('user_id',$id);
		$query = $this->db->get('detail_user');

		if($query->result()){
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->alamat_user,
					$content->kodepos_user,
					$content->nomorhp_user,
					$content->jk_user,
					$content->user_tl
				);
			}
			return $data;
		}else{
			return FALSE;
		}
	}

}
?>