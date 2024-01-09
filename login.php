<?php include('header.php'); ?>
<div class="form">
    <div class="header-form">
        <h1>Log in</h1>
    </div>
    <br>
    <hr>
    <h3>Tools</h3>
    <hr>
    <div class="main-form">
        <form action="login-check.php" method="post">
            <label for="username">Username</label>
            <br>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
            <br>
            <label for="password">Password</label>
            <br>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <br>
            <label class="tahan">
                <input class="checkbox" type="checkbox" checked="checked" name="remember"> Ingat saya (sampai satu
                tahun)
            </label>
            <br>
            <br>
            <button class="btn-login" type="submit">Login</button>
            <br>
            <br>
            <label class="help-log">Help with logging in</label>
            <br>
            <br>
            <label class="help-log-2">Forgot your password?</label>
            <br>
            <br>
            <img src="assets/man-removebg-preview.png" class="img-org">
        </form>
    </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>