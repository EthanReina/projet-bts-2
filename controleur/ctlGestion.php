<?php

// Importation du la class dbUtilisateur qui permet de récupérer les informations de l'utilisateur via ses fonctions  (requête SQL)

include './model/dbUtilisateur.php';

$action = $_GET['action'];


switch($action) {

    case 'consulter':
        $result = DbUtilisateur::getNoteDeFraisById($_GET['idnote']);
        include 'vue/vueGestion/v_gestionNoteDeFrais.php'; 
        break;
            
}
    
?>
