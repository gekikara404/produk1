<a href="login.php">Login</a><br>
<hr>
<form action="index.php" method="GET">
	<input type="text" name="s">
	<input type="submit" value="CARI" name="cari">

</form>
<hr>
<?php
error_reporting(E_ALL ^ (E_NOTICE));
$batas = 5;
$halaman = $_GET['halaman'];

if (empty($halaman)) {
	$posisi = 0;
	$halaman = 1;
}else{
	$posisi = ($halaman - 1) * $batas;
}

//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "berita");

if (isset($_GET['cari'])) {
	$q = $_GET['s'];
	$tampil = "SELECT * FROM konten WHERE judul LIKE '%$q%' ORDER BY judul LIMIT $posisi, $batas";
}else{
	//query menampilkan data
	$tampil = "SELECT * FROM konten LIMIT $posisi, $batas";
}


$hasil = mysqli_query($konek,$tampil);

$jmlhasil = mysqli_num_rows($hasil);


?>

<table border="1">
	<tr>
		<th>no</th>
		<th>judul</th>
		<th>post</th>
	</tr>
<?php

if ($jmlhasil < 1) {
	echo "<tr>";
	echo "<td colspan='5'>data yang ada cari tidak ada</td>";
	echo "</tr>";
	}else{

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
}


?>
</table>

<?php
//untuk pagging
$tampil2 = "SELECT * FROM konten";
$hasil2 = mysqli_query($konek, $tampil2);
$jmldata = mysqli_num_rows($hasil2);
$jmlhalaman = ceil($jmldata / $batas);

echo " jumlah data : $jmldata <br>";

for ($i=1; $i <= $jmlhalaman; $i++) { 
	if ($i != $halaman) {
		echo "<a href=$_SERVER[PHP_SELF]?halaman=$i> $i </a>";
	}else{
		echo " <b> $i </b>";
	}
}

?>