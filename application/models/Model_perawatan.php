<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_perawatan extends CI_Model
{
    public function select_perawatan($id){
        $query = $this->db->query("SELECT * FROM perawatan inner join rawat_inap WHERE rawat_inap.id_rawat_inap = perawatan.id_rawat_inap and perawatan.id_rawat_inap = '$id' order by perawatan.tanggal_periksa asc");
        return $query;
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
    function select_where_perawatan($id)
    {
        $query = $this->db->query("SELECT * FROM `perawatan` inner join rawat_inap where rawat_inap.id_rawat_inap = perawatan.id_rawat_inap AND perawatan.id_perawatan = $id limit 1");
        return $query;
    }
    function update_perawatan($i, $id, $dokter, $tanggal, $tindakan, $obat, $anamase, $diagnosis, $status)
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