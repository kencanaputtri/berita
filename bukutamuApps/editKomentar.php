<?php
include "koneksi.php";

// Ambil data komentar yang akan diedit
if(isset($_GET['id'])) {
    $id_komentar = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    $query = "SELECT * FROM komentar_berita WHERE id_komentar = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $id_komentar);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $komentar = mysqli_fetch_assoc($result);
}

// Proses update komentar
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_komentar = filter_var($_POST['id_komentar'], FILTER_VALIDATE_INT);
    $isi_komentar = mysqli_real_escape_string($koneksi, $_POST['isi_komentar']);
    
    $query = "UPDATE komentar_berita SET isi_komentar = ? WHERE id_komentar = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "si", $isi_komentar, $id_komentar);
    
    if(mysqli_stmt_execute($stmt)) {
        header("Location: tampilBerita.php?id_berita=" . $komentar['id_berita']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Komentar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Komentar</h2>
        <form method="POST">
            <input type="hidden" name="id_komentar" value="<?php echo $komentar['id_komentar']; ?>">
            
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($komentar['nama_pengguna']); ?>" readonly>
            </div>
            
            <div class="form-group">
                <label>Komentar:</label>
                <textarea name="isi_komentar" class="form-control" required><?php echo htmlspecialchars($komentar['isi_komentar']); ?></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Komentar</button>
            <a href="tampilBerita.php?id_berita=<?php echo $komentar['id_berita']; ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>