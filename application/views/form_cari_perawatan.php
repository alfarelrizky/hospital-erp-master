<div class="gp_btn">
<ul>
     <!-- FORM PENCARIAN -->
     <li>
          <form action="<?php echo base_url()."perawatan/cari"?>" method="post">
               <input type="text" name="txt_katakunci" 
                      placeholder="Masukan kata kunci dan pilih kriteria pencarian ..." size="30" required>
               <select name="txt_kriteria" required> 
                 <option value="id_perawatan">ID Perawatan</option>
                 <option value="id_rawat_inap">ID Rawat Inap</option>
                 <option value="nama_dokter">Nama Dokter</option>
                 <option value="tanggal_periksa">Tanggal Periksa</option>
                 <option value="tindakan">Tindakan</option>
                 <option value="obat">Obat</option>
                 <option value="anamase">Anamase</option>
                 <option value="diagnosis">Diagnosis</option>
                 <option value="status_pasien">Status Pasien</option>
               </select>

            <input type="submit" name="search" value="CARI">
         </form>
     </li>

     <!-- LIST MENU -->
     <li><a class="btn2" href="<?php echo base_url(); ?>laporan/export_excel_data_perawatan">Export Excel</a></li>
     <li><a class="btn2" href="<?php echo base_url(); ?>laporan/export_pdf_data_perawatan">Export PDF</a></li>
</ul>
</div>