<?php

session_start();
include_once('class/class_annonce.php');
include_once('data.php');
include_once('fonction.php');
/* $MyPage =isset($_POST['action'])?$_POST['action']:null;

  $MyFile='./views/vue_'.$MyPage.'.php';

  if(file_exists($MyFile)){
  include($MyFile);

  }else{
  include('./views/vue_home.php');

  }
 */


switch ($_POST['action']) {
    case "home":
        include('./views/vue_home.php');
        break;
    case "contact":
        include('./views/vue_contact.php');
        break;
    case "depot" :
        include('./views/vue_depot.php');
        break;
}
?>
