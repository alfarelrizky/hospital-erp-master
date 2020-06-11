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
		$this->load->view('#');
	}

	// fungsi cari rawat inap
	public function cari(){
		$this->load->view('#');
	}

	public function daftar_rawat_inap(){
		//valid
		$this->form_validation->set_rules('txt_id' , 'ID' , 'required');
		$this->form_validation->set_rules('txt_dokter','DOKTER PENANGGUNG JAWAB','required');
		$this->form_validation->set_rules('txt_status','STATUS KELAS','required');

		//cek
		if ($this->form_validation->run() == FALSE) {
			$data['spesialis'] = $this->Model_rawat->select_tbl_dokter()->result_array();
			$this->load->view('view_rawat_inap', $data);
		} else {
			$id            	= (trim(html_escape($this->input->post('txt_id'))));
			$dokter    		= (trim(html_escape($this->input->post('txt_dokter'))));
			$kelas          = (trim(html_escape($this->input->post('txt_status'))));

			$cekin = $this->Model_rawat->insert_rawat_inap($id,$dokter,$kelas);
			if ($cekin == true) {
				$this->session->set_flashdata('alert', 'PENDAFTARAN BERHASIL');
			} else {
				$this->session->set_flashdata('alert', 'PENDAFTARAN GAGAL');
			}
			//pulang
			redirect('rawat');
		}
	}
	public function list()
	{

		$this->load->view('view_list_proses');
	}
	public function rekap()
	{

		$this->load->view('view_rekap_pembayaran');
	}
	public function detail()
	{

		$this->load->view('view_detail_rekap');
	}
}