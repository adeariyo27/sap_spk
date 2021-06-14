
        <h3 style="margin-top:0px"><b>Daftar Alternatif</b></h3>
        <br>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor('alternatif/create','<i class="entypo-plus"></i><span> Tambah Alternatif</span>', 'class="btn btn-primary"'); ?>
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
                                    <a href="<?php echo site_url('Alternatif'); ?>" class="btn btn-default">Reset</a>
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
                    <th><b>Nama Pembeli</b></th>
                    <th><b>Pekerjaan</b></th>
                    <th><b>Penghasilan</b></th>
                    <th><b>Riwayat Kredit</b></th>
                    <th><b>Usia</b></th>
                    <th><b>Status</b></th>
                    <th width="23%"><center><b>Aksi</b></center></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($data)) {
                $no = 1;
                foreach ($data as $alternatif)
                {
                ?>
                <tr>
                    <td width="80px"><?php echo $no++ ?></td>
                    <td><?php echo $alternatif->nama_pembeli ?></td>
                    <td><?php echo $alternatif->pekerjaan ?></td>
                    <td>Rp. <?php echo $alternatif->penghasilan ?></td>
                    <td><?php echo $alternatif->riwayat_kredit ?></td>
                    <td><?php echo $alternatif->usia ?> Tahun</td>
                    <td><?php echo $alternatif->status ?></td>
                    <td style="text-align:center" width="200px">
                        <?php 
                        echo anchor(site_url('pembeli/read/'.$alternatif->id_pembeli),'<i class="entypo-eye"></i>
                        <span>Detail</span>', array('class'=>'btn btn-primary btn-sm')); 
                        // echo ' | '; 
                        // echo anchor(site_url('alternatif/edit?alternatif='.$alternatif->id_alternatif),'<i class="entypo-pencil"></i>
                        // <span>Edit</span>', array('class'=>'btn btn-default btn-sm'));  
                        echo ' | '; 
                        echo anchor(site_url('alternatif/hapus?alternatif='.$alternatif->id_alternatif),'<i class="entypo-trash"></i>
                        <span>Hapus</span>',array('class'=>'btn btn-danger btn-sm', 'onclick'=>'javasciprt: return confirm(\'Yakin Menghapus User?\')'));
                        ?>
                    </td>
                </tr>
                <?php }}else{ ?>
                <tr>
                    <td colspan="5" align="center"><strong>Tidak Ada Data</strong></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Jumlah Alternatif : <?php echo $total_rows ?></a>
        </div>
            <div class="col-md-6 text-right">
               
            </div>
        </div>
