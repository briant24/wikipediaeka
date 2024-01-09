<?php
include 'api.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM tb_user WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];

        if (password_verify($password, $hashed_password)) {
            $_SESSION['username']  = $username;
            $_SESSION['id']   = $row['id'];
            if (!empty($_POST["remember"])) {
                setcookie("username", $_POST["username"], time() + (365 * 24 * 60 * 60));
                setcookie("password", $_POST["password"], time() + (365 * 24 * 60 * 60));
            } else {
                setcookie("username", "");
                setcookie("password", "");
            }
            echo "<script>alert('Berhasil masuk'); window.location = 'index.php'</script>";
        } else {
            echo "<script>alert('Login gagal, password salah'); window.location = 'login.php'</script>";
        }
    } else {
        echo "<script>alert('Login gagal pengguna tidak ditemukan'); window.location = 'login.php'</script>";
    }
}

$conn->close();
?>