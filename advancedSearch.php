<?php
    require_once("php/dbconnection.function.php");
    $countries = dbconnection("spSelectCountriesWithImages()");
    $cities = dbconnection("spSelectCitiesWithImages()");
?>

<!doctype html>
<html lang="en">
    <head>
        <?php include("php/head.php"); ?>
        <title>Advanced Search</title>
    </head>
    <body>
        <?php include("php/header.php"); ?>

        <main class="container mt-4">
            <div class="row">
                <div class="col-md-3 mt-2 order-last order-md-first">
                    <?php include("php/home/sidebar.inc.php"); ?>
                </div>
                <div class="col">
                    <form method="get" action="searchResults.php">
                        <h2>Search for Posts</h2>
                        <div class="form-group">
                            <label for="postTitle">Post Title</label>
                            <input class="form-control" id="postTitle" type="text" name="postTitle" placeholder="Enter post title here">
                        </div>
                        <button class="btn btn-primary" type="submit">Search for Posts</button>
                    </form>
                    <form class="mt-2" method="get" action="searchResults.php">
                        <h2>Search for Travel Images</h2>
                        <div class="form-group">
                            <label for="postTitle">Image Title</label>
                            <input class="form-control" id="imageTitle" type="text" name="imageTitle" placeholder="Enter image title here">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <select class="form-control" id="city" name="city">
                                <option value="">All Cities</option>
                                <?php
                                    foreach($cities as $row) {
                                        echo "<option value='{$row["ID"]}'>{$row["name"]}</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select class="form-control" id="country" name="country">
                                <option value="">All Countries</option>
                                <?php
                                    foreach($countries as $row) {
                                        echo "<option value='{$row["ISO"]}'>{$row["CountryName"]}</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit">Search for Travel Images</button>
                    </form>
                </div>
            </div>
        </main>
        
        <?php include("php/footer.php"); ?>
    </body>
</html>