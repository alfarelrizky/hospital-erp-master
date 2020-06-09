<div class="gp_btn">
<ul>
     <!-- FORM PENCARIAN -->
     <li>
          <form action="<?php echo base_url()."dokter/cari"?>" method="post">
               <input type="text" name="txt_katakunci" 
                      placeholder="Masukan kata kunci dan pilih kriteria pencarian ..." size="30" required>
               <select name="txt_kriteria" required> 
                 <option value="nama_dokter">Nama Dokter</option>
                 <option value="no_tlp">No Tlp</option>
                 <option value="email">email</option>
                 <option value="alamat">alamat</option>
               </select>

            <input type="submit" name="search" value="CARI">
         </form>
     </li>

     <!-- LIST MENU -->
     <li><a class="btn2" href="<?php echo base_url(); ?>dokter/data_dokter">Reload Data Dokter</a></li>
     <li><a class="btn2" href="<?php echo base_url(); ?>dokter/registrasi_dokter">Registrasi Dokter</a></li>
     <li><a class="btn2" href="<?php echo base_url(); ?>laporan/export_excel_data_dokter">Export Excel</a></li>
     <li><a class="btn2" href="<?php echo base_url(); ?>laporan/export_pdf_data_dokter">Export PDF</a></li>
</ul>
</div>
