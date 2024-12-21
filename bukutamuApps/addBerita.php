<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <div class="container">
    <h1>Form add berita</h1>
    <form action="saveBerita.php" method="POST" enctype="multipart/form-data">
    
    <div class="mb-3">
    <label for="judul" class="form-label">Judul</label>
    <input type="text" class="form-control" id="judul" name="judul">
    </div>

    <div class="mb-3">
    <label for="isiberita" class="form-label">Isi Berita</label>
    <textarea class="form-control" id="isiberita" rows="3" name="isiberita"></textarea>
    </div>

    <div class="mb-3">
    <label for="formFile" class="form-label">Tambahkan Gambar</label>
    <input class="form-control" type="file" id="formFile" name="fupload">
    </div>
  
    <div class="mb-3">
    <label for="penulis" class="form-label">Nama Penulis</label>
    <input type="text" class="form-control" id="penulis" name="penulis">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<body>
    
</body>
</html>