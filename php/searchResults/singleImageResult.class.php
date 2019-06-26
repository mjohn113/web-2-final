<?php
class SingleImageResult {
    private $id;
    private $title;
    private $path;

    function __construct($id, $title, $path) {
        $this->id = $id;
        $this->title = $title;
        $this->path = $path;
    }

    function output() {
        echo "<div class='col-lg-3 col-md-4 col-sm-6 element' title='{$this->title}'>
            <div class='card mx-2 my-1'>
                <a href='singleImage.php?id={$this->id}'><img src='travel-images/square-medium/{$this->path}' alt='Error' class='img-fluid card-img px-4 py-2'></a>
                <div class='text-center'>
                    <a href='singleImage.php?id={$this->id}'>{$this->title}</a>
                    <button class='btn btn-primary mb-1' onclick=' addtofav({$this->id})'>Add to Favorites</button>
                </div>
            </div>
        </div>";
    }

    public  function cmp_name($a, $b) {
        if ($a->title == $b->title) {
            return 0;
        }
        return ($a->title > $b->title) ? +1:-1;
    }
}
?>
