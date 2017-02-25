<a href="login.php">Login</a><br>
<?php
error_reporting(E_ALL ^ (E_NOTICE));
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "berita");

$tampil = "SELECT * FROM konten";


$hasil = mysqli_query($konek,$tampil);

?>

<table border="1">
	<tr>
		<th>no</th>
		<th>judul</th>
		<th>post</th>
	</tr>
<?php

	//penomoran
	$no = $posisi + 1;

	//tampil nama, email dan pesan
	while($data=mysqli_fetch_array($hasil)){
		echo "<tr>";
		echo "<td>$no</td>";
		echo "<td>$data[judul]</td>";
		echo "<td>
				<a href='berita.php?id=$data[id]'>detail</a></td>";
		echo "</tr>";
		$no++;


}


?>