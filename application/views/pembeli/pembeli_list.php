
        <h2 style="margin-top:0px">Daftar Calon Pembeli</h2>
        <br>
        <div class="row" style="margin-bottom: 2px">
            <div class="col-md-4">
                <?php echo anchor(site_url('pembeli/create'),'<i class="entypo-user-add"></i><span> Tambah Data Calon Pembeli</span>', 'class="btn btn-primary"'); ?>
                <br>
            </div>
            <div class="col-md-4 text-center">
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pembeli/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pembeli'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit"><i class="entypo-search"></i><span> Cari</span></button>
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
        <table class="table table-bordered responsive" style="margin-bottom: 10px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Alamat Pembeli</th>
                    <th>Aksi</th>
                        </tr><?php
                        foreach ($pembeli_data as $pembeli)
                        {
                        ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="3%"><?php echo ++$start ?></td>
                    <td><?php echo $pembeli->nama_pembeli ?></td>
                    <td><?php echo $pembeli->alamat_pembeli ?></td>
                    <td width="23%"style="text-align:center" width="200px">
                        <?php 
                        echo anchor(site_url('pembeli/read/'.$pembeli->id_pembeli),'<i class="entypo-eye"></i>
                        <span>Detail</span>', array('class'=>'btn btn-primary btn-sm')); 
                        echo ' | '; 
                        echo anchor(site_url('pembeli/update/'.$pembeli->id_pembeli),'<i class="entypo-pencil"></i>
                        <span>Edit</span>', array('class'=>'btn btn-default btn-sm')); 
                        echo ' | '; 
                        echo anchor(site_url('pembeli/delete/'.$pembeli->id_pembeli),'<i class="entypo-trash"></i>
                        <span>Hapus</span>',array('class'=>'btn btn-danger btn-sm', 'onclick'=>'javasciprt: return confirm(\'Yakin Menghapus User?\')'));
                        ?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Jumlah Calon Pembeli: <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('pembeli/excel'), 'Download Excel', 'class="btn btn-success"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
