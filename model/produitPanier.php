<?php
//inclusion de la connexion à la BDD
// require('connectDatabase.php');

Class ProduitPanier{
	//les propriétés
	private $produit;
	private $quantite;
	
	
	//le constructeur
	public function __construct($produit,$quantite){
		$this->produit=$produit;
		$this->quantite=$quantite;	
	}
	
	//les getters
	public function getProduit(){
		return $this->produit;
	}

	public function getQuantite(){
		return $this->quantite;
	}
	
	//les setters
	public function setProduit($monProduit){
		$this->produit=$monProduit;
	}
	public function setQuantite($maQuantite){
		$this->quantite=$maQuantite;
	}
	
	
}
?>