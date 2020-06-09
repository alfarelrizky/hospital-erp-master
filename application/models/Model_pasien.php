<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pasien extends CI_Model
{

  //ambil data
  function get_data($dari, $sampai, $kriteria, $kata_kunci)
  {

    $query = $this->db->query("select * from tbl_pasien 
  			                       where $kriteria like '%$kata_kunci%' order by id_pasien DESC 
  			                       LIMIT $dari, $sampai ");
    return $query->result_array();
    echo $this->db->last_query();
  }

  //hitung jumlah row 
  function get_jumlah_data($kriteria, $kata_kunci)
  {

    $query = $this->db->query("select * from tbl_pasien where $kriteria like '%$kata_kunci%'");
    return $query->num_rows();
  }

  function insert_pasien($nama, $jeniskelamin, $tgl_lahir, $alamat, $no_tlp, $no_rm)
  {

    $data_simpan = array(

      'nama_pasien' => $nama,
      'tgl_lahir' => $tgl_lahir,
      'jenis_kelamin' => $jeniskelamin,
      'alamat' => $alamat,
      'no_tlp' => $no_tlp,
      'no_rekam_medis' => $no_rm
    );

    $this->db->insert('tbl_pasien', $data_simpan);
  }


  function get_detail_pasien($id_pasien)
  {
    $query = $this->db->query("SELECT * FROM tbl_pasien where id_pasien = '$id_pasien'");
    return $query;
  }

  function qry_update_data_pasien($nama, $jeniskelamin, $tgl_lahir, $alamat, $no_tlp, $id_pasien)
  {

    $query = $this->db->query("UPDATE tbl_pasien set nama_pasien = '$nama', 
                                                     tgl_lahir = '$tgl_lahir', 
                                                     jenis_kelamin = '$jeniskelamin', 
                                                     alamat = '$alamat',
                                                     no_tlp = '$no_tlp'
                             where id_pasien = '$id_pasien'");
    return $query;
  }
}
