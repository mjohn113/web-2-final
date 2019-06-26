<!doctype html>
<html lang="en">
    <head>
        <?php include("php/head.php"); ?>
        <title>Registration</title>
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
					
                        <h4 class="font-weight-bold">Create New Account</h4>
						
                        <form action="userreg.php" method="post">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 mb-2 mb-md-0 col-md-6">
                                        <label for="firstName">First Name</label>
                                        <input type="text" name="firstName" class="form-control" id="firstName" required/>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="firstName">Last Name</label>
                                        <input type="text" name="lastName" class="form-control" id="lastName" required/>
                                    </div>
                                </div>
                            </div>
						
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email" required/>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required/>
                            </div>
							<div class="form-group mb-4">
                                <label for="conpassword">Confirm Password</label>
                                <input type="password" name="conpassword" id="conpassword" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-success">Submit</button>
                            </div>
                            <div class="form-group">
                                <a href="login.php" class="mb-2">Already have an Account?</a>
                            </div>
							<div class="form-group">
							<?php
								if(isset($_GET['error'])){
									if($_GET['error'] == 1)
										echo '<p>The Passwords you entered do not match please try again.</p>';
									if($_GET['error'] == 2)
										echo '<p>There is already an account with this info please login or try again.</p>';
								
								}
							?>
							</div>
							
                        </form>
						
						
                    </div>

			</div>


        </main>

        <?php include("php/footer.php"); ?>
		
    </body>
	
</html>