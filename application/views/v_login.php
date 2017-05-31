<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>OVA | Administrator</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/logged.css">
		
		</head>
		<body>
		<div class="container">
    	<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-login">
					<div class="panel-heading">
							    <ul class="tab_frm">
							        <li><a href="#" class="active" id="login-form-link">Login</a></li>
							        <li><a href="#" id="register-form-link">Register</a></li>
							    </ul>
							
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="<?php echo site_url('Login/cekLogin');?>" method="post" role="form" style="display: block;">
								<?php echo validation_errors(); ?>
									<div class="form-group">
								<input type="text" name="NAMA_ADMIN" required id="NAMA_ADMIN" class="form-control" placeholder="Username"></i>
									</div>
									<div class="form-group">
										<input type="password" name="PASSWORD" required id="PASSWORD" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" class="form-control btn btn-login" value="LOGIN">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
											</div>
										</div>
									</div>
								</form>
								
								<form id="register-form" action="" method="post" role="form" style="display: none;">
								<?php echo form_open_multipart('Registrasi/create'); ?>
								<?php echo validation_errors(); ?>
									<div class="form-group">
										<input type="text" name="username" id="username" class="form-control" placeholder="Username" required="required">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required" value="<?php echo set_value('password'); ?>">
									</div>
									<div class="form-group">
										<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Konfirmasi Password" value="<?php echo set_value('confirm_password'); ?>">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" class="form-control btn btn-register" value="DAFTAR">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

		<?php
			if($this->session->flashdata('pesan') <> ''){
			?>
			<div class="alert alert-dismissible alert-danger">
			<?php echo $this->session->flashdata('pesan');?>
			</div>
			<?php
			}
		?>
		

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> 
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('') ?>assets/js/logged.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
		
	</body>
</html>