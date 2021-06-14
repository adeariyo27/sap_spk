
    <h2 style="margin-top:0px"><b>Data Calon Pembeli</b></h2>
    <table class="table">
	    <tr><td width="250px">Nama Pembeli</td><td><?php echo $nama_pembeli; ?></td></tr>
	    <tr><td>Usia</td><td><?php echo $usia; ?> Tahun</td></tr>
	    <tr><td>Status Pernikahan</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Pekerjaan</td><td><?php echo $pekerjaan; ?></td></tr>
	    <tr><td>Penghasilan</td><td>Rp. <?php echo $penghasilan; ?></td></tr>
	    <tr><td>Riwayat Kredit</td><td><?php echo $riwayat_kredit; ?></td></tr>
	    <tr><td>Uang Muka</td><td>Rp. <?php echo $uang_muka; ?></td></tr>
	    <tr><td>Jangka Waktu</td><td><?php echo $jangka_waktu; ?></td></tr>
	    <tr><td>Agama</td><td><?php echo $agama; ?></td></tr>
	    <tr><td>No Telpon</td><td><?php echo $no_telpon; ?></td></tr>
	    <tr><td><h4><b>File Calon Pembeli</b></h4></td><td></td></tr>
	    <tr><td>Pas Foto</td>
			<td>
				<?php echo anchor(site_url('uploads/pembeli/'.$pas_foto), '<i class="entypo-doc-text"></i><span> Preview Pas Foto</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
			</td>
		</tr>
	    <tr><td>KTP</td>
			<td>
				<?php echo anchor(site_url('uploads/pembeli/'.$ktp), '<i class="entypo-doc-text"></i><span> Preview KTP</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
			</td>
		</tr>
	    <tr><td>Kartu Keluarga</td>
			<td>
				<?php echo anchor(site_url('uploads/pembeli/'.$kk), '<i class="entypo-doc-text"></i><span> Preview Kartu Keluarga</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
			</td>
		</tr>
		<?php if(!empty($surat_nikah)) { ?>
	    <tr><td>Surat Nikah/Surat Cerai</td>
			<td>
				<?php echo anchor(site_url('uploads/pembeli/'.$surat_nikah), '<i class="entypo-doc-text"></i><span> Preview Surat Nikah</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
			</td>
		</tr>
		<?php } ?>
		<?php if(!empty($slip_gaji)) { ?>
	    <tr><td>Slip Gaji 3 Bulan Terakhir</td>
			<td>
				<?php echo anchor(site_url('uploads/pembeli/'.$slip_gaji), '<i class="entypo-doc-text"></i><span> Preview Slip Gaji 3 Bulan Terakhir</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
			</td>
		</tr>
		<?php } ?>
		<?php if(!empty($sk_terakhir)) { ?>
	    <tr><td>SK Terakhir</td>
			<td>
				<?php echo anchor(site_url('uploads/pembeli/'.$sk_terakhir), '<i class="entypo-doc-text"></i><span> Preview SK Terakhir</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
			</td>
		</tr>
		<?php } ?>
		<?php if(!empty($surat_ket_kerja)) { ?>
	    <tr><td>Surat Keterangan Kerja</td>
			<td>
				<?php echo anchor(site_url('uploads/pembeli/'.$surat_ket_kerja), '<i class="entypo-doc-text"></i><span> Preview Surat Keterangan Kerja</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
			</td>
		</tr>
		<?php } ?>
		<?php if(!empty($siup)) { ?>
	    <tr><td>Surat Izin Usaha Perdagangan</td>
			<td>
				<?php echo anchor(site_url('uploads/pembeli/'.$siup), '<i class="entypo-doc-text"></i><span> Preview Surat Izin Usaha Perdagangan</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
			</td>
		</tr>
		<?php } ?>
		<?php if(!empty($daftar_perusahaan)) { ?>
	    <tr><td>Tanda Daftar Perusahaan</td>
			<td>
				<?php echo anchor(site_url('uploads/pembeli/'.$daftar_perusahaan), '<i class="entypo-doc-text"></i><span> Preview Tanda Daftar Perusahaan</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
			</td>
		</tr>
		<?php } ?>
		<?php if(!empty($surat_ket_dom)) { ?>
	    <tr><td>Surat Keterangan Domisili</td>
			<td>
				<?php echo anchor(site_url('uploads/pembeli/'.$surat_ket_dom), '<i class="entypo-doc-text"></i><span> Preview Surat Keterangan Domisili</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
			</td>
		</tr>
		<?php } ?>
		<?php if(!empty($laporan_keuangan)) { ?>
	    <tr><td>Laporan Keuangan 3 Bulan Terakhir</td>
			<td>
				<?php echo anchor(site_url('uploads/pembeli/'.$laporan_keuangan), '<i class="entypo-doc-text"></i><span> Preview Laporan Keuangan 3 Bulan Terakhir</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
			</td>
		</tr>
		<?php } ?>
		<tr><td>NPWP</td>
			<td>
				<?php echo anchor(site_url('uploads/pembeli/'.$npwp), '<i class="entypo-doc-text"></i><span> Preview NPWP</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
			</td>
		</tr>
		<tr><td>Buku Tabungan</td>
			<td>
				<?php echo anchor(site_url('uploads/pembeli/'.$buku_tabungan), '<i class="entypo-doc-text"></i><span> Preview Buku Tabungan</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
			</td>
		</tr>
		<tr><td>Rekening Koran 3 Bulan Terakhir</td>
			<td>
				<?php echo anchor(site_url('uploads/pembeli/'.$rekening_koran), '<i class="entypo-doc-text"></i><span> Preview Rekeking Koran 3 Bulan Terakhir</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
			</td>
		</tr>
		<tr><td>Surat Pernyataan</td>
			<td>
				<?php echo anchor(site_url('uploads/pembeli/'.$surat_pernyataan), '<i class="entypo-doc-text"></i><span> Preview Surat Pernyataan</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
			</td>
		</tr>

	    <tr><td><a href="javascript:history.back(-1);" class="btn btn-default">Kembali</a></td></tr>
	</table>