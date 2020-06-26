<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Grafik extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_grafik');
    }

     Public function index(){
        $data['data_pasien'] = $this->model_grafik->graph();
        $this->load->view('view_grafik_pasien',$data);
    } // tutup fucntion

    Public function lihat_grafik(){
        $data['data_rawatinap'] = $this->model_grafik->graph_rawatinap();
        $this->load->view('view_grafik_rawatinap',$data);
    } // tutup fucntion
} // tutup controller