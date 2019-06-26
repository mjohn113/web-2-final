<?php
class BrowseSingleImage {
    private $id;
    private $title;
    private $path;
    private $continent;
    private $country;

    function __construct($id, $title, $path, $continent, $country) {
        $this->id = $id;
        $this->title = $title;
        $this->path = $path;
        $this->continent = $continent;
        $this->country = $country;
    }

    function output() {
        echo "<div class='col-lg-3 col-md-4 col-sm-6 images' country='{$this->country}' continent='{$this->continent}'>
            <div class='card mx-2 my-1'>
                <a href='singleImage.php?id={$this->id}'><img src='travel-images/square-medium/{$this->path}' alt='Error' class='img-fluid card-img px-4 py-2'></a>
                <div class='text-center'>
                    <a href='singleImage.php?id={$this->id}'>{$this->title}</a>
                </div>
            </div>
        </div>";
    }
}
?>