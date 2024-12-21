<?php
include "koneksi.php";

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input ID berita
    $id_berita = filter_input(INPUT_POST, 'id_berita', FILTER_VALIDATE_INT);
    if ($id_berita === false || $id_berita === null) {
        die("Error: ID Berita tidak valid");
    }
    
    // Bersihkan input dari karakter berbahaya
    $nama_pengguna = filter_input(INPUT_POST, 'nama_pengguna', FILTER_SANITIZE_STRING);
    $isi_komentar = filter_input(INPUT_POST, 'isi_komentar', FILTER_SANITIZE_STRING);
    
    // Validasi apakah input kosong
    if (empty($nama_pengguna) || empty($isi_komentar)) {
        die("Error: Nama pengguna dan isi komentar harus diisi");
    }
    
    // Siapkan query dengan prepared statement
    $query = "INSERT INTO komentar_berita (id_berita, nama_pengguna, isi_komentar, tanggal_komentar) 
              VALUES (?, ?, ?, CURRENT_TIMESTAMP)";
              
    $stmt = mysqli_prepare($koneksi, $query);
    
    if ($stmt) {
        // Bind parameter ke prepared statement
        mysqli_stmt_bind_param($stmt, "iss", $id_berita, $nama_pengguna, $isi_komentar);
        
        // Eksekusi query
        if (mysqli_stmt_execute($stmt)) {
            // Jika berhasil, kembali ke halaman berita
            header("Location: tampilBerita.php#berita-" . $id_berita);
            exit();
        } else {
            // Jika gagal, tampilkan pesan error
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        
        // Tutup statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error dalam menyiapkan query: " . mysqli_error($koneksi);
    }
    
} else {
    // Jika bukan method POST, redirect ke halaman utama
    header("Location: tampilBerita.php");
    exit();
}

// Tutup koneksi database
mysqli_close($koneksi);
?>