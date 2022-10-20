<?php


include './model/dbUtilisateur.php';

$action = $_GET['action'];

switch($action) {

    case 'formConnect':

        include 'vue/vueUtilisateur/formConnect.php';

        break;

    case 'deConnect':
        
        session_unset();
        session_destroy();
        header('location: index.php');

        break;

    case 'validConnect':

        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = DbUtilisateur::getUser($email, $password);
        if (COUNT($result)>0) {
            $_SESSION['connect'] = 1;
            $_SESSION['email'] = $email;
            header('location: index.php');
        } else {
            echo "<h3 class='text-center'>Les informations de connexion sont incorrectes</h3>";

        }
<<<<<<< Updated upstream
=======

        break;


    // si l'action est profil, on affiche le profil de l'utilisateur (vue v_profilUtilisateur.php)
    // On récupère les infos de l'utilisateur via la fonction getUserInfo() de la class dbUtilisateur
    // On récupère les infos du véhicule via la fonction getInfoVehicule() de la class dbUtilisateur
    case 'profil':
            
            if (isset($_SESSION['connect'])) {
                $email = $_SESSION['email'];
                $result = DbUtilisateur::getInfoUser($email);
                $infoVehicule = DbUtilisateur::getVehicule($email);
                include 'vue/vueUtilisateur/v_profilUtilisateur.php';
            } else {
                header('location: index.php');
            }
    
            break;

    // si l'action est ajoutVehicule, on ajoute le véhicule de l'utilisateur via la fonction ajoutVehicule() de la class dbUtilisateur
    case 'ajoutVehicule':
    
        $marque = $_POST['marque'];
       $carburant =  $_POST['carburant'];
        
       
    
        $result = DbUtilisateur::ajoutVehicule($marque, $carburant, $_SESSION['email']);
        header('location: index.php?ctl=utilisateur&action=profil');
>>>>>>> Stashed changes
        break;
          
    }
    
    
    ?>
