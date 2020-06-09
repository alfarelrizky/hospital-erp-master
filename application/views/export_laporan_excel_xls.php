<?php
 $judulfile = 'LaporanExcel_manual.xls';
 //MOFIFIKASI HEADER HTTP MENJADI FILE XLS
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=$judulfile");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EXPORT LAPORAN</title>
</head>

<body>
 LIST DATA PASIEN YANG TERDAFTAR :<br><br>

 <table border="1" cellspacing="1" cellpadding="2" width="90%">
    <tr>
        <th width="5%" align="center">No. Urut</th>
        <th width="20%" align="center">Nama pasien</th>
        <th width="20%" align="center">Tgl Lahir</th>
        <th width="25%" align="center">Alamat</th>
        <th width="20%" align="center">No. Tlp</th>
        <th width="20%" align="center">Nomor RM</th>
    </tr>
    <?php foreach ($data_pasien as $row) { ?>
    <tr>
         <td align="center"><?php echo $row['id_pasien'];?></td>
         <td><?php echo $row['nama_pasien'];?></td>
         <td align="center"><?php echo $row['tgl_lahir'];?></td>
         <td><?php echo $row['alamat'];?></td>
         <td><?php echo $row['no_tlp'];?></td>
         <td><?php echo $row['no_rekam_medis'];?></td>
    </tr>
   <?php } ?>
</table>
</body>
</html>