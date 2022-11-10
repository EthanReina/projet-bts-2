<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="vue/css/style.css">
    <title>
        
        <?php
            // Si il n'existe pas la variable de session connect, alors on affiche le titre "Page d'accueil"
            if(!isset($_SESSION['connect'])) {

                    echo "Page d'accueil";
            // Sinon on affiche le titre "Profil"
            } else {
                    
                    echo "Espace membre - Connecté";
    
            }

        ?>

    </title>
</head>
<body class="bg-light">
    