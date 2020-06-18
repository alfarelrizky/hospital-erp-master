<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perawatan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_perawatan');
		// pengecekan session apakah user yang login merupkan dokter atau bukan
		if ($this->session->userdata('sess_login') == FALSE) redirect('Login/logout', 'refresh');
		if ($this->session->userdata('sess_id') == "") redirect('Login/logout', 'refresh');
		if ($this->session->userdata('sess_username') == "") redirect('Login/logout', 'refresh');
		if ($this->session->userdata('sess_role_akses') == 3 or $this->session->userdata('sess_role_akses') == 1) redirect('Login/logout', 'refresh');
    }

    public function index($id = null){
		if (empty($id) or $id=='') {
			$data['data'] = $this->Model_perawatan->select_aja()->result_array();
			$this->load->view('view_list_perawatan', $data);
		}else{
			$data['data'] = $this->Model_perawatan->select_perawatan($id)->result_array();
			$this->load->view('view_list_perawatan', $data);
		}
	}

	public function tambah($id){
		$data['data'] = $this->Model_perawatan->select_perawatan($id)->result_array();
		$this->load->view('view_tambah_perawatan', $data);
	}

	public function act_tambah()
	{
		//valid
		$this->form_validation->set_rules('txt_id', 'ID', 'required');
		$this->form_validation->set_rules('txt_nama_dokter', 'NAMA DOKTER', 'required');
		$this->form_validation->set_rules('txt_tanggal_periksa', 'TANGGAL PERIKSA', 'required');
		$this->form_validation->set_rules('txt_tindakan', 'TINDAKAN', 'required');
		$this->form_validation->set_rules('txt_obat', 'OBAT', 'required');
		$this->form_validation->set_rules('txt_anamase', 'ANAMASE', 'required');
		$this->form_validation->set_rules('txt_diagnosis', 'DIAGNOSIS', 'required');
		$this->form_validation->set_rules('txt_status_pasien', 'STATUS PASIEN', 'required');

		//cek
		if ($this->form_validation->run() == FALSE) {
			$data['data'] = $this->Model_perawatan->select_perawatan()->result_array();
			$this->load->view('view_tambah_perawatan', $data);
		} else {
			$id            			= (trim(html_escape($this->input->post('txt_id'))));
			$namadokter    			= (trim(html_escape($this->input->post('txt_nama_dokter'))));
			$tanggalperiksa         = (trim(html_escape($this->input->post('txt_tanggal_periksa'))));
			$tindakan          		= (trim(html_escape($this->input->post('txt_tindakan'))));
			$obat          			= (trim(html_escape($this->input->post('txt_obat'))));
			$anamase          		= (trim(html_escape($this->input->post('txt_anamase'))));
			$diagnosis         		= (trim(html_escape($this->input->post('txt_diagnosis'))));
			$statuspasien          	= (trim(html_escape($this->input->post('txt_status_pasien'))));

			$cekin = $this->Model_perawatan->insert_perawatan($id, $namadokter, $tanggalperiksa,$tindakan,$obat,$anamase,$diagnosis,$statuspasien);
			if ($cekin == true) {
				$this->session->set_flashdata('alert', 'TAMBAH DATA PERAWATAN BERHASIL');
				$this->session->set_flashdata('alert-stat', 'BERHASIL');
			} else {
				$this->session->set_flashdata('alert-stat', 'GAGAL');
				$this->session->set_flashdata('alert', 'TAMBAH DATA PERAWATAN GAGAL');
			}
			//pulang
			redirect('perawatan/index/'.$id);
		}
	}

	public function edit($id){
		$data['data'] = $this->Model_perawatan->select_where_perawatan($id)->result_array();
		$this->load->view('view_form_edit_perawatan', $data);
	}

	public function act_edit(){
		//valid
		$this->form_validation->set_rules('txt_id', 'ID', 'required');
		$this->form_validation->set_rules('txt_nama_dokter', 'NAMA DOKTER', 'required');
		$this->form_validation->set_rules('txt_tanggal_periksa', 'TANGGAL PERIKSA', 'required');
		$this->form_validation->set_rules('txt_tindakan', 'TINDAKAN', 'required');
		$this->form_validation->set_rules('txt_obat', 'OBAT', 'required');
		$this->form_validation->set_rules('txt_anamase', 'ANAMASE', 'required');
		$this->form_validation->set_rules('txt_diagnosis', 'DIAGNOSIS', 'required');
		$this->form_validation->set_rules('txt_status_pasien', 'STATUS PASIEN', 'required');


		//cek
		if ($this->form_validation->run() == FALSE) {
			$data['data'] = $this->Model_perawatan->select_where_perawatan($this->input->post('id'))->result_array();
			$this->load->view('view_form_edit_perawatan', $data);
		} else {
			$i            			= (trim(html_escape($this->input->post('id'))));
			$id            			= (trim(html_escape($this->input->post('txt_id'))));
			$namadokter    			= (trim(html_escape($this->input->post('txt_nama_dokter'))));
			$tanggalperiksa         = (trim(html_escape($this->input->post('txt_tanggal_periksa'))));
			$tindakan          		= (trim(html_escape($this->input->post('txt_tindakan'))));
			$obat          			= (trim(html_escape($this->input->post('txt_obat'))));
			$anamase          		= (trim(html_escape($this->input->post('txt_anamase'))));
			$diagnosis         		= (trim(html_escape($this->input->post('txt_diagnosis'))));
			$statuspasien          	= (trim(html_escape($this->input->post('txt_status_pasien'))));

			$cek = $this->Model_perawatan->update_perawatan($i,$id, $namadokter, $tanggalperiksa, $tindakan, $obat, $anamase, $diagnosis, $statuspasien);;
			if ($cek == true) {
				$this->session->set_flashdata('alert-stat', 'BERHASIL');
				$this->session->set_flashdata('alert', 'UPDATE Dengan Id Rawat Inap ' . $id . ',Nama Dokter '.$namadokter.', Tanggal '.$tanggalperiksa. ' BERHASIL');
			}else{
				$this->session->set_flashdata('alert-stat', 'GAGAL');
				$this->session->set_flashdata('alert', 'UPDATE Dengan Id Rawat Inap ' . $id . ',Nama Dokter ' . $namadokter . ', Tanggal ' . $tanggalperiksa . ' GAGAL');
			}
			//pulang
			redirect('perawatan/index/'.$id);
		}
	}

	public function hapus($id,$i)
	{
		$cek = $this->Model_perawatan->delete_perawatan($id);
		if ($cek == true) {
			$this->session->set_flashdata('alert-stat', 'BERHASIL');
			$this->session->set_flashdata('alert', 'DELETE DATA BERHASIL');
		} else {
			$this->session->set_flashdata('alert-stat', 'GAGAL');
			$this->session->set_flashdata('alert', 'UPDATE DATA GAGAL');
		}
		//pulang
		redirect('perawatan/index/'.$i);
	}

	public function cari(){
		$this->load->view('#');
	}
}