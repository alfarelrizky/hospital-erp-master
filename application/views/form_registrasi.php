<html>
  <head> <title> Registrasi User </title>
         <link rel="stylesheet" type="text/css" href="<?php echo base_url()."/style/desain.css"?>">
         <script src="<?php echo base_url(); ?>assets/jquery/jquery-3.4.1.js"></script>
  </head>
  <body>
    <div id="container">
      <div id="body">
        <h2 align="center"><u>FORM REGISTRASI USER</u></h2><br>
        <?php if (validation_errors())
        {?>   <div style="width:500px; background-color:#FCC; padding:5px; 
               margin-left:auto; margin-right:auto; ">
                <?php echo validation_errors(); ?> <br>
            </div>
       <?php } ?>
       <form action="<?php echo base_url()?>user_aplikasi/proses_simpan" method="post">
       <table id="gp_tabel" width="35%" align="center">
       <th colspan="3">  Silahkan masukan data user  </th>
         <tr><td width="40%">Nama user </td>
             <td width="1%">:</td>
             <td width="59%"><input type="text" name="txt_nama" id="txt_nama" value="" ></td>
         </tr>
         <tr><td width="40%" height="28">Username </td>
             <td width="1%">:</td>
             <td width="59%"><input type="text" name="txt_username" id="txt_nama" value="" ></td>
         </tr>
         <tr><td width="40%">No. Hp </td>
             <td width="1%">:</td>
             <td width="59%"><input type="text" name="txt_no_hp" id="txt_nama" value="" ></td>
         </tr>
         <tr> <td width="40%">Email </td>
              <td width="1%">:</td>
              <td width="59%"><input type="text" name="txt_email" id="txt_nama" value="" ></td>
         </tr>
         <tr> <td width="40%">Password</td>
              <td width="1%">:</td>
              <td width="59%"><input type="text" name="txt_password" id="txt_nama" value="" ></td>
         </tr>
         <tr><td width="40%">Konfirmasi Password </td>
             <td width="1%">:</td>
             <td><input type="text" name="txt_konfirm_password" id="txt_nama" value="" ></td>
         </tr>
         <tr> <td>&nbsp;</td>
              <td>:</td>
              <td><input type="submit" name="button" class="btn2" value= " DAFTARKAN  "> || 
                  <a class="btn2" href="<?php echo base_url(); ?>pasien/">  BATAL  </a></td>
         </tr>
       </table>
       </form>
       <br><br><br>
      </div>
    </div>
 </body>
 </html>
