<?php
date_default_timezone_set("America/Chicago");
require_once("php/dbconnection.function.php");

function outputPosts() {
    $data = dbconnection("spSelectPosts(NULL, NULL)");

    echo '<div class="row">';

    foreach ($data as $post) {
        $sqlDate = strtotime($post["PostTime"]);
        $formattedDate = date("M d, Y", $sqlDate);
        echo '<div class="col-12 col-lg-6 mb-4">
                <h5><a href="singlePost.php?id=' . $post['PostID'] . '">' . $post['Title'] . '</a></h5>
                <p class="small mb-1">Posted on ' . $formattedDate . '</p>
                <p class="mb-0">' . mb_strimwidth(strip_tags($post['Message']), 0, 255, "...") . '</p>
                <a class="btn btn-primary mt-2" href="singlePost.php?id=' . $post['PostID'] . '">View Post</a>
              </div>';
    }

    echo '</div>';

}