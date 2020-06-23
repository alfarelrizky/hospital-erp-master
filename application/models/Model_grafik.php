<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_grafik extends CI_Model{
 function graph() {
    $data = $this->db->query("
    SELECT CASE
    WHEN umur <= 20 THEN '0 - 20'
    WHEN umur BETWEEN 21 and 24 THEN '20 - 24'
    WHEN umur BETWEEN 25 and 30 THEN '25 - 30'
    WHEN umur >= 30 THEN 'diatas 30'
    WHEN umur IS NULL THEN '(NULL)'
    END as range_umur,
    COUNT(*) AS jumlah
    FROM (select id_pasien, nama_pasien, tgl_lahir,
    TIMESTAMPDIFF(YEAR, (STR_TO_DATE(tgl_lahir, '%d-%m-%Y')), CURDATE()) AS umur
    from tbl_pasien) as dummy_table
    GROUP BY range_umur
    ORDER BY range_umur");
    return $data->result();
 } // tutup function


   function qry_jk_pasien() {
      $data = $this->db->query("SELECT jenis_kelamin, COUNT(*) as 'jumlahnya' FROM tbl_pasien GROUP BY jenis_kelamin");
      return $data->result();
   }
    
   public function graph_rawatinap(){
      $data = $this->db->query("SELECT COUNT(id_rawat_inap) as jumlah, kelas_rawat_inap FROM `rawat_inap` GROUP BY kelas_rawat_inap");
      return $data->result();
   }
} // tutup model