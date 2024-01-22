<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["upload"])) {
    // Proses upload foto di sini
    $uploadDir = "uploads/"; // Ganti dengan direktori tempat menyimpan foto
    $uploadFile = $uploadDir . basename($_FILES["photo"]["name"]);

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadFile)) {
        echo "Foto berhasil diupload.";
    } else {
        echo "Gagal mengupload foto.";
    }
} else {
    header("Location: tambah_foto.php");
}
?>
