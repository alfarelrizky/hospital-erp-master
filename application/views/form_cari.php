<div class="gp_btn">
<ul>
     <!-- FORM PENCARIAN -->
     <li>
          <form action="<?php echo base_url()."pasien/cari"?>" method="post">
               <input type="text" name="txt_katakunci" 
                      placeholder="Masukan kata kunci dan pilih kriteria pencarian ..." size="30" required>
               <select name="txt_kriteria" required> 
                 <option value="nama_pasien">Nama pasien</option>
                 <option value="tgl_lahir">Tanggal lahir</option>
                 <option value="no_tlp">No Tlp</option>
                 <option value="no_rekam_medis">Nomor RM</option>
                 <option value="alamat">alamat</option>
               </select>

            <input type="submit" name="search" value="CARI">
         </form>
     </li>

     <!-- LIST MENU -->
     <li><a class="btn2" href="<?php echo base_url(); ?>pasien/data_pasien">Reload Data </a></li>
     <li><a class="btn2" href="<?php echo base_url(); ?>pasien/registrasi_pasien">Registrasi Pasien</a></li>
</ul>
</div>
