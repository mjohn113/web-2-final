<?php
    require_once("php/dbconnection.function.php");
?>

<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <p class="mb-0">Simple Search</p>
            </div>
            <div class="card-body">
                <form action="searchResults.php" method="get">
                    <div class="input-group">
                        <input type="text" name="imageTitle" class="form-control">
                        <div class="input-group-append">
                            <button type="submit" name="searchSubmit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-12">
        <ul class="list-group">
            <li class="list-group-item">Continents</li>
            <?php
                $data = dbconnection("spSelectAllContinents()");
                foreach ($data as $continent) {
                    echo '<li class="list-group-item">';
                    echo '<a href="searchResults.php?continent=' . $continent['ContinentCode'] . '">' . $continent['ContinentName'] . '</a>';
                    echo '</li>';
                }
            ?>
        </ul>
    </div>
</div>
<div class="row mb-4">
    <div class="col-12">
        <ul class="list-group">
            <li class="list-group-item">Countries</li>
            <?php
                $data = dbconnection("spSelectCountriesWithImages()");
                foreach ($data as $country) {
                    echo '<li class="list-group-item">';
                    echo '<a href="singleCountry.php?id=' . $country['ISO'] . '">' . $country['CountryName'] . '</a>';
                    echo '</li>';
                }
            ?>
        </ul>
    </div>
</div>
<div class="row mb-4">
    <div class="col-12">
        <ul class="list-group">
            <li class="list-group-item">
               Cities
            </li>
            <?php
                $data = dbconnection("spSelectCitiesWithImages()");
                foreach ($data as $city) {
                    if (!$city['ID'] == "") {
                        echo '<li class="list-group-item">';
                        echo '<a href="singleCity.php?id=' . $city['ID'] . '">' . $city['name'] . '</a>';
                        echo '</li>';
                    }
                }
            ?>
        </ul>
    </div>
</div>