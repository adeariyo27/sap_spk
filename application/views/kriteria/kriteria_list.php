
        <h3 style="margin-top:0px"><b>Daftar Kriteria Kelayakan Pembeli</b></h3>
        <br>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('kriteria/create'),'<i class="entypo-plus"></i><span> Tambah Kriteria</span>', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('kriteria/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" autocomplete="off" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('kriteria'); ?>" class="btn btn-default">Reset</a>
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
            <table class="table" style="margin-bottom: 10px">
                <thead>
                    <tr>
                        <th width="3.5%"><b>No</b></th>
                        <th><b>Nama Kriteria</b></th>
                        <th width="23%"><center><b>Aksi</b></center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($kriteria_data)) {   
                    foreach ($kriteria_data as $kriteria)
                    {
                    ?>
                    <tr>
                        <td width="3.5%"><?php echo ++$start ?></td>
                        <td><?php echo $kriteria->nama_kriteria ?></td>
                        <td style="text-align:center" width="30%">
                            <?php 
                            echo anchor(site_url('Subkriteria/parameter?kriteria='.$kriteria->id_kriteria),'<i class="entypo-list"></i>
                            <span>Sub-Kriteria</span>', array('class'=>'btn btn-primary btn-sm')); 
                            echo ' | '; 
                            echo anchor(site_url('kriteria/update/'.$kriteria->id_kriteria),'<i class="entypo-pencil"></i>
                            <span>Edit</span>', array('class'=>'btn btn-default btn-sm'));  
                            echo ' | '; 
                            echo anchor(site_url('kriteria/delete/'.$kriteria->id_kriteria),'<i class="entypo-trash"></i>
                            <span>Hapus</span>',array('class'=>'btn btn-danger btn-sm', 'onclick'=>'javasciprt: return confirm(\'Yakin Menghapus User?\')'));
                            ?>
                        </td>
                    </tr>
                    <?php } } else { ?>
                    <tr>
                        <td colspan="4" align="center"><strong>Tidak ada data</strong></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Jumlah Kriteria : <?php echo $total_rows ?></a>
             </div>
            <div class="col-md-6 text-right">
            <?= $this->pagination->create_links(); ?>
            </div>
        </div>
