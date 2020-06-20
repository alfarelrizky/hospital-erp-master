<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  class Laporan extends CI_Controller {
 
    public function __construct() {
      parent::__construct();
      $this->load->library('pdf'); // panggil library pdf yang telah dibuat
      $this->load->model('model_laporan'); // memanggil model laporan
    }

    Public function cetakpdf(){

        //SCRIPT UNTUK MENGHASILKAN FILE PDF
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false); // generate PDF

        $pdf->SetTitle('Contoh'); // TITLE pada HTML
        $pdf->SetTopMargin(20);  // Margin atas
        $pdf->setFooterMargin(10); // Margin Bawah 
        // margin kanan dan kiri
        $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT, '10');  
        $pdf->SetAutoPageBreak(true); // membuat page break otomatis
        // menampilkan garis pada header
        $pdf->setPrintHeader(true);
        $pdf->setPrintFooter(true);
        
        $pdf->SetDisplayMode('real', 'default');
        // menambahkan halaman 
        $pdf->AddPage('P'); // (L, untuk lanscape P utk Portrait)

        // Judul di header pdf, diawali dengan posisi dari batas atas
        $pdf->Write(10, 'Contoh Laporan PDF dengan CodeIgniter + tcpdf');

        // ISI PDF 
        $html = '<br><br> <h1> HALAMAN CETAK PDF </h1> 
                 <br><br> Ini adalah isi PDF </br>';

        //menulis isi kedalam file PDF 
        $pdf->Writehtml($html);

        // mengahasilkan outputfile PDF berisi nama file , dan perintah pada browser
        $pdf->Output('contoh1.pdf', 'I'); 
        // I, untuk menampilkan pdf di browser, D untuk mengunduh file pdf 

    } // tutup fucntion

    public function laporan_pasien_pdf() {
        // memanggil data dari databse
        $datapasien= $this->model_laporan->get_all_pasien()->result_array();
  
        $pdf = new TCPDF('', 'mm','A4', true, 'UTF-8', false);
        // konfigurasi  
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
        $pdf->SetTopMargin(20); // Margin atas
        $pdf->setFooterMargin(10); // Margin Bawah 
        $pdf->SetMargins('10', '10','10', '10');     
        $pdf->SetAutoPageBreak(TRUE);  
        $pdf->SetFont('helvetica', '', 10); 
  
        // munculkan file
        $pdf->AddPage('P');  
        $html = '
          <br><br> 
          <img src="'.base_url().'images/logo_klinik.png" width="20px"> 
          &nbsp; RS SENTOSA JAYA - DATA PASIEN YANG TERDAFTAR :<br><br>
          <table cellspacing="1" bgcolor="#666666" cellpadding="2" width="90%">
            <tr bgcolor="#ffffff">
              <th width="5%" align="center">No. Urut</th>
              <th width="20%" align="center">Nama pasien</th>
              <th width="20%" align="center">Tgl Lahir</th>
              <th width="25%" align="center">Alamat</th>
              <th width="20%" align="center">No. Tlp</th>
              <th width="20%" align="center">Nomor RM</th>
            </tr>';
            // memecah data dari model dan menampilkannya di table
            foreach ($datapasien as $row) {
            $html.='<tr bgcolor="#ffffff">
                      <td align="center">'.$row['id_pasien'].'</td>
                      <td>'.$row['nama_pasien'].'</td>
                      <td>'.$row['tgl_lahir'].'</td>
                      <td>'.$row['alamat'].'</td>
                      <td>'.$row['no_tlp'].'</td>
                      <td>'.$row['no_rekam_medis'].'</td>
                  </tr>';
                }; // tutup foerach table
                $html.='</table>'; // menyambung html table
                $pdf->writeHTML($html);	
                $pdf->Output('list_data_pasien.pdf', 'D');
            }

        public function laporan_pasien_xls() {
              // memanggil data dari database
              $data['data_pasien'] = $this->model_laporan->get_all_pasien()->result_array();
              //mengirim data ke view
              $this->load->view('export_laporan_excel_xls', $data);  
        }//tutup function

        public function export_excel_data_dokter() {
          // mengambil data dari model
          $datapasien = $this->model_laporan->get_all_dokter()->result();
    
          //inisiasi library
          $spreadsheet = new Spreadsheet;
          // membuat header kolom
          $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Id Dokter')
            ->setCellValue('B1', 'Nama Dokter')
            ->setCellValue('C1', 'Jenis Kelamin')
            ->setCellValue('D1', 'Alamat')
            ->setCellValue('E1', 'No. Tlp')
            ->setCellValue('F1', 'Email')
            ->setCellValue('G1', 'Spesialis')
            ->setCellValue('H1', 'Tgl Masuk')
            ->setCellValue('I1', 'Status')
            ->setCellValue('J1', 'No. Ijin');
            
          //menjadikan setial kolom menjadi autosize, kolom harus didefinisikan dahulu
          // jika range kolom lebih dari J. silahkan ditambahkan sesuai dengan kolom yang ingin dibuat
          foreach(range('A','J') as $kolom_id){
             $spreadsheet->getActiveSheet()->getColumnDImension($kolom_id)
            ->setAutoSize(true); }
    
          $kolom = 2; //untuk menambahkn cell kolom (A2, A3 dst), angka 2 adalah default !!
    
          // Mengisi data pada kolom
          foreach($datapasien as $row) {
            $spreadsheet->setActiveSheetIndex(0)
               ->setCellValue('A'.$kolom, $row->id_dokter)
               ->setCellValue('B'.$kolom, $row->nama_dokter)
               ->setCellValue('C'.$kolom, $row->jenis_kelamin)
               ->setCellValue('D'.$kolom, $row->alamat)
               ->setCellValue('E'.$kolom, $row->no_tlp)
               ->setCellValue('F'.$kolom, $row->email)
               ->setCellValue('G'.$kolom, $row->spesialis)
               ->setCellValue('H'.$kolom, $row->status)
               ->setCellValue('I'.$kolom, $row->join_date)
               ->setCellValue('J'.$kolom, $row->nomor_izin);
            $kolom++;
          } // tutup foreach data
    
        // MEMBUAT FILE
        $writer = new Xlsx($spreadsheet);
        $filename = "data-dokter-".date("Y-m-d").".csv";
        // MEMUNCULKAN FILE UNTUK DI DOWNLOAD
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename={$filename}");
        $writer->save('php://output');
    
      } // tutup function
  
    public function export_pdf_data_dokter() {
      // mengambil data dari model
      // memanggil data dari databse
      $datapasien= $this->model_laporan->get_all_dokter()->result_array();

      $pdf = new TCPDF('', 'mm','A4', true, 'UTF-8', false);
      // konfigurasi  
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $pdf->SetTopMargin(20); // Margin atas
      $pdf->setFooterMargin(10); // Margin Bawah 
      $pdf->SetMargins('10', '10','10', '10');     
      $pdf->SetAutoPageBreak(TRUE);  
      $pdf->SetFont('helvetica', '', 10); 

      // munculkan file
      $pdf->AddPage('L');  
      $html = '
      <br><br> 
      <img src="'.base_url().'images/logo_klinik.png" width="20px"> 
      &nbsp; RS SENTOSA JAYA - DATA DOKTER YANG TERDAFTAR :<br><br>
      <table cellspacing="1" bgcolor="#666666" cellpadding="2" width="90%">
        <tr bgcolor="#ffffff">
          <th width="5%" align="center">ID Dokter</th>
          <th width="10%" align="center">Nama Dokter</th>
          <th width="10%" align="center">Jenis Kelamin</th>
          <th width="15%" align="center">Alamat</th>
          <th width="15%" align="center">No Tlp</th>
          <th width="15%" align="center">Email</th>
          <th width="5%" align="center">Spesialis</th>
          <th width="10%" align="center">Tanggal Masuk</th>
          <th width="5%" align="center">Status</th>
          <th width="10%" align="center">Nomor Izin</th>
        </tr>';
        // memecah data dari model dan menampilkannya di table
        foreach ($datapasien as $row) {
        $html.='<tr bgcolor="#ffffff">
                  <td align="center">'.$row['id_dokter'].'</td>
                  <td>'.$row['nama_dokter'].'</td>
                  <td>'.$row['jenis_kelamin'].'</td>
                  <td>'.$row['alamat'].'</td>
                  <td>'.$row['no_tlp'].'</td>
                  <td>'.$row['email'].'</td>
                  <td>'.$row['spesialis'].'</td>
                  <td>'.$row['join_date'].'</td>
                  <td>'.$row['status'].'</td>
                  <td>'.$row['nomor_izin'].'</td>
              </tr>';
            }; // tutup foerach table
            $html.='</table>'; // menyambung html table
            $filename = "data-dokter-".date("Y-m-d").".pdf";
            $pdf->writeHTML($html);	
            $pdf->Output("{$filename}", "D");

  } // tutup function

  public function export_pdf_data_rawatinap() {
    // mengambil data dari model
    // memanggil data dari databse
    $datarawatinap = $this->model_laporan->get_all_rawatinap()->result_array();

    $pdf = new TCPDF('', 'mm','A4', true, 'UTF-8', false);
    // konfigurasi  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetTopMargin(20); // Margin atas
    $pdf->setFooterMargin(10); // Margin Bawah 
    $pdf->SetMargins('10', '10','10', '10');     
    $pdf->SetAutoPageBreak(TRUE);  
    $pdf->SetFont('helvetica', '', 10); 

    // munculkan file
    $pdf->AddPage('L');  
    $html = '
    <br><br> 
    <img src="'.base_url().'images/logo_klinik.png" width="20px"> 
    &nbsp; RS SENTOSA JAYA - RAWAT INAP :<br><br>
    <table cellspacing="1" bgcolor="#666666" cellpadding="2" width="90%">
      <tr bgcolor="#ffffff">
        <th width="20%" align="center">ID Rawat Inap</th>
        <th width="20%" align="center">ID Rekam Medis</th>
        <th width="20%" align="center">Dokter Penanggungjawab</th>
        <th width="20%" align="center">Kelas Rawat Inap</th>
      </tr>';
      // memecah data dari model dan menampilkannya di table
      foreach ($datarawatinap as $row) {
      $html.='<tr bgcolor="#ffffff">
                <td align="center">'.$row['id_rawat_inap'].'</td>
                <td>'.$row['id_rekam_medis'].'</td>
                <td>'.$row['dokter_penanggungjawab'].'</td>
                <td>'.$row['kelas_rawat_inap'].'</td>
            </tr>';
          }; // tutup foerach table
          $html.='</table>'; // menyambung html table
          $filename = "data-rawat-inap-".date("Y-m-d").".pdf";
          $pdf->writeHTML($html);	
          $pdf->Output("{$filename}", "D");

} // tutup function

