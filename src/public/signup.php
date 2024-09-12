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
        <h1 class="logo">bandify</h1>
        <p class="subtitle">let's make some noise together!</p>
        <form action="signup.php" method="post">
           <input name="username" type="text" placeholder=" Username"><br>
           <input name="password" type="password" placeholder=" Password"><br>
           <input name="confirm_password" type="password" placeholder=" Confirm Password"><br>
           <input name="first_name" type="text" placeholder=" Firstname"><br>
           <input name="last_name" type="text" placeholder=" Lastname"><br>
           <input name="email" type="email" placeholder=" E-mail"><br>
           <button name="signup_button" type="submit">sign up</button><br>
           <a href="signin.php" class="button">sign in</a>
        </form>
    </div>
</body>
</html>