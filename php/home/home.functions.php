<?php
require_once("php/dbconnection.function.php");

function outputTopImages() {
    $data = dbconnection("spSelectTopImages()");

    for ($i = 0; $i < 12; $i++) {
        echo '<div class="col-6 col-sm-4 col-lg-3 mb-4">
            <a href="singleImage.php?id=' . $data[$i]['ImageID'] . '">
                <img src="./travel-images/square-medium/' . $data[$i]['Path'] . '" class="img-thumbnail">
            </a>
        </div>';
    }

}

function outputNewImages() {
    $data = dbconnection("spSelectNewImages()");

    for ($i = 0; $i < 12; $i++) {
        echo '<div class="col-6 col-sm-4 col-lg-3 mb-4">
            <a href="singleImage.php?id=' . $data[$i]['ImageID'] . '">
                <img src="./travel-images/square-medium/' . $data[$i]['Path'] . '" class="img-thumbnail">
            </a>
        </div>';
    }

}