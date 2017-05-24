<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pelamar Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="">
		<script type="text/javascript" src="<?php echo base_url('') ?>assets/Query-2.2.4/jquery-2.2.4.min.js"></script>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container-fluid">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<nav class="navbar navbar-default" role="navigation">
							<div class="container-fluid">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<a class="navbar-brand" href="<?php echo site_url('home_admin') ?>">Home</a>
								</div>
						
								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse navbar-ex1-collapse">
									<ul class="nav navbar-nav">
										<li class="dropdown">
											<a href="<?php site_url('') ?>" class="dropdown-toggle" data-toggle="dropdown">Perusahaan<b class="caret"></b></a>
											<ul class="dropdown-menu">
											    <li><a href="<?php echo site_url('perusahaan')?>">List Perusahaan</a></li>
												<li><a href="#">Lowongan</a></li>
												
											</ul>
										</li>
									</ul>
									<ul class="nav navbar-nav">
										<li class="dropdown">
											<a href="<?php site_url('') ?>" class="dropdown-toggle" data-toggle="dropdown">Pelamar<b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li><a href="<?php echo site_url('pelamar')?>">List Pelamar</a></li>
												<li><a href="#">Form Pelamar</a></li>
												
											</ul>
										</li>
									</ul>
									<ul class="nav navbar-nav">
									<li class="button">
											<li class="button"><a href="<?php echo site_url('home_admin/create')?>">Tambah Admin</a></li>
											</li>
									</ul>
									<ul class="nav navbar-nav navbar-right">
										<li class="active">
											<li class="active"><a href="<?php echo site_url('')?>">Log Out</a></li>
											<!--<ul class="dropdown-menu">
												<li><a href="#">Pemrograman</a></li>
												<li><a href="#">Web</a></li>
												<li><a href="#">Berbasis</a></li>
												<li><a href="#">Framework</a></li>
											</ul>-->
										</li>
									</ul>
								</div><!-- /.navbar-collapse -->
						</div>
						</nav>

					</div>	

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h1>List Pelamar</h1>	
						<div class="table-responsive">
							<table class="table table-hover" id="example">
								<thead>
									<tr>
									<th>No</th>
									<th>Id Pelamar</th>
									<th>Nama Pelamar</th>
									<th>Nomor Telepon</th>
									<th>E-mail</th>
									<th>Jenis Kelamin</th>
									<!--<th>Password</th>-->
									<th>Foto</th>
									<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								$no=1;
								
								foreach ($user as $u) { ?>
									<tr>
										<td><?php echo $no ?></td>
										<td><?php echo $u->ID_USER ?></td>
										<td><?php echo $u->NAMA_USER ?></td>
										<td><?php echo $u->NO_TELP ?></td>
										<td><?php echo $u->EMAIL_USER ?></td>
										<!--<td><?php echo $u->PASSWORD_USER ?></td>-->
										<td><?php echo $u->JENIS_KELAMIN_USER ?></td>
										<!--<td><?php echo $u->FOTO_USER ?></td>-->

										<td><img width="100" height="100" src="<?=base_url()?>assets/foto/<?=$u->FOTO_USER?>"></td>
										<td>
											
											<a href="<?php echo site_url('home/update/').$u->ID_USER ?>" type="button" class="btn btn-success"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
											<a href="<?php echo site_url('home/delete/').$u->ID_USER ?>" type="button" class="btn btn-danger" onClick="JavaScript: return confirm('Anda yakin Hapus data ini ?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
										</td>
									</tr>
								<?php
								$no++;} ?>
								</tbody>
							</table>
						</div>
					</div>
					



		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>