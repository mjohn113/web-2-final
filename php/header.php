<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	if(empty($_SESSION['favorite'])){
		$_SESSION['favorite'] = array();
	}
	if(empty($_SESSION['favoritepost'])){
		$_SESSION['favoritepost'] = array();
	}
	
	if(isset($_POST['imageid'])){
		array_push($_SESSION['favorite'], $_POST['imageid']); 
	}

	if(isset($_POST['postid'])){
		array_push($_SESSION['favoritepost'], $_POST['postid']); 
	}
	
	if(isset($_POST['endsession'])){
		session_destroy();
		header("Location: favorites.php");
		exit;
	}


?>

<script>
	
	function addtofav(str) {
	
	$.ajax({
		url:"",
		type: "POST",
		data:{
			imageid: str
		},
		success:function(data) {	
			alert("added to favorites");
		},
			error:function(data){
				alert("Whoops, something went wrong! Please try again.");
			}
	});
						
	}
	
	function addtofavpost(str) {
	
	$.ajax({
		url:"",
		type: "POST",
		data:{
			postid: str
		},
		success:function(data) {	
			alert("added to favorites post");
		},
			error:function(data){
				alert("Whoops, something went wrong! Please try again.");
			}
	});
						
	}

</script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Oh The Places You'll Go</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="aboutUs.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="advancedSearch.php">Advanced Search</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="browseDropDown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Browse
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="browseDropDown">
                    <a class="dropdown-item" href="browsePosts.php">Posts</a>
                    <a class="dropdown-item" href="browseImages.php">Images</a>
                    <a class="dropdown-item" href="browseUsers.php">Users</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="moreDropDown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?php
					if(isset($_SESSION['username'])){
						echo $_SESSION['username'];
					}
					else 
						echo "More";
				?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreDropDown">
                    <a class="dropdown-item" href="favorites.php">View Favorites</a>
                    <a class="dropdown-item" href="#">My Account</a>
				<?php
					if(isset($_SESSION['username'])){
						if($_SESSION['usertype'] == 2) {
							echo '<a class="dropdown-item" href="adminBrowseUsers.php">Edit Users</a>';
						}
						echo '<a class="dropdown-item" href="login.php?logout=1">Logout</a>';
					}
					else{ 
						echo '<a class="dropdown-item" href="login.php">Login</a>
						<a class="dropdown-item" href="register.php">Register</a>';
					}
				?>
                </div>
            </li>
        </ul>
    </div>
</nav>
