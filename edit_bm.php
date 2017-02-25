<?php
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "berita");
//ambil data dari form

$id = $_POST['id'];

$lokasifoto = $_FILES['photo']['tmp_name'];
$namafoto = $_FILES['photo']['name'];
$fotolama = $_POST['photolama'];

$judul = $_POST['judul'];
$isi = $_POST['isi'];

if ($namafoto != NULL) {
	//hapus foto
	unlink("img/$fotolama");
	//upload foto baru
	$tujuan = "img/$namafoto";
	move_uploaded_file($lokasifoto, $tujuan);

	$foto = $namafoto;
}else{
	$foto = $fotolama;
}

$update = "UPDATE konten SET judul = '$judul', isi = '$isi', photo ='$foto' WHERE id='$id'";

$hasil = mysqli_query($konek,$update);

//apabila query untuk input data benar
if($hasil)
{
	header("location:halaman.php");
}else{
	header("Update berita Gagal");
}
?>