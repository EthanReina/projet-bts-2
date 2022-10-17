<?php
include 'connectPdo.php';
class DbUtilisateur
{
public static function getUser($Email,$Password)
{
    $sql="select * from utilisateurs where login='$Email' and mdp ='$Password'";
    $objResultat=connectPdo::getObjPdo()->query($sql);
    $result=$objResultat->fetch();
    return $result;
}

}
?>