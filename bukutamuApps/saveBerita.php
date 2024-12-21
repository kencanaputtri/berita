<?php
	include "koneksi.php";
	$judul = $_POST['judul'];
	$isiberita = $_POST['isiberita'];
	$vfoto=$_FILES['fupload'] ['name'];
	$tfoto =$_FILES['fupload'] ['tmp_name'];
	$dir1 ="foto_berita/";
    $penulis = $_POST['penulis'];
	
	$simpan=mysqli_query($koneksi,"INSERT into tb_berita(judul,isiberita,gambar,penulis) values 
		('$judul','$isiberita','$vfoto','$penulis')");
	$upload=$dir1.$vfoto;
	move_uploaded_file($tfoto, $upload);
?>
<script>
	document.location='tampilBerita.php'
</script>