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
            <div class="dropdown">
                <a href="" class="dropbtn border-fix-left">Dashboard</a>
                <div class="dropdown-content">
                    <a href="../public/dashboard.php"><?php echo $_SESSION["firstname"]; ?>'s Profile</a>
                    <a href="../public/musicGroup.php" class="fix-border">Music Group Profile</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="../public/search.php" class="dropbtn">Search</a>
                <div class="dropdown-content">
                    <a href="../public/search.php">Manual</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="dropbtn">Posts</a>
                <div class="dropdown-content">
                    <a href="../public/createPost.php">New Post</a>
                    <a href="../public/myPosts.php" class="fix-border">My Posts</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="../public/profile.php" class="dropbtn border-fix-right"><?php echo $_SESSION["firstname"]; ?></a>
                <div class="dropdown-content">
                    <a href="../public/profile.php">Profile settings</a>
                    <a href="../includes/logout.inc.php" class="fix-border" style="color: brown">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>
</body>

</html>