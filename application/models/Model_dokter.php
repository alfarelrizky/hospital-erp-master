<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Model_dokter extends CI_Model{
    //ambil data
  	function get_data($dari, $sampai, $kriteria, $kata_kunci){
 
        // $query = $this->db->query("select * from tbl_dokter 
        //                            where $kriteria like '%$kata_kunci%' order by id_dokter DESC 
        //                            LIMIT $dari, $sampai ");

        $query = $this->db->query("SELECT dr.*, spc.bidang_spesialis, spc.spesialis 
        from tbl_dokter dr inner join tbl_spesialis spc 
        on dr.spesialis = spc.spesialis
        where $kriteria like '%$kata_kunci%'
        LIMIT $dari, $sampai ");

      return $query->result_array();
        echo $this->db->last_query(); 
    }

    function get_spesialis(){
      $query = $this->db->query(
        "SELECT * FROM tbl_spesialis"
      );

      return $query;

    }
    //hitung jumlah row 
  	function get_jumlah_data($kriteria,$kata_kunci){
   
      // $query = $this->db->query("select * from tbl_dokter where $kriteria like '%$kata_kunci%'");
      $query = $this->db->query("SELECT dr.*, spc.bidang_spesialis from tbl_dokter dr
                                 inner join 
                                 tbl_spesialis spc on dr.spesialis = spc.spesialis
                                 where $kriteria like '%$kata_kunci%'");

    	return $query->num_rows();
      }
      
    // insert dari registrasi dokter
    function insert_dokter(
      $nama, 
      $jeniskelamin, 
      $alamat, 
      $no_tlp, 
      $id_dokter, 
      $email, 
      $spesialis,
      $join_date,
      $status,
      $no_ijin
      ){
        $data_dokter = array (
            'id_dokter' => $id_dokter,
            'nama_dokter' => $nama,
            'jenis_kelamin' => $jeniskelamin,
            'alamat' => $alamat,
            'no_tlp' => $no_tlp,
            'email' => $email,
            'spesialis' => $spesialis,
            'join_date' => $join_date,
            'status' => $status,
            'nomor_izin' => $no_ijin,
        );

       $this->db->insert("tbl_dokter", $data_dokter);
    }

    function get_detail_pasien($id_dokter){
        //$query=$this->db->query("SELECT * FROM tbl_dokter where id_dokter = '$id_dokter'");
        $query=$this->db->query("SELECT dr.*, spc.bidang_spesialis, spc.spesialis 
        from tbl_dokter dr inner join tbl_spesialis spc 
         on dr.spesialis = spc.spesialis
         where dr.id_dokter = '$id_dokter'");

        return $query;
    }

    function query_update_data_dokter(
    $nama, 
    $jeniskelamin, 
    $alamat, 
    $no_tlp, 
    $id_dokter, 
    $email, 
    $spesialis,
    $join_date,
    $status,
    $no_ijin) {

        $query=$this->db->query("UPDATE tbl_dokter set nama_dokter    = '$nama',
                                                       jenis_kelamin  = '$jeniskelamin', 
                                                       alamat         = '$alamat',
                                                       no_tlp         = '$no_tlp',
                                                       email          = '$email',
                                                       spesialis      = '$spesialis',
                                                       join_date      = '$join_date',
                                                       `status`       = '$status',
                                                       nomor_izin     = '$no_ijin'
                                                       where id_dokter = '$id_dokter'
                                                       ");
        return $query;
      }
}