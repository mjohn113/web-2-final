<?php
class BrowseImages {
    private $imageArray;
    private $countries;
    private $continents;

    function __construct() {
        require_once("php/dbconnection.function.php");
        require_once("php/browseImages/browseSingleImage.class.php");
        $this->imageArray = array();
        $this->countries = array();
        $this->continents = array();
        $result = dbconnection("spSelectAllImages()");

        foreach ($result as $row) {
            $this->imageArray[] = new BrowseSingleImage($row["ImageID"], $row["Title"], $row["Path"], $row["ContinentName"], $row["CountryName"]);

            if (!in_array($row["ContinentName"], $this->continents)) {
                $this->continents[] = $row["ContinentName"];
            }
            if (!in_array($row["CountryName"], $this->countries)) {
                $this->countries[] = $row["CountryName"];
            }
        }
        if (empty($this->imageArray)) {return;}
        sort($this->continents);
        sort($this->countries);
    }

    function output() {
        if (empty($this->imageArray)) {return;}
        foreach($this->imageArray as $image) {
            $image->output();
        }
    }

    function getCountries() {return $this->countries;}
    function getContinents() {return $this->continents;}
}
?>