<?php
    // should be removed(?)
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">
    <title>bandify | Let's make some noise together!</title>
</head>

<body>
    <nav>
        <ul class="menu">
            <a href="index.php">
                <li>home</li>
            </a>
            <a href="public/createPost.php">
                <li>search</li>
            </a>
            <a href="public/login.php">
                <li>login</li>
            </a>
        </ul>
    </nav>
    <div class="container">
        <h1 class="logo">bandify</h1>
        <p class="subtitle">let's make some noise together!</p>
        <a href="public/signup.php" class="button">sign up</a>
    </div>
</body>

</html>