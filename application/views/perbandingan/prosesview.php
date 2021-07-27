<script type="text/javascript">
	function proseshitung() {
		$.ajax({
			type: 'get',
			dataType: 'json',
			url: "<?= base_url('Perbandingan/proseshitung'); ?>",
			error: function() {
				$("#respon").html('Proses hitung seleksi pembeli gagal');
				$("#error").show();
			},
			beforeSend: function() {
				$("#error").hide();
				$("#respon").html("Sedang bekerja, tunggu sebentar");
			},
			success: function(x) {
				if (x.status == "ok") {
					alert('Proses seleksi berhasil. Halaman akan direfresh');
					window.location = window.location;
				} else {
					$("#respon").html('Proses hitung seleksi Alternatif gagal');
					$("#error").show();
				}
			},
		});
	}
</script>

<div id="respon" class="hidden-print"></div>
<?php
$sql = "Select COUNT(*) as m FROM alternatif";
$c = $this->m_db->get_query_row($sql, 'm');
if ($c < 1) {
	echo '<div class="alert alert-warning hidden-print" id="error">Seleksi perhitungan belum bisa diproses. Tambahkan data alternatif terlebih dahulu</div>';
} else {
?>

	<h3 style="margin-top:0px"><b>Daftar Penilaian Kelayakan Calon Pembeli</b></h3>
	<br>
	<div class="table-responsive">

		<table class="table table-bordered ">
			<thead>
				<th width="20%">Nama Pembeli</th>
				<?php
				$dKriteria = $this->mod_kriteria->kriteria_data();
				if (!empty($dKriteria)) {
					foreach ($dKriteria as $rKriteria) {
						echo '<th width="10%">' . $rKriteria->nama_kriteria . '</th>';
					}
				}
				?>
				<th width="10%">Total</th>
				<th width="5%">Ranking</th>
			</thead>
			<?php
			$dAlternatif = $this->m_db->get_data('alternatif');
			if (!empty($dAlternatif)) {
				$totalarray = array();
				$totalarray2 = array();
				$namapembeliarray = array();
				$alternatifid2 = array();
				$arrcount  = count($dAlternatif);
				$ranking = 1;
				$arr = 0;
				// BUAT ARRAY MAX
				foreach ($dAlternatif as $rAlternatif) {

					$alternatifID2 = $rAlternatif->id_alternatif;
					$pembeliID = $rAlternatif->id_pembeli;
					$nama_pembeli = field_value('pembeli', 'id_pembeli', $pembeliID, 'nama_pembeli');

					$total_ = 0;

					foreach ($dKriteria as $rKriteria) {
						$kriteriaid2 = $rKriteria->id_kriteria;
						$subkriteria2 = alternatif_nilai($alternatifID2, $kriteriaid2);
					
						$prioritaskriteria2 = ambil_prioritas_kriteria($kriteriaid2);
						$prioritassubkriteria2 = ambil_prioritas($subkriteria2);

						$prioritas2 = $prioritassubkriteria2 * $prioritaskriteria2;

						$total_ += $prioritas2;

					}
					array_push($totalarray2, $total_);
					array_push($namapembeliarray , $nama_pembeli);
					array_push($alternatifid2 , $alternatifID2);
				}
				arsort($totalarray2);
				arsort($namapembeliarray);
				arsort($alternatifid2);
				?>
					<?php 
						$no = 1;
						foreach($totalarray2 as $key => $value){
					?>
						<tr>
							
							<td><?=$namapembeliarray[$key]?></td>
							<?php
							$total = 0;
							if (!empty($dKriteria)) {

								foreach ($dKriteria as $rKriteria) {
									$kriteriaid = $rKriteria->id_kriteria;
									$alter = $alternatifid2[$key];
									$subkriteria = alternatif_nilai($alter, $kriteriaid);
									$prioritaskriteria = ambil_prioritas_kriteria($kriteriaid);
									$prioritassubkriteria = ambil_prioritas($subkriteria);

									$prioritas = $prioritassubkriteria * $prioritaskriteria;

									$total += $prioritas;
									array_push($totalarray, $total);
									echo '<td>' . number_format((float)$prioritas, 6) . '</td>';
								}
							}
							?>
								<td><b><?= number_format($total, 6); ?></b></td>
								<td><b><?=$no?></b></td>
						</tr>
					<?php $no++;} ?>
		<?php
			} else {
				return false;
			}
		}
		?>

		</table>
		<?php 
		$maxtotalarray2 = max($namapembeliarray);
		?>
			<!-- <p>Dari hasil perhitungan diatas, maka calon pembeli yang diprioritaskan adalah <b><?=$maxtotalarray2?></b></p> -->
	</div>