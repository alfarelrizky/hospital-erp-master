<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

    public function __construct() {
     parent::__construct();

     // pengecekan session user
     if($this->session->userdata('sess_login') == FALSE)redirect('Login/logout','refresh');
     if($this->session->userdata('sess_id')== "")redirect('Login/logout','refresh');
     if($this->session->userdata('sess_username')== "")redirect('Login/logout','refresh');
     if($this->session->userdata('sess_status_user')!= "aktif")redirect('Login/logout','refresh');
    } // tutup function construct

    public function index(){
        $data['sess_id']             = $this->session->userdata('sess_id');
        $data['sess_username']       = $this->session->userdata('sess_username');
        $data['sess_nama']           = $this->session->userdata('sess_nama');  
        $data['sess_status_user']    = $this->session->userdata('sess_status_user');
        $data['sess_role_akses']     = $this->session->userdata('sess_role_akses');

        $this->load->view('dashboard_menu', $data);
	} // tutup function index
          
} // tutup class controller 
