
    <h2 style="margin-top:0px"><b>Data Calon Pembeli</b></h2>
    <table class="table">
	    <tr><td width="250px">Nama Pembeli</td><td><?php echo $nama_pembeli; ?></td></tr>
	    <tr><td>Usia</td><td><?php echo $usia; ?></td></tr>
	    <tr><td>Status Pernikahan</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Pekerjaan</td><td><?php echo $pekerjaan; ?></td></tr>
	    <tr><td>Penghasilan</td><td>Rp. <?php echo $penghasilan; ?></td></tr>
	    <tr><td>Riwayat Kredit</td><td><?php echo $riwayat_kredit; ?></td></tr>
	    <tr><td>Uang Muka</td><td><?php echo $uang_muka; ?></td></tr>
	    <tr><td>Jangka Waktu</td><td><?php echo $jangka_waktu; ?></td></tr>
	    <tr><td>Agama</td><td><?php echo $agama; ?></td></tr>
	    <tr><td>No Telpon</td><td><?php echo $no_telpon; ?></td></tr>
	    <tr><td><h4><b>File Calon Pembeli</b></h4></td><td></td></tr>
	    <tr><td>KTP</td>
			<td>
				<?php echo anchor(site_url('uploads/pembeli/'.$ktp), '<i class="entypo-doc-text"></i><span> Preview KTP</span>', array('target'=>'_new','class'=>'btn btn-success btn-sm')); ?>
			</td>
		</tr>
	    <tr><td><a href="<?php echo site_url('pembeli') ?>" class="btn btn-default">Kembali</a></td></tr>
	</table>

<script>
var n = new Number($penghasilan);
var myObj = {
  style: "currency",
  currency: "EUR"
}

document.write(n.toLocaleString("en-GB", myObj));
</script>
