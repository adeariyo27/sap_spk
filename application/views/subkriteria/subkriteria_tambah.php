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
	<div class="col-md-12">
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
		<?= form_open($action.$link, array('class'=>'form-horizontal form-groups-bordered')); ?>
		<br>
		<input type="hidden" name="id_kriteria" value="<?=$kriteria;?>"/>
		<div id="div_teks" class="opsi">
			<div class="form-group required">
				<label class="col-sm-2 control-label" for="">
					<?php 
					if(!empty($utama))
					{               
						foreach($utama as $rutama)
						{
							if($rutama->id_kriteria==$kriteria)
							{
								echo $rutama->nama_kriteria;
							}
						}
					}
				?>
				</label>
				<div class="col-md-7">
					<input type="text" name="ket" class="form-control " autocomplete="off" required="" "/>
				</div>
			</div>	
		</div>
		
		<?php if($kriteria==1) { ?>
		<div id="nilaikategori">
			<div class="form-group required">
				<label class="col-sm-2 control-label">Jumlah Gaji </label>
				<div class="col-md-10">
					<?php
					if(!empty($nilai))
					{
						foreach($nilai as $rnilai)
						{
							if($rnilai->id_nilai==4) {
								continue;
							}
								?>
								<div class="radio radio-replace">
									<label>
										<input type="radio" name="id_nilai" value="<?=$rnilai->id_nilai;?>"/> <?=$rnilai->nama_nilai;?>
									</label>
								</div>
								<?php
						}
					}
					?>
				</div>
			</div>
		</div>
		<?php } ?>

		<div class="form-group">
			<label class="col-sm-2 control-label">&nbsp;</label>
			<div class="col-md-6">
				<button type="submit" name="submit" class="btn btn-primary btn-flat">Tambah</button>
				<a href="javascript:history.back(-1);" class="btn btn-default btn-flat">Batal</a>
			</div>
		</div>
		<?= form_close(); ?>

