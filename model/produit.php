<?php
// require('connectDatabase.php');
class Produit
{
	private $idProduit;
	private $nomProduit;
	private $descriptionProduit;
	private $prixProduit;
	private $imageProduit;
	
	public function __construct($idProduit, $nomProduit, $descriptionProduit, $prixProduit,$imageProduit){
		$this->idProduit = $idProduit;
		$this->nomProduit = $nomProduit;
		$this->descriptionProduit = $descriptionProduit;
		$this->prixProduit = $prixProduit;
		$this->imageProduit = $imageProduit;
	}
	//getter et setter idProduit
	public function getIdProduit(){
		return $this->idProduit; 
	}
	public function setIdProduit($idProduit){
		$this->idProduit = $idProduit; 
	}
	//getter et setter nomProduit
	public function getNomProduit(){
		return $this->nomProduit; 
	}
	public function setNomProduit($nomProduit){
		$this->nomProduit = $nomProduit; 
	}
	//getter et setter imageProduit
	public function getImageProduit(){
		return $this->imageProduit; 
	}
	public function setImageProduit($imageProduit){
		$this->imageProduit = $imageProduit; 
	}
	
	//getter et setter descriptionProduit
	public function getDescriptionProduit(){
		return $this->descriptionProduit; 
	}
	public function setDescriptionProduit($descriptionProduit){
		$this->descriptionProduit = $descriptionProduit; 
	}
	
	//getter et setter prixProduit
	public function getPrixProduit(){
		return $this->prixProduit; 
	}
	public function setPrixProduit($prixProduit){
		$this->prixProduit = $prixProduit; 
	}
	
	
	
	//récuperation 
	public function getProduitById($idProduit){
	$bdd = connectDatabase();
	
	$requete = $bdd->prepare("SELECT * FROM produit
							WHERE idProduit = :idProduit");
	$requete -> execute(array(':idProduit' => $idProduit));
	$result = $requete->fetchobject();
	
	$this->idProduit = $result->idProduit;
	$this->nomProduit = $result->nomProduit;
	$this->descriptionProduit = $result->descriptionProduit;
	$this->prixProduit = $result->prixProduit;
	$this->imageProduit = $result->imageProduit;
		
	//arrete la connexion à la BDD
	unset($bdd);
	}
	
	//mise à jour 
	// public function setProduitBDD(){
	// $bdd = $this->connectDatabase();
	
	// $requete = $bdd->prepare("UPDATE produit SET nomProduit=:nomProduit,
							// descriptionProduit=:descriptionProduit,
							// prixProduit=:prixProduit,
							// imageProduit=:imageProduit
							// WHERE idProduit =:idProduit");
	// $requete -> execute(array(
		// ':idProduit' => $this->idProduit,
		// ':nomProduit' => $this->nomProduit,
		// ':descriptionProduit' => $this->descriptionProduit,
		// ':prixProduit' => $this->prixProduit	
		// ':imageProduit' => $this->imageProduit	
	// ));
	// unset($bdd);
	// }
}
?>