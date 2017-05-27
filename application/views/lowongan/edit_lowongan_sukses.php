   <?php 

 	echo "Data telah berhasil di update";

	echo "</br>";
	echo anchor('lowongan/update/'.$this->uri->segment(3), 'Update Data Lagi');
 ?>