<?php $pag= $this->uri->segment(1); ?>
<?php $page= $this->uri->segment(2); ?>
<?php $pages= $this->uri->segment(3); ?>
	<div class="sidebar-menu">
		<header class="logo-env">
			<!-- logo -->
			<!-- <div class="logo">
				<a href="index.html">
					<img src="<?= base_url() ?>assets/images/logo-light.jpg" width="120" alt="" />
				</a>
			</div> -->


			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
					<i class="entypo-menu"></i>
				</a>
			</div>
		</header>

		<ul id="main-menu" class="">
			<!-- add class "multiple-expanded" to allow multiple submenus to open -->
			<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
			<!-- <li><a href=" <?php echo base_url() ?> " target="_blank"><i class="entypo-monitor"></i><span>Halaman Depan</span></a></li> -->
			<li <?php if($page=="Dashboard") echo 'class="active opened active" '; ?> ><?= anchor('admin/Dashboard','<i class=entypo-home></i><span> Dashboard</span>'); ?></li>
			
			<li <?php if($pag =="Kriteria" || $pag =="kriteria" || $pag =="Subkriteria" || $pag =="subkriteria") echo 'class="active opened active" '; ?>><?= anchor('Kriteria','<i class=entypo-layout></i><span> Kriteria</span>'); ?></li>

			<li <?php if($pag=="pembeli" || $pag=="Pembeli") echo 'class="active opened active" '; ?>><?= anchor('Pembeli','<i class=entypo-clipboard></i><span> Calon Pembeli</span>'); ?></li>
			
			<li <?php if($pag=="Alternatif" || $pag=="alternatif" || $page=="Banding" || $page=="banding" || $page=="Hasil" || $page=="hasil") echo 'class="active opened active multiple-expanded" '; ?>>
				<a href="ui-panels.html">
					<i class="entypo-book"></i>
					<span>Perhitungan</span>
				</a>
				<ul>
					<li <?php if($pag=="alternatif" || $pag=="Alternatif") echo 'class="active opened active multiple-expanded" '; ?>><?= anchor('Alternatif','<span class=entypo-direction> Alternatif</span>'); ?></li>
					<li <?php if($page=="banding" || $page=="Banding") echo 'class="active opened active multiple-expanded" '; ?>><?= anchor('Perbandingan/banding','<span class=entypo-switch> Penilaian</span>'); ?></li>
					<li <?php if($page=="hasil" || $page=="Hasil") echo 'class="active opened active multiple-expanded" '; ?>><?= anchor('Perbandingan/hasil','<span class=entypo-chart-bar> Hasil Perhitungan</span>'); ?></li>
				</ul>
			</li>
			
			<?php if ($this->ion_auth->is_admin()) { ?>
			<li <?php if($page=="Auth" ||$page=="auth") echo 'class="active opened active multiple-expanded" '; ?>>
				<a href="ui-panels.html">
					<i class="entypo-tools"></i>
					<span>Pengaturan</span>
				</a>
				<ul>
					<li <?php if($page=="Auth" || $page=="auth") echo 'class="active opened active multiple-expanded" '; ?>><?= anchor('admin/Auth','<span class=entypo-user> Users</span>'); ?></li>
					<li <?php if($page=="Auth" || $page=="auth") echo 'class="active opened active multiple-expanded" '; ?>><?= anchor('admin/auth/read_group','<span class=entypo-user-add> User Level</span>'); ?></li>
				</ul>
			</li>
			<?php } ?>
			
			<?php if ($this->ion_auth->is_admin()) { ?>
			<li><a href="javascript:;" onclick="jQuery('#modal-1').modal('show');"><i class="entypo-help"></i><span> Tentang</span></a></li>
			<?php } ?>
		</ul>

	</div>
	<!-- Modal 1 (Basic)-->
	<div class="modal fade" id="modal-1">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">Tentang Aplikasi</h4>
				</div>

				<div class="modal-body">
					<strong>Aplikasi SPK Calon Pembeli KPR Bersubsidi</strong><br><br>
		            <i class="glyphicon glyphicon-cog"></i> &nbsp;SPK PT. Serasi Anugrah Pratama v.1.0<br>
		            <i class="glyphicon glyphicon-fire"></i> &nbsp;Designed & Created By: Ade Ariyo Yudanto<br>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
