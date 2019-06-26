<?php
    require_once("php/browseImages/browseImages.class.php");
    $images = new BrowseImages();
?>

<!doctype html>
<html lang="en">
    <head>
        <?php include("php/head.php"); ?>
        <title>Browse Travel Images</title>
        <script src="js/filterImages.js"></script>
    </head>
    <body>
        <?php include("php/header.php"); ?>

    <main class="container mt-4">
        <div class="row">
            <div class="col-12 order-last col-md-3 order-md-first">
                <?php include("php/home/sidebar.inc.php") ?>
            </div>
            <div class="col-12 col-md-9">
                <div class="row">
                    <div class="col">
                        <h2>Filters</h2>
                        <form class="form-inline">
                            <select class="form-control bg-secondary text-light mt-1" id="countries">
                                <option selected value='all'>All Countries</option>
                                <?php
                                    foreach ($images->getCountries() as $country) {
                                        echo "<option>{$country}</option>";
                                    }
                                ?>
                            </select>
                            <select class="form-control bg-secondary text-light ml-sm-2 mt-1" id="continents">
                                <option selected value='all'>All Continents</option>
                                <?php
                                    foreach ($images->getContinents() as $continent) {
                                        echo "<option>{$continent}</option>";
                                    }
                                ?>
                            </select>
                            <button type="button" id="filter" class="btn btn-primary ml-sm-2 mt-1">Filter</button>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <?php
                        $images->output();
                    ?>
                </div>
            </div>
        </div>
    </main>
        
        <?php include("php/footer.php"); ?>
    </body>
</html>