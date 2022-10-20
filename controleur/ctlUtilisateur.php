<?php

// Importation du la class dbUtilisateur qui permet de récupérer les informations de l'utilisateur via ses fonctions  (requête SQL)
include './model/dbUtilisateur.php';


$action = $_GET['action'];


switch($action) {

    // si l'action est formConnect, on affiche le formualire de connexion
    case 'formConnect':

        include 'vue/vueUtilisateur/formConnect.php';

        break;

    // si l'action est deConnect, on detruit la session utilisateur et on le redirige vers la page d'accueil
    case 'deConnect':
        
        session_unset();
        session_destroy();
        header('location: index.php');

        break;


    // si l'action est validConnect, on vérifie que les infos connexion sont correctes, 
    // si oui on crée une session utilisateur 
    // si non on affiche un message d'erreur
    // On passe l'email en variable de session pour pouvoir l'utiliser dans les requêtes SQL (Notamment pour récupérer les infos du véhicule)
    case 'validConnect':

        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = DbUtilisateur::getUser($email, $password);
        if ($result['validation'] == 1) {
            $_SESSION['connect'] = 1;
            $_SESSION['email'] = $email;
            header('location: index.php');
        } else {
            echo "<h3 class='text-center'>Les informations de connexion sont incorrectes</h3>";

        }

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
        $carburant = $_POST['carburant'];
        $nb_places = $_POST['nb_places'];
        $result = DbUtilisateur::ajoutVehicule($marque, $carburant, $nb_places, $_SESSION['email']);
        header('location: index.php?ctl=utilisateur&action=profil');
        break;


        
    case 'supprimer':

        //appel à la base de donnée le modele
        DbUtilisateur::supprimerVehicule($_GET['id']);
        header("location: index.php?ctl=utilisateur&action=profil");
        break;

          
    }
    
    ?>
