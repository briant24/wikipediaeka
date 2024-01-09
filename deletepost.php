<?php
include 'api.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $editorUsername = $_SESSION['username'];
    $querySelectPrevious = "SELECT judul, content FROM articles WHERE id = '" . $id . "'";
    $result = $conn->query($querySelectPrevious);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $previousTitle = $row['judul'];
        $previousContent = $row['content'];
        $queryDelete = "DELETE FROM articles WHERE id = $id";
        if ($conn->query($queryDelete) === TRUE) {
            $history_query = "INSERT INTO article_history (article_id, editor_username, previous_title, previous_content, actions) VALUES ('$id', '$editorUsername', '$previousTitle', '$previousContent', 'delete')";
            $conn->query($history_query);
            echo "<script>alert('Data berhasil dihapus'); window.location = 'index.php'</script>";
        } else {
            echo "Error: " . $queryDelete . "<br>" . $conn->error;
        }
    } else {
        echo "Artikel tidak ditemukan.";
    }
}
$conn->close();
?>