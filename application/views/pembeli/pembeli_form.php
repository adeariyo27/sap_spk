
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
                      <option value="<?php echo $s; ?>"><?php echo $s; ?></option>
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
                        <option value="<?php echo $p; ?>"><?php echo $p; ?></option>
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
                        <option value="<?php echo $rk; ?>"><?php echo $rk; ?></option>
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
                        <option value="<?php echo $um; ?>"><?php echo $um; ?></option>
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
                        <option value="<?php echo $jw; ?>"><?php echo $jw; ?></option>
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
                        <option value="<?php echo $ag; ?>"><?php echo $ag; ?></option>
                    <?php endforeach; ?>
                </select>
                    <?php if( form_error('agama') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('agama') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="no_telpon">No. Handphone</label>
                <input type="text" class="form-control" name="no_telpon" id="no_telpon" value="<?php echo $no_telpon; ?>" />
                    <?php if( form_error('no_telpon') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('no_telpon') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="uploadfile"><h3><b>Upload File Calon Pembeli</b></h3></label>
            </div>

    	    <div class="form-group">
              <label for="pas_foto">Upload File Pas Foto 3x4  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
              <input type="file" class="form-control" name="pas_foto" id="pas_foto"/>
              <?php if( form_error('pas_foto') == true ) : ?>
                <div class="form-text text-danger"><b><?= form_error('pas_foto') ?></b></div> 
              <?php endif; ?>
          </div>
            
    	    <div class="form-group">
            <label for="ktp">Upload File KTP  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <input type="file" class="form-control" name="ktp" id="ktp" />
            <?php if( form_error('ktp') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('ktp') ?></b></div> 
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="kk">Upload File Kartu Keluarga  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <input type="file" class="form-control" name="kk" id="kk" />
            <?php if( form_error('kk') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('kk') ?></b></div> 
            <?php endif; ?>
          </div>
          
          <div class="form-group">
            <label for="surat_nikah">Surat Nikah  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <br>
            <medium><b>Isi Bila Status Pernikahan = Menikah</b></medium>
            <input type="file" class="form-control" name="surat_nikah" id="surat_nikah" />
            <?php if( form_error('surat_nikah') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('surat_nikah') ?></b></div> 
            <?php endif; ?>
          </div>
          
          <div class="form-group">
            <label for="slip_gaji">Surat Nikah  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
            <br>
            <medium><b>Isi Bila Status Pekerjaan = PNS/Karyawan Swasta</b></medium>
            <input type="file" class="form-control" name="slip_gaji" id="slip_gaji" />
            <?php if( form_error('slip_gaji') == true ) : ?>
              <div class="form-text text-danger"><b><?= form_error('slip_gaji') ?></b></div> 
            <?php endif; ?>
          </div>

    	    <input type="hidden" name="id_pembeli" value="<?php echo $id_pembeli; ?>" /> 
    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    	    <a href="<?php echo site_url('pembeli') ?>" class="btn btn-default">Batal</a>
	   <?php echo  form_close(); ?>
