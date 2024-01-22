<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="bah.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Siswa</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0n0xVW2eSR50omGNYDnhzAbDSOXXcvSN1TPprVMTNDbiYZCxYb0017+AMvуTG2x" crossorigin="anonymous">
</head>

<body>
    <?php
    include "koneksi.php";
    $qry_get_siswa = mysqli_query($conn, "select*from siswa where id_siswa = '" . $_GET['id_siswa'] . "'");
    $dt_siswa = mysqli_fetch_array($qry_get_siswa);
    ?>
    <div class="container">
        <h3>Ubah Siswa</h3>
        <form action="proses_ubah_siswa.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_siswa" value="<?= $dt_siswa['id_siswa'] ?>" class="form-control">
            Nama Siswa:
            <input type="text" name="nama_siswa" value="<?= $dt_siswa['nama_siswa'] ?>" class="form-control">
            Tanggal Lahir:
            <input type="date" name="tanggal_lahir" value="<?= $dt_siswa['tanggal_lahir'] ?>" class="form-control">
            Gender:
            <?php
            $arr_gender = array('L' => 'Laki-Laki', 'P' => 'Perempuan');
            ?>
            <select name='gender' class='form-control'>
                <?php foreach ($arr_gender as $key_gender => $val_gender) : ?>
                    <option value="<?= $key_gender ?>" <?= ($key_gender == $dt_siswa['gender']) ? 'selected' : '' ?>>
                        <?= $val_gender ?>
                    </option>
                <?php endforeach ?>
            </select>
            Alamat:
            <textarea name="alamat" class="form-control" rows="4"><?= $dt_siswa["alamat"] ?></textarea>
            Kelas:
            <select name="id_kelas" class="form-control">
                <?php
                $qry_kelas = mysqli_query($conn, "SELECT * FROM kelas");
                while ($data_kelas = mysqli_fetch_array($qry_kelas)) {
                    $select = ($data_kelas['id_kelas'] == $dt_siswa['id_kelas']) ? "selected" : "";
                    echo '<option value="' . $data_kelas['id_kelas'] . '" ' . $select . '>' . $data_kelas['nama_kelas'] . '</option>';
                }
                ?>
            </select>
            Username:
            <input type="text" name="username" value="<?= $dt_siswa['username'] ?>" class="form-control">
            Password:
            <input type="password" name="password" value="" class="form-control">
            Foto Lama: <br>
            <img src="<?= $dt_siswa['photo'] ?>" alt="Foto Lama" width="150"><br>
            Ganti Foto:
            <input type="file" name="photo" class="form-control">
            <input type="submit" name="simpan" value="Ubah Siswa" class="btn btn-primary">
        </form>

        <a href="tampil_siswa.php" class="btn btn-secondary">Back</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMOLDO//ElJ19smozuHV6z3Iehds+3Ulb9Bn9P1x0x4" crossorigin="anonymous"></script>
</body>

</html>
