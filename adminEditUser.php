<?php
    require_once("php/dbconnection.function.php");

    session_start();
    if (!isset($_SESSION["usertype"])) {
		header('location: login.php');
    }
    if ($_SESSION["usertype"] != 2) {
        header("location: index.php");
    }
    if (empty($_GET["id"])) {
        die("Invalid id.");
    }
    $userdata = dbconnection("spSelectUser({$_GET["id"]})");
    if (empty($userdata)) {
        die("Invalid id.");
    }
    $userdata = $userdata[0];
?>

<!doctype html>
<html lang="en">
    <head>
        <?php include("php/head.php"); ?>
        <title>Edit Users</title>
    </head>
    <body>
        <?php include("php/header.php"); ?>
        <main class="container mt-4">
            <form method="get" action="userupdate.php">
                <input name="id" value="<?php echo $_GET["id"];?>" type="hidden">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" value="<?php echo $userdata["FirstName"]?>" name="firstname">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" value="<?php echo $userdata["LastName"]?>" name="lastname" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" value="<?php echo $userdata["Address"]?>" name="address" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" value="<?php echo $userdata["City"]?>" name="city" required>
                </div>
                <div class="form-group">
                    <label for="region">Region</label>
                    <input type="text" class="form-control" id="region" value="<?php echo $userdata["Region"]?>" name="region">
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" value="<?php echo $userdata["Country"]?>" name="country" required>
                </div>
                <div class="form-group">
                    <label for="postal">Postal</label>
                    <input type="text" class="form-control" id="postal" value="<?php echo $userdata["Postal"]?>" name="postal">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" value="<?php echo $userdata["Phone"]?>" name="phone">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="<?php echo $userdata["Email"]?>" name="email">
                </div>
                <label>Is Admin?</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="no" value="1" name="isadmin" <?php if($userdata["State"] == 1) {echo "checked";}?>>
                    <label for="no" class="form-check-label">No</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="yes" value="2" name="isadmin" <?php if($userdata["State"] == 2) {echo "checked";}?>>
                    <label for="yes" class="form-check-label">Yes</label>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </main>
    </body>
</html>