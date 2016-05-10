<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MessageContact
 *
 * @author stagiaire
 */
class MessageContact {

    private $sMotif;
    private $sNom;
    private $sEmail;
    private $sDemande;

    function sendEmail() {
        echo 'Message de ' . $this->sNom . ' / ' . $this->sEmail;
        echo '<BR/>';
        echo '- objet : ' . $this->sMotif;
        echo '<BR/>';
        echo 'Message : ' . $this->sDemande;
    }

    function getSMotif() {
        return $this->sMotif;
    }

    function getSNom() {
        return $this->sNom;
    }

    function getSEmail() {
        return $this->sEmail;
    }

    function getSDemande() {
        return $this->sDemande;
    }

    function setSMotif($sMotif) {
        $this->sMotif = $sMotif;
    }

    function setSNom($sNom) {
        $this->sNom = $sNom;
    }

    function setSEmail($sEmail) {
        $this->sEmail = $sEmail;
    }

    function setSDemande($sDemande) {
        $this->sDemande = $sDemande;
    }

}
