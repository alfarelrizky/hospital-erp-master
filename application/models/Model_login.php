<?php 
class Model_login extends CI_Model{	
    
function get_user($username, $password) {		
    $isiqry  = "SELECT * FROM tbl_user_aplikasi 
        WHERE username='$username' AND password='$password' LIMIT 1";
    $query =$this->db->query($isiqry);
    return $query;
    }
}
