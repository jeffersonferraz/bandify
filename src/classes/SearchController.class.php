<?php

class SearchController extends Search {

    public function fetchAllCities() {
        return $this->getCities();
    }

    public function searchPost($searchTyp, $searchedObject, $cityId) {

        if($searchTyp === "post-title"){
            $result = $this->getPostByTitle($searchedObject, $cityId);
        return $result;
        }

        if($searchTyp === "musician-name"){
            $result = $this->getMusicianByName($searchedObject, $cityId);
        return $result;
        }

        if($searchTyp === "music-group-name"){
            $result = $this->getGroupByName($searchedObject, $cityId);
        return $result;
        }
        
    }
}
