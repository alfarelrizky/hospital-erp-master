<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
  <html>
  <head>
       <title> Basis Data Dokter | Registrasi  Dokter </title>
       <link rel="stylesheet" type="text/css" href="<?php echo base_url()."/style/desain.css"?>">
  </head>
  <body>
      <div id="container">
           <div id="body">
             <h1>Form Registrasi Dokter</h1>
             <?php if (validation_errors())
        {?>   <div style="width:500px; background-color:#FCC; padding:5px; 
               margin-left:auto; margin-right:auto; ">
                <?php echo validation_errors(); ?> <br>
            </div>
       <?php } ?>
             <form name="form1" method="post" action="<?php echo base_url()."dokter/proses_registrasi";?>">
                 <table id="gp_tabel" width="50%">
                   <th colspan="3">  SILAHKAN REGISTRASI DATA DOKTER </th>
                 <tr>
                   <td>ID Dokter</td>
                   <td>:</td>
                   <td>
                   <input type="text" name="txt_id_dokter" id="txt_id_dokter" value="<?php echo $id_dokter; ?>" readonly>
                   </td>
                 </tr>
                 <tr>
                   <td width="20%">Nama Dokter</td>
                   <td width="1%">:</td>
                   <td width="79%">
                    <input type="text" name="txt_nama" id="txt_nama" value=""></td>
                 </tr>
                 <tr>
                   <td>Jenis Kelamin </td>
                   <td>:</td>
                   <td> 
                        <input type="radio" name="txt_jeniskelamin" value="laki-laki">  Laki-Laki 

                        <input type="radio" name="txt_jeniskelamin"  value="perempuan">  Perempuan 
                  </td>
                 </tr>
                 <tr>
                   <td>Alamat </td>
                   <td>:</td>
                   <td><textarea name="txt_alamat" id="txt_alamat" cols="45" rows="5"></textarea></td>
                 </tr>
                 <tr>
                   <td>No. TLP </td>
                   <td>:</td>
                   <td><input type="number" name="txt_tlp" id="txt_tlp"></td>
                 </tr>
                 <tr>
                   <td>Email </td>
                   <td>:</td>
                   <td><input type="text" name="txt_email" id="txt_email"></td>
                 </tr>
                 <tr>
                 <td>Spesialis</td>
                   <td>:</td>
                   <td><select name='txt_spesialis' id='txt_spesialis'>
                       <?php
                        // menampilkan option list dari database
                        echo "  <option value='' disabled selected>Pilih Spesialis Dokter</option>";
                        foreach ($spesialis as $row_spesialis) {  
                                        echo " <option value='".$row_spesialis->spesialis."'>".$row_spesialis->bidang_spesialis."</option>"; }
                       ?>
                        </select>
                   </td>

                 </tr>
                 <tr>
                   <td>Join Date </td>
                   <td>:</td>
                   <td><input type="date" name="txt_join_date" id="txt_join_date"></td>
                 </tr>
                 <tr>
                   <td>Status </td>
                   <td>:</td>
                   <td> 
                        <input type="radio" name="txt_status" value="tetap"> Tetap 
                        <input type="radio" name="txt_status"  value="non-tetap">  Non-Tetap
                  </td>
                 </tr>
                 <tr>
                   <td>Nomor Izin </td>
                   <td>:</td>
                   <td><input type="text" name="txt_no_ijin" id="txt_no_ijin"></td>
                 </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>:</td>
                   <td><input type="submit" name="button" id="button" value= " PROSES  "> || 
                       <a class="btn2" href="<?php echo base_url(); ?>dokter/data_dokter"> Batal </a></td>
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