<?php
include './model/dbUtilisateur.php';
$action = $_GET['action'];

switch($action) {

    case 'formConnect':

        include 'vue/vueUtilisateur/formConnect.php';

        break;

        case 'formdeConnect';
        session_unset();
       session_destroy();
       // header('Location: index.php');
        break;
        case 'validConnect':
    
        if(isset($_POST['Email'])&& isset($_POST['Password']))
         {
            $Email = $_POST['Email'];
            $Pwd = $_POST['Password'];
            $result = dbUtilisateur::getUser($Email,$Password);
            if(is_array($result))
            {
                $_SESSION['Email']=$Email;
            }
         }
         header('location:index.php');
         break;
          
    }
    
    
    ?>
