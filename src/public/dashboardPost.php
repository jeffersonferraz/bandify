<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/main.css">
    <title>bandify | Manage Posts</title>
</head>
<body>
<div class="container">
    <a href="../index.php">
        <h1 class="logo">bandify</h1>
        <p class="subtitle">let's make some noise together!</p>
    </a>
    <div class="button-container">
        <a href="createPost.php"><button class="crud-button">Create</button></a>
        <a href="readPost.php"><button class="crud-button">Read</button></a>
        <a href="updatePost.php"><button class="crud-button">Update</button></a>
        <a href="deletePost.php"><button class="crud-button">Delete</button></a>
    </div>

    <?php
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'create':
                ?>
                <h2>Create Post</h2>
                <form action="../includes/createPost.inc.php" method="post">
                    <input class="input-data" name="title" type="text" placeholder=" Title" required><br>
                    <textarea class="input-data" name="description" placeholder=" Description"></textarea><br>
                    <button class="submit-button" name="post-submit" type="submit">create</button><br>
                </form>
                <?php
                break;

            case 'read':
                ?>
                <h2>Posts</h2>
                <?php require '../includes/readPost.inc.php'; ?>
                <?php
                break;

            // Hier kannst du weitere Fälle für 'update' und 'delete' hinzufügen
            case 'update':
                echo "<h2>Update Post</h2>";
                // Füge hier die Logik für das Aktualisieren von Posts hinzu
                break;

            case 'delete':
                echo "<h2>Delete Post</h2>";
                // Füge hier die Logik für das Löschen von Posts hinzu
                break;

            default:
                echo "<p>Bitte wähle eine Aktion aus.</p>";
        }
    }
    ?>
</div>
</body>
</html>
