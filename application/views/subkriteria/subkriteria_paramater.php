
         <?php
            if (!empty($utama)) {  
                foreach($utama as $rutama) {  
                    if($rutama->id_kriteria==$kriteria) {
        ?>
            <h3 style="margin-top:0px"><b>Daftar Sub-Kriteria: <?php echo $rutama->nama_kriteria;?></b></h3>
        <?php
            }}}
        ?>

        <br>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('subkriteria/create?kriteria='.$kriteria),'<i class="entypo-plus"></i><span> Tambah Sub-Kriteria</span>', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('subkriteria/parameter'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('subkriteria/parameter?kriteria='.$kriteria); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
            <br><br>
            <div class="col-md-12 text-center"  style="margin-top: 12px">
                <div id="message">
                    <?php 
                    if ($this->session->flashdata('gagal')) {
                        echo  "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>".$this->session->flashdata('gagal')."</div>";
                    }else if($this->session->flashdata('sukses')){
                        echo  "<div class='alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>".$this->session->flashdata('sukses')."</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="table-responsive">     
       
       <!-- PEKERJAAN -->
        <?php 
        if (!empty($utama)) {  
            foreach($utama as $rutama) {  
                if($rutama->id_kriteria==$kriteria) {
                    if($rutama->nama_kriteria=='pekerjaan' || $rutama->nama_kriteria=='Pekerjaan') {
        ?>   
            <table class="table" style="margin-bottom: 10px">
            <thead>
                <tr>
                    <th width="5%"><b>No</b></th>
                    <th><b>Nama Sub-Kriteria</b></th>
                    <th width="23%"><center><b>Aksi</b></center></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($record)) {   
                foreach ($record as $subkriteria)
                {
                $link=str_replace("?","&",$kriteriaa);
                ?>
                <tr>
                    <td width="80px"><?php echo ++$start; ?></td>
                    <td><?php echo $subkriteria->nama_subkriteria; ?></td>
                    <td style="text-align:center" width="200px">
                        <?php 
                        echo anchor(site_url('subkriteria/update_action'.'?id='.$subkriteria->id_subkriteria.$link),'<i class="entypo-pencil"></i>
                        <span>Edit</span>', array('class'=>'btn btn-default btn-sm'));  
                        echo ' | '; 
                        echo anchor(site_url('subkriteria/delete/'.$subkriteria->id_subkriteria),'<i class="entypo-trash"></i>
                        <span>Hapus</span>',array('class'=>'btn btn-danger btn-sm', 'onclick'=>'javasciprt: return confirm(\'Yakin Menghapus Parameter Subkriteria?\')'));
                        ?>
                    </td>
                </tr>
                <?php
                } } else{
                ?>
                <tr>
                    <td colspan="4" align="center"><strong>Tidak ada data</strong></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        
        <!-- PENGHASILAN -->
        <?php } elseif($rutama->nama_kriteria=='penghasilan' || $rutama->nama_kriteria=='Penghasilan') { ?>
            <table class="table" style="margin-bottom: 10px">
            <thead>
                <tr>
                    <th width="5%"><b>No</b></th>
                    <th><b>Nama Sub-Kriteria</b></th>
                    <th width="40%"><center><b>Aksi</b></center></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($record)) {   
                foreach ($record as $subkriteria)
                {
                $link=str_replace("?","&",$kriteriaa);
                ?>
                    <tr>
                        <td width="80px"><?php echo ++$start; ?></td>
                        <td>Rp. <?php echo $subkriteria->nilai_minimum; ?> - Rp. <?php echo $subkriteria->nilai_maksimum; ?></td>
                        <td style="text-align:center" width="200px">
                            <?php 
                            echo anchor(site_url('subkriteria/update_action'.'?id='.$subkriteria->id_subkriteria.$link),'<i class="entypo-pencil"></i>
                            <span>Edit</span>', array('class'=>'btn btn-default btn-sm'));  
                            echo ' | '; 
                            echo anchor(site_url('subkriteria/delete/'.$subkriteria->id_subkriteria),'<i class="entypo-trash"></i>
                            <span>Hapus</span>',array('class'=>'btn btn-danger btn-sm', 'onclick'=>'javasciprt: return confirm(\'Yakin Menghapus User?\')'));
                            ?>
                        </td>
                    </tr>
                <?php
                } } else{
                ?>
                <tr>
                    <td colspan="4" align="center"><strong>Tidak ada data</strong></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>

        <!-- USIA -->
        <?php } elseif($rutama->nama_kriteria=='usia' || $rutama->nama_kriteria=='Usia') { ?>
            <table class="table" style="margin-bottom: 10px">
            <thead>
                <tr>
                    <th width="5%"><b>No</b></th>
                    <th><b>Nama Sub-Kriteria</b></th>
                    <th width="40%"><center><b>Aksi</b></center></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($record)) {   
                foreach ($record as $subkriteria)
                {
                $link=str_replace("?","&",$kriteriaa);
                ?>
                    <tr>
                        <td width="80px"><?php echo ++$start; ?></td>
                        <td><?php echo $subkriteria->nama_subkriteria; ?> Tahun</td>
                        <td style="text-align:center" width="200px">
                            <?php 
                            echo anchor(site_url('subkriteria/update_action'.'?id='.$subkriteria->id_subkriteria.$link),'<i class="entypo-pencil"></i>
                            <span>Edit</span>', array('class'=>'btn btn-default btn-sm'));  
                            echo ' | '; 
                            echo anchor(site_url('subkriteria/delete/'.$subkriteria->id_subkriteria),'<i class="entypo-trash"></i>
                            <span>Hapus</span>',array('class'=>'btn btn-danger btn-sm', 'onclick'=>'javasciprt: return confirm(\'Yakin Menghapus User?\')'));
                            ?>
                        </td>
                    </tr>
                <?php
                } } else{
                ?>
                <tr>
                    <td colspan="4" align="center"><strong>Tidak ada data</strong></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>

        <!-- UANG MUKA -->
        <?php } elseif($rutama->nama_kriteria=='uang muka' || $rutama->nama_kriteria=='Uang Muka') { ?>
            <table class="table" style="margin-bottom: 10px">
            <thead>
                <tr>
                    <th width="5%"><b>No</b></th>
                    <th><b>Nama Sub-Kriteria</b></th>
                    <th width="40%"><center><b>Aksi</b></center></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($record)) {   
                foreach ($record as $subkriteria)
                {
                $link=str_replace("?","&",$kriteriaa);
                ?>
                    <tr>
                        <td width="80px"><?php echo ++$start; ?></td>
                        <td>Rp. <?php echo $subkriteria->nama_subkriteria; ?></td>
                        <td style="text-align:center" width="200px">
                            <?php 
                            echo anchor(site_url('subkriteria/update_action'.'?id='.$subkriteria->id_subkriteria.$link),'<i class="entypo-pencil"></i>
                            <span>Edit</span>', array('class'=>'btn btn-default btn-sm'));  
                            echo ' | '; 
                            echo anchor(site_url('subkriteria/delete/'.$subkriteria->id_subkriteria),'<i class="entypo-trash"></i>
                            <span>Hapus</span>',array('class'=>'btn btn-danger btn-sm', 'onclick'=>'javasciprt: return confirm(\'Yakin Menghapus User?\')'));
                            ?>
                        </td>
                    </tr>
                <?php
                } } else{
                ?>
                <tr>
                    <td colspan="4" align="center"><strong>Tidak ada data</strong></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>

        <!-- JANGKA WAKTU -->
        <?php } elseif($rutama->nama_kriteria=='jangka waktu' || $rutama->nama_kriteria=='Jangka Waktu') { ?>
            <table class="table" style="margin-bottom: 10px">
            <thead>
                <tr>
                    <th width="5%"><b>No</b></th>
                    <th><b>Nama Sub-Kriteria</b></th>
                    <th width="40%"><center><b>Aksi</b></center></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($record)) {   
                foreach ($record as $subkriteria)
                {
                $link=str_replace("?","&",$kriteriaa);
                ?>
                    <tr>
                        <td width="80px"><?php echo ++$start; ?></td>
                        <td><?php echo $subkriteria->nama_subkriteria; ?> Tahun</td>
                        <td style="text-align:center" width="200px">
                            <?php 
                            echo anchor(site_url('subkriteria/update_action'.'?id='.$subkriteria->id_subkriteria.$link),'<i class="entypo-pencil"></i>
                            <span>Edit</span>', array('class'=>'btn btn-default btn-sm'));  
                            echo ' | '; 
                            echo anchor(site_url('subkriteria/delete/'.$subkriteria->id_subkriteria),'<i class="entypo-trash"></i>
                            <span>Hapus</span>',array('class'=>'btn btn-danger btn-sm', 'onclick'=>'javasciprt: return confirm(\'Yakin Menghapus User?\')'));
                            ?>
                        </td>
                    </tr>
                <?php
                } } else{
                ?>
                <tr>
                    <td colspan="4" align="center"><strong>Tidak ada data</strong></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>

            <!-- Else -->
        <?php } else { ?>
            <table class="table" style="margin-bottom: 10px">
            <thead>
                <tr>
                    <th width="5%"><b>No</b></th>
                    <th><b>Nama Sub-Kriteria</b></th>
                    <th width="40%"><center><b>Aksi</b></center></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($record)) {   
                foreach ($record as $subkriteria)
                {
                $link=str_replace("?","&",$kriteriaa);
                ?>
                    <tr>
                        <td width="80px"><?php echo ++$start; ?></td>
                        <td><?php echo $subkriteria->nama_subkriteria; ?></td>
                        <td style="text-align:center" width="200px">
                            <?php 
                            echo anchor(site_url('subkriteria/update_action'.'?id='.$subkriteria->id_subkriteria.$link),'<i class="entypo-pencil"></i>
                            <span>Edit</span>', array('class'=>'btn btn-default btn-sm'));  
                            echo ' | '; 
                            echo anchor(site_url('subkriteria/delete/'.$subkriteria->id_subkriteria),'<i class="entypo-trash"></i>
                            <span>Hapus</span>',array('class'=>'btn btn-danger btn-sm', 'onclick'=>'javasciprt: return confirm(\'Yakin Menghapus User?\')'));
                            ?>
                        </td>
                    </tr>
                <?php
                } } else{
                ?>
                <tr>
                    <td colspan="4" align="center"><strong>Tidak ada data</strong></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        <?php }}}} ?>            
        
        </div>

        <div class="row">
            <div class="col-md-6">
	            <a href="<?php echo site_url('kriteria') ?>" class="btn btn-default">Kembali</a>
            </div>
            <div class="col-md-6 text-right">
               <!--  <?php echo $pagination ?> -->
            </div>
        </div>