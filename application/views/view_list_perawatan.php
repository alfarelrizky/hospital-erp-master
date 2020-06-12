<?php defined('BASEPATH') or exit('No direct script access allowed');
     foreach ($data as $output) {
          $idnya = $output['id_rawat_inap'];
     }
?>
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
                         <th>ID RM Pasien</th>
                         <th>ID Perawatan</th>
                         <th>Nama Dokter</th>
                         <th>Tanggal Periksa</th>
                         <th>Tindakan</th>
                         <th>Obat</th>
                         <th>Anamase</th>
                         <th>Diagnosis</th>
                         <th>Status Pasien</th>
                         <th>
                              <a href="<?php echo base_url().'perawatan/tambah/'.$idnya ?>" style='font-size: 12px;display: block;box-shadow: -1px 1px black;color: black;width: 70%;height: 16px;padding: 5px 5px 10px 5px;color: black;background-color: #75ff86;Float: right;'>TAMBAH PERAWATAN</a>
                         </th>
                    </tr>
                    <?php $i = 1;
                    foreach ($data as $output) {
                    ?>
                         <tr align=center>
                              <td><?php echo $i++ ?></td>
                              <td><?php echo $output['id_rekam_medis'] ?></td>
                              <td><?php echo $output['id_perawatan'] ?></td>
                              <td><?php echo $output['nama_dokter'] ?></td>
                              <td><?php echo $output['tanggal_periksa'] ?></td>
                              <td><?php echo $output['tindakan'] ?></td>
                              <td><?php echo $output['obat'] ?></td>
                              <td><?php echo $output['anamase'] ?></td>
                              <td><?php echo $output['diagnosis'] ?></td>
                              <td name='<?php echo $output['status_pasien'] ?>'><?php echo $output['status_pasien'] ?></td>
                              <td>
                                   <div style='display:block;width:100%;height:20px;padding:10px;'>
                                        <a style='box-shadow: -1px 1px black;display:inline;color:white;background-color:green;' href='<?php echo site_url('perawatan/edit/' . $output['id_perawatan']) ?>'> EDIT</a>
                                        <a style='box-shadow: -1px 1px black;display:inline;color:white;background-color:RED;' onclick="tanyain('<?php echo $output['id_perawatan']; ?>','<?php echo $output['id_rawat_inap']; ?>','<?php echo $output['tanggal_periksa']; ?>','<?php echo $output['nama_dokter']; ?>')"> HAPUS</a>
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
     const tanyain = (i, id, tgl, pj) => {
          let yakin = confirm(`Yakin Menghapus Data No Rm.${id} dengan Dokter Pemeriksa ${pj}?`);

          if (yakin) {
               getBaseUrl();
               window.location = uri + 'perawatan/hapus/' + i + '/'+ id
          }
     }

     const terang_terangan_kuningin = () => {
          let tarik = document.getElementsByName('PROSES PERAWATAN');
          for (i = 0; i < tarik.length; i++) {
               tarik[i].style.boxShadow = "yellow -1px -1px 10px";
               tarik[i].style.backgroundColor = '#e6ff1b';
          }
     }
     terang_terangan_kuningin();

     const terang_terangan_merah = () => {
          let tarik = document.getElementsByName('SEMBUH');
          for (i = 0; i < tarik.length; i++) {
               tarik[i].style.boxShadow = `green -1px -1px 10px`;
               tarik[i].style.backgroundColor = 'green';
               tarik[i].style.color = 'white';
          }
     }
     terang_terangan_merah();
</script>

</html>