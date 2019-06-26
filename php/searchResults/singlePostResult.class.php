<?php
date_default_timezone_set("America/Chicago");
class SinglePostResult {
    private $postTime;
    private $id;
    private $postTitle;
    private $message;

    function __construct($postTime, $id, $postTitle, $message) {
        $this->postTime = date("M d, Y", strtotime($postTime));
        $this->id = $id;
        $this->postTitle = $postTitle;
        $this->message = $message;
    }

    function output() {
        echo "<div class='col-12 col-lg-6 mb-4 element' title='{$this->postTitle}'>
            <h5><a href='singlePost.php?id={$this->id}'>{$this->postTitle}</a></h5>
            <p class='small mb-1'>Posted on {$this->postTime}</p>
            <p class='mb-0'>" . mb_strimwidth(strip_tags($this->message), 0, 255, "...") . "</p>
            <a class='btn btn-primary mt-2' href='singlePost.php?id={$this->id}'>View Post</a>
            <button class='btn btn-primary mt-2 ml-2' onclick=' addtofavpost({$this->id})'>Add to Favorites</button>
        </div>";
    }

    public  function cmp_name($a, $b) {
        if ($a->postTitle == $b->postTitle) {
            return 0;
        }
        return ($a->postTitle > $b->postTitle) ? +1:-1;
    }
}
?>
