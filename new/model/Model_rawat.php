<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_rawat extends CI_Model
{
    //hitung jumlah row 
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

    function insert_rawat_inap($id,$dok,$stat){
        $data_dokter = array(
            'id_rawat_inap' => null,
            'id_rekam_medis' => $id,
            'dokter_penanggungjawab' => $dok,
            'kelas_rawat_inap' => $stat
        );

        $this->db->insert("rawat_inap", $data_dokter);
    }


    function select_rawat_inap(){
            $query = $this->db->query("SELECT * FROM rawat_inap order by dokter_penanggungjawab asc");
            return $query;
    }

    function select_where_rawat_inap($id)
    {
        $query = $this->db->query("SELECT * FROM rawat_inap where id_rawat_inap = '$id' order by dokter_penanggungjawab asc limit 1");
        return $query;
    }
    function update_rawat_inap($id, $txtid, $dokter, $kelas)
    {
        $query = $this->db->query("UPDATE `rawat_inap` SET `id_rekam_medis`='$txtid',`dokter_penanggungjawab`='$dokter',`kelas_rawat_inap`='$kelas' WHERE id_rawat_inap = '$id'");
        return $query;
    }
    function delete_rawat_inap($id)
    {
        $query = $this->db->query("DELETE FROM `rawat_inap` WHERE id_rawat_inap = '$id'");
        return $query;
    }
}