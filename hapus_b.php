<?php

$id = $_GET['id'];

echo $id;

// koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "berita");

$carifoto = "SELECT photo FROM konten WHERE id = '$id'";

$hapus = "DELETE FROM konten WHERE id='$id'";

//mencari foto
$hasilfoto = mysqli_query($konek,$carifoto);
$foto = mysqli_fetch_array($hasilfoto);

//menghapus foto
unlink("img/$foto[photo]");

//menghapus record dari database
$hasil = mysqli_query($konek,$hapus);

if($hasil){
	header("location:halaman.php");
}else{
	echo "GAGAL HAPUS";
}

?>