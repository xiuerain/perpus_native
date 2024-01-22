<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="tam.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0n0xVW2eSR50omGNYDnhzAbDSOXXcvSN1TPprVMTNDbiYZCxYb0017+AMvуTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h3>Tampil Siswa</h3>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>FOTO</th>
                    <th>NAMA SISWA</th>
                    <th>TANGGAL LAHIR</th>
                    <th>ALAMAT</th>
                    <th>GENDER</th>
                    <th>USERNAME</th>
                    <th>KELAS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $qry_siswa = mysqli_query($conn, "SELECT * FROM siswa JOIN kelas ON kelas.id_kelas = siswa.id_kelas");
                $no = 0;
                while ($data_siswa = mysqli_fetch_array($qry_siswa)) {
                    $no++;
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><img src="<?= $data_siswa['photo'] ?>" alt="Foto Siswa" width="50"></td>
                        <td><?= $data_siswa['nama_siswa'] ?></td>
                        <td><?= $data_siswa['tanggal_lahir'] ?></td>
                        <td><?= $data_siswa['alamat'] ?></td>
                        <td><?= $data_siswa['gender'] ?></td>
                        <td><?= $data_siswa['username'] ?></td>
                        <td><?= $data_siswa['nama_kelas'] ?></td>
                        <td>
                            <a href="ubah_siswa.php?id_siswa=<?= $data_siswa['id_siswa'] ?>" class="btn btn-success">Ubah</a> |
                            <a href="hapus.php?id_siswa=<?= $data_siswa['id_siswa'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <a href="dashboard.php" class="btn btn-secondary">Back</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMOLDO//ElJ19smozuHV6z3Iehds+3Ulb9Bn9P1x0x4" crossorigin="anonymous"></script>
</body>

</html>
