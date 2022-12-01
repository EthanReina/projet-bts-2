<?php

// Importation du la class dbUtilisateur qui permet de récupérer les informations de l'utilisateur via ses fonctions  (requête SQL)

include './model/dbUtilisateur.php';

$action = $_GET['action'];


switch($action) {

    case 'consulter':
        $result = DbUtilisateur::getNoteDeFraisById($_GET['idnote']);
        $infoLigneFc = DbUtilisateur::getLigneFc($_GET['idnote']);
        $infoLigneFk = DbUtilisateur::getLigneFk($_GET['idnote']);
        include 'vue/vueGestion/v_gestionNoteDeFrais.php'; 
        break;

    case 'validStatut':
        DbUtilisateur::validStatutLigneFc($_GET['idLigneFc']);
        header('location: index.php?ctl=gestion&action=consulter&idnote='.$_GET['idnote']);
    
        break;

    case 'deniedStatut':
        DbUtilisateur::deniedStatutLigneFc($_GET['idLigneFc']);
        header('location: index.php?ctl=gestion&action=consulter&idnote='.$_GET['idnote']);
    
        break;
        
}
    
?>
