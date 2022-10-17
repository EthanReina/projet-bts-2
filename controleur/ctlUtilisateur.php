<?php

$action = $_GET['action'];

switch($action) {

    case 'formConnect':

        include 'vue/vueUtilisateur/formConnect.php';

        break;

}