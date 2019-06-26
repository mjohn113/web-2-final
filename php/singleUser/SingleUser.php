<?php
date_default_timezone_set("America/Chicago");
require_once("php/singleUser/User.php");
require_once("php/singleUser/TravelPost.php");
require_once("php/singleUser/TravelImage.php");
require_once("php/dbconnection.function.php");

class SingleUser
{
    private $user;
    private $posts = array();
    private $images = array();

    /**
     * SingleUser constructor.
     */
    public function __construct($uid)
    {
        $data = dbconnection("spSelectUser(\"" . $uid . "\")");
        if (sizeof($data) > 0) {
            $this->user = new User($data[0]["UID"], $data[0]["UserName"], $data[0]["Pass"], $data[0]["State"], $data[0]["DateJoined"], $data[0]["DateLastModified"],
                $data[0]["FirstName"], $data[0]["LastName"], $data[0]["Address"], $data[0]["City"], $data[0]["Region"], $data[0]["Country"], $data[0]["Postal"],
                $data[0]["Phone"], $data[0]["Email"], $data[0]["Privacy"]);

            $data = dbconnection("spSelectPosts(\"" . $uid . "\", NULL)");
            foreach ($data as $post) {
                $this->posts[] = new TravelPost($post["PostID"], $post["UID"], $post["ParentPost"], $post["Title"], $post["Message"], $post["PostTime"]);
            }

            $data = dbconnection("spSelectImages(\"" . $uid . "\")");
            foreach ($data as $image) {
                $this->images[] = new TravelImage($image["ImageID"], $image["UID"], $image["Path"], $image["ImageContent"], $image["Title"], $image["Description"],
                    $image["Latitude"], $image["Longitude"], $image["CityCode"], $image["CountryCodeISO"]);
            }
        }
        else {
            echo '<div class="container"><div class="row"><div class="col-12">No user was found.</div></div></div>';
            return;
        }
    }

    public function outputHeading() {
        if (isset($this->user)) {
            $sqlDate = strtotime($this->user->getDateJoined());
            $formattedDate = date("M d, Y", $sqlDate);
            echo '<div class="row">
                    <div class="col-12">
                        <h3>' . $this->user->getFirstName() . ' ' . $this->user->getLastName() . '</h3>
                        <p class="text-muted">Joined ' . $formattedDate . '</p>
                    </div>
                </div>';
        }
    }

    public function outputPosts() {
        if (isset($this->user)) {
            echo '<div class="row">
                    <div class="col-12">
                        <h4 class="font-weight-bold mb-3">Posts</h4>
                    </div>
                </div>
            <div class="row">';

            if (sizeof($this->posts) == 0) {
                echo '<div class="col-12"><p>No posts found.</p></div>';
            }

            foreach ($this->posts as $post) {
                $sqlDate = strtotime($post->getPostTime());
                $formattedDate = date("M d, Y", $sqlDate);
                echo '<div class="col-12 mb-3">
                        <h5><a href="singlePost.php?id=' . $post->getId() . '">' . $post->getTitle() . '</a></h5>
                        <p class="small mb-1">Posted on ' . $formattedDate . '</p>
                        <p class="mb-0">' . mb_strimwidth(strip_tags($post->getMessage()), 0, 255, "...") . '</p>
                        <a class="btn btn-primary mt-2" href="singlePost.php?id=' . $post->getId() . '">View Post</a>
                    </div>';
            }

            echo '</div>';
        }
    }

    function outputImages() {
        if (isset($this->user)) {
            echo '<div class="row">
                    <div class="col-12">
                        <h4 class="font-weight-bold mb-3">Images</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">';

            if (sizeof($this->images) == 0) {
                echo '<div class="col-12"><p>No images found.</p></div>';
            }

            foreach ($this->images as $image) {
                echo '<div class="col-6 col-sm-4 col-md-3 mb-4">
                        <a href="singleImage.php?id=' . $image->getId() . '">
                            <img src="./travel-images/square-medium/' . $image->getPath() . '" class="img-thumbnail">
                        </a>
                    </div>';
            }

            echo '</div></div></div>';
        }

    }

    function outputContact() {
        if (isset($this->user)) {
            $hide = ($this->user->getPrivacy() == 2 ? true : false);
            echo '<div class="row">
                    <div class="col-12">
                        <h4 class="font-weight-bold mb-3">Contact</h4>
                    </div>
                    <div class="col-12 col-sm-4 col-md-12">
                        <h5>Address</h5>';
                        if ($hide)
                            echo '<p class="text-muted">Hidden</p>';
                        else {
                            if ($this->user->getAddress() != null) {
                                echo '<address>' . $this->user->getAddress() . '<br>' . $this->user->getCity() . ', ' . $this->user->getCountry() . ' ' . $this->user->getPostal() . '</address>';
                            }
                            else {
                                echo '<p>No address found.</p>';
                            }
                        }
                    echo '</div>
                    <div class="col-12 col-sm-4 col-md-12">
                        <h5>Phone</h5>';
                        if ($hide)
                            echo '<p class="text-muted">Hidden</p>';
                        else {
                            if ($this->user->getPhone() != null) {
                                echo '<p>' . $this->user->getPhone() .'</p>';
                            }
                            else {
                                echo '<p>No phone number found.</p>';
                            }
                        }
                    echo '</div>
                    <div class="col-12 col-sm-4 col-md-12">
                        <h5>Email</h5>';
                        if ($hide)
                            echo '<p class="text-muted">Hidden</p>';
                        else {
                            if ($this->user->getEmail() != null) {
                                echo '<p>' . $this->user->getEmail() . '</p>';
                            }
                            else {
                                echo '<p>No email found.</p>';
                            }
                        }
                    echo '</div>
                </div>';
        }
    }
}