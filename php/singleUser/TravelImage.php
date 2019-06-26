<?php

class TravelImage
{
    private $id;
    private $uid;
    private $path;
    private $imageContent;
    private $title;
    private $deescription;
    private $latitude;
    private $longitude;
    private $cityCode;
    private $countryCodeIso;

    /**
     * TravelImage constructor.
     * @param $id
     * @param $uid
     * @param $path
     * @param $imageContent
     * @param $title
     * @param $description
     * @param $latitude
     * @param $longitude
     * @param $cityCode
     * @param $countryCodeIso
     */
    public function __construct($id, $uid, $path, $imageContent, $title, $description, $latitude, $longitude, $cityCode, $countryCodeIso)
    {
        $this->id = $id;
        $this->uid = $uid;
        $this->path = $path;
        $this->imageContent = $imageContent;
        $this->title = $title;
        $this->deescription = $description;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->cityCode = $cityCode;
        $this->countryCodeIso = $countryCodeIso;
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
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getImageContent()
    {
        return $this->imageContent;
    }

    /**
     * @param mixed $imageContent
     */
    public function setImageContent($imageContent)
    {
        $this->imageContent = $imageContent;
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
    public function getDeescription()
    {
        return $this->deescription;
    }

    /**
     * @param mixed $deescription
     */
    public function setDeescription($deescription)
    {
        $this->deescription = $deescription;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getCityCode()
    {
        return $this->cityCode;
    }

    /**
     * @param mixed $cityCode
     */
    public function setCityCode($cityCode)
    {
        $this->cityCode = $cityCode;
    }

    /**
     * @return mixed
     */
    public function getCountryCodeIso()
    {
        return $this->countryCodeIso;
    }

    /**
     * @param mixed $countryCodeIso
     */
    public function setCountryCodeIso($countryCodeIso)
    {
        $this->countryCodeIso = $countryCodeIso;
    }

}