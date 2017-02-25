<?php
$id = $_GET['id'];

$konek = mysqli_connect("localhost", "root", "", "berita");

$perintah = "SELECT * FROM konten WHERE id = '$id'";

$hasil = mysqli_query($konek, $perintah);

$data = mysqli_fetch_array($hasil);

$foto = $data['photo'];

if ($foto == NULL) {
	$foto = "delfault.jpeg";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $data['judul'];?></title>
</head>
<body>
<a href="halaman.php">KEMBALI</a><br>

<?php echo $data['judul'];?>
<br>
<?php echo $data['isi'];?>
<br>
<img src="img/<?php echo $data['photo'];?>">
	
</body>
</html>