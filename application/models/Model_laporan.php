<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Model_laporan extends CI_Model{

  function get_all_pasien(){
    $query=$this->db->query("SELECT * FROM tbl_pasien order by id_pasien ASC");
    return $query;
  } // tutup function

  function get_all_dokter(){
    $query=$this->db->query("SELECT * FROM tbl_dokter order by id_dokter ASC");
    return $query;
  } // tutup function

  function get_all_rawatinap(){
    $query=$this->db->query("SELECT * FROM rawat_inap order by id_rawat_inap ASC");
    return $query;
  } // tutup function

  function get_all_perawatan(){
    $query=$this->db->query("SELECT * FROM perawatan order by id_perawatan ASC");
    return $query;
  } // tutup function

} // tutup model
