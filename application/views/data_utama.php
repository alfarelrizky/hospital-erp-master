<html>
<head><title>Data user</title>
<!-- load Jquery --> 
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.4.1.js"></script>
<!-- load css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()."/style/desain.css"?>">
</head>
<body>

<h1>10 User Terbaru</h1>
<!-- FIELD UNTUK MEMASUKAN KATA KUNCI -->
<input type="text" id="keyword" placeholder="Masukan nama atau username" size="30">
<!-- button / link menu pada header -->
<a id="reset" class="btn2" href="<?php echo base_url(); ?>user_aplikasi/data_user">Reset</a>
<a id="reset" class="btn2" href="<?php echo base_url(); ?>user_aplikasi/tambah_user">Add User</a>
<a id="reset" class="btn2" href="<?php echo base_url(); ?>Homepage">Homepage</a>
<br><br>

<!-- DIV UNTUK MENAMPILKAN LIST USER-->
<div id="view">
<!-- untuk di load pertama kali, hasil lemparan dari function data_user dari controller  -->
	<?php $this->load->view('list_datauser',$data_user);?>  
    <!-- setelah Ajax Dijalankan, isinya akan diganti dengan isi hasil pencarian -->
</div>

<script>
  // Menetukan event keyup : 
  // ketika user mengetik kata kunci, secara otomatis akan memanggil function Jquery caridata
  $("#keyword").keyup(function(){ 
    // memanggil function ajax
   	 caridata();
   });    
  //Logic Jquery dan Ajax Utama 
  function caridata() {
    //menampung nilai input dari text keyword
    var kunci = $("#keyword").val();
    
    $.ajax({
      url: "<?php echo base_url();?>user_aplikasi/search_user", // controller tujuan
      type: 'POST', 
      data: {keyword: kunci}, // memasukan data kedalam ajax post 
      success: function(response){ 
        // jika berhasil request, balikan controller dimasukan dalam variabel response         
        // Ganti isi dari div view dengan view yang diambil dari controller 
        $("#view").html(response);
      },
      error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
        alert(xhr.responseText); // munculkan alert
      } // tutup error request
    }); // tutup ajax

  } // tutup function jquery caridata()
</script>

</body>
</html>
