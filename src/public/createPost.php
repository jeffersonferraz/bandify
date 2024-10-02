<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/main.css">
    <title>bandify | Create post</title>
</head>
<body>
<div class="container">
    <a href="../index.php">
        <h1 class="logo">bandify</h1>
        <p class="subtitle">let's make some noise together!</p>
    </a>
    <form action="../includes/signup.inc.php" method="post">
        <input class="input_data" name="title" type="text" placeholder=" Title" required><br>
        <textarea class="input_data" name="description" placeholder=" Description"></textarea><br>
        <button name="create-submit" type="submit">create</button><br>
    </form>
</div>
</body>
</html>