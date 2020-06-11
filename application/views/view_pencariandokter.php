<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
  <html>
  <head>
       <title><?php echo $title; ?> </title>
       <link rel="stylesheet" type="text/css" href="<?php echo base_url()."/style/desain.css"?>">
  </head>
  <body>
      <div id="container">
           <div id="body">
                 <h1>Pencarian Data Dokter </h1>
                 <?php include "form_cari_dokter.php";?>
 
 <table id="gp_tabel" width="100%">
 <tr>
 <th>ID Dokter</th>
 <th>Nama Pasien</th>
 <th>Jenis Kelamin</th>
 <th>Alamat</th>
 <th>No Tlp</th>
 <th>Email</th>
 <th>Aksi</th>
 </tr>
 <?php
if (empty($data_dokter)) {echo "
    <tr><td colspan='7' style='padding:10px; background:#F00; border:none; color:#FFF;'>
        Hasil pencarian tidak ditemukan.</td>
     </tr>"; }
     foreach ($data_dokter as $row) { ?>
        <tr align=center>
             <td><?php echo $row['id_dokter'];?></td>
             <td><?php echo $row['nama_dokter'];?></td>
             <td><?php echo $row['jenis_kelamin'];?></td>
             <td><?php echo $row['alamat'];?></td>
             <td><?php echo $row['no_tlp'];?></td>
             <td><?php echo $row['email'];?></td>
             <td><a href="<?php echo base_url()?>dokter/edit_dokter/<?php echo $row['id_dokter']; ?>"> Edit Data</a>
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
