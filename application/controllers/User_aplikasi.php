<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class User_aplikasi extends CI_Controller {
        
    function __construct() {
            parent::__construct();
            $this->load->model('model_user');
    }
    
    Public function index(){
      $data['data_user'] = $this->model_user->get_new_user()->result_array();
      $this->load->view('data_utama',$data);
    }

    public function tambah_user(){
      $this->load->view('form_registrasi_user');
    }

    public function proses_simpan() {
    $this->form_validation->set_rules('txt_nama', 'Nama', 'required|max_length[50]');
    $this->form_validation->set_rules('txt_username', 'Username ', 'required|max_length[10]');
    $this->form_validation->set_rules('txt_no_hp', 'Nomor HP', 'numeric|min_length[10]');
    $this->form_validation->set_rules('txt_email', 'Alamat Email', 'required|valid_email');
    $this->form_validation->set_rules('txt_password', 'Password', 'required|min_length[5]');
    $this->form_validation->set_rules('txt_konfirm_password', 'Konfirmasi Password', 'required|min_length[5]|matches[txt_password]');
    if($this->form_validation->run() == FALSE) {
        $status   = "INVALID";
        $message = validation_errors();
        echo $status.$message; // <- respon yang dikembalikan ke view (ajax)
     }
     else { 
        $nama     = trim($this->input->post('txt_nama')); 
        $username = trim($this->input->post('txt_username')); 
        $no_hp    = trim($this->input->post('txt_no_hp'));
        $email    = trim($this->input->post('txt_email'));
        $password = md5(trim($this->input->post('txt_password')));
        $level    = trim($this->input->post('opt_role_askes'));
  
                             //script dilanjut ke halaman berikutnya
            // pengecekan username ke database : 
            $cek_username = $this->model_user->cek_username($username);
  
            if($cek_username->num_rows() >= 1) {
               $status  = "INVALID";
               $message = "USERNAME TELAH TERDAFTAR"; 
              echo $status.$message; // <- respon yang dikembalikan ke view (ajax)
             } // tutup username sudah digunakan
  
            else {
              //insert ke database 
              $this->model_user->insert_user($nama,$username,$no_hp,$email,$password,$level);
              $status = "VALID";
              echo $status; // <- respon yang dikembalikan ke view (ajax)
            } // tutup else username OK
  
          } // tutup else validasi sukses
  
      } // tutup method function
      Public function data_user(){
        $data['data_user'] = $this->model_user->get_new_user()->result_array();
        $this->load->view('data_utama',$data);
    } // tutup function


    Public function search_user(){
      // Ambil data data yang dikirim via ajax post
      $kata_kunci = $this->input->post('keyword');
      // jalankan query
      $data['data_user'] = $this->model_user->get_user_cari($kata_kunci)->result_array();
     
      // membungkus hasil query model kedalam variabel $hasil
      $hasil = $this->load->view('list_datauser',$data);
  
      // variabel hasil dikonversi kedalam objek json sebagai respon ke Ajax
      echo json_encode($hasil); 
   } // tutup function

   Public function count_user(){
    // Ambil data data yang dikirim via ajax post
    $role_akses = $this->input->post('role');
    // jalankan query
    $maxID = $this->model_user->get_max_id($role_akses)->row_array();

    $max_id = $maxID['id_maksimal'] + 1;

    echo $max_id;
    
    
 } // 
  
 } 

 
