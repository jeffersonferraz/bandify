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
$userCity = $profile->fetchCity($_SESSION['userId']);
$userInstrument = $profile->fetchInstrument($_SESSION['userId']);
$userInfluence = $profile->fetchInfluence($_SESSION['userId']);
?>
<form action="../includes/profileInfo.inc.php" method="post">
    <div class="container">
        <div class="first-section">
            <div class="block block-foto">
            </div>
            <div class="block block-name">
                <h2>Hi <?php echo $_SESSION["firstname"] ; ?></h2>
            </div>
        </div>

        <div class="second-section">
            <h3>Change your bio here:</h3>
            <div class="block">
                <textarea name="bio" cols="200" rows="10"><?php $profile->fetchBio($_SESSION['userId']); ?></textarea>
            </div>
            <h3>Change your city here:</h3>
            <div class="block">
                <select name="city">
                    <option value="<?= $userCity[0]['cityId'] ?>"><?= $userCity[0]['cityName'] ?></option>
                    <option disabled>- Choose a city -</option>
                    <?php foreach ($profile->fetchAllCities() as $city) : ?>
                        <option value="<?= $city['cityId'] ?>"><?= $city['cityName'] ?></option>
                    <?endforeach;?>
                </select>
            </div>
            <h3>Change your instrument here:</h3>
            <div class="block">
                <select name="instrument">
                    <option value="<?= $userInstrument[0]['instrumentId'] ?>"><?= $userInstrument[0]['instrumentName'] ?> </option>
                    <option disabled>- Choose an instrument -</option>
                    <?php foreach ($profile->fetchAllInstruments() as $instrument) : ?>
                        <option value="<?= $instrument['instrumentId'] ?>"> <?= $instrument['instrumentName'] ?> </option>
                    <?endforeach;?>
                </select>
            </div>
            <h3>Change your influencer here:</h3>
            <div class="block">
                <select name="influence">
                    <option value="<?= $userInfluence[0]['influenceId'] ?>"><?= $userInfluence[0]['influenceName'] . ' / ' . $userInfluence[0]['genre'] ?> </option>
                    <option disabled>- Choose an influencer -</option>
                    <?php foreach ($profile->fetchAllInfluences() as $influence) : ?>
                        <option value="<?= $influence['influenceId'] ?>"> <?= $influence['influenceName'] . ' / ' . $influence['genre']?> </option>
                    <?endforeach;?>
                </select>
            </div>
        </div>
        <button type="submit" name="submit">SAVE</button>
    </div>
</form>
</body>

</html>