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
<?php
    include("../includes/headerLogged.inc.php");
?>
<div class="container">
    <div class="first-section">
        <div class="block block-name">
            <h1>Posts created by <?php echo $_SESSION["firstname"] ; ?></h1>
        </div>
    </div>

    <div class="second-section">
        <div class="block buttons-post">
            <div class="post-text">
                <h3>Post name 1</h3>
                <p>Post description</p>
            </div>
            <div>
                <button class="button-title">edit</button>
                <button class="button-title button-delete">delete</button>
            </div>
        </div>
        <div class="block buttons-post">
            <div class="post-text">
                <h3>Post name 2</h3>
                <p>Post description</p>
            </div>
            <div>
                <button class="button-title">edit</button>
                <button class="button-title button-delete">delete</button>
            </div>
        </div>
        <div class="block buttons-post">
            <div class="post-text">
                <h3>Post name 3</h3>
                <p>Post description</p>
            </div>
            <div>
                <button class="button-title">edit</button>
                <button class="button-title button-delete">delete</button>
            </div>
        </div>
    </div>
</div>
</body>

</html>