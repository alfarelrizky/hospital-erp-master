<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_rawatinap extends CI_Model
{
    public function get_perawatan($id){
        $query = $this->db->query("SELECT * FROM perawatan WHERE id_rawat_inap = $id");
        return $query;
    }


}