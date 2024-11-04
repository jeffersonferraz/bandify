<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/blocks.css">
    <title>bandify | Let's make some noise together!</title>
</head>

<body>
<nav>
    <ul class="menu">
        <a href="../index.php">
            <li>home</li>
        </a>
        <a href="createPost.php">
            <li>create post</li>
        </a>
        <a href="../includes/logout.inc.php">
            <li>logout</li>
        </a>
    </ul>
</nav>
<div class="container">
    <div class="first-section">
        <div class="block block-foto">
            <p>foto</p>
        </div>
        <div class="block block-name">
            <h2>Hi <?php echo $_SESSION["firstname"]; ?></h2>
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