<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_rawatinap extends CI_Model
{
    // get data from table rawat inap
    function get_data_rawatinap(){
        $query = $this->db->query("SELECT * FROM rawat_inap");
        return $query;
    }

    //hitung jumlah row 
  	function get_jumlah_data($kriteria,$kata_kunci){
   
        $query = $this->db->query("select * from rawat_inap where $kriteria like '%$kata_kunci%'");
        // $query = $this->db->query("SELECT dr.*, spc.bidang_spesialis from tbl_dokter dr
        //                            inner join 
        //                            tbl_spesialis spc on dr.spesialis = spc.spesialis
        //                            where $kriteria like '%$kata_kunci%'");
  
        return $query->num_rows();
     }

    function get_data($dari, $sampai, $kriteria, $kata_kunci){
 
        $query = $this->db->query("select * from rawat_inap 
                                   where $kriteria like '%$kata_kunci%' order by id_rawat_inap DESC 
                                   LIMIT $dari, $sampai ");

        // $query = $this->db->query("SELECT dr.*, spc.bidang_spesialis, spc.spesialis 
        // from tbl_dokter dr inner join tbl_spesialis spc 
        // on dr.spesialis = spc.spesialis
        // where $kriteria like '%$kata_kunci%'
        // LIMIT $dari, $sampai ");

        return $query->result_array();
        echo $this->db->last_query(); 
    }


    // batas kerjaannya aushafy, di bawah adalah kerjaannya farel


    //hitung jumlah row 
    // rawat inap
    function select_tbl_dokter()
    {

        $query = $this->db->query("select * from tbl_dokter order by nama_dokter asc");
        return $query;
    }

    function select_where_tbl_dokter($value)
    {
        $this->db->like('id_dokter', $value, 'BOTH');
        return $this->db->get('tbl_dokter')->result();
    }

    function insert_rawat_inap($id,$dokter,$kelas){
        $data_rawatinap = array(
            'id_rawat_inap' => null,
            'id_rekam_medis' => $id,
            'dokter_penanggungjawab' => $dokter,
            'kelas_rawat_inap' => $kelas
        );

        $this->db->insert("rawat_inap", $data_rawatinap);
        return $data_rawatinap;
    }
}