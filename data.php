<?php

/* $dataAnnonces est un tableau */
$today = date("d/m/Y");
//print_r($today);
//print_r($oAnnonceManager->get(47));
//$oAnnTest = $oAnnonceManager->get(47);
//$oAnnTest2 = $oAnnonceManager->get(2);
//$iPrice = 123456;
//$oAnnTest->setPrice($iPrice);
//$oAnnonceManager->update($oAnnTest);
//$oAnnonceManager->delete($oAnnTest2);




$dataUne = array();
/* $dataUne[]=array(
  'titre' => 'Lave linge',
  'prix' => '36 €',
  'photo' => './images/im1u.jpg',
  );
  $dataUne[]=array(
  'titre' => 'Petit chien pour réaliser vous même de délicieux nems... ',
  'prix' => '48 €',
  'photo' => './images/im2u.jpg',
  );
  $dataUne[]=array(
  'titre' => 'truc',
  'prix' => '3 €',
  'photo' => './images/im3u.jpg',
  ); */

//$oUnUtilisateur = new Utilisateur;
//$oUnUtilisateur->setSEmail('moi@free.fr');
//$oUnUtilisateur->setSPasswd('bof');
//$myUsers = array(
//->getSEmail() => $oUnUtilisateur->getSPasswd(),
//);





$oAnnonce1u = new Annonce();
//$oAnnonce1u->setId(4);
$oAnnonce1u->setTitle('Lave linge');
//$oAnnonce1u->setDescription();
$oAnnonce1u->setPicture('./images/im1u.jpg');
$oAnnonce1u->setPrice(36);
//$oAnnonce1u->setDate(1);

$oAnnonce2u = new Annonce();
//$oAnnonce2u->setId(2);
$oAnnonce2u->setTitle('Petit chien pour réaliser vous même de délicieux nems... ');
//$oAnnonce2u->setDescription(1);
$oAnnonce2u->setPicture('./images/im2u.jpg');
$oAnnonce2u->setPrice(48);
//$oAnnonceu2->setDate(1);

$oAnnonce3u = new Annonce();
//$oAnnonce3u->setId(3);
$oAnnonce3u->setTitle('truc');
//$oAnnonce3u->setDescription(1);
$oAnnonce3u->setPicture('./images/im3u.jpg');
$oAnnonce3u->setPrice(3);
//$oAnnonce3u->setDate(1);

$dataUne[] = $oAnnonce1u;
$dataUne[] = $oAnnonce2u;
$dataUne[] = $oAnnonce3u;
