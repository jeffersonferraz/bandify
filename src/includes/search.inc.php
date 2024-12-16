<?php

// Instantiate Search class
// Ordering of includes are important
include "../classes/Db.class.php";
include "../classes/Search.class.php";
include "../classes/SearchController.class.php";

// Grabbing cities data
$cities = new SearchController;
$cities = $cities->fetchAllCities();

if (isset($_POST["search-post-submit"])) {

    // Grabbing post data
    $searchTyp = "post-title";
    $postTitle = $_POST["post-title"];
    $cityId = $_POST["city-name"] ?? null;

    $searchPost = new SearchController;
    $post = $searchPost->searchPost($searchTyp, $postTitle, $cityId);

    // Convert the array $post to a query string and pass it via URL
    $queryString = http_build_query(array('post' => $post));

    // Going back to front page
    if (!empty($queryString)) {
        header("Location: ../public/search.php?" . $queryString);
    } else {
        header("Location: ../public/search.php?post-not-found");
    }
    
}

if (isset($_POST["search-musician-submit"])) {

    // Grabbing musician data
    $searchTyp = "musician-name";
    $musicianName = $_POST["musician-name"];
    $cityId = $_POST["city-name"] ?? null;

    $searchPost = new SearchController;
    $musician = $searchPost->searchPost($searchTyp, $musicianName, $cityId);

    // Convert the array $musician to a query string and pass it via URL
    $queryString = http_build_query(array('musician' => $musician));

    // Going back to front page
    if (!empty($queryString)) {
        header("Location: ../public/search.php?" . $queryString);
    } else {
        header("Location: ../public/search.php?musician-not-found");
    }
}

if (isset($_POST["music-group-submit"])) {

    // Grabbing music group data
    $searchTyp = "music-group-name";
    $musicGroupName = $_POST["music-group-name"];
    $cityId = $_POST["city-name"] ?? null;

    $searchMusicGroup = new SearchController;
    $musicGroup = $searchMusicGroup->searchPost($searchTyp, $musicGroupName, $cityId);

    // Convert the array $musicGroup to a query string and pass it via URL
    $queryString = http_build_query(array('musicGroup' => $musicGroup));

    // Going back to front page
    if (!empty($queryString)) {
        header("Location: ../public/search.php?" . $queryString);
    } else {
        header("Location: ../public/search.php?music-group-not-found");
    }
}