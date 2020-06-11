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

    function insert_perawatan($id, $namadokter, $tanggalperiksa, $tindakan, $obat, $anamase, $diagnosis, $statuspasien)
    {
        $data = array(
            'id_perawatan' => null,
            'id_rawat_inap' => $id,
            'nama_dokter' => $namadokter,
            'tanggal_periksa' => $tanggalperiksa,
            'tindakan' => $tindakan,
            'obat' => $obat,
            'anamase' => $anamase,
            'diagnosis' => $diagnosis,
            'status_pasien' => $statuspasien
        );

        $this->db->insert("perawatan", $data);
        return $data;
    }


    // list perawan

    function select_rawat_inap()
    {

        $query = $this->db->query("select * from rawat_inap");
        return $query;
    }

    function select_perawatan(){
            $query = $this->db->query("SELECT * FROM `perawatan` inner join rawat_inap where rawat_inap.id_rawat_inap = perawatan.id_rawat_inap order by id_perawatan asc");
            return $query;
    }

    function select_where_perawatan($id)
    {
        $query = $this->db->query("SELECT * FROM `perawatan` inner join rawat_inap where rawat_inap.id_rawat_inap = perawatan.id_rawat_inap AND perawatan.id_perawatan = $id limit 1");
        return $query;
    }
    function update_perawatan($i,$id,$dokter, $tanggal,$tindakan,$obat,$anamase,$diagnosis,$status)
    {
        $query = $this->db->query("UPDATE `perawatan` SET `id_rawat_inap`='$id',`nama_dokter`='$dokter',`tanggal_periksa`='$tanggal',`tindakan`='$tindakan',`obat`='$obat',`anamase`='$anamase',`diagnosis`='$diagnosis',`status_pasien`='$status' WHERE id_perawatan = '$i'");
        return $query;
    }
    function delete_perawatan($id)
    {
        $query = $this->db->query("DELETE FROM `perawatan` WHERE id_perawatan = '$id'");
        return $query;
    }
}