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
                <a href="../public/dashboard.php" class="border-fix-left">dashboard</a>
            </div>
            <div class="dropdown">
                <a href="../public/search.php" class="dropbtn">search</a>
                <div class="dropdown-content">
                    <a href="#">tinder</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="dropbtn">posts</a>
                <div class="dropdown-content">
                    <a href="../public/createPost.php">new post</a>
                    <a href="#">my posts</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="../public/profile.php" class="dropbtn border-fix-right"><?php echo $_SESSION["firstname"] ; ?></a>
                <div class="dropdown-content">
                    <a href="../public/profile.php">profile</a>
                    <a href="#">settings</a>
                    <a href="../includes/logout.inc.php" style="color: brown">logout</a>
                </div>
            </div>
        </div>
    </nav>
</body>
</html>