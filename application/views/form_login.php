<!--<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/images/icons/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/animsition/css/animsition.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/main.css">
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-form-title" style="background-image: url('assets/images/bg-01.jpg');">
          <span class="login100-form-title-1">
            RS SEHAT SENTOSA
          </span>
        </div>

        <form class="login100-form validate-form" action="<?php echo base_url()?>login/authentikasi_user" method="POST" class="registration_form">
          <div class='elements'>
            <div align='center'>
              <b><font color='#FF0000'><?php echo $this->session->flashdata('message');?> </font></b>
            </div>
          </div>
          <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Username</span>
            <input class="input100" type="text" id="txt_username" name="txt_username" required>
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
            <span class="label-input100">Password</span>
            <input class="input100" type="password" id="txt_password" name="txt_password" required>
            <span class="focus-input100"></span>
          </div>
         
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
              Login
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/animsition/js/animsition.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/popper.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/select2/select2.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/countdowntime/countdowntime.js"></script>
  <script src="<?php echo base_url() ?>assets/js/main.js"></script>

</body>
</html>-->

<html>
<head>
	<title>Login Form</title>  
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url()."/style/style_login.css"?>">
    </head>
<body>
<div id="containt" align="center">
<br /><br />
 <form action="<?php echo base_url()?>login/authentikasi_user" method="POST" class="registration_form">
 <fieldset>
 <table width="517">
 <td width="101"><img src="<?php echo base_url()?>/style/images/logo_klinik.png" width="70"  /></td>
 <td width="404"><h1> RS SEHAT SENTOSA </h1></td>
 </table>
    <p align="left"><strong>&nbsp;&nbsp;<br />
     &nbsp;&nbsp; Masukkan Username dan Password anda </strong></p>
    <div class='elements'>
      <div align='center'>
        <b><font color='#FF0000'><?php echo $this->session->flashdata('message');?> </font></b>
      </div>
    </div>
    <div class="elements">
      <label for="Email / Username"> 
       <div align="left">Email / Username </div> </label>
       <div align="left"> : <input id="txt_username" name="txt_username" size="30" required> </div>
    </div>
  <div class="elements">
     <label for="pass"> 
     <div align="left">Password</div>  </label>
     <div align="left">: <input id="txt_password" name="txt_password" size="30" type="password" required>    
     </div>
   </div>	
   <div class="elements">
      <label for="pass"> 
        <div align="left">&nbsp;</div>  </label>
	    <div align="left">&nbsp;&nbsp;<input type="submit" class="btn btn-primary" value="LOGIN"></div>
        </div>
    <center class="copy">
	  <p></p>
      <strong class="copy">Copyrighted &copy; 2020  | Pemrograman Web 2 - UMB </strong>
	</center>
  </fieldset>
  </form>
</div>
</body>
</html>
