<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rawat_inap extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_rawatinap');
		// pengecekan session apakah user yang login merupkan dokter atau bukan
		if ($this->session->userdata('sess_login') == FALSE) redirect('Login/logout', 'refresh');
		if ($this->session->userdata('sess_id') == "") redirect('Login/logout', 'refresh');
		if ($this->session->userdata('sess_username') == "") redirect('Login/logout', 'refresh');
		if ($this->session->userdata('sess_role_akses') == 3 or $this->session->userdata('sess_role_akses') == 1) redirect('Login/logout', 'refresh');
	}

	// fungsi index redirect to data rawat inap
	public function index()
	{
		redirect('rawat_inap/data_rawatinap');
	}

	// fungsi get data rawat inap
	public function data_rawatinap(){
		
        //mengambil baris_data awal yang akan diambil, angkanya terdapat pada URI SEGMENT 3  
        $dari   = $this->uri->segment(3);

        //secara default, awal baris data adalah kosong (null), agar tidak NULL, diubah jadi 0
        if (empty($dari)) { $dari = 0; } else { $dari = $dari; }

        //baris data pada halaman yang akan ditampilkan
        $sampai = 3;
       
        //default kriteria dan katakunci
        $kriteria     = 'id_rawat_inap';
        $kata_kunci   = '';
            
        //hitung jumlah row
        $jumlah = $this->Model_rawatinap->get_jumlah_data($kriteria, $kata_kunci);

   
        //INISIALISASI FUNGSI PAGINATION
        $config = array();

        //set base_url untuk setiap link page
        $config['base_url'] = base_url()."rawat_inap/data_rawatinap"; // <= sesuai nama controller dan fuction

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
       $data['data_rawatinap'] = $this->Model_rawatinap->get_data($dari,$sampai,$kriteria,$kata_kunci);

       //Membuat link pagination
       $str_links = $this->pagination->create_links();
       $data["links"] = explode('&nbsp;',$str_links );
       $data['title'] = 'APSS DATA RAWAT INAP Ver-1.0';
        
       //memanggil view untuk ditampilkan ke layar browser
	   $this->load->view('view_data_rawatinap',$data);
	   
		// $data['data_rawatinap'] = $this->Model_rawatinap->get_data_rawatinap()->result_array();
	}

	// fungsi edit data rawat inap
	public function edit_rawatinap(){
		$this->load->view('view_form_edit_data_rawatinap');
    }
    
	// fungsi registrasi rawat inap
	public function registrasi_rawatinap(){
		$this->load->view('view_form_registrasi_rawatinap');
	}

	// fungsi cari rawat inap
	public function cari(){
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

	public function proses_daftar_rawat_inap(){
		//valid
		$this->form_validation->set_rules('txt_id_rmpasien' , 'ID RM Pasien' , 'required');
		$this->form_validation->set_rules('txt_dokter_pj','DOKTER PENANGGUNGJAWAB','required');
		$this->form_validation->set_rules('txt_kelas','KELAS','required');

		//cek
		if ($this->form_validation->run() == FALSE) {
			// fungsi validasi masih belum complete!!!!!!!!!!!!!

			// $data['spesialis'] = $this->Model_rawat->select_tbl_dokter()->result_array();
			// $this->load->view('view_data_rawatinap', $data);

			$this->load->view('view_form_registrasi_rawatinap');
		} else {
			$id            	= (trim(html_escape($this->input->post('txt_id_rmpasien'))));
			$dokter    		= (trim(html_escape($this->input->post('txt_dokter_pj'))));
			$kelas          = (trim(html_escape($this->input->post('txt_kelas'))));

			$cekin = $this->Model_rawatinap->insert_rawat_inap($id,$dokter,$kelas);
			if ($cekin == true) {
				$this->session->set_flashdata('alert', 'PENDAFTARAN BERHASIL');
			} else {
				$this->session->set_flashdata('alert', 'PENDAFTARAN GAGAL');
			}
			//pulang
			redirect('rawat_inap');
		}
	}
}