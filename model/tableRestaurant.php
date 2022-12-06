<?php 
// model TablrRestaurant.php
// require('connectDatabase.php');

class TableRestaurant {
	
	private $idTableRestaurant;
	private $maxCouvert;
	
	public function __construct($idTableRestaurant, $maxCouvert) {
		$this->idTableRestaurant = $idTableRestaurant;
		$this->maxCouvert = $maxCouvert;
	}
	// getters : retourne la valeur de la propriétè demandée
	public function getIdTableRestaurant() {
		return $this->idTableRestaurant;
	}
	// setters : modifie la valeur de la propriété 
	public function setIdTableRestaurant($idTableRestaurant) {
		$this->idTableRestaurant = $idTableRestaurant;
	}
	
	// getters : retourne la valeur de la propriétè demandée
	public function getMaxCouvert() {
		return $this->maxCouvert;
	}
	// setters : modifie la valeur de la propriété 
	public function setMaxCouvert($maxCouvert) {
		$this->maxCouvert = $maxCouvert;
	}
	

	// on récupère les informations d'une commande
	public function getTableRestaurantByid($idTableRestaurant) {
		$bdd =connectDatabase();
		
		$requete = $bdd->prepare("SELECT *
								FROM TableRestaurant
								WHERE idTableRestaurant = :idTableRestaurant");
		$requete->execute(array(':idTableRestaurant' => $idTableRestaurant));
		$result = $requete->fetchObject();
		
		$this->idTableRestaurant = $result->idTableRestaurant;
		$this->maxCouvert = $result->maxCouvert;
		// on détruit l'objet connexion ce qui ferme la connexion à la BDD
		unset ($bdd);
	}
	
	// on recherche la table ayant un maxCouver supérieur ou égale à $nombreCouvert
	public function getTableRestaurantByMaxCouvert($nombreCouvert,$limit) {
		// $limit-=1;
		$bdd = connectDatabase();
		
		$requete = $bdd->prepare("SELECT *
								FROM TableRestaurant
								WHERE maxCouvert >= :nombreCouvert
								LIMIT :index,1");
		$requete->execute(array(':nombreCouvert' => $nombreCouvert,':index'=>$limit));
		$result = $requete->fetchObject();
		
		$this->idTableRestaurant = $result->idTableRestaurant;
		$this->maxCouvert = $result->maxCouvert;
		// on détruit l'objet connexion ce qui ferme la connexion à la BDD
		unset ($bdd);
	}
	
	//mise à jour 
	public function setTableRestaurantBDD(){
	$bdd = connectDatabase();
	
	$requete = $bdd->prepare("UPDATE tableRestaurant SET maxCouvert=:maxCouvert
							WHERE idTableRestaurant =:idTableRestaurant");
	$requete -> execute(array(
		':idTableRestaurant' => $this->idTableRestaurant,
		':maxCouvert' => $this->maxCouvert
		));
		
	//arrete la connexion à la BDD
	unset($bdd);
	}
}

?>