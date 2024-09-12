<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>bandify | Sign in</title>
</head>
<body>
    <div class="container">
        <a href="index.php">
            <h1 class="logo">bandify</h1>
            <p class="subtitle">let's make some noise together!</p>
        </a>
        <form action="signup.php" method="post">
           <input class="input_data" name="username" type="text" placeholder=" Username"><br>
           <input class="input_data" name="password" type="password" placeholder=" Password"><br>
           <button name="login_button" type="submit">log in</button><br>
           <a href="signup.php" class="button">sign up</a>
        </form>
    </div>
</body>
</html>