<?php
    require_once("php/searchResults/searchResults.class.php");

    $searchResults;
    if (isset($_GET["postTitle"])) {
        $searchResults = new SearchResults(true, $_GET["postTitle"], "", "", "");
    }
    elseif (isset($_GET["imageTitle"])) {
        $city = "";
        $country = "";
        if (isset($_GET["city"])) {
            $city = $_GET["city"];
        }
        if (isset($_GET["country"])) {
            $country = $_GET["country"];
        }
        $searchResults = new SearchResults(false, $_GET["imageTitle"], $city, $country, "");
    }
    elseif (!empty($_GET["continent"])) {
        $searchResults = new SearchResults(false, "", "", "", $_GET["continent"]);
    }
    else {
        die("Invalid query string");
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <?php include("php/head.php"); ?>
        <title>Search Results</title>
        <script src="js/searchResultsSort.js"></script>
    </head>
    <body>
        <?php include("php/header.php"); ?>

        <main class="container mt-4">
            <div class="row">
                <div class="col-md-3 mt-2 order-last order-md-first">
                    <?php include("php/home/sidebar.inc.php"); ?>
                </div>
                <div class="col">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <form>
                                    <h5>Sort by</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sort" id="descend" value="descend" checked>
                                        <label class="form-check-label" for="descend">
                                            Title (Descend)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sort" id="ascend" value="ascend">
                                        <label class="form-check-label" for="ascend">
                                            Title (Ascend)
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-2" id="list">
                            <?php
                                $searchResults->output();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <?php include("php/footer.php"); ?>
    </body>
</html>