Public function export_excel_data_rawatinap() {
  // mengambil data dari model
  $datarawatinap = $this->model_laporan->get_all_rawatinap()->result();

  //inisiasi library
  $spreadsheet = new Spreadsheet;
  // membuat header kolom
  $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'ID Rawat Inap')
    ->setCellValue('B1', 'ID Rekam Medis')
    ->setCellValue('C1', 'Dokter Penanggungjawab')
    ->setCellValue('D1', 'Kelas Rawat Inap');
    
  //menjadikan setial kolom menjadi autosize, kolom harus didefinisikan dahulu
  // jika range kolom lebih dari J. silahkan ditambahkan sesuai dengan kolom yang ingin dibuat
  foreach(range('A','D') as $kolom_id){
     $spreadsheet->getActiveSheet()->getColumnDImension($kolom_id)
    ->setAutoSize(true); }

  $kolom = 2; //untuk menambahkn cell kolom (A2, A3 dst), angka 2 adalah default !!

  // Mengisi data pada kolom
  foreach($datarawatinap as $row) {
    $spreadsheet->setActiveSheetIndex(0)
       ->setCellValue('A'.$kolom, $row->id_rawat_inap)
       ->setCellValue('B'.$kolom, $row->id_rekam_medis)
       ->setCellValue('C'.$kolom, $row->dokter_penanggungjawab)
       ->setCellValue('D'.$kolom, $row->kelas_rawat_inap);
    $kolom++;
  } // tutup foreach data

