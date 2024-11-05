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
    <link rel="stylesheet" href="../style/blocks.css">
    <link rel="stylesheet" href="../style/dashboard.css">
    <title>bandify | Let's make some noise together!</title>
</head>

<body>
<nav>
    <div class="menu">
        <div>
            <a href="../index.php">home</a>
        </div>
        <div>
            <a href="createPost.php">create post</a>
        </div>
        <div class="dropdown">
            <a class="dropbtn"><?php echo $_SESSION["firstname"] ; ?></a>
            <div class="dropdown-content">
                <a href="../includes/logout.inc.php">logout</a>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="first-section">
        <div class="block block-foto">
            <p>foto</p>
        </div>
        <div class="block block-name">
            <h2>Hi <?php echo $_SESSION["firstname"] ; ?></h2>
        </div>
    </div>

    <div class="second-section">
        <div class="block">
            <p>test</p>
        </div>
        <div class="block">
            <p>test</p>
        </div>
        <div class="block">
            <p>test</p>
        </div>
        <div class="block">
            <p>test</p>
        </div>
    </div>
</div>
</body>

</html>