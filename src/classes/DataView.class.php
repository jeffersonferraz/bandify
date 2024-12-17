<?php

class DataView extends Data {

    public function fetchAllCities() {

        return $this->getAllCities();
    }

    public function fetchAllInstruments() {

        return $this->getAllInstruments();
    }

    public function fetchAllInfluences() {

        return $this->getAllInfluences();
    }
}