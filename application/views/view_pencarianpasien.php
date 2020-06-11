<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
  <html>
  <head>
       <title><?php echo $title; ?> </title>
       <link rel="stylesheet" type="text/css" href="<?php echo base_url()."/style/desain.css"?>">
  </head>
  <body>
      <div id="container">
           <div id="body">
                 <h1>Pencarian Data Pasien </h1>
                 <?php include "form_cari.php";?>
 
 <table id="gp_tabel" width="100%">
 <tr>
 <th>ID Pasien</th>
 <th>Nama Pasien</th>
 <th>Tanggal Lahir</th>
 <th>Jenis Kelamin</th>
 <th>Alamat</th>
 <th>No Tlp</th>
 <th>Nomor RM</th>
 <th>Aksi</th>
 </tr>
 <?php
if (empty($data_pasien)) {echo "
    <tr><td colspan='7' style='padding:10px; background:#F00; border:none; color:#FFF;'>
        Hasil pencarian tidak ditemukan.</td>
     </tr>"; }
     foreach ($data_pasien as $row) { ?>
        <tr align=center>
             <td><?php echo $row['id_pasien'];?></td>
             <td><?php echo $row['nama_pasien'];?></td>
             <td><?php echo $row['tgl_lahir'];?></td>
             <td><?php echo $row['jenis_kelamin'];?></td>
             <td><?php echo $row['alamat'];?></td>
             <td><?php echo $row['no_tlp'];?></td>
             <td><?php echo $row['no_rekam_medis'];?></td>
             <td><a href="<?php echo base_url()?>pasien/edit_pasien/<?php echo $row['id_pasien']; ?>"> Edit Data</a> 
                 <a href="<?php echo base_url()?>rekam_medis/detil_rm/<?php echo $row['id_pasien']; ?>"> 
                 Detil RM</a> 
             </td>
        </tr>
   <?php } ?>
</table>

<div id="pagination">
   <ul class="gp_pagination">
        <!-- Pagination links -->
        <?php foreach ($links as $link) {
              echo "<li>". $link."</li>";
        } ?>
   </ul>
</div>
<!-- FOOTER DISINI -->
<br>Apilkasi pencariaan data pasien &copy; Muhammad Aushafy Setyawan @ 2020 
<br>
<br>
</div>
</div>
</body>
</html>
