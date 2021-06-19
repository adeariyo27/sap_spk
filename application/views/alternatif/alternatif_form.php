<!-- get alternatif -->
	<script type="text/javascript">
	$(document).ready(function () {
		$("select").select2();
	});
	</script>
<div class="row">
	<?= form_open('alternatif/create'); ?>
	<div class="form-group required">
		<label class="col-sm-2 control-label" for="">Nama Pembeli</label>
		<div class="col-md-10">
				<?php 
				if (!empty($pembeli)) {
					foreach ($pembeli as $s) {
						?>
			<select name="id_pembeli" class="form-control">
			 	<option value='<?php echo $s->id_pembeli ?>'><?php echo $s->nama_pembeli ?></option>
			</select>
			 	<?php }}else{ ?>
			<select name="id_pembeli" class="form-control" disabled>
				<option class="form-control"> Semua Pembeli sudah terdaftar</option>
			</select>
			 	<?php } ?>
		</div>
	</div>
	<br><br><br>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="">Penilaian</label>
		<div class="col-md-10">
			<table class="table table-bordered">
				<thead>
					<th>Kriteria</th>
					<th>Sub-Kriteria</th>
				</thead>
				<tbody>
				<?php
				if(!empty($kriteria))
				{
					foreach($kriteria as $rk)
					{
						$kriteriaid=$rk->id_kriteria;
						echo '<tr>';
						echo '<td>'.$rk->nama_kriteria.'</td>';
						echo '<td>';
						$dSub=$this->m_db->get_data('subkriteria',array('id_kriteria'=>$kriteriaid));
						if(!empty($dSub))
						{						
							echo '<select name="kriteria['.$kriteriaid.']"  class="form-control" data-placeholder="Pilih Nilai" required style="width: 100%">';
							echo '<option></option>';
							foreach($dSub as $rSub)
							{
								$o='';
								if($rSub->tipe=="teks")
								{ if($rk->nama_kriteria=='Pekerjaan' || $rk->nama_kriteria=='pekerjaan') {
									$o=$rSub->nama_subkriteria.' '.$nama_nilai;
								  } else {
									$o=$rSub->nama_subkriteria;
								  }
								}elseif($rSub->tipe=="nilai"){
									$op_min=$rSub->op_min;
									$op_max=$rSub->op_max;
									$nilai_minimum=$rSub->nilai_minimum;
									$nilai_maksimum=$rSub->nilai_maksimum;
									if($op_min==$op_max && $nilai_minimum==$nilai_maksimum)
									{
										$o=$o_pmax." ".$nilai_minimum;
									}else{
										$o=$op_min." ".$nilai_minimum." dan ".$op_max." ".$nilai_maksimum;
									}
								}
								echo '<option value="'.$rSub->id_subkriteria.'">'.$o.'</option>';
							}
							echo '</select>';
						}
						echo '</td>';
						echo '</tr>';
					}
				}
				?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">&nbsp;</label>
		<div class="col-md-6">
		<?php 
		if (!empty($pembeli)) {
		 ?>
			<button type="submit" name="submit" class="btn btn-primary btn-flat">Tambah</button>
			<a href="javascript:history.back(-1);" class="btn btn-default btn-flat">Batal</a>
		<?php } else{ ?>
			<button type="submit" name="submit" class="btn btn-primary btn-flat" disabled>Tambah</button>
			<a href="javascript:history.back(-1);" class="btn btn-default btn-flat">Batal</a>
		<?php } ?>
		</div>
	</div>
	<?= form_close(); ?>
</div>