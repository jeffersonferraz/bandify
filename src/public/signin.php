<?php
require $_SERVER['DOCUMENT_ROOT'] . '/src/classes/User.class.php'; // Include User class for login functionality

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'], $_POST['password'])) {
        $user = new User();
        $loginData = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];

        // Attempt to log the user in
        if ($user->login($loginData)) {
            header('Location: dashboard.php'); // Redirect to a dashboard or homepage
            exit;
        } else {
            echo "Login failed! Please check your credentials.";
        }
    } else {
        echo "Email and password are required!";
    }
}
?>

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
    <form action="signin.php" method="post">
        <input class="input_data" name="email" type="email" placeholder=" E-mail" required><br>
        <input class="input_data" name="password" type="password" placeholder=" Password" required><br>
        <button name="login_button" type="submit">log in</button><br>
        <a href="signup.php" class="button">sign up</a>
    </form>
</div>
</body>
</html>
