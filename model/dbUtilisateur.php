<?php
include 'connectPdo.php';

class DbUtilisateur
{

public static function getUser($Email, $Password)
{
    $sql="select COUNT(id_utilisateur) as validation from utilisateurs where email='$Email' and mot_de_passe='$Password'";
    $objResultat=connectPdo::getObjPdo()->query($sql);
    $result=$objResultat->fetch();
    return $result;
}

public static function getInfoUser($Email)
{
    $sql="select * from utilisateurs where email='$Email'";
    $objResultat=connectPdo::getObjPdo()->query($sql);
    $result=$objResultat->fetch();
    return $result;
}


}
?>