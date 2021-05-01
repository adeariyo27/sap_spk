
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
                <select class="form-control" autocomplete="off" name="status" id="status" value="<?php echo $status; ?>">
                    <option>---</option>
                    <option>II/c</option>
                    <option>II/d</option>
                    <option>III/a</option>
                    <option>III/b</option>
                    <option>III/c</option>
                    <option>III/d</option>
                    <option>IV/a</option>
                    <option>IV/b</option>
                    <option>IV/c</option>
                    <option>IV/d</option>
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
                <input type="input-group minimal" class="form-control" autocomplete="off" name="pekerjaan" id="pekerjaan" value="<?php echo $pekerjaan; ?>" />
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
                <input type="input-group minimal" class="form-control" autocomplete="off" name="riwayat_kredit" id="riwayat_kredit" value="<?php echo $riwayat_kredit; ?>" />
                    <?php if( form_error('riwayat_kredit') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('riwayat_kredit') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="uang_muka">Uang Muka</label>
                <input type="input-group minimal" class="form-control" autocomplete="off" name="uang_muka" id="uang_muka" value="<?php echo $uang_muka; ?>" />
                    <?php if( form_error('uang_muka') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('uang_muka') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="jangka_waktu">Jangka Waktu Pembayaran</label>
                <input type="input-group minimal" class="form-control" autocomplete="off" name="jangka_waktu" id="jangka_waktu" value="<?php echo $jangka_waktu; ?>" />
                    <?php if( form_error('jangka_waktu') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('jangka_waktu') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="agama">Agama</label>
                <input type="input-group minimal" class="form-control" autocomplete="off" name="agama" id="agama" value="<?php echo $agama; ?>" />
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
                <label for="varchar">Upload KTP  <small>(<i>File PDF | Max Size : 1MB</i>)</small></label>
                <?php if($button == 'Edit') { ?>
                  <br><br>
                  <?php echo anchor(site_url('uploads/pembeli/'.$ktp), '<i class="entypo-doc-text"></i><span> Preview KTP</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
                  <br>
                  <input type="file" class="form-control" name="ktp" id="ktp" value="" />
                      <?php if( form_error('ktp') == true ) : ?>
                        <div class="form-text text-danger"><b><?= form_error('ktp') ?></b></div> 
                      <?php endif; ?>
                <?php } elseif ($button == 'Tambah Data') {?>
                  <input type="file" class="form-control" name="ktp" id="ktp" value="" />
                      <?php if( form_error('ktp') == true ) : ?>
                        <div class="form-text text-danger"><b><?= form_error('ktp') ?></b></div> 
                      <?php endif; ?>
                <?php } ?>
            </div>
    	    <input type="hidden" name="id_pembeli" value="<?php echo $id_pembeli; ?>" /> 
    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    	    <a href="<?php echo site_url('pembeli') ?>" class="btn btn-default">Batal</a>
	   <?php echo  form_close(); ?>
