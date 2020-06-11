<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
     <title> Rawat Inap </title>
     <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "/style/desain.css" ?>">
</head>

<body>
     <div id="container">
          <div id="body">
               <h1>List Data Rawat Inap </h1>
               <a href='<?php echo base_url('Homepage') ?>'><button style='display:block;box-shadow: -1px 1px black;color:white;width:100px;height:30px;color:white;background-color:blue;Float:left;'> KEMBALI</button></a>
               <table id="gp_tabel" width="100%" style='box-shadow: -3px 3px #b5adad;' align='center'>
                    <?php
                    if (empty($this->session->flashdata('alert')) && empty($this->session->flashdata('alert-stat'))) {
                    } else {
                         if ($this->session->flashdata('alert-stat') == 'BERHASIL') {
                    ?>
                              <div align='center' style='display:block;background-color: #68ff7e;width: 50%;color: black;padding: 10px;margin: 5px auto;box-shadow: -2px 1px 5px black;'>
                                   <b>
                                        <?php echo $this->session->flashdata('alert'); ?>
                                   </b>
                              </div>
                         <?php
                         } else if ($this->session->flashdata('alert-stat') == 'GAGAL') {
                         ?>
                              <div align='center' style='display:block;background-color: #ff6868;width: 50%;color: white;padding: 10px;margin: 5px auto;box-shadow: -2px 1px 5px black;'>
                                   <b>
                                        <?php echo $this->session->flashdata('alert'); ?>
                                   </b>
                              </div>
                    <?php
                         }
                    }
                    ?>
                    <tr>
                         <th>No.</th>
                         <th>No.RM Pasien</th>
                         <th>Dokter PJ</th>
                         <th>Kelas Rawat</th>
                         <th>Aksi</th>
                         <?php $i = 1 ?>
                         <?php
                         foreach ($data as $output) {
                         ?>
                    <tr align=center>
                         <td><?php echo $i++ ?></td>
                         <td><?php echo $output['id_rekam_medis'] ?></td>
                         <td><?php echo $output['dokter_penanggungjawab'] ?></td>
                         <td><?php echo $output['kelas_rawat_inap'] ?></td>
                         <td>
                              <div style='display:block;width:100%;height:20px;padding:10px;'>
                                   <a style='box-shadow: -1px 1px black;display:inline;color:white;background-color:green;' href='<?php echo site_url('perawatan/edit/' . $output['id_rawat_inap']) ?>'> EDIT</a>
                                   <a style='box-shadow: -1px 1px black;display:inline;color:white;background-color:RED;' onclick="tanyain('<?php echo $output['id_rawat_inap']; ?>','<?php echo $output['id_rekam_medis']; ?>','<?php echo $output['dokter_penanggungjawab']; ?>')"> HAPUS</a>
                              </div>
                         </td>
                    </tr>
               <?php } ?>
               </table>

               <div id="pagination">
                    <ul class="gp_pagination">
                    </ul>
               </div>
               <!-- FOOTER DISINI -->
               <br><br><i>Aplikasi Datapasien Prepered By Kelompok 2 &copy; Praktikum web 2 @ 2020</i>
          </div>
     </div>
</body>
<script>
     let uri;
     const getBaseUrl = () => {

          //mendapatkan url pada addressbar , contoh url yang saya dapatkan
          //http://localhost/website/index.php/lalala/lilili (url pada framework ci)
          let url = location.href;

          //umumnya base_url pada ci terdapat sebelum file index.php,
          //atau bisa juga anda memodifikasi sedikit semisal anda menggunakan pure php
          //mungkin dapat menggunakan url.search(“.php”); atau url.search(“.html”) dll
          //jadi anda mencari file php / html yang terdapat di addressbar sebagai patokannya

          let index = url.search("perawatan");

          //Lalu ambil bagian dari karakter ke-0 hingga file
          //karakter ke-n yang terdapat index.php
          let base_url = url.substr(0, index);
          //parsing base_url
          uri = base_url;
          return base_url;

     }
     const tanyain = (id, rm, pj) => {
          let yakin = confirm(`Yakin Menghapus Data No Rm.${rm} dengan Dokter Penanggung jawab ${pj}?`);

          if (yakin) {
               getBaseUrl();
               window.location = uri + 'perawatan/hapus/' + id
          }
     }
</script>

</html>