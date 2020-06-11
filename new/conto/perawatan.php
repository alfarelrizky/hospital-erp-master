<?php
defined('BASEPATH') or exit('No direct script access allowed');

class perawatan extends CI_Controller
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

    public function index(){
		$data['data'] = $this->Model_rawat->select_rawat_inap()->result_array();
		$this->load->view('view_list_perawatan', $data);
	}
	
	public function edit($id){
		$data['data'] = $this->Model_rawat->select_where_rawat_inap($id)->result_array();
		$this->load->view('view_form_edit_perawatan', $data);
	}

	public function act_edit(){
		//valid
		$this->form_validation->set_rules('txt_id', 'ID RM', 'required');
		$this->form_validation->set_rules('txt_dokter', 'DOKTER PENANGGUNG JAWAB', 'required');
		$this->form_validation->set_rules('txt_status', 'STATUS KELAS', 'required');

		//cek
		if ($this->form_validation->run() == FALSE) {
			$data['data'] = $this->Model_rawat->select_where_rawat_inap($this->input->post('id'))->result_array();
			$this->load->view('view_form_edit_perawatan', $data);
		} else {
			$id            	= (trim(html_escape($this->input->post('txt_id'))));
			$txtid            	= (trim(html_escape($this->input->post('txt_id'))));
			$dokter    		= (trim(html_escape($this->input->post('txt_dokter'))));
			$kelas          = (trim(html_escape($this->input->post('txt_status'))));

			$cek = $this->Model_rawat->update_rawat_inap($id,$txtid, $dokter, $kelas);
			if ($cek == true) {
				$this->session->set_flashdata('alert-stat', 'BERHASIL');
				$this->session->set_flashdata('alert', 'UPDATE ID RM '.$txtid.' , Dokter PJ '.$dokter.', Kelas Rawat '.$kelas.' BERHASIL');
			}else{
				$this->session->set_flashdata('alert-stat', 'GAGAL');
				$this->session->set_flashdata('alert', 'UPDATE ID RM ' . $txtid . ' , Dokter PJ ' . $dokter . ', Kelas Rawat ' . $kelas . ' GAGAL');
			}
			//pulang
			redirect('perawatan/');
		}
	}

	public function hapus($id)
	{
		$cek = $this->Model_rawat->delete_rawat_inap($id);
		if ($cek == true) {
			$this->session->set_flashdata('alert-stat', 'BERHASIL');
			$this->session->set_flashdata('alert', 'DELETE DATA BERHASIL');
		} else {
			$this->session->set_flashdata('alert-stat', 'GAGAL');
			$this->session->set_flashdata('alert', 'UPDATE DATA GAGAL');
		}
		//pulang
		redirect('perawatan/');
	}
}