<?php
// require('connectDatabase.php');
class ProduitCommande
{
	private $idCommande;
	private $idProduit;
	private $quantite;
	
	//constructeur
	public function __construct( $idCommande, $idProduit, $quantite){
		$this->idCommande = $idCommande;
		$this->idProduit = $idProduit;
		$this->quantite = $quantite;
	}
	//getter et setter idCommande 
	public function getIdCommande(){
		return $this->idCommande; 
	}
	public function setIdCommande($idCommande){
		$this->idCommande = $idCommande; 
	}
	//getter et setter idProduit
	public function getIdProduit(){
		return $this->idProduit; 
	}
	public function setIdProduit($idProduit){
		$this->idProduit = $idProduit; 
	}
	//getter et setter quantite
	public function getQuantite(){
		return $this->quantite; 
	}
	public function setQuantite($quantite){
		$this->quantite = $quantite; 
	}
	
	
	//
	public function getProduitCommandeById($idCommande){
	$bdd=connectDatabase();
	
	$requete = $bdd->prepare("SELECT * FROM produitCommande
							WHERE idCommande = :idCommande");
	$requete -> execute(array(':idCommande' => $idCommande));
	$result = $requete->fetchobject();
	
	$this->idCommande = $result->idCommande;
	$this->idProduit = $result->idProduit;
	$this->quantite = $result->quantite;
			
	//arret
	unset($bdd);
	}
	
	//
	public function setProduitCommandeBDD(){
	$bdd=connectDatabase();
	// print $this->quantite . '   -   '  . $this->idCommande;exit;
	$requete = $bdd->prepare("INSERT INTO produitcommande VALUES(NULL,:idCommande,:idProduit,:quantite)");
	$retour=$requete -> execute(array(
							':idCommande' => $this->idCommande,
							':idProduit' => $this->idProduit,
							':quantite'=> $this->quantite
							));
	return $retour;
	unset($bdd);
	}
	
}
?>
