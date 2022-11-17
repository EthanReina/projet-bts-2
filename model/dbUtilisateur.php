<?php
include 'connectPdo.php';

// Classe DbUtilisateur qui contient les fonctions de requêtes SQL

class DbUtilisateur
{

    // Fonction qui permet de vérifier que les informations de connexion sont correctes et que l'utilisateur existe bien dans la base de données
    public static function getUser($Email, $Password)
    {

        $requete = connectPdo::getObjPdo()->prepare("SELECT COUNT(id_utilisateur) as validation FROM utilisateurs WHERE email = ? AND mot_de_passe = ?");
        $requete->execute(array($Email, '1'.sha1($Password)));
        $result = $requete->fetch();
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
    public static function ajoutVehicule($marque, $carburant, $nb_places, $puissance_fiscale, $utilisateur)
    { 
        $sql="INSERT INTO vehicule (marque, carburant, nb_places,puissance_fiscale, utilisateur) VALUES ('$marque', '$carburant','$nb_places', '$puissance_fiscale', '$utilisateur')";
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

    // Get Véhicule with id_vehicule
    public static function getVehiculeById($id)
    {
        $sql="select * from vehicule where id_vehicule='$id'";
        $objResultat=connectPdo::getObjPdo()->query($sql);
        $result=$objResultat->fetch();
        return $result;
    }


}
?>