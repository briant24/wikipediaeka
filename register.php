<?php include('header.php'); ?>
<div class="form">
    <div class="header-form">
        <h1>Create account</h1>
    </div>
    <br>
    <hr>
    <h3>Tools</h3>
    <hr>
    <div class="main-form">
        <form action="user-register.php" method="post">
            <label for="username">Username</label>
            <br>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
            <br>
            <label>Your username is public and cannod be made private later.</label>
            <br>
            <br>
            <label for="password">Password</label>
            <br>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <br>
            <label>It is recommended to use a unique password that you are not using on any other website</label>
            <br>
            <br>
            <label for="confirm-password">Confirm Password</label>
            <br>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter your password again" required>
            <br>
            <label for="email">Email address (recommended)</label>
            <br>
            <input type="email" id="email" name="email" placeholder="Enter your email address">
            <br>
            <label>Email is required to recover your account if you lose your password.</label>
            <br>
            <label>To protect the wiki against automated account creation, we kindly ask you to enter the words that appear below in the box </label>
            <a href="#">(more info):</a>
            <br>
            <br>
            <label>CAPTCHA Security Check</label>
            <br>
            <br>
            <button class="btn-login" type="submit">Create your account</button>
        </form>
    </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>
