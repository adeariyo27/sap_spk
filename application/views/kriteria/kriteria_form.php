
        <h2 style="margin-top:0px"><b><?php echo $button ?> Kriteria</b></h2>
        <br>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Kriteria</label>
            <input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria" value="<?php echo $nama_kriteria; ?>" />
                <?php if( form_error('nama_kriteria') == true ) : ?>
                    <div class="form-text text-danger"><b><?= form_error('nama_kriteria') ?></b></div> 
                <?php endif; ?>
        </div>
	    <input type="hidden" name="id_kriteria" value="<?php echo $id_kriteria; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kriteria') ?>" class="btn btn-default">Batal</a>
	</form>
