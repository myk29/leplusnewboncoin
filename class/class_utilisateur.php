<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilisateur
 *
 * @author stagiaire
 */
class Utilisateur {

    protected $id;
    protected $email;
    protected $password;

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

    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

}
