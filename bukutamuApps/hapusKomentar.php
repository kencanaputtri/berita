<?php
include "koneksi.php";

if(isset($_GET['id'])) {
    $id_komentar = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    
    if($id_komentar) {
        $query = "DELETE FROM komentar_berita WHERE id_komentar = ?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, "i", $id_komentar);
        
        if(mysqli_stmt_execute($stmt)) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            echo "Gagal menghapus komentar.";
        }
        
        mysqli_stmt_close($stmt);
    }
}
mysqli_close($koneksi);
?>