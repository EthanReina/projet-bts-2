<?php

class connectPdo 
{
	private static $db; 
	
	private function __construct(){} 
	
	static function getObjPdo() {
		 
		 if(!isset(self::$db))
		 { 
		  self::$db = new PDO('mysql:host=localhost;dbname=note_de_frais', 'root', '');  // PDO Connexion base de données 
		  self::$db ->query('SET NAMES utf8'); 
		  self::$db->query('SET CHARACTER SET utf8');   
		 } 
		return self::$db; 
    }
}


?>