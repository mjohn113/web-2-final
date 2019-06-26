<?php
class SearchResults {
    private $isPost;
    private $searchResultsArray;

    function __construct($isPost, $title, $city, $country, $continent) {
        $searchResultsArray = array();
        $this->isPost = $isPost;
        require_once("php/dbconnection.function.php");
        if ($isPost) {
            require_once("php/searchResults/singlePostResult.class.php");
            $result = dbconnection("spSelectPostsOnSearch(\"{$title}\")");
            foreach ($result as $row) {
                $this->searchResultsArray[] = new SinglePostResult($row["PostTime"], $row["PostID"], $row["Title"], $row["Message"]);
            }
            if (empty($this->searchResultsArray)) { return;}
            usort($this->searchResultsArray, array("SinglePostResult", "cmp_name"));
        }
        else {
            require_once("php/searchResults/singleImageResult.class.php");
            $result = dbconnection("spSelectImagesOnSearch(\"{$title}\", \"{$country}\", \"{$city}\", \"{$continent}\")");
            foreach ($result as $row) {
                $this->searchResultsArray[] = new SingleImageResult($row["ImageID"], $row["Title"], $row["Path"]);
            }
            if (empty($this->searchResultsArray)) { return;}
            usort($this->searchResultsArray, array("SingleImageResult", "cmp_name"));
        }
    }

    function output() {
        if (empty($this->searchResultsArray)) {
            echo "<div class='col'>
                    <p>No results for the selected criteria</p>
                </div>";
            return;
        }
        foreach($this->searchResultsArray as $row) {
            $row->output();
        }
    }
}
?>