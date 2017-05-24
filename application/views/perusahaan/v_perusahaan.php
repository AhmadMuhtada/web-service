<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css">

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
						<h1>List Perusahaan</h1>	
						<div class="table-responsive">
							<table class="table table-hover" id="example">
								<thead>
									<tr>
									<th>No</th>
									<th>Id Perusahaan</th>
									<th>Nama Perusahaan</th>
									<th>Alamat Perusahaan</th>
									<th>Info Perusahaan</th>
									<th>Email Perusahaan</th>
									<!--<th>Password Perusahaan</th>-->
									<th>No Telepon Perusahaan</th>
									
									<th>Foto Perusahaan</th>
									<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								$no=1;
								
								foreach ($perusahaan as $p) { ?>
									<tr>
										<td><?php echo $no ?></td>
										<td><?php echo $p->ID_PERUSAHAAN ?></td>
										<td><?php echo $p->NAMA_PERUSAHAAN ?></td>
										<td><?php echo $p->ALAMAT_PERUSAHAAN ?></td>
										<td><?php echo $p->INFO_PERUSAHAAN ?></td>
										<td><?php echo $p->EMAIL_PERUSAHAAN ?></td>
										<!--<td><?php echo $p->PASSWORD_PERUSAHAAN ?></td>-->
										<td><?php echo $p->NO_TELP_PERUSAHAAN ?></td>
										<!--<td><?php echo $p->FOTO_PERUSAHAAN ?></td>-->

										<td><img width="100" height="100" src="<?=base_url()?>assets/foto/perusahaan/<?=$p->FOTO_PERUSAHAAN?>"></td>
										<td>
											
											<a href="<?php echo site_url('perusahaan/update/').$p->ID_PERUSAHAAN ?>" type="button" class="btn btn-success"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
											<a href="<?php echo site_url('perusahaan/delete/').$p->ID_PERUSAHAAN ?>" type="button" class="btn btn-danger" onClick="JavaScript: return confirm('Anda yakin Hapus data ini ?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
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