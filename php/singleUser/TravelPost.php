<?php

class TravelPost
{
    private $id;
    private $uid;
    private $parentPost;
    private $title;
    private $message;
    private $postTime;

    /**
     * TravelPost constructor.
     * @param $id
     * @param $uid
     * @param $parentPost
     * @param $title
     * @param $message
     * @param $postTime
     */
    public function __construct($id, $uid, $parentPost, $title, $message, $postTime)
    {
        $this->id = $id;
        $this->uid = $uid;
        $this->parentPost = $parentPost;
        $this->title = $title;
        $this->message = $message;
        $this->postTime = $postTime;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    /**
     * @return mixed
     */
    public function getParentPost()
    {
        return $this->parentPost;
    }

    /**
     * @param mixed $parentPost
     */
    public function setParentPost($parentPost)
    {
        $this->parentPost = $parentPost;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getPostTime()
    {
        return $this->postTime;
    }

    /**
     * @param mixed $postTime
     */
    public function setPostTime($postTime)
    {
        $this->postTime = $postTime;
    }

}