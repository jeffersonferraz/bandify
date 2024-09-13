<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>bandify | Sign up</title>
</head>
<body>
    <div class="container">
        <a href="index.php">
            <h1 class="logo">bandify</h1>
            <p class="subtitle">let's make some noise together!</p>
        </a>
        <form action="signup.php" method="post">
           <input class="input_data" name="first_name" type="text" placeholder=" Firstname"><br>
           <input class="input_data" name="last_name" type="text" placeholder=" Lastname"><br>
           <input class="input_data" name="email" type="email" placeholder=" E-mail"><br>
           <input class="input_data" name="password" type="password" placeholder=" Password"><br>
           <input class="input_data" name="confirm_password" type="password" placeholder=" Confirm Password"><br>
           <button name="signup_button" type="submit">sign up</button><br>
           <a href="signin.php" class="button">sign in</a>
        </form>
    </div>
</body>
</html>