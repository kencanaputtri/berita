<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Berita</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php 
    include "koneksi.php";
    $sql = mysqli_query($koneksi,"SELECT * FROM tb_berita order by nomor asc");
?>
<div class="container">
    <h1 class="display-5">Daftar Berita</h1>
    <p>Berikut ini merupakan daftar berita paling populer di planet Bekasi.</p>
    <input type="button" value="Add Berita" onClick="document.location='addBerita.php'" class="btn btn-outline-primary"><br>

    <div class="table-responsive-sm">
        <table class="table table-hover" id="table-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Berita</th>
                <th>Isi Berita</th>
                <th>Gambar</th>
                <th>Penulis</th>
                <th width="20%">Opsi</th>
            </tr>
        </thead>
        <?php 
            $i=1;
            while ($data=mysqli_fetch_array($sql)) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data['judul'] ?></td>
                    <td><?php echo $data['isiberita'] ?></td>
                    <td><?php echo "<img src='foto_berita/$data[gambar]' width=100 height=100>"?></td>
                    <td><?php echo $data['penulis'] ?></td>
                    <td width="20%">
                            <a href="editBerita.php?kdberita=<?php echo $data['nomor'];?>">
                            <input type="button" value="Edit" class="btn btn-outline-warning btn-sm"></a>
                            <a href="hapusBerita.php?kdhapus=<?php echo $data['nomor'];?>">
                            <input type="button" value="Hapus" class="btn btn-outline-danger btn-sm"></a> 
                    </td>
                </tr>
            </tbody>
        <?php      
           $i++; }
        ?>
        </table>
    </div>
</div>
</body>
</html>
<!-- data tables -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- data tables css -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css">

<!-- data tables JS -->
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

<!-- data -->
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>

<!-- data tables JS -->
<script>
    $(document).ready(function(){
        $('#table-datatable').DataTable();
    });
</script>