<?php
    session_start();
    if (!isset($_SESSION["usertype"])) {
		header('location: login.php');
    }
    if ($_SESSION["usertype"] != 2) {
        header("location: index.php");
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <?php include("php/head.php"); ?>
        <title>Edit Users</title>
    </head>
    <body>
        <?php include("php/header.php"); ?>
        <?php include("php/browseUsers/outputUsers.php"); ?>
        <main>
            <div class="container mt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="font-weight-bold mb-3">Select a user to edit</h3>
                            </div>
                        </div>
                        <?php outputUsers(1); ?>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>