<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/main.css">
    <title>bandify | Search</title>
</head>
<body>
<div class="container">
    <a href="../index.php">
        <h1 class="logo">bandify</h1>
        <p class="subtitle">let's make some noise together!</p>
    </a>
    <form action="../includes/signup.inc.php" method="post">
        <input class="input_data" name="searchedValue1" type="text" placeholder=" Search" required><br>
        <input class="input_data" name="searchedValue2" type="text" placeholder=" Search" required><br>
        <button name="search-submit" type="submit">search</button><br>
    </form>
</div>
</body>
</html>