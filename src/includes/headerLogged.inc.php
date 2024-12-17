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
            <a href="#" class="dropbtn">Dashboard</a>
            <div class="dropdown-content">
                <a href="../public/dashboard.php">Profile page</a>
                <a href="../public/musicGroup.php" class="fix-border">Music group</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#" class="dropbtn">Search</a>
            <div class="dropdown-content">
                <a href="../public/search.php">Manual</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#" class="dropbtn">Posts</a>
            <div class="dropdown-content">
                <a href="../public/createPost.php">New post</a>
                <a href="../public/myPosts.php" class="fix-border">My posts</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#" class="dropbtn border-fix-right"><?php echo $_SESSION["firstname"] ; ?></a>
            <div class="dropdown-content">
                <a href="../public/profile.php">Profile settings</a>
                <a href="../includes/logout.inc.php" class="fix-border" style="color: brown">Logout</a>
            </div>
        </div>
    </div>
</nav>
</body>
</html>