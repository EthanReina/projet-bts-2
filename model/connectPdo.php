<?php

// Informations de connexion à la base de données

class connectPdo 
{
	private static $db; 
	
	private function __construct(){} 
	
	static function getObjPdo() {
		 
		 if(!isset(self::$db))
		 { 
		  self::$db = new PDO('mysql:host=mysql-projetbts2.alwaysdata.net;dbname=projetbts2_note_de_frais', '284347_root', 'ProjetBTS2!');  // PDO Connexion base de données 
		  self::$db ->query('SET NAMES utf8'); 
		  self::$db->query('SET CHARACTER SET utf8');   
		 } 
		return self::$db; 
    }
}


?>