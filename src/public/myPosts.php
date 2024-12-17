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
    <title>bandify | My Posts</title>
</head>

<body>
    <?php
    include("../includes/headerLogged.inc.php");
    include("../includes/post.inc.php");
    ?>
    <div class="container">
        <div class="first-section">
            <div class="block block-name">
                <h1>Posts created by <?php echo $_SESSION["firstname"]; ?></h1>
            </div>
        </div>

        <div class="second-section">
            <?php foreach ($posts as $post): ?>
                <form action="../includes/post.inc.php" method="post">
                    <div class="block buttons-post">
                        <div class="post-text">
                            <input type="hidden" name="post-id" value="<?php echo $post["postId"] ?>">
                            <h3><?php echo $post["title"]; ?></h3>
                            <p><?php echo $post["description"]; ?></p>
                        </div>
                        <div>
                            <button class="button-title" name="post-edit" type="submit">edit</button>
                            <button class="button-title button-delete" name="post-delete" type="submit">delete</button>
                        </div>
                    </div>

                </form>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>