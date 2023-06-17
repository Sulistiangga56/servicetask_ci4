<!DOCTYPE html>
<html>
<head>
<title>Service Task</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap.min.css') ?> ">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap-theme.css') ?>">
	<script  src="<?= base_url('js/jquery.js') ?>"></script>
	<script  src="<?= base_url('js/bootstrap.min.js') ?>"></script>


</head>
<body>
	<div class="container-fluid">
		<div class="row top">
		<center>
				<div class="col-md-4" style="padding: 3px;">
					<span> <i class="glyphicon glyphicon-earphone"></i> +6287745728968</span>
				</div>


				<div class="col-md-4"  style="padding: 3px;">
					<span><i class="glyphicon glyphicon-envelope"></i> servicetask@gmail.com</span>
				</div>


				<div class="col-md-4"  style="padding: 3px;">
					<span>Service Task Indonesia</span>
				</div>
			</center>
		</div>
	</div>

	<nav class="navbar navbar-default" style="padding: 5px;">
		<div class="container">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#" style="color: #F79500"><b>SERVICE TASK</b></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?= base_url() ?>">Home</a></li>
					<li><a href="<?= base_url('produk') ?>">Jasa Kami</a></li>
					<li><a href="<?= base_url('about') ?>">Tentang Jasa</a></li>
					<li><a href="<?= base_url('panduan') ?>">Panduan Aplikasi</a></li>
					<?php 
						$db = \Config\Database::connect();
						// if user note login then set jumlah_keranjang to 0 else get jumlah_keranjang from database
						if(!session()->get('username')){
							$jumlah_keranjang = 0;
						}else{
							$jumlah_keranjang = $db->table('keranjang')->countAllResults();
						}
					?>
					<li><a href="<?= basename('keranjang') ?>"><i class="glyphicon glyphicon-shopping-cart"></i> <b>[ <?= $jumlah_keranjang ?> ]</b></a></li>

					<?php 
					if(!session()->get('username')){
						?>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> Akun <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?= base_url('login') ?>">login</a></li>
								<li><a href="<?= base_url('register') ?>">Register</a></li>
							</ul>
						</li>
						<?php 
					}else{
						?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <?= session()->get('username') ?> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?= base_url('/logout') ?>">Log Out</a></li>
							</ul>
						</li>

						<?php 
					}
					?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>