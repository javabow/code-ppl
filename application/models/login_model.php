<?php
class Login_model extends CI_Model
{
 function can_login($email, $password)
 {
  $this->db->where('email', $email);
  $query = $this->db->get('codeigniter_register');
  if($query->num_rows() > 0)
  {
   foreach($query->result() as $row)
   {
    if($row->is_email_verified == 'yes' || 'no')
    {
     $store_password = $this->encrypt->decode($row->password);
     if($password == $store_password)
     {
      $sukses = 'berhasil';
      $this->session->set_userdata('id', $row->id);
      return $sukses;
     }
     else
     {
      return 'Wrong Password';
     }
    }
    else
    {
     return 'First verified your email address';
    }
   }
  }
  else
  {
   return 'Wrong Email Address';
  }
 }

 function get_user_data($email){
  $user = $this->db
        ->select("id, name, email")
        ->where(
             [
                'email' => $email
             ]
         )
        ->get("codeigniter_register")
        ->row();

   if ($user) {
         $logindata = [
             'id' => $user->id,
             'name'  => $user->name,
             'email' => $user->email
         ];
         $this->session
              ->set_userdata($logindata);
         return true;
   }
   else {
         return false;
   }
 }
}

?>