<?php
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "berita");
//ambil data dari form
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$sizefile = $_FILES['photo']['size'];
$namafile = $_FILES['photo']['name'];
$lokasifile = $_FILES['photo']['tmp_name'];


//tujuan
$tujuan = "img/$namafile";
//perintah upload
$upload = move_uploaded_file($lokasifile, $tujuan);

$input = "INSERT INTO konten(judul,isi,photo) VALUES ('$judul','$isi','$namafile')";
$hasil = mysqli_query($konek,$input);
//apabila query untuk input data benar
if($hasil OR $upload)
{
	header("location:halaman.php");
}else{
	header("location:post.php");
}
?>