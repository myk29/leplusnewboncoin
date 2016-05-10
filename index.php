<?php
include_once('class/class_utilisateur.php');
include_once('class/class_utilisateur_manager.php');
session_start();
include_once('class/class_annonce.php');
include_once('class/class_annonce_manager.php');
include_once('class/class_message_contact.php');


include_once('fonction.php');
$oPDO = connectDB_PDO();
$oAnnonceManager = new AnnonceManager($oPDO);
$oUtilisateurManager = new UtilisateurManager($oPDO);

include_once('data.php');
include_once('traitement.php');

//$oAnnonce = new Annonce;
//print_r($oAnnonce);

logIP();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/myCssContact.css" type="text/css">
        <link rel="stylesheet" href="styles/myCssDepot.css" type="text/css">
        <link rel="stylesheet" href="styles/mycss.css" type="text/css">
        <script src='jquery-2.2.3.min.js'></script>

        <title>Le encore plus bon coin </title>

        <!-- On précise l'encodage de notre fichier HTML -->
        <meta charset="UTF-8" />

        <!-- On défini quelques balises META -->
        <meta name="description" content="Le nouveau bon coin encore plus bon coin" />
        <meta name="keywords" content="annonces, bonnes affaires" />
    </head>
    <body>
        <?php
        include('./views/header.php');
        //print_r($_GET);
        //$MyFile = './views/vue_'.$_GET['page'].'.php';
        echo '<div id="content">';

        /* $MyPage =isset($_GET['page'])?$_GET['page']:null;

          $MyFile='./views/vue_'.$MyPage.'.php';

          if(file_exists($MyFile)){
          include($MyFile);

          }else{
          include('./views/vue_home.php');

          } */
        /* switch ($_GET['page']) {
          case "home":
          include('./views/vue_home.php');
          break;
          case "contact":

          include('./views/vue_contact.php');

          break;
          case "depot" :
          if ($_SESSION['bIsConnected']) {
          include('./views/vue_depot.php');
          } else {
          echo 'Veuillez vous connecter pour accéder à ce service !';
          }
          break;
          case "annonce" :
          include('./views/vue_annonce.php');

          break;
          } */
        $myPath = './views/vue_';
        $myPage = isset($_GET['page']) ? $_GET['page'] : 'home';

        include($myPath . $myPage . '.php');
        echo '</div>';
        include('./views/footer.php');
        ?>
        <script>
            $('#aj1').on('click', function () {
                $.ajax({
                    async: true,
                    type: 'POST',
                    url: 'ajax.php',
                    data: 'action=home',
                    error: function (errorData) {
                        alert(errorData);
                    },
                    success: function (data) {

                        $('#content').html(data);
                    }
                })

            });

            $('#aj2').on('click', function () {
                $.ajax({
                    async: true,
                    type: 'POST',
                    url: 'ajax.php',
                    data: 'action=contact',
                    error: function (errorData) {

                        alert(errorData);
                    },
                    success: function (data) {
                        $('#content').html(data);
                    }
                })
            });

            $('#dep').on('click', function () {

            });

            /*$('article').on('click', function () {
             $.ajax({
             async: true,
             type: 'POST',
             url: 'ajax.php',
             data: 'action=depot',
             error: function (errorData) {

             alert(errorData);
             },
             success: function (data) {
             $('#content').html(data);
             },
             })

             });*/
        </script>
        <?php
//		echo'<pre>';
//		print_r($_SERVER);
//		echo'<pre>';
        ?>
    </body>
</html>