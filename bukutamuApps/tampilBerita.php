<!DOCTYPE html>
<html lang="en">
<head>
    <title>DAFTAR BERITA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .berita-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .berita-header {
            padding: 15px;
            border-bottom: 1px solid #eee;
            background: #f8f9fa;
            border-radius: 8px 8px 0 0;
        }
        .berita-content {
            padding: 20px;
        }
        .berita-image {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .komentar-section {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        .action-buttons {
            margin-left: 10px;
        }
        .action-buttons .btn {
            margin-left: 5px;
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-4">
    <h2 class="mb-4">DAFTAR BERITA</h2>
    <p class="text-muted mb-4">Berikut ini merupakan daftar berita yang populer.</p>

    <?php
    include "koneksi.php";
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_berita ORDER BY nomor ASC");
    
    while ($res = mysqli_fetch_array($sql)) {
    ?>
    <div class="berita-card">
        <div class="berita-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><?php echo htmlspecialchars($res['judul']); ?></h5>
                <div class="action-buttons">
                    <a href="editBerita.php?kdberita=<?php echo $res['nomor']; ?>" 
                       class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapusBerita.php?kdhapus=<?php echo $res['nomor']; ?>" 
                       class="btn btn-danger btn-sm">Hapus</a>
                </div>
            </div>
        </div>

        <div class="berita-content">
            <div class="row">
                <div class="col-md-4">
                    <img src="foto_berita/<?php echo htmlspecialchars($res['gambar']); ?>" 
                         class="berita-image" 
                         alt="Gambar Berita">
                </div>
                <div class="col-md-8">
                    <p class="mb-3"><?php echo nl2br(htmlspecialchars($res['isiberita'])); ?></p>
                    <p class="text-muted">
                        <small>Penulis: <?php echo htmlspecialchars($res['penulis']); ?></small>
                    </p>
                </div>
            </div>

            <div class="komentar-section">
                <h6 class="mb-3">Komentar</h6>
                <form action="tambahKomentar.php" method="POST">
                    <input type="hidden" name="id_berita" value="<?php echo $res['nomor']; ?>">
                    <div class="form-group">
                        <input type="text" 
                               name="nama_pengguna" 
                               class="form-control" 
                               placeholder="Nama Anda" 
                               required>
                    </div>
                    <div class="form-group">
                        <textarea name="isi_komentar" 
                                  class="form-control" 
                                  rows="3" 
                                  placeholder="Tulis komentar Anda" 
                                  required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                </form>

                <?php
                $stmt = $koneksi->prepare("SELECT * FROM komentar_berita WHERE id_berita = ? ORDER BY tanggal_komentar DESC");
                if ($stmt) {
                    $stmt->bind_param("i", $res['nomor']);
                    $stmt->execute();
                    $komentar = $stmt->get_result();
                    
                    if ($komentar->num_rows > 0) {
                        while ($row = $komentar->fetch_assoc()) {
                            ?>
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        <?php echo htmlspecialchars($row['nama_pengguna']); ?>
                                        <small class="ml-2">
                                            <?php echo date('d/m/Y H:i', strtotime($row['tanggal_komentar'])); ?>
                                        </small>
                                    </h6>
                                    <p class="card-text">
                                        <?php echo nl2br(htmlspecialchars($row['isi_komentar'])); ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<p class="text-muted mt-3">Belum ada komentar untuk berita ini.</p>';
                    }
                    $stmt->close();
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>

</body>
</html>