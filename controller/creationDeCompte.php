<?php
require('../model/connectDatabase.php');
require('../model/fonctions.php');
require('../model/client.php');
if(isset($_POST['valider'])){
	$monClient=new Client(NULL, $_POST['nom'], $_POST['prenom'], 
								$_POST['dateDeNaissance'], 
								$_POST['adresse'], 
								$_POST['ville'], 
								$_POST['codePostal'], 
								$_POST['numTel'],
								$_POST['mail'],
								$_POST['motDePasse']
								);

$retour=$monClient->insertClientBDD();
if($retour=true){
	$msg="creationReussie";
	header("Location:../index.php?msg=$msg");
}else{
	$msg="creationEchouee";	
	header("Location:creationDeCompte.php?msg=$msg");
}
}
include('../view/creationDeCompte.phtml');
?>