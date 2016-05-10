<?php

class AnnonceManager {

    const TABLE = 'annonces';  // Constante de classe où l'on stocke le nom de la table relative à nos annonces

    private $oDB;

    public function __construct($oDB) {
        $this->oDB = $oDB;
    }

    public function getList() {
        $oRes = $this->oDB->query('SELECT * FROM annonces');
        $aList = array();
        while ($aLine = $oRes->fetch(PDO::FETCH_ASSOC)) {
            $oAnnonce = new Annonce($aLine);
            $aList[] = $oAnnonce;
        }
        return $aList;
    }

    public function get($id) {
        $sQuery = 'SELECT * FROM annonces WHERE id=?';
        $oStmt = $this->oDB->prepare($sQuery);
        $oStmt->bindValue(1, $id, PDO::PARAM_INT);
        $oStmt->execute();
        $aData = $oStmt->fetch();
        return new Annonce($aData);
    }

    public function insert(Annonce $o) {
        print_r($o);
        $sQuery = 'INSERT INTO annonces
               ( id_user,title, description, picture, price,created_date)
           VALUES (:id_user, :title, :description, :picture, :price, :created_date)';

        $oStmt = $this->oDB->prepare($sQuery);
        $oStmt->bindValue(':id_user', $o->getIdUser(), PDO::PARAM_INT);
        $oStmt->bindValue(':title', $o->getTitle(), PDO::PARAM_STR);
        $oStmt->bindValue(':description', $o->getDescription(), PDO::PARAM_STR);
        $oStmt->bindValue(':picture', $o->getPicture(), PDO::PARAM_STR);
        $oStmt->bindValue(':price', $o->getPrice(), PDO::PARAM_INT);
        $oStmt->bindValue(':created_date', $o->getCreatedDate(), PDO::PARAM_STR);
        $oStmt->execute();
        $o->setId($this->oDB->lastInsertId());
    }

    public function delete(Annonce $oAnnonce) {
        $oQuery = $this->oDB->prepare('DELETE FROM `' . self::TABLE . '` WHERE id = :id');
        $oQuery->bindValue(':id', $oAnnonce->getId(), PDO::PARAM_INT);

        if ($oQuery->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update(Annonce $oAnnonce) {
        $oQuery = $this->oDB->prepare('UPDATE ' . self::TABLE . '
			SET
                            title = :title,
                            description = :description,
                            picture = :picture,
                            price = :price
			WHERE id = :id');
        $oQuery->bindValue(':title', $oAnnonce->getTitle(), PDO::PARAM_STR);
        $oQuery->bindValue(':description', $oAnnonce->getDescription(), PDO::PARAM_STR);
        $oQuery->bindValue(':picture', $oAnnonce->getPicture(), PDO::PARAM_STR);
        $oQuery->bindValue(':price', $oAnnonce->getPrice(), PDO::PARAM_INT);
        $oQuery->bindValue(':id', $oAnnonce->getId(), PDO::PARAM_INT);

        if ($oQuery->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
