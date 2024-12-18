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
include "../classes/Profile.class.php";
include "../classes/ProfileView.class.php";
include "../classes/Data.class.php";
include "../classes/DataView.class.php";
$musicGroup = new MusicGroupView();
$profile = new ProfileView();
$data = new DataView();
$group = $musicGroup->fetchMusicGroup($_SESSION['userId']);
$city = $musicGroup->fetchMusicGroupCity($group[0]['groupId']);
$genre = $musicGroup->fetchMusicGroupInfluence($group[0]['groupId']);
?>
<form action="../includes/musicGroupInfo.inc.php" method="post">
    <div class="container">
        <div class="first-section">
            <div class="block block-foto">
            </div>
            <div class="block block-name">
                <textarea name="groupName" cols="25" rows="1"><?= $group[0]['groupName']; ?></textarea>
            </div>
        </div>

        <div class="second-section">
            <div class="block-title">
                <h3>Group location:</h3>
            </div>
            <div class="block">
                <select name="city">
                    <option value="<?= $city[0]['cityId'] ?>"><?= $city[0]['cityName'] ?></option>
                    <option disabled>- Choose a city -</option>
                    <?php foreach ($data->fetchAllCities() as $city) : ?>
                        <option value="<?= $city['cityId'] ?>"><?= $city['cityName'] ?></option>
                    <?endforeach;?>
                </select>
            </div>

            <div class="block-title">
                <h3>Members:</h3>
            </div>
            <div class="block">
                <ul>
                    <?php
                    $members = $musicGroup->fetchMusicGroupMember($group[0]['groupId']);
                    foreach ($members as $member) {
                        $instrument = $profile->fetchInstrument($member['userId']);
                        echo '<div class="block">' . $member['firstname'] . ' ' . $member['lastname'] . ' / ' . $instrument[0]['instrumentName'] . '</div>';
                    }
                    ?>
                </ul>
            </div>

            <div class="block-title">
                <h3>Influence:</h3>
            </div>
            <div class="block">
                <select name="influence">
                    <option value="<?= $genre[0]['influenceId'] ?>"><?= $genre[0]['influenceName'] . ' / ' . $genre[0]['genre'] ?> </option>
                    <option disabled>- Choose an influencer -</option>
                    <?php foreach ($data->fetchAllInfluences() as $influence) : ?>
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