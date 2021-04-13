
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('kriteria/create'),'<i class="entypo-plus"></i><span> Tambah Kriteria</span>', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('kriteria/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
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
        </div>
        <div class="table-responsive">        
            <table class="table table-bordered" style="margin-bottom: 10px">
                <thead>
                    <tr>
                        <th>No</th>
                        <th wi>Nama Kriteria</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($kriteria_data as $kriteria)
                    {
                    ?>
                    <tr>
                        <td width="3%"><?php echo ++$start ?></td>
                        <td><?php echo $kriteria->nama_kriteria ?></td>
                        <td style="text-align:center" width="23%">
                            <?php 
                            echo anchor(site_url('Subkriteria/parameter?kriteria='.$kriteria->id_kriteria),'<i class="entypo-menu"></i>
                            <span>Parameter</span>', array('class'=>'btn btn-primary btn-sm')); 
                            echo ' | '; 
                            echo anchor(site_url('kriteria/update/'.$kriteria->id_kriteria),'<i class="entypo-pencil"></i>
                            <span>Edit</span>', array('class'=>'btn btn-default btn-sm'));  
                            echo ' | '; 
                            echo anchor(site_url('kriteria/delete/'.$kriteria->id_kriteria),'<i class="entypo-trash"></i>
                            <span>Hapus</span>',array('class'=>'btn btn-danger btn-sm', 'onclick'=>'javasciprt: return confirm(\'Yakin Menghapus User?\')'));; 
                            ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Jumlah Kriteria: <?php echo $total_rows ?></a>
             </div>
            <div class="col-md-6 text-right">
            <?= $this->pagination->create_links(); ?>
            </div>
        </div>
