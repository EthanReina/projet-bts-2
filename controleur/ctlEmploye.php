<?php
include './model/DbService.php';

$action = $_GET['action'];

switch($action){
		
			case 'lister':
                //appel à la base de donnée le modele
                $listeEmploye = DbService::getListeEmploye();
                
                //appel à la vue
                include 'vue/vueEmploye/v_listeEmploye.php';
                
                break;

            case 'supprimer':

                //appel à la base de donnée le modele
                DbService::supprimerEmploye($_GET['id']);
                
                //appel à la vue
                header('location: index.php?ctl=emp&action=lister');
                
                break;
			
				
		}

?>