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
                <a href="../public/dashboard.php">dashboard</a>
            </div>
            <div>
                <a href="../public/createPost.php">post</a>
            </div>
            <div>
                <a href="#">search</a>
            </div>
            <div class="dropdown">
                <a class="dropbtn"><?php echo $_SESSION["firstname"] ; ?></a>
                <div class="dropdown-content">
                    <a href="logout.inc.php">logout</a>
                </div>
            </div>
        </div>
    </nav>
</body>
</html>