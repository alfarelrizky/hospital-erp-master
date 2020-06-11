<?php
$datacurrent = $this->Model_rawat->select_rawat_inap()->result_array();
//  $datacurrent = $this->Model_rawat->select_tbl_dokter()->result_array();
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
    <title> Perawatan </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "/style/desain.css" ?>">
</head>

<body>
    <div id="container">
        <div id="body">
            <h1>Edit Data Perawatan.</h1>
            <?php if (validation_errors()) { ?> <div style="width:500px; background-color:#FCC; padding:5px; 
               margin-left:auto; margin-right:auto;">
                    <?php echo validation_errors(); ?> <br>
                </div>
            <?php } ?>
            <form name="form1" method="post" action="<?php echo base_url() ?>perawatan/act_edit">
                <?php
                foreach ($data as $output) { ?>
                    <table id="gp_tabel" width="50%" style='box-shadow: -3px 3px #b5adad;' align='center'>
                        <th colspan="3"> FORM EDIT DATA PERAWATAN </th>
                        <tr>
                            <input type="hidden" name="id" value='<?php echo $output['id_perawatan']; ?>'>
                            <td>ID / No.RM Pasien</td>
                            <td width="10">:</td>
                            <td><select onchange='dokter()' name='txt_id' id='txt_spesialis'>
                                    <?php
                                    echo "<option value='' disabled selected>No.RM Pasien</option>";
                                    echo "<option value='" . $output['id_rawat_inap'] . "' selected>" . $output['id_rekam_medis'] . "</option>";
                                    foreach ($datacurrent as $hasil) {
                                        if ($hasil['id_rekam_medis'] != $output['id_rekam_medis']) {
                                            echo "<option value='" . $hasil['id_rawat_inap'] . "'>" . $hasil['id_rekam_medis'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Dokter PJ</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="txt_dokter" id='txt_dokter' readonly>
                            </td>
                        </tr>

                        <tr>
                            <td>Kelas </td>
                            <td>:</td>
                            <td>
                                <input type="radio" name="txt_status" value="Kelas 1" id='stat1' disabled> Kelas 1
                                <input type="radio" name="txt_status" value="Kelas 2" id='stat2' disabled> Kelas 2
                                <input type="radio" name="txt_status" value="Kelas 3" id='stat3' disabled> Kelas 3
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Dokter</td>
                            <td>:</td>
                            <td>
                                <input type="text" name='txt_nama_dokter' value='<?php echo $output['nama_dokter']; ?>'>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Periksa</td>
                            <td>:</td>
                            <td>
                                <input type="date" name='txt_tanggal_periksa' value='<?php echo $output['tanggal_periksa']; ?>'>
                            </td>
                        </tr>
                        <tr>
                            <td>Tindakan</td>
                            <td>:</td>
                            <td>
                                <textarea name="txt_tindakan" rows="3" cols="50" placeholder="Isi Disini..."><?php echo $output['tindakan']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>obat</td>
                            <td>:</td>
                            <td>
                                <textarea name="txt_obat" rows="3" cols="50" placeholder="Isi Disini..."><?php echo $output['obat']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Anamase</td>
                            <td>:</td>
                            <td>
                                <textarea name="txt_anamase" rows="3" cols="50" placeholder="Isi Disini..."><?php echo $output['anamase']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Diagnosis</td>
                            <td>:</td>
                            <td>
                                <textarea name="txt_diagnosis" rows="3" cols="50" placeholder="Isi Disini..."><?php echo $output['diagnosis']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Status Pasien</td>
                            <td>:</td>
                            <td>
                                <select name="txt_status_pasien" rows="3" cols="50">
                                    <option value='' selected> </option>
                                    <?php
                                    if ($output['status_pasien'] == 'SEMBUH') {
                                    ?>
                                        <option value='SEMBUH' selected> SEMBUH</option>
                                        <option value='PROSES PERAWATAN'> PROSES PERAWATAN</option>
                                    <?php
                                    } else if ($output['status_pasien'] == 'PROSES PERAWATAN') {
                                    ?>
                                        <option value='SEMBUH'> SEMBUH</option>
                                        <option value='PROSES PERAWATAN' selected> PROSES PERAWATAN</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>:</td>
                            <td><input type="submit" style='background-color:green;color:white;width:50%;display:inline;' name="button" id="button" value=" EDIT">
                                <a class="btn2" style='background-color:red;color:white;display:inline;' href="<?php echo base_url(); ?>perawatan/"> Kembali </a></td>
                        </tr>
                    </table>
                <?php } ?>
            </form>
            <br><br><i>Aplikasi Datapasien Prepered By Kelompok 2 &copy; Praktikum web 2 @ 2020</i>
            <br>
            <br>
        </div>
    </div>
    <script>
        let kelas = null;
        const data_dokt = {
            <?php
            foreach ($datacurrent as $output) {
                echo "obj$output[id_rawat_inap] : '$output[dokter_penanggungjawab]',";
            }
            ?>
        }
        const data_kelas = {
            <?php
            foreach ($datacurrent as $output) {
                echo "obj$output[id_rawat_inap] : '$output[kelas_rawat_inap]',";
            }
            ?>
        }
        const clear = () => {
            let c0 = document.getElementById('stat1');
            c0.removeAttribute('checked');
            let c2 = document.getElementById('stat2');
            c2.removeAttribute('checked');
            let c3 = document.getElementById('stat3');
            c3.removeAttribute('checked');
        }
        const dokter = () => {
            let id = document.getElementById('txt_spesialis').value;
            let key = "obj" + id;
            console.log(data_dokt[key]);
            console.log(data_kelas[key]);
            if (data_kelas[key] === 'Kelas 1') {
                kelas = '0';
            } else if (data_kelas[key] === 'Kelas 2') {
                kelas = '1';
            } else if (data_kelas[key] === 'Kelas 3') {
                kelas = '2';
            }
            console.log(kelas);
            //clearence
            clear();

            let tujuan = document.getElementById('txt_dokter').value = data_dokt[key];
            let tujuan2 = document.getElementsByName('txt_status')[kelas];
            var c = document.createAttribute("checked");
            tujuan2.setAttributeNode(c);
        }
        dokter();
    </script>
</body>

</html>