<?php

    // Instantiate Search class
    // Ordering of includes are important
    include "../classes/Db.class.php";
    include "../classes/Search.class.php";
    include "../classes/SearchController.class.php";

    $cities = new SearchController;
    $cities = $cities->fetchAllCities();