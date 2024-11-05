<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/main.css">
    <title>bandify | Log in</title>
</head>
<body>
    <div class="container">
        <a href="../index.php">
            <h1 class="logo">bandify</h1>
            <p class="subtitle">let's make some noise together!</p>
        </a>
        <form action="../includes/login.inc.php" method="post">
            <input class="input-data" name="email" type="email" placeholder=" E-mail"><br>
            <input class="input-data" name="password" type="password" placeholder=" Password"><br>
            <button class="submit-button" name="login-submit" type="submit">log in</button><br>
            <a href="signup.php" class="button">sign up</a>
        </form>
    </div>
</body>
</html>