<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/main.css">
    <title>bandify | Sign up</title>
</head>
<body>
    <?php
    include("../includes/header.inc.php");
    ?>
    <div class="container">
        <a href="../index.php">
            <h1 class="logo">bandify</h1>
            <p class="subtitle">let's make some noise together!</p>
        </a>
        <form action="../includes/signup.inc.php" method="post">
           <input class="input-data" name="firstname" type="text" placeholder=" Firstname" required><br>
           <input class="input-data" name="lastname" type="text" placeholder=" Lastname" required><br>
           <input class="input-data" name="email" type="email" placeholder=" E-mail" required><br>
           <input class="input-data" name="password" type="password" placeholder=" Password" required><br>
           <input class="input-data" name="passwordRepeat" type="password" placeholder=" Confirm Password" required><br>
           <button class="submit-button" name="signup-submit" type="submit">sign up</button><br>
           <a href="login.php" class="button">log in</a>
        </form>
    </div>
</body>
</html>