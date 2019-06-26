<?php
function outputImagesOnCountries($CountryCodeISO) {
    require_once("php/dbconnection.function.php");

    $result = dbconnection("spSelectImagesOnCountry(\"{$CountryCodeISO}\")");

    foreach ($result as $row) {
        echo "<div class='col-lg-3 col-md-4 col-sm-6'>
            <div class='card mx-2 my-1'>
                <a href='singleImage.php?id={$row["ImageID"]}'><img src='travel-images/square-medium/{$row["Path"]}' alt='Error' class='img-fluid card-img px-4 py-2'></a>
            </div>
        </div>";
    }
}

function outputImagesOnPosts($postID) {
    require_once("php/dbconnection.function.php");

    $result = dbconnection("spSelectImagesOnPost(\"{$postID}\")");

    foreach ($result as $row) {
        echo "<div class='col-lg-3 col-md-4 col-sm-6'>
            <div class='card mx-2 my-1'>
                <a href='singleImage.php?id={$row["ImageID"]}'><img src='travel-images/square-medium/{$row["Path"]}' alt='Error' class='img-fluid card-img px-4 py-2'></a>
            </div>
        </div>";
    }
}