// MEMBUAT FILE
$writer = new Xlsx($spreadsheet);
$filename = "data-rawat-inap-".date("Y-m-d").".csv";
// MEMUNCULKAN FILE UNTUK DI DOWNLOAD
header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment;filename={$filename}");
$writer->save('php://output');
} // tutup function

public function export_pdf_data_perawatan() {
  // mengambil data dari model
  // memanggil data dari databse
  $dataperawatan = $this->model_laporan->get_all_perawatan()->result_array();

  $pdf = new TCPDF('', 'mm','A4', true, 'UTF-8', false);
  // konfigurasi  
  $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $pdf->SetTopMargin(20); // Margin atas
  $pdf->setFooterMargin(10); // Margin Bawah 
  $pdf->SetMargins('10', '10','10', '10');     
  $pdf->SetAutoPageBreak(TRUE);  
  $pdf->SetFont('helvetica', '', 10); 

  // munculkan file
  $pdf->AddPage('L');  
  $html = '
  <br><br> 
  <img src="'.base_url().'images/logo_klinik.png" width="20px"> 
  &nbsp; RS SENTOSA JAYA - PERAWATAN :<br><br>
  <table cellspacing="1" bgcolor="#666666" cellpadding="2" width="90%">
    <tr bgcolor="#ffffff">
      <th width="10%" align="center">ID Perawatan</th>
      <th width="10%" align="center">ID Rawat Inap</th>
      <th width="20%" align="center">Nama dokter</th>
      <th width="15%" align="center">Tanggal Periksa</th>
      <th width="10%" align="center">Tindakan</th>
      <th width="10%" align="center">Obat</th>
      <th width="10%" align="center">Anamase</th>
      <th width="10%" align="center">Diagnosis</th>
      <th width="10%" align="center">Status Pasien</th>
    </tr>';
    // memecah data dari model dan menampilkannya di table
    foreach ($dataperawatan as $row) {
    $html.='<tr bgcolor="#ffffff">
              <td align="center">'.$row['id_perawatan'].'</td>
              <td align="center">'.$row['id_rawat_inap'].'</td>
              <td align="center">'.$row['nama_dokter'].'</td>
              <td align="center">'.$row['tanggal_periksa'].'</td>
              <td align="center">'.$row['tindakan'].'</td>
              <td align="center">'.$row['obat'].'</td>
              <td align="center">'.$row['anamase'].'</td>
              <td align="center">'.$row['diagnosis'].'</td>
              <td align="center">'.$row['status_pasien'].'</td>
          </tr>';
        }; // tutup foerach table
        $html.='</table>'; // menyambung html table
        $filename = "data-perawatan-".date("Y-m-d").".pdf";
        $pdf->writeHTML($html);	
        $pdf->Output("{$filename}", "D");

} // tutup function

