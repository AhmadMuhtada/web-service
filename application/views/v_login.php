<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>OVA | Administrator</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/css_login.css">
		
		</head>
		<body>
		<!--you can substitue the span of reauth email for a input with the email and include the remember me checkbox-->
		<div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="<?php echo base_url('') ?>assets/foto/logo/log.png"/>
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="<?php echo site_url('Login/cekLogin');?>" method="post" role="form" style="display: block;">
			<?php echo validation_errors(); ?>
                <input type="text" required id="NAMA_ADMIN" name = "NAMA_ADMIN" class="form-control" placeholder="Nama admin" required autofocus>
                <input type="password" required id="PASSWORD" name="PASSWORD" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Ingat saya
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">LOGIN</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
	
	
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
		<script src="<?php echo base_url('') ?>assets/js/js_login.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
		
	</body>
</html>