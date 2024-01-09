<?php include('header.php');
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

<body>
    <div class="form">
        <h2>Buat Artikel</h2>
        <br>
        <form action="post-artikel-proccess.php" method="post" enctype="multipart/form-data">
            <label for="judul">Judul Artikel</label>
            <br>
            <input type="text" id="judul" name="judul" placeholder="Masukkan Judul" required>
            <br>
            <label for="content">Konten</label>
            <br>
            <textarea class="textarea" id="content" name="content" required></textarea>
            <br>
            <label for="image">Tambahkan gambar (opsional):</label>
            <input type="file" id="image" name="image">

            <input type="submit" value="Posting">
        </form>
    </div>
</body>

</html>