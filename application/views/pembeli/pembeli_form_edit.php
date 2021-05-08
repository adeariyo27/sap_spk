
        <h2 style="margin-top:0px"><b><?php echo $button ?> Calon Pembeli</b></h2>
        <br>
        <?php echo form_open_multipart($action); ?>
    	    <div class="form-group">
                <label for="nama_pembeli">Nama Pembeli</label>
                <input type="input-group minimal" class="form-control" autocomplete="off" name="nama_pembeli" id="nama_pembeli" value="<?php echo $nama_pembeli; ?>" />
                    <?php if( form_error('nama_pembeli') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('nama_pembeli') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="usia">Usia</label>
                <input type="number" class="form-control" autocomplete="off" name="usia" id="usia" value="<?php echo $usia; ?>" />
                    <?php if( form_error('usia') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('usia') ?></b></div> 
                    <?php endif; ?>
            </div>
          <div class="form-group">
                <label for="status">Status Pernikahan</label>
                <select class="form-control" autocomplete="off" name="status" id="status" >
                    <?php foreach( $status as $s ) : ?>
                        <?php if( $s == $statusdb) : ?>
                            <option value="<?php echo $s; ?>" selected><?php echo $s; ?></option>
                        <?php else : ?>
                            <option value="<?php echo $s; ?>"><?php echo $s; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                    <?php if( form_error('status') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('status') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" rows="3" name="alamat" id="alamat"><?php echo $alamat; ?></textarea>
                    <?php if( form_error('alamat') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('alamat') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <select class="form-control" autocomplete="off" name="pekerjaan" id="pekerjaan">
                    <?php foreach( $pekerjaan as $p ) : ?>
                        <?php if( $p == $pekerjaandb) : ?>
                            <option value="<?php echo $p; ?>" selected><?php echo $p; ?></option>
                        <?php else : ?>
                            <option value="<?php echo $p; ?>"><?php echo $p; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                    <?php if( form_error('pekerjaan') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('pekerjaan') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="penghasilan">Penghasilan</label>
                <input type="number" class="form-control" autocomplete="off" name="penghasilan" id="penghasilan" value="<?php echo $penghasilan; ?>" />
                    <?php if( form_error('penghasilan') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('penghasilan') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="riwayat_kredit">Riwayat Kredit</label>
                <select class="form-control" autocomplete="off" name="riwayat_kredit" id="riwayat_kredit">
                    <?php foreach( $riwayat_kredit as $rk ) : ?>
                        <?php if( $rk == $riwayat_kreditdb) : ?>
                            <option value="<?php echo $rk; ?>" selected><?php echo $rk; ?></option>
                        <?php else : ?>
                            <option value="<?php echo $rk; ?>"><?php echo $rk; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                    <?php if( form_error('riwayat_kredit') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('riwayat_kredit') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="uang_muka">Uang Muka</label>
                <select class="form-control" autocomplete="off" name="uang_muka" id="uang_muka">
                    <?php foreach( $uang_muka as $um ) : ?>
                        <?php if( $um == $uang_mukadb) : ?>
                            <option value="<?php echo $um; ?>" selected><?php echo $um; ?></option>
                        <?php else : ?>
                            <option value="<?php echo $um; ?>"><?php echo $um; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select> 
                    <?php if( form_error('uang_muka') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('uang_muka') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="jangka_waktu">Jangka Waktu Pembayaran</label>
                <select class="form-control" autocomplete="off" name="jangka_waktu" id="jangka_waktu">
                    <?php foreach( $jangka_waktu as $jw ) : ?>
                        <?php if( $jw == $jangka_waktudb) : ?>
                            <option value="<?php echo $jw; ?>" selected><?php echo $jw; ?></option>
                        <?php else : ?>
                            <option value="<?php echo $jw; ?>"><?php echo $jw; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                    <?php if( form_error('jangka_waktu') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('jangka_waktu') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="agama">Agama</label>
                <select class="form-control" autocomplete="off" name="agama" id="agama">
                    <?php foreach( $agama as $ag ) : ?>
                        <?php if( $ag == $agamadb) : ?>
                            <option value="<?php echo $ag; ?>" selected><?php echo $ag; ?></option>
                        <?php else : ?>
                            <option value="<?php echo $ag; ?>"><?php echo $ag; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                    <?php if( form_error('agama') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('agama') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="varchar">No. Handphone</label>
                <input type="text" class="form-control" name="no_telpon" id="no_telpon" value="<?php echo $no_telpon; ?>" />
                    <?php if( form_error('no_telpon') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('no_telpon') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="varchar"><h3><b>Upload File Calon Pembeli</b></h3></label>
            </div>

    	    <div class="form-group">
            <label for="varchar">Upload File Pas Foto 3x4  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
              <br><br>
              <?php echo anchor(site_url('uploads/pembeli/'.$pas_foto), '<i class="entypo-doc-text"></i><span> Preview Pas Foto</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
              <br>
              <input type="file" class="form-control" name="pas_foto" id="pas_foto" value="" />
              <?php if( form_error('pas_foto') == true ) : ?>
                <div class="form-text text-danger"><b><?= form_error('pas_foto') ?></b></div> 
              <?php endif; ?>
          </div>
            
    	    <div class="form-group">
            <label for="varchar">Upload File KTP  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <br><br>
            <?php echo anchor(site_url('uploads/pembeli/'.$ktp), '<i class="entypo-doc-text"></i><span> Preview KTP</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
            <br>
            <input type="file" class="form-control" name="ktp" id="ktp" value="" />
            <?php if( form_error('ktp') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('ktp') ?></b></div> 
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="varchar">Upload File KK  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <br><br>
            <?php echo anchor(site_url('uploads/pembeli/'.$kk), '<i class="entypo-doc-text"></i><span> Preview kk</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
            <br>
            <input type="file" class="form-control" name="kk" id="kk" value="" />
            <?php if( form_error('kk') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('kk') ?></b></div> 
            <?php endif; ?>
          </div>
        
          <div class="form-group">
            <label for="varchar">Upload File Surat Nikah  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <br>
            <medium><b>Isi Bila Status Pernikahan = Menikah</b></medium>
            <?php if(!empty($surat_nikah)) { ?>
            <br><br>
              <?php echo anchor(site_url('uploads/pembeli/'.$surat_nikah), '<i class="entypo-doc-text"></i><span> Preview Surat Nikah</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
            <?php } ?>
            <br>
            <input type="file" class="form-control" name="surat_nikah" id="surat_nikah" value="" />
            <?php if( form_error('surat_nikah') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('surat_nikah') ?></b></div> 
            <?php endif; ?>
          </div>
         
          <div class="form-group">
            <label for="varchar">Upload File Slip Gaji 3 Bulan Terakhir <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <br>
            <medium><b>Isi Bila Status Pekerjaan = PNS/Karyawan Swasta</b></medium>
            <?php if(!empty($slip_gaji)) { ?>
            <br><br>
              <?php echo anchor(site_url('uploads/pembeli/'.$slip_gaji), '<i class="entypo-doc-text"></i><span> Preview Slip Gaji 3 Bulan Terakhir</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
            <?php } ?>
            <br>
            <input type="file" class="form-control" name="slip_gaji" id="slip_gaji" value="" />
            <?php if( form_error('slip_gaji') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('slip_gaji') ?></b></div> 
            <?php endif; ?>
          </div>
          
          <div class="form-group">
            <label for="varchar">Upload File SK Terakhir  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <br>
            <medium><b>Isi Bila Status Pekerjaan = PNS</b></medium>
            <?php if(!empty($sk_terakhir)) { ?>
            <br><br>
              <?php echo anchor(site_url('uploads/pembeli/'.$sk_terakhir), '<i class="entypo-doc-text"></i><span> Preview SK Terakhir</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
            <?php } ?>
            <br>
            <input type="file" class="form-control" name="sk_terakhir" id="sk_terakhir" value="" />
            <?php if( form_error('sk_terakhir') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('sk_terakhir') ?></b></div> 
            <?php endif; ?>
          </div>
         
          <div class="form-group">
            <label for="varchar">Upload File Surat Keterangan Kerja  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <br>
            <medium><b>Isi Bila Status Pekerjaan = Karyawan Swasta</b></medium>
            <?php if(!empty($surat_ket_kerja)) { ?>
            <br><br>
              <?php echo anchor(site_url('uploads/pembeli/'.$surat_ket_kerja), '<i class="entypo-doc-text"></i><span> Preview Surat Keterangan Kerja</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
            <?php } ?>
            <br>
            <input type="file" class="form-control" name="surat_ket_kerja" id="surat_ket_kerja" value="" />
            <?php if( form_error('surat_ket_kerja') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('surat_ket_kerja') ?></b></div> 
            <?php endif; ?>
          </div>
          
          <div class="form-group">
            <label for="varchar">Upload File Surat Izin Usaha Perdagangan  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <br>
            <medium><b>Isi Bila Status Pekerjaan = Wiraswasta</b></medium>
            <?php if(!empty($siup)) { ?>
            <br><br>
              <?php echo anchor(site_url('uploads/pembeli/'.$siup), '<i class="entypo-doc-text"></i><span> Preview Surat Izin Usaha Perdagangan</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
            <?php } ?>
            <br>
            <input type="file" class="form-control" name="siup" id="siup" value="" />
            <?php if( form_error('siup') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('siup') ?></b></div> 
            <?php endif; ?>
          </div>
          
          <div class="form-group">
            <label for="varchar">Upload File Tanda Daftar Perusahaan  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <br>
            <medium><b>Isi Bila Status Pekerjaan = Wiraswasta</b></medium>
            <?php if(!empty($daftar_perusahaan)) { ?>
            <br><br>
              <?php echo anchor(site_url('uploads/pembeli/'.$daftar_perusahaan), '<i class="entypo-doc-text"></i><span> Preview Tanda Daftar Perusahaan</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
            <?php } ?>
            <br>
            <input type="file" class="form-control" name="daftar_perusahaan" id="daftar_perusahaan" value="" />
            <?php if( form_error('daftar_perusahaan') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('daftar_perusahaan') ?></b></div> 
            <?php endif; ?>
          </div>
          
          <div class="form-group">
            <label for="varchar">Upload File Surat Keterangan Domisili  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <br>
            <medium><b>Isi Bila Status Pekerjaan = Wiraswasta</b></medium>
            <?php if(!empty($surat_ket_dom)) { ?>
            <br><br>
              <?php echo anchor(site_url('uploads/pembeli/'.$surat_ket_dom), '<i class="entypo-doc-text"></i><span> Preview Surat Keterangan Domisili</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
            <?php } ?>
            <br>
            <input type="file" class="form-control" name="surat_ket_dom" id="surat_ket_dom" value="" />
            <?php if( form_error('surat_ket_dom') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('surat_ket_dom') ?></b></div> 
            <?php endif; ?>
          </div>
          
          <div class="form-group">
            <label for="varchar">Upload File Laporan Keuangan 3 Bulan Terakhir  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <br>
            <medium><b>Isi Bila Status Pekerjaan = Wiraswasta</b></medium>
            <?php if(!empty($laporan_keuangan)) { ?>
            <br><br>
              <?php echo anchor(site_url('uploads/pembeli/'.$laporan_keuangan), '<i class="entypo-doc-text"></i><span> Preview Laporan Keuangan 3 Bulan Terakhir</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
            <?php } ?>
            <br>
            <input type="file" class="form-control" name="laporan_keuangan" id="laporan_keuangan" value="" />
            <?php if( form_error('laporan_keuangan') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('laporan_keuangan') ?></b></div> 
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="varchar">Upload File NPWP  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <br><br>
            <?php echo anchor(site_url('uploads/pembeli/'.$npwp), '<i class="entypo-doc-text"></i><span> Preview NPWP</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
            <br>
            <input type="file" class="form-control" name="npwp" id="npwp" value="" />
            <?php if( form_error('npwp') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('npwp') ?></b></div> 
            <?php endif; ?>
          </div>
          
          <div class="form-group">
            <label for="varchar">Upload File Buku Tabungan  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <br><br>
            <?php echo anchor(site_url('uploads/pembeli/'.$buku_tabungan), '<i class="entypo-doc-text"></i><span> Preview Buku Tabungan</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
            <br>
            <input type="file" class="form-control" name="buku_tabungan" id="buku_tabungan" value="" />
            <?php if( form_error('buku_tabungan') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('buku_tabungan') ?></b></div> 
            <?php endif; ?>
          </div>
         
          <div class="form-group">
            <label for="varchar">Upload File Rekening Koran 3 Bulan Terakhir  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <br><br>
            <?php echo anchor(site_url('uploads/pembeli/'.$rekening_koran), '<i class="entypo-doc-text"></i><span> Preview Rekening Koran 3 Bulan Terakhir</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
            <br>
            <input type="file" class="form-control" name="rekening_koran" id="rekening_koran" value="" />
            <?php if( form_error('rekening_koran') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('rekening_koran') ?></b></div> 
            <?php endif; ?>
          </div>
          
          <div class="form-group">
            <label for="varchar">Upload File Surat Pernyataan  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <br><br>
            <?php echo anchor(site_url('uploads/pembeli/'.$surat_pernyataan), '<i class="entypo-doc-text"></i><span> Preview Surat Pernyataan</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
            <br>
            <input type="file" class="form-control" name="surat_pernyataan" id="surat_pernyataan" value="" />
            <?php if( form_error('surat_pernyataan') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('surat_pernyataan') ?></b></div> 
            <?php endif; ?>
          </div>

    	    <input type="hidden" name="id_pembeli" value="<?php echo $id_pembeli; ?>" /> 
    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    	    <a href="<?php echo site_url('pembeli') ?>" class="btn btn-default">Batal</a>
	   <?php echo  form_close(); ?>
