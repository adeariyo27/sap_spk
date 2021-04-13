
        <h2 style="margin-top:0px"><?php echo $button ?> Calon Pembeli</h2>
        <br>
        <?php echo form_open_multipart($action); ?>
    	    <div class="form-group">
                <label for="varchar">Nama Pembeli</label>
                <input type="input-group minimal" class="form-control" name="nama_pembeli" id="nama_pembeli" value="<?php echo $nama_pembeli; ?>" />
                    <?php if( form_error('nama_pembeli') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('nama_pembeli') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="varchar">Nama Kepsek</label>
                <input type="text" class="form-control" name="nama_kepsek" id="nama_kepsek" value="<?php echo $nama_kepsek; ?>" />
                    <?php if( form_error('nama_kepsek') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('nama_kepsek') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="alamat_pembeli">Alamat Pembeli</label>
                <textarea class="form-control" rows="3" name="alamat_pembeli" id="alamat_pembeli"><?php echo $alamat_pembeli; ?></textarea>
                    <?php if( form_error('alamat_pembeli') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('alamat_pembeli') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="visi">Visi</label>
                <textarea class="form-control" rows="3" name="visi" id="visi"><?php echo $visi; ?></textarea>
                    <?php if( form_error('visi') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('visi') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="misi">Misi</label>

                <textarea class="form-control" rows="3" name="misi" id="misi"><?php echo $misi; ?></textarea>
                    <?php if( form_error('misi') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('misi') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="varchar">No Telpon</label>
                <input type="text" class="form-control" name="no_telpon" id="no_telpon" value="<?php echo $no_telpon; ?>" />
                    <?php if( form_error('no_telpon') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('no_telpon') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <div class="form-group">
                <label for="varchar">Upload KTP</label>
                <input type="file" class="form-control" name="ktp" id="ktp" value="" />
                    <?php if( form_error('ktp') == true ) : ?>
                      <div class="form-text text-danger"><b><?= form_error('ktp') ?></b></div> 
                    <?php endif; ?>
            </div>
    	    <input type="hidden" name="id_pembeli" value="<?php echo $id_pembeli; ?>" /> 
    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    	    <a href="<?php echo site_url('pembeli') ?>" class="btn btn-default">Batal</a>
	   <?php echo  form_close(); ?>
