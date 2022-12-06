<?php
//inclusion de la connexion à la BDD
// require('connectDatabase.php');

Class Reserver{
	//les propriétés
	private $idReserver;
	private $idClient;
	private $idTableRestaurant;
	private $dateReservation;
	private $nombreCouvert;
	
	
	//le constructeur
	public function __construct($idReserver,$idClient,$idTableRestaurant,$dateReservation,$nombreCouvert){
		$this->idReserver=$idReserver;
		$this->idClient=$idClient;
		$this->idTableRestaurant=$idTableRestaurant;
		$this->dateReservation=$dateReservation;
		$this->nombreCouvert=$nombreCouvert;
		
	}
	
	//les getters
	public function getIdClient(){
		return $this->idClient;
	}
	public function getIdTableRestaurant(){
		return $this->idTableRestaurant;
	}
	public function getDateReservation(){
		return $this->dateReservation;
	}
	public function getNombreCouvert(){
		return $this->nombreCouvert;
	}
	
	//les getters
	public function setIdClient($idClient){
		$this->idClient=$idClient;
	}
	public function setIdTableRestaurant($idTableRestaurant){
		$this->idTableRestaurant=$idTableRestaurant;
	}
	public function setDateReservation($dateReservation){
		$this->dateReservation=$dateReservation;
	}
	public function setNombreCouvert($nombreCouvert){
		$this->nombreCouvert=$nombreCouvert;
	}
	
	//BDD getter
	public function getReserverById($idClient,$idTableRestaurant){
		$bdd=connectDatabase();
		$requete = $bdd->prepare("SELECT * FROM reserver WHERE idClient=:idClient AND idTableRestaurant=:idTableRestaurant");
		$requete->execute(array(':idClient'=>$idClient,':idTableRestaurant'=>$idTableRestaurant));
		$resultat=$requete->fetchObject();
		
		$this->idClient=$resultat->idClient;
		$this->idTableRestaurant=$resultat->idTableRestaurant;
		$this->dateReservation=$resultat->dateReservation;
		$this->nombreCouvert=$resultat->nombreCouvert;
		
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
	//BDD setter
	public function setReserverBDD(){
		$bdd=connectDatabase();
		
		$requete = $bdd->prepare("INSERT INTO
								  `reserver`(`idClient`,`idTableRestaurant`,`dateReservation`,`nombreCouvert`)
								VALUES(idClient,idTableRestaurant,dateReservation,nombreCouvert)");
		$requete->execute(array(
			':idClient'=>$this->idClient,
			':idTableRestaurant'=>$this->idTableRestaurant,
			':dateReservation'=>$this->dateReservation,
			':nombreCouvert'=>$this->nombreCouvert
		));
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
	function getReserverByDate($dateReservation){
		$bdd=connectDatabase();
		$requete = $bdd->prepare("SELECT * FROM reserver WHERE dateReservation=:dateReservation");
		$requete->execute(array(':dateReservation'=>$dateReservation));
		$resultat=$requete->fetchObject();
		
		$this->idClient=$resultat->idClient;
		$this->idTableRestaurant=$resultat->idTableRestaurant;
		$this->dateReservation=$resultat->dateReservation;
		$this->nombreCouvert=$resultat->nombreCouvert;
		
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
	
	
	
	//reserver une table
	/*function reserverTable($idTableRestaurant,$nombreCouvert,$dateHeure){
		require('tableRestaurant.php');
		$laTable=new TableRestaurant(null,null);
		$laTable->getTableRestaurantById($idTableRestaurant);
		if($laTable->getNombreCouvert()<=$nombreCouvert){
			$this->idTableRestaurant=$idTableRestaurant;
			$this->dateReservation=$dateHeure;
			$this->nombreCouvert=$nombreCouvert;
		}
	}*/
	

}
?>