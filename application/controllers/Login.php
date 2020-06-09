<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct() {
      parent::__construct();
      $this->load->model('model_login');  // me-load model yang telah dibuat
  }

  public function index() {
      $this->load->view('form_login');
  } // tutup function index


  public function authentikasi_user() {
     $username= (trim(html_escape($this->input->post('txt_username'))));
     $password= (trim(md5(html_escape($this->input->post('txt_password')))));

     //memangil query utk cek ke database
     $verifikasi_login = $this->model_login->get_user($username,$password);
	
      if($verifikasi_login->num_rows() == 0) {  // verifikasi TIDAK berhasil 
        $this->session->set_flashdata('message','Username dan password salah !');
            $this->load->view('form_login');
      } // tutup verifikasi tidak berhasil

      else if($verifikasi_login->num_rows() > 0) { // verifikasi Berhasil  
        //mengambil data pada database, dibungkus dengan row_array()
        $dtuser = $verifikasi_login->row_array();
        //memastikan user aktif 
        if ($dtuser['status_user'] == 'aktif') {

           // membuat session
            $session_data = array(

            //nama session          //nama field pada database
            'sess_login'       => TRUE,
            'sess_id'          => $dtuser['id_user'],
            'sess_username'    => $dtuser['username'],
            'sess_nama'        => $dtuser['nama'],
            'sess_status_user' => $dtuser['status_user'],
            'sess_role_akses'  => $dtuser['role_user']       
        );
        
         //mendaftarkan session, dan mengarahkan ke halaman utama
         $this->session->set_userdata($session_data);
         redirect(base_url("homepage"));

        } // tutup jika user aktif
      
        else if ($dtuser['status_user'] != 'aktif') {
        // jika user tidak aktif, dibuat flashdata untuk menampilkan message akses invalid
            $this->session->set_flashdata('message','Akses Invalid !');
                $this->load->view('form_login');
        } // tutup jika user tidak aktif
      } // tutup IF verifikasi user match 	
  
    } // tutup function authentikasi_user
  
    public function logout(){
    
        //menggunakan metode unset dan array
        $sesi = array('sess_login',  
                    'sess_id',          
                    'sess_username',    
                    'sess_nama',        
                    'sess_status_user', 
                    'sess_role_akses'  );
  
        $this->session->unset_userdata($sesi);
  
        //menggunakan  desttory all session
        $this->session->sess_destroy();
  
        //mengarahkan ke halaman login
        redirect('login');
      
     } // tutup function logout
    
  } // tutup class controller
  