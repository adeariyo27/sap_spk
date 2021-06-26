<script type="text/javascript">
$(document).ready(function () {
	$(".opsi input").removeAttr('required');
	$(".opsi select").removeAttr('required');
	$(".tipe").each(function(){
		$(this).change(function(){
			var did=$(this).attr('data-id');
			$(".opsi").attr('style','display:none');
			$(".opsi input").removeAttr('required');
			$(".opsi select").removeAttr('required');
			$("#div_"+did).show();
			$("#div_"+did+" input").attr('required','required');
		});
	});
	
});
</script>
	<div style="padding-left:100px">
		<?php
			if (!empty($utama)) {  
				foreach($utama as $rutama) {  
					 if($rutama->id_kriteria==$kriteria) {
		?>
		<div style="padding-left:0px">
			<h3 style="margin-top:0px" ><b>Tambah Sub-Kriteria <?php echo $rutama->nama_kriteria;?></b></h3>
		</div>
		<?php
			}}}
		?>
	</div>
	
	<!-- PEKERJAAN -->
	<?php if (!empty($utama)) {  
				foreach($utama as $rutama) {  
					if($rutama->id_kriteria==$kriteria) {
						if($rutama->nama_kriteria=='pekerjaan' || $rutama->nama_kriteria=='Pekerjaan') { ?>
		<?= form_open($action.$link, array('class'=>'form-horizontal form-groups-bordered')); ?>
		<p>
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="">Tipe</label>
			<div class="col-md-6">
				<?php
				$tipe=array('teks','nilai');
				echo com_choice('radio','tipe',$tipe,'teks',array('class'=>'tipe'),TRUE,TRUE);
				?>
			</div>
		</div>
		<br>
		<input type="hidden" name="id_kriteria" value="<?=$kriteria;?>"/>
		<div id="div_teks" class="opsi">
			<div class="form-group required">
				<label class="col-sm-2 control-label" for="">Keterangan</label>
				<div class="col-md-7">
					<input type="text" name="ket" class="form-control" placeholder="<?=$rutama->nama_kriteria;?>" autocomplete="off" required="" "/>
				</div>
			</div>	
		</div>
		<div id="div_nilai" class="opsi" style="display: none;">
			<div class="form-group required">
				<label class="col-sm-2 control-label" for="">Keterangan</label>
				<div class="col-md-10">
					<div class="row">
						<div class="col-sm-2" >
							<select name="op_min" class="form-control" required="">
								<option value="<"> < </option>
								<option value="<="> <= </option>
								<option value=">"> > </option>
								<option value="=>"> => </option>
								<option value="="> = </option>
							</select>
						</div>
					<div class="col-sm-8" >
						<input type="number" name="nilai_minimum" id="" class="form-control " autocomplete="" placeholder="Nilai Minimum <?=$rutama->nama_kriteria;?>" required="" value="<?php echo set_value('min'); ?>"/>
					</div>
					</div>
				</div>
			</div>
			<div class="form-group required">
				<label class="col-sm-2 control-label" for=""></label>
				<div class="col-md-10">
					<div class="row">
						<div class="col-sm-2" >
							<select name="op_max" class="form-control" required="">
								<option value="<"> < </option>
								<option value="<="> <= </option>
								<option value=">"> > </option>
								<option value="=>"> => </option>
								<option value="="> = </option>
							</select>
						</div>
					<div class="col-sm-8" >
						<input type="number" name="nilai_maksimum" id="" class="form-control " autocomplete="" placeholder="Nilai Maksimum <?=$rutama->nama_kriteria;?>" required="" value="<?php echo set_value('max'); ?>"/>
					</div>
					</div>
				</div>
			</div>
		</div>					

		<?php } else { ?>

		<!-- KRITERIA LAIN -->
		<?= form_open($action.$link, array('class'=>'form-horizontal form-groups-bordered')); ?>
		<p>
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="">Tipe</label>
			<div class="col-md-6">
				<?php
				$tipe=array('teks','nilai');
				echo com_choice('radio','tipe',$tipe,'teks',array('class'=>'tipe'),TRUE,TRUE);
				?>
			</div>
		</div>
		<br>
		<input type="hidden" name="id_kriteria" value="<?=$kriteria;?>"/>
		<div id="div_teks" class="opsi">
			<div class="form-group required">
				<label class="col-sm-2 control-label" for="">Keterangan</label>
				<div class="col-md-7">
					<input type="text" name="ket" class="form-control" placeholder="<?=$rutama->nama_kriteria;?>" autocomplete="off" required="" "/>
				</div>
			</div>	
		</div>
		<div id="div_nilai" class="opsi" style="display: none;">
			<div class="form-group required">
				<label class="col-sm-2 control-label" for="">Keterangan</label>
				<div class="col-md-10">
					<div class="row">
						<div class="col-sm-2" >
							<select name="op_min" class="form-control" required="">
								<option value="<"> < </option>
								<option value="<="> <= </option>
								<option value=">"> > </option>
								<option value="=>"> => </option>
								<option value="="> = </option>
							</select>
						</div>
					<div class="col-sm-8" >
						<input type="number" name="nilai_minimum" id="" class="form-control " autocomplete="" placeholder="Nilai Minimum <?=$rutama->nama_kriteria;?>" required="" value="<?php echo set_value('min'); ?>"/>
					</div>
					</div>
				</div>
			</div>
			<div class="form-group required">
				<label class="col-sm-2 control-label" for=""></label>
				<div class="col-md-10">
					<div class="row">
						<div class="col-sm-2" >
							<select name="op_max" class="form-control" required="">
								<option value="<"> < </option>
								<option value="<="> <= </option>
								<option value=">"> > </option>
								<option value="=>"> => </option>
								<option value="="> = </option>
							</select>
						</div>
					<div class="col-sm-8" >
						<input type="number" name="nilai_maksimum" id="" class="form-control " autocomplete="" placeholder="Nilai Maksimum <?=$rutama->nama_kriteria;?>" required="" value="<?php echo set_value('max'); ?>"/>
					</div>
					</div>
				</div>
			</div>
		</div>
		<?php }}}} ?>

		<div class="form-group">
			<label class="col-sm-2 control-label">&nbsp;</label>
			<div class="col-md-6">
				<button type="submit" name="submit" class="btn btn-primary btn-flat">Tambah</button>
				<a href="javascript:history.back(-1);" class="btn btn-default btn-flat">Batal</a>
			</div>
		</div>
		<?= form_close(); ?>

