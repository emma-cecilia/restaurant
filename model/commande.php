<?php 
// model commande.php
// require('connectDatabase.php');

class Commande {
	
	private $idCommande;
	private $dateCommande;
	private $client_idclient;
	
	public function __construct($idCommande, $dateCommande, $client_idclient) {
		$this->idCommande				= $idCommande;
		$this->dateCommande		= $dateCommande;
		$this->client_idclient		= $client_idclient;
	}
	
	// getters : retourne la valeur de la propriétè demandée
	public function getIdCommande() {
		return $this->idCommande;
	}
	// setters : modifie la valeur de la propriété 
	public function setIdCommande($monIdCommande) {
		$this->idCommande = $monIdCommande;
	}
	
	// getters : retourne la valeur de la propriétè demandée
	public function getDateCommande() {
		return $this->dateCommande;
	}
	// setters : modifie la valeur de la propriété 
	public function setDateCommande($dateCommande) {
		$this->dateCommande = $dateCommande;
	}
	
	// on récupère les informations d'une commande
	public function getCommandeById($id) {
		$bdd = connectDatabase();
		
		$requete = $bdd->prepare("SELECT *
								FROM Commande
								WHERE idCommande = :id");
		$requete->execute(array(':id' => $id));
		$result = $requete->fetchObject();
		
		$this->idCommande				= $result->idCommande;
		$this->dateCommande		= $result->dateCommande;
		$this->client_idclient		= $result->client_idclient;
		// on détruit l'objet connexion ce qui ferme la connexion à la BDD
		unset ($bdd);
	}
	
	// on récupère les informations d'une commande
	public function getCommandeByDate($date) {
		$bdd = connectDatabase();
		
		$requete = $bdd->prepare("SELECT *
								FROM Commande
								WHERE dateCommande = :dateCommande");
		$requete->execute(array(':dateCommande' => $date));
		$result = $requete->fetchObject();
		// print_r($result);exit;
		$this->idCommande		= $result->idCommande;
		$this->dateCommande		= $result->dateCommande;
		$this->client_idclient	= $result->client_idclient;
		// on détruit l'objet connexion ce qui ferme la connexion à la BDD
		unset ($bdd);
	}
	
	//mise à jour 
	public function setCommandeBDD(){
	$bdd=connectDatabase();
	// print $this->client_idclient . '   -   '  . $this->dateCommande;exit;
	$requete = $bdd->prepare("INSERT INTO commande VALUES(NULL,:dateCommande,:client_idclient)");
	$retour=$requete -> execute(array(
		':dateCommande' => $this->dateCommande,
		':client_idclient' => $this->client_idclient
		));
	return $retour;
	//arrete la connexion à la BDD
	unset($bdd);
	}
}

?>