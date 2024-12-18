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
    $musicGroup = new MusicGroupView();
    $profile = new ProfileView();
?>
<div class="container">
    <div class="first-section">
        <div class="block block-foto">
        </div>
        <div class="block block-name">
            <h2>
                <?php
                    $group = $musicGroup->fetchMusicGroup($_SESSION['userId']);
                    echo $group[0]['groupName'];
                ?>
            </h2>
            <?php
            $admin = $musicGroup->fetchMusicGroupAdmin($_SESSION['userId']);
            if ($admin[0]['admin'] == 1) :
                echo
                '<div class="edit-button">
                    <a href="musicGroupSettings.php">Edit page <span>&#9998;</span></a>
                </div>';
            endif;
            ?>
        </div>
    </div>

    <div class="second-section">
        <div class="block-title">
            <h3>Group location:</h3>
        </div>
        <div class="block">
            <p>
                <?php
                    $city = $musicGroup->fetchMusicGroupCity($group[0]['groupId']);
                    echo $city[0]['cityName'] . ' / ' . $city[0]['state'];
                ?>
            </p>
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
            <p>
                <?php
                    $genre = $musicGroup->fetchMusicGroupInfluence($group[0]['groupId']);
                    echo $genre[0]['influenceName'] . ' / ' .$genre[0]['genre'];
                ?>
            </p>
        </div>

        <div class="block-title">
            <h3>Group created:</h3>
        </div>
        <div class="block">
            <p>
                <?php
                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $group[0]['created_at']);
                    echo $date->format('jS F Y');
                ?>
            </p>
        </div>
    </div>
</div>
</body>

</html>