<?php

//print_r($_SESSION);
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit();
}

if (!isset($_SESSION['oUtilisateur'])) {
    $_SESSION['oUtilisateur'] = NULL;
}
$oUser = ($_SESSION['oUtilisateur'] instanceof Utilisateur) ? $_SESSION['oUtilisateur'] : NULL;


if (isset($_POST['loginForm'])) {

    $sEmailInput = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $sPasswordInput = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    //print_r(array($sEmailInput, $sPasswordInput));

    if ($sEmailInput && $sPasswordInput) {
        /* pour chaque élement du tableau $myUsers,
          récupère et affecte la valeur de l'index,
          puis récupère et affecte la valeur associée à cet index */
        $oUtilisateur = $oUtilisateurManager->getByEmailAndPassword($sEmailInput, $sPasswordInput);
        print_r($oUtilisateur);

        if ($oUtilisateur instanceof Utilisateur) {
            //$bIsConnected=true;
            $_SESSION['oUtilisateur'] = $oUtilisateur;
            //echo $sEmailConnected;
        }
    }
}
//var_dump($bIsConnected);
//annonceForm est le nom du bouton du formulaire de dépot
if (isset($_POST['annonceForm'])) {
    //filtrage/validation des champs de formulaires
    //filter_input => null si filtre pas ok
    $iIdUser = $oUser->getId();
    echo $iIdUser;
    $sTitreAnnonce = filter_input(INPUT_POST, 'nomAnn', FILTER_SANITIZE_STRING);
    $sDescriptionAnnonce = filter_input(INPUT_POST, 'descriptionAnn', FILTER_SANITIZE_STRING);
    $iPrix = filter_input(INPUT_POST, 'prixAnn', FILTER_VALIDATE_INT);
    //print_r($_FILES);
    //print_r($_FILES['URLAnn']['tmp_name']);
    $aAllowedType = array('image/png', 'image/png', 'image/jpeg', 'image/gif');
    $sImage = false;
    if (isset($_FILES['URLAnn']) && $_FILES['URLAnn']['error'] == UPLOAD_ERR_OK) {
        if (in_array($_FILES['URLAnn']['type'], $aAllowedType)) {
            $sImage = $_FILES['URLAnn']['tmp_name'];
        }
    }



    // on teste qu'aucune des 4 variables ne soit nulle
    if ($sTitreAnnonce && $sDescriptionAnnonce && $sImage && $iPrix) {

        //création de l'objet annonce
        $oMonAnnonce = new Annonce();
        $oMonAnnonce->setIdUser($iIdUser);
        $oMonAnnonce->setTitle($sTitreAnnonce);
        $oMonAnnonce->setDescription($sDescriptionAnnonce);
        $oMonAnnonce->setPrice($iPrix);
        $oMonAnnonce->setCreatedDate('2016-04-27');




        $fileTmp = $_FILES['URLAnn']['tmp_name'];
        $aExt = explode('/', $_FILES['URLAnn']['type']);

        //print_r($aExt[1]);
        //C:\Utilitaires\EasyPHP-5.3.2i\www\html-css\
        $filePath = 'images/';
        //$fileRef = myIndexFile();

        $fileDest = uniqid();

        print_r($fileDest);
        //__DIR = emplacement du fichier
        //print_r($filePath . $fileDest);
        //imagecopyresampled($NouvelleImage, $fileTmp, 0, 0, 0, , $NouvelleLargeur, $NouvelleHauteur, $LargeurImageDepart, $HauteurImageDepart);
//        $ImageChoisie = imagecreatefromjpeg($_FILES['URLAnn']['tmp_name']);
//        $TailleImageChoisie = getimagesize($_FILES['URLAnn']['tmp_name']);
//        $NouvelleLargeur = 160;
//        $Reduction = ( ($NouvelleLargeur * 100) / $TailleImageChoisie[0] );
//        $NouvelleHauteur = ( ($TailleImageChoisie[1] * $Reduction) / 100 );
//        $NouvelleImage = imagecreatetruecolor($NouvelleLargeur, $NouvelleHauteur);
//
//        imagecopyresampled($NouvelleImage, $ImageChoisie, 0, 0, 0, 0, $NouvelleLargeur, $NouvelleHauteur, $TailleImageChoisie[0], $TailleImageChoisie[1]);

        if (move_uploaded_file($sImage, $filePath . $fileDest . '.' . $aExt[1])) {
            $oMonAnnonce->setPicture($fileDest . '.' . $aExt[1]);
            //sauvegarde de l'annonce voir fonction save dans class_annonce
            //$oMonAnnonce->save();
        }


        //imagejpeg($NouvelleImage, $filePath . $fileDest . '.' . $aExt[1], 100);
        //imagejpeg($NouvelleImage, 'images/toto.jpg', 100);
        //print_r($NouvelleImage);
        //$oMonAnnonce->setPicture($fileDest . '.' . $aExt[1]);
        //$oMonAnnonce->save();

        $oAnnonceManager->insert($oMonAnnonce);
    }
}

if (isset($_POST['contact'])) {
    $sMotifContact = filter_input(INPUT_POST, 'motifContact', FILTER_SANITIZE_STRING);
    $sNomContact = filter_input(INPUT_POST, 'yourName', FILTER_SANITIZE_STRING);
    $sContenuContact = filter_input(INPUT_POST, 'yourText', FILTER_SANITIZE_STRING);
    $sEmailContact = filter_input(INPUT_POST, 'yourEmail', FILTER_VALIDATE_EMAIL);
    //print_r(Array($sMotifContact, $sNomContact, $sContenuContact, $sEmailContact));
    //$sMessageContact = '....';
    if ($sMotifContact && $sNomContact && $sContenuContact && $sContenuContact) {
        $oUnContact = new MessageContact;
        $oUnContact->setSMotif($sMotifContact);
        $oUnContact->setSNom($sNomContact);
        $oUnContact->setSEmail($sEmailContact);
        $oUnContact->setSDemande($sContenuContact);
        $oUnContact->sendEmail();
    }
}

if (isset($_POST['modifPasswd'])) {
    //filtrage/validation des champs de formulaires
    //filter_input => null si filtre pas ok

    $sNewPasswd = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $oUser->setPassword($sNewPasswd);
    //echo $_POST['modifPasswd']['password'];
    //$oUtilisateurManager->$sNewPasswd;
    //if ($sNewPasswd == $_POST['modifPasswd']['password']) {
    //$oUtilisateurManager->setPassword($_SESSION['utilisateur'], $sNewPasswd);
    $oUtilisateurManager->update($oUser);
    $_SESSION['utilisateur'] = $oUser;
    print_r($_SESSION['utilisateur']);
    //} else {
    //   echo 'Non pris en compte - Votre new passwd contient des caractères zarbi';
    //}
}
if (isset($_GET['delete_ann'])) {
    $oAnnToDel = $oAnnonceManager->get($_GET['delete_ann']);
    $oAnnonceManager->delete($oAnnToDel);
    header('Location: index.php');
    exit();
}
