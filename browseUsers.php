<!doctype html>
<html lang="en">
<head>
    <?php include("php/head.php"); ?>
    <title>Browse Users</title>
</head>
<body>
<?php include("php/header.php"); ?>
<?php include("php/browseUsers/outputUsers.php"); ?>
<main>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 order-last order-md-first col-md-3">
                <?php include("php/home/sidebar.inc.php") ?>
            </div>
            <div class="col-md-9 col-12">
                <div class="row">
                    <div class="col-12">
                        <h3 class="font-weight-bold mb-3">Browse Users</h3>
                    </div>
                </div>
                <?php outputUsers(); ?>
            </div>
        </div>
    </div>
</main>

<?php include("php/footer.php"); ?>
</body>
</html>