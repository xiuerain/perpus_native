<?php
include "koneksi.php";  // Make sure to include your database connection file

if ($_POST) {
    $id_siswa = $_POST['id_siswa'];
    $nama_siswa = $_POST['nama_siswa'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $id_kelas = $_POST['id_kelas'];

    // File upload handling
    $targetDir = 'uploads/';
    $targetFile = $targetDir . basename($_FILES['photo']['name']);

    // Check if a new file is uploaded
    if ($_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        // Move the uploaded file to the target location
        move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile);

        // Update the photo field in the database
        $update_photo = mysqli_query($conn, "UPDATE siswa SET photo='$targetFile' WHERE id_siswa='$id_siswa'");
        if (!$update_photo) {
            echo "<script>alert('Gagal update foto siswa');location.href='ubah_siswa.php?id_siswa=" . $id_siswa . "';</script>";
            exit;
        }
    }

    // Continue with updating other form fields
    $update_query = "UPDATE siswa SET 
        nama_siswa='$nama_siswa', 
        tanggal_lahir='$tanggal_lahir',
        gender='$gender',
        alamat='$alamat',
        username='$username',
        id_kelas='$id_kelas'
        WHERE id_siswa='$id_siswa'";

    $update = mysqli_query($conn, $update_query);
    if ($update) {
        echo "<script>alert('Sukses update siswa');location.href='tampil_siswa.php';</script>";
    } else {
        echo "<script>alert('Gagal update siswa');location.href='ubah_siswa.php?id_siswa=" . $id_siswa . "';</script>";
    }
}
?>
