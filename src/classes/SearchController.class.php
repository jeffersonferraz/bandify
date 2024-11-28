<?php

class SearchController extends Search {

    public function fetchAllCities() {
        return $this->getCities();
    }

}