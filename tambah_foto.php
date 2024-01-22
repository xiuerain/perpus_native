<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0n0xVW2eSR50omGNYDnhzAbDSOXXcvSN1TPprVMTNDbiYZCxYb0017+AMvуTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="foto.css">
    <title>Tambah Foto</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Tambah Foto</h2>
        <form action="proses_tambah_foto.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="photo" class="form-label">Pilih Foto</label>
                <input type="file" class="form-control" name="photo" id="photo" required>
            </div>
            <input type="submit" name="upload" value="Upload Foto" class="btn btn-primary">
        </form>
        <a href="dashboard.php" class="btn btn-secondary mt-3">Back</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
