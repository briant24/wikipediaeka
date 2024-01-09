<?php
include 'api.php';

session_start();

$title = $_POST["judul"];
$content = $_POST["content"];
$author = $_SESSION['username'];

$upload_dir = "uploads/";
$uploaded_file = $upload_dir . basename($_FILES["image"]["name"]);

$query = "INSERT INTO articles (judul, content, penulis, image_path) VALUES ('$title', '$content', '$author', '$uploaded_file')";

if ($conn->query($query) === TRUE) {
    // Pindahkan file gambar ke direktori uploads (jika diunggah)
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploaded_file)) {
        echo "Artikel berhasil diposting dengan gambar!";
        echo "<script>window.location = 'index.php'</script>";
    } else {
        echo "Artikel berhasil diposting tanpa gambar.";
        echo "<script>window.location = 'index.php'</script>";
    }
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

// Tutup koneksi setelah digunakan
$conn->close();
?>