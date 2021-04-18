<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered responsive">
			<?= anchor('admin/auth/create_user','<i class="entypo-user-add"></i><span> Tambah User</span>', array('class'=>'btn btn-primary')); ?>
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
					<th width="3.5%">No</th>
					<th>Nama</th>
					<th>Email</th>
					<th width="20%">Level</th>
					<th width="6%"><center>Status</center></th>
					<th width="20%"><center>Aksi</center></th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			 foreach ($users as $user): ?>	
				<tr>
					<td><?= $no++ ?></td>
					<td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8'). ' '.htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
		            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
		            <td>
						<?php foreach ($user->groups as $group):?>
							<?php echo anchor('admin/auth/edit_group/'.$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8'), array('class'=>'badge badge-primary badge-roundless')) ;?>
                		<?php endforeach?>
		            </td>
		           	<td>
					   <center>
					   <?php echo ($user->active) ? anchor("admin/auth/deactivate/".$user->id, lang('index_active_link'), array('class'=>'badge badge-success badge-roundless')) : anchor("admin/auth/activate/". $user->id, lang('index_inactive_link'), array('class'=>'badge badge-secondary badge-roundless'));?>
					   </center>
					</td>
					<td>
						<center>
						<?php echo anchor('admin/auth/edit_user/'.$user->id, '<i class="entypo-pencil"></i><span>Edit</span>', array('class'=>'btn btn-default')) ?>
						<?php echo ' | ';  ?>
					 	<?php echo anchor('auth/delete_user/'.$user->id, '<i class="entypo-trash"></i><span>Hapus</span>', array('class'=>'btn btn-danger btn-sm', 'onclick'=>'javasciprt: return confirm(\'Yakin Menghapus User?\')'))  ?>
						</center>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>



