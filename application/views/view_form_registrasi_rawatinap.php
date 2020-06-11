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
            <h1>Pendaftaran Rawat Inap</h1>
            <?php if (validation_errors()) { ?> <div style="width:500px; background-color:#FCC; padding:5px; 
               margin-left:auto; margin-right:auto;">
                    <?php echo validation_errors(); ?> <br>
                </div>
            <?php } ?>
            <form name="form1" method="post" action="<?php echo base_url() ?>Rawat_inap/proses_daftar_rawat_inap">
                <table id="gp_tabel" width="50%" style='box-shadow: -3px 3px #b5adad;' align='center'>
                    <?php
                    if (empty($this->session->flashdata('alert'))) {
                    } else {
                    ?>
                        <div align='center' style='background-color: #68ff7e;width: 90%;color: black;padding: 10px;display: block;margin-bottom: 5px;box-shadow: -2px 1px 5px black;'>
                            <b>
                                <?php echo $this->session->flashdata('alert'); ?>
                            </b>
                        </div>
                    <?php
                    }
                    ?>
                    <th colspan="3"> FORM RAWAT INAP </th>
                    <tr>
                        <td>ID / No.RM Pasien</td>
                        <td width="10">:</td>
                        <td>
                        <input type="text" name="txt_id_rmpasien" id="txt_id_rmpasien">


                        <!-- <select onchange='dokter()' name='txt_id_rawatinap' id='txt_id_rawatinap'>
                            <?php
                            // menampilkan option list dari database
                            /*echo "  <option value='' disabled selected>No.RM Pasien</option>";
                            foreach ($spesialis as $row_spesialis) {
                                echo " <option value='" . $row_spesialis[id_dokter] . "'>" . $row_spesialis[id_dokter] . "</option>";
                            }*/
                            ?>
                        </select> -->
                        </td>

                    </tr>
                    <tr>
                        <td>Input Dokter PJ</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="txt_dokter_pj" id='txt_dokter_pj'>
                        </td>
                    </tr>

                    <tr>
                        <td>Pilih Kelas </td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="txt_kelas" value="Kelas 1"> Kelas 1
                            <input type="radio" name="txt_kelas" value="Kelas 2"> Kelas 2
                            <input type="radio" name="txt_kelas" value="Kelas 3"> Kelas 3
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>:</td>
                        <td><input type="submit" style='box-shadow: -1px 1px black;background-color:green;color:white;width:50%;display:inline;' name="button" id="button" value=" PROSES">
                            <a class="btn2" style='box-shadow: -1px 1px black;background-color:red;color:white;display:inline;' href="<?php echo base_url(); ?>homepage/"> Kembali </a></td>
                    </tr>
                </table>
            </form>
            <br><br><i>Aplikasi Datapasien Prepered By Kelompok 2 &copy; Praktikum web 2 @ 2020</i>
            <br>
            <br>
        </div>
    </div>
    <script>
        const data = {
            <?php
            foreach ($spesialis as $output) {
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