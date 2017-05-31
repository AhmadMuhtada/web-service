<html>
	<head>
		<title>List Admin</title>
	</head>
<body>
<?php
	echo "<div class=judul><blink><marquee>$title</marquee></blink></div>";
	echo "<br><br>";
	echo "<center><table border='1'>
			<tr><th>No</th>
			<th>Id Admin</th>
			<th>Nama Admin</th>
			<th>Password</th>
			<th>Foto</th>
			
			</tr>";
			$no=1;
			foreach($admin as $b)
			{
			echo "<tr>
			<td>$no</td>
			<td>$b->ID_ADMIN</td>
			<td>$b->NAMA_ADMIN</td>
			<td>$b->PASSWORD</td>
			<td>$b->FOTO_ADMIN</td>
			
			</tr>";
	$no++;}
	echo "</table>";
	?>
	</body>
	</html>
	
	<style type="text/css">
	.table
	{
	float:left;
	margin-left:500px;
	}
	.judul
	{
	float:left;
	font-size:30px;
	color:Blue;
	}
	th
	{
	background-color:green;
	font-color:white;
	}
	tr,td,th{
	padding-left:40px;
	padding-top:20px;}
	</style>