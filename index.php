<!doctype html>
<html lang="en">
    <head>
        <?php include("php/head.php"); ?>
        <title>Home Page</title>
    </head>
    <body>
        <?php include("php/header.php"); ?>
        <?php include("php/home/home.functions.php"); ?>
        <main>
            <div class="bd-example mb-3">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./travel-images/home/1.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption">
                                <h5>Plan your next vacation</h5>
                                <p>Browse member pictures and posts</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./travel-images/home/2.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption">
                                <h5>Share your travels</h5>
                                <p>Post your experiences for others to see</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./travel-images/home/3.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption">
                                <h5>Follow your friends</h5>
                                <p>Favorite your friends pictures</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-auto order-last col-md-3 order-md-first">
                        <?php include("php/home/sidebar.inc.php") ?>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <h5 class="font-weight-bold mb-3">Most Recent Reviews</h5>
                            </div>
                        </div>
                        <div class="row ml-1 mb-2">
                            <?php 
                                include_once("php/dbconnection.function.php");
                                
                                $row = dbconnection("spSelectAllReviews()");
                                
                                
                                $a=0;
                                for($a=0;$a<2;$a++){
                                    
                                    $image = $row[$a]['ImageID'];
                                    $user = $row[$a]['UID'];
                                    $row2 = dbconnection("spSelectCityImage('$image')")[0];
                                    $row3 = dbconnection("spSelectUser('$user')")[0];
                                
                            ?>
                                    <div class="col-md-auto">
                                        <?php
                                            echo '<a href="singleImage.php?id=' . $row2['ImageID'] . '"><img src="travel-images/square-medium/' . $row2['Path'] . '" class="img-thumbnail p-1" alt="database down"></a>';
                                        
                                        ?>
                                    </div>
                                    <div class="col">
                                        <?php	
                                            echo '<p>' . mb_strimwidth($row[$a]['Review'], 0, 200) . '...</p>';
                                            echo '<p>- <a href="SingleUser.php?id=' . $row3['UID'] . '">' . $row3['FirstName'] . ' ' . $row3['LastName'] . '</a></p>';
                                        ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h5 class="font-weight-bold mb-3">Top Images</h5>
                            </div>
                        </div>
                        <div class="row">
                            <?php outputTopImages(); ?>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h5 class="font-weight-bold mb-3">New Additions</h5>
                            </div>
                        </div>
                        <div class="row">
                            <?php outputNewImages(); ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </main>
        
        <?php include("php/footer.php"); ?>
    </body>
</html>
