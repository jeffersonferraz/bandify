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
    include "../classes/Profile.class.php";
    include "../classes/ProfileView.class.php";
    $profile = new ProfileView();
?>
<div class="container">
    <div class="first-section">
        <div class="block block-foto">
        </div>
        <div class="block block-name">
            <h2>Hi <?php echo $_SESSION["firstname"] . ' ' . $_SESSION['lastname']; ?></h2>
        </div>
    </div>

    <div class="second-section">
        <div class="block">
            <h4>Bio:</h4>
            <p> <?php $profile->fetchBio($_SESSION['userId']); ?> </p>
        </div>
        <div class="block">
            <h4>City:</h4>
            <p>
                <?php
                    $city = $profile->fetchCity($_SESSION['userId']);
                    echo $city[0]['cityName'] . ", " . $city[0]['state'];
                ?>
            </p>
        </div>
        <div class="block">
           <h4>Instrument:</h4>
            <p>
                <?php
                    $instrument = $profile->fetchInstrument($_SESSION['userId']);
                    echo $instrument[0]['instrumentName'];
                ?>
            </p>
        </div>
        <div class="block">
            <h4>Influence:</h4>
            <p>
                <?php
                    $influencer = $profile->fetchInfluence($_SESSION['userId']);
                    echo $influencer[0]['influenceName'] . ' / ' . $influencer[0]['genre'];
                ?>
            </p>
        </div>
    </div>
</div>
</body>

</html>