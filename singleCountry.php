<!doctype html>
<html lang="en">
    <head>
        <?php include("php/head.php"); ?>
        <title>Country</title>
    </head>
    <body>
        <?php include("php/header.php"); ?>
		<?php require_once("php/dbconnection.function.php"); ?>		
		<?php
			
			
			
			if(isset($_GET['id'])){
				
				$code = $_GET['id'];
			
				$countryid = dbconnection("spSelectCountry('$code')");
				
			
		
		
		
		?>

        <main class="container-fluid mt-4">
		
			<div class="row">
			
	
			
			    <div class="col-12 order-last col-md-3 order-md-first">
                    <?php include("php/home/sidebar.inc.php") ?>
                </div>
				<div class="col-12 col-md-9">

					<div class="row">
					
						<div class="col-12 col-md-10" >
							<h1><?php echo $countryid[0]['CountryName']; ?> <img src="travel-images/flags/<?php echo $_GET['id']; ?>.png" alt="Country Flag"></h1>					
							<p><?php echo $countryid[0]['CountryDescription']; ?></p>
							
							<ul class="list-group">
                                <h2 class="list-group-item bg-primary text-white">Country Info</h2>
                                <li class="list-group-item"><strong>Capitol:</strong> <?php echo $countryid[0]['Capital']; ?></li>
                                <li class="list-group-item"><strong>Population:</strong> <?php echo $countryid[0]['Population'];?></li>
                                <li class="list-group-item"><strong>Area:</strong> <?php echo $countryid[0]['Area'];?></li>	
                                <li class="list-group-item"><strong>Currency Name | Code:</strong> <?php echo $countryid[0]['CurrencyCode'];?> - <?php echo $countryid[0]['CurrencyName']; ?></li>									
                            </ul>
							<br></br>
						</div>
						
						<div class="col-12 col-md-10">
							<div class="row">
							<?php
								$row3 = dbconnection("spSelectCountryImage('$code')");
								foreach($row3 as $image){
									$imagephoto = $image['ImageID'];
									$postimage = dbconnection("spSelectCityImage('$imagephoto')");
							?>
								<div class="col-6 col-sm-4 col-md-3 col-xl-2 mb-4">
									<div class="text-center">
										<img src="travel-images/square-medium/<?php echo $postimage[0]['Path'];  ?>" class="img-thumbnail p-2 mb-2" alt="database down">
										<a href="singleImage.php?id=<?php echo $image['ImageID']; ?>" class="btn btn-primary">View</a>
										<button onclick=" addtofav(<?php echo $imagephoto; ?>) " class="btn btn-primary">Favorites</button>
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

    </body>
</html>
