<!doctype html>
<html lang="en">
    <head>
        <?php include("php/head.php"); ?>
        <title>Single Post</title>
    </head>
    <body>
        <?php include("php/header.php"); ?>
		<?php include_once("php/dbconnection.function.php"); ?>
		
		<?php
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$row = dbconnection("spSelectPosts(NULL, '$id')");
				$user = $row[0]['UID'];
				$row2 = dbconnection("spSelectUser('$user')");
		?>

        <main class="container-fluid mt-4">
            <div class="row">
                <div class="col-12 order-last col-md-3 order-md-first">
                    <?php include("php/home/sidebar.inc.php") ?>
                </div>
                <div class="col-12 col-md-9">
                    <h1><?php echo $row[0]['Title']; ?></h1>
                    <div class="row">
                        <div class="col-12 col-xl-9">
                            <p><?php echo $row[0]['Message']; ?></p>
                        </div>
                        <div class="col-12 col-xl-3">
                            <div class="row">
                                <div class="col-12">
                                    <button onclick=" addtofavpost(<?php echo $_GET['id']; ?>) " class="btn btn-lg btn-primary mb-4"><i class="fas fa-heart"></i> Add to Favorites List</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <ul class="list-group">
                                        <h2 class="list-group-item bg-primary text-white">Post Details</h2>
                                        <li class="list-group-item"><strong>Date:</strong> <?php echo $row[0]['PostTime']; ?></li>
                                        <li class="list-group-item"><strong>Posted By:</strong> <?php echo $row2[0]['FirstName'];?> <?php echo $row2[0]['LastName'];?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2>Travel Images</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            $row3 = dbconnection("spSelectImages('$user')");
                            foreach($row3 as $image){
                        ?>
                            <div class="col-6 col-sm-4 col-md-3 col-xl-2 mb-4">
                                <div class="text-center">
                                    <img src="travel-images/square-medium/<?php echo $image['Path'];  ?>" class="img-thumbnail p-2" alt="database down">
                                    <p><?php echo $image['Title']; ?></p>
                                    <a href="singleImage.php?id=<?php echo $image['ImageID']; ?>" class="btn btn-primary">View</a>
				    <button onclick=" addtofav(<?php echo $image['ImageID']; ?>) " class="btn btn-primary">Favorites</button>
                                </div>
                            </div>
					<?php	}	?>
                        </div>
                    </div>
			    </div>

				
			
			
			<?php	}
					else {
						echo '<div class="col-sm-12"><h1>No Post has been selected</h1></div>';
					}
			?>

        </main>
        
        <?php include("php/footer.php"); ?>
    </body>
</html>
