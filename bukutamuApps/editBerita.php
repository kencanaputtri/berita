<?php
include "koneksi.php"; // Pastikan file koneksi.php ada di direktori yang sama

$nomor = $_GET['kdberita'];
$edit=mysqli_query($koneksi, "select* from tb_berita where nomor='$nomor'");
$r=mysqli_fetch_array($edit);


?>

<form method="post" action="saveBerita.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $nomor; ?>">
    <table border="0.2">
        <tr>
            <th colspan="4" align="center">EDIT BERITA</th>
        </tr>
        <tr>
            <td>Judul</td>
            <td><input type="text" name="judul" size="60" value="<?php echo $r['judul']; ?>"></td>
        </tr>
        <tr>
            <td>Penulis</td>
            <td><input type="text" name="penulis" size="60" value="<?php echo $r['penulis']; ?>"></td>
        </tr>
        <tr>
            <td>Isi Berita</td>
            <td><textarea rows="5" cols="45" name="isiberita"><?php echo $r['isiberita']; ?></textarea></td>
        </tr>
        <tr>
            <td>Gambar</td>
            <td><img src="foto_berita/<?php echo $r['gambar']; ?>" width="150" height="150"></td>
        </tr>
        <tr>
            <td>Ganti Gambar</td>
            <td><input type="file" name="fupload" size="40"></td>
        </tr>
        <tr>
            <td colspan="2">*) Apabila gambar tidak diubah, dikosongkan saja.</td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Update">
                <input type="button" value="Batal" onclick="self.history.back()">
            </td>
        </tr>
    </table>
</form>