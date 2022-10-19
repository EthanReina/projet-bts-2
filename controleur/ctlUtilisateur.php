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
        if ($result['validation'] == 1) {
            $_SESSION['connect'] = 1;
            $_SESSION['email'] = $email;
            header('location: index.php');
        } else {
            echo "<h1>Les informations de connexion sont incorrectes</h1>";

        }
        break;
          
    }
    
    
    ?>