Public function export_excel_data_perawatan() {
// mengambil data dari model
$datarawatinap = $this->model_laporan->get_all_rawatinap()->result();

//inisiasi library
$spreadsheet = new Spreadsheet;
// membuat header kolom
$spreadsheet->setActiveSheetIndex(0)
  ->setCellValue('A1', 'ID Perawatan')
  ->setCellValue('B1', 'ID Rawat Inap')
  ->setCellValue('C1', 'Nama Dokter')
  ->setCellValue('D1', 'Tanggal Periksa')
  ->setCellValue('E1', 'Tindakan')
  ->setCellValue('F1', 'Obat')
  ->setCellValue('G1', 'Anamase')
  ->setCellValue('H1', 'Diagnosis')
  ->setCellValue('I1', 'Status Pasien');
  
//menjadikan setial kolom menjadi autosize, kolom harus didefinisikan dahulu
// jika range kolom lebih dari J. silahkan ditambahkan sesuai dengan kolom yang ingin dibuat
foreach(range('A','I') as $kolom_id){
   $spreadsheet->getActiveSheet()->getColumnDImension($kolom_id)
  ->setAutoSize(true); }

$kolom = 2; //untuk menambahkn cell kolom (A2, A3 dst), angka 2 adalah default !!

// Mengisi data pada kolom
foreach($datarawatinap as $row) {
  $spreadsheet->setActiveSheetIndex(0)
     ->setCellValue('A'.$kolom, $row->id_perawatan)
     ->setCellValue('B'.$kolom, $row->id_rawat_inap)
     ->setCellValue('C'.$kolom, $row->nama_dokter)
     ->setCellValue('D'.$kolom, $row->tanggal_periksa)
     ->setCellValue('D'.$kolom, $row->tindakan)
     ->setCellValue('D'.$kolom, $row->obat)
     ->setCellValue('D'.$kolom, $row->anamase)
     ->setCellValue('D'.$kolom, $row->diagnosis)
     ->setCellValue('D'.$kolom, $row->status_pasien);
  $kolom++;
} // tutup foreach data

// MEMBUAT FILE
$writer = new Xlsx($spreadsheet);
$filename = "data-rawat-inap-".date("Y-m-d").".csv";
// MEMUNCULKAN FILE UNTUK DI DOWNLOAD
header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment;filename={$filename}");
$writer->save('php://output');
} // tutup function
        
} // tutup controller 
