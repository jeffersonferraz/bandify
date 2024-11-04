<?php

if (isset($_POST["search-submit"])) { // Check if the search button was pressed.

    // Grabbing the data
    $postTitle = $_POST["title"];
    $postDescription = $_POST["description"];

    // Include necessary classes
    include "../classes/Db.class.php";
    include "../classes/Search.class.php";
    include "../classes/SearchController.class.php";

    // Instantiate SearchController with post information
    $search = new SearchController($postTitle, $postDescription);

    // Perform the creation of the post
    $search->createPost();
}
