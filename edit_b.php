<?php

$id = $_GET['id'];

// koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "berita");

$hapus = "SELECT * FROM konten WHERE id = '$id'";

$hasil = mysqli_query($konek,$hapus);

$data = mysqli_fetch_array($hasil);

$foto = $data['photo'];
if ($foto == NULL) {
	$foto = "delfault.jpg";
}

?>

<h3>Update berita</h3>
<form method="POST" action="edit_bm.php" enctype="multipart/form-data">
	<img src="img/<?php echo $foto;?>" width="100px">

	<input type="hidden" value="<?php echo $data['photo'];?>" name="photolama">

	<input type="file" name="photo">
	<br>
	judul : <input type="text" name="judul" value="<?php echo $data['judul']; ?>"><br>

	<input type="hidden" name="id" value="<?php echo $data['id']; ?>">

	isi : 
<textarea name="isi" rows="5" COLS="30" ><?php echo $data['isi']; ?></textarea>
	<br>
<input type="submit" value="Kirim"><br>
</form>