<html>
<head> <title>APLIKASI REKAM MEDIS RUMAH SAKIT</title>
       <link href="<?php echo base_url(); ?>/style/style_menu.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php 
    // inisialisasi variabel dari session 
    //diambil hasil lemparan controller homepage
	$username    = $sess_username;  
	$iduser      = $sess_id;
	$nama        = $sess_nama;
    $level_akses = $sess_role_akses;
?>

<!-- HEADER -->
<center>
<table width="90%">
  <tr>
    <td width="106" height="62" valign="top">
    <img src="<?php echo base_url();?>/style/images/logo_klinik.png" alt="" width="85" /></td>
    <td width="964" valign="middle"><p><strong>SISTEM INFORMASI DATA PASIEN DAN REKAM MEDIS</strong></p>
      <p>RS SEHAT SENTOSA<br />
      </p></td>
    <td width="222" valign="middle">
      	 <img src="<?php echo base_url();?>/style/images/ncb.png" width="18" align="absbottom" /><b> 
        <?php echo  $nama; ?></b><br /><br />
        <img src="<?php echo base_url();?>/style/images/world_link.png" width="16" align="absbottom" /> 
        <a href="<?php echo base_url();?>login/logout"> <b>Logout</b> </a></td>
  </tr>
  <tr>
    <td height="21" colspan="3" valign="top"><hr color="#0099FF"></td>
  </tr>
</table>
</center>

