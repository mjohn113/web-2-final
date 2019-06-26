<?php
    date_default_timezone_set("America/Chicago");
    require_once("php/dbconnection.function.php");
    require_once("php/singleImage/singleImage.functions.php");

    if (isset($_GET['id']) && preg_match("/\A[0-9]+\z/", $_GET['id']) == 1) {
        $imageID = $_GET['id'];
    }
    else {
        die("Invalid id");
    }

    $imageDetails = dbconnection("spSelectSingleImage({$imageID})");
    if (empty($imageDetails)) {
        die("Invalid id");
    }
    $imageDetails = $imageDetails[0];

    $posts = dbconnection("spSelectPostsOnImage({$imageID})");
?>

<!doctype html>
<html lang="en">
    <head>
        <?php include("php/head.php"); ?>
        <script src="js/singleImage/singleImage.js"></script>
        <title>Single Image</title>
    </head>
    <body>
        <?php include("php/header.php"); ?>
        <main>
            <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-lg-3 mt-2 order-last order-lg-first">
                    <?php include("php/home/sidebar.inc.php") ?>
                </div>
                <div class="col-md">
                    <h2><?php echo $imageDetails["Title"];?></h2>
                    <p class="text-secondary"><a href="singleUser.php?id=<?php echo $imageDetails['UID'];?>">By <?php echo "{$imageDetails['FirstName']} {$imageDetails['LastName']}";?></a></p>
                    <div class="row">
                        <div class="col-md-auto mb-4">
                            <a data-toggle="modal" data-target="#imgModal" href="">
                                <img class="img-fluid" src="travel-images/medium/<?php echo $imageDetails["Path"];?>">
                            </a>
                        </div>
                        <div class="col-xl-4">
                            <button onclick="addtofav(<?php echo $_GET['id']; ?>)" class="btn btn-light text-white"><i class="fas fa-gift"></i> Add to Favorites List</button>
                            <br>
                            <br>
                            <div class="card border-info">
                                <div class="card-header text-white bg-primary">
                                    Rating
                                </div>
                                <div class="card-body">
                                    <span class="text-danger ratingText"><?php echo round($imageDetails["Rating"], 1);?></span>
                                    &nbsp;
                                    <span class="text-secondary ratingText">[<?php echo $imageDetails["TotalRatings"];?> votes]</span>
                                </div>
                            </div>
                            <br>
                            <br>
                            <h4 class="ml-3">Image Details</h4>
                            <hr>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th scope="row"><strong>Country:</strong></th>
                                        <td><a href="singleCountry.php?id=<?php echo $imageDetails["CountryCodeISO"];?>"><?php echo $imageDetails["CountryName"];?></a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong>City:</strong></th>
                                        <td><a href="singleCity.php?id=<?php echo $imageDetails["CityCode"];?>"><?php echo $imageDetails["AsciiName"];?></a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="accordion" id="accordion">
                                <div class="card border-bottom">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne">
                                                Location of <?php echo $imageDetails["Title"];?>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                                        <div class="card-body p-1">
                                            <div id="map-container-google-1" class="z-depth-1-half map-container">
                                                <iframe src="https://maps.google.com/maps?q=<?php echo $imageDetails["Latitude"];?>,<?php echo $imageDetails["Longitude"];?>&ie=UTF8&iwloc=&output=embed" frameborder="0"style="border:0" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                        <h5>Posts related to <?php echo $imageDetails["Title"];?></h5>
                            <?php
                                foreach($posts as $post) {
                                    echo "<a href='singlePost.php?id={$post["PostID"]}'>{$post["Title"]}</a>";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                           <h5>Reviews</h5>
                        </div>
                    </div>
                    <div class="row" id="reviewSection">
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <h5>Images in the same country</h5>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            outputImagesOnCountries($imageDetails["CountryCodeISO"]);
                        ?>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <h5>Images in the same post</h5>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            foreach($posts as $post) {
                                outputImagesOnPosts($post["PostID"]);
                            }
                        ?>
                    </div>
                </div>
            </div>
        </main>
        
        <?php include("php/footer.php"); ?>
    </body>

    <div class="modal fade" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="imageModal" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imgModalLabel"><?php echo "{$imageDetails["Title"]} by {$imageDetails['FirstName']} {$imageDetails['LastName']}";?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img class="img-fluid" src="travel-images/large/<?php echo $imageDetails["Path"];?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 d-none" id="checkForm">
                            <div class="alert alert-warning" id="checkMessage" role="alert"></div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="reviewDescription">Review</label>
                                <textarea class="form-control mb-3" id="reviewDescription" name="reviewDescription" rows="5"></textarea>
                            </div>
                            <div class="form-group mb-1">
                                <label for="rating">Rating</label>
                                <div id="rating">
                                    <i class="far fa-star fa-lg text-primary reviewStar" onclick="highlightStar(this)" id="oneStar"></i>
                                    <i class="far fa-star fa-lg text-primary reviewStar" onclick="highlightStar(this)" id="twoStar"></i>
                                    <i class="far fa-star fa-lg text-primary reviewStar" onclick="highlightStar(this)" id="threeStar"></i>
                                    <i class="far fa-star fa-lg text-primary reviewStar" onclick="highlightStar(this)" id="fourStar"></i>
                                    <i class="far fa-star fa-lg text-primary reviewStar" onclick="highlightStar(this)" id="fiveStar"></i>
                                </div>
                                <input type="hidden" id="ratingValue" value="0" name="ratingValue" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="addReview(<?php echo $_SESSION['uid'] . ', ' . $_GET['id'] . ', ' . $_SESSION['usertype']; ?>)" class="btn btn-primary">Post Review</button>
                </div>
            </div>
        </div>
    </div>
</html>

<script>
    $(document).ready(function() {
        fetchReviews(
            <?php
                echo $_GET['id'];
                if(isset($_SESSION['uid']))
                    echo ', ' . $_SESSION['uid'];
                if(isset($_SESSION['usertype']))
                    echo ', ' . $_SESSION['usertype'];
            ?>);
    });
</script>



