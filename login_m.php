<?php
session_start();

$konek = mysqli_connect("localhost","root","","berita");

$userid = $_POST['username'];
$password = $_POST['password'];
$op = $_GET['op'];

if ($op == "in") {
	$tampil = "SELECT * FROM user WHERE username = '$userid' AND password = '$password'";
	$cek = mysqli_query($konek, $tampil);

	if (mysqli_num_rows($cek) == 1) {

		//jika berhasil isi data di cek
		$c = mysqli_fetch_array($cek);
		$_SESSION['username'] = $c['username'];
		$_SESSION['level'] = $c['level'];


		if ($c['level']=="admin") {
			header("location:halaman.php");
		}
	}else{
		header("location:404.php");
	}

}else if($op == "out"){
	unset($_SESSION['username']);
	unset($_SESSION['level']);
	header("location:index.php");
}



?>