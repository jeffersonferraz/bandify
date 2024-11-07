<?php
// user session status check
session_start();
if (!isset($_SESSION["userId"])) {
    // user is not logged in
    header("Location: login.php?error=user-not-logged-in");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/main.css">
    <title>bandify | Create post</title>
</head>
<body>
<?php
include("../includes/headerLogged.inc.php");
?>
<div class="container">
    <a href="../index.php">
        <h1 class="logo">bandify</h1>
        <p class="subtitle">let's make some noise together!</p>
    </a>
    <form action="../includes/post.inc.php" method="post">
        <input class="input-data" name="title" type="text" placeholder=" Title" required><br>
        <textarea class="input-data" name="description" rows="5" placeholder=" Description"></textarea><br>
        <button class="submit-button" name="post-submit" type="submit">create</button><br>
    </form>
</div>
</body>
</html>
