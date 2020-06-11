<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
  <html>
  <head>
       <title> Basis Data pasien | Registrasi  Pasien </title>
       <link rel="stylesheet" type="text/css" href="<?php echo base_url()."/style/desain.css"?>">
  </head>
  <body>
      <div id="container">
           <div id="body">
             <h1>Form Registrasi Pasien</h1>
             
             <form name="form1" method="post" action="<?php echo base_url()."pasien/proses_edit_pasien";?>">
                 <table id="gp_tabel" width="50%">
                   <th colspan="3">  SILAHKAN UBAH DATA PASIEN </th>
                 <tr>
                   <td width="20%">Nama Pasien</td>
                   <td width="1%">:</td>
                   <td width="79%">
                    <input type="text" name="txt_nama" id="txt_nama" value="<?php echo $dt_nama_pasien; ?>" required></td>
                 </tr>
                 <tr>
                   <td>Jenis Kelamin </td>
                   <td>:</td>
                   <td> 
                        <input type="radio" name="txt_jeniskelamin" value="laki-laki" 
                        <?php 
                        if ($dt_jenis_kelamin == "laki-laki") {echo "checked"; }  ?> >  Laki-Laki 

                        <input type="radio" name="txt_jeniskelamin"  value="perempuan" 
                        <?php 
                        if ($dt_jenis_kelamin == "perempuan") {echo "checked"; }  ?> 
                        >  Perempuan 
                  </td>
                 </tr>
                 <tr> <input type="hidden" name="txt_id_pasien" id="txt_tgl_lahir" value="<?php echo $dt_id_pasien;?>">
                   <td>Tanggal Lahir</td>
                   <td>:</td>  
                   <td><input type="text" name="txt_tgl_lahir" id="txt_tgl_lahir" 
                    value="<?php echo $dt_tgl_lahir;?>" required></td>
                 </tr>
                 <tr>
                   <td>Alamat </td>
                   <td>:</td>
                   <td><textarea name="txt_alamat" id="txt_alamat" cols="45" rows="5"><?php echo $dt_alamat;?></textarea></td>
                 </tr>
                 <tr>
                   <td>No. TLP </td>
                   <td>:</td>
                   <td><input type="number" name="txt_tlp" id="txt_tlp"   value="<?php echo $dt_no_tlp;?>"  required></td>
                 </tr>
                
                 <tr>
                   <td>&nbsp;</td>
                   <td>:</td>
                   <td><input type="submit" name="button" id="button" value= " PROSES  "> || 
                       <a class="btn2" href="<?php echo base_url(); ?>pasien/"> Batal </a></td>
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