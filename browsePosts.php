<!doctype html>
<html lang="en">
    <head>
        <?php include("php/head.php"); ?>
        <title>Browse Posts</title>
    </head>
    <body>
        <?php include("php/header.php"); ?>
        <?php include("php/browsePosts/outputPosts.php"); ?>
        <main>
            <div class="container mt-4">
                <div class="row">
                    <div class="col-12 order-last col-md-3 order-md-first">
                        <?php include("php/home/sidebar.inc.php") ?>
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="font-weight-bold mb-3">Browse Posts</h3>
                            </div>
                        </div>
                        <?php outputPosts(); ?>
                    </div>
                </div>
            </div>
        </main>
        
        <?php include("php/footer.php"); ?>
    </body>
</html>