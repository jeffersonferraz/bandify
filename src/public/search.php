<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/tabs.css">
    <title>bandify | Manual Search</title>
</head>
<body>
<?php
// header output: user log in check
if (isset($_SESSION["userId"])) {
    // user is logged in
    include("../includes/headerLogged.inc.php");
    include("../includes/search.inc.php");
} else {
    // user is not logged in
    include("../includes/header.inc.php");
}
?>
<div class="container">

        <h1><a class="logo" href="../index.php">bandify</a></h1>
        <p class="subtitle">let's make some noise together!</p>

    <!-- tabs -->
    <div>
        <button class="tab" onclick="openSearch('post')">post</button>
        <button class="tab" onclick="openSearch('musician')">musician</button>
        <button class="tab" onclick="openSearch('music-group')">group</button>
    </div>

    <div id="post" class="category">
        <form action="../includes/search.inc.php" method="post">

            <!-- Post title -->
            <input class="input-data" name="post" type="text" placeholder=" post title"><br>

            <!-- City name -->
            <select class="input-data input-city" name="city">
                <option  selected disabled hidden>Choose the city</option>
                <?php foreach ($cities as $city): ?>
                <option  value="<?php $city["cityName"] ?>">
                    <?php echo $city["cityName"]; ?>
                </option>
                <?php endforeach; ?>
            </select><br>

            <button class="submit-button" name="search-post-submit" type="submit">search</button><br>
        </form>
    </div>

    <div id="musician" class="category" style="display:none">
        <form action="../includes/search.inc.php" method="post">

            <!-- Musician name -->
            <input class="input-data" name="musician" type="text" placeholder=" musician"><br>

            <!-- City name -->
            <select class="input-data input-city" name="city">
                <option  selected disabled hidden>Choose the city</option>
                <?php foreach ($cities as $city): ?>
                <option  value="<?php $city["cityName"] ?>">
                    <?php echo $city["cityName"]; ?>
                </option>
                <?php endforeach; ?>
            </select><br>

            <button class="submit-button" name="search-musician-submit" type="submit">search</button><br>
        </form>
    </div>

    <div id="music-group" class="category" style="display:none">
        <form action="../includes/search.inc.php" method="post">

            <!-- Music group -->
            <input class="input-data" name="music-group" type="text" placeholder=" music group"><br>

            <!-- City name -->
            <select class="input-data input-city" name="city">
                <option  selected disabled hidden>Choose the city</option>
                <?php foreach ($cities as $city): ?>
                <option  value="<?php $city["cityName"] ?>">
                    <?php echo $city["cityName"]; ?>
                </option>
                <?php endforeach; ?>
            </select><br>

            <button class="submit-button" name="signup-music-group-submit" type="submit">search</button><br>
        </form>
    </div>
    
    <!-- Logic for tab selection -->
    <script>
        function openSearch(categoryName) {
            var i;
            var x = document.getElementsByClassName("category");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(categoryName).style.display = "block";
        }
    </script>
</div>
</body>
</html>