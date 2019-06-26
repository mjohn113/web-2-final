<!doctype html>
<html lang="en">
    <head>
        <?php include("php/head.php"); ?>
        <title>City</title>
    </head>
    <body>
        <?php include("php/header.php"); ?>
		<?php require_once("php/dbconnection.function.php"); ?>		
		<?php
			
			
			
			if(isset($_GET['id'])){
				
				$code = $_GET['id'];
			
				$cityid = dbconnection("spSelectCity('$code')");
				
				$code2 = $cityid[0]['CountryCodeISO'];
				
				$citycountry = dbconnection("spSelectCountry('$code2')");
				
			
		
		
		
		?>

		<main class="container-fluid mt-4">
		
			<div class="row">
			
	
			
			    <div class="col-12 order-last col-md-3 order-md-first">
                    <?php include("php/home/sidebar.inc.php") ?>
                </div>
				<div class="col-12 col-md-9">

					<div class="row">
					
						<div class="col-12 col-md-10" >
							<h1><?php echo $cityid[0]['AsciiName']; ?></h1>					
							<ul class="list-group">
                                <li class="list-group-item"><strong>Population:</strong> <?php echo $cityid[0]['Population'];?></li>
                                <li class="list-group-item"><strong>Elevation:</strong> <?php echo $cityid[0]['Elevation'];?></li>	
                                <li class="list-group-item"><strong>Country:</strong> <?php echo $citycountry[0]['CountryName']; ?></li>									
                            </ul>
							<br></br>

							<div id="map-container-google-1" class="z-depth-1-half map-container">
                                <iframe src="https://maps.google.com/maps?q=<?php echo $cityid[0]['Latitude'];?>,<?php echo $cityid[0]['Longitude'];?>&ie=UTF8&iwloc=&output=embed" frameborder="0"></iframe>
                            </div>
							
							<br></br>
						</div>
						<div class="col-12 col-md-10">
							<div class="row">
							<?php
								$row3 = dbconnection("spSelectCityPost('$code')");
								foreach($row3 as $image){
									$imagephoto = $image['ImageID'];
									$postimage = dbconnection("spSelectCityImage('$imagephoto')");
							?>
								<div class="col-6 col-sm-4 col-md-3 col-xl-2 mb-4">
									<div class="text-center">
										<img src="travel-images/square-medium/<?php echo $postimage[0]['Path'];  ?>" class="img-thumbnail p-2 mb-2" alt="database down">
										<a href="singleImage.php?id=<?php echo $image['ImageID']; ?>" class="btn btn-primary">View</a>
										<button onclick=" addtofav( <?php echo $imagephoto; ?>) " class="btn btn-primary">Favorites</button>
									</div>
								</div>
						<?php	}	?>
						
							</div>
							
						</div>
					
						
							
					
					</div>
					
				
				</div>
			
			
			</div>
			
			<?php } ?>


        </main>
        
        <?php include("php/footer.php"); ?>
    </body>
</html>
