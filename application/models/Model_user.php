<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
 
  class Model_user extends CI_Model{

    function insert_user($nama,$username,$no_hp,$email,$password, $level) {

      $data_simpan = array ( 
       'nama'      => $nama,
       'username'  => $username,
       'no_tlp'    => $no_hp,
       'email'     => $email,
       'password'    => $password,
       'role_user'   => $level,
       'status_user' => 'aktif'  );

      $this->db->insert('tbl_user_aplikasi', $data_simpan);
   } // tutup fucntion                                    
// script berlanjut ke halaman berikutnya
 function cek_username($username) {
     $query=$this->db->query("SELECT * FROM tbl_user_aplikasi where username = '$username'");
     return $query;
 } // tutup fucntion
 
 function get_new_user(){
   // menampilkan hanya 10 user terbaru
   $query = $this->db->query("SELECT * FROM tbl_user_aplikasi ORDER BY id_user DESC limit 0, 10");
   return $query;

 } // tutup function

 function get_user_cari($kata_kunci){
  // menampilkan hanya 10 user terbaru
  $query = $this->db->query("SELECT * FROM tbl_user_aplikasi 
                             where username like '%$kata_kunci%' or nama like '%$kata_kunci%' 
                             ORDER BY id_user DESC limit 0, 10");
  return $query;

} // tutup function


function get_max_id($role_akses){
  $query = $this->db->query("SELECT count(*) id_maksimal FROM `tbl_user_aplikasi` WHERE role_user = '$role_akses'");
  return $query;
}

} // tutup model
