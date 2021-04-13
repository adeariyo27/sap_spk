<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered responsive">
			<?= anchor('admin/auth/create_group','<i class="entypo-user-add"></i><span> Tambah User Level</span>', array('class'=>'btn btn-primary')); ?>
			<br><br>
			<?php 
				if ($this->session->flashdata('gagal')) {
					echo  "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>".$this->session->flashdata('gagal')."</div>";
				}else if($this->session->flashdata('sukses')){
					echo  "<div class='alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>".$this->session->flashdata('sukses')."</div>";
				}
						
			?>
			<div id="infoMessage"><?php echo $message;?></div>
			<thead>
				<tr>
					<th width="5%">No</th>
					<th width="25%">Nama User Level</th>
					<th>Deskripsi</th>
					<th width="15%">Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			 foreach ($groups as $groups): ?>	
				<tr>
					<td><?= $no++ ?></td>
					<td><?php echo htmlspecialchars($groups->name,ENT_QUOTES,'UTF-8');?></td>
		            <td><?php echo htmlspecialchars($groups->description,ENT_QUOTES,'UTF-8');?></td>
					<td>
						<?php echo anchor('admin/auth/edit_group/'.$groups->id, '<i class="entypo-pencil"></i>
					<span>Edit</span>', array('class'=>'btn btn-default')) ?>
						<?php echo ' | ';  ?>
					 	<?php echo anchor('admin/auth/delete_group/'.$groups->id, '<i class="entypo-trash"></i>
					<span>Hapus</span>', array('class'=>'btn btn-danger btn-sm', 'onclick'=>'javasciprt: return confirm(\'Yakin Menghapus User Level?\')'))  ?>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>



