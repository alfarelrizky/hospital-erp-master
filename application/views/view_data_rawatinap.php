<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
  <html>
  <head>
       <title> <?php echo $title; ?> </title>
       <link rel="stylesheet" type="text/css" href="<?php echo base_url()."/style/desain.css"?>">
  </head>
  <body>
      <div id="container">
           <div id="body">
                <h1>Data Rawat Inap</h1>
 
                <?php include "form_cari_rawatinap.php"; ?>

                 <table id="gp_tabel" width="100%">
                 <tr>
                 <th>ID Rawat Inap</th>
                 <th>No Rekam Medis</th>
                 <th>Dokter Penanggungjawab</th>
                 <th>Kelas Rawat Inap</th>
                 <th>Aksi</th>
                 </tr>
                 <?php foreach ($data_rawatinap as $row) { ?>
                      <tr align=center>
                           <td><?php echo $row['id_rawat_inap'];?></td>
                           <td><?php echo $row['id_rekam_medis'];?></td>
                           <td><?php echo $row['dokter_penanggungjawab'];?></td>
                           <td><?php echo $row['kelas_rawat_inap'];?></td>
                           <td>
<a href="<?php echo base_url()?>rawat_inap/edit_rawatinap/<?php echo $row['id_rawat_inap']; ?>"> Edit Data</a>                               
<a href="<?php echo base_url()?>perawatan/tambah/<?php echo $row['id_rawat_inap']; ?>"> List Perawatan</a> 
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