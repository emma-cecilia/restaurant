<?php
//inclusion de la connexion à la BDD
// require('connectDatabase.php');

Class Client{
	//les propriétés
	private $idClient;
	private $nomClient;
	private $prenomClient;
	private $dateNaissance;
	private $adresse;
	private $ville;
	private $codePostal;
	private $telephone;
	private $email;
	private $motDePasse;
	
	//le constructeur
	public function __construct($idClient,$nomClient,$prenomClient,$dateNaissance,$adresse,$ville,$codePostal,$telephone,$email,$motDePasse){
		$this->idClient=$idClient;
		$this->nomClient=$nomClient;
		$this->prenomClient=$prenomClient;
		$this->dateNaissance=$dateNaissance;
		$this->adresse=$adresse;
		$this->ville=$ville;
		$this->codePostal=$codePostal;
		$this->telephone=$telephone;
		$this->email=$email;
		$this->motDePasse=$motDePasse;
	}
	
	//les getters
	public function getIdClient(){
		return $this->idClient;
	}
	public function getNomClient(){
		return $this->nomClient;
	}
	public function getPrenomClient(){
		return $this->prenomClient;
	}
	public function getDateNaissance(){
		return $this->dateNaissance;
	}
	public function getAdresse(){
		return $this->adresse;
	}
	public function getVille(){
		return $this->ville;
	}
	public function getCodePostal(){
		return $this->codePostal;
	}
	public function getTelephone(){
		return $this->telephone;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getMotDePasse(){
		return $this->motDePasse;
	}
	
	//les getters
	public function setIdClient($idClient){
		$this->idClient=$idClient;
	}
	public function setNomClient($nomClient){
		$this->nomClient=$nomClient;
	}
	public function setPrenomClient($prenomClient){
		$this->prenomClient=$prenomClient;
	}
	public function setDateNaissance($dateNaissance){
		$this->dateNaissance=$dateNaissance;
	}
	public function setAdresse($adresse){
		$this->adresse=$adresse;
	}
	public function setVille($ville){
		$this->ville=$ville;
	}
	public function setCodePostal($codePostal){
		$this->codePostal=$codePostal;
	}
	public function setTelephone($telephone){
		$this->telephone=$telephone;
	}
	public function setEmail($email){
		$this->email=$email;
	}
	public function setMotDePasse($motDePasse){
		$this->motDePasse=$motDePasse;
	}
	
	//BDD getter
	public function getClientById($id){
		$bdd=connectDatabase();
		$requete = $bdd->prepare("SELECT * FROM client WHERE idClient=:id");
		$requete->execute(array(':id'=>$id));
		$resultat=$requete->fetchObject();
		
		$this->idClient=$resultat->idClient;
		$this->nomClient=$resultat->nomClient;
		$this->prenomClient=$resultat->prenomClient;
		$this->dateNaissance=$resultat->dateNaissance;
		$this->adresse=$resultat->adresse;
		$this->ville=$resultat->ville;
		$this->codePostal=$resultat->codePostal;
		$this->telephone=$resultat->telephone;
		$this->email=$resultat->email;
		$this->motDePasse=$resultat->motDePasse;
		
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	public function getClientByMail($mail){
		$bdd=connectDatabase();
		$requete = $bdd->prepare("SELECT * FROM client WHERE email=:mail");
		$requete->execute(array(':mail'=>$mail));
		$resultat=$requete->fetchobject();
		
		if(is_object($resultat)){
			
			$this->idClient=$resultat->idClient;
			$this->nomClient=$resultat->nomClient;
			$this->prenomClient=$resultat->prenomClient;
			$this->dateNaissance=$resultat->dateNaissance;
			$this->adresse=$resultat->adresse;
			$this->ville=$resultat->ville;
			$this->codePostal=$resultat->codePostal;
			$this->telephone=$resultat->telephone;
			$this->email=$resultat->email;
			$this->motDePasse=$resultat->motDePasse;
			
			return true;
		}else{
			return false;
		}
}
	public function getClientIdNameByMail($mail){
		$bdd=connectDatabase();
		$requete = $bdd->prepare("SELECT * FROM client WHERE email=:mail");
		$requete->execute(array(':mail'=>$mail));
		$resultat=$requete->fetchobject();
			
			$this->idClient=$resultat->idClient;
			$this->nomClient=$resultat->nomClient;
			$this->prenomClient=$resultat->prenomClient;
		
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
	//BDD modif
	public function setClientBDD(){
		$bdd=connectDatabase();
		$requete = $bdd->prepare("UPDATE client 
								SET nomClient=:nomClient,
									prenomClient=:prenomClient,
									dateNaissance=:dateNaissance,
									adresse=:adresse,
									ville=:ville,
									codePostal=:codePostal,
									telephone=:telephone,
									email=:email,
									motDePasse=:motDePasse,
								WHERE idClient=:idClient");
		$retour=$requete->execute(array(
			':idClient'=>$this->idClient,
			':nomClient'=>$this->nomClient,
			':prenomClient'=>$this->prenomClient,
			':dateNaissance'=>$this->dateNaissance,
			':dateNaissance'=>$this->dateNaissance,
			':adresse'=>$this->adresse,
			':ville'=>$this->ville,
			':codePostal'=>$this->codePostal,
			':telephone'=>$this->telephone,
			':telephone'=>$this->telephone,
			':email'=>$this->email,
			':motDePasse'=>$this->motDePasse
		));
		return $retour;		
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
	//BDD insert
	public function insertClientBDD(){
		$bdd=connectDatabase();
		$requete = $bdd->prepare("INSERT
									INTO
									  `client`(
										`idClient`,
										`nomClient`,
										`prenomClient`,
										`dateNaissance`,
										`adresse`,
										`ville`,
										`codePostal`,
										`telephone`,
										`email`,
										`motDePasse`
									  )
									VALUES(
									  :idClient,
									  :nomClient,
									  :prenomClient,
									 :dateNaissance,
									  :adresse,
									  :ville,
									  :codePostal,
									  :telephone,
									  :email,
									  :motDePasse
									)");
		$retour=$requete->execute(array(
			':idClient'=>$this->idClient,
			':nomClient'=>$this->nomClient,
			':prenomClient'=>$this->prenomClient,
			':dateNaissance'=>$this->dateNaissance,
			':adresse'=>$this->adresse,
			':ville'=>$this->ville,
			':codePostal'=>$this->codePostal,
			':telephone'=>$this->telephone,
			':email'=>$this->email,
			':motDePasse'=>$this->motDePasse
		));
		return $retour;		
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
}
?>