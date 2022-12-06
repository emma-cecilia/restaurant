<?php
// require('model/connectDatabase.php');

/*
require('model/client.php');
$monClient = new Client(null,null,null,null,null,null,null,null,null,null);
$monClient->setNomClient('AAA');
echo $monClient->getNomClient();
*/
/*
require('model/reserver.php');
$monReserver = new Reserver(null,null,null,null);
$monReserver->setNombreCouvert(10);
echo $monReserver->getNombreCouvert();
*/
/*
require('model/tableRestaurant.php');
$monTable = new TableRestaurant(null,null);
$monTable->setMaxCouvert(5);
echo $monTable->getMaxCouvert();
*/
/*
require('model/commande.php');
$monCommande = new Commande(null,null,null);
$monCommande->setDateCommande('12 janv 2016');
echo $monCommande->getDateCommande();
*/
/*
require('model/produit.php');
$monProduit = new Produit(null,null,null,null);
$monProduit->setNomProduit('Banane');
echo $monProduit->getNomProduit();
*/
/*
require('model/produitCommande.php');
$monProduitCommande = new ProduitCommande(null,null,null,null);
$monProduitCommande->setQuantite(20);
echo $monProduitCommande->getQuantite();
*/

/*require('model/client.php');
$monClient = new Client(2,null,null,null,null,null,null,null,null,null);
//$monClient->setNomClient('maman');
if(is_null($monClient->getIdClient())){
	echo 'vide';
}else{echo 'non vide';}
*/
/*
require('model/fonctions.php');
print_r (connexionClient('aaa','aaa'));
*/
/*require('model/fonctions.php');
afficherMessage();*/

// echo $date = date("d-m-Y").' '.date("H:i:s");

function TVA($montantHT){
	$tauxTVA=20;
	return $montantHT*($tauxTVA/100);
}
echo TVA(100);

?>