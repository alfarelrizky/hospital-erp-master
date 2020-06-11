<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
  <html>
  <head> <link rel="stylesheet" type="text/css" href="<?php echo base_url()."/style/desain.css"?>">
  </head>
  <body>
  <div id="container">
  <div id="body">
  <h1>Form Data user</h1>
  <div class="gp_btn" >
  <ul>
  <!-- LIST MENU -->
  <li><a class="btn2" href="<?php echo base_url(); ?>homepage/">Home</a></li>
  <li><a class="btn2" href="<?php echo base_url(); ?>user_aplikasi/data_user">Reload Data </a></li>
  <li><a class="btn2" href="<?php echo base_url(); ?>user_aplikasi/">Registrasi user</a></li>
      </ul>
  </div>
  <br>
  <table id="gp_tabel" width="50%" >
  <tr>
  <th>ID User</th>
  <th>Nama User</th>
  <th>Username</th>
  <th>Status user</th>
  <th>Level akses</th>
  <th>Aksi</th>
  <!-- <pre>
  <?php 
  $array = (array)$data_user;
  print_r($array->id_user);
//   var_dump($data_user); 
  
  ?>

  
  </pre> -->
 
  </tr>
  <?php   
  foreach ($data_user as $row) { 
  ?>
    <tr align=center>
     <td><?php echo $row->id_user;?></td>
     <td><?php echo $row->nama;?></td>
     <td><?php echo $row->username;?></td>
     <td><?php echo $row->status_user;?></td>
     <td><?php echo $row->role_user;?></td>
     <td>
<a href="<?php echo base_url()?>user_aplikasi/edit_user/<?php echo $row->id_user; ?>"> Edit Data</a> <a href="<?php echo base_url()?>user_aplikasi/blok_user/<?php echo $row->id_user; ?>"> Blok User</a> 
     </td>
  </tr>
  <?php } ?>
  </table>
  <br> Praktikum web 2 @ 2020  <br><br>
</div>
</div>
</body>
</html>
