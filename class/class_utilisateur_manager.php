<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_utilisateur_manager
 *
 * @author stagiaire
 */
class UtilisateurManager {

    private $oDB;    // Instance de PDO

    const TABLE = 'users';  // Constante de classe où l'on stocke le nom de la table relative à nos utilisateurs

    public function __construct($oDB) {
        $this->oDB = $oDB;
    }

    public function getByEmailAndPassword($email, $password) {
        $sQuery = 'SELECT * FROM users WHERE email=:email  AND password=:password';
        $oStmt = $this->oDB->prepare($sQuery);
        $oStmt->bindValue(':email', $email, PDO::PARAM_STR);
        $oStmt->bindValue(':password', $password, PDO::PARAM_STR);
        $oStmt->execute();
        $aData = $oStmt->fetch();
        if ($aData) {
            return new Utilisateur($aData);
        }
    }

    public function getList() {
        // On communique avec notre base de données pour récupérer nos utilisateurs
        // Le nom de la base est stockée dans self::TABLE
        $oQuery = $this->oDB->query('SELECT * FROM ' . self::TABLE);

        $aList = array();
        // On parcourt les résultats et on les enregistre dans un tableau
        while ($aData = $oQuery->fetch(PDO::FETCH_ASSOC)) {
            // $aData contient les valeurs d'une ligne
            $aList[] = new User($aData);
        }

        // On retourne la liste des utilisateurs
        return $aList;
    }

    public function get($iId) {
        $oQuery = $this->oDB->prepare('SELECT * FROM ' . self::TABLE . ' WHERE id = ?');
        $oQuery->bindValue(1, $iId, PDO::PARAM_INT);
        $oQuery->execute();

        $aData = $oQuery->fetch(PDO::FETCH_ASSOC);
        return new User($aData);
    }

    /*
      Insert UN utilisateur (via ses données)
     */

    public function insert(User &$oUser) {
        $oQuery = $this->oDB->prepare('INSERT INTO ' . self::TABLE . '
			(email, password)
			VALUES (:email, :password)');
        $oQuery->bindValue(':email', $oUser->getEmail(), PDO::PARAM_STR);
        $oQuery->bindValue(':password', '', PDO::PARAM_STR);

        if ($oQuery->execute()) {
            // On récupère l'id auto-incrémenté par la base de données
            $oUser->setId($this->oDB->lastInsertId());
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
      Met à jour UN utilisateur (via ses données)
     */

    public function update(User $oUser) {
        $oQuery = $this->oDB->prepare('UPDATE ' . self::TABLE . '
			SET
                            email = :email,
                            password = :password,
			WHERE id = :id');
        $oQuery->bindValue(':email', $oUser->getEmail(), PDO::PARAM_STR);
        $oQuery->bindValue(':password', '', PDO::PARAM_STR);
        $oQuery->bindValue(':id', $oUser->getId(), PDO::PARAM_INT);

        if ($oQuery->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
      Supprime UN utilisateur (via ses données)
     */

    public function delete(User $oUser) {
        $oQuery = $this->oDB->prepare('DELETE ' . self::TABLE . ' WHERE id = :id');
        $oQuery->bindValue(':id', $oUser->getId(), PDO::PARAM_INT);

        if ($oQuery->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function setPassword(User $oUser) {
        $oQuery = $this->oDB->prepare('UPDATE ' . self::TABLE . '
			SET
                            password = :password,
			WHERE id = :id');
        $oQuery->bindValue(':password', '', PDO::PARAM_STR);
        $oQuery->bindValue(':id', $oUser->getId(), PDO::PARAM_INT);

        if ($oQuery->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
