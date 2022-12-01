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

    public static function ajoutNoteDeFrais($mission,$montant,$id_utilisateur)
    {
        $sql="INSERT INTO note_de_frais (mission, montant, id_utilisateur) VALUES ('$mission', '$montant','$id_utilisateur')";
        $objResultat=connectPdo::getObjPdo()->query($sql);
    }

    public static function maxNoteFrais() { 
        $sql="select MAX(id_note) as nb from note_de_frais";
        $objResultat=connectPdo::getObjPdo()->query($sql);
        $result=$objResultat->fetch();
        return $result;
     }

    public static function ajoutFc($libelle,$montant,$id_note)
    {
        $sql="INSERT INTO ligne_fc (libelle, montant_fc, id_note) VALUES ('$libelle', '$montant','$id_note')";
        $objResultat=connectPdo::getObjPdo()->query($sql);
    }


    public static function ajoutFk($montant,$kilometre,$id_note)
    {
        $sql="INSERT INTO ligne_fkm (montant, kilometre, id_note) VALUES ('$montant', '$kilometre','$id_note')";
        $objResultat=connectPdo::getObjPdo()->query($sql);
    }


    public static function getNoteDeFrais($id_utilisateur) {

        $sql="select * from note_de_frais where id_utilisateur='$id_utilisateur'";
        $objResultat=connectPdo::getObjPdo()->query($sql);
        $result=$objResultat->fetchAll();
        return $result;

    }

    public static function getLigneFc($id_note) {

        $sql="select * from ligne_fc where id_note='$id_note'";
        $objResultat=connectPdo::getObjPdo()->query($sql);
        $result=$objResultat->fetchAll();
        return $result;

    }

    public static function getLigneFk($id_note) {

        $sql="select * from ligne_fkm where id_note='$id_note'";
        $objResultat=connectPdo::getObjPdo()->query($sql);
        $result=$objResultat->fetchAll();
        return $result;

    }

<<<<<<< Updated upstream
=======
    public static function validStatutLigneFc($id_ligne_fc) {

        $sql="UPDATE ligne_fc SET statut='1' WHERE id_fc='$id_ligne_fc'";
        $objResultat=connectPdo::getObjPdo()->query($sql);

    }

    public static function deniedStatutLigneFc($id_ligne_fc) {

        $sql="UPDATE ligne_fc SET statut='2' WHERE id_fc='$id_ligne_fc'";
        $objResultat=connectPdo::getObjPdo()->query($sql);


    }

    public static function supprimerLigneFc($id_ligne_fc) {
        $sql="DELETE From ligne_fc WHERE id_fc='$id_ligne_fc'";
        $objResultat=connectPDO::getObjPdo()->query($sql);
    }

    public static function modifierLigneFc($libelle,$montant,$id_ligne_fc) {
        $sql="UPDATE ligne_fc SET libelle='$libelle', montant_fc='$montant' WHERE id_fc='$id_ligne_fc'";
        $objResultat=connectPDO::getObjPdo()->query($sql);
    }

    public static function changerStatutGlobal($statut, $id_note) {

        $requete = connectPdo::getObjPdo()->prepare("UPDATE note_de_frais SET statut = ? WHERE id_note = ?");
        $requete->execute(array($statut, $id_note));

    }

    public static function getNoteDeFraisByStatut($statut) {

        $sql="select * from note_de_frais where statut='$statut'";
        $objResultat=connectPdo::getObjPdo()->query($sql);
        $result=$objResultat->fetchAll();
        return $result;

    }

>>>>>>> Stashed changes




    public static function calculIndemniteKilometrique($puissance,$distance)
    {
        if($puissance<=3){
            if($distance<=5000){
                return $distance*0.502;  
            }
            else if($distance>5000 && $distance<=20000){
                return ($distance*0.3)+1007;
            }
            else{
                return $distance*0.35;
            }
        }
        else if($puissance==4){
            if($distance<=5000){
                return $distance*0.575;
            }
            else if($distance>5000 && $distance<=20000){
                return ($distance*0.323)+1262;
            }
            else{
                return $distance*0.387;
            }
        }
        if($puissance==5){
            if($distance<=5000){
                return $distance*0.663;
            }
            else if($distance>5000 && $distance<=20000){
                return ($distance*0.339)+1320;
            }
            else{
                return $distance*0.405;
            }
        }
        if($puissance==6){
            if($distance<=5000){
                return $distance*0.631;
            }
            else if($distance>5000 && $distance<=20000){
                return ($distance*0.355)+1382;
            }
            else{
                return $distance*0.425;
            }
        }
        else{
            if($distance<=5000){
                return $distance*0.661;
            }
            else if($distance>5000 && $distance<=20000){
                return ($distance*0.374)+1435;
            }
            else{
                return $distance*0.446;
            }
        }
    }

}
?>