<!-- CONTENT -->
<table cellpadding="0" cellspacing="0" align="center" border="0" height="70%" width="90%">
<tbody>
 <tr>	
  <td valign="top">
     <table class="slim" cellpadding="2" cellspacing="0" border="1" width="100%">
	 <tbody>
	   <tr valign="middle">
		 <td width="75%" align="center" class="slim-left" 
         style="padding:10px;background-color:#efefef;font-size:14px;">
         <b>SILAHKAN PILIH MENU </b><br></td>
       </tr>
	   <tr valign="middle">
	     <td height="20" align="center" valign="middle" class="slim-left" gcolor="#666666"><p><br></p>
	     
     <!--PEMBAGIAN HAK AKSE MENU -- > 
            <!-- LEVELING MENU ROLE 1 -->
            <?php if ($level_akses == 1) { ?>
            <br /><br>
            <table width="80%" >
            <tr>
              <td width="210" height="90" align="center" valign="middle">
                <a href="<?php echo base_url();?>user_aplikasi/data_user">
                <img src="<?php echo base_url()?>/style/images/data_user.png" width="85" class="img3" /></a>
                <br> <strong><br> DATA USER</strong> <br></td>
                
              <td width="195" align="center" valign="middle">
                <a href="<?php echo base_url();?>dokter">
                <img src="<?php echo base_url()?>/style/images/data_dokter.png" width="85" class="img3" /></a>
                <br> <strong><br> DATA DOKTER</strong> <br></td>
                
              <td width="190" align="center" valign="middle">
                <a href="<?php echo base_url();?>diagnosis">
                <img src="<?php echo base_url()?>/style/images/kode_diagnosa.png" width="85" class="img3" /></a>
                <br> <strong><br> DATA DIAGNOSA</strong> <br></td>	     
			 </tr>
		    </table>         
            <!-- TUTUP LEVELING MENU 1-->
            <?php } ?>
            
                                                                    <!-- script berlanjut ke halaman berikutnya -->

            <!-- LEVELING MENU ROLE 2 -->
            <?php if ($level_akses == 2) { ?>
            <br /><br>
            <table width="80%" >
            <tr>
              <td width="210" height="90" align="center" valign="middle">
                <a href="<?php echo base_url();?>pasien">
                <img src="<?php echo base_url()?>/style/images/data_pasien.png" width="85" class="img3" /></a>
                <br><br><b> DATA PASIEN </b><br></td>
                
              <td width="210" height="90" align="center" valign="middle">
                <a href="<?php echo base_url();?>dokter">
                <img src="<?php echo base_url()?>/style/images/data_dokter.png" width="85" class="img3" /></a>
                 <br><br><b> DATA DOKTER </b><br></td>
                 
              <td width="190" align="center" valign="middle">
                <a href="<?php echo base_url();?>diagnosis">
                <img src="<?php echo base_url()?>/style/images/kode_diagnosa.png" width="85" class="img3" /></a>
                <br><br><b> KODE DIAGNOSA </b><br></td>	 
                
              <td width="190" align="center" valign="middle">
                <a href="<?php echo base_url();?>report/dokter">
                <img src="<?php echo base_url()?>/style/images/report_dokter.png" width="85" class="img3" /></a>
                <br><br><b> REPORT DOKTER </b><br></td>	
                
              <td width="190" align="center" valign="middle">
                <a href="<?php echo base_url();?>report/medical">
                <img src="<?php echo base_url()?>/style/images/report_medic_process.png" width="85" class="img3" /></a>
                <br><br><b> REKAP MEDICAL </b><br></td>

            <!--Menu / Modul Tambahan-->

                <td width="190" align="center" valign="middle">
                <a href="<?= base_url('rawat') ?>">
                <img src="<?php echo base_url()?>/style/images/bed.png" width="85" class="img3" /></a>
                <br><br><b> RAWAT INAP </b><br></td> 

                <td width="190" align="center" valign="middle">
                <a href="<?= base_url('perawatan') ?>">
                <img src="<?php echo base_url()?>/style/images/nurse.png" width="85" class="img3" /></a>
                <br><br><b> LIST PERAWATAN </b><br></td>

                <td width="190" align="center" valign="middle">
                <a href="<?= base_url('rawat/rekap') ?>">
                <img src="<?php echo base_url()?>/style/images/money.png" width="85" class="img3" /></a>
                <br><br><b> REKAP PEMBAYARAN </b><br></td>	     
			 </tr>
		    </table>      
            <!-- TUTUP LEVELING MENU 2-->
            <?php } ?>
            
            
            <!-- LEVELING MENU ROLE 3 -->
            <?php if ($level_akses == 3) { ?>
            <br /><br>
            <table width="80%" >
            <tr>
              <td width="210" height="90" align="center" valign="middle">
                <a href="<?php echo base_url();?>medis/dokter/<?php echo $iduser; ?>">
                <img src="<?php echo base_url()?>/style/images/berobat.png" width="85" class="img3" /></a>
                <br><br><b> PERIKSA PASIEN </b><br></td>
                
              <td width="210" height="90" align="center" valign="middle">
                <a href="<?php echo base_url();?>rekammedis/<?php echo $iduser; ?>">
                <img src="<?php echo base_url()?>/style/images/data_rm.jpg" width="65" class="img3" /></a>
                 <br><br><b> REKAM MEDIS PASIEN </b><br></td>
           
              <td width="190" align="center" valign="middle">
                <a href="<?php echo base_url();?>report/medical/by_dokter/<?php echo $iduser; ?>">
                <img src="<?php echo base_url()?>/style/images/report_medic_process.png" width="85" class="img3" /></a>
                <br><br><b> REKAP MEDICAL </b><br></td>	     
			 </tr>
		    </table>      
            <!-- TUTUP LEVELING MENU 3-->
            <?php } ?>
            
            
            <!-- LEVELING MENU ROLE 4 -->
            <?php if ($level_akses == 4) { ?>
                <br /><br>
            <table width="50%" >
            <tr>
              <td width="327" height="90" align="center" valign="middle">
                <a href="<?php echo base_url();?>pasien">
                <img src="<?php echo base_url()?>/style/images/data_pasien.png" width="80" class="img3" /></a>
                <br><br><b> DATA PASIEN </b><br></td>
                           
              <td width="311" height="90" align="center" valign="middle">
                <a href="<?php echo base_url();?>medis/pendaftaran/<?php echo $iduser; ?>">
                <img src="<?php echo base_url()?>/style/images/berobat.png" width="85" class="img3" /></a>
                <br><br><b> PENDAFTARAN PEMERIKSAAN </b><br></td>   
			 </tr>
		    </table>      
            <!-- TUTUP LEVELING MENU 3-->
            <?php } ?>
           
            <!-- tutup pembagian hak askes -->
                     


						            <!-- script dilanjut ke halaman berikutnya -->
   
            <p>&nbsp;</p> <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p> 
            <p>&nbsp;</p><p>&nbsp;</p> <p>&nbsp;</p>   
                 
        </td>
     </tr>
     
</tbody></table><br><br>
</td></tr></tbody></table>

<!-- FOOTER -->
    <table align="center" border="0" width="90%">
    <tbody><tr>
    <td colspan="3"><hr color="#0099FF"></td>
    </tr>
    <tr>
    <td style="padding:5px;padding-top:2px;">
    <div style="float:right;font-size:8pt;text-align:right;">
      Pemrograman web 2 - UMB © 2020 <br><br>	
      </div>
    <div style="clear:both;"></div>
      </td>
    </tr>
  </tbody></table>
</body></html>
