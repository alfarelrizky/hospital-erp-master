<div class="gp_btn">
<ul>
     <!-- FORM PENCARIAN -->
     <li>
          <form action="<?php echo base_url()."rawat_inap/cari"?>" method="post">
               <input type="text" name="txt_katakunci" 
                      placeholder="Masukan kata kunci dan pilih kriteria pencarian ..." size="30" required>
               <select name="txt_kriteria" required> 
                 <option value="id_rawat_inap">ID Rawat Inap</option>
                 <option value="id_rekam_medis">ID Rekam Medis</option>
                 <option value="dokter_penanggungjawab">Dokter Penanggungjawab</option>
                 <option value="kelas_rawat_inap">Kelas Rawat Inap</option>
               </select>

            <input type="submit" name="search" value="CARI">
         </form>
     </li>

     <!-- LIST MENU -->
     <li><a class="btn2" href="<?php echo base_url(); ?>rawat_inap">Reload Data Rawat Inap</a></li>
     <li><a class="btn2" href="<?php echo base_url(); ?>rawat_inap/registrasi_rawatinap">Registrasi Rawat Inap</a></li>
     <li><a class="btn2" href="<?php echo base_url(); ?>laporan/export_excel_data_rawatinap">Export Excel</a></li>
     <li><a class="btn2" href="<?php echo base_url(); ?>laporan/export_pdf_data_rawatinap">Export PDF</a></li>
     <li><a class="btn2" href="<?php echo base_url(); ?>grafik/lihat_grafik">Lihat Grafik</a></li>
</ul>
</div>
