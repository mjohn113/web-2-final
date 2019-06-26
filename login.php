<?php 
    if(isset($_GET['logout'])){
        if($_GET['logout'] == 1){
                session_start();

                unset($_SESSION['username']);
                unset($_SESSION['userpass']);
                unset($_SESSION['usertype']);
                session_destroy();

                header("Location: login.php");
                exit;
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <?php include("php/head.php"); ?>
        <title>Log-in</title>
    </head>
    <body>
        <?php include("php/header.php"); ?>
		<?php include_once("php/dbconnection.function.php"); ?>
		
        <main class="container mt-4">
		
			<div class="row">

				<div class="col-12 order-last col-md-3 order-md-first">
                    <?php include("php/home/sidebar.inc.php") ?>
                </div>

                    <div class="col-12 col-md-5 px-4 ">
					
                        <h4 class="font-weight-bold">Sign in</h4>
						
                        <form action="userlogin.php" method="post">
						
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email" />
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-success">Submit</button>
                            </div>
                            <div class="form-group">
                                <a href="register.php" class="mb-2">Need an account?</a>
                            </div>
							
                        </form>
						
						
                    </div>

			</div>


        </main>

        <?php include("php/footer.php"); ?>
		
    </body>
	
</html>
		