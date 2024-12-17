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
    <title>bandify | Create post</title>
</head>

<body>
    <?php
    include("../includes/headerLogged.inc.php");
    include("../includes/search.inc.php");

    // Retrieve the array $post from the URL parameters
    $post = $_GET["post"];
    ?>
    <div class="container">
        <a href="../index.php">
            <h1 class="logo">bandify</h1>
            <p class="subtitle">let's make some noise together!</p>
        </a>
        <form action="../includes/post.inc.php" method="post">
            <!-- Post id -->
            <input type="hidden" name="post-id" value="<?php echo $post[0]["postId"] ?>" readonly>

            <!-- Post title -->
            <input class="input-data" name="title" type="text" value="<?php echo $post[0]["title"]; ?>" required><br>

            <!-- Description -->
            <textarea class="input-data" name="description" rows="8"><?php echo $post[0]["description"]; ?></textarea><br>

            <!-- City name -->
            <select class="input-data input-city" name="city-name">
                <option value="<?php echo $post[0]["postCityId"]; ?>" selected><?php echo $cities[$post[0]["postCityId"]]["cityName"]; ?></option>
                <?php foreach ($cities as $city): ?>
                    <option value="<?php echo $city["cityId"] ?>">
                        <?php echo $city["cityName"]; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
            <button class="submit-button" name="post-update" type="submit">save</button><br>
        </form>
    </div>
</body>

</html>