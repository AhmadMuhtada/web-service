<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OVA | Administrator</title>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('') ?>assets/css/style.css">
		<script type="text/javascript" src="<?php echo base_url('') ?>assets/Query-2.2.4/jquery-2.2.4.min.js"></script>
</head>
<body>
<div id="wrapper">
  <div class="overlay"></div>
  
  <!-- Sidebar -->
  <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
      <li class="sidebar-brand"> <a href="#"> OVA ! </a> </li>
      <li> <a href="#"><i class="fa fa-fw fa-home"></i> Beranda </a> </li>
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-file-o"></i> Data <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="<?php echo site_url('home_admin') ?>">List Admin</a></li>
          <li><a href="<?php echo site_url('perusahaan') ?>">List Perusahaan</a></li>
          <li><a href="<?php echo site_url('pelamar') ?>">List Pelamar</a></li>
          <li><a href="<?php echo site_url('lowongan') ?>">List Lowongan</a></li>
          <li><a href="<?php echo site_url('form') ?>">List Form Pelamar</a></li>
        </ul>
      </li>
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-plus"></i> Entri Data <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="<?php echo site_url('home_admin/create') ?>">Tambah Admin</a></li>
          <li><a href="<?php echo site_url('perusahaan/create') ?>">Tambah Perusahaan</a></li>
		  <li><a href="<?php echo site_url('lowongan/create') ?>">Tambah Lowongan</a></li>
 
        </ul>
      </li>
	  <li> <a href="<?php echo site_url('Login/logout') ?>"><i class="fa fa-fw fa-cog"></i> Logout</a> </li>
    </ul>
  </nav>
  
  <!-- /#sidebar-wrapper --> 
  
  <!-- Page Content -->
  <div id="page-content-wrapper">
    <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas"> <span class="hamb-top"></span> <span class="hamb-middle"></span> <span class="hamb-bottom"></span> </button>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <h1 class="page-header">Tambah Admin</h1>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php echo form_open_multipart('home_admin/create/'); ?>
			<?php echo validation_errors(); ?>
						<div class="form-group">
						
									<!--<label for="">ID Admin</label>
									<input type="text" class="form-control" id="ID_ADMIN" name="ID_ADMIN" placeholder="Id Anda" >
									<br>-->
									<label for="">Nama Admin</label>
									<input type="text" class="form-control" id="NAMA_ADMIN" name="NAMA_ADMIN" placeholder="Nama Anda" >
									<br>
									<label for="">Password</label>
									<input type="password" class="form-control" id="PASSWORD" name="PASSWORD" placeholder="Password">
									<br>   
									
								</div>
								<div class="form-group">
									<label for="">Foto</label>
									<input type="file" name="userfile" size="20">
								</div>
								
							
								<button type="submit" class="btn btn-primary">Submit</button>
					<?php echo form_close(); ?>
					</div>


		<!-- jQuery Bootstrap -->
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> 
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
		<!-- Bootstrap JavaScript -->
		<!--<script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>-->
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
		
		<script>
	$(document).ready(function () {
	var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});
</script>
</body>
</html>