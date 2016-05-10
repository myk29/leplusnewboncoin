<?php

class Annonce {

    protected $id;
    protected $id_user;
    protected $title;
    protected $description;
    protected $picture;
    protected $price;
    protected $created_date;
    public static $NB_ANNONCES = 0; //static variable globale dans le référentiel

    //public function __construct() {
    //    Annonce::$NB_ANNONCES ++;
    //    $this->id = Annonce::$NB_ANNONCES;
    //}

    public function __construct($aData = array()) { //tableau optionnel
        if ($aData) { //if d'un tableau vrai si le tableau existe
            $this->hydrate($aData); // si le tableau existe on appelle hydrate
        }
    }

    public function hydrate($aData) {
        foreach (array_keys(get_class_vars(get_class($this)))as $sKey) {
            if (isset($aData[$sKey])) {
                $this->$sKey = $aData[$sKey];
            }
        }
    }

    public static function load() {
        $aList = array();
        foreach (glob("data/annonce*.txt") as $filePath) {
            $oAnnonce = unserialize(file_get_contents($filePath));
            $aList[$oAnnonce->getId()] = $oAnnonce;
        }

        Annonce::$NB_ANNONCES = count($aList);

        return $aList;
    }

    public static function getById($id) {
        $filePath = 'data/annonce_' . str_pad($id, 3, '0', STR_PAD_LEFT) . '.txt';
        if (file_exists($filePath)) {
            $oAnnonce = unserialize(file_get_contents($filePath));
            return $oAnnonce;
        } else {
            return false;
        }
    }

    public function save() {
        $file = 'data/annonce_' . str_pad($this->getId(), 3, '0', STR_PAD_LEFT) . '.txt';
        file_put_contents($file, serialize($this));
    }

    public function getId() {
        return $this->id;
    }

    public function setId($myId) {
        $this->id = $myId;
    }

    public function getIdUser() {
        return $this->id_user;
    }

    public function setIdUser($idUser) {
        $this->id_user = $idUser;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($myTitle) {
        $this->title = $myTitle;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($myDescription) {
        $this->description = $myDescription;
    }

    public function getPicture() {
        return $this->picture;
    }

    public function setPicture($myImage) {
        $this->picture = $myImage;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($myPrice) {
        $this->price = $myPrice;
    }

    public function getCreatedDate() {
        return $this->created_date;
    }

    public function setCreatedDate($myDate) {
        $this->created_date = $myDate;
    }

}
