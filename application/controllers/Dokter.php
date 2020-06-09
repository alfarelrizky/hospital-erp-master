<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
  class Dokter extends CI_Controller {
 
    function __construct() {
            parent::__construct();
            $this->load->model('model_dokter');
            // pengecekan session apakah user yang login merupkan dokter atau bukan
            if($this->session->userdata('sess_login') == FALSE)redirect('Login/logout','refresh');
            if($this->session->userdata('sess_id')== "")redirect('Login/logout','refresh');
            if($this->session->userdata('sess_username')== "")redirect('Login/logout','refresh'); 
            if($this->session->userdata('sess_role_akses') == 3 OR $this->session->userdata('sess_role_akses') == 4 )redirect('Login/logout','refresh');  
    }

    Public function index(){
        redirect('dokter/data_dokter');
    }

    // FUNCTION TAMBAHAN
    Public function tanggal_indo($tanggal) {
        $tanggal = trim($tanggal);
        if (($tanggal) != "" and strlen($tanggal) == "10") {
            $str = explode('-', $tanggal);
            $tanggal = $str[2] . "-" . $str[1] . "-" . $str[0];
            return $tanggal;
        }
    }

    Public function data_dokter() {
            
        //mengambil baris_data awal yang akan diambi, angkanya terdapat pada URI SEGMENT 3  
        $dari   = $this->uri->segment(3);

        //secara default, awal baris data adalah kosong (null), agar tidak NULL, diubah jadi 0
        if (empty($dari)) { $dari = 0; } else { $dari = $dari; }

        //baris data pada halaman yang akan ditampilkan
        $sampai = 3;
       
        //default kriteria dan katakunci
        $kriteria     = 'nama_dokter';
        $kata_kunci   = '';
            
        //hitung jumlah row
        $jumlah= $this->model_dokter->get_jumlah_data($kriteria, $kata_kunci);

   
        //INISIALISASI FUNGSI PAGINATION
        $config = array();

        //set base_url untuk setiap link page
        $config['base_url'] = base_url()."dokter/data_dokter"; // <= sesuai nama controller dan fuction

        //jumlah total data hasil query
        $config['total_rows'] = $jumlah;

        //mengatur total data yang akan tampil per page
        $config['per_page'] = $sampai;

        //mengatur kolom nomor halaman yang tampil (1 Default, untuk menampilkan 2-3 halaman)
        $config['num_links'] = 1;

        //mengatur tag kolom halaman
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = "<li>";    // LANJUT DI HALAMAN BERIKUTNYA
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        // untuk caption next / previous , dapat diubah
        $config['next_link'] = ' selanjutnya ';
        $config['prev_link'] = ' sebelumnya ';

       //inisialisasi 'config' dan set ke library pagination
       $this->pagination->initialize($config);
          
       //inisialisasi untuk menampilkan data
       $data = array();

       //ambil data dari database
       $data['data_dokter'] = $this->model_dokter->get_data($dari,$sampai,$kriteria,$kata_kunci);

       //Membuat link pagination
       $str_links = $this->pagination->create_links();
       $data["links"] = explode('&nbsp;',$str_links );
       $data['title'] = 'APSS DATA DOKTER Ver-1.0';
        
       //memanggil view untuk ditampilkan ke layar browser
       $this->load->view('view_datadokter',$data);
     }

     Public function registrasi_dokter() {
        //Membuat ID Dokter random
        $kode_rs = 123; // kode RS jadi ini bisa buat jadi standarisasi 3 digit awal untuk id dokter
        $nip = $kode_rs.rand(1000,9999);
        $data['id_dokter'] = $nip;

        // load list spesialis dari db
        $data['spesialis'] = $this->model_dokter->get_spesialis()->result();       

        //melempar id_dokter ke view buat automation untuk pengisian id dokter
        $this->load->view('view_form_registrasi_dokter', $data);
    }

    public function proses_registrasi(){
        $this->form_validation->set_rules('txt_nama', 'Nama', 'required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('txt_jeniskelamin', 'Jenis Kelamin ', 'required');
        $this->form_validation->set_rules('txt_alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('txt_tlp', 'Nomor HP', 'required|numeric|min_length[10]|max_length[14]');
        $this->form_validation->set_rules('txt_id_dokter', 'ID Dokter', 'required');
        $this->form_validation->set_rules('txt_email', 'Email', 'valid_email');
        $this->form_validation->set_rules('txt_spesialis', 'Spesialis', 'required');
        $this->form_validation->set_rules('txt_join_date', 'Join Date', 'required');
        $this->form_validation->set_rules('txt_status', 'Status', 'required');
        $this->form_validation->set_rules('txt_no_ijin', 'No. Ijin', 'required|min_length[5]|max_length[20]');
        
        if($this->form_validation->run() == FALSE) {
            $this->load->view('view_form_registrasi_dokter');
        }
        else { //dilanjutkan ke proses berikutnya jika form validation bernilai TURE
        // menangkap data yang dikirim oleh POST function dari sebuah form
        $nama            = (trim(html_escape($this->input->post('txt_nama'))));
        $jeniskelamin    = (trim(html_escape($this->input->post('txt_jeniskelamin'))));
        $alamat          = (trim(html_escape($this->input->post('txt_alamat'))));
        $no_tlp          = (trim(html_escape($this->input->post('txt_tlp'))));
        $id_dokter       = (trim(html_escape($this->input->post('txt_id_dokter'))));
        $email           = (trim(html_escape($this->input->post('txt_email'))));
        $spesialis       = (trim(html_escape($this->input->post('txt_spesialis'))));
        $join_date       = (trim(html_escape($this->input->post('txt_join_date'))));
        $status          = (trim(html_escape($this->input->post('txt_status'))));
        $no_ijin         = (trim(html_escape($this->input->post('txt_no_ijin'))));

        //memanggil model dan mengirim variabel ke model
        $this->model_dokter->insert_dokter(
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
        );

        //mengarahkan kembali ke halaman utama data dokter
        redirect('dokter/data_dokter');
  
     }
    }

    public function edit_dokter(){
        //mengambil data dari URL 
        $id_dokter   = $this->uri->segment(3);
          
        //mengambil data dari database
        $query_data = $this->model_dokter->get_detail_pasien($id_dokter)->row_array();

        //memeceh hasil query kedalam variabel 
        
        //variabel_yang dilempar ke view    //NAMA FIELD PADA DATABASE
        $data['dt_id_dokter']        = $query_data['id_dokter'];
        $data['dt_nama_dokter']      = $query_data['nama_dokter'];
        $data['dt_jenis_kelamin']    = $query_data['jenis_kelamin'];
        $data['dt_alamat']           = $query_data['alamat'];
        $data['dt_no_tlp']           = $query_data['no_tlp'];
        $data['dt_email']            = $query_data['email'];
        $data['dt_spesialis']        = $query_data['spesialis'];
        $data['dt_bidangspesialis']  = $query_data['bidang_spesialis'];
        $data['dt_join_date']        = $query_data['join_date'];
        $data['dt_status']           = $query_data['status'];
        $data['dt_nomor_izin']       = $query_data['nomor_izin'];

        // load list utk dropdown dari db
        $data['spesialis'] = $this->model_dokter->get_spesialis()->result();  

        //memanggil form_edit dan melempar data hasil query
        $this->load->view('view_form_edit_dokter', $data);
    }

    public function proses_edit_dokter(){
        //mengambil data dari URL 
        $id_dokter   = $this->uri->segment(3); // ambil nilai id dokter yang diparsing di URI

        $this->form_validation->set_rules('txt_nama', 'Nama', 'required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('txt_jeniskelamin', 'Jenis Kelamin ', 'required');
        $this->form_validation->set_rules('txt_alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('txt_tlp', 'Nomor HP', 'required|numeric|min_length[10]|max_length[14]');
        //$this->form_validation->set_rules('txt_id_dokter', 'ID Dokter', 'required');
        $this->form_validation->set_rules('txt_email', 'Email', 'valid_email');
        $this->form_validation->set_rules('txt_spesialis', 'Spesialis', 'required');
        $this->form_validation->set_rules('txt_join_date', 'Join Date', 'required');
        $this->form_validation->set_rules('txt_status', 'Status', 'required');
        $this->form_validation->set_rules('txt_no_ijin', 'No. Ijin', 'required|min_length[5]|max_length[20]');
        
        if($this->form_validation->run() == FALSE) {
            $this->load->view('view_form_edit_dokter');
        }
        else { //dilanjutkan ke proses berikutnya jika form validation bernilai TURE
        // menangkap data yang dikirim oleh POST function dari sebuah form
        $nama            = (trim(html_escape($this->input->post('txt_nama'))));
        $jeniskelamin    = (trim(html_escape($this->input->post('txt_jeniskelamin'))));
        $alamat          = (trim(html_escape($this->input->post('txt_alamat'))));
        $no_tlp          = (trim(html_escape($this->input->post('txt_tlp'))));
        $email           = (trim(html_escape($this->input->post('txt_email'))));
        $spesialis       = (trim(html_escape($this->input->post('txt_spesialis'))));
        $join_date       = (trim(html_escape($this->input->post('txt_join_date'))));
        $status          = (trim(html_escape($this->input->post('txt_status'))));
        $no_ijin         = (trim(html_escape($this->input->post('txt_no_ijin'))));
        // before
        // $nama         = (trim(html_escape($this->input->post('txt_nama'))));
        // $jeniskelamin = (trim(html_escape($this->input->post('txt_jeniskelamin'))));
        // $alamat       = (trim(html_escape($this->input->post('txt_alamat'))));
        // $no_tlp       = (trim(html_escape($this->input->post('txt_tlp'))));
        // $email        = (trim(html_escape($this->input->post('txt_email'))));

        //memanggil model dan mengirim variabel ke model
        $this->model_dokter->query_update_data_dokter(
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
        );

        //mengarahkan kembali ke halaman utama data dokter
        redirect('dokter/data_dokter');
    }
}

    Public function cari(){
 
        //mengambil kriteria dan kata kucni dari form pencarian
        $kriteria   = (trim(html_escape($this->input->post('txt_kriteria'))));
        $kata_kunci = (trim(html_escape($this->input->post('txt_katakunci'))));

        //memuat kriteria pencarian ke URI segment 3
        $kriteria   = ($this->uri->segment(3)) ? $this->uri->segment(3) : $kriteria;

        //memuat kata kunci pencarian ke URI segment 4
        $kata_kunci   = ($this->uri->segment(4)) ? $this->uri->segment(4) : $kata_kunci;

        // Karena segment 3 dan 4 sudah digunakan untuk menampung keywords, 
        // URI segment yang diambil untuk batas awal data diubah ke URI Segemen-5
        $dari     = $this->uri->segment('5');

        if (empty($dari)) {$dari = 0; } else {$dari = $dari; }

        if ($kriteria == '') {$kriteria = 'nama_dokter'; } else {$kriteria = $kriteria; }
 
        //baris data pada halaman yang akan ditampilkan
        $sampai = 5;
 
        //hitung jumlah row data
        $jumlah= $this->model_dokter->get_jumlah_data($kriteria, $kata_kunci);
 
        //inisialisasi fungsi pagination
        $config = array();
 
        //set base_url untuk setiap link page
        // PENAMBAHAN $kriteria ke URI segment 3 dan $kata_kunci ke URI segment 4
        $config['base_url'] = base_url()."dokter/cari/".$kriteria."/".$kata_kunci;
 
        //hitung jumlah row
        $config['total_rows'] = $jumlah;
 
        //mengatur total data yang tampil per page
        $config['per_page'] = $sampai;
 
         //mengatur kolom nomor halaman yang tampil (1 Default, untuk menampilkan 2-3 halaman)
         $config['num_links'] = 1;
 
        //mengatur tag
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = ' Next ';
        $config['prev_link'] = ' Previous ';

        //inisialisasi array 'config' dan set ke pagination library
        $this->pagination->initialize($config);
           
        //inisialisasi untuk menampilkan data
        $data = array();
 
        //ambil data dari database
        $data['data_dokter'] = $this->model_dokter->get_data($dari, $sampai, $kriteria, $kata_kunci);

 
        //Membuat link
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
        $data['title'] = 'APSS DATA DOKTER Ver-1.0';

        $this->load->view('view_pencariandokter', $data);

      } 
  }