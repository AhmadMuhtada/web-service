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
								<div>
									<ul class="nav navbar-nav">
									<li class="active">
											<li class="active"><a href="<?php echo site_url('perusahaan')?>">List Perusahaan</a></li>
											</li>
									</ul>
									<ul class="nav navbar-nav">
									<li class="button">
											<li class="button"><a href="<?php echo site_url('perusahaan/create')?>">Tambah Perusahaan</a></li>
											</li>
									</ul>
								</div>
						
								<!-- Collect the nav links, forms, and other content for toggling -->
								
								<div>
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
					<?php echo form_open_multipart('lowongan/update/'.$this->uri->segment(3)); ?>
						<legend>Edit Data Lowongan</legend>
						<!--<pre><?php 
						var_dump($perusahaan); 
						?>-->
						</pre>
						<?php echo validation_errors(); ?>
						<div class="form-group">
							<label for="">ID Perusahaan</label>
							<input type="text" class="form-control" id="ID_PERUSAHAAN" name="ID_PERUSAHAAN" placeholder="Edit ID" value="<?php echo $lowongan[0]->ID_PERUSAHAAN ?>">
							<br>
							<label for="">Bidang Pekerjaan</label>
							<input type="text" class="form-control" id="BIDANG_PEKERJAAN" name="BIDANG_PEKERJAAN" placeholder="Edit Bidang Pekerjaan" value="<?php echo $lowongan[0]->BIDANG_PEKERJAAN ?>">
							<br>
							<label for="">Fasilitas</label>
							<input type="text" class="form-control" id="FASILITAS" name="FASILITAS" placeholder="Edit Fasilitas" value="<?php echo $lowongan[0]->FASILITAS?>">
							<br>
							<label for="">Gaji</label>
							<input type="text" class="form-control" id="GAJI" name="GAJI" placeholder="Edit Gaji" value="<?php echo $lowongan[0]->GAJI?>">
							<br>
							<label for="">Jumlah Lowongan</label>
							<input type="text" class="form-control" id="JUMLAH_LOWONGAN" name="JUMLAH_LOWONGAN" placeholder="Edit Junmlah Lowongan" value="<?php echo $lowongan[0]->JUMLAH_LOWONGAN ?>">
							<br>
							<label for="">Deadline</label>
							<input type="text" class="form-control" id="DEADLINE" name="DEADLINE" placeholder="Edit Deadline" value="<?php echo $lowongan[0]->DEADLINE?>">
							<button type="submit" class="btn btn-primary">Edit</button>
					<?php echo form_close(); ?>
					</div>


		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>