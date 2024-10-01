<?php
require $_SERVER['DOCUMENT_ROOT'] . '/src/classes/User.class.php'; // Include User class to handle user creation

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all required fields are set
    if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) {
        // Validate password match
        if ($_POST['password'] !== $_POST['confirm_password']) {
            echo "Passwords do not match!";
            exit;
        }

        $user = new User();
        $data = [
            'firstname' => $_POST['first_name'],
            'lastname' => $_POST['last_name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];

        // Attempt to create the user
        if ($user->create($data)) {
            header('Location: success.php'); // Redirect to a success page
            exit;
        } else {
            echo "User creation failed!";
        }
    } else {
        echo "All fields are required!";
    }
}
?>

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
        <input class="input_data" name="first_name" type="text" placeholder=" Firstname" required><br>
        <input class="input_data" name="last_name" type="text" placeholder=" Lastname" required><br>
        <input class="input_data" name="email" type="email" placeholder=" E-mail" required><br>
        <input class="input_data" name="password" type="password" placeholder=" Password" required><br>
        <input class="input_data" name="confirm_password" type="password" placeholder=" Confirm Password" required><br>
        <button name="signup_button" type="submit">sign up</button><br>
        <a href="signin.php" class="button">sign in</a>
    </form>
</div>
</body>
</html>
