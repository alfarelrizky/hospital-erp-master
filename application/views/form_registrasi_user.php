<html>
  <head><title> Registrasi User </title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()."/style/desain.css"?>">
        <script src="<?php echo base_url(); ?>assets/jquery/jquery-3.4.1.js"></script>
  </head>
  <body>
    <div id="container">
      <div id="body">
        <h2 align="center"><u>FORM REGISTRASI USER</u></h2><br>
        <div id="pesan_validasi" style="width:500px; background-color:#FCC; padding:5px; 
             margin-left:auto; margin-right:auto; display: none; ">
        </div>
       <form id='register_user'>
       <table id="gp_tabel" width="35%" align="center">
       <th colspan="3">  Silahkan masukan data user  </th>
         <tr><td width="40%">Nama user </td>
             <td width="1%">:</td>
             <td width="59%"><input type="text" name="txt_nama" id="txt_nama" size="20"></td>
         </tr>
         <tr><td width="40%" height="28">Username </td>
             <td width="1%">:</td>
             <td width="59%"><input type="text" name="txt_username" id="txt_username" size="13">
             <img src="<?php echo base_url(); ?>style/images/refresh.png" alt="icon refresh" width="30" class="img3" id="load_username" align="absmiddle"></td>
             
         </tr>
         <tr><td width="40%" height="28">Level Akses </td>
             <td width="1%">:</td>
             <td width="59%">
                 <select name="opt_role_askes" id="option_akses">
                        <option value='' disabled selected>-- Level Askes --</option>
                        <option value="1">Admin User</option>
                        <option value="2">Admin MR</option>
                        <option value="3">Dokter</option>
                        <option value="4">Pendaftaran</option>
                      </select>
                      </td>
         </tr>
         <tr><td width="40%">No. Hp </td>
             <td width="1%">:</td>
             <td width="59%"><input type="text" name="txt_no_hp" id="txt_no_hp" size="20"></td>
         </tr>
                                                               <!-- script dilanjut ke halaman berikutnya -->
         

         <tr> <td width="40%">Email </td>
              <td width="1%">:</td>
              <td width="59%"><input type="text" name="txt_email" id="txt_email" size="20"></td>
         </tr>
         <tr> <td width="40%">Password</td>
              <td width="1%">:</td>
              <td width="59%"><input type="password" name="txt_password" 
                               id="txt_ password" size="20"></td>
         </tr>
         <tr><td width="40%">Konfirmasi Password </td>
             <td width="1%">:</td>
             <td><input type="password" name="txt_konfirm_password" 
                  id="txt_konfirm_password" size="20" ></td>
         </tr>
         <tr> <td>&nbsp;</td>
              <td>:</td>
              <td><input type="submit" name="button" class="btn2" value= " DAFTARKAN  "> || 
                  <a class="btn2" href="<?php echo base_url(); ?>user_aplikasi/data_user">  
                  BATAL  </a></td>
        </tr>
       </table>
      </form>
       <br><br><br>
      </div>
    </div>
    <script>
      $('#register_user').submit(function(e){
      e.preventDefault();
      var data_input = $('#register_user').serialize();
      $.ajax({  type: 'POST',
                data: data_input,       
                url : "<?php echo base_url();?>user_aplikasi/proses_simpan",
                success:function(data){
                  // memecah respon dari controller
                  var status_validasi = data.substring(0,7);
                  var message  = data.substring(7);      //SCRIPT DILANJUT KE HALAMAN BERIKUTNYA
                 if (status_validasi == "INVALID") {
                    //tampilkan pesan pada div #pesan_validasi
                    $('#pesan_validasi').html(message).show();
                  } // tutup case validasi INVALID

                  else if (status_validasi == "VALID") {
                    //tampilkan noticed sukses
                    alert('USER BERHASIL DI DAFTARKAN .. ');
                    //rediect ke halaman lain
                    window.location = "<?php echo base_url();?>user_aplikasi/data_user";
                  } // tutup case validasi VALID

                } // tutup data response
            }); // tutup ajax
       }); // tutup JQUERY

       // generate username automatis
       $('#load_username').click(function(){
       //alert('hello');
       loadusername();
       });

       $('#option_akses').change(function(){
      //  alert('hello');
       loadusername();
       });
       
       function loadusername() {
         var kodelevel =  $('#option_akses').val();
         if (kodelevel == null){
           alert("silahkan pilih opsi!");
         }else if (kodelevel == '1' ){
          isi = "ADUSR";
         }else if (kodelevel == '2' ){
          isi = "ADMR";
         }else if (kodelevel == '3' ){
          isi = "DR";
         }else if (kodelevel == '4' ){
            isi = "REG";
        }

        $.ajax({
          url : "<?php echo base_url(); ?>user_aplikasi/count_user",
          type: 'POST',
          data: {role: kodelevel},
          success: function(response){
            var username = isi + response;
            $('#txt_username').val(username);
          },
          error: function(xhr, ajaxOption, thrownError){
            alert(xhr.responseText);
          }

        });
       }
    </script>
 </body>
 </html>
