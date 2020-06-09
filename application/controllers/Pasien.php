<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_pasien');
        // pengecekan session apakah user yang login merupkan dokter atau bukan
        if ($this->session->userdata('sess_login') == FALSE) redirect('Login/logout', 'refresh');
        if ($this->session->userdata('sess_id') == "") redirect('Login/logout', 'refresh');
        if ($this->session->userdata('sess_username') == "") redirect('Login/logout', 'refresh');
        if ($this->session->userdata('sess_role_akses') == 3 or $this->session->userdata('sess_role_akses') == 1) redirect('Login/logout', 'refresh');
    }

    public function index()
    {
        redirect('pasien/data_pasien');
    }


    // FUNCTION TAMBAHAN
    public function tanggal_indo($tanggal)
    {
        $tanggal = trim($tanggal);
        if (($tanggal) != "" and strlen($tanggal) == "10") {
            $str = explode('-', $tanggal);
            $tanggal = $str[2] . "-" . $str[1] . "-" . $str[0];
            return $tanggal;
        }
    }

    public function data_pasien()
    {

        //mengambil baris_data awal yang akan diambi, angkanya terdapat pada URI SEGMENT 3  
        $dari   = $this->uri->segment(3);

        //secara default, awal baris data adalah kosong (null), agar tidak NULL, diubah jadi 0
        if (empty($dari)) {
            $dari = 0;
        } else {
            $dari = $dari;
        }

        //baris data pada halaman yang akan ditampilkan
        $sampai = 3;

        //default kriteria dan katakunci
        $kriteria     = 'nama_pasien';
        $kata_kunci   = '';

        //hitung jumlah row
        $jumlah = $this->model_pasien->get_jumlah_data($kriteria, $kata_kunci);


        //INISIALISASI FUNGSI PAGINATION
        $config = array();

        //set base_url untuk setiap link page
        $config['base_url'] = base_url() . "pasien/data_pasien"; // <= sesuai nama controller dan fuction

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
        $data['data_pasien'] = $this->model_pasien->get_data($dari, $sampai, $kriteria, $kata_kunci);

        //Membuat link pagination
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data['title'] = 'APSS DATA PASIEN Ver-1.0';

        //memanggil view untuk ditampilkan ke layar browser
        $this->load->view('view_datapasien', $data);
    }


    public function cari()
    {

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

        if (empty($dari)) {
            $dari = 0;
        } else {
            $dari = $dari;
        }

        if ($kriteria == '') {
            $kriteria = 'nama_pasien';
        } else {
            $kriteria = $kriteria;
        }

        //baris data pada halaman yang akan ditampilkan
        $sampai = 5;

        //hitung jumlah row data
        $jumlah = $this->model_pasien->get_jumlah_data($kriteria, $kata_kunci);

        //inisialisasi fungsi pagination
        $config = array();

        //set base_url untuk setiap link page
        // PENAMBAHAN $kriteria ke URI segment 3 dan $kata_kunci ke URI segment 4
        $config['base_url'] = base_url() . "pasien/cari/" . $kriteria . "/" . $kata_kunci;

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
        $data['data_pasien'] = $this->model_pasien->get_data($dari, $sampai, $kriteria, $kata_kunci);


        //Membuat link
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data['title'] = 'APSS DATA PASIEN Ver-1.0';

        $this->load->view('view_pencarianpasien', $data);
    }


    public function registrasi_pasien()
    {

        //Membuat Nomor RM 
        $no_rm = "RM-" . date("dmy") . rand(1000, 9999);
        $data['no_rm'] = $no_rm;

        //melempar nomor_rm ke VIEW
        $this->load->view('view_form_registrasi_pasien', $data);
    }


    public function proses_registrasi()
    {
        $nama         = (trim(html_escape($this->input->post('txt_nama'))));
        $jeniskelamin = (trim(html_escape($this->input->post('txt_jeniskelamin'))));
        $tgl_lahir    = (trim(html_escape($this->input->post('txt_tgl_lahir'))));
        $tgl_lahir    = $this->tanggal_indo($tgl_lahir);
        $alamat       = (trim(html_escape($this->input->post('txt_alamat'))));
        $no_tlp       = (trim(html_escape($this->input->post('txt_tlp'))));
        $no_rm        = (trim(html_escape($this->input->post('txt_no_rm'))));

        // echo "$nama  "." $jeniskelamin "." $tgl_lahir   "." $alamat "." $no_tlp". "$no_rm";

        //memanggil model dan mengirim variabel ke model
        $this->model_pasien->insert_pasien($nama, $jeniskelamin, $tgl_lahir, $alamat, $no_tlp, $no_rm);

        //mengarahkan kembali ke halaman utama
        redirect('pasien/data_pasien');
    }

    public function edit_pasien()
    {

        //mengambil data dari URL 
        $id_pasien   = $this->uri->segment(3);

        //mengambil data dari database
        $query_data = $this->model_pasien->get_detail_pasien($id_pasien)->row_array();

        //memeceh hasil query kedalam variabel 

        //variabel_yangdilempar ke view    //NAMA FIELD PADA DATABASE
        $data['dt_id_pasien']        = $query_data['id_pasien'];
        $data['dt_nama_pasien']      = $query_data['nama_pasien'];
        $data['dt_tgl_lahir']        = $query_data['tgl_lahir'];
        $data['dt_jenis_kelamin']    = $query_data['jenis_kelamin'];
        $data['dt_alamat']           = $query_data['alamat'];
        $data['dt_no_tlp']           = $query_data['no_tlp'];

        //memanggil form_edit dan melempar data hasil query
        $this->load->view('view_form_edit_pasien', $data);
    }


    public function proses_edit_pasien()
    {
        $id_pasien    = (trim(html_escape($this->input->post('txt_id_pasien'))));
        $nama         = (trim(html_escape($this->input->post('txt_nama'))));
        $jeniskelamin = (trim(html_escape($this->input->post('txt_jeniskelamin'))));
        $tgl_lahir    = (trim(html_escape($this->input->post('txt_tgl_lahir'))));
        $alamat       = (trim(html_escape($this->input->post('txt_alamat'))));
        $no_tlp       = (trim(html_escape($this->input->post('txt_tlp'))));

        //memanggil model dan mengirim variabel ke model
        $this->model_pasien->qry_update_data_pasien($nama, $jeniskelamin, $tgl_lahir, $alamat, $no_tlp, $id_pasien);

        //mengarahkan kembali ke halaman utama
        redirect('pasien/data_pasien');
    }
}