<?php
include 'api.php';
session_start();

$id = $_POST['artikel_id'];
$judul = $_POST['judul'];
$konten = $_POST['content'];
$editorUsername = $_SESSION['username'];
$upload_dir = "uploads/";
$uploaded_file = $upload_dir . basename($_FILES["image"]["name"]);
$querySelectPrevious = "SELECT judul, content FROM articles WHERE id = '" . $id . "'";
$result = $conn->query($querySelectPrevious);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $previousTitle = $row['judul'];
    $previousContent = $row['content'];
    $queryUpdate = "UPDATE articles SET judul = '$judul', content = '$konten', image_path = '$uploaded_file' WHERE id = $id";
    if ($conn->query($queryUpdate) === TRUE) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $uploaded_file);
        $history_query = "INSERT INTO article_history (article_id, editor_username, previous_title, previous_content, actions) VALUES ('$id', '$editorUsername', '$previousTitle', '$previousContent', 'update')";
        $conn->query($history_query);
        echo "<script>alert('Perubahan berhasil disimpan'); window.location = 'index.php'</script>";
    } else {
        echo "Error: " . $queryUpdate . "<br>" . $conn->error;
    }
} else {
    echo "Artikel tidak ditemukan.";
}
$conn->close();
?>