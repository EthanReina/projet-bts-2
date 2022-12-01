<?php

session_start();



include 'vue/entete.php';

include 'vue/menu.php';

if(isset($_GET['ctl'])) {

    switch($_GET['ctl']) {

        case 'utilisateur':
                
            include 'controleur/ctlUtilisateur.php';

            break;
        
        case 'gestion';

            if(isset($_SESSION['connect'])) {

                
                if($_SESSION['droit'] == 1) {

                    include 'controleur/ctlGestion.php';

                } else { ?>

                    <div class="container text-center">
                        <h1 class="display-1 fs-5 pb-2">Vous n'avez pas les droits pour accéder à cette page.</h1>
                        <a href="index.php"><button class="btn btn-primary">Retour</button></a>
                    </div>

                   <?php

                }
                

            } else { ?>

                    <div class="container text-center">
                        <h1 class="display-1 fs-5 pb-2">Veuillez vous connecter.</h1>
                        <a href="index.php?ctl=utilisateur&action=formConnect"><button class="btn btn-primary">Connexion</button></a>
                    </div>

            <?php }

    }

}

include 'vue/pied.php';

?>        				 
         
