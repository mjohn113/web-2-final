<?php

switch($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        // server side validation?
        addNewReview($_POST['imageId'], $_POST['UID'], $_POST['rating'], $_POST['review']);
        break;
    case 'GET':
        if (isset($_GET["delete"])) {
            deleteReview($_GET["reviewId"], $_GET["UID"]);
        }
        else {
            getReviews($_GET['id']);
        }
        break;
}

function addNewReview($imageID, $uid, $rating, $reviewText) {
    require_once("../dbconnection.function.php");
    $reviews = dbconnection("spSelectReviews(" . $imageID . ")");

    foreach($reviews as $review) {
        if ($review['UID'] == $uid) {
            $result['status'] = 'error';
            $result['message'] = "You've already reviewed this image.";
            echo json_encode($result);
            return;
        }
    }

    if ($rating == "" || $reviewText == "") {
        $result['status'] = 'error';
        $result['message'] = "Please enter all fields.";
        echo json_encode($result);
        return;
    }

    dbconnection("spNewReview(" . $uid . ", "
        . $imageID . ", " . $rating . ", \"" . $reviewText . "\")");

    $result['status'] = 'success';
    $result['message'] = "Review added.";

    echo json_encode($result);
}

function getReviews($imageID) {
    require_once("../dbconnection.function.php");
    $result['status'] = 1;
    $result['data'] = dbconnection("spSelectReviews(\"$imageID\")");
    echo json_encode($result);
}

function deleteReview($reviewID, $uid) {
    require_once("../dbconnection.function.php");
    $userType = dbconnection("spSelectUser(" . $uid . ")");
    if ($userType[0]['State'] == 2) {
        dbconnection("spDeleteReview(" . $reviewID . ")");
        $result['status'] = 'success';
        $result['message'] = 'Successfully deleted.';
    }
    else {
        $result['status'] = 'error';
        $result['message'] = 'Insufficient access rights.';
    }
    echo json_encode($result);
}