<?php include('header.php');
include 'api.php';
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Artikel</title>
    <style>
    textarea {
        width: 86.5%;
        height: 300px;
        box-sizing: border-box;
    }
    </style>
</head>
<?php
if(isset($_GET['id'])){
    $articleId = $_GET['id'];
    $result = $conn->query("SELECT * FROM articles WHERE id = $articleId");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $judul = $row['judul'];
        $konten = $row['content'];
    ?>
<body>
    <div class="form">
        <h2>Edit Artikel</h2>
        <br>
        <form action="edit-artikel-proccess.php" method="post" enctype="multipart/form-data">
            <label for="judul">Judul Artikel</label>
            <br>
            <input type="text" id="judul" name="judul" value="<?php echo $judul; ?>" required>
            <br>
            <label for="content">Konten</label>
            <br>
            <textarea class="textarea" id="content" name="content" required><?php echo $konten; ?></textarea>
            <br>
            <label for="image">Tambahkan gambar (opsional):</label>
            <input type="file" id="image" name="image">
            <input type='hidden' name='artikel_id' value=<?php echo $articleId; ?>>
            <input type="submit" value="Rubah">
        </form>
    </div>
    <?php 
     }else {
        echo "Artikel not found.";
    }
} else {
    echo "ID parameter not provided.";
}
$conn->close();
?>
</body>

</html>