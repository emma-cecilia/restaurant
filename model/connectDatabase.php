<?php
function connectDatabase(){
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8', 'root', '');
		return $bdd;
	}catch(Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
}
?>