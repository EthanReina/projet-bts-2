<?php

session_start();

include 'vue/entete.php';

include 'vue/menu.php';	

if(isset($_GET['ctl']))
{
	switch($_GET['ctl']){
		
			case 'service':
			 include 'controleur/ctlService.php';
			 break;
			 
			 case 'emp':
			 include 'controleur/ctlEmploye.php';
			 break;
			 
		}
	
}
include 'vue/pied.php';

?>        				 
         
