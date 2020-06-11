<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rawat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_rawat');
		// pengecekan session apakah user yang login merupkan dokter atau bukan
		if ($this->session->userdata('sess_login') == FALSE) redirect('Login/logout', 'refresh');
		if ($this->session->userdata('sess_id') == "") redirect('Login/logout', 'refresh');
		if ($this->session->userdata('sess_username') == "") redirect('Login/logout', 'refresh');
		if ($this->session->userdata('sess_role_akses') == 3 or $this->session->userdata('sess_role_akses') == 1) redirect('Login/logout', 'refresh');
	}

	public function index()
	{
		$data['spesialis'] = $this->Model_rawat->select_tbl_dokter()->result_array();
		$this->load->view('view_rawat_inap', $data);
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

			$cek = $this->Model_rawat->insert_rawat_inap($id,$dokter,$kelas);
			if ($cek == true) {
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