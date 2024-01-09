<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<div class="container">
    <header>
        <div class="header-left">
            <button id="menu-icon" class="btn-kiri-logo">&#9776;</button>
            <a href="index.php">
                <img src="assets/logo-wikipedia.svg" alt="Wikipedia Logo">
            </a>
            <a href="index.php">
                <img src="assets/logo-kanan.png" alt="Another Logo" style="width: fit-content;">
            </a>
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Search Wikipedia">
                <button type="button" class="search-button">Search</button>
            </div>
        </div>
        <div class="header-right">
            <?php
                session_start();
                if (isset($_SESSION['username'])) {
                    // Jika user sudah login, tampilkan nama user dan tombol keluar
                    echo '<span>Selamat datang, ' . $_SESSION['username'] . '!</span>';
                    echo '<br>';
                    echo '<a href="post-artikel-page.php">Buat Artikel</a>';
                    echo '<a href="logout.php">Keluar</a>';
                } else {
                    // Jika user belum login, tampilkan tombol buat akun dan masuk
                    echo '<a href="register.php">Buat Akun</a>';
                    echo '<a href="login.php">Masuk</a>';
                }
                ?>
        </div>
    </header>
</div>