<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
  <html>
  <head>
       <title> Proses</title>
       <link rel="stylesheet" type="text/css" href="<?php echo base_url()."/style/desain.css"?>">
  </head>
  <body>
      <div id="container">
           <div id="body">
             <h1>Form Proses Perawatan Pasien</h1>
             <form name="form1" method="post" action="<?php echo base_url()."pasien/proses_registrasi";?>">
                 <table id="gp_tabel" width="50%">
                   <th colspan="3">  SILAHKAN LENGKAPI DATA PERAWATAN PASIEN</th>
                 <tr>
                   <td width="20%">No.RM Pasien</td>
                   <td width="1%">:</td>
                   <td width="79%">
                    Disini No.RM Pasien</td>
                 </tr>
                 <tr>
                   <td width="20%">Dokter</td>
                   <td width="1%">:</td>
                   <td width="79%">
                    Nama Dokter</td>
                 </tr>
                 <tr>
                   <td width="20%">Kelas</td>
                   <td width="1%">:</td>
                   <td width="79%">
                    Kelas Ruangan</td>
                 </tr>
                 <tr> <input type="hidden" name="txt_id_pasien" id="txt_tgl_lahir" >
                   <td>Tanggal Periksa</td>
                   <td>:</td>  
                   <td><input type="date" name="txt_tgl_lahir" id="txt_tgl_lahir" required></td>
                 </tr>
                 <tr>
                   <td>Tindakan </td>
                   <td>:</td>
                   <td><textarea name="txt_alamat" id="txt_alamat" cols="45" rows="5"></textarea></td>
                 </tr>
                 <tr>
                   <td>Obat </td>
                   <td>:</td>
                   <td><textarea name="txt_alamat" id="txt_alamat" cols="45" rows="5"></textarea></td>
                 </tr>
                 <tr>
                   <td>Anamase </td>
                   <td>:</td>
                   <td><textarea name="txt_alamat" id="txt_alamat" cols="45" rows="5"></textarea></td>
                 </tr>
                  <tr>
                   <td>Diagnosis</td>
                   <td>:</td>
                   <td><input type="text" name="txt_no_rm" id="txt_no_rm" value=""></td>
                 </tr>
                 <tr>
                   <td width="20%">Status Pasien</td>
                   <td width="1%">:</td>
                   <td width="79%">
                    Aktif/Tidak Aktif</td>
                 </tr>
                 
                 <tr>
                   <td>&nbsp;</td>
                   <td>:</td>
                   <td><input type="submit" name="button" id="button" value= " PROSES  "> || 
                       <a class="btn2" href=""> Batal </a></td>
                 </tr>
               </table>
             </form>
             <br><br><i>Aplikasi Datapasien &copy; Praktikum web 2 @ 2020 </i>
            <br>
            <br>
           </div>
       </div>
  </body>
  </html>