<?php
$datacurrent = $this->Model_rawat->select_tbl_dokter()->result_array();
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
    <title> Rawat Inap </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "/style/desain.css" ?>">
</head>

<body>
    <div id="container">
        <div id="body">
            <h1>Edit Data Rawat Inap.</h1>
            <?php if (validation_errors()) { ?> <div style="width:500px; background-color:#FCC; padding:5px; 
               margin-left:auto; margin-right:auto;">
                    <?php echo validation_errors(); ?> <br>
                </div>
            <?php } ?>
            <form name="form1" method="post" action="<?php echo base_url() ?>perawatan/act_edit">
                <?php
                foreach ($data as $output) { ?>
                    <table id="gp_tabel" width="50%" style='box-shadow: -3px 3px #b5adad;' align='center'>
                        <th colspan="3"> FORM EDIT DATA RAWAT INAP </th>
                        <tr>
                            <input type="hidden" name="id" value='<?php echo $output['id_rawat_inap']; ?>'>
                            <td>ID / No.RM Pasien</td>
                            <td width="10">:</td>
                            <td><select onchange='dokter()' name='txt_id' id='txt_spesialis'>
                                    <?php
                                    echo "<option value='' disabled selected>No.RM Pasien</option>";
                                    echo "<option value='" . $output['id_rekam_medis'] . "' selected>" . $output['id_rekam_medis'] . "</option>";
                                    foreach ($datacurrent as $hasil) {
                                        if ($hasil['id_dokter'] != $output['id_rekam_medis']) {
                                            echo "<option value='" . $hasil['id_dokter'] . "'>" . $hasil['id_dokter'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Input Dokter PJ</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="txt_dokter" value='<?php echo $output['dokter_penanggungjawab']; ?>' id='txt_dokter' readonly>
                            </td>
                        </tr>

                        <tr>
                            <td>Pilih Kelas </td>
                            <td>:</td>
                            <td>
                                <?php
                                if ($output['kelas_rawat_inap'] == 'Kelas 1') {
                                ?>
                                    <input type="radio" name="txt_status" value="Kelas 1" checked> Kelas 1
                                    <input type="radio" name="txt_status" value="Kelas 2"> Kelas 2
                                    <input type="radio" name="txt_status" value="Kelas 3"> Kelas 3
                                <?php
                                } else if ($output['kelas_rawat_inap'] == 'Kelas 2') {
                                ?>
                                    <input type="radio" name="txt_status" value="Kelas 1"> Kelas 1
                                    <input type="radio" name="txt_status" value="Kelas 2" checked> Kelas 2
                                    <input type="radio" name="txt_status" value="Kelas 3"> Kelas 3
                                <?php
                                } else if ($output['kelas_rawat_inap'] == 'Kelas 3') {
                                ?>
                                    <input type="radio" name="txt_status" value="Kelas 1"> Kelas 1
                                    <input type="radio" name="txt_status" value="Kelas 2"> Kelas 2
                                    <input type="radio" name="txt_status" value="Kelas 3" checked> Kelas 3
                                <?php
                                } else {
                                ?>
                                    <input type="radio" name="txt_status" value="Kelas 1"> Kelas 1
                                    <input type="radio" name="txt_status" value="Kelas 2"> Kelas 2
                                    <input type="radio" name="txt_status" value="Kelas 3"> Kelas 3
                                <?php
                                }
                                ?>
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
        const data = {
            <?php
            foreach ($datacurrent as $output) {
                echo "obj$output[id_dokter] : '$output[nama_dokter]',";
            }
            ?>
        }
        const dokter = () => {
            let id = document.getElementById('txt_spesialis').value;
            let key = "obj" + id;
            console.log(data[key]);
            let tujuan = document.getElementById('txt_dokter').value = data[key];
        }
    </script>
</body>

</html>