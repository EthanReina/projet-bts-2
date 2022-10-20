<?php
include 'connectPdo.php';

// Classe DbUtilisateur qui contient les fonctions de requêtes SQL

class DbUtilisateur
{

    // Fonction qui permet de vérifier que les informations de connexion sont correctes et que l'utilisateur existe bien dans la base de données
    public static function getUser($Email, $Password)
    {
        $sql="select COUNT(id_utilisateur) as validation from utilisateurs where email='$Email' and mot_de_passe='$Password'";
        $objResultat=connectPdo::getObjPdo()->query($sql);
        $result=$objResultat->fetch();
        return $result;
    }

    // Fonction qui permet de récupérer les informations de l'utilisateur via son email
    public static function getInfoUser($Email)
    {
        $sql="select * from utilisateurs where email='$Email'";
        $objResultat=connectPdo::getObjPdo()->query($sql);
        $result=$objResultat->fetch();
        return $result;
    }

    // Fonction qui permet d'associer un véhicule à un utilisateur via son adresse email (On utilise l'email de l'utilisateur comme jointure)
    public static function ajoutVehicule($marque, $carburant, $nb_places, $utilisateur)
    {
        $sql="INSERT INTO vehicule (marque, carburant, nb_places, utilisateur) VALUES ('$marque', '$carburant','$nb_places', '$utilisateur')";
        $objResultat=connectPdo::getObjPdo()->query($sql);
    }

    // Fonction qui permet de récupérer les informations du véhicule de l'utilisateur via son email (Variable $utilisateur)
    public static function getVehicule($utilisateur)
    {

        $sql="select * from vehicule where utilisateur='$utilisateur'";

        $objResultat=connectPdo::getObjPdo()->query($sql);
        $result=$objResultat->fetchAll();
        return $result;
    }

    public static function supprimerVehicule($id)
	{
		$sql = "delete from vehicule where id_vehicule=$id";		
		connectPdo::getObjPdo()->exec($sql);	
		
	}


}
?>