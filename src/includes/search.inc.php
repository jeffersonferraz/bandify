<?php

if (isset($_POST["search-submit"])) { // Check if the search button was pressed.

    // Grabbing the data
    $bandTitle = $_POST["title"];
    $bandDescription = $_POST["description"];

    // Include necessary classes
    include "../classes/Db.class.php";
    include "../classes/Search.class.php";
    include "../classes/SearchController.class.php";

    // Instantiate SearchController with band information
    $search = new SearchController($bandTitle, $bandDescription);

    // Perform the search or create the band
    $search->createSearch();
}
