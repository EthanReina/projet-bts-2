<?php
include 'connectPdo.php';

class DbService{
	
	public static function getListeService()
	{
		$sql = "select * from service ";		
		$objResultat = connectPdo::getObjPdo()->query($sql);	
		$result = $objResultat->fetchAll();
		return $result;
	}

	public static function getListeEmploye()
	{
		$sql = "select * from employe";		
		$objResultat = connectPdo::getObjPdo()->query($sql);	
		$result = $objResultat->fetchAll();
		return $result;
	}

	public static function supprimerEmploye($id)
	{
		$sql = "delete from employe where id=$id";		
		connectPdo::getObjPdo()->exec($sql);	
		
	}

	public static function supprimerService($id)
	{
		$sql = "delete from service where id=$id ";		
		connectPdo::getObjPdo()->exec($sql);	
		
	}
	
}

?>