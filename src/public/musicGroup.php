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
    include "../classes/Db.class.php";
    include "../classes/MusicGroup.class.php";
    include "../classes/MusicGroupView.class.php";
    $group = new MusicGroupView();
?>
<div class="container">
    <div class="first-section">
        <div class="block block-foto">
        </div>
        <div class="block block-name">
            <h2>Hi [Bandname]</h2>
        </div>
    </div>

    <div class="second-section">
        <h4>test:</h4>
        <div class="block">
            <p> test </p>
        </div>
    </div>
</div>
</body>

</html>