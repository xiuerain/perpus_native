<?php
if ($_POST) {
    $nama_siswa = $_POST['nama_siswa'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_kelas = $_POST['id_kelas'];

    // File upload handling
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file already exists
    if (file_exists($target_file)) {
        echo "<script>alert('Sorry, file already exists.'); location.href='tambah_siswa.php';</script>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["photo"]["size"] > 500000) {
        echo "<script>alert('Sorry, your file is too large.'); location.href='tambah_siswa.php';</script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowed_formats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowed_formats)) {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG, and GIF files are allowed.'); location.href='tambah_siswa.php';</script>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.'); location.href='tambah_siswa.php';</script>";
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            include "koneksi.php";
            $insert = mysqli_query($conn, "INSERT INTO siswa (nama_siswa, tanggal_lahir, gender, alamat, username, password, id_kelas, photo) VALUES ('$nama_siswa', '$tanggal_lahir', '$gender', '$alamat', '$username', '" . md5($password) . "', '$id_kelas', '$target_file')") or die(mysqli_error($conn));

            if ($insert) {
                echo "<script>alert('Sukses menambahkan siswa'); location.href='tambah_siswa.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan siswa'); location.href='tambah_siswa.php';</script>";
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.'); location.href='tambah_siswa.php';</script>";
        }
    }
}
?>
