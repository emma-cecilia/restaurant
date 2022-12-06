<?php
require('../model/connectDatabase.php');
require('../model/fonctions.php');
require('../model/produit.php');
require('../model/commande.php');
require('../model/client.php');
require('../model/produitCommande.php');
require('../model/produitPanier.php');
session_start();

$dateCommande=$_SESSION['dateCommande'];
$idClient=$_SESSION['id'];

$leClient=new Client(null,null,null,null,null,null,null,null,null,null);
$leClient->getClientById($idClient);

include('../view/payerCommande.phtml');
?>