<?php
include "koneksi.php";

mysqli_query($koneksi,"DELETE from tb_berita WHERE nomor='$_GET[kdhapus]'");
?>
<script>document.location='tampilBerita.php'</script>