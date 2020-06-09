
<table id="gp_tabel" width="50%" >
    <tr>
    <th>ID User</th>
    <th>Nama User</th>
    <th>Username</th>
    <th>Status user</th>
    <th>Level akses</th>
    <th>Aksi</th>
    </tr>
    <?php foreach ($data_user as $row) { ?>
    <tr align=center>
               <td><?php echo $row['id_user'];?></td>
       <td><?php echo $row['nama'];?></td>
       <td><?php echo $row['username'];?></td>
       <td><?php echo $row['status_user'];?></td>
       <td><?php if ($row['role_user'] == 1) {echo "Admin User" ;       }  
            else if ($row['role_user'] == 2) {echo "Admin MR" ;    }
            else if ($row['role_user'] == 3) {echo "Dokter" ;      }
            else if ($row['role_user'] == 4) {echo "Pendaftaran" ; }  ?>   
       </td>        
       <td>
<a href="<?php echo base_url()?>user_aplikasi/edit_user/<?php echo $row['id_user']; ?>"> Edit Data</a> 
<a href="<?php echo base_url()?>user_aplikasi/blok_user/<?php echo $row['id_user']; ?>"> Blok User</a> 
       </td>
    </tr>
    <?php  } // tutup foreach ?>
</table>
<br><br> <hr> <i>Praktikum web 2 @ 2020 </i>
