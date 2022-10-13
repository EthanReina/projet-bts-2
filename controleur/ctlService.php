<?php
include './model/DbService.php';

$action = $_GET['action'];

switch($action){
		
			case 'lister':
				//appel à la base de donnée le modele
				$listeService = DbService::getListeService();
				
				//appel à la vue
				include 'vue/vueService/v_listeServices.php';
				
				break;	 
			 
			 case 'supprimer':

				//appel à la base de donnée le modele
				DbService::supprimerService($_GET['id']);
				
				header('location: index.php?ctl=service&action=lister');
				
				break;
				
		}

?>