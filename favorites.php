<!doctype html>
<html lang="en">
    <head>
        <?php include("php/head.php"); ?>
        <title>Favorites</title>
    </head>
    <body>
        <?php include("php/header.php"); ?>
		
		<?php
		
			if(isset($_POST['postrem'])){

				$key = array_search($_POST['postrem'],$_SESSION['favoritepost']);
				unset($_SESSION['favoritepost'][$key]);
			}
			
			if(isset($_POST['imagerem'])){
				$key = array_search($_POST['imagerem'],$_SESSION['favorite']);
				unset($_SESSION['favorite'][$key]);
			}
		
			$image = $_SESSION['favorite'];
			$image2 = $_SESSION['favoritepost'];
		
		?>


        <main class="container-fluid mt-4">
		
			<div class="row">

				<div class="col-12 order-last col-md-3 order-md-first">
                    <?php include("php/home/sidebar.inc.php") ?>
                </div>		
				<div class="col-12 col-md-9">
				
				
				
					
				<h1 class="ml-3" >Favorite Post</h1>
					<?php
							
							foreach($image2 as $id){
								
								$row = dbconnection("spSelectPosts(NULL, '$id')");	
								
					?>
						
					<div class="col-12 col-md-10 p<?php echo $id; ?>">
						
							<h3><a href="singlePost.php?id=<?php echo $id; ?>"> <?php echo $row[0]['Title']; ?> </a></h3>
							<p><?php echo $row[0]['Message']; ?></p>
							<button onclick="removefavpost(<?php echo $id; ?>) " class="btn btn-primary btn-sm mb-5">Remove</button>
						

						
					</div>
					
					<?php }	?>
					
					<h3 class="ml-3">Favorite Pictures</h3>
					
					<?php
							
							foreach($image as $idimage){
								
								$row = dbconnection("spSelectSingleImage('$idimage')");	
								
					?>
						
					<div class="col-12 col-md-10 <?php echo $idimage; ?>">
						
							<h3><a href="singleImage.php?id=<?php echo $idimage; ?>"> <?php echo $row[0]['Title']; ?> </a></h3>
							<img src="travel-images/square-medium/<?php echo $row[0]['Path']; ?>" class="img-thumbnail p-2" alt="database down">

							<button onclick="removefav(<?php echo $idimage; ?>) " class="btn btn-primary btn-sm mb-5">Remove</button>

						<br></br>
						
					</div>

					
					<?php }	?>						
					
					
					
			

						
					<br>
					<div class="col-12 col-md-10">
						<form action="" method="POST">
						<input type="number" value="1" name="endsession" style="display:none;">
						<button type="submit" class="btn btn-primary btn-lg" >Clear Favorites</button>
						</form>
					</div>
					<br></br>
				</div>
				
			</div>

		</div>

        </main>
		
		<script>
		
	function removefavpost(str) {
	
	$.ajax({
		url:"",
		type: "POST",
		data:{
			postrem: str
		},
		success:function(data) {	
			$('.p' + str).fadeOut();
		},
			error:function(data){
				alert("Whoops, something went wrong! Please try again.");
			}
	});
						
	}
	
	function removefav(str) {
	
	$.ajax({
		url:"",
		type: "POST",
		data:{
			imagerem: str
		},
		success:function(data) {	
			$('.' + str).fadeOut();
		},
			error:function(data){
				alert("Whoops, something went wrong! Please try again.");
			}
	});
						
	}
        </script>
		
        <?php include("php/footer.php"); ?>
    </body>
</html>
