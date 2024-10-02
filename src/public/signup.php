<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/main.css">
    <title>bandify | Sign up</title>
</head>
<body>
    <div class="container">
        <a href="../index.php">
            <h1 class="logo">bandify</h1>
            <p class="subtitle">let's make some noise together!</p>
        </a>
        <form action="../includes/signup.inc.php" method="post">
           <input class="input_data" name="firstname" type="text" placeholder=" Firstname" required><br>
           <input class="input_data" name="lastname" type="text" placeholder=" Lastname" required><br>
           <input class="input_data" name="email" type="email" placeholder=" E-mail" required><br>
           <input class="input_data" name="password" type="password" placeholder=" Password" required><br>
           <input class="input_data" name="passwordRepeat" type="password" placeholder=" Confirm Password" required><br>
           <button name="signup-submit" type="submit">sign up</button><br>
           <a href="login.php" class="button">log in</a>
        </form>
        <?php

        require '../classes/User.class.php';

        if (isset($_POST['signup_button'])) {
            $user = new User();
            $data = [
                'firstname' => $_POST['first_name'],
                'lastname' => $_POST['last_name'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];

            if ($user->create($data)) {

                echo "User created successfully!";

            } else {

                echo "Please fill in all required fields.";
            }
        }
        ?>
    </div>
</body>
</html>