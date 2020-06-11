<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
  <html>
  <head>
       <title> Rekap Pembayaran </title>
       <link rel="stylesheet" type="text/css" href="<?php echo base_url()."/style/desain.css"?>">
  </head>
  <body>
      <div id="container">
           <div id="body">
                 <h1>Data Rekap Pembayaran Pasien </h1>

                 <?php include "form_rekap_pembayaran.php"; ?>

                 <table id="gp_tabel" width="100%">
                 <tr>
                 <th>No</th>
                 <th>RM.Pasien</th>
                 <th>Rawat Inap/hari</th>
                 <th>Total obat</th>
                 <th>Total Biaya</th>
                 <th>Aksi</th>
                 </tr>
                 <?php $no=1 ?>
                      <tr align=center>
                           <td><?php echo $no++?></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td>
                            <a href="<?= base_url('rawat/detail') ?>"> Detail</a>                               
<!-- <a href="<?php echo base_url()?>rekam_medis/detil_rm/<?php echo $row['id_dokter']; ?>"> Detil RM</a>  -->
                           </td>
                      </tr>
            </table>
            
              <!-- FOOTER DISINI -->
            <br>Apilkasi pencariaan data pasien &copy;  @ 2020 
            <br>
            <br>
           </div>
       </div>
  </body>
  </html>