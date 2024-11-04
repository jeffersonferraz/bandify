<?php

class SearchController extends Search {

    private $bandTitle;
    private $bandDescription; // Band description

    public function __construct($bandTitle, $bandDescription) {
        $this->bandTitle = $bandTitle;
        $this->bandDescription = $bandDescription; // Initialize description
    }

    // Function that checks for an existing band and creates a new one if it doesn't exist
    public function createSearch() {
        if ($this->emptyInput() == false) {
            header("Location: ../index.php?error=empty-input");
            exit();
        }

        // Check if the band already exists
        $existingBand = $this->checkSearch($this->bandTitle);

        if (empty($existingBand)) {
            // Create the band if it doesn't exist
            $this->setSearch($this->bandTitle, $this->bandDescription);
            header("Location: ../index.php?error=none"); // Redirect to homepage on success
        } else {
            header("Location: ../index.php?error=band-exists"); // Band already exists
        }
    }

    private function emptyInput() {
        return !empty($this->bandTitle); // Check if bandTitle is filled
    }
}
