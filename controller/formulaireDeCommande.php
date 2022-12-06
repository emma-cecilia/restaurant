<?php
require('../model/connectDatabase.php');
require('../model/fonctions.php');
require('../model/produit.php');
require('../model/commande.php');
require('../model/produitCommande.php');
require('../model/produitPanier.php');
session_start();

if(isset($_GET['idSupp'])){
	$panier=$_SESSION["panier"];
	unset($panier[$_GET['idSupp']]);
	$_SESSION["panier"]=$panier;
}

if(isset($_GET['first'])){
	$_SESSION['panier']=array();
}

else{
	$panier=$_SESSION["panier"];
	if(isset($_POST['ajouter'])){
		$monProduit=new Produit(null,null,null,null,null);
		$monProduit->getProduitById($_POST['idProduit']);
		$quantitePanier=$_POST['quantite'];
		$monProduitPanier= new ProduitPanier($monProduit,$quantitePanier);
		// array_unshift($panier,$monProduit);
		$panier[]=$monProduitPanier;
		$_SESSION["panier"]=$panier;
	}
	if(isset($_POST['valider'])){
		$panier=$_SESSION["panier"];
		$_SESSION["dateCommande"]=$dateCommande=date("Y-m-d");
		$laCommande= new Commande(null,$dateCommande,$_SESSION["id"]);
		if(!$laCommande-> setCommandeBDD()){echo'erreur commande';};
		$laCommande=new Commande(null,null,null);
		$laCommande->getCommandeByDate($dateCommande);
		$idCommande=$laCommande->getIdCommande();
		foreach ($panier as $monPanier){
			$quantite=$monPanier->getQuantite();
			$ceProduit=$monPanier->getProduit();
			$idProduit=$ceProduit->getIdProduit();
			$leProduitCommande= new ProduitCommande($idCommande,$idProduit,$quantite);
			if(!$leProduitCommande->setProduitCommandeBDD()){echo'erreur ProduitCommande';};
		}
		echo'Enregistrement commande réussie!';
		header("Location:../controller/payerCommande.php");
		
	}
}

$bdd=connectDatabase();

$stmt = $bdd->query('SELECT * FROM produit');
	$tabProduit=array();
	// $tabIdProduit=array();

	while($message = $stmt->fetch()){
		$idProduit=$message['idProduit'];
		$tabProduit["$idProduit"]=$message['nomProduit'];
	}

	//Gestion du Panier
include('../view/formulaireDeCommande.phtml');
?>